<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$friendsChat = new FriendsChatAction($smarty);/*实例化好友交流操作类*/
$friendsChat->action();
