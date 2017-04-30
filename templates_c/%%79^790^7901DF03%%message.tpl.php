<?php /* Smarty version 2.6.30, created on 2017-02-27 15:00:14
         compiled from message/message.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--消息</title>
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
/css/message.css">
</head>
<body id='message-body'>
	<!-- S header -->
	<header id='message-header'>
		<nav>
			<ul>
				<li class='now'>消息</li>
				<li>通讯录</li>
			</ul>
		</nav>
	</header>
	<!-- E header -->
	<main id="message-main">
		<ul>
			<li>
				<div class='message-thumb'><img src="<?php echo @ROOT_URL; ?>
/images/message/fabulous.png" alt=""></div>
				<div id='message-desc'>
					<p class='message-title'>赞</p>
					<p class='message-desc'>柔情似水赞了你</p>
				</div>
				<div class='message-date'>3天前</div>
			</li>
			<li>
				<div class='message-thumb'><img src="<?php echo @ROOT_URL; ?>
/images/message/comment.png" alt=""></div>
				<div id='message-desc'>
					<p class='message-title'>评论</p>
					<p class='message-desc'>软糖少女评论了你</p>
				</div>
				<div class='message-date'>3天前</div>
			</li>
			<li>
				<div class='message-thumb'><img src="<?php echo @ROOT_URL; ?>
/images/message/notice.png" alt=""></div>
				<div id='message-desc'>
					<p class='message-title'>通知</p>
					<p class='message-desc'>请完善您的资料</p>
				</div>
				<div class='message-date'>3天前</div>
			</li>
			<?php if ($this->_tpl_vars['totalRequest']): ?>
			<li>
				<a href="friends.php?action=showRequest"><div class='message-thumb'><img src="<?php echo @ROOT_URL; ?>
/images/message/addFriends.png" alt=""></div>
				<div id='message-desc'>
					<p class='message-title'>好友验证申请</p>
					<p class='message-desc'>您有<?php echo $this->_tpl_vars['totalRequest']; ?>
条好友申请，请查看</p>
				</div>
				<div class='message-date'></div>
				</a>
			</li>
			<?php endif; ?>
		</ul>
	</main>
	<!--S footer-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--E footer-->
</body>
</html>