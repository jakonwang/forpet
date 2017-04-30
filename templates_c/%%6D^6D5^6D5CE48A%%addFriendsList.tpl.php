<?php /* Smarty version 2.6.30, created on 2017-02-28 16:04:36
         compiled from my/addFriendsList.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠主页--我的--添加好友</title>
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
<body>
	<!--S header-->
	<header id='header'>
		<span>推荐好友</span>
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E header-->
	<main id='addFriendsList'>
		<ul>
		<?php if ($this->_tpl_vars['usersList']): ?>
			<?php $_from = $this->_tpl_vars['usersList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<li class='friends'>
				<a href="#">
				<img src="<?php echo $this->_tpl_vars['item']->headimgurl; ?>
" alt="" class='headimgurl'>
				<div>
					<h2><?php echo $this->_tpl_vars['item']->nickname; ?>
<img src='<?php echo @ROOT_URL; ?>
/images/my/<?php echo $this->_tpl_vars['item']->sex; ?>
.png'/></h2>
					<p class='location'><?php echo $this->_tpl_vars['item']->province; ?>
<?php echo $this->_tpl_vars['item']->city; ?>
</p>
				</div>
				</a>
				<a href='friends.php?action=addFriends&uid=<?php echo $this->_tpl_vars['item']->id; ?>
' class="add" title='添加为好友'>添加</a>
			</li>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>	
		</ul>
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