<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--社区--社区详情</title>
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
	<!--community.css-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/community.css">
</head>
<body>
	<!--S header-->
	<header id='header'><span>详情</span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E header-->
	<!--S main-->
	<main id='community'>
		<div class="row">
			<div class="master">
				<a href="" class='head-img'><img src="<{$oneCommunity->headimgurl}>" alt=""></a>
				<div class="wrap-user">
					<p class='userinfo'><span><{$oneCommunity->mnickname}></span> <{$oneCommunity->location}></p>
					<p class='pet'><img src="<{$oneCommunity->pheadimg}>" alt=""><{$oneCommunity->nickname}></p>	
				</div>
				<div class="notice">
					<a href="javascript:void(0);"><img src="<{$smarty.const.ROOT_URL}>/images/community/<{$praise}>.png" alt="" data-cid='<{$oneCommunity->id}>'></a>
				</div>
			</div>
			<div class="img-area">
				<img src="<{$oneCommunity->imgsrc}>" alt="">
			</div>
			<div class="desc">
				<{$oneCommunity->description}>
			</div>
		</div>
		<div class="comment-area">
			<h2><{$commentsTotal}>条评论</h2>
			<ul>
			<{if $comments}>
				<{foreach from=$comments key=key item=item}>
				<li>
					<a href="" class='comment-headimg'><img src="<{$item->headimgurl}>" alt=""></a>
					<div class="text"><{$item->nickname}><span><{$item->ctime}></span></div>
					<div class="content"><{$item->content}></div>
				</li>
				<{/foreach}>
			<{/if}>	
			</ul>
		</div>
	</main>
	<!--E main-->
	<!--S comment-->
	<footer class="comment">
		<input type="text" placeholder="添加评论" class='btn'>
		<button class='send' data-cid='<{$oneCommunity->id}>'>发送</button>
	</footer>
	<!--E comment-->
	<script src='<{$smarty.const.ROOT_URL}>/js/jquery-3.1.1.min.js'></script>
	<script src='<{$smarty.const.ROOT_URL}>/js/community.js'></script>
	<script src='<{$smarty.const.ROOT_URL}>/js/communityDetail.js'></script>
</body>
</html>