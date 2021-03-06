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
	<header id='header'>个人资料
	<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!-- E header -->
	<!-- S personal-data -->
	<main id="personal-data">
		<ul>
			<li class='personal-img'><a href="##">头像<img src="<{$headimgurl}>" alt=""></a></li>
			<li><a href="##">昵称<span><{$nickname}></span></a></li>
			<li><a href="##">寻宠号<span><{$id}></span></a></li>
			<li><a href="##">寻宠认证</a></li>
			<li><a href="##">二维码</a></li>
			<li><a href="##">性别<span><{$sex}></span></a></li>
			<li><a href="##">年龄<span>12</span></a></li>
			<li><a href="##">城市<span><{$country}> <{$province}> <{$city}></span></a></li>
		</ul>
	</main>
	<!-- E personal-data -->
	<!--S footer-->
	<footer id='footer'>
		<a href="index.php" class='home'>
			<span></span>
			<p>寻宠</p>
		</a>
		<a href="community.php" class='community'>
			<span></span>
			<p>社区</p>
		</a>
		<a href="service.php" class='service'>
			<span></span>
			<p>服务</p>
		</a>
		<a href="message.php" class='message'>
			<span></span>
			<p>消息</p>
		</a>
		<a href="my.php" class='my'>
			<span class='hover'></span>
			<p>我的</p>
		</a>
	</footer>
	<!--E footer-->
</body>
</html>