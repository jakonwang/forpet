<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$experts = new ExpertsAction($smarty);/*专家操作类*/
$experts->action();