<?php
require_once(substr(dirname(__FILE__),0,-7).'init.inc.php');
global $smarty;
$clues = new BkWanderingCluesAction($smarty);/*创建后台流浪线索管理实例*/
$clues->action();
