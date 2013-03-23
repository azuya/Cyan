<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		
		<?php echo Form::open('admin/category/post/'.$category->id, array("class" => "form-horizontal")); ?>
		<?php echo Nonce::nonce_field(($category->id) ? "be-update-category-".$category->id : "be-create-category"); ?>
		<div class="be-header">
			<div class="title">
				<div class="button">
					<?php echo HTML::anchor("admin/category/", "", array("class" => "icon40-chevron-left navigation-prev")); ?>
				</div>
				<div class="heading">
					<h1><?php
						if ($category->id) {
							echo $category->title;
						} else {
							echo __("New category");
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
			<!--
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#basic" data-toggle="tab"><?php echo __("Basic"); ?></a></li>
					<li><a href="#fields" data-toggle="tab"><?php echo __("Fields"); ?></a></li>
					<li><a href="#access" data-toggle="tab"><?php echo __("Access"); ?></a></li>
					<li><a href="#cache" data-toggle="tab"><?php echo __("Cache"); ?></a></li>
					<li><a href="#advanced" data-toggle="tab"><?php echo __("Advanced"); ?></a></li>
				</ul>
			
				<div class="tab-content">
					<div class="tab-pane active" id="basic">
				-->

						<div class="control-group">
							<?php echo Form::label('title', __("Title"), array("class" => "control-label", "for" => "title")); ?>
							<div class="controls">
								<?php echo Form::input('title', $category->title, array("placeholder" => __("Title"))); ?>
								<span class="label label-important"><?php echo Arr::get($errors, 'title');?></span>
							</div>
						</div>
						 
						<div class="control-group">
							<?php echo Form::label('alias', __("Alias"), array("class" => "control-label", "for" => "alias")); ?>
							<div class="controls">
								<?php echo Form::input('alias', $category->alias, array("placeholder" => __("Alias"))); ?>
								<span class="label label-important"><?php echo Arr::get($errors, 'alias');?></span>
							</div>
						</div>
									
						<div class="control-group">
							<?php echo Form::label('parent_id', __("Parent"), array("class" => "control-label", "for" => "parent_id")); ?>
							<div class="controls">
								<?php // echo Form::input('parent_id', $category->parent_id, array("placeholder" => __("Parent"))); ?>
								<?php echo Form::select('parent_id', $categories, $category->parent_id); ?>
								<span class="label label-important"><?php echo Arr::get($errors, 'parent_id');?></span>
							</div>
						</div>
									
						<div class="control-group">
							<?php echo Form::label('description', __("Description"), array("class" => "control-label", "for" => "description")); ?>
							<div class="controls">
								<?php echo Form::textarea('description', $category->description, array("placeholder" => __("Description"))); ?>
								<span class="label label-important"><?php echo Arr::get($errors, 'description');?></span>
							</div>
						</div>
						
						<div class="control-group">
							<?php echo Form::label('available', __("Belongs to"), array("class" => "control-label", "for" => "belongs_to")); ?>
							<div class="controls">
								<?php echo Form::select('belongs_to', $types, $category->belongs_to, array('multiple' => 'multiple')); ?>
								<span class="label label-important"><?php echo Arr::get($errors, 'belongs_to');?></span>
							</div>
						</div>
									
					<!-- </div> -->  <!-- tab-pane -->
				
				<!-- </div> --> <!-- tab-content -->

			<!-- </div> --> <!-- tabbable -->

		</div>
		<?php echo Form::close(); ?>
		
	</div> <!-- be-main -->

</div>