<?php
/*宠物模型类*/
class PetsModel extends Model{
	private $id;
	private $userid;
	private $nickname;
	private $sex;
	private $headimgurl;
	private $cateid;
	private $birthday;
	private $weight;
	public function __set($key,$value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
	/*根据用户id获取宠物列表*/
	public function getPetsByUserid(){
		$sql = "SELECT
					id,nickname,sex,cateid,headimgurl,birthday
				FROM
					`pets`
				WHERE
					userid = '{$this->userid}'
				";
		return parent::all($sql);
	}
	/*根据宠物id获取用户id*/
	public function getUseridById(){
		$sql = "SELECT
					userid
				FROM
					`pets`
				WHERE
					id = '{$this->id}'
				LIMIT 1";
		return parent::one($sql);
	}
	/*根据宠物id宠物宠物信息*/
	public function getPetInfoById(){
		$sql = "SELECT
					headimgurl,nickname
				FROM
					`pets`
				WHERE
					id = '{$this->id}'
				LIMIT 1";
		return parent::one($sql);
	}
	/*添加宠物*/
	public function addPet(){
		$sql = "INSERT INTO
					`pets`
					(id,userid,nickname,sex,headimgurl,cateid,birthday,weight)
				VALUES(DEFAULT,'{$this->userid}','{$this->nickname}','{$this->sex}','{$this->headimgurl}','{$this->cateid}','{$this->birthday}','{$this->weight}')";
		return parent::aud($sql);
	}
}