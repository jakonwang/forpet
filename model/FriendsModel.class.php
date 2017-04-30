<?php
class FriendsModel extends Model{
	private $id;
	private $uid;
	private $fid;
	/*魔术方法*/
	public function __set($key,$value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
	/*addFriend添加好友*/
	public function addFriend(){
		$sql = "INSERT INTO
					`friends`
					(id,uid,fid)
					VALUES(
					DEFAULT,
					'{$this->uid}',
					'{$this->fid}'
					)";
		return parent::aud($sql);
	}
	/*通过用户id获取所有的好友fid*/
	public function getAllFriendsByUid(){
		$sql = "SELECT
					`fid`
				FROM
					`friends`
				WHERE
					uid = '{$this->uid}'
				";
		return parent::all($sql);
	}
}