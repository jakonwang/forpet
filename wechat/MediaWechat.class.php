<?php
/*素材类*/
class MediaWechat{
	private $jsonMenu;//json菜单字符串
	private $url;
	private $mediaId;//媒体ID
	private $access_token;//定义access_token票据
	private $path = MEDIA_DIR;//媒体文件保存目录
	private $linktoday;//当前目录
	private $today;//当前全路径
	private $filename;//文件名
	//媒体文件类型，分别有图片（image）、语音（voice）、视频（video）和缩略图（thumb）
	private $mediaType;
	public function __construct($token){
		$this->access_token = $token;
	}
	/*checkPath()验证目录*/
	private function checkPath(){
		/*验证媒体主目录*/
		if(!is_dir($this->path) || !is_writable($this->path)){
			if(!mkdir($this->path,0777,true)){
				Tool::alertBack('媒体主目录创建失败,请将此问题反馈给管理员!');
			}
		}
		/*验证媒体子目录*/
		if(!is_dir($this->today) || !is_writable($this->today)){
			if(!mkdir($this->today,0777,true)){
				Tool::alertBack('媒体子目录创建失败,请将此问题反馈给管理员!');
			}
		}
	}
	/*getMedia()获取媒体文件*/
	public function getMedia($mediaId){
		$this->mediaId = $mediaId;
		$this->url = "https://api.weixin.qq.com/cgi-bin/media/get?access_token=".$this->access_token."&media_id=".$this->mediaId;
		$arr = Tool::http_request($this->url,null);
		return $arr;
	}
	/*saveMedia()保存媒体文件*/
	public function saveMedia($mediaId){
		$this->linktoday = date('Ymd').'/';
		$this->filename = date('YmdHis').mt_rand(100,1000).'.jpg';
		$urlname = ROOT_URL.MEDIA_DIR.$this->linktoday.$this->filename;
		$this->today = ROOT_PATH.MEDIA_DIR.$this->linktoday;
		$this->path = ROOT_PATH.MEDIA_DIR;
		$truename = $this->path.$this->linktoday.$this->filename;
		$this->mediaId = $mediaId;
		$this->checkPath();
		$data = $this->getMedia($this->mediaId);
		if(!file_put_contents($truename,$data)){
			Tool::alertBack('文件保存失败!');
		}
		return $urlname;
	}
	/*createMedia()创建媒体文件
	*$data array
	*/
	public function createMedia($mediaType,$data){
		$this->mediaType = $mediaType;
		$this->url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=".$this->access_token."&type=".$this->mediaType;
		$arr = Tool::http_request($this->url,$data);
		return $arr;
	}
}