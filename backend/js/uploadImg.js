$(function(){
	/*点击上传图片并且返回图片的路径和显示*/
	$('#uploadImg').change(function(){
		var formData = new FormData();
		formData.append('uploadImg',$('#uploadImg')[0].files[0]);
		$.ajax({
			type:'POST',
			url:'bkEncyclopedia.php?action=uploadImg',
			cache:false,
			data:formData,
			processData:false,
			contentType:false,
			success:function(res){
				var obj = JSON.parse(res);
				$('#uploadText').val(obj.uploadImg);
				$('.upload-img img').attr('src',obj.uploadImg);
				$('.upload-img').show();
			}
		});
	});
});