<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--寻回--发布寻回</title>
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
<body style='background:#f4f4f4'>
	<!--S retrieve-title-->
	<header id='header'>发布寻回
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E retrieve-title-->
	<!--S add-retrieve-->
	<div class="add-retrieve">
		<form action="retrieve.php?action=add" method='post'>
			<div class="base pics">
				<h4>照片(宠物萌照),最多3张</h4>
				<div class="pics-upload">
					<div class="imgs-container"></div>
					<img src="<{$smarty.const.ROOT_URL}>/images/public_img/uploadBg.jpg" alt="" id='uploadImg'>
					<!--保存要获取的图片id-->
					<input type='hidden' name="imgsrc" id='imgsrc'>
					<!--保存临时图片-->
					<input type="hidden" name='tempimg' id='tempimg'>
				</div>
			</div>
			<div class="base">
				<div class="row">
					<label for="cateid" class='cate-title'>请选择您发布寻回的宠物品种</label>
				</div>
				<div class="row">
					<select name="" id="firstCates" class='form-select'>
						<option value="-1">--请选择一级分类--</option>
						<{if $first_cates}>
						<{foreach from=$first_cates key=key item=item}>
						<option value="<{$item->id}>"><{$item->category_name}></option>
						<{/foreach}>
						<{/if}>
					</select>
					<select name="pet_cates" id="secondCates" class='form-select'>
						<option value="-1">--请选择二级分类--</option>
					</select>
				</div>
				<div class="row">
					<label for="nickname">昵称</label>
					<input type="text" name='nickname' id='nickname' class='btn-block' placeholder="请输入领养的宠物昵称">
				</div>
				<div class="row">
					<label>性别</label>
					<input type="radio" name='sex' class='sex' value='1' checked><span class='male'>男</span>
					<input type="radio" name='sex' class='sex' value='2'><span class='female'>女</span>
					<input type="radio" name='sex' class='sex' value='0'><span class='unknow'>未知</span>
				</div>
				<div class="row">
					<label for="age">年龄</label>
					<input type="text" name='age' class='btn-block' id='age' placeholder="请输入宠物年龄:如2">
				</div>
				<div class="row">
					<label for="losetime">丢失时间</label>
					<input type="text" name='losetime' class='btn-block' id='losetime' placeholder="格式如:2017-02-14">
				</div>
				<div class="row desc">
					<textarea name="description" placeholder="宠物特征"></textarea>
				</div>
			</div>
			<div class="base">
				<div class="row">
					<label for="publisher">主人</label>
					<input type="text" name='publisher' class='btn-block' placeholder="主人姓名">
				</div>
				<div class="row">
					<label for="telephone">联系方式</label>
					<input type="text" name='telephone' class='btn-block telephone' id='telephone' placeholder="请输入您的联系方式">
				</div>
				<div class="row">
					<label for="location">位置</label>
					<input type="text" name='location' class='btn-block' id='location' value='' readonly="readonly">
				</div>
				<div class="row validate-code">
					<label for="code">图片码</label>
					<input type="text" name='code' class='btn-block code' id='code' placeholder="右侧图片验证码">
					<img src="<{$smarty.const.ROOT_URL}>/images/code.jpg" alt="图片验证码" id='codeImg'>
				</div>
			</div>
			<div class="base confirm">
				<button type='submit' class='confirm-btn' name='send'>发布</button>
			</div>
		</form>
	</div>
	<!--显示验证错误信息-->
	<div class="validate-mes"></div>
	<!--E add-retrieve-->
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
	<script src='<{$smarty.const.ROOT_URL}>/js/uploadImg.js'></script>
	<!--引入common.js-->
	<script src='<{$smarty.const.ROOT_URL}>/js/common.js'></script>
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
	<!--引入ajax获取分类js-->
	<script src='<{$smarty.const.ROOT_URL}>/js/category.js'></script>
	<!--引入验证类文件-->
	<script src='<{$smarty.const.ROOT_URL}>/js/Validate.js'></script>
</body>
</html>