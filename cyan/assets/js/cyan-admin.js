/*
@codekit-append "bootstrap-colorpicker.js", "bootstrap-datepicker.js", "bootstrap-timepicker.js";
@codekit-append "holder.js", "jquery.nestable.js";

@codekit-append "../../vendor/fileupload/js/vendor/jquery.ui.widget.js";
@codekit-append "../../vendor/fileupload/js/iframe-transport.js";
@codekit-append "../../vendor/fileupload/js/jquery.fileupload.js";
*/

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
			
			/*
			// Scroll to top
			if (y >= 40) {
				$("#scroll-to-top").removeClass('offscreen');
			} else {
				$("#scroll-to-top").addClass('offscreen');
			}
			*/
			
		});
	// }

	// Click for page chages
	$(document).on("click", "a", function(e) {
		
		// Link URL
		var href = $(this).attr('href');
		
		// Go to this page
		go_to_page(href);

		return false;
	});

	// Popstate
	setTimeout(function() {
		$(window).bind("popstate", function(e) {
			console.log('POP to: ' + location.href);
			go_to_page(location.href);
		});
	}, 500);
	
	// Show admin menu
	$("header.admin ul.nav > li > a:not(.no-dropdown)").click(function() {
		$("header.admin ul.nav").find("li.active").removeClass("active");
		$(this).parent().addClass("active");
		
		$("header.admin ul.nav").find(".submenu").removeClass("active");
		$(this).next().addClass("active");
		return false;
	});

	// Hide admin menu on click
	$(document).mouseup(function(e) {
	    var container = $(".submenu");
	    if (container.has(e.target).length === 0) {
	        container.removeClass("active");
	        $(this).find("header.admin div.navbar li.active").removeClass("active");
	    }
	});	

	// Show link on profile photo
	$("div.photo").hover(function() {
		$(this).find("a.change-photo").show();
	}, function() {
		$(this).find("a.change-photo").hide();
	});

	// Set focus on search box
	$("#search-trigger").click(function() {
		$("#q").focus();
	});

	// Scroll to top
	$('#scroll-to-top').click(function() {
		$('html, body').animate({ scrollTop: 0 }, 'fast');
	});
	
	// Hover buttons in tables
	$(document).on('mouseenter', 'table.table tbody tr', function(){
		$(this).find(".row-show-on-hover").show();
	});
	$(document).on('mouseleave', 'table.table tbody tr', function(){
		$(this).find(".row-show-on-hover").hide();
	});

	// Padding on body if logged into admin
	$("body").css("padding-top", "44px");
	
	// System alerts
	var alert_text = '<div id="system-alert" class="alert alert-block fade in">'
		+ '<button type="button" class="close" data-dismiss="alert">&times;</button>'
		+ '<strong>Warning!</strong> Someone else is editing this content. It\'s advised that you don\'t edit it at the same time.'
		+ '</div>';
	$("body").append(alert_text);
	
	/* 
	 * !Bootstrap inits
	 */
	
	// Tooltip
	$("*[rel=tooltip]")
		.tooltip({
			animation:	true,
			delay:		{ show: 1000, hide: 100 },
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
	
	/*
	 * Bootstrap fixes
	 */
	$(document).on("click", "label", function() {
		$(this).parent().find('*[name="' + $(this).attr("for") + '"]').focus();
	});
	
});

/*
 * Go to a page -> Load new or switch DIV
 * @param	String	Href of link
 */
function go_to_page(href) {

	console.log('go_to_page('+href+')');

	// If we are somewhere else (eg. page view)
	if ($("#top").length == 0) {
		// console.log("#top finns inte, ladda om");
		window.location = href;
		return;
	}
	
	if (href.indexOf('#') == 0) {
		console.log('Starts with hash (#)...');
		return false;
	}

	// Link to be used for ID
	var link = href;

	// These must go later, don't hard code! **********************************************************
	// link = link.replace(/http:\/\/localhost\/cyan\//g, "");
	link = link.replace(/\/cyan\//g, "");
	link = link.replace(/\/admin\//g, "admin/");
	// These must go later, don't hard code! **********************************************************
	
	// Replace slashes with dashes
	link = link.replace(/\//g, "-").toLowerCase();
	console.log(link);
	
	var page_id = link.replace(/\//g, "-").toLowerCase();
	var page_id = page_id.replace(/\?/g, "-");
	var page_id = page_id.replace(/&/g, "-");
	var page_id = page_id.replace(/=/g, "-");
	var page_id = page_id.replace(/--/g, "-");
	console.log('PageID: ' + page_id);

	// Load new page
	if ($("#" + page_id).length == 0) {
		start_progress();
	
		console.log("#" + page_id + ' doesn\'t exist -> load');

		$.ajax({
			type: "GET",
			url: href,
			data: "",
			success: function(data) {
				$("#content .screen").removeClass("active");
				
				$("#content").append(data);
				end_progress();

				// Add to history
				window.history.pushState(null, "", href);
			},
			error: function() {
				end_progress();
				modal('Ooops!', 'Something went wrong, it looks as if the page couldn\'t be loaded. Check the link and try again?');
			}
		});
		
		
	// Show page
	} else {
		console.log('Exists: ' + "#" + page_id);
	
		$(".screen").removeClass("active");
		$("#" + page_id).addClass("active");

		end_progress();
	}

	// Remove menu selection
    var container = $(".submenu");
    container.removeClass("active");
    $(this).find("li.active").removeClass("active");

    // Apply CKEditor
	// CKEDITOR.replaceAll();
}

function start_progress() {
    // System progress
	var progress_text = '<div id="system-progress">'
		+ '<i class="progress-icon rotate-infinite"></i><br>'
		+ '</div>';
	$("body").append(progress_text).fadeIn();
}

function end_progress() {
	$("#system-progress").fadeOut(200, function() {
		$(this).remove();
	});
}

function browse_away_confirmation() {
	console.log('browse_away_confirmation()');

	end_progress();

	/*
	if (typeof tinyMCE === 'undefined') {
		console.log('tinyMCE finns inte');

		if ($('.formstatus').val() == '1') {
			return i18n.form_modified;
		}
	
	} else {
		console.log('tinyMCE finns...');
		
		if (tinyMCE.activeEditor.isDirty()) {
			return i18n.form_modified;
		}
		if ($('.formstatus').val() == '1') {
			return i18n.form_modified;
		}
	}
	*/
}

function modal(title, text, image, buttons) {

	if (buttons == undefined) {
		buttons = '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>';
	}
	
	// if (image) {
		image = '<div class="icon"><i class="icon60-blue-exclamation"></i></div>';
	// }

	var modal = '<div id="modal-box" class="modal hide fade">'
		+ '<div class="modal-header">'
		+ '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
		+ '<h3>' + title + '</h3>'
		+ '</div>'
		+ '<div class="modal-body">'
		+ image
		+ '<p>' + text + '</p>'
		+ '</div>'
		+ '<div class="modal-footer">'
		+ buttons
		+ '</div>'
		+ '</div>';
	$("body").append(modal);
	
	// Open modal
	$('#modal-box').modal({
		
	});

}