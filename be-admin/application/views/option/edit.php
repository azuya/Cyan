<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<?php $errors = isset($errors) ? $errors : array(); ?>
<?php echo Form::open('option/post/'.$content->option_id, array("class" => "form-horizontal")); ?>
	
	<div class="be-header">
		<div class="title">
			<h1><?php echo __("Options"); ?></h1>
		</div>
	
		<div class="actions">
			<?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
	
	<div class="be-content">
	
		<div class="control-group">
			<?php echo Form::label('option_name', __("Name"), array("class" => "control-label", "for" => "option_name")); ?>
			<div class="controls"><?php echo Form::input('option_name', $content->option_name, array("placeholder" => __("Name"), "id" => "option_name")); ?></div>
		</div>
		 
		<div class="control-group">
			<?php echo Form::label('option_value', __("Value"), array("class" => "control-label", "for" => "option_value")); ?>
			<div class="controls"><?php echo Form::input('option_value', $content->option_value, array("placeholder" => __("Value"), "id" => "option_value")); ?></div>
		</div>
	
	</div>
<?php echo Form::close(); ?>
