<?php /* Smarty version 2.6.30, created on 2017-02-27 14:44:20
         compiled from service/service.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--服务</title>
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
	<header id='header'>服务
		<div id='search'></div>
	</header>
	<!--E header-->
	<!-- S service -->
	<main id='service'>
		<ul>
			<li><a href="experts.php?action=showExperts">
					<img src="<?php echo @ROOT_URL; ?>
/images/service/expertonline.png" alt="">
					<p>专家在线</p>
				</a></li>
			<li><a href="encyclopedia.php?action=showInfo">
					<img src="<?php echo @ROOT_URL; ?>
/images/service/encyclopedia.png" alt="">
					<p>养宠百科</p>
				</a></li>
			<li><a href="loveFund.php?action=showFund">
					<img src="<?php echo @ROOT_URL; ?>
/images/service/lovefund.png" alt="">
					<p>爱心基金</p>
				</a></li>
			<li><a href="">
					<img src="<?php echo @ROOT_URL; ?>
/images/service/volunteer.png" alt="">
					<p>志工加入</p>
				</a></li>
			<li><a href="petPair.php?action=showPet">
					<img src="<?php echo @ROOT_URL; ?>
/images/service/petpair.png" alt="">
					<p>配对</p>
				</a></li>
			<li><a href="walkDog.php?action=showWalk">
					<img src="<?php echo @ROOT_URL; ?>
/images/service/walkdog.png" alt="">
					<p>一起来遛狗</p>
				</a></li>
			<li><a href="">
					<img src="<?php echo @ROOT_URL; ?>
/images/service/rescuestation.png" alt="">
					<p>救助站信息</p>
				</a></li>
			<li><a href="">
					<img src="" alt="">
					<p></p>
				</a></li>
			<li><a href="">
					<img src="" alt="">
					<p></p>
				</a></li>
		</ul>
	</main>
	<!-- E service -->
	<!--S footer-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--E footer-->
</body>
</html>