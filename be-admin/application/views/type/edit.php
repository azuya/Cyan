<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		
		<?php echo Form::open('admin/type/post/'.$content->id, array("class" => "form-horizontal")); ?>
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
				<?php echo Form::label('sort', __("Sort"), array("class" => "control-label", "for" => "sort")); ?>
				<div class="controls">
					<?php echo Form::input('sort', $content->sort, array("placeholder" => __("Sort"))); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'sort');?></span>
				</div>
			</div>
						
			<div class="control-group">
				<?php echo Form::label('icon', __("Icon"), array("class" => "control-label", "for" => "icon")); ?>
				<div class="controls">
					<?php
						$options = array(
							"comment"	=> __("Comment"),
							"cog"		=> __("Cog"),
							"disk"		=> __("Disk"),
							"users"		=> __("Users"),
							"pad"		=> __("Pad"),
							"user"		=> __("User"),
							"info"		=> __("Info"),
							"film"		=> __("Film"),
							"leaf"		=> __("Leaf"),
							"palette"	=> __("Palette"),
							"compass"	=> __("Compass"),
							"bell"		=> __("Bell"),
							"earth"		=> __("Earth"),
							"briefcase"	=> __("Briefcase"),
							"notes"		=> __("Notes"),
							"goosepen"	=> __("Goospen"),
							"bars"		=> __("Bars"),
							"rocket"	=> __("Rocket"),
							"pamphlet"	=> __("Pamphlet"),
							"prize"		=> __("Prize"),
							"box"		=> __("Box"),
							"piechart"	=> __("Piechart"),
							"basket"	=> __("Basket"),
							"pen"		=> __("Pen"),
							"bulb"		=> __("Bulb"),
							"cart"		=> __("Cart"),
							"clock"		=> __("Clock"),
							"tag"		=> __("Tag"),
							"boxes"		=> __("Boxes"),
							"megaphone"	=> __("Megaphone"),
							"camera"	=> __("Camera"),
							"microphone"=> __("Microphone"),
							"star"		=> __("Star"),
							"paperclip"	=> __("Paperclip"),
							"inbox"		=> __("Inbox"),
							"flag"		=> __("Flag"),
							"images"	=> __("Images"),
							"filing"	=> __("Filing"),
							"folder"	=> __("Folder"),
							"cloud"		=> __("Cloud"),
							"location"	=> __("Location"),
							"bookmark"	=> __("Bookmark"),
							"pad"		=> __("Pad"),
							"monitor"	=> __("Monitor"),
							"ink"		=> __("Ink"),
							"book"		=> __("Book"),
							"page"		=> __("Page"),
							"calendar"	=> __("Calendar"),
							"heart"		=> __("Heart"),
							"dots"		=> __("Dots"),
							"upload"	=> __("Upload"),
							"cog"		=> __("Cog"),
							"help"		=> __("Help"),
						);
					?>
					<?php echo Form::select('icon', $options, $content->icon); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'icon');?></span>
				</div>
			</div>
						
			<div class="control-group">
				<?php echo Form::label('configuration', __("Configuration"), array("class" => "control-label", "for" => "configuration")); ?>
				<div class="controls">
					<?php echo Form::textarea('configuration', $content->configuration, array("placeholder" => __("Configuration"))); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'configuration');?></span>
				</div>
			</div>
						
			<div class="control-group">
				<?php echo Form::label('display', __("Display"), array("class" => "control-label", "for" => "display")); ?>
				<div class="controls">
					<?php echo Form::textarea('display', $content->display, array("placeholder" => __("Display"))); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'display');?></span>
				</div>
			</div>
						
			<div class="control-group">
				<?php echo Form::label('description', __("Description"), array("class" => "control-label", "for" => "description")); ?>
				<div class="controls">
					<?php echo Form::textarea('description', $content->description, array("placeholder" => __("Description"))); ?>
					<span class="label label-important"><?php echo Arr::get($errors, 'description');?></span>
				</div>
			</div>
						
		</div>
		<?php echo Form::close(); ?>
		
	</div> <!-- be-main -->

</div>