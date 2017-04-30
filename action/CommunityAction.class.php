<?php
/*社区操作类*/
class CommunityAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new CommunityModel());
	}
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'addCommunity':
					$this->addCommunity();/*添加社区动态*/
					break;
				case 'showCommunity':
					$this->showCommunity();/*显示社区列表*/
					break;
				case 'showCommunityDetail':
					$this->showCommunityDetail();/*显示详情*/
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*addCommunity()添加社区动态*/
	private function addCommunity(){
		if(isset($_POST['send'])){
			Validate::checkLength($_POST['description'],255,'max')?Tool::alertBack('动态发布不得超过255个字！'):true;
			/*********后期需要验证敏感词*******************/
			Validate::checkNull($_POST['imgsrc'])?Tool::alertBack('请上传一张宠物的照片！'):true;
			$this->model->pid = $_POST['pid'];
			$this->model->location = $_POST['location'];
			/*获取图片*/
			$mediaWechat = new MediaWechat(TokenWechat::getToken());
			$this->model->imgsrc = $mediaWechat->saveMedia($_POST['imgsrc']);
			/*过滤非法字符*/
			$this->model->description = Tool::htmlString($_POST['description']);
			$this->model->pubdate = time();
			if($this->model->addCommunity()){
				Tool::alertLocation('成功添加一条社区动态！','community.php?action=showCommunity');
			}else{
				Tool::alertBack('添加一条社区动态失败，请联系客服！');
			}
		}
		/*获取微信jssdk包裹*/
		$jssdkWechat = new JssdkWechat(APPID,APPSECRET);
		$signPackage = $jssdkWechat->getSignPackage();
		/*获取微信用户宠物列表*/
		$user = new UserModel();
		$user->openid = $_SESSION['openid'];
		$oneUser = $user->getWxIdByOpenid();
		$pets = new PetsModel();
		$pets->userid = $oneUser->id;
		$petsList = $pets->getPetsByUserid();
		if($petsList){
			$this->smarty->assign('petsList',$petsList);/*我的宠物列表*/
		}else{
			Tool::alertLocation('请先添加您的萌宠！','pets.php?action=addPet');
		}
		$this->smarty->assign('signPackage',$signPackage);/*微信票据包裹*/
		$this->smarty->display('community/addCommunity.tpl');
	}
	/*showCommunity()显示社区列表*/
	private function showCommunity(){
		$pageAjax = new PageAjax(1,AJAX_PAGESIZE);
		$communityList->limit = $pageAjax->limit;
		$communityList = $this->model->getCommunity();
		$pets = new PetsModel();
		$user = new UserModel();
		if($communityList){
			foreach($communityList as $key=>$value){
				$pets->id = $value->pid;
				$oneUser = $pets->getUseridById();
				$user->id = $oneUser->userid;
				$onePet = $pets->getPetInfoById();
				$value->pheadimg = $onePet->headimgurl;/*宠物头像*/
				$value->nickname = $onePet->nickname;/*宠物昵称*/
				$oneUser = $user->getOneWxUserById();
				$value->headimgurl = $oneUser->headimgurl;/*主人头像*/
				$value->mnickname = $oneUser->nickname;/*主人昵称*/
				$value->description = Tool::getDescription($value->description,50,'utf-8');/*社区动态描述*/
				/*获取是否点赞*/
				$communityPraise = new CommunityPraiseModel();
				$communityPraise->cid = $value->id;
				/*获取当前用户id*/
				$currentUser = new UserModel();
				$currentUser->openid = $_SESSION['openid'];
				$currentUserInfo = $currentUser->getWxIdByOpenid();
				$communityPraise->userid =$currentUserInfo->id;
				$onePraise = $communityPraise->getOnePraise();
				if(!$onePraise){
					$value->is_praise = 'praise';
				}else if($onePraise->is_praise == 0){
					$value->is_praise = 'praise';
				}else{
					$value->is_praise = 'praise_hover';
				}
			}
			$this->smarty->assign('communityList',$communityList);/*分配社区动态列表*/
		}
		$this->smarty->display('community/community.tpl');
	}
	/*showCommunityDetail()显示社区详情*/
	private function showCommunityDetail(){
		if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作！');
		}else{
			/*获取社区动态详情*/
			$this->model->id = $_GET['id'];
			$oneCommunity = $this->model->getOneCommunity();
			if(!$oneCommunity){
				Tool::alertBack('非法操作！');
			}else{
				$user = new UserModel();
				$pet = new PetsModel();
				$pet->id = $oneCommunity->pid;
				$onePet = $pet->getPetInfoById();
				$oneCommunity->nickname = $onePet->nickname;/*宠物昵称*/
				$oneCommunity->pheadimg = $onePet->headimgurl;/*宠物头像*/
				$userInfo = $pet->getUseridById();
				$user->id = $userInfo->userid;
				$oneUser = $user->getOneWxUserById();
				$oneCommunity->mnickname = $oneUser->nickname;/*主人昵称*/
				$oneCommunity->headimgurl = $oneUser->headimgurl;/*主人头像*/
				$this->smarty->assign('oneCommunity',$oneCommunity);
				/*获取是否点赞*/
				$communityPraise = new CommunityPraiseModel();
				$communityPraise->cid = $_GET['id'];
				$currentUser = new UserModel();
				$currentUser->openid = $_SESSION['openid'];
				$currnetUserInfo = $currentUser->getWxIdByOpenid();
				$communityPraise->userid = $currnetUserInfo->id;
				$onePraise = $communityPraise->getOnePraise();
				if(!$onePraise){
					$praise = 'praise';
				}else if($onePraise->is_praise == 0){
					$praise = 'praise';
				}else{
					$praise = 'praise_hover';
				}
				$this->smarty->assign('praise',$praise);
				/*获取20条评论*/
				$page = new PageAjax(1,20);
				$communityComment = new CommunityCommentModel();
				$communityComment->cid = $_GET['id'];
				$communityComment->limit = $page->limit;
				$comments = $communityComment->getComments();
				$commentsTotal = $communityComment->getTotal();/*评论总数*/
				$this->smarty->assign('commentsTotal',$commentsTotal);
				if($comments){
					$wxUser = new UserModel();
					foreach($comments as $key=>$value){
						$wxUser->id = $value->userid;
						$userInfo = $wxUser->getOneWxUserById();
						$value->nickname = $userInfo->nickname;
						$value->headimgurl = $userInfo->headimgurl;
						$value->ctime = date('m-d',$value->ctime);
					}
					$this->smarty->assign('comments',$comments);/*分配评论列表*/
				}
			}
		}
		$this->smarty->display('community/communityDetail.tpl');
	}
}