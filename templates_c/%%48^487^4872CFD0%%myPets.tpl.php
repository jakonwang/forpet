<?php /* Smarty version 2.6.30, created on 2017-03-11 19:33:45
         compiled from my/myPets.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--个人资料</title>
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
	<!-- S header -->
	<header id='header'>我的萌宠
	<div id="return" onclick='javascript:history.back();'></div>
	<div id="add-pet"><a href="pets.php?action=addPet">添加</a></div>
	</header>
	<!-- E header -->
	<!-- S my-pet-list -->
	<main id='my-pet-list'>
		<ul>
		<?php if ($this->_tpl_vars['petsList']): ?>
			<?php $_from = $this->_tpl_vars['petsList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<li><a href="###">
				<img src="<?php echo $this->_tpl_vars['item']->headimgurl; ?>
" alt="" class='my-pet-thumb'>
				<div class="about-pet">
					<span class='my-pet-name'><?php echo $this->_tpl_vars['item']->nickname; ?>
</span>
					<span class='<?php echo $this->_tpl_vars['item']->sex; ?>
'></span>
					<span class='my-pet-type'><?php echo $this->_tpl_vars['item']->cateid; ?>
</span>
					<p class='my-pet-age'><?php echo $this->_tpl_vars['item']->age; ?>
岁</p>
				</div>
			</a></li>
			<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
		<li class='nodata'>没有任何宠物</li>
		<?php endif; ?>
		</ul>
	</main>
	<!-- E my-pet-list -->
	<!--S footer-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--E footer-->
</body>
</html>