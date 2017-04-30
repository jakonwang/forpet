<?php
//验证类
class Validate{
	//是否为空
	public static function checkNull($data){
		if(trim($data) == ''){
			return true;
		}
		return false;
	}
	//长度是否合法
	public static function checkLength($data,$length,$flag){
		if($flag == 'min'){
			if(mb_strlen(trim($data),'utf-8') < $length){
				return true;
			}
			return false;
		}else if($flag == 'max'){
			if(mb_strlen(trim($data),'utf-8') > $length){
				return true;
			}
			return false;
		}else if($flag == 'equals'){
			if(mb_strlen(trim($data),'utf-8') != $length){
				return true;
			}
			return false;
		}else{
			Tool::alertBack('参数传递有误,必须为min,max');
		}
	}
	//数据是否一致
	public static function checkEquals($data,$otherdata){
		if(trim($data) != trim($otherdata)){
			return true;
		}
		return false;
	}
	/*验证是否为手机号码或者电话号码*/
	public static function checkTelephone($data){
		$pattern = '/^1\d{10}$|^(0\d{2,3}-?|\(0\d{2,3}\))?[1-9]\d{4,7}(-\d{1,8})?$/';
		if(!preg_match($pattern,trim($data))){
			return true;
		}
		return false;
	}
	/*验证年龄*/
	public static function checkAge($data){
		$pattern = '/^[0-9]{1,2}$/';
		if(!preg_match($pattern,trim($data))){
			return true; 
		}
		return false;
	}
	/*验证值大于或者小于某个值*/
	public static function checkValue($data,$flag,$than){
		if($flag == 'less'){
			if(trim($data) < $than){
				return true;
			}
		}else if($flag == 'more'){
			if(trim($data) > $than){
				return true;
			}
		}else if($flag == 'equals'){
			if(trim($data) == $than){
				return true;
			}
		}
		return false;
	}
	/*checkDate($data)验证日期如2017-02-14*/
	public static function checkDate($data){
		$dateFormat = '/^(([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8]))))|((([0-9]{2})(0[48]|[2468][048]|[13579][26])|((0[48]|[2468][048]|[3579][26])00))-02-29)$/';
		if(!preg_match($dateFormat,$data)){
			return true;
		}
		return false;
	}
}