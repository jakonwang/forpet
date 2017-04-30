$(function(){
	/*添加好友申请输入框输入时显示关闭按钮，否则不显示*/
	$('#content').keydown(function(){
		if($(this).val().length >= 1){
			$('#clear').show();
		}else{
			$('#clear').hide();
		}
	});
	$('#content').keyup(function(){
		var content = $('.addFriends-form textarea').val();
		if(content.length > 50){
			$('.addFriends-form .error').html('验证信息不得超过50个字！');
			$('.addFriends-form .error').show();
		}else{
			$('.addFriends-form .error').hide();
		}
		if($(this).val() == ''){
			$('#clear').hide();
		}else{
			$('#clear').show();
		}
	});
	/*点击清除按钮清除输入框里边的值*/
	$('#clear').click(function(){
		$('#content').val('');
		$(this).hide();
		$('.addFriends-form .error').hide();
	});
	/*验证输入请求信息的长度*/
	$('.addFriends-form').submit(function(){
		var content = $('.addFriends-form textarea').val();
		if(content.length > 50){
			$('.addFriends-form .error').html('验证信息不得超过50个字！');
			$('.addFriends-form .error').show();
			return false;
		}else if(content.length < 5){
			$('.addFriends-form .error').html('验证信息不得少于5位！');
			$('.addFriends-form .error').show();
			return false;
		}
		return true;
	});
});