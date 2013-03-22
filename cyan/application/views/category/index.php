<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<div class="heading">
					<h1><?php echo __("Categories"); ?></h1>
				</div>
			</div>

			<div class="actions left">
				<?php echo HTML::anchor("admin/category/new", "<i class=\"icon-plus-sign\"></i> ".__("New category"), array("class" => "btn")); ?>
			</div>
		</div>
		
		<div class="be-content">
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th><?php echo __("Category"); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contents as $content) : ?>
					<tr>
					    <td><?php echo HTML::anchor("admin/category/edit/".$content->id, $content->title); ?></td>
					    <td class="hidden-phone">
						    <div class="tools">
						    	<?php echo HTML::anchor(Nonce::nonce_url("admin/category/delete/".$content->id, "be-delete-post-".$content->id), '<i class="icon40-times"></i>'); ?>
						    </div>
					    </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> <!-- be-main -->

</div>