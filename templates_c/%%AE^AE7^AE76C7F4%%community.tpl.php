<?php /* Smarty version 2.6.30, created on 2017-03-12 21:05:22
         compiled from community/community.tpl */ ?>
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
	<!--community.css-->
	<link rel="stylesheet" href="<?php echo @ROOT_URL; ?>
/css/community.css">
</head>
<body>
	<!--S header-->
	<header id='header'>
		<span>社区</span>
		<a href='community.php?action=addCommunity' class="add-btn"></a>
	</header>
	<!--E header-->
	<!--S main-->
	<main id='community'>
	<?php if ($this->_tpl_vars['communityList']): ?>
		<?php $_from = $this->_tpl_vars['communityList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		<div class="row">
			<div class="master">
				<a href="" class='head-img'><img src="<?php echo $this->_tpl_vars['item']->headimgurl; ?>
" alt=""></a>
				<div class="wrap-user">
					<p class='userinfo'><span><?php echo $this->_tpl_vars['item']->mnickname; ?>
</span> <?php echo $this->_tpl_vars['item']->location; ?>
</p>
					<p class='pet'><img src="<?php echo $this->_tpl_vars['item']->pheadimg; ?>
" alt=""><?php echo $this->_tpl_vars['item']->nickname; ?>
</p>	
				</div>
				<div class="notice">
					<a href="javascript:void(0);" ><img src="<?php echo @ROOT_URL; ?>
/images/community/<?php echo $this->_tpl_vars['item']->is_praise; ?>
.png" alt="" data-cid='<?php echo $this->_tpl_vars['item']->id; ?>
'></a>
				</div>
			</div>
			<div class="img-area">
				<a href="community.php?action=showCommunityDetail&id=<?php echo $this->_tpl_vars['item']->id; ?>
"><img src="<?php echo $this->_tpl_vars['item']->imgsrc; ?>
" alt=""></a>
			</div>
			<div class="desc">
				<?php echo $this->_tpl_vars['item']->description; ?>

			</div>
			<div class="comment">
				<p>东京：膀胱结石刚做完手术</p>
				<p>东京：膀胱结石刚做完手术</p>
				<p>东京：膀胱结石刚做完手术</p>
				<a href="community.php?action=showCommunityDetail&id=<?php echo $this->_tpl_vars['item']->id; ?>
" class='more'>查看所有的评论</a>
			</div>
		</div>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	</main>
	<!--E main-->
	<!--S footer-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--E footer-->
	<script src='<?php echo @ROOT_URL; ?>
/js/jquery-3.1.1.min.js'></script>
	<script src='<?php echo @ROOT_URL; ?>
/js/community.js'></script>
</body>
</html>