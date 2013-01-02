<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div class="be-header">
	<div class="title">
		<h1><?php echo __("Options"); ?></h1>
	</div>

	<div class="actions left">
		<?php echo HTML::anchor("option/new", "<i class=\"icon-plus-sign\"></i> ".__("New option"), array("class" => "btn")); ?>
	</div>
</div>
 
<div class="be-content">
	
	<table class="table table-striped table-hover table-condensed">
		<thead>
			<tr>
				<th><?php echo __("Name"); ?></th>
				<th><?php echo __("Value"); ?></th>
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
		    <td><?php echo HTML::anchor("option/edit/".$content->option_id, $content->option_name); ?></td>
		    <td><?php echo $content->option_value; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>