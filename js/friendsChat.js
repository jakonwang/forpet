$(function(){
	var tt = $(document).height() - $(window).height();
	$(window).scrollTop(tt);
	var sender = $('input[name=sender]').val();/*发送者id*/
	var receiver = $('input[name=receiver]').val();/*接收者id*/
	var senderHead = $('input[name=senderHead]').val();/*发送者头像*/
	var receiverHead = $('input[name=receiverHead]').val();/*接收者头像*/
	/*发送信息*/
	$('#send').click(function(){
		var content = $('.content').html();
		if(content != ''){
			var hours = (new Date()).getHours();
			if(hours < 10){
				hours = '0'+hours;
			}
			var minutes = (new Date()).getMinutes();
			if(minutes < 10){
				minutes = '0'+minutes;
			}
			var chat_time = hours +':'+minutes;
			$(this).attr('disabled','disabled');/*设置发送按钮不可点击*/
			$.ajax({
				type:"POST",
				async:true,
				url:"friendsChat.php?action=addChat",
				data:{'sender':sender,'receiver':receiver,'content':content},
				dataType:'json',
				success:function(res){
					var result = eval(res);
					if(result.msg == 'success'){/*如果发送成功*/
						$('#send').removeAttr('disabled');
						$('.content').html('');
						var html = '';
						if(Math.random()*10 > 6){
							html = '<div class="time">'+chat_time+'</div>';
						}
						html += '<div class="right">';
						html += '<a href="#"  class="headimgurl"><img src="'+senderHead+'" alt=""></a>';
						html += '<div class="msg">'+content+'</div></div>';
						$('#chat').append(html);
						var tt = $(document).height() - $(window).height();
						$(window).scrollTop(tt);
						$('.content').focus();
					}else{
						console.log('发送失败！');
					}
				}
			});
		}
	});
	/*获得信息*/
	getMessage();
	function getMessage(){
			var link = {//jQuery的AJAX执行的配置对象
			type:"POST",
			async:true,
			data:{'sender':sender,'receiver':receiver},
			dataType:'json',
			url:"friendsChat.php?action=getChat",
		/*设置期望的返回格式，因服务器返回json格式，这里将数据作为json格式对待*/
			dataType:"json",
			success:function(msg){
				var result = eval(msg);/*获取未读消息*/
				/*判断是否接收到消息*/
				if(result.message == 'success'){
					var html = '';
					/*接收者消息*/
					if(Math.random()*10 > 6){
						html = '<div class="time">'+result.chat_time+'</div>';
					}
					html += '<div class="left">';
					html += '<a href="#"  class="headimgurl"><img src="'+receiverHead+'" alt=""></a>';
					html += '<div class="msg">'+result.content+'</div></div>';
					$('#chat').append(html);
					var tt = $(document).height() - $(window).height();
					$(window).scrollTop(tt);
				}
				setTimeout(getMessage,300);
			}
		}
		$.ajax(link);/*执行ajax请求*/
	}
});