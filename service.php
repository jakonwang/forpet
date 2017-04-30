<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$smarty->assign('current','service');/*服务icon高亮*/
$smarty->display('service/service.tpl');