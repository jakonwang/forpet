<?php
/*养宠百科收藏表*/
class KnowledgeCollectModel extends Model{
	private $id;
	private $openid;
	private $kid;
	/*魔术方法__set()和__get()*/
	public function __set($key,$value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
	/*getCollectionByOpenid()通过用户openid获取用户收藏的百科id*/
	public function getCollectionByOpenid(){
		$sql = "SELECT
					`kid`
				FROM
					`knowledge_collect`
				WHERE
					openid = '{$this->openid}'
				ORDER BY
					id DESC";
		return parent::all($sql);
	}
	/*addOneCollection()添加一条收藏*/
	public function addOneCollection(){
		$sql = "INSERT INTO
					`knowledge_collect`
					(
						id,
						openid,
						kid
					)
				VALUES
					(
					DEFAULT,
					'{$this->openid}',
					'{$this->kid}'
					)";
		return parent::aud($sql);
	}
	/*deleteOneCollection()删除一条收藏*/
	public function deleteOneCollection(){
		$sql = "DELETE
					FROM
					`knowledge_collect`
				WHERE
					`kid` = '{$this->kid}'
				AND
					`openid` = '{$this->openid}'";
		return parent::aud($sql);
	}
}