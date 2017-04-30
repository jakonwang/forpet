$(function(){
	$('.cateForm').submit(function(){
		var cateName = $('.cateForm input[name=category_name]');
		if(cateName.val() == ''){
			$('#showWrong').modal('show');
			return false;
		}
		return true;
	});
	$('.btn-delete').click(function(){
		var isDelete = window.confirm('您确认要删除吗？');
		if(!isDelete){
			return false;
		}
		return true;
	});
	/*点击全选复选框*/
	$('#selectAll').click(function(){
		if(this.checked){
			$('input[type=checkbox]').each(function(){
				this.checked = true;
			});
		}else{
			$('input[type=checkbox]').each(function(){
				this.checked = false;
			});
		}
	});
})