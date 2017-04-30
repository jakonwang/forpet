<?php /* Smarty version 2.6.30, created on 2017-03-11 23:48:35
         compiled from community/addCommunity.tpl */ ?>
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
    </script>
	<!--normalize.css for reset stylesheet-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/normalize.css">
	<!--common.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/common.css">
	<!--community.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/community.css">
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
				<?php if ($this->_tpl_vars['petsList']): ?>
					<?php $_from = $this->_tpl_vars['petsList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<option value="<?php echo $this->_tpl_vars['item']->id; ?>
"><?php echo $this->_tpl_vars['item']->nickname; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
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
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--E footer-->
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
	    'uploadImage',/*上传图片接口*/
	  ]
	});
	</script>
	<!--引入上传图片js-->
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
	<script src='<?php echo @ROOT_URL; ?>
/js/jquery-3.1.1.min.js'></script>
	<script src='<?php echo @ROOT_URL; ?>
/js/addCommunity.js'></script>
</body>
</html>