<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--服务--配对</title>
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
	<header id='header'>配对
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!-- E header -->
	<!-- S pet-pair -->
	<main id='pet-pair'>
		<div id="nowlocation">当前城市：广东 广州<a href="###">更换</a></div>
		<ul>
			<li>
				<div class='pet-pair-img'>
					<a href="##"><img src="<{$smarty.const.ROOT_URL}>/images/thumb.jpg" alt=""></a>
				</div>
				<div class='pet-pair-desc'>
					<p><span class='male'>0</span>弗兰克</p>
					<p><span class='pet-type'>比熊犬</span><span class='pet-age'>6个月</span></p>
					<p>找一个比自己大一点点的狗</p>
				</div>
				<div class='pet-pair-distance'>
					<p class='pet-pair-pubdate'>18小时前</p>
					<p class='pet-pair-location'>25.7km</p>
				</div>
			</li>
			<li>
				<div class='pet-pair-img'>
					<a href="##"><img src="<{$smarty.const.ROOT_URL}>/images/thumb.jpg" alt=""></a>
				</div>
				<div class='pet-pair-desc'>
					<p><span class='female'>1</span>弗兰克</p>
					<p><span class='pet-type'>比熊犬</span><span class='pet-age'>6个月</span></p>
					<p>找一个比自己大一点点的狗</p>
				</div>
				<div class='pet-pair-distance'>
					<p class='pet-pair-pubdate'>18小时前</p>
					<p class='pet-pair-location'>25.7km</p>
				</div>
			</li>
			<li>
				<div class='pet-pair-img'>
					<a href="##"><img src="<{$smarty.const.ROOT_URL}>/images/thumb.jpg" alt=""></a>
				</div>
				<div class='pet-pair-desc'>
					<p><span class='male'>0</span>弗兰克</p>
					<p><span class='pet-type'>比熊犬</span><span class='pet-age'>6个月</span></p>
					<p>找一个比自己大一点点的狗</p>
				</div>
				<div class='pet-pair-distance'>
					<p class='pet-pair-pubdate'>18小时前</p>
					<p class='pet-pair-location'>25.7km</p>
				</div>
			</li>
		</ul>
	</main>
	<!-- E pet-pair -->
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
</body>
</html>