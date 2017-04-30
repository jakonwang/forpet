<?php
/*宠物操作类*/
class PetsAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new PetsModel());
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'addPet':
					$this->addPet();/*添加宠物*/
					break;
				default:
					Tool::alertBack('非法操作！');
			}
		}
	}
	/*addPet()添加宠物*/
	private function addPet(){
		/*提交宠物数据时验证数据并且保存*/
		if(isset($_POST['save'])){
			Validate::checkNull($_POST['serverId'])?Tool::alertBack('请上传宠物头像！！'):true;
			Validate::checkLength($_POST['nickname'],2,'min')?Tool::alertBack('宠物名字不能小于两位！'):true;
			Validate::checkLength($_POST['nickname'],25,'max')?Tool::alertBack('宠物名称不能大于25位！'):true;
			Validate::checkEquals($_POST['pet_cates'],'-1')?true:Tool::alertBack('宠物类别不能为空！');
			if(strtotime($_POST['birthday']) - time() > 0){
				Tool::alertBack('不能输入未来的日期！');
			}
			Validate::checkNull($_POST['birthday'])?Tool::alertBack('宠物生日不能为空！'):true;
			Validate::checkNull($_POST['weight'])?Tool::alertBack('宠物体重不能为空！'):true;
			$serverId = $_POST['serverId'];
			/*获取用户id*/
			$wechatUser = new UserModel();
			$wechatUser->openid = $_SESSION['openid'];
			$oneUser = $wechatUser->getWxIdByOpenid();
			$this->model->userid = $oneUser->id;
			/*获取宠物头像*/
			$mediaWechat = new MediaWechat(TokenWechat::getToken());
			$this->model->headimgurl = $mediaWechat->saveMedia($serverId);
			$this->model->nickname = $_POST['nickname'];
			$this->model->sex = $_POST['sex'];
			$this->model->cateid = $_POST['pet_cates'];
			$this->model->birthday = strtotime($_POST['birthday']);
			$this->model->weight = $_POST['weight'];
			if($this->model->addPet()){
				Tool::alertLocation('成功添加宠物','my.php?action=myPets');
			}else{
				Tool::alertBack('添加宠物失败');
			}
		}
		/*获取jssdk包裹*/
		$jssdk = new JssdkWechat(APPID,APPSECRET);
		$signPackage = $jssdk->getSignPackage();
		/*获取宠物一级分类*/
		$PetCategoryModel = new PetCategoryModel();
		$PetCategoryModel->pid = 0;
		$cates = $PetCategoryModel->getAllCategory();
		$this->smarty->assign('cates',$cates);/*设置宠物一级分类*/
		$this->smarty->assign('signPackage',$signPackage);/*设置微信jssdk使用数据*/
		$this->smarty->display('my/addPets.tpl');
	}
}