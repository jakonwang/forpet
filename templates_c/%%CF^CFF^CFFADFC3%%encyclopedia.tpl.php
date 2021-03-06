<?php /* Smarty version 2.6.30, created on 2017-02-27 16:22:58
         compiled from service/encyclopedia.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠网--服务--养宠百科</title>
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
	<header id='header'>
		<span>养宠百科</span>
		<div id="return" onclick='javascript:history.back();'></div>
		<div id='search'></div>
	</header>
	<!-- E header -->
	<!-- S my-pet-list -->
	<main id='encyclopedia'>
		<ul>
		<?php if ($this->_tpl_vars['infoList']): ?>
			<?php $_from = $this->_tpl_vars['infoList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<li class='encyclopedia-item'>
				<a href="encyclopedia.php?action=showDetail&id=<?php echo $this->_tpl_vars['item']->id; ?>
">
					<img src="<?php echo $this->_tpl_vars['item']->litpic; ?>
" alt="" class='encyclopedia-img'>
				</a>
				<div id='encyclopedia-desc'>
					<h2 class='encyclopedia-title'><?php echo $this->_tpl_vars['item']->title; ?>
</h2>
					<p class='encyclopedia-desc'><?php echo $this->_tpl_vars['item']->description; ?>
</p>
				</div>
				<div class='encyclopedia-extra'>
					<span class='encyclopedia-view'><?php echo $this->_tpl_vars['item']->click; ?>
</span>
					<span class='encyclopedia-pubdate'><?php echo $this->_tpl_vars['item']->lastpost; ?>
</span>
				</div>
				<div class='collect <?php echo $this->_tpl_vars['item']->collect; ?>
' data-id='<?php echo $this->_tpl_vars['item']->id; ?>
'></div>
			</li>
			<?php endforeach; endif; unset($_from); ?>
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
	<script src='js/encyclopedia.js'></script>
</body>
</html>