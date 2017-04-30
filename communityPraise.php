<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$communityPraise = new CommunityPraiseAction($smarty);
$communityPraise->action();