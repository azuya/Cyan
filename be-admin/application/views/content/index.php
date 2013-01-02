<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="content-index" class="screen active">

	<div class="be-header">
		<div class="title">
			<h1><?php echo __("Content"); ?></h1>
		</div>
		
		<div class="actions left">
			<?php // echo HTML::anchor("content/new", "<i class=\"icon-plus-sign\"></i> ".__("New content"), array("class" => "btn")); ?>
	
			<?php
			$popover = "<ul class=\"content-types\">";
	        $content_types = ORM::factory('content_type')->find_all();
			foreach ($content_types as $item) {
				$popover .= "<li><div class=\"content-types\">".HTML::anchor("content/new/?content-type=".$item->id, $item->name)."</div></li>";
			}
			$popover .= "</ul>";
			?>
			<a href="#" class="btn" rel="popover" data-placement="bottom" data-content='<?php echo $popover; ?>' data-original-title="<?php echo __("Choose content type");?>"><i class="icon-plus-sign"></i> <?php echo __("New content"); ?></a>
			
			<small class="be-tooltip" rel="tooltip" title="Tooltip är coolt och fungerar ju från start!">?</small>
			
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
			    <td>
			    	<?php echo HTML::anchor("content/edit/".$content->id, Text::limit_chars($content->title, 50, "…", true)); ?>
			    	<?php echo HTML::anchor("?c=".$content->id, __("View")." &rarr;"); ?>
			    </td>
			    <td><?php echo $content->type_id; ?></td>
			    <td><?php echo HTML::anchor("user/edit/".$content->author_id, $content->author_id); ?></td>
			    <td><?php echo HTML::anchor("content/delete/".$content->id, "Delete"); ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>