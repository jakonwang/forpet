<?php
//引入初始化文件
require_once(dirname(__FILE__).'/init.inc.php');
//define your token
define("TOKEN", "weixin");
$wechatObj = new wechat();
//当接入成功后，请注销这句话，否则，会反复验证。
//$wechatObj->valid();
//添加响应请求的语句
$wechatObj->responseMsg();
class wechat
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];
        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
      	//解析post数据
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $access_token = TokenWechat::getToken();//访问票据
				switch($postObj->MsgType){
					case 'event':
						//第一次关注事件
						if($postObj->Event == 'subscribe'){
							$contentStr = '欢迎关注寻宠网';
							$textTpl = MessageWechat::textMessage();
							$resultStr = sprintf($textTpl,$fromUsername,$toUsername,$time,$contentStr);
							echo $resultStr;
							/*获取用户基本信息并且添加微信用户*/
							$user = new UserWechat($access_token,$fromUsername);
							$userinfo = $user->getUserInfo();
							/*需要过滤昵称表情符号*/
							$sql = "INSERT INTO 
										`wx_user`
										(id,openid,nickname,sex,city,country,province,headimgurl,subscribe_time) 
										VALUES
										(DEFAULT,
										'{$userinfo->openid}',
										'{$userinfo->nickname}',
										'{$userinfo->sex}',
										'{$userinfo->city}',
										'{$userinfo->country}',
										'{$userinfo->province}',
										'{$userinfo->headimgurl}',
										'{$userinfo->subscribe_time}'
										)";
							$user->addWxUser($sql);
							$_SESSION['openid'] = $userinfo->openid;
						}elseif($postObj->Event == 'unsubscribe'){
							/*微信用户取消关注时删除用户数据*/
							$sql = "DELETE FROM `wx_user` WHERE openid='{$fromUsername}' LIMIT 1";
							$user = new UserWechat(null,null);
							$user->delWxUser($sql);
						}
						break;
					/*用户上传图片*/
					case 'image':
						echo '';
						break;
					/*用户发送文本*/
					case 'text':
						echo '';
						break;
					default:
						echo '';
						break;
				}

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>