<?php
class KeFuMessageWechat{
	private $url;//发送地址
	private $access_token;//票据
	private $touser;//微信用户openid
	public function __construct($token){
		$this->access_token = $token;
		$this->url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$this->access_token;
	}
	/*sendText()发送文本消息*/
	public function sendText($touser,$content){
		$this->touser = $touser;
		//对发送的内容进行urlencode编码，防止中文乱码
		$contentStr = urlencode($content);
		$content_arr = array('content' => "{$contentStr}");
		$reply_arr = array('touser'=>"{$this->touser}","msgtype"=>'text','text'=>$content_arr);
		//编码成json格式
		$post = json_encode($reply_arr);
		//url解码
		$post = urldecode($post);
		Tool::http_request($this->url,$post);
	}
	/*sendImage()发送图片*/
	public function sendImage($touser,$media_id){
		$this->touser = $touser;
		$image_arr = array('media_id' => "{$media_id}");
		$reply_arr = array('touser'=>"{$this->touser}","msgtype"=>'image','image'=>$image_arr);
		//编码成json格式
		$post = json_encode($reply_arr);
		Tool::http_request($this->url,$post);
	}
	/*sendVoice()发送语音消息*/
	public function sendVoice($touser,$media_id){
		$this->touser = $touser;
		$voice_arr = array('media_id' => "{$media_id}");
		$reply_arr = array('touser'=>"{$this->touser}","msgtype"=>'voice','voice'=>$voice_arr);
		//编码成json格式
		$post = json_encode($reply_arr);
		Tool::http_request($this->url,$post);
	}
	/*sendVideo()发送视频消息*/
	public function sendVideo($touser,$media_id,$title,$description){
		$this->touser = $touser;
		$title = urlencode($title);
		$description = urlencode($description);
		$video_arr = array('media_id' => "{$media_id}",'thumb_media_id'=>"{$media_id}",'title'=>"$title",'description'=>"$description");
		$reply_arr = array('touser'=>"{$this->touser}","msgtype"=>'video','video'=>$video_arr);
		//编码成json格式
		$post = json_encode($reply_arr);
		$post = urldecode($post);
		Tool::http_request($this->url,$post);
	}
	/*sendMusic()发送音乐消息*/
	public function sendMusic($touser,$title,$description,$musicurl,$hqmusicurl,$thumb_media_id){
		$this->touser = $touser;
		$title = urlencode($title);
		$description = urlencode($description);
		$music_arr = array('title' => "{$title}",'description'=>"{$description}",'musicurl'=>"$musicurl",'hqmusicurl'=>"$hqmusicurl",'thumb_media_id'=>"$thumb_media_id");
		$reply_arr = array('touser'=>"{$this->touser}","msgtype"=>'music','music'=>$music_arr);
		//编码成json格式
		$post = json_encode($reply_arr);
		$post = urldecode($reply_arr);
		Tool::http_request($this->url,$post);
	}
	/*sendNews()发送图文消息,$news是一个二维数组*/
	public function sendNews($touser,$news){
		$this->touser = $touser;
		$news_arr = array();
		foreach($news as $key=>$value){
			$news_arr[$key]['title'] = urlencode($value['title']);
			$news_arr[$key]['description'] = urlencode($value['description']);
			$news_arr[$key]['url'] = $value['url'];
			$news_arr[$key]['picurl'] = $value['picurl'];
		}
		$article_arr = array('articles'=>$news_arr);
		$reply_arr = array('touser'=>"{$this->touser}","msgtype"=>'news','news'=>$article_arr);
		$post = json_encode($reply_arr);
		$post = urldecode($post);
		Tool::http_request($this->url,$post);
	}
}