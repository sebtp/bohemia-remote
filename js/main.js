// Get IE or Edge browser version
var version = detectIE();

if (version === false) {
	//not IE/Edge
} else if (version >= 12) {
	// Edge
	document.body.classList.add("edge");
} else {
	// IE
	document.body.classList.add("ie");
}

/**
 * detect IE
 * returns version of IE or false, if browser is not Internet Explorer
 */
function detectIE() {
	'use strict';
  var ua = window.navigator.userAgent;
  
  var msie = ua.indexOf('MSIE ');
  if (msie > 0) {
    // IE 10 or older => return version number
    return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
  }

  var trident = ua.indexOf('Trident/');
  if (trident > 0) {
    // IE 11 => return version number
    var rv = ua.indexOf('rv:');
    return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
  }

  var edge = ua.indexOf('Edge/');
  if (edge > 0) {
    // Edge (IE 12+) => return version number
    return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
  }

  // other browser
  return false;
}


//Resize footer SVG
window.onload = function initalSVG() {
	'use strict';
	var angle = window.innerWidth / 5120;
  
  //hero variables
  var hbl = '0 1,',
      htl = '0 ' + angle + ',',
      htr = '1 0,',
      hbr = '1 1';
       
  document.querySelector("#clip-polygon-footer > polygon").setAttribute("points", hbl + htl + htr + hbr);
};

window.onresize = function changeSVG() {
	'use strict';
	var angle = window.innerWidth / 5120;
  
  //hero variables
 	var hbl = '0 1,',
      htl = '0 ' + angle + ',',
      htr = '1 0,',
      hbr = '1 1';
       
  document.querySelector("#clip-polygon-footer > polygon").setAttribute("points", hbl + htl + htr + hbr);
};


// Making videos stick to their ratio and resize full width
jQuery(document).ready(function($){
	'use strict';
	// Find all YouTube videos
	var $allVideos = $("iframe[src^='https://player.vimeo.com'], iframe[src^='https://www.youtube.com'], object, embed"),

		// The element that is fluid width
		$fluidEl = $(".content > p");

	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {

	  $(this)
		.data('aspectRatio', this.height / this.width)

		// and remove the hard coded width/height
		.removeAttr('height')
		.removeAttr('width');

	});

	// When the window is resized
	$(window).resize(function() {

	  var newWidth = $fluidEl.width();

	  // Resize all videos according to their own aspect ratio
	  $allVideos.each(function() {

		var $el = $(this);
		$el
		  .width(newWidth)
		  .height(newWidth * $el.data('aspectRatio'));

	  });

	// Kick off one resize to fix all videos on page load
	}).resize();
});

// scroll to first section
jQuery(document).ready(function($){
	'use strict';
	$(".arrow").click(function() {
		$('html,body').animate({
			scrollTop: $(".one").offset().top},
			'slow');
	});
});

//Gallery masonry init
jQuery(document).ready(function($){
	'use strict';
	//Add the masonry class to all but first 3
	$(".gallery>.gallery-item:not(:first-of-type)").addClass("small-img");
	$(".gallery>.gallery-item:first-of-type").addClass("big-img");
	
	// init Isotope
	var $grid = $('.gallery').isotope({
		// options
		itemSelector: '.small-img',
		stamp: '.big-img',
		masonry: {
			gutter: 30,
			transitionDuration: '0.2s'
		}
		
	});
	// layout Isotope after each image loads
	$grid.imagesLoaded().progress( function() {
	  $grid.isotope('layout');
	});
	
});


// Changing colors of header
jQuery(document).ready(function($){ 
	'use strict';
	var hamburger = $("#ham>span"),
		logo = $("#logo"),
		phone = $("#phone"),
		gradient = $(".gradient"),
		body = $("body");
	
	// Function to be called to set the initial color
	$.fn.setColor = function(colorBg, color){
        hamburger.addClass(colorBg);		
		phone.addClass(color);		
		logo.addClass(color);
    };
	
	// Function to be called to change the color and remove the gradient + logo
	$.fn.switchToColor = function(colorBg, color){
        //hamburger.removeClass();
		//phone.removeClass();
		hamburger.addClass(colorBg);
		phone.addClass(color);
		gradient.css("top", "-16rem");
		logo.parent().css("margin-top", "-6rem");
    };
	
	// Function to be called to change back the color and get the gradient + logo back
	$.fn.switchFromColor = function(colorBg, color){
        hamburger.removeClass(colorBg);
		phone.removeClass(color);
		gradient.css("top", "0rem");
		logo.parent().css("margin-top", "0rem");
    };
	
	// Checking what page are we on and adjusting based on it
	if (body.hasClass("front-page") || body.hasClass("overview-blog")) {
		
		//set inital color green
		$.fn.setColor("green-bg","green");
		
		//Make the logo dissapear
		$(window).scroll(function() {		
			var scroll = $(window).scrollTop(),
				vph = $(window).height() / 3 * 2 - 40;

			if ( (scroll >= vph) ) {
				logo.parent().css("margin-top", "-6rem");
			} else {
				logo.parent().css("margin-top", "0rem");
			}
		});
		
	} else if (body.hasClass("overview-work") || body.hasClass("overview-about")) {
		
		//set inital color red
		$.fn.setColor("red-bg","red");
		
		//CHANGE HEADER COLOR ON SCROLL PAST HEADER 
		$(window).scroll(function() {		
			var scroll = $(window).scrollTop(),
				vph = $(window).height() / 3 * 2 - 40;

			if ( (scroll >= vph) ) {
				$.fn.switchToColor("white-bg","white");
			} else {
				$.fn.switchFromColor("white-bg","white");
			}
		});
		
	} else if (body.hasClass("single-blog") || body.hasClass("single-contact")) {
		
		//CHANGE HEADER COLOR ON SCROLL PAST HEADER
		$(window).scroll(function() {		
			var scroll = $(window).scrollTop(),
				vph = $(window).height() / 3 * 2 - 40;

			if ( (scroll >= vph) ) {
				$.fn.switchToColor("green-bg","green");
			} else {
				$.fn.switchFromColor("green-bg","green");
			}
		});
		
	} else if (body.hasClass("single-work") || body.hasClass("single-about")) {
		//CHANGE HEADER COLOR ON SCROLL PAST HEADER 
		$(window).scroll(function() {		
			var scroll = $(window).scrollTop(),
				vph = $(window).height() / 3 * 2 - 40;

			if ( (scroll >= vph) ) {
				$.fn.switchToColor("red-bg","red");
			} else {
				$.fn.switchFromColor("red-bg","red");
			}
		});
	} else {
		//set inital color red
		$.fn.setColor("red-bg","red");
		
		//CHANGE HEADER COLOR ON SCROLL PAST HEADER 
		$(window).scroll(function() {		
			var scroll = $(window).scrollTop(),
				vph = $(window).height() / 3 * 2 - 40;

			if ( (scroll >= vph) ) {
				gradient.css("top", "-16rem");
				logo.parent().css("margin-top", "-6rem");
			} else {
				gradient.css("top", "0rem");
				logo.parent().css("margin-top", "0rem");
			}
		});
	}
	
});

// Hamburger toggle animation
jQuery(document).ready(function($){
	'use strict';
	
	$('#ham').click(function(event) {

		if ($('#ham').hasClass('open')) {
			
			//When closing the menu
			event.preventDefault();
			$('.menu-wrapper').removeClass('is-visible');
			$('#ham').removeClass('open');
			$("#logo, #phone").removeClass("translucent");		
			var scroll = $(window).scrollTop(),
				vph = $(window).height() / 3 * 2 - 40;
			if ( (scroll < vph) ) {
				$(".gradient").css("top", "0rem").css("opacity","1");
			}
		}else{
			
			//When opening the menu
			event.preventDefault();
			$('.menu-wrapper').addClass('is-visible');
			$('#ham').addClass('open');
			$(".gradient").css("top", "-16rem").css("opacity","0");
			$("#logo, #phone").addClass("translucent");
			
			
		}
	});
	
	$('.menu-wrapper>.veil').click(function(event){
		event.preventDefault();
		$('.menu-wrapper').removeClass('is-visible');
		$('#ham').removeClass('open');
		$(".gradient").css("top", "0rem");	
		$("#logo, #phone").removeClass("translucent");
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


//***************************//
//			Plugins
//***************************//

// Sidebar follow
/*jQuery(document).ready(function($){
	'use strict';
	var vwp = $(document).width();
	if (( ($("body").hasClass("single-blog") || $("body").hasClass("single-work")) && vwp > 1023) && $("aside").length) {
		$(function() {
			var $hh;
			if ( $("body").hasClass("single-blog") ) {
				$hh = $(".title:first-child").height() + 185; 
			} else if ($("body").hasClass("single-work")) {
				$hh = $("h1:first-child").height() + 185; 
			}
			
			var $sidebar   = $("#sidebar"),
				$window    = $(window),
				offset     = $sidebar.offset(),
				topPadding = -$hh + 30;

			$sidebar.removeClass("initial-mt");
			$sidebar.css("padding-top",$hh);

			$window.scroll(function() {
				if ($window.scrollTop() > offset.top + $hh) {
					if ($('div.gallery').inView()) {
						//$sidebar.stop();
						console.log("Visible!");
					} else {
						$sidebar.stop().animate({
							marginTop: $window.scrollTop() - offset.top + topPadding
						});
					}
					
					
				} else {
					$sidebar.stop().animate({
						marginTop: 0
					});
				}
			});

		});
	}
	
});*/


/*function isElementInViewport (el) {
	'use strict';

    //special bonus for those using jQuery
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }

    var rect = el.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && //or $(window).height()
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) //or $(window).width()
    );
}


/**
 * Hover on Scroll
 * A jQuery plugin that displays hover affects on mobile during scrolling
 * See www.bencomeau.com/hover-on-scroll for more information
 * https://github.com/bencomeau/hover-on-scroll
 * Version 1.0, October 15 2015
 * by Ben Comeau
 */

