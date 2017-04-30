<?php
//控制器基类
class Action{
	protected $smarty;//模板句柄
	protected $model;//数据库模型
	protected function __construct(&$smarty,&$model = null){
		$this->smarty = $smarty;
		$this->model = $model;
	}
}