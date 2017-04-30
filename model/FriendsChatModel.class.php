<?php
/*好友交流模型*/
class FriendsChatModel extends Model{
	private $id;
	private $sender;
	private $receiver;
	private $content;
	private $chat_time;
	private $receiverRead;
	/*魔术方法*/
	public function __set($key,$value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
	/*添加交流内容*/
	public function addChat(){
		$sql = "INSERT INTO
					`friends_chat`
					(id,sender,receiver,chat_time,content,receiverRead)
					VALUES(
					DEFAULT,
					'{$this->sender}',
					'{$this->receiver}',
					'{$this->chat_time}',
					'{$this->content}',
					'0'
					)";
		return parent::aud($sql);
	}
	/*获取未读消息(接收者未读消息)*/
	public function getUnReadMessage(){
		$sql = "SELECT
					id,sender,receiver,chat_time,content
				FROM
					`friends_chat`
				WHERE
					`sender` = '{$this->receiver}' 
					AND 
					`receiver` = '{$this->sender}'
					AND
					`receiverRead` = 0
				LIMIT 1";
		// echo $sql;
		// exit;
		return parent::one($sql);
	}
	/*获取最近的聊天记录*/
	public function getReadMessage(){
		$sql = "SELECT
					id,sender,receiver,chat_time,content
				FROM
					`friends_chat`
				WHERE
					(`sender`='{$this->receiver}' AND  `receiver`='{$this->sender}'
					 AND `receiverRead` = 1)
					OR
					(`sender`='{$this->sender}' AND  `receiver`='{$this->receiver}'
					 AND `receiverRead` IN(0,1))
				ORDER BY `chat_time` DESC
				LIMIT 0,20";
		return parent::all($sql);
	}
	/*更新未读消息为已读消息*/
	public function updateUnReadMessage(){
		$sql = "UPDATE
				`friends_chat`
				SET
					`receiverRead` = 1
				WHERE
					`sender` = '{$this->receiver}'
				AND
					`receiver` = '{$this->sender}'
				AND
					`receiverRead` = 0
				LIMIT 1";
		return parent::aud($sql);
	}
}