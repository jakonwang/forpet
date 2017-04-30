<?php
/*好友交流操作类*/
class FriendsChatAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new FriendsChatModel());
	}
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'showChat':/*显示交流页面*/
					$this->showChat();
					break;
				case 'addChat':
					$this->addChat();/*添加交流信息*/
					break;
				case 'getChat':
					$this->getChat();/*获取未读消息*/
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*显示交流页面*/
	public function showChat(){
		if(!isset($_GET['receiver']) || !is_numeric($_GET['receiver'])){
			Tool::alertBack('非法操作！');
		}else{
			/*获取接收者信息*/
			$oneUser = new UserModel();
			$oneUser->id = $_GET['receiver'];
			$receiverInfo = $oneUser->getOneWxUserById();
			/*获取发送者信息*/
			$oneUser->openid = $_SESSION['openid'];
			$senderInfo = $oneUser->getOneWxUser();
			/*获取最近的聊天记录(显示10条)*/
			$this->model->sender = $senderInfo->id;
			$this->model->receiver = $receiverInfo->id;
			$readMessage = $this->model->getReadMessage();
			if($readMessage){
				$readMessage = array_reverse($readMessage);
				foreach($readMessage as $key=>$value){
					if($value->sender == $senderInfo->id){
						$value->position = 'right';
						$value->headimgurl = $senderInfo->headimgurl;
					}else{
						$value->position = 'left';
						$value->headimgurl = $receiverInfo->headimgurl;
					}
					$value->chat_time = date('H:i',$value->chat_time);
				}
				$this->smarty->assign('readMessage',$readMessage);
			}
			$this->smarty->assign('receiverInfo',$receiverInfo);
			$this->smarty->assign('senderInfo',$senderInfo);
			$this->smarty->display('my/friendsChat.tpl');
		}
	}
	/*addChat()添加交流信息*/
	public function addChat(){
		/*验证信息*/
		/*****do something****/
		$this->model->sender = $_POST['sender'];/*发送者*/
		$this->model->receiver = $_POST['receiver'];/*接收者*/
		$this->model->content = $_POST['content'];/*发送内容*/
		$this->model->chat_time = time();/*聊天时间*/
		$result = array();
		if($this->model->addChat()){
			$result['msg'] = 'success';
		}else{
			$result['msg'] = 'fail';
		}
		echo json_encode($result);
	}
	/*获取交流的信息*/
	/*处理ajax的请求,返回数据*/
	/*脚本的主要目的是处理来自ajax的每次询问，ajax每次询问就查询一下数据库，看有没有新的信息，如果没有，刚用usleep()函数等待一秒后再次查询，直到有新信息插入数据库并被查到，脚本返回查询到的数据，并退出无限循环，结束脚本。*/
	public function getChat(){
		/*验证信息*/
		/*****do something****/
		set_time_limit(0);
		$this->model->sender = $_POST['sender'];/*发送者*/
		$this->model->receiver = $_POST['receiver'];/*接收者*/
		$i = 0;
		while(true){/*进入无限循环*/
			/*查询未读的消息，限制每次读出一条*/
			$unReadMessage = $this->model->getUnReadMessage();
			if($unReadMessage){/*如果存在未读消息,更新未读为已读并且返回数据*/
				$unReadMessage->chat_time = date('H:i',$unReadMessage->chat_time);
				$this->model->updateUnReadMessage();
				$unReadMessage->message = 'success';
				echo json_encode($unReadMessage);/*返回未读消息*/
				exit;
			}
			if($i < 40){
				echo json_encode(array('message'=>'nodata'));
				exit;
			}
			usleep(1000000);/*如果没有信息不会进入if块，但会执行以下等待1秒，防止PHP因循环假死*/
		}
		
	}
}