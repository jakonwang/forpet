<?php
/*寻回操作类*/
class RetrieveAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new RetrieveModel());
	}
	/*入口*/
	public function action(){
		if(isset($_GET['action'])){
			switch($_GET['action']){
				case 'show':
					$this->show();
					break;
				case 'add':
					$this->add();
					break;
				case 'nextPage':
					$this->nextPage();
					break;
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
	/*show()显示发布寻回列表*/
	private function show(){
		$pageAjax = new PageAjax(1,AJAX_PAGESIZE);
		$this->model->limit = $pageAjax->limit;
		$allRetrieve = $this->model->getAllRetrieve();
		if($allRetrieve){
			foreach($allRetrieve as $key=>$value){
				$value->pubdate = Tool::formatDate($value->pubdate);
				$value->imgsrc = explode('|',$value->imgsrc);
			}
		}
		$this->smarty->assign('allRetrieve',$allRetrieve);
		$this->smarty->assign('current','forpet');/*寻宠主页模块高亮*/
		$this->smarty->display('forpet/retrieve.tpl');
	}
	/*add()添加寻回*/
	private function add(){
		if(isset($_POST['send'])){
			/*验证数据合法性*/
			Validate::checkNull($_POST['code'])?Tool::alertBack('验证码不能为空!'):true;
			Validate::checkEquals($_POST['code'],$_SESSION['code'])?Tool::alertBack('验证码输入不正确！'):true;
			Validate::checkNull($_POST['imgsrc'])?Tool::alertBack('请先上传宠物萌照!'):true;
			Validate::checkValue($_POST['pet_cates'],'less',0)?Tool::alertBack('请选择宠物品种！'):true;
			Validate::checkLength($_POST['nickname'],2,'min')?Tool::alertBack('宠物昵称不得少于2位!'):true;
			Validate::checkLength($_POST['nickname'],20,'max')?Tool::alertBack('宠物昵称不得超过20位!'):true;
			Validate::checkNull(trim($_POST['age']))?Tool::alertBack('宠物年龄不能为空!'):true;
			Validate::checkAge(trim($_POST['age']))?Tool::alertBack('请输入合法的宠物年龄!'):true;
			if(!Validate::checkNull($_POST['losetime'])){
				if(Validate::checkDate(trim($_POST['losetime']))){
					Tool::alertBack('宠物丢失时间格式不正确!');
				}else{
					$this->model->losetime = strtotime($_POST['losetime']);
				}
			}
			Validate::checkLength($_POST['description'],20,'min')?Tool::alertBack('宠物特征不得少于20位!'):true;
			Validate::checkLength($_POST['description'],255,'max')?Tool::alertBack('宠物特征不得大于255位!'):true;
			Validate::checkLength($_POST['publisher'],2,'min')?Tool::alertBack('主人名称不得小于2位!'):true;
			Validate::checkLength($_POST['publisher'],10,'max')?Tool::alertBack('主人名称不得大于10位!'):true;
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
			if($this->model->addRetrieve()){
				Tool::alertLocation('成功发布一条寻回','retrieve.php?action=show');
				/*发布成功后可以发送消息给当前用户的朋友*/
				/**********/
			}else{
				Tool::alertBack('发布寻回失败,请检查错误!');
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
		$this->smarty->display('forpet/addRetrieve.tpl');/*添加寻回模板*/
	}
	/*ajax获取下一页*/
	private function nextPage(){
		if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
			$page = $_GET['page'];
			$pageAjax = new PageAjax($page,AJAX_PAGESIZE);
			$this->model->limit = $pageAjax->limit;
			$allRetrieve = $this->model->getAllRetrieve();
			if($allRetrieve){
				foreach($allRetrieve as $key=>$value){
					$value->pubdate = Tool::formatDate($value->pubdate);
					$value->imgsrc = explode('|',$value->imgsrc);
				}
				echo json_encode($allRetrieve);
			}else{
				echo '';
			}
		}else{
			Tool::alertBack('非法操作!');
		}
	}
	private function getDetail(){
		if(!isset($_GET['id']) && !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作');
		}else{
			$this->model->id = $_GET['id'];
		}
		$oneRetrieve = $this->model->getOneRetrieve();
		if(!$oneRetrieve){
			Tool::alertBack('非法操作！');
		}else{
			/*处理时间*/
			$oneRetrieve->pubdate = Tool::formatDate($oneRetrieve->pubdate);
			$oneRetrieve->losetime = date('Y-m-d',$oneRetrieve->losetime);
			/*处理性别*/
			switch($oneRetrieve->sex){
				case '0':
					$oneRetrieve->sex = '未知';
					break;
				case '1':
					$oneRetrieve->sex = '男';
					break;
				case '2':
					$oneRetrieve->sex = '女';
					break;
				default:
					$oneRetrieve->sex = '未知';
			}
			/*处理图片,转换成数组*/
			$oneRetrieve->imgsrc = explode('|',$oneRetrieve->imgsrc);
			$this->smarty->assign('oneRetrieve',$oneRetrieve);
		}
		$this->smarty->display('forpet/retrieveDetail.tpl');
	}
}