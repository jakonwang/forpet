<?php
class FriendsAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new FriendsModel());
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'addFriendsList':/*添加好友列表*/
					$this->smarty->assign('current','my');
					$this->addFriendsList();
					break;
				case 'addFriends':/*显示添加好友页面*/
					$this->addFriends();
					break;
				case 'showRequest':
					$this->showRequest();/*显示好友申请列表*/
					break;
				case 'acceptFriend':
					$this->acceptFriend();/*接受好友申请*/
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*addFriendsList添加好友列表(推荐好友)*/
	private function addFriendsList(){
		$page = new PageAjax(1,10);/*分页*/
		$users = new UserModel();/*实例化用户模型*/
		$users->limit = $page->limit;
		$users->openid = $_SESSION['openid'];
		$usersList = $users->getWxUsers();/*获取不包括自己的微信用户*/
		$uidObj = $users->getWxIdByOpenid();/*获取用户的id*/
		$friends = new FriendsModel();
		$friends->uid = $uidObj->id;
		$friendsList = $friends->getAllFriendsByUid();/*获取好友列表*/
		$friendsArr = array();
		if($friendsList){
			foreach($friendsList as $key=>$value){/*将获取的朋友列表对象转为数组*/
				$friendsArr[$key] = $value->fid;
			}
		}
		if($usersList){
			foreach($usersList as $key=>$value){
				switch($value->sex){
					case '1':
						$value->sex = 'man';
						break;
					case '2':
						$value->sex = 'woman';
						break;
					default:
						$value->sex = 'unknow';
						break;
				}
				if(in_array($value->id,$friendsArr)){/*删除已经在好友列表的数据*/
					unset($usersList[$key]);
				}
			}
		}
		$this->smarty->assign('usersList',$usersList);/*显示所有好友列表*/
		$this->smarty->display('my/addFriendsList.tpl');
	}
	/*addFriends()显示添加好友页面*/
	private function addFriends(){
		if(isset($_POST['send'])){
			/*验证信息*/
			Validate::checkNull($_POST['uid'])?Tool::alertBack('非法操作！'):true;
			Validate::checkNull($_POST['rid'])?Tool::alertBack('非法操作！'):true;
			Validate::checkLength($_POST['content'],5,'min')?Tool::alertBack('验证信息不能小于5个字！'):true;
			Validate::checkLength($_POST['content'],50,'max')?Tool::alertBack('验证信息不得大于50个字！'):true;
			$friendsR = new FriendsRequestModel();
			$friendsR->uid = $_POST['uid'];
			$friendsR->rid = $_POST['rid'];
			$friendsR->content = $_POST['content'];
			/*判断是否已经有添加好友验证信息*/
			if($friendsR->getRequestByUF()){
				Tool::alertBack('您已经添加过好友申请了，请勿重复添加！');
			}else{
				/*保存添加好友信息*/
				if($friendsR->saveRequest()){
					/*发送微信消息给被添加用户*/
					$keFuMessage = new KeFuMessageWechat(TokenWechat::getToken());
					$user = new UserModel();
					$user->id = $friendsR->uid;
					$oneUser = $user->getWxOpenidById();
					$keFuMessage->sendText($oneUser->openid,"您好，您有一条添加好友消息，<a href='".ROOT_URL."\/friends.php?action=showRequest'>请点击查看</a>");
					Tool::alertLocation('成功发送好友申请，请耐心等待回复！','friends.php?action=addFriendsList');
				}else{
					Tool::alertBack('发送好友申请失败，请联系客服！');
				}
			}
		}
		if(!isset($_GET['uid']) || !is_numeric($_GET['uid'])){
			Tool::alertBack('非法操作！');
		}else{
			$uid = $_GET['uid'];
			$user = new UserModel();
			$user->openid = $_SESSION['openid'];
			$ridObj = $user->getWxIdByOpenid();
			$rid = $ridObj->id;
			$this->smarty->assign('uid',$uid);
			$this->smarty->assign('rid',$rid);
		}
		$this->smarty->display('my/addFriends.tpl');
	}
	/*showRequest()显示好友申请列表*/
	private function showRequest(){
		$friendsR = new FriendsRequestModel();
		$user = new UserModel();
		$user->openid = $_SESSION['openid'];
		$ridObj = $user->getWxIdByOpenid();
		$friendsR->uid = $ridObj->id;
		$friendsRequestList = $friendsR->getRequestListByUid();
		if($friendsRequestList){
			foreach($friendsRequestList as $key=>$value){
				$user->id = $value->rid;
				$oneUser = $user->getOneWxUserById();
				$value->rid = $value->rid;
				$value->content = Tool::getDescription($value->content,15,'utf-8');
				$value->nickname = $oneUser->nickname;
				$value->headimgurl = $oneUser->headimgurl;
			}
		}
		$this->smarty->assign('friendsRequestList',$friendsRequestList);
		$this->smarty->display('message/friendsRequestList.tpl');
	}
	/*acceptFriend()接受好友申请*/
	private function acceptFriend(){
		if(!isset($_GET['fid']) || !is_numeric($_GET['fid'])){
			Tool::alertBack('非法操作！');
		}else{
			/*下边其实应该开启事务处理,后期需要优化*/
			/*删除申请信息*/
			$user = new UserModel();
			$friendsR = new FriendsRequestModel();
			$user->openid = $_SESSION['openid'];
			$ridObj = $user->getWxIdByOpenid();
			$friendsR->uid = $ridObj->id;
			$friendsR->rid = $_GET['fid'];
			$friendsR->deleteRequest();
			/*添加好友*/
			$friends = new FriendsModel();
			$friends->uid = $friendsR->uid;
			$friends->fid = $friendsR->rid;
			$friendstwo = new FriendsModel();
			$friendstwo->uid = $friendsR->rid;
			$friendstwo->fid = $friendsR->uid;
			if($friends->addFriend() && $friendstwo->addFriend()){
				Tool::alertLocation('成功添加为好友','my.php?action=myFriends');
			}
		}
	}
}