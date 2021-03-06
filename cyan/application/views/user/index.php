<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div id="<?php echo Util::get_page_id(); ?>" class="screen active">
	
	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
		
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<div class="heading">
					<h1><?php echo __("Users"); ?></h1>
				</div>
			</div>
			
			<div class="actions left">
				<?php echo HTML::anchor("admin/user/new", "<i class=\"icon-plus-sign\"></i> ".__("New user"), array("class" => "btn")); ?>
			</div>
		</div>
		
		<div class="be-content">
			
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:40px"></th>
						<th style="width:60%;"><?php echo __("Username"); ?></th>
						<th style="width:30%;"><?php echo __("Email"); ?></th>
						<th style="width:10%;" class="hidden-phone"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contents as $user) : ?>
					<?php
						if ($user->active) {
							$classes = "";
						} else {
							$classes = " class=\"inactive\"";
						}
					?>
					<tr<?php echo $classes; ?>>
					    <td>
					    	<span class="icon40-star<?php echo (!$user->star) ? '-empty' : '';?>"></span>
					    </td>
					    <td><?php echo HTML::anchor("admin/user/edit/".$user->id, $user->username); ?></td>
					    <td><?php echo $user->email; ?></td>
					    <td class="hidden-phone">
						    <div class="tools">
						    	<?php echo HTML::anchor(Nonce::nonce_url("admin/user/delete/".$user->id, "be-delete-post-".$user->id), '<i class="icon40-times"></i>'); ?>
						    </div>
					    </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> <!-- be-main -->
	
</div>