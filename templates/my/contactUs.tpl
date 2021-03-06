<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--个人资料</title>
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
	<link rel="stylesheet" href="../css/normalize.css">
	<!--common.css-->
	<link rel="stylesheet" href="../css/common.css">
	<!--my.css-->
	<link rel="stylesheet" href="../css/my.css">
</head>
<body id='my-setting'>
	<!-- S header -->
	<header id='header'>联系我们
	<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!-- E header -->
	<!-- S contact-us -->
	<main id='contact-us'>
		<ul>
			<li>
				<h2>联系电话</h2>
				<p class='contact-time'>服务时间：周一至周日，10:00-19:00</p>
				<p class='contact-tel'><a href="tel:400-000-0000">400-000-0000</a></p>
			</li>
			<li>
				<h2>在线咨询</h2>
				<p class='contact-time'>服务时间：周一至周日，10:00-19:00</p>
				<p class='contact-tel'><a href="tel:400-000-0000">点击找客服</a></p>
			</li>
		</ul>
	</main>
	<!-- E contact-us -->
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
</body>
</html>