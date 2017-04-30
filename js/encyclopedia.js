$(function(){
	/*取消收藏或收藏养宠百科*/
	$('.collect').click(function(){
		var id = $(this).attr('data-id');
		var now = $(this);
		if(now.hasClass('no-collected')){
			$.ajax({
				type:'GET',
				url:'encyclopedia.php?action=collect&id='+id,
				success:function(res){
					var obj = eval('(' + res + ')');
					var message = obj.message;
					if(message == 'success'){
						now.removeClass('no-collected');
						now.addClass('collected');
						alert('添加收藏');
					}
				}
			});
		}else{
			$.ajax({
				type:'GET',
				url:'encyclopedia.php?action=noCollect&id='+id,
				success:function(res){
					var obj = eval('(' + res + ')');
					var message = obj.message;
					if(message == 'success'){
						now.removeClass('collected');
						now.addClass('no-collected');
						alert('取消收藏');
					}
				}
			});
		}
	});
});