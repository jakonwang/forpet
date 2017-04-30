<?php
/*爱心基金操作类*/
class LoveFundAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty);
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch ($_GET['action']) {
				case 'showFund':
					$this->showFund();
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*showFund显示爱心基金列表*/
	private function showFund(){
		$this->smarty->assign('current','service');
		$this->smarty->display('service/loveFund.tpl');
	}
}