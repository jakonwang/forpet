<?php /* Smarty version 2.6.30, created on 2017-04-18 22:17:53
         compiled from forpet/addClues.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--流浪线索--发布线索</title>
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
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/normalize.css">
	<!--common.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/common.css">
	<!--forpet.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/forpet.css">
</head>
<body style='background:#f4f4f4'>
	<!--S clues-title-->
	<header id='header'>发布线索
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E clues-title-->
	<!--S add-clues-->
	<div class="add-clues">
		<form action="wanderingClues.php?action=add" method='post'>
			<div class="base pics">
				<h4>照片(流浪动物现状),最多3张</h4>
				<div class="pics-upload">
					<div class="imgs-container"></div>
					<img src="<?php echo @ROOT_URL; ?>
/images/public_img/uploadBg.jpg" alt="" id='uploadImg'>
					<!--保存要获取的图片id-->
					<input type='hidden' name="imgsrc" id='imgsrc'>
					<!--保存临时图片-->
					<input type="hidden" name='tempimg' id='tempimg'>
				</div>
			</div>
			<div class="base">
				<div class="row">
					<label for="nickname">昵称</label>
					<input type="text" name='nickname' class='btn-block' placeholder="如果有宠物昵称,请输入">
				</div>
				<div class="row">
					<label>性别</label>
					<input type="radio" name='sex' class='sex' value='1' checked><span class='male'>男</span>
					<input type="radio" name='sex' class='sex' value='2'><span class='female'>女</span>
					<input type="radio" name='sex' class='sex' value='0'><span class='unknow'>未知</span>
				</div>
				<div class="row desc">
					<textarea name="description" placeholder="流浪描述"></textarea>
				</div>
			</div>
			<div class="base">
				<div class="row">
					<label for="publisher">联系人</label>
					<input type="text" name='publisher' class='btn-block' placeholder="联系人姓名">
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
					<img src="<?php echo @ROOT_URL; ?>
/images/code.jpg" alt="图片验证码" id='codeImg'>
				</div>
			</div>
			<div class="base confirm">
				<button type='submit' class='confirm-btn' name='send'>发布</button>
			</div>
		</form>
	</div>
	<div class="validate-mes"></div>
	<!--E add-clues-->
	<!--引入微信jssdk的js文件-->
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<!--引入jquery-->
	<script src='<?php echo @ROOT_URL; ?>
/js/jquery-3.1.1.min.js'></script>
	<!--微信配置-->
	<script>
	wx.config({
	  debug: false,/*调试模式开启*/
	  appId: '<?php echo $this->_tpl_vars['signPackage']['appId']; ?>
',
	  timestamp: <?php echo $this->_tpl_vars['signPackage']['timestamp']; ?>
,
	  nonceStr: '<?php echo $this->_tpl_vars['signPackage']['nonceStr']; ?>
',
	  signature: '<?php echo $this->_tpl_vars['signPackage']['signature']; ?>
',
	  jsApiList: [
	    'chooseImage',/*选择图片接口*/
	    'previewImage',/*预览图片接口*/
	    'uploadImage',/*上传图片接口*/
	    'downloadImage'/*下载图片接口*/
	  ]
	});
	</script>
	<!--引入上传图片js-->
	<script src='<?php echo @ROOT_URL; ?>
/js/uploadImg.js'></script>
	<!--引入common.js-->
	<script src='<?php echo @ROOT_URL; ?>
/js/common.js'></script>
	<!--引入百度api-->
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=<?php echo @BMAPAK; ?>
"></script>
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
	<!--引入Validate.js-->
	<script src='<?php echo @ROOT_URL; ?>
/js/Validate.js'></script>
</body>
</html>