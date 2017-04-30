<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠主页--我的--个人中心</title>
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
<body id='personal-center'>
	<header>
		<div class="userinfo">
			<img src="images/headimg.jpg" alt="">
			<span>Jakon</span>
		</div>
		<div class="praise">
			被赞 121
		</div>
		<div class="friends">
			粉丝 4
		</div>
	</header>
	<main class='personal-center'>
		<ul id='personalUl'>
			<li class='share'><span>分享</span></li>
			<li class='pets'><span>宠物</span></li>
			<li class='data'><span>资料</span></li>
		</ul>
		<div class="share-data"></div>
		<div class="pets-data"></div>
		<div class="main-data"></div>
	</main>
<script src='<{$smarty.const.ROOT_URL}>/js/jquery-3.1.1.min.js'></script>
</body>
</html>