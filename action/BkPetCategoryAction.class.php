<?php
/*后台宠物分类管理类*/
class BkPetCategoryAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new PetCategoryModel());
	}
	/*入口*/
	public function action(){
		if(isset($_GET['action'])){
			switch($_GET['action']){
				case 'showCategory':
					$this->smarty->assign('title','宠物分类列表');
					$this->smarty->assign('showCategory',true);
					$this->showCategory();
					break;
				case 'addCategory':
					$this->smarty->assign('title','添加宠物分类');
					$this->smarty->assign('addCategory',true);
					$this->addCategory();
					break;
				case 'updateCategory':
					$this->smarty->assign('title','修改宠物分类');
					$this->smarty->assign('updateCategory',true);
					$this->updateCategory();
					break;
				case 'deleteCategory':/*删除分类栏目*/
					$this->deleteCategory();
					break;
				case 'multiDelete':/*批量删除分类*/
					$this->multiDelete();
					break;
				default:
					Tool::alertBack('非法操作!');
					break;
			}
		}else{
			Tool::alertBack('非法操作!');
		}
	}
	/*显示宠物分类列表*/
	private function showCategory(){
		$petCategory = new PetCategoryModel();
		$petCategory->pid = isset($_GET['pid'])?$_GET['pid']:0;
		$petCategory->pid = is_numeric($petCategory->pid)?$petCategory->pid:0;
		$total = $petCategory->getCategoryTotal();
		$pagelist = new Page($total,PAGE_SIZE);
		$petCategory->limit = $pagelist->limit;
		$categoryList = $petCategory->getAllCategory();
		$this->smarty->assign('pid',$petCategory->pid);
		$this->smarty->assign('pagelist',$pagelist->showPage());/*分页*/
		$this->smarty->assign('categoryList',$categoryList);/*分类列表*/
		$this->smarty->display('bkPetCategory.tpl');/*显示模板*/
	}
	/*添加宠物分类*/
	private function addCategory(){
		if(isset($_POST['send'])){
			!isset($_POST['pid'])?Tool::alertBack('非法操作！'):true;
			Validate::checkNull($_POST['category_name'])?Tool::alertBack('请输入宠物分类名称！'):true;
			$this->model->pid = $_POST['pid'];
			$this->model->category_name = $_POST['category_name'];
			/*查询分类名称是否存在*/
			if($this->model->getOneCategory()){
				Tool::alertBack('该分类名称已经存在，请勿重复添加！');
			}
			if($this->model->addCategory()){
				Tool::alertLocation('宠物分类添加成功！','bkPetCategory.php?action=showCategory&pid='.$this->model->pid);
			}else{
				Tool::alertBack('宠物分类添加失败！');
			}
		}
		if(!isset($_GET['pid']) || !is_numeric($_GET['pid'])){
			Tool::alertBack('非法操作！');
		}else{
			$this->model->id = $_GET['pid'];
			$oneCategory = $this->model->getOneCategory();
			if(!$oneCategory){
				Tool::alertBack('非法操作！');
			}
			$this->smarty->assign('oneCategory',$oneCategory);
		}
		$this->smarty->display('bkPetCategory.tpl');
	}
	/*修改宠物分类*/
	private function updateCategory(){
		if(isset($_POST['send'])){
			Validate::checkNull($_POST['category_name'])?Tool::alertBack('分类名称不能为空'):true;
			$this->model->id = $_POST['id'];
			$this->model->category_name = $_POST['category_name'];
			if($this->model->updateCategory()){
				Tool::alertLocation('宠物分类名称修改成功！','bkPetCategory.php?action=showCategory');
			}else{
				Tool::alertBack('宠物分类名称修改失败！');
			}
		}
		if(isset($_GET['id']) && is_numeric($_GET['id'])){
			/*获取分类名称*/
			$this->model->id = $_GET['id'];
			$oneCategory = $this->model->getOneCategory();
			if(!$oneCategory){
				Tool::alertBack('非法操作！');
			}
			$this->smarty->assign('oneCategory',$oneCategory);
		}else{
			Tool::alertBack('非法操作！');
		}
		$this->smarty->display('bkPetCategory.tpl');
	}
	/*删除宠物分类*/
	private function deleteCategory(){
		if(isset($_GET['id']) && is_numeric($_GET['id'])){
			$this->model->id = $_GET['id'];
			if($this->model->deleteCategory()){
				Tool::alertLocation('成功删除分类！','bkPetCategory.php?action=showCategory');
			}
		}else{
			Tool::alertBack('非法操作！');
		}
	}
	/*批量删除宠物分类*/
	private function multiDelete(){
		print_r($_POST);
		exit;
	}
}