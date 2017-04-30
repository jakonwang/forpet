<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$communityComment = new CommunityCommentAction($smarty);
$communityComment->action();