<?php /* Smarty version 2.6.30, created on 2017-02-27 16:02:11
         compiled from my/addFriends.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠主页--我的--添加好友</title>
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
<body>
	<!--S header-->
	<header id='header'>
		<span>DELPHI</span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E header-->
	<main id='addFriends'>
		<form action="friends.php?action=addFriends" class='addFriends-form' method='post'>
			<label for="">您需要发送验证申请，等对方通过</label>
			<div class="form-control">
				<input type="hidden" value='<?php echo $this->_tpl_vars['uid']; ?>
' name='uid'>
				<input type="hidden" value='<?php echo $this->_tpl_vars['rid']; ?>
' name='rid'>
				<textarea id="content" name='content'></textarea>
				<span id='clear'></span>
			</div>
			<p class='error'></p>
			<button type='submit' class='confirm' name='send'>提交申请</button>
		</form>
	</main>
<script src='<?php echo @ROOT_URL; ?>
/js/jquery-3.1.1.min.js'></script>
<script src='<?php echo @ROOT_URL; ?>
/js/addFriends.js'></script>
</body>
</html>