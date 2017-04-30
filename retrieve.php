<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$retrieve = new RetrieveAction($smarty);/*创建发布寻回实例*/
$retrieve->action();