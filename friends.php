<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$friends = new FriendsAction($smarty);/*实例化好友操作类*/
$friends->action();