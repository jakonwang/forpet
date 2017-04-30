<?php
/*领养操作类*/
class AdoptAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new AdoptModel());
	}
	/*入口*/
	public function action(){
		if($_GET['action']){
			switch($_GET['action']){
				/*显示列表*/
				case 'show':
					$this->show();
					break;
				/*添加领养*/
				case 'add':
					$this->add();
					break;
				/*获取下一个分类*/
				case 'nextCate':
					$this->getNextCate();
					break;
				/*ajax获取下一页*/
				case 'nextPage':
					$this->nextPage();
					break;
				/*获取领养详情*/
				case 'detail':
					$this->getDetail();
					break;
				default:
					Tool::alertBack('非法操作！');
			}
		}else{
			Tool::alertBack('非法操作！');
		}
	}
	/*显示页面*/
	public function show(){
		$pageAjax = new PageAjax(1,AJAX_PAGESIZE);
		$this->model->limit = $pageAjax->limit;
		$allAdopts = $this->model->getAllAdopt();
		if($allAdopts){
			foreach($allAdopts as $key=>$value){
				$value->pubdate = date('m:d H:i',$value->pubdate);
				$value->imgsrc = explode('|',$value->imgsrc);
			}
		}
		$this->smarty->assign('current','forpet');/*寻宠主页模块高亮*/
		$this->smarty->assign('allAdopts',$allAdopts);
		$this->smarty->display('forpet/adopt.tpl');
	}
	/*添加领养*/
	public function add(){
		/*如果提交了添加领养数据*/
		if(isset($_POST['send'])){
			/*验证数据合法性*/
			Validate::checkNull($_POST['code'])?Tool::alertBack('验证码不能为空!'):true;
			Validate::checkEquals($_POST['code'],$_SESSION['code'])?Tool::alertBack('验证码输入不正确！'):true;
			Validate::checkNull($_POST['imgsrc'])?Tool::alertBack('请先上传宠物萌照!'):true;
			Validate::checkValue($_POST['pet_cates'],'less',0)?Tool::alertBack('请选择宠物品种！'):true;
			Validate::checkLength($_POST['nickname'],20,'max')?Tool::alertBack('宠物昵称不得超过20位!'):true;
			Validate::checkNull(trim($_POST['age']))?Tool::alertBack('宠物年龄不能为空!'):true;
			Validate::checkAge(trim($_POST['age']))?Tool::alertBack('请输入合法的宠物年龄!'):true;
			Validate::checkLength($_POST['description'],20,'min')?Tool::alertBack('领养要求不得少于20位!'):true;
			Validate::checkLength($_POST['description'],255,'max')?Tool::alertBack('领养要求不得大于255位!'):true;
			Validate::checkLength($_POST['publisher'],2,'min')?Tool::alertBack('联系人名称不得小于2位!'):true;
			Validate::checkLength($_POST['publisher'],10,'max')?Tool::alertBack('联系人名称不得大于10位!'):true;
			Validate::checkTelephone($_POST['telephone'])?Tool::alertBack('请输入合法的联系方式!'):true;
			/*将上传的图片从微信服务器下载到本地服务器保存*/
			$access_token = TokenWechat::getToken();
			$img_arr = explode(',',$_POST['imgsrc']);/*以数组分割传递过来的图片字符串*/
			$mediaW = new MediaWechat($access_token);
			$imgsrc = array();
			foreach($img_arr as $key=>$value){
				$imgsrc[] = $mediaW->saveMedia($value);
			}
			/*组合成一个字符串*/
			$this->model->imgsrc = implode('|',$imgsrc);
			/*数据赋值*/
			$this->model->openid = $_SESSION['openid'];
			$this->model->cateid = $_POST['pet_cates'];
			$this->model->nickname = trim($_POST['nickname']);
			$this->model->sex = $_POST['sex'];
			$this->model->age = trim($_POST['age']);
			$this->model->description = $_POST['description'];
			$this->model->pubdate = time();
			$this->model->publisher = trim($_POST['publisher']);
			$this->model->telephone = trim($_POST['telephone']);
			$this->model->location = $_POST['location'];
			if($this->model->addAdopt()){
				Tool::alertLocation('成功发布一条领养','adopt.php?action=show');
				/*发布成功后可以发送消息给当前用户的朋友*/
				/**********/
			}else{
				Tool::alertBack('发布领养失败,请检查错误!');
			}
		}
		/*获取宠物一级分类*/
		$petCategory = new PetCategoryModel();
		$petCategory->pid = 0;
		$first_cates = $petCategory->getAllCategory();
		/*微信jssdk*/
		$jssdk = new JssdkWechat(APPID,APPSECRET);
		$signPackage = $jssdk->getSignPackage();
		$this->smarty->assign('first_cates',$first_cates);/*显示一级分类*/
		$this->smarty->assign('signPackage',$signPackage);/*显示微信jssdk配置*/
		$this->smarty->display('forpet/addAdopt.tpl');/*显示添加领养界面*/
	}
	/*获取下一个分类*/
	public function getNextCate(){
		if(isset($_GET['pid']) && is_numeric($_GET['pid'])){
			$petCategory = new PetCategoryModel();
			$petCategory->pid = $_GET['pid'];
			$cates = $petCategory->getAllCategory();
			echo json_encode($cates);
		}else{
			Tool::alertBack('非法操作！');
		}
	}
	/*ajax获取下一页*/
	private function nextPage(){
		if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
			$page = $_GET['page'];
			$pageAjax = new PageAjax($page,AJAX_PAGESIZE);
			$this->model->limit = $pageAjax->limit;
			$allAdopts = $this->model->getAllAdopt();
			if($allAdopts){
				foreach($allAdopts as $key=>$value){
					$value->pubdate = date('m:d H:i',$value->pubdate);
					$value->imgsrc = explode('|',$value->imgsrc);
				}
				echo json_encode($allAdopts);
			}else{
				echo '';
			}
		}else{
			Tool::alertBack('非法操作!');
		}
	}
	/*getDetail()获取领养详情*/
	private function getDetail(){
		if(!isset($_GET['id']) && !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作');
		}else{
			$this->model->id = $_GET['id'];
		}
		$oneAdopt = $this->model->getOneAdopt();
		if(!$oneAdopt){
			Tool::alertBack('非法操作！');
		}else{
			/*处理时间*/
			$oneAdopt->pubdate = date('m:d H:i',$oneAdopt->pubdate);
			/*处理性别*/
			switch($oneAdopt->sex){
				case '0':
					$oneAdopt->sex = '未知';
					break;
				case '1':
					$oneAdopt->sex = '男';
					break;
				case '2':
					$oneClue->sex = '女';
					break;
				default:
					$oneClue->sex = '未知';
			}
			/*处理图片,转换成数组*/
			$oneAdopt->imgsrc = explode('|',$oneAdopt->imgsrc);
			$this->smarty->assign('oneAdopt',$oneAdopt);
		}
		$this->smarty->display('forpet/adoptDetail.tpl');
	}
}