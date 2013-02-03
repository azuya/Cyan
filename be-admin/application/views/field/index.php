<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<h1><?php echo __("Fields"); ?></h1>
			</div>

			<div class="actions left">
				<?php echo HTML::anchor("admin/field/new", "<i class=\"icon-plus-sign\"></i> ".__("New field"), array("class" => "btn")); ?>
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
					    <td><?php echo HTML::anchor("admin/field/edit/".$content->id, $content->name); ?></td>
					    <td>
					    	<div class="row-show-on-hover">
					    	<?php echo HTML::anchor("admin/field/delete/".$content->id, "Delete"); ?>
					    	</div>
					    </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> <!-- be-main -->

</div>