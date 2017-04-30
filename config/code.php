<?php
require substr(dirname(__FILE__),0,-7).'/init.inc.php';
$code = new ValidateCode();
$code->doImg();
$_SESSION['code'] = $code->getCode();
?>