<?php
/*宠物配对操作类*/
class PetPairAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty);
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'showPet':
					$this->smarty->assign('current','service');
					$this->showPet();
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*showPet显示宠物配对列表*/
	private function showPet(){
		$this->smarty->display('service/petPair.tpl');
	}
}