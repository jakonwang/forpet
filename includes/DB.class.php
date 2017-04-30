<?php
//数据库连接类
class DB{
	/*获取对象句柄*/
	public static function getDB(){
		$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if(mysqli_connect_errno()){
			echo '数据库连接错误！错误代码：'.mysqli_connect_error();
			exit();
		}
		$mysqli->set_charset('utf8');
		return $mysqli;
	}
	/*清理结果集和数据库连接*/
	public static function unsetDB(&$result,$db){
		if(is_object($result)){
			$result->free();
			$result = null;
		}
		if(is_object($db)){
			$db->close();
			$db = null;
		}
	}
}