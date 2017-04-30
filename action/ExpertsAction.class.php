<?php
/*专家操作类*/
class ExpertsAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty);
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'showExperts':
					$this->smarty->assign('current','service');
					$this->showExperts();
					break;
				default:
					Tool::alertBack('非法操作！');
			}
		}
	}
	/*showExperts()显示专家列表*/
	private function showExperts(){
		$this->smarty->display('service/experts.tpl');
	}
}