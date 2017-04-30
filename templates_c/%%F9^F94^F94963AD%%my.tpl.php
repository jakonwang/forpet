<?php /* Smarty version 2.6.30, created on 2017-03-12 22:55:22
         compiled from my/my.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠主页--个人中心</title>
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
/css/my.css">
</head>
<body id='my-setting'>
	<!-- S head-portrait -->
	<header id='head-portrait'>
		<img src="<?php echo @ROOT_URL; ?>
/images/timg.jpg" alt="" class='head-img-bg'>
		<div id="head-img">
			<a href='my.php?action=personalCenter'>
				<img src="<?php echo $this->_tpl_vars['headimgurl']; ?>
" alt="" class='head-img'>
				<h1><?php echo $this->_tpl_vars['nickname']; ?>
</h1>
			</a>
		</div>
	</header>
	<!-- E head-portrait -->
	<!-- S my-content -->
	<main id="my-content">
		<ul>
			<li class='personaldata'><a href="<?php echo @ROOT_URL; ?>
/my.php?action=personalData">个人资料</a></li>
			<li class='friends'><a href="<?php echo @ROOT_URL; ?>
/my.php?action=myFriends">我的好友</a></li>
			<li class='mypet'><a href="<?php echo @ROOT_URL; ?>
/my.php?action=myPets">我的萌宠</a></li>
			<li class='mycollection'><a href="<?php echo @ROOT_URL; ?>
/my.php?action=myCollections">我的收藏</a></li>
			<li class='myfind'><a href="<?php echo @ROOT_URL; ?>
/my.php?action=myRetrieve">我的寻回</a></li>
			<li class='myadopt'><a href="<?php echo @ROOT_URL; ?>
/my.php?action=myAdopt">我的领养</a></li>
			<li class='myclues'><a href="<?php echo @ROOT_URL; ?>
/my.php?action=myWander">我的流浪线索</a></li>
			<li class='contactus'><a href="<?php echo @ROOT_URL; ?>
/my.php?action=contactUs">联系客服</a></li>
		</ul>

	</main>
	<!-- E my-content -->
	<!--S footer-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--E footer-->
</body>
</html>