<?php
session_start();/*开启session*/

date_default_timezone_set('PRC');/*设置默认时区为北京时间*/

error_reporting(E_ALL ^ E_NOTICE);/*开启报错*/

header('Content-type:text/html;charset=utf-8');//设置字符编码

define('ROOT_PATH',dirname(__FILE__));//定义网站根目录

define('ROOT_URL','http://'.$_SERVER['SERVER_NAME']);//定义根网址

require_once(ROOT_PATH.'/config/profile.inc.php');//引入配置文件

//自动加载类
function __autoload($className){
	if(substr($className,-6) == 'Action'){
		require_once(ROOT_PATH.'/action/'.$className.'.class.php');
	}else if(substr($className,-5) == 'Model'){
		require_once(ROOT_PATH.'/model/'.$className.'.class.php');
	}else if(substr($className,-6) == 'Wechat'){
		require_once(ROOT_PATH.'/wechat/'.$className.'.class.php');
	}else{
		require_once(ROOT_PATH.'/includes/'.$className.'.class.php');
	}
}
//引入模板类文件
require_once(ROOT_PATH.'/smarty/Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = ROOT_PATH.'/templates';//定义模板目录

$smarty->compile_dir = ROOT_PATH.'/templates_c';//定义编译目录

$smarty->config_dir = ROOT_PATH.'/configs';//定义配置目录

$smarty->cache_dir = ROOT_PATH.'/cache';//定义缓存目录

$smarty->caching = false;//定义是否开启缓存,调试时关闭

$smarty->left_delimiter  =  '<{';//定义左定界符

$smarty->right_delimiter = '}>';//定义右定界符

/*通过oauth2.0授权获取用户openid*/
//if(!isset($_SESSION['openid'])){
if(isset($_GET['code'])){
	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".$_GET['code']."&grant_type=authorization_code";
	$json_data = Tool::http_request($url,null);
	$json_obj = json_decode($json_data);
	$_SESSION['openid'] = $json_obj->openid;

}
//}
$_SESSION['openid'] = 'olzFhwIBtg0A42WljUf8KxmK9lvg';
//$_SESSION['openid'] = 'olzFhwEwcw0Hl3_C4mKnNb61JDDk';
