<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠主页--在线聊天</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,height=device-height"/>
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- 反运营商劫持 S -->
	<style type="text/css">
    html {
        display:none;
    }
    </style>
    <script>
    if( self == top ) {
        document.documentElement.style.display = 'block' ;
    } else {
        top.location = self.location ;
    }
    /*反运营商劫持 E*/
    /*图片预加载*/
    function loadImage(url, callback) {     
    var img = new Image(); //创建一个Image对象，实现图片的预下载     
    img.onload = function(){
        img.onload = null;
        callback(img);
    }
    	img.src = url; 
	}
    </script>
	<!--normalize.css for reset stylesheet-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/normalize.css">
	<!--common.css-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/common.css">
	<!--my.css-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/my.css">
</head>
<body id='chat-bg'>
	<!-- S head-portrait -->
	<header id='header'>
		<span><{$receiverInfo->nickname}></span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!-- E head-portrait -->
	<!-- S chat -->
	<main id="chat">
		<{if $readMessage}>
			<{foreach from=$readMessage key=key item=item}>
			<div class="time"><{$item->chat_time}></div>
			<div class="<{$item->position}>">
				<a href="#"  class="headimgurl"><img src="<{$item->headimgurl}>" alt=""></a>
			<div class="msg"><{$item->content}></div>
			</div>
			<{/foreach}>
		<{/if}>
	</main>
	<!-- E chat -->
	<footer id='footer-tool'>
		<input type="hidden" name='sender' value='<{$senderInfo->id}>'>
		<input type="hidden" name='receiver' value='<{$receiverInfo->id}>'>
		<input type="hidden" name='senderHead' value='<{$senderInfo->headimgurl}>'>
		<input type="hidden" name='receiverHead' value='<{$receiverInfo->headimgurl}>'>
		<div class="footer-left">
			<span class='voice'><img src="images/my/voice.png" alt=""></span>
		</div>
		<div class="footer-right">
			<span class="smile-look"><img src="images/my/smile.png" alt=""></span>
			<input type="button" value="发送" class='send' id='send'>
		</div>
		<div class="content" contenteditable='true'></div>
	</footer>
<script src='<{$smarty.const.ROOT_URL}>/js/jquery-3.1.1.min.js'></script>
<script src='<{$smarty.const.ROOT_URL}>/js/friendsChat.js'></script>
</body>
</html>