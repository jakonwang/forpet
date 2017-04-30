<?php /* Smarty version 2.6.30, created on 2017-03-10 11:35:29
         compiled from forpet/wanderingCluesDetail.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>寻宠--流浪线索--流浪线索详情</title>
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
	<header id='header'>流浪详情
		<div id="return" onclick='javascript:history.back();'></div>
	</header>
	<!--E header-->
	<!--S wandering-clues-detail-->
	<main id='wandering-clues-detail'>
	<?php if ($this->_tpl_vars['oneClue']): ?>
		<div class="publisher">
			<img src="<?php echo $this->_tpl_vars['oneClue']->headimgurl; ?>
" alt="Delphi">
			<h2><?php echo $this->_tpl_vars['oneClue']->nickname; ?>
</h2>
			<time><?php echo $this->_tpl_vars['oneClue']->pubdate; ?>
</time>
		</div>
		<div class="imgsrc">
		<?php if ($this->_tpl_vars['oneClue']->imgsrc): ?>
			<?php $_from = $this->_tpl_vars['oneClue']->imgsrc; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
				<img src="<?php echo $this->_tpl_vars['item']; ?>
" alt="">
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
		</div>
		<div class="textdesc">
			<div class="row">
				<span>城市：</span>
				<p><?php echo $this->_tpl_vars['oneClue']->location; ?>
</p>
			</div>
			<div class="row">
				<span>宠物昵称：</span>
				<p><?php echo $this->_tpl_vars['oneClue']->pnickname; ?>
</p>
			</div>
			<div class="row">
				<span>宠物性别：</span>
				<p><?php echo $this->_tpl_vars['oneClue']->sex; ?>
</p>
			</div>
			<div class="row">
				<span>流浪描述：</span>
				<p><?php echo $this->_tpl_vars['oneClue']->description; ?>
</p>
			</div>
			<div class="row">
				<span>联系人：</span>
				<p><?php echo $this->_tpl_vars['oneClue']->publisher; ?>
</p>
			</div>
			<div class="row">
				<span>联系方式：</span>
				<p><?php echo $this->_tpl_vars['oneClue']->telephone; ?>
</p>
			</div>
		</div>
	<?php endif; ?>
	</main>
	<!--E wandering-clues-detail-->
</body>
</html>