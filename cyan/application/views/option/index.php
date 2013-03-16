<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<div class="heading">
					<h1><?php echo __("Options"); ?></h1>
				</div>
			</div>

			<div class="actions left">
				<?php echo HTML::anchor("admin/option/new", "<i class=\"icon-plus-sign\"></i> ".__("New option"), array("class" => "btn")); ?>
			</div>
		</div>
		
		<div class="be-content">

			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th><?php echo __("Name"); ?></th>
						<th><?php echo __("Value"); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contents as $content) : ?>
					<tr>
					    <td><?php echo HTML::anchor("admin/option/edit/".$content->id, $content->option_name); ?></td>
					    <td><?php echo $content->option_value; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div> <!-- be-main -->

</div>