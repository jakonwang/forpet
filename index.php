<?php
require_once(dirname(__FILE__).'/init.inc.php');//引入初始化文件
global $smarty;
$smarty->assign('current','forpet');
$smarty->display('forpet/forpet.tpl');
