<?php
/*我的操作类*/
class MyAction extends Action{
	//构造方法，初始化
	public function __construct(&$smarty) {
		parent::__construct($smarty,new UserModel());
	}
	/*action()*/
	public function action(){
		if(!isset($_GET['action'])){
			Tool::alertBack('非法操作！');
		}else{
			switch($_GET['action']){
				case 'index':
					$this->showIndex();/*显示我的首页*/
					break;
				case 'personalData':
					$this->personalData();/*显示个人资料*/
					break;
				case 'myFriends':
					$this->myFriends();/*显示我的好友*/
					break;
				case 'myPets':
					$this->myPets();/*显示我的萌宠*/
					break;
				case 'myCollections':
					$this->myCollections();/*显示我的收藏*/
					break;
				case 'myAdopt':
					$this->myAdopt();/*显示我的领养*/
					break;
				case 'myRetrieve':
					$this->myRetrieve();/*显示我的寻回*/
					break;
				case 'myWander':
					$this->myWander();/*显示我的流浪线索*/
					break;
				case 'contactUs':
					$this->contactUs();/*显示联系我们*/
					break;
				case 'personalCenter':
					$this->personalCenter();/*个人中心*/
					break;
				default:
					Tool::alertBack('非法操作！');
			}
		}
	}
	/*showIndex()显示我的首页*/
	private function showIndex(){
		$this->model->openid = $_SESSION['openid'];
		$userInfo = $this->model->getOneWxUser();
		$this->smarty->assign('headimgurl',$userInfo->headimgurl);
		$this->smarty->assign('nickname',$userInfo->nickname);
		$this->smarty->display('my/my.tpl');
	}
	/*personalData()显示个人资料*/
	private function personalData(){
		$this->model->openid = $_SESSION['openid'];
		$userInfo = $this->model->getOneWxUser();
		switch($userInfo->sex){
			case '1':
				$sex = '男';
				break;
			case '2':
				$sex = '女';
				break;
			case '0':
				$sex = '未知';
			default:
				break;
		}
		$this->smarty->assign('id',$userInfo->id);
		$this->smarty->assign('nickname',$userInfo->nickname);
		$this->smarty->assign('headimgurl',$userInfo->headimgurl);
		$this->smarty->assign('sex',$sex);
		$this->smarty->assign('country',$userInfo->country);
		$this->smarty->assign('province',$userInfo->province);
		$this->smarty->assign('city',$userInfo->city);
		$this->smarty->display('my/personalData.tpl');
	}
	/*myFriends()显示我的好友*/
	private function myFriends(){
		$user = new UserModel();
		$user->openid = $_SESSION['openid'];
		$uidObj = $user->getWxIdByOpenid();
		$friends = new FriendsModel();
		$friends->uid = $uidObj->id;
		$ids = $friends->getAllFriendsByUid();
		$friendsList = array();
		if($ids){
			foreach($ids as $key=>$value){
				$user->id = $value->fid;
				$friendsList[$key] = $user->getOneWxUserById();
			}
		}
		if($friendsList){
			foreach($friendsList as $key=>$value){
				switch($value->sex){
					case '1':
						$value->sex = 'man';
						break;
					case '2':
						$value->sex = 'woman';
						break;
					default:
						$value->sex = 'unknow';
						break;
				}
			}
		}
		
		$this->smarty->assign('friendsList',$friendsList);
		$this->smarty->display('my/myFriends.tpl');
	}
	/*myPets()显示我的萌宠*/
	private function myPets(){
		/*获取我的宠物列表*/
		$pets = new PetsModel();/*实例化宠物模型*/
		$user = new UserModel();/*实例化用户模型*/
		$petCategory = new PetCategoryModel();
		$userOpenid = $_SESSION['openid'];
		$user->openid = $userOpenid;
		$oneUser = $user->getWxIdByOpenid();
		$pets->userid = $oneUser->id;
		$petsList = $pets->getPetsByUserid();
		if($petsList){
			foreach($petsList as $key=>$value){
				switch($value->sex){
					case '1':
						$value->sex = 'my-pet-male';
						break;
					case '2':
						$value->sex = 'my-pet-female';
						break;
					default:
						$value->sex = 'my-pet-unknow';
						break;
				}
				$petCategory->id = $value->cateid;
				$oneCategory = $petCategory->getOneCategory();
				$value->cateid = $oneCategory->category_name;/*宠物分类名称*/
				/*计算宠物年龄*/
				$value->age = floor((time()-$value->birthday)/(24*60*60*365));
			}
		}
		$this->smarty->assign('petsList',$petsList);/*分配宠物列表*/
		$this->smarty->display('my/myPets.tpl');
	}
	/*myCollections显示我的收藏*/
	private function myCollections(){
		/*获取收藏的养宠百科id*/
		$collect = new KnowledgeCollectModel();
		$collect->openid = $_SESSION['openid'];
		$collections = $collect->getCollectionByOpenid();
		$collectionList = array();
		$encyclopedia = new EncyclopediaModel();
		if($collections){
			foreach($collections as $key=>$value){
				$encyclopedia->id = $value->kid;
				$collectionList[] = $encyclopedia->getOneCollection();
			}
		}
		if($collectionList){
			foreach($collectionList as $key=>$value){
				$value->title = Tool::getDescription($value->title,11,'utf-8');
				$value->description = Tool::getDescription($value->description,22,'utf-8');
				$value->lastpost = Tool::formatDate($value->lastpost);
			}
		}
		$this->smarty->assign('collectionList',$collectionList);
		$this->smarty->display('my/myCollections.tpl');
	}
	/*myAdopt()显示我的领养*/
	private function myAdopt(){
		$adoptModel = new AdoptModel();
		$pageAjax = new PageAjax(1,AJAX_PAGESIZE);
		$adoptModel->limit = $pageAjax->limit;
		$adoptModel->openid = $_SESSION['openid'];
		$adoptList = $adoptModel->getAdoptByOpenid();
		if($adoptList){
			foreach($adoptList as $key=>$value){
				switch($value->sex){
					case '1':
						$value->sex = 'male';
						break;
					case '2':
						$value->sex = 'female';
						break;
					case '0':
						$value->sex = 'unknow';
						break;
					default:
						$value->sex = 'unknow';
						break;
				}
				$value->imgsrc = explode('|',$value->imgsrc);
				$value->pubdate = Tool::formatDate($value->pubdate);
			}
		}
		$this->smarty->assign('adoptList',$adoptList);
		$this->smarty->display('my/myAdopt.tpl');
	}
	/*myRetrieve()显示我的寻回*/
	private function myRetrieve(){
		$retrieveModel = new RetrieveModel();
		$pageAjax = new PageAjax(1,AJAX_PAGESIZE);
		$retrieveModel->limit = $pageAjax->limit;
		$retrieveModel->openid = $_SESSION['openid'];
		$retrieveList = $retrieveModel->getRetrieveByOpenid();
		if($retrieveList){
			foreach($retrieveList as $key=>$value){
				switch($value->sex){
					case '1':
						$value->sex = 'male';
						break;
					case '2':
						$value->sex = 'female';
						break;
					case '0':
						$value->sex = 'unknow';
						break;
					default:
						$value->sex = 'unknow';
						break;
				}
				$value->imgsrc = explode('|',$value->imgsrc);
				$value->pubdate = Tool::formatDate($value->pubdate);
			}
		}
		$this->smarty->assign('retrieveList',$retrieveList);
		$this->smarty->display('my/myRetrieve.tpl');
	}
	/*myWander()显示我的流浪线索*/
	private function myWander(){
		$wanderModel = new WanderingCluesModel();
		$pageAjax = new PageAjax(1,AJAX_PAGESIZE);
		$wanderModel->limit = $pageAjax->limit;
		$wanderModel->openid = $_SESSION['openid'];
		$wanderList = $wanderModel->getWanderByOpenid();
		if($wanderList){
			foreach($wanderList as $key=>$value){
				switch($value->sex){
					case '1':
						$value->sex = 'male';
						break;
					case '2':
						$value->sex = 'female';
						break;
					case '0':
						$value->sex = 'unknow';
						break;
					default:
						$value->sex = 'unknow';
						break;
				}
				$value->imgsrc = explode('|',$value->imgsrc);
				$value->pubdate = Tool::formatDate($value->pubdate);
			}
		}
		$this->smarty->assign('wanderList',$wanderList);
		$this->smarty->display('my/myWander.tpl');
	}
	/*contactUs()显示联系我们*/
	private function contactUs(){
		$this->smarty->display('my/contactUs.tpl');
	}
	/*personalCenter()个人中心*/
	private function personalCenter(){
		$this->smarty->display('my/personalCenter.tpl');
	}
}