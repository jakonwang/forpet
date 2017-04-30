<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--我的收藏</title>
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
<body id='my-setting'>
	<!-- S header -->
	<header id='header'>我的收藏
	<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!-- E header -->
	<!-- S my-pet-list -->
	<main id='my-collection'>
		<ul>
		<{if $collectionList}>
			<{foreach from=$collectionList key=key item=item}>
			<li class='my-collection-item'>
				<a href="encyclopedia.php?action=showDetail&id=<{$item->id}>">
					<img src="<{$item->litpic}>" alt="<{$item->title}>" class='my-colletion-img'>
					<div id='my-colletion-desc'>
						<h2 class='my-colletion-title'><{$item->title}></h2>
						<p class='my-colletion-desc'><{$item->description}></p>
					</div>
				<span class='my-colletion-pubdate'><{$item->lastpost}></span>
				</a>
			</li>
			<{/foreach}>
			<{else}>
			<li class='nodata'>没有任何数据</li>
		<{/if}>	
		</ul>
	</main>
	<!-- E my-pet-list -->
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
</body>
</html>