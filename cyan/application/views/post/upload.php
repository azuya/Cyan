<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php
$types = ORM::factory('type')->find_all();
?>

<div id="<?php echo Util::get_page_id(); ?>" class="screen active">
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<h1><?php echo __("Upload files"); ?></h1>
			</div>
			
			<div class="actions">

				<div class="btn-group pull-right hidden-phone">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#" rel="tooltip" data-placement="bottom" data-original-title="<?php echo __("More options here"); ?>">
						<i class="icon-align-justify"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a tabindex="-1" href="#"><?php echo __("Export data"); ?></a></li>
					</ul>
				</div>

			</div>
			
		</div>
		
		<script>
		$(function () {
			$('#fileupload').fileupload({
				dataType: 'json',
				maxFileSize: 5000000, // 5MB
				acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i, // GIF, JPG, PNG only	
				
				drop: function (e, data) {
					$.each(data.files, function (index, file) {
						console.log('Dropped file: ' + file.name);
					});
				},
				change: function (e, data) {
					$.each(data.files, function (index, file) {
						console.log('Selected file: ' + file.name);
					});
				},				
				
				progressall: function (e, data) {
					var progress = parseInt(data.loaded / data.total * 100, 10);
					$('#progress .bar').css('width', progress + '%');
				},
				done: function (e, data) {
					$.each(data.result.files, function (index, file) {
						console.log('Done: ' + file.name);
						$('<p/>').text(file.name).appendTo(document.body);
						$('#progress .bar').css('width', 0 + '%');
					});
				}
			});
		});
		</script>

		<div class="be-content">
			<p class="lead"><?php echo __("Drag and drop your files here and they will be uploaded automatically."); ?></p>
			
			<span class="btn btn-primary fileinput-button">
				<i class="icon-plus icon-white"></i>
				<span><?php echo __("Add files"); ?></span>
				<input id="fileupload" type="file" name="files[]" data-url="<?php echo URL::site(null, true, false); ?>cyan/vendor/fileupload/server/php/" multiple>
			</span>
   			

			<div id="progress" class="progress progress-striped active">
				<div class="bar" style="width: 0%;"></div>
			</div>

		</div>
	</div> <!-- be-main -->
	
</div>