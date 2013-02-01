<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<?php
	$type = Arr::get($_GET, 'type', '0');
	if ($type != "0") {
		$container_id = ($type) ? "admin-post-new-type-".$type : "admin-post-new-type-";
	} else {
		$container_id = ($post->id) ? "admin-post-edit-".$post->id : "admin-post";
	}
?>

<div id="<?php echo $container_id; ?>" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<?php $errors = isset($errors) ? $errors : array(); ?>
		<?php // echo $breadcrumbs; ?>
		<?php $post->type = ($post->type != "") ? $post->type : $post->type = Arr::get($_GET, 'type', '0'); ?>
		<?php echo Form::open('admin/post/post/'.$post->id, array("class" => "form-horizontal")); ?>
		<?php echo Nonce::nonce_field(($post->id) ? "be-update-post-".$post->id : "be-create-post"); ?>
		<div class="be-header">
			<div class="title">
				<h1><?php echo Form::checkbox('active', 1, (bool) $post->active, array("id" => "active", "class" => "big")); ?>
					<?php echo __("Add new content"); ?>
					<span class="dropdown">
						<small class="dropdown-toggle" data-toggle="dropdown"><?php echo $post->type; ?><span class="caret"></span></small>
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
				<?php // echo HTML::anchor("admin/post", "<i class=\"icon-align-justify\"></i>", array('class'=>'btn')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<?php echo Form::hidden('type', $post->type, array("placeholder" => __("type"), "id" => "type")); ?>

			<div class="control-group">
				<?php echo Form::label('title', __("Title"), array("class" => "control-label", "for" => "title")); ?>
				<div class="controls">
					<?php echo Form::input('title', $data->title, array("placeholder" => __("Title"), "id" => "title")); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'title');?></span>
				</div>
			</div>
			 
			<div class="control-group">
				<?php echo Form::label('content', __("Content"), array("class" => "control-label", "placeholder" => __("Content"))); ?>
				<div class="controls"><?php echo Form::textarea('content', $data->content, array("placeholder" => __("Content"), "id" => "content", "class" => "ckeditor")); ?></div>
			</div>
		 
			<div class="control-group">
				<?php echo Form::label('testar', __("Testar"), array("class" => "control-label", "for" => "testar")); ?>
				<div class="controls"><?php echo Form::input('testar', $post->testar, array("placeholder" => __("Testar"), "id" => "testar")); ?></div>
			</div>

		</div>
		<?php echo Form::close(); ?>
	</div> <!-- be-main -->

</div>