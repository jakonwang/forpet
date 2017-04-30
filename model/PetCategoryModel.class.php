<?php
/*宠物分类模型类*/
class PetCategoryModel extends Model{
	private $id;//分类ID
	private $category_name;//分类名称
	private $pid;//上级分类ID
	private $limit;//限制条数
	/*拦截器__set()*/
	public function __set($key,$value){
		$this->$key = $value;
	}
	/*拦截器__get()*/
	public function __get($key){
		return $this->$key;
	}
	/*获取分类总数*/
	public function getCategoryTotal(){
		$sql = "SELECT id FROM `pet_category` WHERE pid = '{$this->pid}'";
		return parent::total($sql);
	}
	/*获取一条宠物分类信息*/
	public function getOneCategory(){
		$sql = "SELECT
					`id`,`category_name`
					FROM
					`pet_category`
					WHERE
						id='{$this->id}'
						OR
						category_name = '{$this->category_name}'";
		return parent::one($sql);
	}
	/*获取所有的分类*/
	public function getAllCategory(){
		/*判断是否有父ID*/
		if(isset($this->pid)){
			$sql = "SELECT
						`id`,`category_name`,`pid`
					FROM
						`pet_category`
					WHERE
						pid = '$this->pid'
					ORDER BY
						id ASC
					".$this->limit;
		}else{
			$sql = "SELECT
						`id`,`category_name`,`pid`
					FROM
						`pet_category`
					ORDER BY
						id ASC
					".$this->limit;
		}
		return parent::all($sql);
	}
	/*修改分类*/
	public function updateCategory(){
		$sql = "UPDATE
					`pet_category`
				SET category_name = '{$this->category_name}'
				WHERE
					id='{$this->id}'";
		return parent::aud($sql);
	}
	/*添加宠物分类*/
	public function addCategory(){
		$sql = "INSERT INTO 
					`pet_category`(id,category_name,pid)
				VALUES(DEFAULT,'{$this->category_name}','{$this->pid}')";
		return parent::aud($sql);
	}
	/*删除分类*/
	public function deleteCategory(){
		$sql = "DELETE FROM
					`pet_category`
					WHERE
						id='{$this->id}'";
		return parent::aud($sql);
	}
}