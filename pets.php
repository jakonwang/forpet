<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$pets = new PetsAction($smarty);/*实例化宠物操作类*/
$pets->action();