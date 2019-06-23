window.addEventListener("load",function(){
	$('.btn-like').css('cursor','pointer');
	$('.btn-dislike').css('cursor','pointer');


	function dislike(){
		$('.btn-dislike').unbind('click').click(function(){
			$(this).addClass('btn-like').removeClass('btn-dislike');
			$(this).attr('src', 'img/heart-black.png');
			like();
		});
		
	}
	dislike();

	function like(){
		$('.btn-like').unbind('click').click(function(){
			$(this).addClass('btn-dislike').removeClass('btn-like');
			$(this).attr('src', 'img/heart-red.png');
			dislike();
		});

	}
	like();
});

