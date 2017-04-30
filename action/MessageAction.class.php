<?php
/*消息操作类*/
class MessageAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty);
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'showMessage':
					$this->showMessage();
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*显示消息*/
	private function showMessage(){
		/*显示好友验证申请条数*/
		$friendsR = new FriendsRequestModel();/*实例化好友申请模型*/
		$user = new UserModel();
		$user->openid = $_SESSION['openid'];
		$userObj = $user->getWxIdByOpenid();
		$friendsR->uid = $userObj->id;
		$totalRequest = $friendsR->getTotalByUid();
		$this->smarty->assign('totalRequest',$totalRequest);/*好友申请数量*/
		$this->smarty->display('message/message.tpl');
	}
}