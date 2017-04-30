<?php /* Smarty version 2.6.30, created on 2017-02-27 17:18:26
         compiled from service/encyclopediaDetail.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠主页--寻宠百科--标题</title>
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
	<!--service.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/service.css">
</head>
<body class='article-body'>
	<!--S header-->
	<header id='header'>
		<span>详情</span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E header-->
	<!--S encyclopedia-detail-->
	<main class='encyclopedia-detail'>
		<header class='article-top'>
			<h2 class="title"><?php echo $this->_tpl_vars['oneArticle']->title; ?>
</h2>
			<p class='desc'>作者：<?php echo $this->_tpl_vars['oneArticle']->writer; ?>
<time class='pubdate'><?php echo $this->_tpl_vars['oneArticle']->lastpost; ?>
</time></p>
		</header>
		<div class="content">
				<?php echo $this->_tpl_vars['oneArticle']->body; ?>

		</div>
		<!--S recommend-->
		<h3 class='recommend-title'>相关推荐</h3>
		<ul class="recommend">
			<li><a href="#">
					<img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="">
					<h3>地球史上最丑狗排行榜Top10</h3>
					<span class="view">4</span>
				</a>
			</li>
			<li><a href="#">
					<img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="">
					<h3>地球史上最丑狗排行榜Top10</h3>
					<span class="view">4435</span>
				</a>
			</li>
			<li><a href="#">
					<img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="">
					<h3>地球史上最丑狗排行榜Top10</h3>
					<span class="view">4435</span>
				</a>
			</li>
			<li><a href="#">
					<img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="">
					<h3>地球史上最丑狗排行榜Top10</h3>
					<span class="view">4435</span>
				</a>
			</li>
			<li><a href="#">
					<img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="">
					<h3>地球史上最丑狗排行榜Top10</h3>
					<span class="view">4435</span>
				</a>
			</li>
		</ul>
		<!--E recommend-->
	</main>
	<!--E encyclopedia-detail-->
</body>
</html>