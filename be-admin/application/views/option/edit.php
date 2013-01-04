<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="option-edit-<?php echo $content->id; ?>" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		
		<?php echo Form::open('option/post/'.$content->id, array("class" => "form-horizontal")); ?>
		<div class="be-header">
			<div class="title">
				<h1><?php echo __("Add new content"); ?></h1>
			</div>

			<div class="actions">
				<?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<div class="control-group">
				<?php echo Form::label('option_name', __("Name"), array("class" => "control-label", "for" => "option_name")); ?>
				<div class="controls"><?php echo Form::input('option_name', $content->option_name, array("placeholder" => __("Name"), "id" => "option_name")); ?></div>
				<span class="label label-important"><?php echo Arr::get($errors, 'option_name');?></span>
			</div>
			 
			<div class="control-group">
				<?php echo Form::label('option_value', __("Value"), array("class" => "control-label", "for" => "option_value")); ?>
				<div class="controls"><?php echo Form::input('option_value', $content->option_value, array("placeholder" => __("Value"), "id" => "option_value")); ?></div>
			</div>

		</div>
		<?php echo Form::close(); ?>
		
	</div> <!-- be-main -->

</div>