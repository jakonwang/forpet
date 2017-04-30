<?php
/*后台流浪线索管理操作类*/
class BkWanderingCluesAction extends Action{
	public function __construct(&$smarty){
		parent::__construct($smarty,new WanderingCluesModel());
	}
	public function action(){
		if(isset($_GET['action'])){
			switch($_GET['action']){
				case 'showClues':
					$this->smarty->assign('title','流浪线索管理');
					$this->showClues();
					break;
				case 'getOneClueByAjax':
					$this->getOneClueByAjax();
					break;
				case 'deleteOneClue':
					$this->deleteOneClue();
					break;
				case 'searchByNickname':
					$this->searchCluesByNickname();
					break;
				case 'sendToUsers':/*推送微信图文给用户*/
					$this->sendToUsers();
					break;
				default:
					Tool::alertBack('非法操作！');
					break;
			}
		}else{
			Tool::alertBack('非法操作！');
		}
	}
	/*显示流浪线索*/
	private function showClues(){
		$page = new Page($this->model->getTotal(),PAGE_SIZE);
		$this->model->limit = $page->limit;
		$cluesList = $this->model->getAllClues();
		if($cluesList){
			foreach($cluesList as $key=>$value){
				switch($value->sex){
					case '1':
						$value->sex = '男';
						break;
					case '2':
						$value->sex = '女';
						break;
					default:
						$value->sex = '未知';
						break;
				}
				$value->description = Tool::getDescription($value->description,15,'utf-8');/*截取字符串*/
				/*格式化时间*/
				$value->pubdate = date('Y-m-d H:i',$value->pubdate);
			}
		}
		$this->smarty->assign('cluesList',$cluesList);/*流浪线索列表*/
		$this->smarty->assign('pageList',$page->showPage());/*显示分页*/
		$this->smarty->display('bkWanderingClues.tpl');
	}
	/*ajax获取一条流浪线索的详细信息*/
	private function getOneClueByAjax(){
		if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作！');
		}else{
			$this->model->id = $_GET['id'];
			$oneClue = $this->model->getOneClue();
			if($oneClue){
				switch($oneClue->sex){
					case '1':
						$oneClue->sex = '男';
						break;
					case '2':	
						$oneClue->sex = '女';
						break;
					default:
						$oneClue->sex = '未知';
						break;
				}
				$oneClue->pubdate = date('Y-m-d H:i:s',$oneClue->pubdate);
			}
			echo json_encode($oneClue);
		}
	}
	/*删除一条流浪线索*/
	private function deleteOneClue(){
		if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
			Tool::alertBack('非法操作！');
		}else{
			$this->model->id = $_GET['id'];
			if($this->model->deleteOneClue()){
				Tool::alertLocation('成功删除一条流浪线索！','bkWanderingClues.php?action=showClues');
			}else{
				Tool::alertBack('删除一条流浪线索失败！');
			}
		}
	}
	/*通过微信用户昵称查询流浪线索*/
	private function searchCluesByNickname(){
		$nickname = $_POST['nickname'];
		$page = new Page($this->model->getTotal($nickname),PAGE_SIZE);
		// $clues->limit = $page->limit;
		$cluesList = $this->model->getCluesByNickname($nickname);
		if($cluesList){
			foreach($cluesList as $key=>$value){
				switch($value->sex){
					case '1':
						$value->sex = '男';
						break;
					case '2':
						$value->sex = '女';
						break;
					default:
						$value->sex = '未知';
						break;
				}
				$value->description = Tool::getDescription($value->description,15,'utf-8');/*截取字符串*/
				/*格式化时间*/
				$value->pubdate = date('Y-m-d H:i',$value->pubdate);
			}
		}
		$this->smarty->assign('cluesList',$cluesList);/*流浪线索列表*/
		//$this->smarty->assign('pageList',$page->showPage());/*有bug显示分页*/
		$this->smarty->display('bkWanderingClues.tpl');
	}
	/*sendToUsers()推送微信图文给用户*/
	private function sendToUsers(){
		/*获取10条最新的流浪线索*/
		$clues = $this->model->getTenClues(8);
		$users = new UserModel();/*实例化微信用户模型*/
		$usersList = $users->getAllOpenid();/*获取用户openid*/
		$message = new KeFuMessageWechat(TokenWechat::getToken());/*实例化客服消息接口*/
		$news = array();
		foreach($clues as $key=>$value){
			// $news[$key]['title'] = Validate::checkNull($value->nickname)?'匿名动物':$value->nickname;
			$news[$key]['title'] = Tool::getDescription($value->description,18,'utf-8');
			$news[$key]['description'] = Tool::getDescription($value->description,25,'utf-8');
			$value->imgsrc = explode('|',$value->imgsrc);
			$news[$key]['picurl'] = $value->imgsrc[0];
			$news[$key]['url'] = ROOT_URL.'/wanderingClues.php?action=detail&id='.$value->id;
		}
		foreach($usersList as $key=>$value){
			$message->sendNews($value->openid,$news);/*发送图文消息给微信用户*/
		}
		Tool::alertLocation('恭喜您群发流浪线索图文成功！','bkWanderingClues.php?action=showClues');
	}
}