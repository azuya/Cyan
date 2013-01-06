<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="content-edit-<?php echo $content->id; ?>" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<?php $errors = isset($errors) ? $errors : array(); ?>
		<?php isset($content->type_id) ? $content->type_id : $content->type_id = Arr::get($_GET, 'type', '0'); ?>
		<?php echo Form::open('post/post/'.$content->id, array("class" => "form-horizontal")); ?>

		<div class="be-header">
			<div class="title">
				<h1>
					<?php echo Form::checkbox('active', 1, (bool) $content->active, array("id" => "active", "class" => "big")); ?>
					<?php echo __("Add new content"); ?>
					
					<span class="dropdown">
						<small class="dropdown-toggle" data-toggle="dropdown"><?php echo $content->type_id; ?><span class="caret"></span></small>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<?php
							$types = ORM::factory('type')->find_all();
							foreach ($types as $type) {
								echo "<li>".HTML::anchor("admin/post/index/?type=".$type->id, $type->name)."</li>";
							}
							?>
						</ul>
					</span>
					
				</h1>
			</div>

			<div class="actions">
				<?php echo Form::submit('submit', __('Save'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<?php echo Form::input('type_id', $content->type_id, array("placeholder" => __("type_id"), "id" => "type_id")); ?>

			<div class="control-group">
				<?php echo Form::label('title', __("Title"), array("class" => "control-label", "for" => "title")); ?>
				<div class="controls">
					<?php echo Form::input('title', $content->title, array("placeholder" => __("Title"), "id" => "title")); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'title');?></span>
				</div>
			</div>
			 
			<div class="control-group">
				<?php echo Form::label('content', __("Content"), array("class" => "control-label", "placeholder" => __("Content"))); ?>
				<div class="controls"><?php echo Form::textarea('content', $content->content, array("placeholder" => __("Content"), "id" => "content", "class" => "ckeditor")); ?></div>
			</div>
		 
			<div class="control-group">
				<?php echo Form::label('testar', __("Testar"), array("class" => "control-label", "for" => "testar")); ?>
				<div class="controls"><?php echo Form::input('testar', $content->testar, array("placeholder" => __("Testar"), "id" => "testar")); ?></div>
			</div>

		</div>
		<?php echo Form::close(); ?>
	</div> <!-- be-main -->

</div>