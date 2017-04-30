<?php
/*寻回模型类*/
class RetrieveModel extends Model{
	private $id;
	private $openid;
	private $nickname;
	private $sex;
	private $cateid;
	private $age;
	private $description;
	private $imgsrc;
	private $pubdate;
	private $losetime;
	private $publisher;
	private $telephone;
	private $location;
	private $limit;
	/*拦截器__set()*/
	public function __set($key,$value){
		$this->$key = $value;
	}
	/*拦截器__get()*/
	public function __get($key){
		return $this->$key;
	}
	/*getTotal()获取寻回总数*/
	public function getTotal($nickname=null){
		if(!empty($nickname)){
			$sql = "SELECT
						c.id
					FROM
						`retrieve` AS c
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
					`retrieve`";
		}
		return parent::total($sql);
	}
	/*getOneRetrieve获取一条寻回*/
	public function getOneRetrieve(){
		$sql = "SELECT
					r.id,r.openid,r.nickname pnickname,r.age,r.sex,r.description,r.imgsrc,r.pubdate,r.losetime,r.location,r.publisher,r.telephone,u.nickname,u.headimgurl,c.category_name
				FROM
					`retrieve` AS r
				LEFT JOIN
					`wx_user` AS u
				ON
					r.openid = u.openid
				LEFT JOIN
					`pet_category` AS c
				ON
					r.cateid = c.id
				WHERE
					r.id = $this->id
				LIMIT 1
				";
		return parent::one($sql);
	}
	/*getRetrieveByOpenid()通过微信openid获取寻回列表*/
	public function getRetrieveByOpenid(){
		$sql = "SELECT
					r.id,r.age,c.category_name,r.description,r.pubdate,r.imgsrc,r.sex
				FROM
					`retrieve` AS r
				LEFT JOIN
					`pet_category` AS c
				ON
					r.cateid = c.id
				WHERE
					r.openid = '$this->openid'
				ORDER BY
					pubdate DESC
				".$this->limit;
		return parent::all($sql);
	}
	/*getAllRetrieve获取所有的寻回*/
	public function getAllRetrieve(){
		$sql = "SELECT
					r.id,r.openid,r.description,r.imgsrc,r.pubdate,r.location,u.nickname,u.headimgurl,c.category_name
				FROM
					`retrieve` AS r
				LEFT JOIN
					`wx_user` AS u
				ON
					r.openid = u.openid
				LEFT JOIN
					`pet_category` AS c
				ON
					r.cateid = c.id
				ORDER BY
					`pubdate` DESC
				".$this->limit;
		return parent::all($sql);
	}
	/*addRetrieve添加一条寻回*/
	public function addRetrieve(){
		$sql = "INSERT INTO
					`retrieve`
					(id,openid,nickname,sex,cateid,age,description,imgsrc,pubdate,losetime,publisher,telephone,location)
					VALUES(
						DEFAULT,
						'$this->openid',
						'$this->nickname',
						'$this->sex',
						'$this->cateid',
						'$this->age',
						'$this->description',
						'$this->imgsrc',
						'$this->pubdate',
						'$this->losetime',
						'$this->publisher',
						'$this->telephone',
						'$this->location'
					)";
		return parent::aud($sql);
	}
}