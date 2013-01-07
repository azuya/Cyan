<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div id="user-index" class="screen active">
	
	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
		
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<h1><?php echo __("Users"); ?></h1>
			</div>
			
			<div class="actions left">
				<?php echo HTML::anchor("admin/user/new", "<i class=\"icon-plus-sign\"></i> ".__("New user"), array("class" => "btn")); ?>
			</div>
		</div>
		
		<div class="be-content">
			
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:60%;"><?php echo __("Username"); ?></th>
						<th style="width:40%;"><?php echo __("Email"); ?></th>
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
					    <td><?php echo HTML::anchor("user/edit/".$user->id, "<i class=\"icon-user\"></i> ".$user->username); ?></td>
					    <td><?php echo $user->email; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> <!-- be-main -->
	
</div>