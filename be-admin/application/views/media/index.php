<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="media-index" class="screen active">

	<div class="be-header">
		<div class="title">
			<h1><?php echo __("Media"); ?></h1>
		</div>
		
		<div class="actions left">
			<?php echo HTML::anchor("media/new", "<i class=\"icon-plus-sign\"></i> ".__("New media"), array("class" => "btn")); ?>
		</div>
	</div>
	
	<div class="be-content">
		
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th><?php echo __("Title"); ?></th>
					<th><?php echo __("Type"); ?></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($contents as $content) : ?>
			<?php
				// echo "<pre>";
				// print_r($content);
				// echo "</pre>";
			?>
			
			<tr>
			    <td><?php echo HTML::anchor("media/edit/".$content->id, Text::limit_chars($content->title, 50, "…", true)); ?></td>
			    <td><?php echo $content->type_id; ?></td>
			    <td><?php echo HTML::anchor("media/delete/".$content->id, "Delete"); ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	</div>

</div>