$(function(){
	/*判断是否要删除*/
	$('.btn-delete').click(function(){
		var is_delete = window.confirm('您确定要删除吗？');
		if(is_delete){
			return true;
		}
		return false;
	});
	/*ueditor在线编辑器随滚动条固定*/
	$(window).scroll(function(){
		var doc = $(document);
		var edu = $('#edui1_toolbarbox');
		if(edu){
			if(doc.height()/2 - doc.scrollTop() < 60){
				$('#edui1_toolbarbox').css('top','70px');
			}else{
				$('#edui1_toolbarbox').css('top','0');
			}
		}
	});
});