<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="content-type-edit-<?php echo $content->id; ?>" class="screen active">

	<?php echo Form::open('content_type/post/'.$content->id, array("class" => "form-horizontal")); ?>
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
				<?php echo Form::label('name', __("Name"), array("class" => "control-label", "for" => "name")); ?>
				<div class="controls"><?php echo Form::input('name', $content->name, array("placeholder" => __("Name"), "id" => "name")); ?></div>
				<span class="label label-important"><?php echo Arr::get($errors, 'name');?></span>
			</div>
			 
			<div class="control-group">
				<?php echo Form::label('alias', __("Alias"), array("class" => "control-label", "for" => "alias")); ?>
				<div class="controls"><?php echo Form::input('alias', $content->alias, array("placeholder" => __("Alias"), "id" => "alias")); ?></div>
				<span class="label label-important"><?php echo Arr::get($errors, 'alias');?></span>
			</div>
			
		</div>
	<?php echo Form::close(); ?>
	
</div>