<?php /* Smarty version 2.6.30, created on 2017-03-11 16:47:11
         compiled from my/friendsChat.tpl */ ?>
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
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/normalize.css">
	<!--common.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/common.css">
	<!--my.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/my.css">
</head>
<body id='chat-bg'>
	<!-- S head-portrait -->
	<header id='header'>
		<span><?php echo $this->_tpl_vars['receiverInfo']->nickname; ?>
</span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!-- E head-portrait -->
	<!-- S chat -->
	<main id="chat">
		<?php if ($this->_tpl_vars['readMessage']): ?>
			<?php $_from = $this->_tpl_vars['readMessage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<div class="time"><?php echo $this->_tpl_vars['item']->chat_time; ?>
</div>
			<div class="<?php echo $this->_tpl_vars['item']->position; ?>
">
				<a href="#"  class="headimgurl"><img src="<?php echo $this->_tpl_vars['item']->headimgurl; ?>
" alt=""></a>
			<div class="msg"><?php echo $this->_tpl_vars['item']->content; ?>
</div>
			</div>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	</main>
	<!-- E chat -->
	<footer id='footer-tool'>
		<input type="hidden" name='sender' value='<?php echo $this->_tpl_vars['senderInfo']->id; ?>
'>
		<input type="hidden" name='receiver' value='<?php echo $this->_tpl_vars['receiverInfo']->id; ?>
'>
		<input type="hidden" name='senderHead' value='<?php echo $this->_tpl_vars['senderInfo']->headimgurl; ?>
'>
		<input type="hidden" name='receiverHead' value='<?php echo $this->_tpl_vars['receiverInfo']->headimgurl; ?>
'>
		<div class="footer-left">
			<span class='voice'><img src="images/my/voice.png" alt=""></span>
		</div>
		<div class="footer-right">
			<span class="smile-look"><img src="images/my/smile.png" alt=""></span>
			<input type="button" value="发送" class='send' id='send'>
		</div>
		<div class="content" contenteditable='true'></div>
	</footer>
<script src='<?php echo @ROOT_URL; ?>
/js/jquery-3.1.1.min.js'></script>
<script src='<?php echo @ROOT_URL; ?>
/js/friendsChat.js'></script>
</body>
</html>