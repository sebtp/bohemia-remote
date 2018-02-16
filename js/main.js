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


document.addEventListener( 'wpcf7submit', function() {
	'use strict';
	alert( "Fire!" );
}, false );

//***************************//
//          jQuery
//***************************//
jQuery("document").ready(function($) {
	
	'use strict';
	
	/* 
	 * Downloadables
	 * 
	 */
	
	
	/*$('#masterclass-subscribe-form').ajaxChimp();
	$('#masterclass-subscribe-form').submit(function(e){
		e.preventDefault();
		var masterclassForm = $(this);
		var thePostField = masterclassForm.find("input[name=masterclass]");
		if (thePostField) {
			var thePost = thePostField.val();
			var email = $("#masterclass-subscribe-form input[name=EMAIL]");
			if(email.val() !== '' && isValidEmailAddress(email.val())){
				$.ajax({
					type: "POST",
					url: "wp-admin/admin-ajax.php",
					data: {action: 'send_masterclass', thePost: thePost, email:email.val()},
					cache: false,
					async: true,
					proccessData: false,
					success: function(response) {
						if ( response === 'thankyou' ) {
							masterclassForm.find('.mce-responses .mce-success-response').html('Please check your email (also Spam folder).').show();
							masterclassForm.find('.mce-responses .mce-error-response').hide();
						}else{
							masterclassForm.find('.mce-responses .mce-error-response').html('Something went wrong. Please refresh the page and try again.').show();
							masterclassForm.find('.mce-responses .mce-success-response').hide();
						}
					}
				});
			}else{
				masterclassForm.find('.mce-responses .mce-error-response').html('Something went wrong. Please try again.').show();
				masterclassForm.find('.mce-responses .mce-success-response').hide();
			}
			email.val('');
		}
		return true;
	});*/
	
	/* 
	 * Send email to an user when a file was requested
	 * 
	 */
	/*$('#request-file').on('submit', function(e){
		e.preventDefault();
		var emailField = $(this).find('#downloadEmail');

		// check email format is correct
		if( ( emailField.length && emailField.val() === '' ) || !isValidEmailAddress( emailField.val() ) ) {
			emailField.addClass('error');
			emailField.next('.error-messages').text('Invalid email format');
			return false;	
		}

		var data_a = 'action=send_email&detnawtsop=' + $(this).find('input[name="detnawtsop"]').val() + '&email=' + emailField.val();
		$.ajax({
			type: "POST",
			url: "wp-admin/admin-ajax.php",
			data: data_a,
			cache: false,
			async: true,
			proccessData: false,
			success: function(response) {
				if ( response === 'thankyou' ) {
					 window.location.href = '/thank-you';
				}else{
					$('.error-messages').text(response);
				}

			}
		});	

	});*/
	
	/* 
	 * Homepage arrow scroll to first section
	 * 
	 */
	
	$(".arrow").click(function() {
		$('html,body').animate({
			scrollTop: $(".one").offset().top - 120},
			'slow', 'swing');
	});
	
	
	/* 
	 * init - Gallery masonry
	 * 
	 */
	
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
	
	
	/* 
	 * Changing colors of the header based on page
	 * 
	 */
	
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
	
	
	/* 
	 * Hamburger toggle animation
	 * 
	 */
	
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
	
	
	/* 
	 * Homepage tags scroll by clicking/click-holding a button.
	 * For a faster animation change the last values in the animate() functions.
	 */
	
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
	
	
	/**
	 * Sidebar functions
	 * 
	 * 
	 */
		
	var vwp = $(window).width();
	if ( ($("body").hasClass("single-blog") || $("body").hasClass("single-work")) && $("#sidebar").length) {
		
		/**
		 * Downloadable form fields
		 * Writing in the hidden form fields the values sent by PHP
		 * 
		 */
		
		$(function() {
			var $dlTitleInput = $("form input[name='downloadable_title']"),
				$dlURLInput = $("form input[name='downloadable_url']"),
				$dlTitle = $("#sidebar #downloadable_title").text(),
				$dlURL = $("#sidebar #downloadable_file_url").text();
			
//			console.log($dlTitleInput);
//			console.log($dlURLInput);
//			console.log($dlTitle);
//			console.log($dlURL);
			
			$dlTitleInput.val($dlTitle);
			$dlURLInput.val($dlURL);
			
		});	
		
		
		/**
		 * Sidebar Follow
		 * Making the sidebar follow as you scroll and stops if gallery or footer is on screen
		 * 
		 */
		
		if (vwp > 767) {
			
		
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

				var offsetBot = $window.height() - $("#sidebar").outerHeight() - topPadding;

				$window.scroll(function() {
					if ($window.scrollTop() > offset.top + $hh) {
						if ($('.gallery').isOnScreen(offsetBot) || $('.next').isOnScreen(offsetBot)) {
							$sidebar.stop();
						} else {
						  //$sidebar.stop().animate({marginTop: $window.scrollTop() - offset.top + topPadding});
						  $sidebar.stop().css("margin-top", $window.scrollTop() - offset.top + topPadding);
						}

					} else {
						//$sidebar.stop().animate({marginTop: 0});
						$sidebar.stop().css("margin-top", "0");
					}
				});

			});
		}
	}
	
	
	/**
	 * Full width videos
	 * Making videos stick to their ratio and resize full width.
	 * 
	 */
	
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
	
	
	//*****************************//
	//          Functions	       //
	//*****************************//
	
	/*
	 * isOnScreen
	 * A jQuery plugin that checks if an element is on screen
	 * @param: offsetBot (default = 0) - offsets the bottom bounts of the screen
	 */

	$.fn.isOnScreen = function(offsetBot){

		if (this.length === 0) {
			return false;
		} else {
			var win = $(window);

			var viewport = {
				top : win.scrollTop(),
				left : win.scrollLeft()
			};
			viewport.right = viewport.left + win.width();
			viewport.bottom = viewport.top + win.height() - offsetBot;

			var bounds = this.offset();
			bounds.right = bounds.left + this.outerWidth();
			bounds.bottom = bounds.top + this.outerHeight();

			return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
		}    
	};

	/*
	 * isValidEmailAddress
	 * Check if the it is a valid email address
	 * @param: emailAddress
	 */
	/*function isValidEmailAddress(emailAddress) {
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		return pattern.test(emailAddress);
	}*/
	
	
	/*!
	Mailchimp Ajax Submit
	jQuery Plugin
	Author: Siddharth Doshi

	Use:
	===
	$('#form_id').ajaxchimp(options);

	- Form should have one <input> element with attribute 'type=email'
	- Form should have one label element with attribute 'for=email_input_id' (used to display error/success message)
	- All options are optional.

	Options:
	=======
	options = {
		language: 'en',
		callback: callbackFunction,
		url: 'http://blahblah.us1.list-manage.com/subscribe/post?u=5afsdhfuhdsiufdba6f8802&id=4djhfdsh99f'
	}

	Notes:
	=====
	To get the mailchimp JSONP url (undocumented), change 'post?' to 'post-json?' and add '&c=?' to the end.
	For e.g. 'http://blahblah.us1.list-manage.com/subscribe/post-json?u=5afsdhfuhdsiufdba6f8802&id=4djhfdsh99f&c=?',
	*/
	
	/*$.ajaxChimp = {
        responses: {
            'We have sent you a confirmation email'                                             : 0,
            'Please enter a value'                                                              : 1,
            'An email address must contain a single @'                                          : 2,
            'The domain portion of the email address is invalid (the portion after the @: )'    : 3,
            'The username portion of the email address is invalid (the portion before the @: )' : 4,
            'This email address looks fake or invalid. Please enter a real email address'       : 5
        },
        translations: {
            'en': null
        },
        init: function (selector, options) {
            $(selector).ajaxChimp(options);
        }
    };
	
    $.fn.ajaxChimp = function (options) {
        $(this).each(function(i, elem) {
            var form = $(elem);
            var email = form.find('input[type=email]');
            var label = form.find('label[for=' + email.attr('id') + ']');

            var settings = $.extend({
                'url': form.attr('action'),
                'language': 'en'
            }, options);

            var url = settings.url.replace('/post?', '/post-json?').concat('&c=?');

            form.attr('novalidate', 'true');
            email.attr('name', 'EMAIL');

            form.submit(function () {
                var msg;
                function successCallback(resp) {
                    if (resp.result === 'success') {
                        msg = 'We have sent you a confirmation email';
                        label.removeClass('error').addClass('valid');
                        email.removeClass('error').addClass('valid');
                    } else {
                        email.removeClass('valid').addClass('error');
                        label.removeClass('valid').addClass('error');
                        var index = -1;
                        try {
                            var parts = resp.msg.split(' - ', 2);
                            if (parts[1] === undefined) {
                                msg = resp.msg;
                            } else {
                                var i = parseInt(parts[0], 10);
                                if (i.toString() === parts[0]) {
                                    index = parts[0];
                                    msg = parts[1];
                                } else {
                                    index = -1;
                                    msg = resp.msg;
                                }
                            }
                        }
                        catch (e) {
                            index = -1;
                            msg = resp.msg;
                        }
                    }

                    // Translate and display message
                    if (
                        settings.language !== 'en' && $.ajaxChimp.responses[msg] !== undefined && $.ajaxChimp.translations && $.ajaxChimp.translations[settings.language] && $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]]
                    ) {
                        msg = $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]];
                    }
                    label.html(msg);

                    label.show(2000);
                    if (settings.callback) {
                        settings.callback(resp);
                    }
                }

                var data = {};
                var dataArray = form.serializeArray();
                $.each(dataArray, function (index, item) {
                    data[item.name] = item.value;
                });

                $.ajax({
                    url: url,
                    data: data,
                    success: successCallback,
                    dataType: 'jsonp',
                    error: function (resp, text) {
                        console.log('mailchimp ajax submit error: ' + text);
                    }
                });

                // Translate and display submit message
                var submitMsg = 'Submitting...';
                if(
                    settings.language !== 'en'&& $.ajaxChimp.translations && $.ajaxChimp.translations[settings.language] && $.ajaxChimp.translations[settings.language]['submit']
                ) {
                    submitMsg = $.ajaxChimp.translations[settings.language]['submit'];
                }
                label.html(submitMsg).show(2000);

                return false;
            });
        });
        return this;
    };*/
});




/**
 * Hover on Scroll
 * A jQuery plugin that displays hover affects on mobile during scrolling
 * See www.bencomeau.com/hover-on-scroll for more information
 * https://github.com/bencomeau/hover-on-scroll
 * Version 1.0, October 15 2015
 * by Ben Comeau
 */

