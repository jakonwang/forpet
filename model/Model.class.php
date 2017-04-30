<?php
	//模型基类
	class Model {
		//获取下一个增值ID模型
		protected function nextId($table){
			$sql = "SHOW TABLE STATUS LIKE '$table'";
			$object = $this->one($sql);
			return $object->Auto_increment;
		}
		//获取总记录
		protected function total($sql){
			$db = DB::getDB();
			$result = $db->query($sql);
			$total = $result->num_rows;
			DB::unsetDB($result,$db);
			return $total;
		}
		//查找单个数据模型
		protected function one($sql) {
			$db = DB::getDB();
			$result = $db->query($sql);
			$objects = $result->fetch_object();
			DB::unsetDB($result, $db);
			return $objects;
		}
		
		//查找多个数据模型
		protected function all($sql) {
			$db = DB::getDB();
			$result = $db->query($sql);
			$html = array();
			while (!!$objects = $result->fetch_object()) {
				$html[] = $objects;
			}
			DB::unsetDB($result, $db);
			return Tool::htmlString($html);
		}
		//增删修模型
		protected function aud($sql) {
			$db = DB::getDB();
			$db->query($sql);
			$affected_rows = $db->affected_rows;
			DB::unsetDB($result = null, $db);
			return $affected_rows;
		}
		//执行多条sql语句
		protected function multi($sql){
			$db = DB::getDB();
			$db->multi_query($_sql);
			DB::unsetDB($result = null, $db);
			return true;
		}
	}
?>