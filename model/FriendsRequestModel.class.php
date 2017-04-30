<?php
/*添加好友验证信息模型类*/
class FriendsRequestModel extends Model{
	private $id;
	private $uid;
	private $rid;
	/*魔术方法*/
	public function __set($key,$value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
	/*通过uid统计请求信息数量*/
	public function getTotalByUid(){
		$sql = "SELECT
					`id`
				FROM
					`friends_request`
				WHERE
					uid = '{$this->uid}'
				";
		return parent::total($sql);
	}
	/*通过uid获取好友申请列表*/
	public function getRequestListByUid(){
		$sql = "SELECT
					rid,content
				FROM
					`friends_request`
				WHERE
					uid = '{$this->uid}'";
		return parent::all($sql);
	}
	/*通过uid和fid获取验证信息*/
	public function getRequestByUF(){
		$sql = "SELECT
					`id`
				FROM
					`friends_request`
				WHERE
					uid = '{$this->uid}'
				AND
					rid = '{$this->rid}'";
		return parent::one($sql);
	}
	/*保存好友验证信息*/
	public function saveRequest(){
		$sql = "INSERT INTO
					`friends_request`
					(id,uid,rid,content)
				VALUES
					(
					DEFAULT,
					'{$this->uid}',
					'{$this->rid}',
					'{$this->content}'
					)";
		return parent::aud($sql);
	}
	/*删除申请信息*/
	public function deleteRequest(){
		$sql = "DELETE FROM
					`friends_request`
				WHERE
					(uid = '{$this->uid}' AND rid = '{$this->rid}')
				OR
					(uid = '{$this->rid}' AND rid = '{$this->uid}')";
		return parent::aud($sql);
	}
}