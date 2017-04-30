<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$petPair = new PetPairAction($smarty);/*实例化宠物配对操作类*/
$petPair->action();