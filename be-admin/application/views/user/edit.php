<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<?php $errors = isset($errors) ? $errors : array(); ?>
		<?php echo Form::open('user/post/'.$content->id, array("class" => "form-horizontal")); ?>

		<div class="be-header">
			<div class="title">
				<h1>
					<?php echo Form::checkbox('active', 1, (bool) $content->active, array("class" => "big")); ?>
					<span id="headline-username"><?php echo $content->username; ?></span>
				</h1>
			</div>

			<div class="actions">
				<?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<div class="control-group">
				<?php echo Form::label('username', __("Username"), array("class" => "control-label", "for" => "username")); ?>
				<div class="controls"><?php echo Form::input('username', $content->username, array("placeholder" => __("Username"))); ?></div>
				<span class="label label-important"><?php echo Arr::get($errors, 'username');?></span>
			</div>
		
			<div class="control-group">
				<?php echo Form::label('email', __("Email"), array("class" => "control-label", "for" => "email")); ?>
				<div class="controls"><?php echo Form::input('email', $content->email, array("placeholder" => __("Email"))); ?></div>
				<span class="label label-important"><?php echo Arr::get($errors, 'email');?></span>
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