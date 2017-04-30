<?php
/*社区评论模型*/
class CommunityCommentModel extends Model{
	private $id;
	private $userid;
	private $cid;
	private $content;
	private $ctime;
	private $limit;
	public function __set($key,$value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
	/*根据社区动态id获取评论总数*/
	public function getTotal(){
		$sql = "SELECT
					`id`
				FROM
					`community_comment`
				WHERE
					cid = '{$this->cid}'";
		return parent::total($sql);
	}
	/*addOneComment()添加一条评论*/
	public function addOneComment(){
		$sql = "INSERT INTO
					`community_comment`
				(id,userid,cid,content,ctime)
				VALUES(
					DEFAULT,
					'{$this->userid}',
					'{$this->cid}',
					'{$this->content}',
					'{$this->ctime}'
				)";
		return parent::aud($sql);
	}
	/*获取指定数量的评论*/
	public function getComments(){
		$sql = "SELECT
					`id`,`userid`,`cid`,`content`,`ctime`
				FROM
					`community_comment`
				WHERE
					cid = '{$this->cid}'
				ORDER BY ctime DESC
				".$this->limit;
		return parent::all($sql);
	}
}