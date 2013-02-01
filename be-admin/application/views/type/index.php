<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="admin-type" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<h1><?php echo __("Types"); ?></h1>
			</div>

			<div class="actions left">
				<?php echo HTML::anchor("type/new", "<i class=\"icon-plus-sign\"></i> ".__("New type"), array("class" => "btn")); ?>
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
					    <td><?php echo HTML::anchor("type/edit/".$content->id, $content->name); ?></td>
					    <td>
					    	<div class="row-show-on-hover">
					    	<?php echo HTML::anchor("type/delete/".$content->id, "Delete"); ?>
					    	</div>
					    </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> <!-- be-main -->

</div>