<?php
/*社区评论操作类*/
class CommunityCommentAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new CommunityCommentModel());
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch ($_GET['action']) {
				case 'addOneComment':
					$this->addOneComment();/*添加一条评论*/
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*addOneComment()添加一条评论*/
	private function addOneComment(){
		if(!isset($_POST['cid']) || !is_numeric($_POST['cid'])){
			$this->getReturnResult('error');
		}else{
			Validate::checkNull($_POST['content'])?$this->getReturnResult('error'):true;
			Validate::checkLength($_POST['content'],20,'max')?$this->getReturnResult('error'):true;
			/*************后期需要过滤发送的内容*************************/
			$this->model->cid = $_POST['cid'];/*社区动态id*/
			$user = new UserModel();
			$user->openid = $_SESSION['openid'];
			$oneUser = $user->getOneWxUser();
			$this->model->userid = $oneUser->id;/*用户id*/
			$this->model->content = Tool::htmlString($_POST['content']);/*评论内容*/
			$this->model->ctime = time();/*评论时间*/
			/*添加评论入库*/
			$userinfo['nickname'] = $oneUser->nickname;
			$userinfo['headimgurl'] = $oneUser->headimgurl;
			$userinfo['content'] = $this->model->content;
			$userinfo['ctime'] = date('m-d',time());
			$this->model->addOneComment()?$this->getReturnResult('success',$userinfo):$this->getReturnResult('error');

		}
	}
	/*getReturnResult()获取返回值*/
	private function getReturnResult($status,$userinfo=null){
		$result = array();
		$result['status'] = $status;
		$result['userinfo'] = $userinfo;
		echo json_encode($result);
		exit;
	}
}