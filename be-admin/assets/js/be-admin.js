/*
@codekit-append "bootstrap-colorpicker.js", "bootstrap-datepicker.js", "bootstrap-timepicker.js", "../../vendor/plupload/js/plupload.full.js";
*/

// Starta jQuery
$(document).ready(function(){

	$("div.div-childmenu div.has-children > a").click(function() {
		$(this).parent().next("div.childpages").slideToggle('fast');
		$(this).parent().toggleClass('children-open');
	});

	// Calculate stickynav height if exist	
	// if (sticky.length) {
	
		// var stickyheight = $(sticky).outerHeight();
		// var stickytop = $(sticky).offset().top - parseFloat($(sticky).css('marginTop').replace(/auto/, 0));
		// var stickybottom = $('#content_bottom').offset().top - parseFloat($('#content_bottom').css('marginTop').replace(/auto/, 0));
		   
		// Add scroll event listener
		$(window).scroll(function(event){

			var y = $(this).scrollTop();
			/*
			var offset = sticky.offset();

			// Flytta med nedåt
			if (y >= 40) {
				$(sticky).addClass('fixed');
				$("body").addClass('sticky-menu');
			} else {
				$(sticky).removeClass('fixed');
				$("body").removeClass('sticky-menu');
			}
			*/
			
			if (y >= 40) {
				$("#scroll-to-top").removeClass('offscreen');
			} else {
				$("#scroll-to-top").addClass('offscreen');
			}
			
		});
	// }

	$("header.admin ul.nav > li > a:not(.no-dropdown)").click(function() {
		$("header.admin ul.nav").find("li.active").removeClass("active");
		$(this).parent().addClass("active");
		
		$("header.admin ul.nav").find(".submenu").removeClass("active");
		$(this).next().addClass("active");
		return false;
	});

	$("header.admin").mouseleave(function() {
		$(this).find(".submenu").removeClass("active");
		$(this).find("li.active").removeClass("active");
	});
	
	$("#search-trigger").click(function() {
		$("#q").focus();
	});

	$("#scroll-to-top").click(function() {
		$('html, body').animate({ scrollTop: 0 }, 'fast');
	});
	
	$("table.table tr").hover(function(){
		$(this).find(".row-show-on-hover").show();		
	}, function() {
		$(this).find(".row-show-on-hover").hide();		
	});
	
	/* 
	 * !Bootstrap
	 */
	
	// Tooltip
	$("*[rel=tooltip]")
		.tooltip({
			animation:	false,
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