$(function() {
	$('nav#navigation ul li a').hover (function() {
		var newWidth = $(this).width()+ 30;
		var newLeft = $(this).position().left;
		
		$('span.line').stop().animate({
			width: newWidth,
			left: newLeft
		
		},300);
		
	});

});

$(function() {
	$('nav#menuv ul li a').hover (function() {
		var newWidth = $(this).width()+ 30;
		var newLeft = $(this).position().left;
		
		$('span.line2').stop().animate({
			width: newWidth,
			left: newLeft
		
		},300);
		
	});

});

