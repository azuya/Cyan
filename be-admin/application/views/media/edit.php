<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<?php $errors = isset($errors) ? $errors : array(); ?>
<?php echo Form::open('media/post/'.$content->id, array("class" => "form-horizontal")); ?>
	
	<div class="be-header">
		<div class="title">
			<h1><?php echo __("Add new media"); ?></h1>
		</div>
		
		<div class="actions">
			<?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
	
	<div class="be-content">
		<?php echo Form::input('type_id', $content->type_id, array("placeholder" => __("type_id"), "id" => "type_id")); ?>

		<div class="control-group">
			<?php echo Form::label('title', __("Title"), array("class" => "control-label", "for" => "title")); ?>
			<div class="controls"><?php echo Form::input('title', $content->title, array("placeholder" => __("Title"), "id" => "title")); ?></div>
			<span class="label label-important"><?php echo Arr::get($errors, 'title');?></span>
		</div>
		 
		<div class="control-group">
			<?php echo Form::label('content', __("Content"), array("class" => "control-label", "placeholder" => __("Content"))); ?>
			<div class="controls"><?php echo Form::textarea('content', $content->content, array("placeholder" => __("Content"), "id" => "content", "class" => "ckeditor")); ?></div>
			<span class="label label-important"><?php echo Arr::get($errors, 'content');?></span>
		</div>
	 
		<div class="control-group">
			<?php echo Form::label('testar', __("Testar"), array("class" => "control-label", "for" => "testar")); ?>
			<div class="controls"><?php echo Form::input('testar', $content->testar, array("placeholder" => __("Testar"), "id" => "testar")); ?></div>
		</div>
	
	</div>
<?php echo Form::close(); ?>
