<?php
/*社区动态模型类*/
class CommunityModel extends Model{
	private $id;
	private $pid;
	private $location;
	private $imgsrc;
	private $description;
	private $pubdate;
	private $limit;
	public function __set($key,$value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
	/*getTotal()获取总条数*/
	public function getTotal(){
		$sql = "SELECT `id`
				FROM
					`community`";
		return parent::total($sql);
	}
	/*addCommunity()添加社区动态*/
	public function addCommunity(){
		$sql = "INSERT INTO
					`community`
				(id,pid,location,imgsrc,description,pubdate)
				VALUES(
					DEFAULT,
					'{$this->pid}',
					'{$this->location}',
					'{$this->imgsrc}',
					'{$this->description}',
					'{$this->pubdate}'
				)";
		return parent::aud($sql);
	}
	/*getCommunity()获取社区动态列表*/
	public function getCommunity(){
		$sql = "SELECT
					`id`,`pid`,`location`,`imgsrc`,`description`
				FROM
					`community`
				ORDER BY
					pubdate DESC
				".$this->limit;
		return parent::all($sql);
	}
	/*getOneCommunity()获取一条社区动态*/
	public function getOneCommunity(){
		$sql = "SELECT
					`id`,`pid`,`location`,`imgsrc`,`description`
				FROM
					`community`
				WHERE
					id = '{$this->id}'
				LIMIT 1";
		return parent::one($sql);
	}
}