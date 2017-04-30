$(function(){
	function imgLazyLoad(){
		var wanderingClues = $('#wandering-clues');
		var wanderingPics = $('#wandering-clues .pic img');
		wanderingPics.each(function(){
			if($(this)[0].offsetTop > $(window).scrollTop()){
				if($(this).attr('is-loaded') == 'false'){
					$(this).attr('src',$(this).attr('data-src'));
					$(this).attr('is-loaded','true');
					$(this).animate({opacity:'1',transition:'all 1s ease-in 2s'});
				}
			}
		});
	}
	imgLazyLoad();
	$(window).scroll(function(){
		imgLazyLoad();
	});
});