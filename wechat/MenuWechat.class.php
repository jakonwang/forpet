<?php
/*定义菜单类,可以添加,修改,删除,获取*/
class MenuWechat{
	private $jsonMenu;//json菜单字符串
	private $url;
	private $access_token;//定义access_token票据
	public function __construct($token){
		$this->access_token = $token;
	}
	/*getMenu()获取菜单*/
	public function getMenu(){
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$this->access_token;
		$arr = Tool::http_request($this->url,null);
		return $arr;
	}
	/*createMenu()创建*/
	public function createMenu($jsondata){
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->access_token;
		$this->jsonMenu = $jsondata;
		$arr = Tool::http_request($this->url,$this->jsonMenu);
		return $arr;
	}
	/*deleteMenu()删除菜单*/
	public function deleteMenu(){
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$this->access_token;
		$arr = Tool::http_request($this->url,null);
		return $arr;
	}
}