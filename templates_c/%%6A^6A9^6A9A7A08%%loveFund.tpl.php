<?php /* Smarty version 2.6.30, created on 2017-02-27 17:18:33
         compiled from service/loveFund.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--服务--爱心基金</title>
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
	<!--my.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/service.css">
</head>
<body id='for-pet-service'>
	<!-- S header -->
	<header id='header'>爱心基金
		<div id="return" onclick='javascript:history.back();'></div>
		<div id='search'></div>
	</header>
	<!-- E header -->
	<!-- S love-fund -->
	<main id='love-fund'>
		<ul>
			<li>
				<h2><a href="###"><img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="">ARB动物之友ARB动物之友</a></h2>
				<p>通过救助家养和野生动物，在学校和社区开展环保教育和倡导动物福利、立法、促进中国的环境保护事业。</p>
			</li>
			<li>
				<h2><a href="###"><img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="">ARB动物之友</a></h2>
				<p>通过救助家养和野生动物，在学校和社区开展环保教育和倡导动物福利、立法、促进中国的环境保护事业。通过救助家养和野生动物，在学校和社区开展环保教育和倡导动物福利、立法、促进中国的环境保护事业。</p>
			</li>
			<li>
				<h2><a href="###"><img src="<?php echo @ROOT_URL; ?>
/images/thumb.jpg" alt="">ARB动物之友</a></h2>
				<p>通过救助家养和野生动物，在学校和社区开展环保教育和倡导动物福利、立法、促进中国的环境保护事业。</p>
			</li>
		</ul>
	</main>
	<!-- E love-fund -->
	<!--S footer-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--E footer-->
</body>
</html>