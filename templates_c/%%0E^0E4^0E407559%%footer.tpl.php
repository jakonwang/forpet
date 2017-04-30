<?php /* Smarty version 2.6.30, created on 2017-02-27 14:36:09
         compiled from footer.tpl */ ?>
<footer id='footer'>
	<a href="index.php" class='home'>
		<span <?php if ($this->_tpl_vars['current'] == 'forpet'): ?>class='hover'<?php endif; ?>></span>
		<p>寻宠</p>
	</a>
	<a href="community.php?action=showCommunity" class='community'>
		<span <?php if ($this->_tpl_vars['current'] == 'community'): ?>class='hover'<?php endif; ?>></span>
		<p>社区</p>
	</a>
	<a href="service.php" class='service'>
		<span <?php if ($this->_tpl_vars['current'] == 'service'): ?>class='hover'<?php endif; ?>></span>
		<p>服务</p>
	</a>
	<a href="message.php?action=showMessage" class='message'>
		<span <?php if ($this->_tpl_vars['current'] == 'message'): ?>class='hover'<?php endif; ?>></span>
		<p>消息</p>
	</a>
	<a href="my.php?action=index" class='my'>
		<span <?php if ($this->_tpl_vars['current'] == 'my'): ?>class='hover'<?php endif; ?>></span>
		<p>我的</p>
	</a>
</footer>
<script src='<?php echo @ROOT_URL; ?>
/js/jquery-3.1.1.min.js'></script>
<script src='<?php echo @ROOT_URL; ?>
/js/common.js'></script>