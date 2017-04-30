<?php
/*流浪线索操作类*/
class WanderingCluesAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new WanderingCluesModel());
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
	/*show()显示流浪线索列表*/
	private function show(){
		$pageAjax = new PageAjax(1,AJAX_PAGESIZE);
		$this->model->limit = $pageAjax->limit;
		$allClues = $this->model->getAllClues();
		if($allClues){
			foreach($allClues as $key=>$value){
				$value->pubdate = date('m:d H:i',$value->pubdate);
				$value->imgsrc = explode('|',$value->imgsrc);
			}
		}
		$this->smarty->assign('current','forpet');/*寻宠主页模块高亮*/
		$this->smarty->assign('allClues',$allClues);
		$this->smarty->display('forpet/wanderingClues.tpl');
	}
	/*add()添加流浪线索*/
	private function add(){
		if(isset($_POST['send'])){
			/*验证数据合法性*/
			Validate::checkNull($_POST['code'])?Tool::alertBack('验证码不能为空!'):true;
			Validate::checkEquals($_POST['code'],$_SESSION['code'])?Tool::alertBack('验证码输入不正确！'):true;
			Validate::checkNull($_POST['imgsrc'])?Tool::alertBack('请先上传宠物萌照!'):true;
			Validate::checkLength($_POST['nickname'],20,'max')?Tool::alertBack('宠物昵称不得超过20位!'):true;
			Validate::checkNull($_POST['description'])?Tool::alertBack('流浪描述不能为空！'):true;
			Validate::checkLength($_POST['description'],20,'min')?Tool::alertBack('宠物描述不得少于20位!'):true;
			Validate::checkLength($_POST['description'],255,'max')?Tool::alertBack('宠物描述不得大于255位!'):true;
			Validate::checkNull($_POST['publisher'])?Tool::alertBack('联系人不能为空！'):true;
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
			$this->model->nickname = trim($_POST['nickname']);
			$this->model->sex = $_POST['sex'];
			$this->model->description = $_POST['description'];
			$this->model->pubdate = time();
			$this->model->publisher = trim($_POST['publisher']);
			$this->model->telephone = trim($_POST['telephone']);
			$this->model->location = $_POST['location'];
			if($this->model->addClues()){
				Tool::alertLocation('成功发布一条流浪线索','wanderingClues.php?action=show');
				/*发布成功后可以发送消息给当前用户的朋友*/
				/**********/
			}else{
				Tool::alertBack('发布流浪线索失败,请检查错误!');
			}
		}
		/*微信jssdk*/
		$jssdk = new JssdkWechat(APPID,APPSECRET);
		$signPackage = $jssdk->getSignPackage();
		$this->smarty->assign('signPackage',$signPackage);
		$this->smarty->display('forpet/addClues.tpl');
	}
	/*ajax获取下一页*/
	private function nextPage(){
		if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
			$page = $_GET['page'];
			$pageAjax = new PageAjax($page,AJAX_PAGESIZE);
			$this->model->limit = $pageAjax->limit;
			$allClues = $this->model->getAllClues();
			if($allClues){
				foreach($allClues as $key=>$value){
					$value->pubdate = date('m:d H:i',$value->pubdate);
					$value->imgsrc = explode('|',$value->imgsrc);
				}
				echo json_encode($allClues);
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
		$oneClue = $this->model->getOneClue();
		if(!$oneClue){
			Tool::alertBack('非法操作！');
		}else{
			/*处理时间*/
			$oneClue->pubdate = date('m:d H:i',$oneClue->pubdate);
			/*处理性别*/
			switch($oneClue->sex){
				case '0':
					$oneClue->sex = '未知';
					break;
				case '1':
					$oneClue->sex = '男';
					break;
				case '2':
					$oneClue->sex = '女';
					break;
				default:
					$oneClue->sex = '未知';
			}
			/*处理图片,转换成数组*/
			$oneClue->imgsrc = explode('|',$oneClue->imgsrc);
			$this->smarty->assign('oneClue',$oneClue);
		}
		$this->smarty->display('forpet/wanderingCluesDetail.tpl');
	}
}