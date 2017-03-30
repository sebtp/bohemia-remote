// Changing color of header
jQuery(document).ready(function($){ 
	'use strict';
	if ( $("body").hasClass("single-work") || $("body").hasClass("single-blog")	) { // IF IN SINGLE PAGE
		$("#ham>span").addClass("white-bg");
		$(".phone,.logo").addClass("white");
		
		//CHANGE HEADER COLOR ON SCROLL PAST HEADER IN SINGLE PAGES
		$(window).scroll(function() {		
			var scroll = $(window).scrollTop(),
				vph = $(window).height() / 3 * 2 - 40;

			if (scroll >= vph) {
				$(".phone").removeClass("white");
				$(".phone").addClass("green");
				$("a.logo").css("opacity", "0");
				$(".gradient").css("opacity", "0");
				$("#ham>span").addClass("green-bg");
				$("#ham>span").removeClass("white-bg");


			} else {
				$(".phone").removeClass("green");
				$(".phone").addClass("white");
				$("a.logo").css("opacity", "1");
				$(".gradient").css("opacity", "1");
				$("#ham>span").addClass("white-bg");
				$("#ham>span").removeClass("green-bg");
			}
		});
		
	} else {
		$("#ham>span").addClass("blue-bg");
		$(".phone,.logo").addClass("blue"); 
	}
	if ($("body").hasClass("front-page")) {
		$(".gradient").hide();
	}
});

// Hamburger toggle animation
jQuery(document).ready(function($){
	'use strict';
	$('#ham').click(function(event) {
		event.preventDefault();
		$('.menu').toggleClass('is-visible');
		$('#ham').toggleClass('open');
		$(".gradient").fadeToggle("fast");
	});
	$('.menu>.veil').click(function(event){
		event.preventDefault();
		$('.menu').toggleClass('is-visible');
		$('#ham').toggleClass('open');
		$(".gradient").fadeToggle("fast");
	});	
});

/* Homepage tags scroll by clicking/click-holding a button.
 * For a faster animation change the last values in the animate() functions.
 */
jQuery(document).ready(function($){
	'use strict';
	var timeout;
	
	// button down
	$('.down').click(function(){
		var pos = $(".scroll-wrapper").scrollTop();
		$(".scroll-wrapper").animate({ scrollTop: pos + 30 + "px" },100);
	});
	
	$('.down').on('mousedown touchstart', function(){
		timeout = setInterval(function(){
			var pos = $(".scroll-wrapper").scrollTop();
			$(".scroll-wrapper").animate({ scrollTop: pos + 30 + "px" },100);
		}, 100);
		return false;
	});
	
	// button up
	$('.up').click(function(){
		var pos = $(".scroll-wrapper").scrollTop();
		$(".scroll-wrapper").animate({ scrollTop: pos - 30 + "px" },100);
	});

	$('.up').on('mousedown touchstart', function(){
		timeout = setInterval(function(){
			var pos = $(".scroll-wrapper").scrollTop();
			$(".scroll-wrapper").animate({ scrollTop: pos - 30 + "px" },100);
		}, 100);
		return false;
	});
	
	//clear timeout
	$('.up, .down').on('mouseup mouseleave touchend', function(){
		clearInterval(timeout);
		return false;
	});	
});