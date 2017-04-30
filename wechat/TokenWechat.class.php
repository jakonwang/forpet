<?php
class TokenWechat{
	private static $access_token;//访问票据
	public static function createToken($file){
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
		$data = Tool::http_request($url,null);
		$json_token = json_decode($data,true);
		$access_token = $json_token['access_token'];
		file_put_contents($file, $access_token);
		self::$access_token = $access_token;
	}
	public static function getToken(){
		$tokenFile = ROOT_PATH.'/token.txt';
		/*如果token文件不存在*/
		if(!file_exists($tokenFile)){
			self::createToken($tokenFile);
		}else{
			/*如果token文件修改时间超过2个小时*/
			if(time()-filemtime($tokenFile) > 7000){
				self::createToken($tokenFile);
			}else{
				self::$access_token = file_get_contents($tokenFile);
			}
		}
		return self::$access_token;
	}
}


