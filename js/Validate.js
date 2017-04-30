$(function(){
	function showError($mes=null){
		$('.validate-mes').text($mes).fadeIn();
		setTimeout(function(){
			$('.validate-mes').fadeOut();
		},1500);
	}
	/*验证发布流浪线索*/
	$('.add-clues form').submit(function(){
		if(!$('.add-clues form input[name=imgsrc]').val()){
			showError('上传图片不能为空！');
			return false;
		}
		if($('.add-clues form input[name=nickname]').val().length > 20){
			showError('宠物昵称不得大于20位！');
			$('.add-clues form input[name=nickname]').focus();
			return false;
		}
		if($('.add-clues form textarea[name=description]').val().length < 20){
			showError('流浪描述不得小于20位！');
			$('.add-clues form textarea[name=description]').focus();
			return false;
		}
		if($('.add-clues form textarea[name=description]').val().length > 255){
			showError('流浪描述不得大于255位！');
			$('.add-clues form textarea[name=description]').focus();
			return false;
		}
		if($('.add-clues form input[name=publisher]').val().length < 2){
			showError('联系人姓名不得小于2位！');
			$('.add-clues form input[name=publisher]').focus();
			return false;
		}
		if($('.add-clues form input[name=publisher]').val().length > 20){
			showError('联系人姓名不得大于20位！');
			$('.add-clues form input[name=publisher]').focus();
			return false;
		}
		var pattern = /^1\d{10}$|^(0\d{2,3}-?|\(0\d{2,3}\))?[1-9]\d{4,7}(-\d{1,8})?$/;
		var telephone = $('.add-clues form input[name=telephone]').val();
		if(!pattern.test(telephone)){
			showError('请输入合法的联系方式！');
			$('.add-clues form input[name=telephone]').focus();
			return false;
		}
		if($('.add-clues form input[name=code]').val().length != 4){
			showError('请输入4位的验证码！');
			return false;
		}
		return true;
	});
	/*验证发布领养*/
	$('.add-adopt form').submit(function(){
		if(!$('.add-adopt form input[name=imgsrc]').val()){
			showError('上传图片不能为空！');
			return false;
		}
		if($('.add-adopt form select[name=pet_cates]').val() < 0){
			showError('请选择宠物分类！');
			return false;
		}
		if($('.add-adopt form input[name=nickname]').val().length < 2){
			showError('宠物昵称不得小于20位！');
			$('.add-adopt form input[name=nickname]').focus();
			return false;
		}
		if($('.add-adopt form input[name=nickname]').val().length > 20){
			showError('宠物昵称不得大于20位！');
			$('.add-adopt form input[name=nickname]').focus();
			return false;
		}
		var agepattern = /^[0-9]{1,2}$/;
		var age = $('.add-adopt form input[name=age]');
		if(!agepattern.test(age.val())){
			showError('请输入合法的宠物年龄！');
			age.focus();
			return false;
		}
		if($('.add-adopt form textarea[name=description]').val().length < 20){
			showError('领养要求不得小于20位！');
			$('.add-adopt form textarea[name=description]').focus();
			return false;
		}
		if($('.add-adopt form textarea[name=description]').val().length > 255){
			showError('领养要求不得大于255位！');
			$('.add-adopt form textarea[name=description]').focus();
			return false;
		}
		if($('.add-adopt form input[name=publisher]').val().length < 2){
			showError('联系人姓名不得小于2位！');
			$('.add-adopt form input[name=publisher]').focus();
			return false;
		}
		if($('.add-adopt form input[name=publisher]').val().length > 20){
			showError('联系人姓名不得大于20位！');
			$('.add-adopt form input[name=publisher]').focus();
			return false;
		}
		var pattern = /^1\d{10}$|^(0\d{2,3}-?|\(0\d{2,3}\))?[1-9]\d{4,7}(-\d{1,8})?$/;
		var telephone = $('.add-adopt form input[name=telephone]').val();
		if(!pattern.test(telephone)){
			showError('请输入合法的联系方式！');
			$('.add-adopt form input[name=telephone]').focus();
			return false;
		}
		if($('.add-adopt form input[name=code]').val().length != 4){
			showError('请输入4位的验证码！');
			return false;
		}
		return true;
	});
	/*验证发布寻回*/
	$('.add-retrieve form').submit(function(){
		if(!$('.add-retrieve form input[name=imgsrc]').val()){
			showError('上传图片不能为空！');
			return false;
		}
		if($('.add-retrieve form select[name=pet_cates]').val() < 0){
			showError('请选择宠物分类！');
			return false;
		}
		if($('.add-retrieve form input[name=nickname]').val().length < 2){
			showError('宠物昵称不得小于20位！');
			$('.add-retrieve form input[name=nickname]').focus();
			return false;
		}
		if($('.add-retrieve form input[name=nickname]').val().length > 20){
			showError('宠物昵称不得大于20位！');
			$('.add-retrieve form input[name=nickname]').focus();
			return false;
		}
		var agepattern = /^[0-9]{1,2}$/;
		var age = $('.add-retrieve form input[name=age]');
		if(!agepattern.test(age.val())){
			showError('请输入合法的宠物年龄！');
			age.focus();
			return false;
		}
		var dateformat = /^(([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8]))))|((([0-9]{2})(0[48]|[2468][048]|[13579][26])|((0[48]|[2468][048]|[3579][26])00))-02-29)$/;
		var losetime = $('.add-retrieve form input[name=losetime]');
		if(!dateformat.test(losetime.val())){
			showError('请输入合法的日期！');
			losetime.focus();
			return false;
		}
		if($('.add-retrieve form textarea[name=description]').val().length < 20){
			showError('宠物特征不得小于20位！');
			$('.add-retrieve form textarea[name=description]').focus();
			return false;
		}
		if($('.add-retrieve form textarea[name=description]').val().length > 255){
			showError('宠物特征不得大于255位！');
			$('.add-retrieve form textarea[name=description]').focus();
			return false;
		}
		if($('.add-retrieve form input[name=publisher]').val().length < 2){
			showError('主人姓名不得小于2位！');
			$('.add-retrieve form input[name=publisher]').focus();
			return false;
		}
		if($('.add-retrieve form input[name=publisher]').val().length > 20){
			showError('联系人姓名不得大于20位！');
			$('.add-retrieve form input[name=publisher]').focus();
			return false;
		}
		var pattern = /^1\d{10}$|^(0\d{2,3}-?|\(0\d{2,3}\))?[1-9]\d{4,7}(-\d{1,8})?$/;
		var telephone = $('.add-retrieve form input[name=telephone]').val();
		if(!pattern.test(telephone)){
			showError('请输入合法的联系方式！');
			$('.add-retrieve form input[name=telephone]').focus();
			return false;
		}
		if($('.add-retrieve form input[name=code]').val().length != 4){
			showError('请输入4位的验证码！');
			return false;
		}
		return true;
	});
});