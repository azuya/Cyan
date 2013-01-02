<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div id="user-edit-<?php echo $content->id; ?>" class="screen active">

	<?php $errors = isset($errors) ? $errors : array(); ?>
	<?php echo Form::open('user/post/'.$content->id, array("class" => "form-horizontal")); ?>
	
		<div class="be-header">
			<div class="title">
				<h1><?php echo __("Create option"); ?> <small class="be-tooltip" title="Tooltip är coolt och fungerar ju från start!">?</small></h1>
			</div>
			
			<div class="actions">
				<?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
		
		<div class="be-content">
		
			<div class="control-group">
				<?php echo Form::label('username', __("Username"), array("class" => "control-label", "for" => "username")); ?>
				<div class="controls"><?php echo Form::input('username', $content->username, array("placeholder" => __("Username"), "id" => "username")); ?></div>
			</div>
		
			<div class="control-group">
				<?php echo Form::label('email', __("Email"), array("class" => "control-label", "for" => "email")); ?>
				<div class="controls"><?php echo Form::input('email', $content->email, array("placeholder" => __("Email"), "id" => "email")); ?></div>
			</div>
		
			<div class="control-group">
				<?php echo Form::label('password', __("Password"), array("class" => "control-label", "for" => "password")); ?>
				<div class="controls"><?php echo Form::input('password', $content->password, array("placeholder" => __("Password"), "id" => "password")); ?></div>
			</div>
		
			<div class="control-group">
				<div class="controls"><?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?></div>
			</div>
		
		</div>
	<?php echo Form::close(); ?>

</div>