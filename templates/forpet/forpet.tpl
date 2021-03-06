<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠主页--ForPet</title>
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
	<header id='header'>寻宠</header>
	<!--E header-->
	<main id='clue-adopt-retrieve'>
		<a href="wanderingClues.php?action=show" id="clue">
			<img src="<{$smarty.const.ROOT_URL}>/images/for_pet/clueBg.png" alt="">
			<div>
				<h2>--流浪线索--</h2>
				<h3>帮Ta找回家</h3>
			</div>
		</a>
		<a href="adopt.php?action=show" id="adopt">
			<img src="<{$smarty.const.ROOT_URL}>/images/for_pet/adoptBg.png" alt="">
			<div>
				<h2>--领养--</h2>
				<h3>Ta需要一个家</h3>
			</div>
		</a>
		<a href="retrieve.php?action=show" id="retrieve">
			<img src="<{$smarty.const.ROOT_URL}>/images/for_pet/retrieverBg.png" alt="">
			<div>
				<h2>--寻回--</h2>
				<h3>帮我找回Ta</h3>
			</div>
		</a>
	</main>
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
</body>
</html>