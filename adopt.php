<?php
require_once(dirname(__FILE__).'/init.inc.php');
global $smarty;
$adopt = new AdoptAction($smarty);/*创建发布领养实例*/
$adopt->action();