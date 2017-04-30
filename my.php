<?php
require_once(dirname(__FILE__).'/init.inc.php');//引入初始化文件
global $smarty;
$smarty->assign('current','my');
$my = new MyAction($smarty);
$my->action();