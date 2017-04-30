<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--服务--一起来遛狗</title>
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
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/service.css">
</head>
<body id='for-pet-service'>
	<!-- S header -->
	<header id='header'>一起来遛狗
		<div id="return" onclick='javascript:history.back();'></div>
		<div id='create-group'>创建</div>
	</header>
	<!-- E header -->
	<!-- S my-pet-list -->
	<main id='walk-dog'>
		<div id="walk-dog-place"><a href="###">广东金融学院</a></div>
		<ul>
			<li>
				<div class='walk-dog-thumb'><img src="<{$smarty.const.ROOT_URL}>/images/thumb.jpg" alt=""></div>
				<div class='walk-dog-desc'>
					<h2 class='walk-dog-name'>广金泰迪群</h2>
					<p class='walk-dog-place'>广东金融学院中指广场</p>
					<p class='walk-dog-time'>每天20:00</p>
				</div>
				<div id='walk-dog-add'><a href='#' class='walk-dog-add'>加入</a></div>
			</li>
			<li>
				<div class='walk-dog-thumb'><img src="<{$smarty.const.ROOT_URL}>/images/thumb.jpg" alt=""></div>
				<div class='walk-dog-desc'>
					<h2 class='walk-dog-name'>广金泰迪群</h2>
					<p class='walk-dog-place'>广东金融学院中指广场</p>
					<p class='walk-dog-time'>每天20:00</p>
				</div>
				<div id='walk-dog-add'><a href='#' class='walk-dog-add'>加入</a></div>
			</li>
			<li>
				<div class='walk-dog-thumb'><img src="<{$smarty.const.ROOT_URL}>/images/thumb.jpg" alt=""></div>
				<div class='walk-dog-desc'>
					<h2 class='walk-dog-name'>广金泰迪群</h2>
					<p class='walk-dog-place'>广东金融学院中指广场</p>
					<p class='walk-dog-time'>每天20:00</p>
				</div>
				<div id='walk-dog-add'><a href='#' class='walk-dog-add'>加入</a></div>
			</li>
			<li>
				<div class='walk-dog-thumb'><img src="<{$smarty.const.ROOT_URL}>/images/thumb.jpg" alt=""></div>
				<div class='walk-dog-desc'>
					<h2 class='walk-dog-name'>广金泰迪群</h2>
					<p class='walk-dog-place'>广东金融学院中指广场</p>
					<p class='walk-dog-time'>每天20:00</p>
				</div>
				<div id='walk-dog-add'><a href='#' class='walk-dog-add'>加入</a></div>
			</li>
			<li>
				<div class='walk-dog-thumb'><img src="<{$smarty.const.ROOT_URL}>/images/thumb.jpg" alt=""></div>
				<div class='walk-dog-desc'>
					<h2 class='walk-dog-name'>广金泰迪群</h2>
					<p class='walk-dog-place'>广东金融学院中指广场</p>
					<p class='walk-dog-time'>每天20:00</p>
				</div>
				<div id='walk-dog-add'><a href='#' class='walk-dog-add'>加入</a></div>
			</li>
			<li>
				<div class='walk-dog-thumb'><img src="<{$smarty.const.ROOT_URL}>/images/thumb.jpg" alt=""></div>
				<div class='walk-dog-desc'>
					<h2 class='walk-dog-name'>广金泰迪群</h2>
					<p class='walk-dog-place'>广东金融学院中指广场</p>
					<p class='walk-dog-time'>每天20:00</p>
				</div>
				<div id='walk-dog-add'><a href='#' class='walk-dog-add'>加入</a></div>
			</li>
		</ul>
	</main>
	<!-- E my-pet-list -->
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
</body>
</html>