<?php
class UserWechat extends Model{
	private $access_token;//接口调用票据
	private $openid;//用户openid
	private $nickname;//用户昵称
	private $sex;//性别(1男2女0未知)
	private $city;//城市
	private $country;//国家
	private $province;//省份
	private $headimgurl;//用户头像
	private $subscribe_time;//用户关注时间
	public function __construct($access_token=null,$openid=null){
		$this->access_token = $access_token;
		$this->openid = $openid;
	}
	/*getUserInfo()获取微信用户基本信息*/
	public function getUserInfo(){
		$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this->access_token."&openid=".$this->openid."&lang=zh_CN";
		$data = Tool::http_request($url,null);
		$json_data = json_decode($data);
		return $json_data; 
	}
	/*addUser($sql)添加微信用户*/
	public function addWxUser($sql){
		return parent::aud($sql);
	}
	/*deleteUser($sql)删除微信用户*/
	public function delWxUser($sql){
		return parent::aud($sql);
	}
}