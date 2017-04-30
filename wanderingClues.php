<?php
require_once(dirname(__FILE__).'/init.inc.php');//引入初始化文件
global $smarty;
$wander = new WanderingCluesAction($smarty);/*创建流浪线索实例*/
$wander->action();