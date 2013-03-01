<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<h1><?php echo __("Roles"); ?></h1>
			</div>

			<div class="actions left">
				<?php echo HTML::anchor("admin/role/new", "<i class=\"icon-plus-sign\"></i> ".__("New role"), array("class" => "btn")); ?>
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
					    <td><?php echo HTML::anchor("admin/role/edit/".$content->id, $content->name); ?></td>
					    <td>
					    	<div class="row-show-on-hover">
					    	<?php echo HTML::anchor("admin/role/delete/".$content->id, "Delete"); ?>
					    	</div>
					    </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> <!-- be-main -->

</div>