<?php
/*寻宠百科模型类*/
class EncyclopediaModel extends Model{
	private $id;
	private $title;
	private $description;
	private $writer;
	private $litpic;
	private $pubdate;
	private $lastpost;
	private $click;
	private $keywords;
	private $goodpost;
	private $badpost;
	private $body;
	/*魔术__set()方法*/
	public function __set($key,$value){
		$this->$key = $value;
	}
	/*魔术__get()方法*/
	public function __get($key){
		return $this->$key;
	}
	public function addArticle(){
		$sql = "INSERT INTO
					`encyclopedia`
					(id,title,description,writer,litpic,pubdate,lastpost,click,keywords,goodpost,badpost,body)
					VALUES(
					DEFAULT,
					'$this->title',
					'$this->description',
					'$this->writer',
					'$this->litpic',
					'$this->pubdate',
					'$this->lastpost',
					'$this->click',
					'$this->keywords',
					'$this->goodpost',
					'$this->badpost',
					'$this->body'
					)
					";
		return parent::aud($sql);
	}
	/*total()统计百科数量*/
	public function total(){
		$sql = "SELECT
					`id`
				FROM
					`encyclopedia`
				WHERE
					is_delete = 0
					";
		return parent::total($sql);
	}
	/*totalRubbish()统计被删除的百科数量*/
	public function totalRubbish(){
		$sql = "SELECT
					`id`
				FROM
					`encyclopedia`
				WHERE
					is_delete = 1
					";
		return parent::total($sql);
	}
	/*getAllArticle()查询指定数量的百科*/
	public function getAllArticle(){
		$sql = "SELECT
					`id`,
					`title`,
					`description`,
					`click`,
					`lastpost`,
					`writer`,
					`litpic`
				FROM
					`encyclopedia`
				WHERE
					is_delete = 0
				ORDER BY
					lastpost DESC
				".$this->limit;
		return parent::all($sql);
	}
	/*获取被删除的百科*/
	/*getAllRubbish()查询指定数量的百科*/
	public function getAllRubbish(){
		$sql = "SELECT
					`id`,
					`title`,
					`description`,
					`click`,
					`lastpost`,
					`writer`,
					`litpic`
				FROM
					`encyclopedia`
				WHERE
					is_delete = 1
				ORDER BY
					lastpost DESC
				".$this->limit;
		return parent::all($sql);
	}
	/*getOneArticle()查询一条百科*/
	public function getOneArticle(){
		$sql = "SELECT
					`id`,
					`title`,
					`writer`,
					`description`,
					`lastpost`,
					`body`
				FROM
					`encyclopedia`
				WHERE
					id='{$this->id}'";
		return parent::one($sql);
	}
	/*getOneCollection()通过用户收藏的id查询一条百科*/
	public function getOneCollection(){
		$sql = "SELECT
					`id`,
					`title`,
					`description`,
					`click`,
					`lastpost`,
					`writer`,
					`litpic`
				FROM
					`encyclopedia`
				WHERE
					id='{$this->id}'";
		return parent::one($sql);
	}
	/*getOneAll()查询一条百科的所有信息*/
	public function getOneAll(){
		$sql = "SELECT
					*
				FROM
					`encyclopedia`
				WHERE
					id='{$this->id}'";
		return parent::one($sql);
	}
	/*updateArticle()修改一篇文章*/
	public function updateArticle(){
		$sql = "UPDATE
					`encyclopedia`
				SET
					`title`='{$this->title}',
					`writer`='{$this->writer}',
					`keywords`='{$this->keywords}',
					`litpic`='{$this->litpic}',
					`description`='{$this->description}',
					`body`='{$this->body}',
					`lastpost`='{$this->lastpost}'
				WHERE
					id='{$this->id}'";
		return parent::aud($sql);
	}
	/*updateClick()更新百科文章的浏览次数*/
	public function updateClick(){
		$sql = "UPDATE
					`encyclopedia`
				SET
					click = click+1
				WHERE
					id = '{$this->id}'";
		return parent::aud($sql);
	}
	/*recoverArticle()将百科文章从回收站恢复*/
	public function recoverArticle(){
		$sql = "UPDATE
					`encyclopedia`
				SET
					is_delete = 0
				WHERE
					id = '{$this->id}'";
		return parent::aud($sql);
	}
	/*deleteArticle()删除一篇百科文章，伪删除*/
	public function deleteArticle(){
		$sql = "UPDATE
					`encyclopedia`
					SET
					`is_delete` = 1
					WHERE
					id='{$this->id}'";
		return parent::aud($sql);
	}
	/*dropArticle()完全删除百科文章*/
	public function dropArticle(){
		$sql = "DELETE
					FROM
					`encyclopedia`
				WHERE
					id = '{$this->id}'";
		return parent::aud($sql);
	}
}