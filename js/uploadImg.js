function chooseImage(){
	// 选择照片
	wx.chooseImage({
	    count: 1, /* 默认9*/
	    sizeType: ['compressed'], /* 可以指定是原图还是压缩图，默认二者都有*/
	    sourceType: ['album', 'camera'], /*可以指定来源是相册还是相机，默认二者都有*/
	    success: function(res) {
	        var localIds = res.localIds; /*返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片*/
	        var imgLen = $('.imgs-container img').length;
	        if(imgLen < 2){
	        	var newimg = '<img src="'+localIds+'">';
	        	$('.imgs-container').append(newimg);
	        }else if(imgLen == 2){
	        	var newimg = '<img src="'+localIds+'">';
	        	$('.imgs-container').append(newimg);
	        	$('#uploadImg').hide();
	        }
	        if($('#tempimg').val() != ''){
	        	 $('#tempimg').val($('#tempimg').val()+','+localIds);/*将图片id临时放在输入框中,解决提交错误返回当前页面不显示图片问题*/
        	}else{
        		$('#tempimg').val(localIds);
        	}
	        /* 上传照片*/
	        wx.uploadImage({
	            localId: '' + localIds,
	            isShowProgressTips: 1,
	            success: function(res) {
	                serverId = res.serverId;
	                if($('#imgsrc').val() != ''){
	                	var imgValue = $('#imgsrc').val();
	                	$('#imgsrc').val(imgValue+','+serverId); /* 把上传成功后获取的值附上*/
	                }else{
	                	$('#imgsrc').val(serverId);
	                }  
	            }
	        });
	    }
	});
}
$(function(){
	/*判断临时存放的图片id是否存在,解决提交错误返回当前页面不显示图片问题*/
	if($('#tempimg').val() != ''){
		var imgVal = $('#tempimg').val();
		var imgArr = imgVal.split(',');
		for(var i=0;i<imgArr.length;i++){
			if(i < 2){
	        	var newimg = '<img src="'+imgArr[i]+'">';
	        	$('.imgs-container').append(newimg);
	        }else if(i == 2){
	        	var newimg = '<img src="'+imgArr[i]+'">';
	        	$('.imgs-container').append(newimg);
	        	$('#uploadImg').hide();
	    	}
		}
	}
	$('#uploadImg').click(function(){
		chooseImage();
	});
})
