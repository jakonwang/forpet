<?php /* Smarty version 2.6.30, created on 2017-02-27 17:18:06
         compiled from my/myAdopt.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--我的--我的领养</title>
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
	<!--forpet.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/my.css">
</head>
<body>
	<!--S header-->
	<header id='header'><span>我的领养</span>
		<div id="return" onclick='javascript:history.back();'></div>
		<a href="adopt.php?action=add" class='add-btn'></a>
	</header>
	<!--E header-->
	<!--S myAdopt-->
	<main id='myAdopt'>
		<ul>
		<?php if ($this->_tpl_vars['adoptList']): ?>
			<?php $_from = $this->_tpl_vars['adoptList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<li class='item'><a href="<?php echo @ROOT_URL; ?>
/adopt.php?action=detail&id=<?php echo $this->_tpl_vars['item']->id; ?>
">
					<img src="<?php echo $this->_tpl_vars['item']->imgsrc[0]; ?>
" alt="" class='thumb'>
					<h3><?php echo $this->_tpl_vars['item']->description; ?>
</h3>
					<div class="desc">
						<span class='tag'><?php echo $this->_tpl_vars['item']->category_name; ?>
</span>
						<span class='sex'><img src="images/my/mypet<?php echo $this->_tpl_vars['item']->sex; ?>
.png" alt=""></span>
						<span class='age'><?php echo $this->_tpl_vars['item']->age; ?>
岁</span>
						<span class="pubdate"><?php echo $this->_tpl_vars['item']->pubdate; ?>
</span>
					</div>
				</a>
			</li>
			<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
			<li class='nodata'>没有任何数据</li>
		<?php endif; ?>
		</ul>
	</main>
	<!--E myAdopt-->
</body>
</html>