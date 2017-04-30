$(function(){
	/*获取流浪线索的详细信息*/
	$('.clues-detail').click(function(){
		$.ajax({
			type:'GET',
			url:'bkWanderingClues.php?action=getOneClueByAjax&id='+$(this).attr('data-id'),
			dataType:'json',
			success:getData/*成功执行的方法句柄*/
		});
	});
	/*点击删除流浪线索按钮*/
	$('.btn-delete').click(function(){
		var isDelete = window.confirm('您确定要删除吗？');
		if(!isDelete){
			return false;
		}
		return true;
	});
	function getData(result){
		var obj = eval(result);/*数组转换成对象*/
		$('#showClueDetail .nickname').html(obj.nickname);
		$('#showClueDetail .headimgurl').html('<img src="'+obj.headimgurl+'" >');
		$('#showClueDetail .pnickname').html(obj.pnickname);
		$('#showClueDetail .sex').html(obj.sex);
		$('#showClueDetail .description').html(obj.description);
		var imgsrc = '';
		var imgarr = new Array();
		imgarr = obj.imgsrc.split('|');
		for(var i = 0;i < imgarr.length;i++){
			imgsrc += '<img src="'+imgarr[i]+'" />';
		}
		$('#showClueDetail .imgsrc').html(imgsrc);
		$('#showClueDetail .pubdate').html(obj.pubdate);
		$('#showClueDetail .publisher').html(obj.publisher);
		$('#showClueDetail .telephone').html(obj.telephone);
		$('#showClueDetail .location').html(obj.location);
		$('#showClueDetail').modal();
	}
});
