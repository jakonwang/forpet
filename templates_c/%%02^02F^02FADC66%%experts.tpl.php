<?php /* Smarty version 2.6.30, created on 2017-02-27 17:18:38
         compiled from service/experts.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--服务--专家在线</title>
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
/css/service.css">
</head>
<body id='for-pet-service'>
	<!--S header-->
	<header id='header'>专家在线
		<div id="return" onclick='javascript:history.back();'></div>
		<div id='search'></div>
	</header>
	<!--E header-->
	<main id='expert-online'>
		<div id="location">定位失败，请点击重新定位！</div>
		<div class="expert-contact">
			<ul>
				<li>
					<a href="">
						<img src="<?php echo @ROOT_URL; ?>
/images/service/pictureconsult.png" alt="">
						<p>图文咨询</p>
					</a>
				</li>
				<li>
					<a href="">
						<img src="<?php echo @ROOT_URL; ?>
/images/service/telephoneconsult.png" alt="">
						<p>电话咨询</p>						
					</a>
				</li>
				<li>
					<a href="">
						<img src="<?php echo @ROOT_URL; ?>
/images/service/selectdoctor.png" alt="">
						<p>选择医生</p>						
					</a>
				</li>
			</ul>
		</div>
		<div class="experts-list">
			<h2 class="experts-list-title"><a href="###">宠物医生</a></h2>
			<figure class='experts-list-desc'>
				<a href="">
					<div class="experts-wrap">
						<img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="" class='experts-thumb'>
					</div>
					<div class="experts-message">
						<p class='experts-female'>孙江</p>
						<p class='experts-experience'>7年</p>
						<p class='experts-illness'>常见疾病，猫科，皮肤病</p>
						<p class='experts-workplace'>瑞鹏前海分院</p>
					</div>
				</a>
			</figure>
			<figure class='experts-list-desc'>
				<a href="">
					<div class="experts-wrap">
						<img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="" class='experts-thumb'>
					</div>
					<div class="experts-message">
						<p class='experts-male'>孙江</p>
						<p class='experts-experience'>7年</p>
						<p class='experts-illness'>常见疾病，猫科，皮肤病</p>
						<p class='experts-workplace'>瑞鹏前海分院</p>
					</div>
				</a>
			</figure>
			<figure class='experts-list-desc'>
				<a href="">
					<div class="experts-wrap">
						<img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="" class='experts-thumb'>
					</div>
					<div class="experts-message">
						<p class='experts-male'>孙江</p>
						<p class='experts-experience'>7年</p>
						<p class='experts-illness'>常见疾病，猫科，皮肤病</p>
						<p class='experts-workplace'>瑞鹏前海分院</p>
					</div>
				</a>
			</figure>
			<figure class='experts-list-desc'>
				<a href="">
					<div class="experts-wrap">
						<img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="" class='experts-thumb'>
					</div>
					<div class="experts-message">
						<p class='experts-female'>孙江</p>
						<p class='experts-experience'>7年</p>
						<p class='experts-illness'>常见疾病，猫科，皮肤病</p>
						<p class='experts-workplace'>瑞鹏前海分院</p>
					</div>
				</a>
			</figure>
		</div>
	</main>
	<!--S footer-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--E footer-->
</body>
</html>