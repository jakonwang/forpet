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
					url:'adopt.php?action=nextPage&page='+page_num,
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
         	var age = obj[index].age;
         	var category_name = obj[index].category_name;
         	var description = obj[index].description;
         	var imgsrc = obj[index].imgsrc;
         	var sex = obj[index].sex;
         	var pubdate = obj[index].pubdate;
         	var location = obj[index].location;
         	var html = "";
         	html += "<figure>";
         	html += "<a href='adopt.php?action=detail&id="+id+"'><img src='"+imgsrc[0]+"' alt=''></a>";
         	html += "<div class='about-pet'>";
         	html += "<h2 class='pet-name'>"+nickname+"</h2>";
			html += "<p class='age'>"+age+"岁</p>";
			html += "<p class='pet-type'>"+category_name+"</p>";
			html += "<p class='request'>"+description+"...</p>";
			html += "<p class='location'>"+location+"</p>";
			html += "<p class='pubdate'>"+pubdate+"</p>";
			html += "</div>";
			switch(sex){
				case '1':
				html += "<span class='male'></span>";
				break;
				case '2':
				html += "<span class='female'></span>";
				break;
				case '0':
				html += "<span class='unmale'></span>";
				break;
				default:
				html += "<span class='unmale'></span>";
				break;
			}
			html += "</figure>";
     		$('#adopt').append(html);
     	});
     	page_num++;
	}
	function noData(){
		$('.loading').hide();
		$('#adopt figure').append('<figure id="nodata"></figure>');
	}
})