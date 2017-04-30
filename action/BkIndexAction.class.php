<?php
/*后台主页管理类*/
class BkIndexAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty);
	}
	/*入口*/
	public function action(){
		if(isset($_GET['action'])){
			switch($_GET['action']){
				case 'getData':
					$this->smarty->assign('title','后台主页');
					$this->getData();
					break;
				default:
					Tool::alertBack('非法操作!');
					break;
			}
		}else{
			Tool::alertBack('非法操作!');
		}
	}
	/*获取所有的数据*/
	private function getData(){
		/*统计流浪线索条数*/
		$cluesModel = new WanderingCluesModel();
		$cluesTotal = $cluesModel->getTotal(null);
		$this->smarty->assign('cluesTotal',$cluesTotal);
		/*统计寻回总数*/
		$retrieveModel = new RetrieveModel();
		$retrieveTotal = $retrieveModel->getTotal();
		$this->smarty->assign('retrieveTotal',$retrieveTotal);
		/*统计领养总数*/
		$adoptModel = new AdoptModel();
		$adoptTotal = $adoptModel->getTotal();
		$this->smarty->assign('adoptTotal',$adoptTotal);
		/*统计社区发布总数*/
		$communityModel = new CommunityModel();
		$communityTotal = $communityModel->getTotal();
		$this->smarty->assign('communityTotal',$communityTotal);
		$this->smarty->display('bkIndex.tpl');
	}
}