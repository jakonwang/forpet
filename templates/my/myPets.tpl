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
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/normalize.css">
	<!--common.css-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/common.css">
	<!--my.css-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/my.css">
</head>
<body id='my-setting'>
	<!-- S header -->
	<header id='header'>我的萌宠
	<div id="return" onclick='javascript:history.back();'></div>
	<div id="add-pet"><a href="pets.php?action=addPet">添加</a></div>
	</header>
	<!-- E header -->
	<!-- S my-pet-list -->
	<main id='my-pet-list'>
		<ul>
		<{if $petsList}>
			<{foreach from=$petsList key=key item=item}>
			<li><a href="###">
				<img src="<{$item->headimgurl}>" alt="" class='my-pet-thumb'>
				<div class="about-pet">
					<span class='my-pet-name'><{$item->nickname}></span>
					<span class='<{$item->sex}>'></span>
					<span class='my-pet-type'><{$item->cateid}></span>
					<p class='my-pet-age'><{$item->age}>岁</p>
				</div>
			</a></li>
			<{/foreach}>
		<{else}>
		<li class='nodata'>没有任何宠物</li>
		<{/if}>
		</ul>
	</main>
	<!-- E my-pet-list -->
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
</body>
</html>