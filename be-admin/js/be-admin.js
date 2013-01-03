/*
@codekit-append "bootstrap-colorpicker.js", "bootstrap-datepicker.js", "bootstrap-timepicker.js";
*/

// Starta jQuery
$(document).ready(function(){

	$("div.div-childmenu div.has-children > a").click(function() {
		$(this).parent().next("div.childpages").slideToggle('fast');
		$(this).parent().toggleClass('children-open');
	});

	// Stickynav 
	var sticky = $('#admin-menu');

	// Calculate stickynav height if exist	
	if (sticky.length) {
	
		var stickyheight = $(sticky).outerHeight();
		var stickytop = $(sticky).offset().top - parseFloat($(sticky).css('marginTop').replace(/auto/, 0));
		// var stickybottom = $('#content_bottom').offset().top - parseFloat($('#content_bottom').css('marginTop').replace(/auto/, 0));
		   
		// Add scroll event listener
		$(window).scroll(function(event){

			var y = $(this).scrollTop();
			var offset = sticky.offset();

			// Flytta med nedåt
			if (y >= 40) {
				$(sticky).addClass('fixed');
				$("body").addClass('sticky-menu');
			} else {
				$(sticky).removeClass('fixed');
				$("body").removeClass('sticky-menu');
			}
			
			if (y >= 40) {
				$("#ScrollToTop").removeClass('Offscreen');
			} else {
				$("#ScrollToTop").addClass('Offscreen');
			}
			
		});
	}

	$("#ScrollToTop").click(function() {
		$('html, body').animate({ scrollTop: 0 }, 'fast');
	});
	
	// !Bootstrap
	
	// Tooltip
	$("*[rel=tooltip]")
		.tooltip({
			animation:	true,
			delay:		{ show: 500, hide: 100 },
			placement:	'top',
		});

    // Popover
	$("a[rel=popover]")
		.popover({
			animation:	true,
			delay:		{ show: 500, hide: 100 },
			placement:	'right',
			html:		true
		})
		.click(function(e) {
			e.preventDefault()
		});
	

	
});