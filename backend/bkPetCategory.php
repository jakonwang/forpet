<?php
require_once(substr(dirname(__FILE__),0,-7).'init.inc.php');
global $smarty;
$category = new BkPetCategoryAction($smarty);/*创建宠物分类管理实例*/
$category->action();
