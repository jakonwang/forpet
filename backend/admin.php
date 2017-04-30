<?php
require_once(substr(dirname(__FILE__),0,-7).'init.inc.php');
global $smarty;
$index = new BkIndexAction($smarty);/*创建后台首页管理实例*/
$index->action();