$(function(){
	/*评论区点击*/
	$('footer.comment .btn').keydown(function(){
		var btn = $(this);
		var comment = btn.val();
		if(comment.length > 0){
			$('footer.comment .send').css({'background':'#2ecc71','color':'#FFF','border':'1px solid #2ecc71'});
		}else{
			$('footer.comment .send').css({'background':'#f8f8f8','color':'#a9a9a9','border':'1px solid #e8e8e8'});
		}
	});
	$('footer.comment .btn').keyup(function(){
		var btn = $(this);
		var comment = btn.val();
		if(comment.length <= 0){
			$('footer.comment .send').css({'background':'#f8f8f8','color':'#a9a9a9','border':'1px solid #e8e8e8'});
		}else{
			$('footer.comment .send').css({'background':'#2ecc71','color':'#FFF','border':'1px solid #2ecc71'});
		}
	});
	/*发送评论*/
	$('footer.comment .send').click(function(){
		var sendBtn = $(this);
		var commentValue = $('footer.comment .btn').val();
		var cid = $('footer.comment .send').attr('data-cid');
		if(commentValue.length > 0 && commentValue.length <= 20){
			$.ajax({
				async:true,
				dataType:'json',
				type:'POST',
				data:{'cid':cid,'content':commentValue},
				url:'communityComment.php?action=addOneComment',
				success:function(res){
					var result = eval(res);
					var html = '';
					if(result.status == 'success'){
						$('footer.comment .btn').val('');
						html += '<li>';
						html += '<a href="" class="comment-headimg"><img src="'+result.userinfo.headimgurl+'" alt=""></a>';
						html += '<div class="text">'+result.userinfo.nickname+'<span>'+result.userinfo.ctime+'</span></div>';
						html += '<div class="content">'+result.userinfo.content+'</div>';
						html += '</li>';
						$('.comment-area ul').append(html);
					}else{
						return false;
					}
				}
			});
		}else{
			return false;
		}
	});
});