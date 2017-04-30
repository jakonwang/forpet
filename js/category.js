$(function(){
	/*分类点击事件*/
	$('#firstCates').change(function(){
		var nextId = this.value;
		$.ajax({
			async:true,
			type:'GET',
			url:'adopt.php?action=nextCate&pid='+nextId,
			success:function(res){
				var obj = eval(res);
				var opt = "<option value='-1'>--请选择二级分类--</option>";
				$.each(obj,function(key,value){
					if(key == 0){
						opt += "<option value='"+value.id+"' selected>"+value.category_name+"</option>";
					}else{
						opt += "<option value='"+value.id+"'>"+value.category_name+"</option>";
					} 
			    });
			    $('#secondCates').html('');
			    $('#secondCates').append(opt);
			}
		});
	});
});