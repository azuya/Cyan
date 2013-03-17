<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<?php $errors = isset($errors) ? $errors : array(); ?>
		<?php // echo $breadcrumbs; ?>
		<?php $post->type = ($post->type != "") ? $post->type : $post->type = Arr::get($_GET, 'type', '0'); ?>
		<?php echo Form::open('admin/post/post/'.$post->id, array("class" => "form-horizontal")); ?>
		<?php echo Nonce::nonce_field(($post->id) ? "be-update-post-".$post->id : "be-create-post"); ?>
		<div class="be-header">
			<div class="title">
				<div class="button">
					<?php echo HTML::anchor("admin/post/?type=".$post->type, "", array("class" => "icon40-chevron-left navigation-prev")); ?>
				</div>
				<div class="heading">
					<h1><?php echo ($post->id) ? $data->title : __("Add new content"); ?>
						<span class="dropdown">
							<small class="dropdown-toggle" data-toggle="dropdown"><?php echo $post->type; ?><span class="caret"></span></small>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<?php
								$types = ORM::factory('type')->find_all();
								foreach ($types as $t) {
									echo "<li>".HTML::anchor("admin/post/index/?type=".$t->id, $t->name)."</li>";
								}
								?>
							</ul>
						</span>
					</h1>
				</div>
				<div class="button">
					<?php echo HTML::anchor("#", '&nbsp;', array("class" => "star-toggle icon40-star".(($post->star) ? "-filled" : ""), "rel" => "tooltip", "data-placement" => "bottom", "data-original-title" => __("Your content is located here"))); ?>
				</div>
			</div>

			<div class="actions masterbutton">
				<?php echo Form::submit('submit', __('Save'), array('class'=>'btn')); ?>
				<?php // echo HTML::anchor("admin/post", "<i class=\"icon-align-justify\"></i>", array('class'=>'btn')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<?php echo Form::hidden('type', $post->type, array("placeholder" => __("type"))); ?>
			<?php echo Form::hidden('star', $post->star); ?>

			<div class="control-group">
				<?php echo Form::label('active', __("Active"), array("class" => "control-label", "for" => "active")); ?>
				<div class="controls"><?php echo Form::checkbox('active', 1, (bool) $post->active, array("class" => "big")); ?></div>
			</div>

			<?php
			if ($type->fields) { ?>
				<?php foreach ($type->fields as $field) : ?>
					<?php $field["properties"] = json_decode($field["properties"]); ?>

					<div class="control-group">
						<?php echo Form::label($field["name"], __($field["label"]), array("class" => "control-label", "for" => $field["label"])); ?>
						<div class="controls">
							<?php $value = isset($data->{$field["name"]}) ? $data->{$field["name"]}: ''; ?>
							<?php echo Form::form_field($field, $value); ?>
							<span class="label label-important"><?php echo Arr::get($errors, $field["name"]);?></span>
							<?php if ($field["properties"]->helpinline) : ?>
							<span class="help-inline"><?php echo $field["properties"]->helpinline; ?></span>
							<?php endif; ?>
							<?php if ($field["properties"]->helpblock) : ?>
							<span class="help-block"><?php echo $field["properties"]->helpblock; ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php } ?>

		</div>
		<?php echo Form::close(); ?>
	</div> <!-- be-main -->

</div>