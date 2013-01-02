<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="content-index" class="screen active">

	<div class="be-header">
		<div class="title">
			<h1><?php echo __("Content"); ?></h1>
		</div>
		
		<div class="actions left">
			<?php // echo HTML::anchor("content/new", "<i class=\"icon-plus-sign\"></i> ".__("New content"), array("class" => "btn")); ?>
	
			<a href="javascript:void(null);" class="btn" rel="popover" data-selector="element" data-placement="bottom" data-animation="fade" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."><i class="icon-plus-sign"></i> <?php echo __("New content"); ?></a>
			
			<div class="popover bottom" id="element" style="display:block;">
				<div class="arrow"></div>
				<div class="popover-inner">
					<h3 class="popover-title"><?php echo __("Choose content type"); ?></h3>
					<div class="popover-content">
	
						<?php
				        $content_types = ORM::factory('content_type')->find_all();
						foreach ($content_types as $item) {
							echo "<div>".HTML::anchor("content/new/?content-type=".$item->id, $item->name)."</div>";
						}
						?>
	
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="be-content">
		
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th><?php echo __("Title"); ?></th>
					<th><?php echo __("Type"); ?></th>
					<th><?php echo __("Author"); ?></th>
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
			    <td><?php echo HTML::anchor("content/edit/".$content->id, Text::limit_chars($content->title, 50, "…", true)); ?></td>
			    <td><?php echo $content->type_id; ?></td>
			    <td><?php echo $content->author_id; ?></td>
			    <td><?php echo HTML::anchor("content/delete/".$content->id, "Delete"); ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>