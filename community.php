<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$smarty->assign('current','community');/*底部社区icon高亮*/
$community = new CommunityAction($smarty);
$community->action();