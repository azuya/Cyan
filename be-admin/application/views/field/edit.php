<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		
		<?php echo Form::open('admin/field/post/'.$content->id, array("class" => "form-horizontal")); ?>
		<div class="be-header">
			<div class="title">
				<h1><?php
					if ($content->id) {
						echo $content->name;
					} else {
						echo __("New field");
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
					<?php echo Form::input('name', $content->name, array("placeholder" => __("Name"))); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'name');?></span>
				</div>
			</div>
			 
			<div class="control-group">
				<?php echo Form::label('alias', __("Alias"), array("class" => "control-label", "for" => "alias")); ?>
				<div class="controls">
					<?php echo Form::input('alias', $content->alias, array("placeholder" => __("Alias"))); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'alias');?></span>
				</div>
			</div>
						
			<div class="control-group">
				<?php echo Form::label('type', __("Type"), array("class" => "control-label", "for" => "type")); ?>
				<div class="controls">
					<?php
						$options = array(
							"input"		=> __("Input"),
							"textarea"	=> __("Textarea"),
							"richtext"	=> __("Rich textarea"),
							"checkbox"	=> __("Checkbox"),
							"radio"		=> __("Radio button"),
							"image"		=> __("Image"),
						);
					?>
					<?php echo Form::select('type', $options, $content->type); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'type');?></span>
				</div>
			</div>

			<div class="control-group">
				<?php echo Form::label('sort', __("Sort"), array("class" => "control-label", "for" => "sort")); ?>
				<div class="controls">
					<?php echo Form::input('sort', $content->sort, array("placeholder" => __("Sort"))); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'sort');?></span>
				</div>
			</div>

		</div>
		<?php echo Form::close(); ?>
		
	</div> <!-- be-main -->

</div>