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
				<?php echo Form::label('parent_id', __("parent_id"), array("class" => "control-label", "for" => "parent_id")); ?>
				<div class="controls">
					<?php $types = ORM::factory('type')->find_all();
						
						$array_types[0] = "– ".__("None")." –";
						foreach ($types as $type) {
							
							if ($type->id != $content->id) {
								$array_types[$type->id] = $type->name;
							}
							
						}
						
					?>
					<?php echo Form::select('parent_id', $array_types, $content->parent_id); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'parent_id');?></span>
				</div>
			</div>
			
		</div>
		<?php echo Form::close(); ?>
		
	</div> <!-- be-main -->

</div>