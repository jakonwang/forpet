<?php
/*后台养宠百科管理操作类*/
class BkEncyclopediaAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new EncyclopediaModel());
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作');
		}else{
			switch ($_GET['action']) {
				case 'showList':
					$this->smarty->assign('title','寻宠百科列表');
					$this->smarty->assign('showList',true);
					$this->showList();/*显示养宠百科列表*/
					break;
				case 'addArticle':
					$this->smarty->assign('title','添加寻宠百科');
					$this->smarty->assign('addArticle',true);
					$this->addArticle();/*添加养宠百科*/
					break;
				case 'updateArticle':
					$this->updateArticle();/*更新百科文章*/
					break;
				case 'deleteArticle':
					$this->deleteArticle();/*删除百科文章*/
					break;
				case 'uploadImg':
					$this->uploadImg();/*上传图片*/
					break;
				case 'showRubbish':/*显示回收站*/
					$this->smarty->assign('title','寻宠百科列表回收站');
					$this->showRubbish();
					break;
				case 'recoverArticle':/*恢复百科文章*/
					$this->recoverArticle();
					break;
				case 'dropArticle':/*完全删除百科文章*/
					$this->dropArticle();
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*showList()显示寻宠百科列表*/
	private function showList(){
		$total = $this->model->total();
		$page = new Page($total,PAGE_SIZE);
		$this->model->limit = $page->limit;
		$articleList = $this->model->getAllArticle();
		/*处理数据*/
		foreach($articleList as $key=>$value){
			$value->title = Tool::getDescription($value->title,15,'utf-8');
			$value->lastpost = date('Y-m-d H:i',$value->lastpost);
		}
		$this->smarty->assign('articleList',$articleList);/*显示百科文章列表*/
		$this->smarty->assign('pageList',$page->showPage());/*分页*/
		$this->smarty->display('bkEncyclopedia.tpl');
	}
	/*添加寻宠百科*/
	private function addArticle(){
		/*提交数据*/
		if(isset($_POST['send'])){
			/*验证数据*/
			Validate::checkLength($_POST['title'],5,'min')?Tool::alertBack('百科标题不能小于5位！'):true;
			Validate::checkLength($_POST['title'],30,'max')?Tool::alertBack('百科标题不能大于30位！'):true;
			Validate::checkLength($_POST['description'],10,'min')?Tool::alertBack('百科描述不能小于10位！'):true;
			Validate::checkLength($_POST['description'],255,'max')?Tool::alertBack('百科描述不能大于255位！'):true;
			Validate::checkLength($_POST['editorValue'],20,'min')?Tool::alertBack('百科内容不能小于20位！'):true;
			Validate::checkLength($_POST['editorValue'],20000,'max')?Tool::alertBack('百科内容不能大于20000位！'):true;
			Validate::checkLength($_POST['keywords'],30,'max')?Tool::alertBack('百科关键词不能大于30位！'):true;
			$this->model->title = $_POST['title'];
			$this->model->description = $_POST['description'];
			$this->model->writer = Validate::checkNull($_POST['writer'])?'jakon':$_POST['writer'];
			$this->model->litpic = Validate::checkNull($_POST['litpic'])?'/images/default.jpg':$_POST['litpic'];
			$this->model->pubdate = time();
			$this->model->lastpost = time();
			$this->model->click = 0;
			$this->model->keywords = $_POST['keywords'];
			$this->model->goodpost = 0;
			$this->model->badpost = 0;
			$this->model->body = $_POST['editorValue'];
			if($this->model->addArticle()){
				Tool::alertLocation('恭喜成功发布百科','bkEncyclopedia.php?action=showList');
			}else{
				Tool::alertBack('百科发布失败,请联系管理员！');
			}
		}
		$this->smarty->display('bkEncyclopedia.tpl');
	}
	/*updateArticle()更新百科文章*/
	private function updateArticle(){
		/*修改百科*/
		if(isset($_POST['send'])){
			/*验证数据*/
			Validate::checkLength($_POST['title'],5,'min')?Tool::alertBack('百科标题不能小于5位！'):true;
			Validate::checkLength($_POST['title'],30,'max')?Tool::alertBack('百科标题不能大于30位！'):true;
			Validate::checkLength($_POST['description'],10,'min')?Tool::alertBack('百科描述不能小于10位！'):true;
			Validate::checkLength($_POST['description'],255,'max')?Tool::alertBack('百科描述不能大于255位！'):true;
			Validate::checkLength($_POST['editorValue'],20,'min')?Tool::alertBack('百科内容不能小于20位！'):true;
			Validate::checkLength($_POST['editorValue'],20000,'max')?Tool::alertBack('百科内容不能大于20000位！'):true;
			Validate::checkLength($_POST['keywords'],30,'max')?Tool::alertBack('百科关键词不能大于30位！'):true;
			Validate::checkNull($_POST['id'])?Tool::alertBack('非法操作'):true;
			$this->model->id = $_POST['id'];
			$this->model->title = $_POST['title'];
			$this->model->description = $_POST['description'];
			$this->model->writer = Validate::checkNull($_POST['writer'])?'jakon':$_POST['writer'];
			$this->model->litpic = Validate::checkNull($_POST['litpic'])?'/images/default.jpg':$_POST['litpic'];
			$this->model->lastpost = time();
			$this->model->keywords = $_POST['keywords'];
			$this->model->body = $_POST['editorValue'];
			if($this->model->updateArticle()){
				Tool::alertLocation('百科修改成功！','bkEncyclopedia.php?action=showList');
			}else{
				Tool::alertBack('百科修改失败,请联系管理员！');
			}

		}
		/*获取百科信息并且显示*/
		if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作！');
		}else{
			$this->model->id = $_GET['id'];
			if($this->model->getOneAll()){
				$oneArticle = $this->model->getOneAll();
				$this->smarty->assign('updateArticle',true);
				$this->smarty->assign('oneArticle',$oneArticle);
				$this->smarty->display('bkEncyclopedia.tpl');
			}else{
				Tool::alertBack('非法操作！');
			}
		}
	}
	/*deleteArticle()删除百科文章*/
	private function deleteArticle(){
		if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作！');
		}else{
			$this->model->id = $_GET['id'];
			if($this->model->deleteArticle()){
				Tool::alertLocation('成功将百科文章放到回收站！','bkEncyclopedia.php?action=showList');
			}else{
				Tool::alertBack('放入回收站失败，请联系管理员！');
			}
		}
	}
	/*uploadImg()上传图片*/
	private function uploadImg(){
		$fileUpload = new FileUpload('uploadImg','10000');
		$filePath = $fileUpload->getPath();
		$fileArr = array('uploadImg'=>$filePath);
		echo json_encode($fileArr);
	}
	/*showRubbish()显示回收站*/
	private function showRubbish(){
		/*查询被删除的百科文章并且显示*/
		$encyclopedia = new EncyclopediaModel();
		$total = $encyclopedia->totalRubbish();
		$page = new Page($total,PAGE_SIZE);
		$encyclopedia->limit = $page->limit;
		$rubbishList = $encyclopedia->getAllRubbish();
		if($rubbishList){
			foreach($rubbishList as $key=>$value){
				$value->title = Tool::getDescription($value->title,15,'utf-8');
				$value->lastpost = date('Y-m-d H:i:s',$value->lastpost);
			}
		}
		$this->smarty->assign('showRubbish',true);
		$this->smarty->assign('rubbishList',$rubbishList);/*显示回收站列表*/
		$this->smarty->assign('pageList',$page->showPage());/*显示分页*/
		$this->smarty->display('bkEncyclopedia.tpl');
	}
	/*recoverArticle()恢复百科文章*/
	private function recoverArticle(){
		if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作！');
		}else{
			$this->model->id = $_GET['id'];
			if($this->model->recoverArticle()){
				Tool::alertLocation('成功恢复百科文章，请查看！','bkEncyclopedia.php?action=showRubbish');
			}else{
				Tool::alertLocation('恢复百科文章失败，请联系管理员！','bkEncyclopedia.php?action=showRubbish');
			}
		}
	}
	/*dropArticle()完全删除百科文章*/
	private function dropArticle(){
		if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作！');
		}else{
			$this->model->id = $_GET['id'];
			if($this->model->dropArticle()){
				Tool::alertLocation('成功删除百科文章！','bkEncyclopedia.php?action=showRubbish');
			}else{
				Tool::alertLocation('删除百科文章失败，请联系管理员！','bkEncyclopedia.php?action=showRubbish');
			}
		}
	}
}