<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<?php $errors = isset($errors) ? $errors : array(); ?>
		<?php echo Form::open('user/post/'.$content->id, array("class" => "form-horizontal")); ?>

		<div class="be-header">
			<div class="title">
				<div class="button">
					<?php echo HTML::anchor("admin/user/", "", array("class" => "icon40-chevron-left navigation-prev")); ?>
				</div>
				<div class="heading">
					<h1>
						<span id="headline-username"><?php echo $content->username; ?></span>
					</h1>
				</div>
			</div>

			<div class="actions">
				<?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<?php echo Form::hidden('star', $content->star); ?>

			<div class="control-group">
				<?php echo Form::label('active', __("Active"), array("class" => "control-label", "for" => "active")); ?>
				<div class="controls"><?php echo (bool) $content->active; ?></div>
			</div>
			<div class="control-group">
				<?php echo Form::label('username', __("Username"), array("class" => "control-label", "for" => "username")); ?>
				<div class="controls"><?php echo $content->username; ?></div>
			</div>
		
			<div class="control-group">
				<?php echo Form::label('email', __("Email"), array("class" => "control-label", "for" => "email")); ?>
				<div class="controls"><?php echo $content->email; ?></div>
			</div>
		
			<!--
			<div class="control-group">
				<?php echo Form::label('password', __("Password"), array("class" => "control-label", "for" => "password")); ?>
				<div class="controls"><?php echo Form::input('password', $content->password, array("placeholder" => __("Password"))); ?></div>
			</div>
			-->
		
		</div> <!-- be-content -->
		
		<?php echo Form::close(); ?>
	</div> <!-- be-main -->

</div>