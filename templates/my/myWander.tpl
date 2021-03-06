<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--我的--我的流浪线索</title>
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
	<!--forpet.css-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/my.css">
</head>
<body>
	<!--S header-->
	<header id='header'><span>我的流浪线索</span>
		<div id="return" onclick='javascript:history.back();'></div>
		<a href="wanderingClues.php?action=add" class='add-btn'></a>
	</header>
	<!--E header-->
	<!--S myWander-->
	<main id='myWander'>
		<ul>
		<{if $wanderList}>
			<{foreach from=$wanderList key=key item=item}>
			<li class='item'><a href="<{$smarty.const.ROOT_URL}>/wanderingClues.php?action=detail&id=<{$item->id}>">
					<img src="<{$item->imgsrc[0]}>" alt="" class='thumb'>
					<h3><{$item->description}></h3>
					<div class="desc">
						<span class='sex'><img src="images/my/mypet<{$item->sex}>.png" alt=""></span>
						<span class="pubdate"><{$item->pubdate}></span>
					</div>
				</a>
			</li>
			<{/foreach}>
		<{else}>
			<li class='nodata'>没有任何数据</li>
		<{/if}>
		</ul>
	</main>
	<!--E myWander-->
</body>
</html>