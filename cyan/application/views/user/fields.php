<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php // include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<?php $errors = isset($errors) ? $errors : array(); ?>
		<?php echo Form::open('user/post/fields', array("class" => "form-horizontal")); ?>

		<div class="be-header">
			<div class="title">
				<div class="button">
					<?php echo HTML::anchor("admin/user/", "", array("class" => "icon40-chevron-left navigation-prev")); ?>
				</div>
				<div class="heading">
					<h1><?php echo _("User fields"); ?></h1>
				</div>
			</div>

			<div class="actions">
				<?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<table class="table table-hover">
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
					
					$system_field_names = array("username", "password", "first_name", "last_name");
					
					/*
					if ($content->id == "") {
						$content->fields = array(
							array(
								"label"			=> "Username",
								"name"			=> "username",
								"type"			=> "textfield",
								"properties"	=> '{"maxlength":"","minvalue":"","maxvalue":"","placeholder":"","rows":"","required":"","striptags":"","allowedextensions":"","resizeimages":"","maxwidth":"","maxheight":"","maxfiles":"","class":"","helper":"","items":"","helpinline":"","helpblock":""}',
							),
							array(
								"label"			=> "Password",
								"name"			=> "password",
								"type"			=> "password",
								"properties"	=> '{"maxlength":"","minvalue":"","maxvalue":"","placeholder":"","rows":"","required":"","striptags":"","allowedextensions":"","resizeimages":"","maxwidth":"","maxheight":"","maxfiles":"","class":"","helper":"","items":"","helpinline":"","helpblock":""}',
							),
						);
					}
					*/
					?>

					<!-- De som finns -->
					<?php if(isset($content->fields) && count($content->fields) > 0) : ?>
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
		
		</div> <!-- be-content -->
		
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