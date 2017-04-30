<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--寻回</title>
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
	<header id='header'><span>领养中心</span>
		<div id="return" onclick='javascript:history.back();'></div>
		<div id='search'></div>
	</header>
	<!--E header-->
	<!-- S adopt -->
	<main id='adopt'>
	<{if $allAdopts}>
		<{foreach from=$allAdopts key=key item=item}>
		<figure>
			<a href="adopt.php?action=detail&id=<{$item->id}>">
				<img data-src="<{$item->imgsrc[0]}>" alt="" is-loaded='false'>
			</a>
			<div class='about-pet'>
				<h2 class='pet-name'><{$item->nickname}></h2>
				<p class='age'><{$item->age}>岁</p>
				<p class='pet-type'><{$item->category_name}></p>
				<p class='request'><{$item->description}>...</p>
				<p class='location'><{$item->location}></p>
				<p class='pubdate'><{$item->pubdate}></p>
			</div>
			<{if $item->sex eq 1}>
			<span class='male'></span>
			<{elseif $item->sex eq 2}>
			<span class='female'></span>
			<{else}>
			<span class='unmale'></span>
			<{/if}>
		</figure>
		<{/foreach}>
	<{/if}>
	<div class="loading"></div>
	</main>
	<!-- E adopt -->
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
				<img src="<{$smarty.const.ROOT_URL}>/images/public_img/default.png" alt="">
				<h3>发布寻回</h3>
				<p>帮我找回Ta</p>
			</div>
		</div>
	</div>
	<!-- E release -->
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
	<script src='<{$smarty.const.ROOT_URL}>/js/release.js'></script>
	<!-- S adopt-->
	<script src='<{$smarty.const.ROOT_URL}>/js/adoptAjax.js'></script>
</body>
</html>