<?php
/*用户模型类*/
class UserModel extends Model{
	private $id;
	private $openid;
	private $nickname;
	private $headimgurl;
	private $limit;/*显示条数*/
	/*拦截器__set()*/
	public function __set($key,$value){
		$this->$key = $value;
	}
	/*拦截器__get()*/
	public function __get($key){
		return $this->$key;
	}
	/*获取微信用户的数量*/
	public function getTotal(){
		$sql = "SELECT
					`id`
				FROM
					`wx_user`";
		return parent::total($sql);
	}
	/*通过微信用户的openid获取微信用户的id*/
	public function getWxIdByOpenid(){
		$sql = "SELECT
					`id`
				FROM
					`wx_user`
				WHERE
					openid='{$this->openid}'
				LIMIT
					1";
		return parent::one($sql);
	}
	/*通过微信用户的id获取微信用户的openid*/
	public function getWxOpenidById(){
		$sql = "SELECT
					`openid`
				FROM
					`wx_user`
				WHERE
					id='{$this->id}'
				LIMIT
					1";
		return parent::one($sql);
	}
	/*通过用户openid获取一条微信用户信息*/
	public function getOneWxUser(){
		$sql = "SELECT
					`id`,
					`nickname`,
					`headimgurl`,
					`sex`,
					`country`,
					`province`,
					`city`
				FROM
					`wx_user`
				WHERE
					openid='{$this->openid}'
				LIMIT
					1";
		return parent::one($sql);
	}
	/*通过用户id获取一条微信用户信息*/
	public function getOneWxUserById(){
		$sql = "SELECT
					`id`,
					`nickname`,
					`headimgurl`,
					`sex`,
					`country`,
					`province`,
					`city`
				FROM
					`wx_user`
				WHERE
					id='{$this->id}'
				LIMIT
					1";
		return parent::one($sql);
	}
	/*获取所有的微信用户的信息*/
	public function getAllWxUsers(){
		$sql = "SELECT
					`id`,
					`openid`,
					`nickname`,
					`headimgurl`,
					`sex`,
					`country`,
					`province`,
					`city`,
					`subscribe_time`
				FROM
					`wx_user`
				ORDER BY
					id ASC
				".$this->limit;
		return parent::all($sql);
	}
	/*获取所有的微信用户(不包括自己)的信息*/
	public function getWxUsers(){
		$sql = "SELECT
					`id`,
					`nickname`,
					`headimgurl`,
					`sex`,
					`country`,
					`province`,
					`city`
				FROM
					`wx_user`
				WHERE
					openid <> '{$this->openid}'
				ORDER BY
					id ASC
				".$this->limit;
		return parent::all($sql);
	}
	/*获取所有微信用户的OPENID*/
	public function getAllOpenid(){
		$sql = "SELECT
					`openid`
				FROM
					`wx_user`
				ORDER BY
					id ASC";
		return parent::all($sql);
	}
}