<?php
/*社区点赞操作类*/
class CommunityPraiseAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new CommunityPraiseModel());
	}
	/*入口*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'praise':
					$this->praise();/*点赞操作*/
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}
	}
	/*praise()点赞操作*/
	private function praise(){
		$result = array();
		if(!isset($_GET['cid']) || !is_numeric($_GET['cid'])){
			echo $this->getReturnMessage('error');
			exit;
		}else{
			$this->model->cid = $_GET['cid'];
			$user = new UserModel();
			$user->openid = $_SESSION['openid'];
			$oneUser = $user->getWxIdByOpenid();
			$this->model->userid = $oneUser->id;/*用户id*/
			$this->model->cid = $_GET['cid'];/*点赞社区id*/
			$onePraise = $this->model->getOnePraise();
			/*判断是否有点赞执行不同的操作*/
			if(!$onePraise){/*没有点赞记录*/
				/*添加点赞*/
				if($this->model->addOnePraise()){
					echo $this->getReturnMessage('success',1);
					exit;
				}else{
					echo $this->getReturnMessage('error');
					exit;
				}
			}else{/*有点赞记录修改记录*/
				if($onePraise->is_praise){
					$this->model->is_praise = 0;
					echo $this->model->updateOnePraise()?$this->getReturnMessage('success',0):$this->getReturnMessage('error');
					exit;
				}else{
					$this->model->is_praise = 1;
					echo $this->model->updateOnePraise()?$this->getReturnMessage('success',1):$this->getReturnMessage('error');
					exit;
				}
			}
		}
	}
	/*获取点赞返回信息*/
	private function getReturnMessage($status,$flag=null){
		$result = array();
		if($status == 'success'){
			$result = array('status'=>'success','is_praise'=>$flag);
		}else if($status == 'error'){
			$result = array('status'=>'error');
		}
		return json_encode($result);
	}
}