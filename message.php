<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$smarty->assign('current','message');/*消息icon高亮*/
$message = new MessageAction($smarty);
$message->action();