<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		
		<?php echo Form::open('admin/option/post/'.$content->id, array("class" => "form-horizontal")); ?>
		<?php echo Nonce::nonce_field(($content->id) ? "be-update-option-".$content->id : "be-create-option"); ?>
		<div class="be-header">
			<div class="title">
				<div class="button">
					<?php echo HTML::anchor("admin/option/", "", array("class" => "icon40-chevron-left navigation-prev")); ?>
				</div>
				<div class="heading">
					<h1><?php
						if ($content->id) {
							echo $content->option_name;
						} else {
							echo __("New option");
						}
					?></h1>
				</div>
			</div>

			<div class="actions masterbutton">
				<?php echo Form::submit('submit', __('Save'), array('class'=>'btn')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<div class="control-group">
				<?php echo Form::label('option_name', __("Name"), array("class" => "control-label", "for" => "option_name")); ?>
				<div class="controls"><?php echo Form::input('option_name', $content->option_name, array("placeholder" => __("Name"))); ?></div>
				<span class="label label-important"><?php echo Arr::get($errors, 'option_name');?></span>
			</div>
			 
			<div class="control-group">
				<?php echo Form::label('option_value', __("Value"), array("class" => "control-label", "for" => "option_value")); ?>
				<div class="controls"><?php echo Form::input('option_value', $content->option_value, array("placeholder" => __("Value"))); ?></div>
			</div>

		</div>
		<?php echo Form::close(); ?>
		
	</div> <!-- be-main -->

</div>