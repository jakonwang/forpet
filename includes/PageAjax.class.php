<?php
/*Ajax分页类*/
class PageAjax{
	private $pagesize;//每页显示多少条
	private $limit;//limit
	private $page;//当前页码
	//构造方法初始化
	public function __construct($page,$pagesize){
		$this->pagesize = $pagesize;
		$this->page = $page;
		$this->limit = "LIMIT ".($this->page-1)*$pagesize.",$this->pagesize";
	}
	//拦截器
	public function __get($key){
		return $this->$key;
	}
}