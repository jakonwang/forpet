<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$smarty->assign('current','service');/*服务icon高亮*/
$encyclopedia = new EncyclopediaAction($smarty);/*实例化养宠百科操作类*/
$encyclopedia->action();