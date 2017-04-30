<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠主页--我的--我的好友</title>
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
<body>
	<!--S header-->
	<header id='header'>
		<span>我的好友</span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E header-->
	<main id='myFriends'>
		<ul>
			<li class='add-friends'>
				<a href="friends.php?action=addFriendsList"><img src="<{$smarty.const.ROOT_URL}>/images/my/addFriends.png" alt="">添加好友</a>
			</li>
			<{if $friendsList}>
			<{foreach from=$friendsList key=key item=item}>
			<li class='friends'>
				<a href="friendsChat.php?action=showChat&receiver=<{$item->id}>">
				<img src="<{$item->headimgurl}>" alt="" class='headimgurl'>
				<div>
					<h2><{$item->nickname}><img src='<{$smarty.const.ROOT_URL}>/images/my/<{$item->sex}>.png'/></h2>
					<p class='location'><{$item->country}><{$item->province}><{$item->city}></p>
				</div>
				</a>
			</li>
			<{/foreach}>
			<{/if}>
		</ul>
	</main>
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
</body>
</html>