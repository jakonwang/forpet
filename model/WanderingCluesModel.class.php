<?php
/*流浪线索模型类*/
class WanderingCluesModel extends Model{
	private $id;
	private $openid;
	private $nickname;
	private $sex;
	private $description;
	private $imgsrc;
	private $pubdate;
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
	/*getTotal()获取流浪线索总数*/
	public function getTotal($nickname=null){
		if(!empty($nickname)){
			$sql = "SELECT
						c.id
					FROM
						`wandering_clues` AS c
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
					`wandering_clues`";
		}
		return parent::total($sql);
	}
	/*getOneClue获取一条流浪线索*/
	public function getOneClue(){
		$sql = "SELECT
					c.id,c.openid,c.nickname pnickname,c.sex,c.description,c.imgsrc,c.pubdate,c.location,c.publisher,c.telephone,u.nickname,u.headimgurl
				FROM
					`wandering_clues` AS c
				LEFT JOIN
					`wx_user` AS u
				ON
					c.openid = u.openid
				WHERE
					c.id = $this->id
				LIMIT 1
				";
		return parent::one($sql);
	}
	/*getWanderByOpenid()通过微信openid获取流浪线索列表*/
	public function getWanderByOpenid(){
		$sql = "SELECT
					id,description,pubdate,imgsrc,sex
				FROM
					`wandering_clues`
				WHERE
					openid = '$this->openid'
				ORDER BY
					pubdate DESC
				".$this->limit;
		return parent::all($sql);
	}
	/*getAllClues获取所有的流浪线索*/
	public function getAllClues(){
		$sql = "SELECT
					c.id,c.openid,c.description,c.nickname pnickname,c.imgsrc,c.pubdate,c.sex,c.location,u.nickname,u.headimgurl
				FROM
					`wandering_clues` AS c
				LEFT JOIN
					`wx_user` AS u
				ON
					c.openid = u.openid
				ORDER BY
					`pubdate` DESC
				".$this->limit;
		return parent::all($sql);
	}
	/*getTenClues()获取10流浪线索*/
	public function getTenClues($len){
		if(is_numeric($len)){
			$sql = "SELECT
					id,nickname,description,imgsrc
				FROM
					`wandering_clues`
					ORDER BY
					`pubdate` DESC
				LIMIT 0,$len";
		}else{
			$sql = "SELECT
					id,nickname,description,imgsrc
				FROM
					`wandering_clues`
					ORDER BY
					`pubdate` DESC
				LIMIT 0,10";
		}
		return parent::all($sql);
	}
	/*addClues添加一条流浪线索*/
	public function addClues(){
		$sql = "INSERT INTO
					`wandering_clues`
					(id,openid,nickname,sex,description,imgsrc,pubdate,publisher,telephone,location)
					VALUES(
						DEFAULT,
						'$this->openid',
						'$this->nickname',
						'$this->sex',
						'$this->description',
						'$this->imgsrc',
						'$this->pubdate',
						'$this->publisher',
						'$this->telephone',
						'$this->location'
					)";
		return parent::aud($sql);
	}
	/*deleteOneClue删除一条流浪线索*/
	public function deleteOneClue(){
		$sql = "DELETE
					FROM
					`wandering_clues`
					WHERE
					id='{$this->id}'";
		return parent::aud($sql);
	}
	/*getCluesByNickname()通过微信用户昵称查找流浪线索*/
	public function getCluesByNickname($nickname){
		$sql = "SELECT
					c.id,c.openid,c.description,c.nickname pnickname,c.imgsrc,c.pubdate,c.sex,c.location,u.nickname,u.headimgurl
				FROM
					`wandering_clues` AS c
				LEFT JOIN
					`wx_user` AS u
				ON
					c.openid = u.openid
				WHERE
					u.nickname = '{$nickname}'
				ORDER BY
					`pubdate` DESC
				".$this->limit;
		return parent::all($sql);
	}
}