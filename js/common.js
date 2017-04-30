$(document).ready(function(){
	/*底部当前栏目高亮*/
	// var curUrl = window.location.href;
	// var urlArr = $("#footer a");
	// for(var i=0;i<urlArr.length;i++){
	// 	if(urlArr[i] == curUrl){
	// 		urlArr[i].getElementsByTagName('span')[0].className = 'hover';
	// 	}
	// }
	/*获取验证码*/
	changeCode();
	/*点击验证码切换*/
	$('#codeImg').click(function(){
		var url = '/config/code.php';
		$(this).attr('src',url+'?r='+Math.random());
	});
	/*双击头部回到顶部*/
	$('#header>span').dblclick(function(){
		$('body,html').animate({scrollTop:0},500);
	});
});
function changeCode(){
	var url = '/config/code.php';
	$('#codeImg').attr('src',url+'?r='+Math.random());
}