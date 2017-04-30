<?php
require_once(substr(dirname(__FILE__),0,-7).'init.inc.php');
global $smarty;
$encyclopedia = new BkEncyclopediaAction($smarty);/*创建后台寻宠百科管理实例*/
$encyclopedia->action();