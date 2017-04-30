<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$fund = new LoveFundAction($smarty);/*实例化爱心基金操作类*/
$fund->action();