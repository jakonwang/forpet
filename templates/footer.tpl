<footer id='footer'>
	<a href="index.php" class='home'>
		<span <{if $current eq 'forpet'}>class='hover'<{/if}>></span>
		<p>寻宠</p>
	</a>
	<a href="community.php?action=showCommunity" class='community'>
		<span <{if $current eq 'community'}>class='hover'<{/if}>></span>
		<p>社区</p>
	</a>
	<a href="service.php" class='service'>
		<span <{if $current eq 'service'}>class='hover'<{/if}>></span>
		<p>服务</p>
	</a>
	<a href="message.php?action=showMessage" class='message'>
		<span <{if $current eq 'message'}>class='hover'<{/if}>></span>
		<p>消息</p>
	</a>
	<a href="my.php?action=index" class='my'>
		<span <{if $current eq 'my'}>class='hover'<{/if}>></span>
		<p>我的</p>
	</a>
</footer>
<script src='<{$smarty.const.ROOT_URL}>/js/jquery-3.1.1.min.js'></script>
<script src='<{$smarty.const.ROOT_URL}>/js/common.js'></script>