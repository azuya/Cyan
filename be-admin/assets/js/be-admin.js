/*
@codekit-append "bootstrap-colorpicker.js", "bootstrap-datepicker.js", "bootstrap-timepicker.js", "holder.js", "../../vendor/plupload/js/plupload.full.js";
*/

// Starta jQuery
$(document).ready(function(){

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

	$(document).on("click", "a", function(e) {
		
		// Link URL
		var href = $(this).attr('href');
		
		// Go to this page
		go_to_page(href);

		return false;
	});

	$("header.admin ul.nav > li > a:not(.no-dropdown)").click(function() {
		$("header.admin ul.nav").find("li.active").removeClass("active");
		$(this).parent().addClass("active");
		
		$("header.admin ul.nav").find(".submenu").removeClass("active");
		$(this).next().addClass("active");
		return false;
	});

	$(document).mouseup(function(e) {
	    var container = $(".submenu");
	    if (container.has(e.target).length === 0) {
	        container.removeClass("active");
	        $(this).find("li.active").removeClass("active");
	    }
	});	

	$("div.photo").hover(function() {
		$(this).find("a.change-photo").show();
	}, function() {
		$(this).find("a.change-photo").hide();
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
	
	// Padding on body if logged into admin
	$("body").css("padding-top", "44px");
	
	// System alerts
	var alert_text = '<div id="system-alert" class="alert alert-block fade in">'
		+ '<button type="button" class="close" data-dismiss="alert">&times;</button>'
		+ '<strong>Warning!</strong> Someone else is editing this content. It\'s advised that you don\'t edit it at the same time.'
		+ '</div>';
	$("#content-index").prepend(alert_text);
	
	/* 
	 * !Bootstrap inits
	 */
	
	// Tooltip
	$("*[rel=tooltip]")
		.tooltip({
			animation:	true,
			delay:		{ show: 500, hide: 100 },
			placement:	'top',
		});

	$("*[rel=tooltip]").on('click', function () {
		$(this).tooltip('hide')
	})

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

function go_to_page(href) {

	if (href == "#") {
		console.log('Just hash (#)...');
		return false;
	}

	// Link to be used for ID
	var link = href;

	link = link.replace(/\/Bliss-Engine\//g, "");
	link = link.replace(/\//g, "-").toLowerCase();
	console.log(link);
	
	var page_id = link.replace(/\//g, "-").toLowerCase();
	var page_id = page_id.replace(/\?/g, "-");
	var page_id = page_id.replace(/=/g, "-");
	var page_id = page_id.replace(/--/g, "-");
	console.log('PageID: ' + page_id);

	// Load new page
	if ($("#" + page_id).length == 0) {
		start_progress();
	
		console.log("#" + page_id + ' finns inte');

		$.ajax({
			type: "GET",
			url: href,
			data: "",
			success: function(data) {
				$("#be-container .screen").removeClass("active");
				
				$("#be-container").append(data);
				end_progress();
			},
			error: function() {
				end_progress();
				modal('Error...', 'Ooops, something went wrong.', 'Buttons...');
			}
		});

	// Show page
	} else {
		console.log('Finns!: ' + "#" + page_id);
	
		$(".screen").removeClass("active");
		$("#" + page_id).addClass("active");

		end_progress();
	}

	// Remove menu selection
    var container = $(".submenu");
    container.removeClass("active");
    $(this).find("li.active").removeClass("active");

	// Add to history
	window.history.pushState(null, "", href);
}

function start_progress() {
    // System progress
	var alert_text = '<div id="system-progress">'
		+ '<i class="progress-icon rotate-infinite"></i><br>'
		+ '</div>';
	$("body").append(alert_text).fadeIn();
}

function end_progress() {
	$("#system-progress").fadeOut(400, function() {
		$(this).remove();
	});
}

function modal(title, text, buttons) {
	alert('modal()' + title + text + buttons);	
}