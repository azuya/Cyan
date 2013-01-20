<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="type-edit-<?php echo $content->id; ?>" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		
		<?php echo Form::open('type/post/'.$content->id, array("class" => "form-horizontal")); ?>
		<div class="be-header">
			<div class="title">
				<h1><?php
					if ($content->id) {
						echo $content->name;
					} else {
						echo __("New type");
					}
				?></h1>
			</div>

			<div class="actions">
				<?php echo Form::submit('submit', __('Save'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<div class="control-group">
				<?php echo Form::label('name', __("Name"), array("class" => "control-label", "for" => "name")); ?>
				<div class="controls">
					<?php echo Form::input('name', $content->name, array("placeholder" => __("Name"), "id" => "name")); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'name');?></span>
				</div>
			</div>
			 
			<div class="control-group">
				<?php echo Form::label('alias', __("Alias"), array("class" => "control-label", "for" => "alias")); ?>
				<div class="controls">
					<?php echo Form::input('alias', $content->alias, array("placeholder" => __("Alias"), "id" => "alias")); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'alias');?></span>
				</div>
			</div>
						
			<div class="control-group">
				<?php echo Form::label('configuration', __("Configuration"), array("class" => "control-label", "for" => "configuration")); ?>
				<div class="controls">
					<?php echo Form::textarea('configuration', $content->configuration, array("placeholder" => __("Configuration"), "id" => "configuration")); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'configuration');?></span>
				</div>
			</div>
						
			<div class="control-group">
				<?php echo Form::label('display', __("Display"), array("class" => "control-label", "for" => "display")); ?>
				<div class="controls">
					<?php echo Form::textarea('display', $content->display, array("placeholder" => __("Display"), "id" => "display")); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'display');?></span>
				</div>
			</div>
						
			<div class="control-group">
				<?php echo Form::label('description', __("Description"), array("class" => "control-label", "for" => "description")); ?>
				<div class="controls">
					<?php echo Form::textarea('description', $content->description, array("placeholder" => __("Description"), "id" => "description")); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'description');?></span>
				</div>
			</div>
						
		</div>
		<?php echo Form::close(); ?>
		
	</div> <!-- be-main -->

</div>