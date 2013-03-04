<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
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
			
			<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#basic" data-toggle="tab"><?php echo __("Basic"); ?></a></li>
					<li><a href="#fields" data-toggle="tab"><?php echo __("Fields"); ?></a></li>
					<li><a href="#access" data-toggle="tab"><?php echo __("Access"); ?></a></li>
					<li><a href="#cache" data-toggle="tab"><?php echo __("Cache"); ?></a></li>
					<li><a href="#advanced" data-toggle="tab"><?php echo __("Advanced"); ?></a></li>
				</ul>
			
				<div class="tab-content">
					<div class="tab-pane active" id="basic">

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
										"airplane"	=> __("Airplane"),
										"bars"		=> __("Bars"),
										"basket"	=> __("Basket"),
										"bell"		=> __("Bell"),
										"book"		=> __("Book"),
										"bookmark"	=> __("Bookmark"),
										"box"		=> __("Box"),
										"boxes"		=> __("Boxes"),
										"briefcase"	=> __("Briefcase"),
										"bulb"		=> __("Bulb"),
										"calendar"	=> __("Calendar"),
										"camera"	=> __("Camera"),
										"card"		=> __("Card"),
										"cart"		=> __("Cart"),
										"clock"		=> __("Clock"),
										"clock"		=> __("Clock"),
										"cloud"		=> __("Cloud"),
										"cog"		=> __("Cog"),
										"cog"		=> __("Cog"),
										"comment"	=> __("Comment"),
										"comments"	=> __("Comments"),
										"compass"	=> __("Compass"),
										"cone"		=> __("Cone"),
										"database"	=> __("Database"),
										"directions"=> __("Directions"),
										"disk"		=> __("Disk"),
										"dots"		=> __("Dots"),
										"earth"		=> __("Earth"),
										"filing"	=> __("Filing"),
										"film"		=> __("Film"),
										"flag"		=> __("Flag"),
										"folder"	=> __("Folder"),
										"goosepen"	=> __("Goospen"),
										"heart"		=> __("Heart"),
										"help"		=> __("Help"),
										"house"		=> __("House"),
										"images"	=> __("Images"),
										"inbox"		=> __("Inbox"),
										"info"		=> __("Info"),
										"ink"		=> __("Ink"),
										"keyboard"	=> __("Keyboard"),
										"leaf"		=> __("Leaf"),
										"letter"	=> __("Letter"),
										"location"	=> __("Location"),
										"magnifier"	=> __("Magnifier"),
										"megaphone"	=> __("Megaphone"),
										"microphone"=> __("Microphone"),
										"mobile"	=> __("Mobile"),
										"monitor"	=> __("Monitor"),
										"note"		=> __("Note"),
										"notes"		=> __("Notes"),
										"pad"		=> __("Pad"),
										"pad"		=> __("Pad"),
										"page"		=> __("Page"),
										"palette"	=> __("Palette"),
										"pamphlet"	=> __("Pamphlet"),
										"paperclip"	=> __("Paperclip"),
										"paperplane"=> __("Paperplane"),
										"pen"		=> __("Pen"),
										"piechart"	=> __("Piechart"),
										"printer"	=> __("Printer"),
										"prize"		=> __("Prize"),
										"rocket"	=> __("Rocket"),
										"star"		=> __("Star"),
										"tag"		=> __("Tag"),
										"tag"		=> __("Tag"),
										"upload"	=> __("Upload"),
										"user"		=> __("User"),
										"users"		=> __("Users"),
										"window"	=> __("Window"),
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
						
					</div> <!-- tab-pane -->
				
					<div class="tab-pane" id="fields">
						<table class="table">
							<thead>
								<tr>
									<th width="50px;"></th>
									<th><?php echo __("Label"); ?></th>
									<th><?php echo __("Name"); ?></th>
									<th><?php echo __("Type"); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><span class="icon40-move handle-move"></span></td>
									<td><?php echo HTML::anchor("admin/field/edit/"."1", "Title"); ?></td>
									<td><?php echo HTML::anchor("admin/field/edit/"."1", "field name"); ?></td>
									<td><?php echo __("Text"); ?></td>
								</tr>
								<tr>
									<td><span class="icon40-move handle-move"></span></td>
									<td><?php echo HTML::anchor("admin/field/edit/"."1", "Text"); ?></td>
									<td><?php echo HTML::anchor("admin/field/edit/"."1", "field name"); ?></td>
									<td><?php echo __("HTML"); ?></td>
								</tr>
								<tr>
									<td><span class="icon40-move handle-move"></span></td>
									<td><?php echo HTML::anchor("admin/field/edit/"."1", "Color"); ?></td>
									<td><?php echo HTML::anchor("admin/field/edit/"."1", "field name"); ?></td>
									<td><?php echo __("Dropdown"); ?></td>
								</tr>
							</tbody>
						</table>
						<?php echo HTML::anchor("admin/field/edit/"."1", '<i class="icon-plus"></i> '.__("Add field"), array('class'=>'btn')); ?>
					</div>
				
					<div class="tab-pane" id="access">
						Access...<br>
					</div>
				
					<div class="tab-pane" id="cache">
						Cache...<br>
					</div>
				
					<div class="tab-pane" id="advanced">
						Advanced...<br>
					</div>
				
				</div> <!-- tab-content -->

			</div> <!-- tabbable -->

		</div>
		<?php echo Form::close(); ?>
		
	</div> <!-- be-main -->

</div>