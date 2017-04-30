$(function(){
	/*判断临时存放的图片id是否存在,解决提交错误返回当前页面不显示图片问题*/
	if($('#tempimg').val() != ''){
		var imgVal = $('#tempimg').val();
		$('#uploadImg').hide();
		$('.add-img').append('<img src="'+imgVal+'" />');
	}
	$('#uploadImg').click(function(){
		wx.chooseImage({
		    count: 1, // 默认9
		    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
		    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
		    success: function (res) {
		        var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
		        $('#tempimg').val(localIds);
		        $('#uploadImg').hide();
		        $('.add-img').append('<img src="'+localIds+'" />');
		        wx.uploadImage({
				    localId: '' + localIds, // 需要上传的图片的本地ID，由chooseImage接口获得
				    isShowProgressTips: 1, // 默认为1，显示进度提示
				    success: function (res) {
				        var serverId = res.serverId; // 返回图片的服务器端ID
				        $('#imgsrc').val(serverId);
				    }
				});
		    }
		});
	});
});