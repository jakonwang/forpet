<?php
/*后台微信用户管理类*/
class BkWechatUsersAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty);
	}
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'showUsers':
					$this->showUsers();
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*showUsers()显示微信用户*/
	private function showUsers(){
		$wechatUser = new UserModel();
		$total = $wechatUser->getTotal();
		$page = new Page($total,PAGE_SIZE);
		$wechatUser->limit = $page->limit;
		$usersList = $wechatUser->getAllWxUsers();
		if($usersList){
			foreach($usersList as $key=>$value){
				switch($value->sex){
					case '1':
						$value->sex = '男';
						break;
					case '2':
						$value->sex = '女';
						break;
					default:
						$value->sex = '未知';
						break;
				}
				$value->subscribe_time = date('Y-m-d H:i:s',$value->subscribe_time);
			}
		}
		$this->smarty->assign('pageList',$page->showPage());/*分页*/
		$this->smarty->assign('usersList',$usersList);/*显示用户列表*/
		$this->smarty->display('bkWechatUsers.tpl');
	}
}