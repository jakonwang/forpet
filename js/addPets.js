$(function(){
	/*日期插件*/
	$('.birthday').date();
	/*数字增加与减少*/
	var weight = $('#weight').val();
	$('#plus').click(function(){
		if(weight == 100){
			alert('已经是最大体重了！');
			return false;
		}else{
			weight++;
			$('#weight').val(weight);
		}
	})
	$('#reduce').click(function(){
		if(weight == 1){
			alert('已经是最小体重了！');
			return false;
		}else{
			weight--;
			$('#weight').val(weight);
		}
	});
	/*判断年龄输入是否合法*/
	$('#weight').change(function(){
		var pattern = /^[1-9]+.?[0-9]*$/;
		var weight = $('#weight').val();
		if(!pattern.test(weight)){
			$('#weight').val('1');
		}else if(weight > 100){
			$('#weight').val('100');
		}else if(weight < 1){
			$('#weight').val('1');
		}
	});
	/*显示错误信息*/
	function showError($mes=null){
		$('.validate-mes').text($mes).fadeIn();
		setTimeout(function(){
			$('.validate-mes').fadeOut();
		},1500);
	}
	/*添加宠物提交时提示*/
	$('.addPets form').submit(function(){
		if(!$('.addPets form input[name=serverId]').val()){
			showError('请上传宠物头像！');
			return false;
		}else if(!$('.addPets form input[name=nickname]').val()){
			showError('宠物昵称不能为空！');
			return false;
		}else if($('.addPets form input[name=nickname]').val().length < 2){
			showError('宠物昵称不能小于2位！');
			return false;
		}else if($('.addPets form input[name=nickname]').val().length > 25){
			showError('宠物昵称不能大于25位！');
			return false;
		}else if($('.addPets form select[name=pet_cates]').val() < 0){
			showError('请选择宠物分类！');
			return false;
		}
		var getDate = $('.addPets form input[name=birthday]').val();
		var getDateTime = Date.parse(new Date(getDate)) / 1000;
		var currentTime = Date.parse(new Date()) / 1000;
		if(getDateTime > currentTime){
			showError('不能输入未来的日期！');
			return false;
		}else if(getDate == ''){
			showError('宠物生日不能为空！');
			return false;
		}
		return true;
	});
	function chooseImage(){
	// 选择照片
		wx.chooseImage({
		    count: 1, /* 默认9*/
		    sizeType: ['compressed'], /* 可以指定是原图还是压缩图，默认二者都有*/
		    sourceType: ['album', 'camera'], /*可以指定来源是相册还是相机，默认二者都有*/
		    success: function(res) {
		        var localIds = res.localIds; /*返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片*/
		        $('#uploadImg').attr('src',localIds);
		        /* 上传照片*/
		        wx.uploadImage({
		            localId: '' + localIds,
		            isShowProgressTips: 1,
		            success: function(res) {
		                var serverId = res.serverId;
		               	$('#headimgurl').val(serverId);/* 把上传成功后获取的值附上*/ 
		            }
		        });
		    }
		});
	}
	$('#uploadImg').click(function(){
		chooseImage();
	});
	/*当改变一级分类获取二级分类*/
	$('#first-category').change(function(){

	});
});