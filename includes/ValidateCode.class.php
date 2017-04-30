<?php
//验证码类
class ValidateCode{
	private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHIKLMNPRSTUVWXYZ23456789';//随机因子
	private $code;//验证码
	private $codelen = 4;//验证码长度
	private $img;//图像资源句柄
	private $width = 130;
	private $height = 50;
	private $font;//指定的字体
	private $fontsize = 20;//字体大小
	private $fontcolor;//字体颜色
	//构造方法初始化
	public function __construct(){
		$this->font = ROOT_PATH.'/css/font/elephant.ttf';
	}
	//生成随机码
	public function createCode(){
		$len = strlen($this->charset) - 1;
		for($i=0;$i<$this->codelen;$i++){
			$this->code .= $this->charset[mt_rand(0,$len)];
		}
		return $this->code;
	}
	//生成背景
	private function  createBg(){
		$this->img = imagecreatetruecolor($this->width, $this->height);
		$color = imagecolorallocate($this->img,mt_rand(157,255),mt_rand(157,255),mt_rand(157,255));
		imagefilledrectangle($this->img, 0, $this->height, $this->width, 0, $color);
	}
	//生成文字
	private function createFont(){
		$this->fontcolor = imagecolorallocate($this->img, mt_rand(0,156), mt_rand(0,156), mt_rand(0,156));
		$_x = $this->width / $this->codelen;
		for($i=0;$i<$this->codelen;$i++){
			imagettftext($this->img, $this->fontsize, mt_rand(-30,30), $_x*$i+mt_rand(1,5), $this->height/1.4, $this->fontcolor, $this->font, $this->code[$i]);
		}
	}
	//生成线条和雪花
	private function createLine(){
		for($i=0;$i<5;$i++){
			$color = imagecolorallocate($this->img, mt_rand(0,156), mt_rand(0,156), mt_rand(0,156));
			imageline($this->img, mt_rand(0,$this->width), mt_rand(0,$this->height), mt_rand(0,$this->width), mt_rand(0,$this->height), $color);
		}
		for($i=0;$i<50;$i++){
			$color = imagecolorallocate($this->img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
			imagestring($this->img, 1, mt_rand(1,$this->width), mt_rand(1,$this->height), '*', $color);
		}
	}
	//输出图像
	private function outPut(){
		ob_clean();/*解决验证码不显示*/
		header('Content-type:image/png');
		imagepng($this->img);
		imagedestroy($this->img);
	}
	//输入验证码
	public function doImg(){
		$this->createBg();
		// $this->createLine();
		$this->createCode();
		$this->createFont();
		$this->outPut();

	}
	//获取验证码
	public function getCode(){
		return strtolower($this->code);
	}
}