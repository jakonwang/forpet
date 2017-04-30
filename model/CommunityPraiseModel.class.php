<?php
/*点赞社区动态模型表*/
class CommunityPraiseModel extends Model{
	private $id;
	private $openid;
	private $cid;
	private $is_praise;
	public function __set($key,$value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
	/*根据社区cid和用户id获取一条点赞*/
	public function getOnePraise(){
		$sql = "SELECT
					`id`,`is_praise`
				FROM
					`community_praise`
				WHERE
					cid = '{$this->cid}'
				AND
					userid = '{$this->userid}'
				LIMIT 1";
		return parent::one($sql);
	}
	/*添加一条点赞*/
	public function addOnePraise(){
		$sql = "INSERT INTO
					`community_praise`
				(id,userid,cid,is_praise)
				VALUES(
					DEFAULT,
					'{$this->userid}',
					'{$this->cid}',
					1
				)";
		return parent::aud($sql);
	}
	/*修改点赞记录*/
	public function updateOnePraise(){
		$sql = "UPDATE
					`community_praise`
				SET
					is_praise = '{$this->is_praise}'
				WHERE
					cid = '{$this->cid}'
				AND
					userid = '{$this->userid}'
				LIMIT 1";
		return parent::aud($sql);
	}
}