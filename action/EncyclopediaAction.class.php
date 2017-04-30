<?php
/*养宠百科操作类*/
class EncyclopediaAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new EncyclopediaModel());
	}
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'showInfo':
					$this->showInfo();
					break;
				case 'showDetail':
					$this->showDetail();
					break;
				case 'collect':/*用户收藏养宠百科*/
					$this->collect();
					break;
				case 'noCollect':/*用户取消收藏养宠百科*/
					$this->noCollect();
					break;
				default:
					Tool::alertBack('非法操作！');
			}
		}
	}
	/*showInfo()显示养宠百科*/
	private function showInfo(){
		$infoList = $this->model->getAllArticle();/*获取养宠百科*/
		$collect = new KnowledgeCollectModel();/*实例化养宠百科收藏模型*/
		$collect->openid = $_SESSION['openid'];
		$userCollect = $collect->getCollectionByOpenid();
		$kids = array();
		/*收藏对象转为数组*/
		if($userCollect){
			foreach($userCollect as $key=>$value){
				$kids[$key] = $value->kid;
			}
		}
		if($infoList){
			foreach($infoList as $key=>$value){
				$value->title = Tool::getDescription($value->title,11,'utf-8');
				$value->description = Tool::getDescription($value->description,22,'utf-8');
				$value->lastpost = Tool::formatDate($value->lastpost);
				/*用户是否收藏该百科*/
				if(in_array($value->id,$kids)){
					$value->collect = 'collected';
				}else{
					$value->collect = 'no-collected';
				}
			}
		}
		$this->smarty->assign('infoList',$infoList);
		$this->smarty->display('service/encyclopedia.tpl');
	}
	/*showDetail()显示养宠百科详情*/
	private function showDetail(){
		if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作！');
		}else{
			$this->model->id = $_GET['id'];
			$oneArticle = $this->model->getOneArticle();
			if(!$oneArticle){
				Tool::alertBack('非法操作！');
			}else{
				$oneArticle->lastpost = date('Y-m-d H:i',$oneArticle->lastpost);
			}
		}
		/*更新浏览次数*/
		$this->model->updateClick();
		$this->smarty->assign('oneArticle',$oneArticle);
		$this->smarty->display('service/encyclopediaDetail.tpl');
	}
	/*collect()用户收藏养宠百科*/
	private function collect(){
		if(!isset($_GET['id'])){
			$arr = array('message'=>'error');
			echo json_encode($arr);
			exit;
		}
		/*实例化养宠百科收藏表*/
		$collect = new KnowledgeCollectModel();
		$collect->kid = $_GET['id'];
		$collect->openid = $_SESSION['openid'];
		if(!$collect->addOneCollection()){
			$arr = array('message'=>'error');
			echo json_encode($arr);
			exit;
		}
		$arr = array('message'=>'success');
		echo json_encode($arr);
	}
	/*noCollect()用户取消收藏养宠百科*/
	private function noCollect(){
		if(!isset($_GET['id'])){
			$arr = array('message'=>'error');
			echo json_encode($arr);
			exit;
		}
		/*实例化养宠百科收藏表*/
		$collect = new KnowledgeCollectModel();
		$collect->kid = $_GET['id'];
		$collect->openid = $_SESSION['openid'];
		if(!$collect->deleteOneCollection()){
			$arr = array('message'=>'error');
			echo json_encode($arr);
			exit;
		}
		$arr = array('message'=>'success');
		echo json_encode($arr);
	}
}