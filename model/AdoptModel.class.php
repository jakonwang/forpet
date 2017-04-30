<?php
/*领养模型类*/
class AdoptModel extends Model{
	private $id;
	private $openid;
	private $nickname;
	private $sex;
	private $cateid;
	private $age;
	private $description;
	private $imgsrc;
	private $pubdate;
	private $publisher;
	private $telephone;
	private $location;
	private $limit;
	public function __set($key,$value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
	/*getTotal()获取寻回总数*/
	public function getTotal($nickname=null){
		if(!empty($nickname)){
			$sql = "SELECT
						c.id
					FROM
						`adopt` AS c
					LEFT JOIN
						`wx_user` AS u
					ON
						c.openid = u.openid
					WHERE
						u.nickname = '{$nickname}'";
		}else{
			$sql = "SELECT
						`id`
					FROM
					`adopt`";
		}
		return parent::total($sql);
	}
	/*getOneAdopt获取一条领养*/
	public function getOneAdopt(){
		$sql = "SELECT
					a.*,u.nickname pnickname,u.headimgurl,c.category_name
				FROM
					`adopt` AS a
				LEFT JOIN
					`wx_user` AS u
				ON
					a.openid = u.openid
				LEFT JOIN
					`pet_category` AS c
				ON
					a.cateid = c.id
				WHERE
					a.id = $this->id
				LIMIT 1
				";
		return parent::one($sql);
	}
	/*getAdoptByOpenid()通过微信openid获取领养列表*/
	public function getAdoptByOpenid(){
		$sql = "SELECT
					a.id,a.age,c.category_name,a.description,a.pubdate,a.imgsrc,a.sex
				FROM
					`adopt` AS a
				LEFT JOIN
					`pet_category` AS c
				ON
					a.cateid = c.id
				WHERE
					a.openid = '$this->openid'
				ORDER BY
					pubdate DESC
				".$this->limit;
		return parent::all($sql);
	}
	/*获取指定数量的领养列表*/
	public function getAllAdopt(){
		$sql = "SELECT
					a.id,a.nickname,a.age,c.category_name,a.description,a.location,a.pubdate,a.imgsrc,a.sex
				FROM
					`adopt` AS a
				LEFT JOIN
					`pet_category` AS c
				ON
					a.cateid = c.id
				ORDER BY
					pubdate DESC
				".$this->limit;
		return parent::all($sql);
	}
	/*添加领养*/
	public function addAdopt(){
		$sql = "INSERT INTO
					`adopt`
					(id,openid,nickname,sex,cateid,age,description,imgsrc,pubdate,publisher,telephone,location)
					VALUES(
					DEFAULT,'$this->openid','$this->nickname',$this->sex,$this->cateid,$this->age,'$this->description','$this->imgsrc','$this->pubdate','$this->publisher','$this->telephone','$this->location'
					)";
		return parent::aud($sql);
	}
}