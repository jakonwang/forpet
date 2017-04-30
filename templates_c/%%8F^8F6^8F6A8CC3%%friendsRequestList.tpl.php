<?php /* Smarty version 2.6.30, created on 2017-02-27 16:05:00
         compiled from message/friendsRequestList.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--消息--好友申请列表</title>
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
<body>
	<!-- S header -->
	<header id='header'>
		<span>好友申请列表</span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!-- E header -->
	<main id="friendsRequest">
		<ul>
		<?php if ($this->_tpl_vars['friendsRequestList']): ?>
			<?php $_from = $this->_tpl_vars['friendsRequestList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<li class='item'><a href="#">
				<img src="<?php echo $this->_tpl_vars['item']->headimgurl; ?>
" alt="" class='headimgurl'>
				<div class="desc">
					<h2><?php echo $this->_tpl_vars['item']->nickname; ?>
</h2>
					<p class='request'><?php echo $this->_tpl_vars['item']->content; ?>
</p>
				</div>
				<a href="friends.php?action=acceptFriend&fid=<?php echo $this->_tpl_vars['item']->rid; ?>
" class="btn">接受</a>
			</a></li>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
		</ul>
	</main>
</body>
</html>