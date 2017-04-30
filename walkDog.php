<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$walkDog = new WalkDogAction($smarty);/*实例化遛狗操作类*/
$walkDog->action();