<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="content_type-index" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<h1><?php echo __("Content types"); ?></h1>
			</div>

			<div class="actions left">
				<?php echo HTML::anchor("content_type/new", "<i class=\"icon-plus-sign\"></i> ".__("New content type"), array("class" => "btn")); ?>
			</div>
		</div>
		
		<div class="be-content">
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th><?php echo __("Name"); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contents as $content) : ?>
					<tr>
					    <td><?php echo HTML::anchor("content_type/edit/".$content->id, $content->name); ?></td>
					    <td>
					    	<?php echo HTML::anchor("content_type/delete/".$content->id, "Delete"); ?>
					    </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> <!-- be-main -->

</div>