<?php
/*一起来遛狗操作类*/
class WalkDogAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty);
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'showWalk':
					$this->smarty->assign('current','service');
					$this->showWalk();
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*showPet显示一起来遛狗列表*/
	private function showWalk(){
		$this->smarty->display('service/walkDog.tpl');
	}
}