$(function(){
	var isClick = 0;/*是否点击了发布按钮*/
	var pageHeight = $(window).height();/*页面的高度*/
	/*发布按钮切换显示隐藏发布界面*/
	$('#release').click(function(){
		if(!isClick){
			$(this).css({'transform':'rotate(45deg)','transition':'all 0.2s ease-in'});
			$('.release').css('height',pageHeight);
			$('.release .row').show();
			$('.release').fadeIn();
			isClick = 1;
		}else{
			$(this).css({'transform':'rotate(0)','transition':'all 0.2s ease-in'});
			$('.release').css('height',0);
			$('.release .row').hide();
			$('.release').fadeOut();
			isClick = 0;
		}
	});
})