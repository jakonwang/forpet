$(function(){
	/*社区点赞操作*/
	$('#community .notice img').click(function(){
		var cid = $(this).attr('data-cid');
		var cur = $(this);
		$.ajax({
			async:true,
			type:'GET',
			dataType:'json',
			url:'communityPraise.php?action=praise&cid='+cid,
			success:function(res){
				var result = eval(res);
				if(result.status == 'success' && result.is_praise == 0){
					cur.attr('src','/images/community/praise.png');
				}else if(result.status == 'success' && result.is_praise == 1){
					cur.attr('src','/images/community/praise_hover.png');
				}
			}
		});
	});
});