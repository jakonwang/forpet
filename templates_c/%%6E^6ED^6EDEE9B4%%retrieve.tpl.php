<?php /* Smarty version 2.6.30, created on 2017-03-13 21:25:44
         compiled from forpet/retrieve.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--寻回</title>
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
<body>
	<!--S header-->
	<header id='header'><span>寻回</span>
		<div id="return" onclick='javascript:history.back();'></div>
		<div id='search'></div>
	</header>
	<!--E header-->
	<main id='retrieve'>
		<ul>
		<?php if ($this->_tpl_vars['allRetrieve']): ?>
			<?php $_from = $this->_tpl_vars['allRetrieve']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<li class='item'>
				<div class="thumb"><img src="<?php echo $this->_tpl_vars['item']->headimgurl; ?>
" alt="<?php echo $this->_tpl_vars['item']->nickname; ?>
"></div>
				<div class="title">
					<h2><a href='###'><?php echo $this->_tpl_vars['item']->nickname; ?>
</a><span class='type'><?php echo $this->_tpl_vars['item']->category_name; ?>
</span></h2>
					<p><?php echo $this->_tpl_vars['item']->pubdate; ?>
 来自 <?php echo $this->_tpl_vars['item']->location; ?>
</p>
				</div>
				<div class="description"><?php echo $this->_tpl_vars['item']->description; ?>
...</div>
				<div class="pic">
				<?php if ($this->_tpl_vars['item']->imgsrc): ?>
				<a href="retrieve.php?action=detail&id=<?php echo $this->_tpl_vars['item']->id; ?>
">
				<?php $_from = $this->_tpl_vars['item']->imgsrc; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<img data-src="<?php echo $this->_tpl_vars['item']; ?>
" alt="" is-loaded='false'>
				<?php endforeach; endif; unset($_from); ?>
				</a>
				<?php endif; ?>
				</div>
				<div class="spread">0人帮他扩散</div>
			</li>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
		</ul>
	</main>
	<!-- S release -->
	<div id='release'></div>
	<div class="release">
		<div class="release-content">
			<div class="row">
				<a href="wanderingClues.php?action=add">
					<img src="<?php echo @ROOT_URL; ?>
/images/public_img/default.png" alt="">
					<h3>发布流浪线索</h3>
					<p>帮它找回家</p>
				</a>
			</div>
			<div class="row">
				<a href="adopt.php?action=add">
					<img src="<?php echo @ROOT_URL; ?>
/images/public_img/default.png" alt="">
					<h3>发布领养</h3>
					<p>Ta需要一个家</p>
				</a>
			</div>
			<div class="row">
				<a href="retrieve.php?action=add">
				<img src="<?php echo @ROOT_URL; ?>
/images/public_img/default.png" alt="">
				<h3>发布寻回</h3>
				<p>帮我找回Ta</p>
				</a>
			</div>
		</div>
	</div>
	<!-- E release -->
	<!--S footer-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--E footer-->
	<script src='<?php echo @ROOT_URL; ?>
/js/retrieve.js'></script>
	<!--S 发布按钮-->
	<script src='<?php echo @ROOT_URL; ?>
/js/release.js'></script>
	<!--S ajax获取下一页-->
	<script src='<?php echo @ROOT_URL; ?>
/js/retrieveAjax.js'></script>
	<!--E ajax获取下一页-->
</body>
</html>