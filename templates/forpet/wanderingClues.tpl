<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--流浪线索</title>
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
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/forpet.css">
</head>
<body>
	<!--S header-->
	<header id='header'><span>流浪线索</span>
		<div id="return" onclick='javascript:history.back();'></div>
		<div id='search'></div>
	</header>
	<!--E header-->
	<main id='wandering-clues'>
		<ul>
		<{if $allClues}>
		<{foreach from=$allClues key=key item=item}>
			<li class='item'>
				<div class="thumb"><img src="<{$item->headimgurl}>" alt=""></div>
				<div class="title">
					<h2><a href='###'><{$item->nickname}></a></h2>
					<p><{$item->pubdate}> 来自 <{$item->location}></p>
				</div>
				<div class="description"><{$item->description}>...</div>
				<div class="pic">
					<a href="wanderingClues.php?action=detail&id=<{$item->id}>">
					<{if $item->imgsrc}>
					<{foreach from=$item->imgsrc key=key item=item}>
						<img data-src="<{$item}>" alt="" is-loaded='false'>
					<{/foreach}>
					<{/if}>
					</a>
				</div>
				<div class="spread">0人帮他扩散</div>
			</li>
			<{/foreach}>
		<{/if}>
		</ul>
		<div class="loading"></div>
	</main>
	<!-- S release -->
	<div id='release'></div>
	<div class="release">
		<div class="release-content">
			<div class="row">
				<a href="wanderingClues.php?action=add">
					<img src="<{$smarty.const.ROOT_URL}>/images/public_img/default.png" alt="">
					<h3>发布流浪线索</h3>
					<p>帮它找回家</p>
				</a>
			</div>
			<div class="row">
				<a href="adopt.php?action=add">
					<img src="<{$smarty.const.ROOT_URL}>/images/public_img/default.png" alt="">
					<h3>发布领养</h3>
					<p>Ta需要一个家</p>
				</a>
			</div>
			<div class="row">
				<a href="retrieve.php?action=add">
				<img src="<{$smarty.const.ROOT_URL}>/images/public_img/default.png" alt="">
				<h3>发布寻回</h3>
				<p>帮我找回Ta</p>
				</a>
			</div>
		</div>
	</div>
	<!-- E release -->
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
	<script src='<{$smarty.const.ROOT_URL}>/js/wanderingClues.js'></script>
	<!--S 发布按钮-->
	<script src='<{$smarty.const.ROOT_URL}>/js/release.js'></script>
	<script src='<{$smarty.const.ROOT_URL}>/js/wanderAjax.js'></script>
</body>
</html>