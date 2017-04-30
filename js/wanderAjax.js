$(function(){
	var page_num=2;
	$(window).scroll(function(){
		var docTop = $(document).scrollTop();/*文档滚动条高度*/
		var docHeight = $(document).height();/*文档高度*/
		var winHeight = $(window).height();/*浏览器窗口高度*/
		if(docTop >= docHeight - winHeight){
			if(!$('#nodata').length){
				$.ajax({
					type:'GET',
					url:'wanderingClues.php?action=nextPage&page='+page_num,
					dataType:'json',
					success:getData,/*成功执行的方法句柄*/
					error:noData/*失败时执行的方法句柄*/
				});
			}
			
		}
	});
	function getData(result){
		var obj = eval(result);/*数组转换成对象*/
		$.each(obj, function(index,item){
         //循环获取数据  
         	var id = obj[index].id;
         	var openid = obj[index].openid;
         	var nickname = obj[index].nickname;
         	var description = obj[index].description;
         	var imgsrc = obj[index].imgsrc;
         	var pubdate = obj[index].pubdate;
         	var location = obj[index].location;
         	var nickname = obj[index].nickname;
         	var headimgurl = obj[index].headimgurl;
         	var html = "";
         	html += "<li class='item'>";
         	html += "<div class='thumb'><img src='"+headimgurl+"' alt=''></div>";
         	html += "<div class='title'>";
         	html += "<h2><a href='###'>"+nickname+"</a></h2>";
			html += "<p>"+pubdate+" 来自 "+location+"</p>";
			html += "</div>";
			html += "<div class='description'>"+description+"...</div>";
			html += "<div class='pic'><a href='wanderingClues.php?action=detail&id="+id+"'>";
			if(imgsrc){
				$.each(imgsrc, function(index,item){
				html += "<img data-src="+item+" alt='' is-loaded='false'>";
				});
			}
			html += "</a></div>";
			html += "<div class='spread'>0人帮他扩散</div></li>";
     		$('#wandering-clues ul').append(html);
     	});
     	page_num++;
	}
	function noData(){
		$('.loading').hide();
		$('#wandering-clues ul').append('<li id="nodata"></li>');
	}
})