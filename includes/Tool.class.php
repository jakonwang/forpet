<?php
class Tool{
	/*cURL()函数封装,可以进行get或post请求*/
	public static function http_request($url,$data=null){
		$ch = curl_init();//初始化
		//设置变量
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		/*判断是否通过post请求*/
		if(!empty($data)){
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//执行
		$output = curl_exec($ch);
		//释放cURL句柄
		curl_close($ch);
		/*返回数组,如果使用json_decode($output)解析的话，将会得到object类型的数据*/
		//$output_array = json_decode($output,true);
		return $output;
	}
	//弹窗跳转
	public static function alertLocation($_info, $_url) {
		if(!empty($_info)){
			echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
			exit();
		}else{
			header("Location:$_url");
			exit();
		}
	}
	//弹窗返回
	public static function alertBack($_info) {
		echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
		exit();
	}
	//显示过滤
	public static function htmlString($data){
		if(is_array($data)){
			foreach($data as $key=>$value){
				$string[$key] = Tool::htmlString($value);//递归
			}
		}else if(is_object($data)){
			foreach($data as $key=>$value){
				$string->$key = Tool::htmlString($value);//递归
			}
		}else{
			$string = htmlspecialchars($data);
		}
		return $string;
	}
	/*过滤表情字符*/
	public static function modifier_emoji($string)
	{       
	    return preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $string);
	}
	/** 
     * formatDate()时间格式化 
     */  
    public static function formatDate($time){  
        $rtime = date ( "m-d H:i", $time );  
        $htime = date ( "H:i", $time ); 
        $time = time () - $time;
        if ($time < 60) {
            $str = '刚刚';
        } elseif ($time < 60 * 60) {  
            $min = floor ( $time / 60 );  
            $str = $min . '分钟前';
        } elseif ($time < 60 * 60 * 24) {
            $h = floor ( $time / (60 * 60) );
            $str = $h . '小时前 ' . $htime;
        } elseif ($time < 60 * 60 * 24 * 3) {
            $d = floor ( $time / (60 * 60 * 24) );
            if ($d == 1)
                $str = '昨天 ' . $rtime;
            else
                $str = '前天 ' . $rtime;
        } else {
            $str = $rtime;
        }
        return $str;
    }
    /*截取字符*/
    public static function getDescription($data,$length,$encode){
    	if(mb_strlen($data,$encode) > $length){
    		return mb_substr($data,0,$length,$encode).'...';
    	}
    	return $data;
    }
}