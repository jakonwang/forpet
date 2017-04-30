<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠社区--添加动态</title>
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
    </script>
	<!--normalize.css for reset stylesheet-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/normalize.css">
	<!--common.css-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/common.css">
	<!--community.css-->
	<link rel="stylesheet" href="<{$smarty.const.ROOT_URL}>/css/community.css">
</head>
<body class='add-community-body'>
	<!--S header-->
	<header id='header'>
		<div id="return" onclick='javascript:history.back();'></div>
		<span>发布动态</span>
	</header>
	<!--E header-->
	<!--S main-->
	<main id='add-community'>
		<form action="community.php?action=addCommunity" method='post'>
			<div class="mypets">
				<select name="pid">
				<{if $petsList}>
					<{foreach from=$petsList key=key item=item}>
					<option value="<{$item->id}>"><{$item->nickname}></option>
					<{/foreach}>
				<{/if}>
				</select>
			</div>
			<textarea name="description" id="" placeholder="主人~你就说两句吧"></textarea>
			<div class="add-img">
				<img src="images/public_img/uploadBg.jpg" alt="" id='uploadImg'>
				<input type="hidden" id='tempimg' value=''>
				<input type="hidden" name='imgsrc' id='imgsrc' value=''>
			</div>
			<div class="location"><input type="text" value='广东省,广州市' readonly="readonly" name='location' id='location'></div>
			<button type="submit" class="confirm-btn" name="send">发布</button>
		</form>
	</main>
	<!--E main-->
	<!--S footer-->
	<{include file='footer.tpl'}>
	<!--E footer-->
	<!--引入微信jssdk的js文件-->
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<!--引入jquery-->
	<script src='<{$smarty.const.ROOT_URL}>/js/jquery-3.1.1.min.js'></script>
	<!--微信配置-->
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
	<!--引入百度api-->
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=<{$smarty.const.BMAPAK}>"></script>
	<script type="text/javascript" >   
		var geolocation = new BMap.Geolocation();
		// 创建地理编码实例
		var myGeo = new BMap.Geocoder();      
		geolocation.getCurrentPosition(function(r){  
			if(this.getStatus() == BMAP_STATUS_SUCCESS){  
				var pt = r.point;   
				// 根据坐标得到地址描述    
				myGeo.getLocation(pt, function(result){      
				if (result){      
				var addComp = result.addressComponents;  
				 	$('#location').val(addComp.province + "," + addComp.city);    
				}      
				});   
			}  
		});
	</script>
	<script src='<{$smarty.const.ROOT_URL}>/js/jquery-3.1.1.min.js'></script>
	<script src='<{$smarty.const.ROOT_URL}>/js/addCommunity.js'></script>
</body>
</html>