<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		
		<?php echo Form::open('admin/type/post/'.$content->id, array("class" => "form-horizontal")); ?>
		<?php echo Nonce::nonce_field(($content->id) ? "be-update-type-".$content->id : "be-create-type"); ?>
		<div class="be-header">
			<div class="title">
				<div class="button back">
					<?php echo HTML::anchor("admin/type/", "", array("class" => "icon40-chevron-left navigation-prev")); ?>
				</div>
				<div class="heading">
					<h1><?php
						if ($content->id) {
							echo $content->name;
						} else {
							echo __("New type");
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
					
						<table class="table table-hover table-fields">
							<thead>
								<tr>
									<th width="50px;"></th>
									<th style="width:30%;"><?php echo __("Label"); ?></th>
									<th style="width:30%;"><?php echo __("Name"); ?></th>
									<th style="width:20%;"><?php echo __("Type"); ?></th>
									<th style="width:20%;"></th>
								</tr>
							</thead>
							<tbody class="sorted_table">

								<?php
								$types = array(
									"textfield"	=> __("Text"),
									"password"	=> __("Password"),
									"textarea"	=> __("Textarea"),
									"html"		=> __("HTML"),
									"select"	=> __("Select"),
									"checkbox"	=> __("Checkboxes"),
									"radio"		=> __("Radio buttons"),
									"email"		=> __("Email"),
									"url"		=> __("URL"),
									"files"		=> __("Files"),
									"images"	=> __("Images"),
									"date"		=> __("Date"),
									"int"		=> __("Integer"),
									"float"		=> __("Float"),
								);
								
								$system_field_names = array("title", "body", "excerpt");
								
								if ($content->id == "") {
									echo "new";
									$content->fields = array(
										array(
											"label"			=> "Title",
											"name"			=> "title",
											"type"			=> "textfield",
											"properties"	=> '{"maxlength":"","minvalue":"","maxvalue":"","placeholder":"","rows":"","required":"","striptags":"","allowedextensions":"","resizeimages":"","maxwidth":"","maxheight":"","maxfiles":"","class":"","helper":"","items":"","helpinline":"","helpblock":""}',
										),
										array(
											"label"			=> "Body",
											"name"			=> "body",
											"type"			=> "html",
											"properties"	=> '{"maxlength":"","minvalue":"","maxvalue":"","placeholder":"","rows":"","required":"","striptags":"","allowedextensions":"","resizeimages":"","maxwidth":"","maxheight":"","maxfiles":"","class":"","helper":"","items":"","helpinline":"","helpblock":""}',
										),
									);
								}
								?>

								<!-- De som finns -->
								<?php if(is_array($content->fields) && count($content->fields) > 0) : ?>
								<?php $field_id = 0; ?>
								<?php foreach($content->fields as $field) : ?>
									<?php
									$field_id++;
									$field["properties"] = isset($field["properties"]) ? $field["properties"] : '';
									?>
									<tr data-id="<?php echo $field_id;?>">
										<td><span class="icon40-move handle-move"></span></td>
										<td><?php echo Form::input('field_label[]', $field["label"], array("class" => "clean", "placeholder" => __("Label here"))); ?></td>
										<td>
											<?php if (in_array($field["name"], $system_field_names)) : ?>
												<i class="icon-tag" style="opacity:0.5;"></i>
											<?php endif; ?>
											<?php echo Form::input('field_name[]', $field["name"], array("class" => "clean", "placeholder" => __("Field name"))); ?>
										</td>
										<td><?php echo Form::select('field_type[]', $types, $field["type"], array("class" => "clean")); ?></td>
										<td>
											<?php echo Form::hidden('field_properties[]', $field["properties"]); ?>
										    <div class="tools">
										    	<?php echo HTML::anchor("#", '<i class="icon-cog"></i>', array('class' => 'field-properties')); ?>
										    	<?php echo HTML::anchor("#", '<i class="icon40-times"></i>', array("class" => "remove-row")); ?>
										    </div>
										</td>
									</tr>
								<?php endforeach; ?>
								<?php endif; ?>
								<!-- De som finns -->

								<tr class="clone-source" data-id="">
									<td><span class="icon40-move handle-move"></span></td>
									<td><?php echo Form::input('field_label[]', '', array("placeholder" => __("Label here"))); ?></td>
									<td><?php echo Form::input('field_name[]', '', array("placeholder" => __("Field name"))); ?></td>
									<td><?php echo Form::select('field_type[]', $types, ''); ?></td>
									<td>
										<?php echo Form::hidden('field_properties[]', '{"maxlength":"","minvalue":"","maxvalue":"","placeholder":"","required":"","striptags":"","helpblock":"","helpinline":"","allowedextensions":"","resizeimages":"","maxwidth":"","maxheight":"","maxfiles":"","class":"","helper":"","items":""}'); ?>
									    <div class="tools">
									    	<?php echo HTML::anchor("#", '<i class="icon-cog"></i>', array('class' => 'field-properties')); ?>
									    	<?php echo HTML::anchor("#", '<i class="icon40-times"></i>', array("class" => "remove-row")); ?>
									    </div>
									</td>
								</tr>
								
							</tbody>
						</table>
						<?php echo HTML::anchor("#", '<i class="icon-plus"></i> '.__("Add field"), array('class'=>'btn add-field')); ?>

						<div id="modal-field-properties" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="label-field-properties" aria-hidden="true">
							<input type="hidden" id="row-id">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3 id="label-field-properties"><span>Field</span> <small><?php echo __("Properties"); ?></small></h3>
							</div>
							<div class="modal-body">
								<div class="control-group" data-for="textfield">
									<label class="control-label" for="maxlength"><?php echo __("Max length"); ?></label>
									<div class="controls">
										<input type="text" id="maxlength" placeholder="<?php echo __("Max length"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="int float">
									<label class="control-label" for="minvalue"><?php echo __("Min value"); ?></label>
									<div class="controls">
										<input type="text" id="minvalue" placeholder="<?php echo __("Min value"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="int float">
									<label class="control-label" for="maxvalue"><?php echo __("Max value"); ?></label>
									<div class="controls">
										<input type="text" id="maxvalue" placeholder="<?php echo __("Max value"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="textfield textarea">
									<label class="control-label" for="placeholder"><?php echo __("Placeholder"); ?></label>
									<div class="controls">
										<input type="text" id="placeholder" placeholder="<?php echo __("Placeholder"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="textarea">
									<label class="control-label" for="rows"><?php echo __("Rows"); ?></label>
									<div class="controls">
										<input type="text" id="rows" placeholder="<?php echo __("Number of rows"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="all">
									<label class="control-label" for="required"></label>
									<div class="controls">
										<label class="checkbox"><input type="checkbox" id="required"> <?php echo __("Required"); ?></label>
									</div>
								</div>
								<div class="control-group" data-for="textfield textarea">
									<label class="control-label" for="striptags"></label>
									<div class="controls">
										<label class="checkbox"><input type="checkbox" id="striptags"> <?php echo __("Strip tags"); ?></label>
									</div>
								</div>
								<div class="control-group" data-for="images files">
									<label class="control-label" for="allowedextensions"><?php echo __("Allowed extensions"); ?></label>
									<div class="controls">
										<input type="text" id="allowedextensions" placeholder="<?php echo __("Allowed extensions"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="images">
									<label class="control-label" for="resizeimages"><?php echo __("Resize images"); ?></label>
									<div class="controls">
										<label class="checkbox"><input type="checkbox" id="resizeimages"> <?php echo __("Resize images"); ?></label>
									</div>
								</div>
								<div class="control-group" data-for="images">
									<label class="control-label" for="maxwidth"><?php echo __("Max width"); ?></label>
									<div class="controls">
										<input type="text" id="maxwidth" placeholder="<?php echo __("Max width"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="images">
									<label class="control-label" for="maxheight"><?php echo __("Max height"); ?></label>
									<div class="controls">
										<input type="text" id="maxheight" placeholder="<?php echo __("Max height"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="images">
									<label class="control-label" for="maxfiles"><?php echo __("Max files"); ?></label>
									<div class="controls">
										<input type="text" id="maxfiles" placeholder="<?php echo __("Max files"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="all">
									<label class="control-label" for="class"><?php echo __("CSS classes"); ?></label>
									<div class="controls">
										<input type="text" id="class" placeholder="<?php echo __("CSS classes"); ?>">
									</div>
								</div>
								<div class="control-group" data-for="textfield">
									<label class="control-label" for="helper"><?php echo __("Helper"); ?></label>
									<div class="controls">
										<select type="text" id="helper">
											<option value="">– <?php echo __("None"); ?> –</option>
											<option value="date-picker"><?php echo __("Date picker"); ?></option>
											<option value="color-picker"><?php echo __("Color picker"); ?></option>
										</select>
									</div>
								</div>
								<div class="control-group" data-for="select radio checkbox">
									<label class="control-label" for="items"><?php echo __("Items"); ?></label>
									<div class="controls">
										<textarea id="items" placeholder="<?php echo __("Items"); ?>"></textarea>
									</div>
								</div>
								<div class="control-group" data-for="all">
									<label class="control-label" for="helpinline"><?php echo __("Inline help text"); ?></label>
									<div class="controls">
										<input type="text" id="helpinline" placeholder="<?php echo __("Inline help text"); ?>"></textarea>
									</div>
								</div>
								<div class="control-group" data-for="all">
									<label class="control-label" for="helpblock"><?php echo __("Help text"); ?></label>
									<div class="controls">
										<textarea id="helpblock" placeholder="<?php echo __("Help text"); ?>"></textarea>
										<span class="help-block"><?php echo __("Additional information describing this field and/or instructions on how to enter the content."); ?></span>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __("Cancel"); ?></button>
								<button class="btn btn-primary save-field-properties"><?php echo __("Save"); ?></button>
							</div>
						</div>

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
		<script type="text/javascript">
			$(document).ready(function() {
				
				$(document).on('click', '.add-field', function() {
					$('table.table tbody tr.clone-source').clone().removeClass('clone-source').appendTo('table.table tbody');
				});
				
				// Sortable rows
				$('.sorted_table').sortable({
					containerSelector: 'tbody',
					itemSelector: 'tr',
					handle: '.handle-move',
					placeholder: '<tr class="placeholder"><td colspan="5"></td></tr>'
				})
				
				// Field properties
				$(document).on('click', '.field-properties', function() {
					var clicked_row = $(this).parents('tr');

					var field_type = $(clicked_row).find('select[name="field_type[]"]').val();
					// console.log(field_type);

					var field_properties_string = $(clicked_row).find('input[name="field_properties[]"]').val();

					if (field_properties_string != '') {
						var field_properties = JSON.parse(field_properties_string);
						// console.log(field_properties);
						
						$.each(field_properties, function(index, value) {
							// console.log(index + ':' + value);
							if ($('#' + index).attr('type') == 'checkbox') {
								if (value != '') {
									$('#' + index).attr('checked', true);
								} else {
									$('#' + index).attr('checked', false);
								}
								
							} else {
								$('#' + index).val(value);
							}
						});
					}
					
					// Row-id
					$('#modal-field-properties #row-id').val($(clicked_row).attr("data-id"));

					// Title
					$('#modal-field-properties .modal-header h3 span').html($(clicked_row).find('input[name="field_label[]"]').val());
					
					// Type
					$('#modal-field-properties .modal-header h3 small').html($(clicked_row).find('select[name="field_type[]"] option:selected').text());
					
					// Show / hide field properties
					$("#modal-field-properties div.control-group").each(function(index) {
						
						// Show property
						if ($(this).data('for').indexOf(field_type) !== -1 || $(this).data('for') == 'all') {
							$(this).show();
						
						// Hide property
						} else {
							$(this).hide();
						}
						
  					});
  					
					$('#modal-field-properties').modal();
				});
				
				$(document).on('click', '.save-field-properties', function() {
					
					var properties = {};
					$("#modal-field-properties div.control-group div.controls").each(function(index) {
						var property = $(this).find("select, textarea, input");
						var name = $(property).attr('id');
						var value = '';
						
						if ($(property).attr('type') == "checkbox") {
							if ($(property).is(':checked')) {
								value = 'true';
							} else {
								value = '';
							}
						} else {
							value = $(property).val();
						}
						properties[name] = value;
					});
					
					// console.log(properties);
					// console.log(JSON.stringify(properties));
					
					// console.log(JSON.stringify($('#modal-field-properties').serializeObject()));
					// var fields = $('#modal-field-properties').serialize();
					// console.log(fields);
					
					var field_properties = JSON.stringify(properties);
					
					// Put values back in field row in table
					$('tr[data-id=' + $('#modal-field-properties #row-id').val() + ']').find('input[name="field_properties[]"]').val(field_properties);
					
					// Close modal
					$('#modal-field-properties').modal('hide');
					return false;
				});
				
			});
		</script>
		
	</div> <!-- be-main -->

</div>