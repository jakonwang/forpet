<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠主页--添加宠物</title>
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
	<link rel="stylesheet" href="css/normalize.css">
	<!--common.css-->
	<link rel="stylesheet" href="css/common.css">
	<!--my.css-->
	<link rel="stylesheet" href="css/my.css">
	<!--date.css-->
	<link rel="stylesheet" href="css/date.css">
</head>
<body id='addPets'>
	<!--S header-->
	<header id='header'>
		<span>添加宠物</span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E header-->
	<main class='addPets'>
		<form action="pets.php?action=addPet" method='post'>
		<header class="headimgurl">
			<img src="images/my/addHead.png" alt="添加头像" id='uploadImg'>
			<input type="hidden" id='headimgurl' name='serverId'>
		</header>
		<ul class='pet-info'>
			<li class="item"><span>宠物名字</span><input type="text" name='nickname' placeholder="设置宠物名称"></li>
			<li class="item">
				<span>宠物性别</span>
				<div id="sex">
					<input type="radio" name="sex" id="male" value='1'>
					<label for="male" class='sex'>MM</label>
					<input type="radio" name="sex" id="female" value='2'>
					<label for="female" class='sex'>GG</label>
				</div>
			</li>
			<li class="item cate-title">------请选择宠物品种------</li>
			<li class="item">
				<select name="" id="firstCates">
					<option value="-1">--请选择一级分类--</option>
					<{if $cates}>
					<{foreach from=$cates item=item key=key}>
					<option value="<{$item->id}>"><{$item->category_name}></option>
					<{/foreach}>
					<{/if}>
				</select>
				<select name="pet_cates" id="secondCates">
					<option value="-1">--请选择二级分类--</option>
				</select>
			</li>
			<li class="item"><span>宠物生日</span><input type="text" class='birthday' name='birthday'></li>
			<li class="item">
				<span>宠物体重(KG)</span>
				<div class="weight">
					<a href="javascript:void(0);" id='reduce'><img src="images/my/reduce.png" alt="减"></a>
					<input type="text"  name='weight' placeholder="1" id='weight' value='1'>
					<a href="javascript:void(0);" id='plus'><img src="images/my/plus.png" alt="加"></a>
				</div>
			</li>
		</ul>
		<button type="submit" class='save' name='save'>保存</button>
		</form>
		<div id="datePlugin"></div>
	</main>
	<div class="validate-mes"></div>
<script src='js/jquery-3.1.1.min.js'></script>
<script src='js/date.js'></script>
<script src='js/iscroll.js'></script>
<script src='js/addPets.js'></script>
<script src='js/category.js'></script>
<!--引入微信jssdk的js文件-->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	wx.config({
	  debug: false,/*调试模式开启*/
	  appId: '<{$signPackage.appId}>',
	  timestamp: <{$signPackage.timestamp}>,
	  nonceStr: '<{$signPackage.nonceStr}>',
	  signature: '<{$signPackage.signature}>',
	  jsApiList: [
	    'chooseImage',/*选择图片接口*/
	    'uploadImage',/*上传图片接口*/
	  ]
	});
</script>
<!--引入上传图片js-->
</body>
</html>