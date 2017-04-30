<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--领养中心--领养详情</title>
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
	<header id='header'><span>寻回详情</span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E header-->
	<!--S retrieve-detail-->
	<main id='retrieve-detail'>
	<{if $oneRetrieve}>
		<div class="publisher">
			<img src="<{$oneRetrieve->headimgurl}>" alt="<{$oneRetrieve->pnickname}>">
			<h2><{$oneRetrieve->nickname}></h2>
			<time><{$oneRetrieve->pubdate}></time>
		</div>
		<div class="imgsrc">
		<{if $oneRetrieve->imgsrc}>
			<{foreach from=$oneRetrieve->imgsrc key=key item=item}>
				<img src="<{$item}>" alt="">
			<{/foreach}>
		<{/if}>
		</div>
		<div class="textdesc">
			<div class="row">
				<span>城市：</span>
				<p><{$oneRetrieve->location}></p>
			</div>
			<div class="row">
				<span>宠物昵称：</span>
				<p><{$oneRetrieve->pnickname}></p>
			</div>
			<div class="row">
				<span>宠物年龄：</span>
				<p><{$oneRetrieve->age}>岁</p>
			</div>
			<div class="row">
				<span>宠物品种：</span>
				<p><{$oneRetrieve->category_name}></p>
			</div>
			<div class="row">
				<span>宠物性别：</span>
				<p><{$oneRetrieve->sex}></p>
			</div>
			<div class="row">
				<span>宠物特征：</span>
				<p><{$oneRetrieve->description}></p>
			</div>
			<div class="row">
				<span>丢失时间：</span>
				<p><{$oneRetrieve->losetime}></p>
			</div>
			<div class="row">
				<span>主人：</span>
				<p><{$oneRetrieve->publisher}></p>
			</div>
			<div class="row">
				<span>联系方式：</span>
				<p><{$oneRetrieve->telephone}></p>
			</div>
		</div>
	<{/if}>
	</main>
	<!--E retrieve-detail-->
</body>
</html>