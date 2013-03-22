<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php
$types = ORM::factory('type')->find_all();
?>

<div id="<?php echo Util::get_page_id(); ?>" class="screen active">
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<div class="heading">
					<h1><?php
						$selected_type = isset($_GET['type']) ? $_GET['type'] : "";
						if ($selected_type == "file") {
							echo __("Media");
						} else if ($selected_type) {
					        $filter_type = new Model_Type($selected_type);						
							echo $filter_type->name;
						} else {
							echo __("Content");						
						}
					?></h1>
				</div>
			</div>
			
			<div class="actions left">
				<?php
				
				if ($selected_type)
				{ 
					echo HTML::anchor("admin/post/new?type=".$selected_type, "<i class=\"icon-plus-sign\"></i> ".__("New content"), array("class" => "btn"));
				}
				else
				{
					// $popover = "<ul class=\"content-types\">";
					$popover = "";
					foreach ($types as $type) {
						// $popover .= "<li>".HTML::anchor("admin/post/new?type=".$item->id, $item->name, array("class" => "btn btn-large btn-block"))."</li>";
						$popover .= HTML::anchor("admin/post/new?type=".$type->id, $type->name, array("class" => "btn btn-large btn-block"));
					}
					// $popover .= "</ul>";
					
					$popover .= "<p>".HTML::anchor("admin/type/", __("Manage content types"))."</p>";
					?>
					<a href="#" class="btn" rel="popover" data-placement="bottom" data-content='<?php echo $popover; ?>' data-original-title="<?php echo __("Choose content type");?>"><i class="icon-plus-sign"></i> <?php echo __("New content"); ?></a>
					<?php
				}
				
				?>
				
			</div>
			
			<div class="actions">

				<div class="item pull-right">
					<?php echo $item_count." ".__("items"); ?>
				</div>

				<div class="btn-group pull-right">
					<button class="btn"><?php echo __("Sort"); ?></button>
					<button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a tabindex="-1" href="#"><i class="icon-ok"></i> <?php echo __("Title"); ?></a></li>
						<li><a tabindex="-1" href="#"><?php echo __("Content type"); ?></a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" href="#"><?php echo __("Created date"); ?></a></li>
						<li><a tabindex="-1" href="#"><?php echo __("Modified date"); ?></a></li>
					</ul>
				</div>
				
				<div class="btn-group pull-right">
					<button class="btn"><?php echo __("Filter"); ?></button>
					<button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
					<ul class="dropdown-menu">
						<?php foreach ($types as $type) :
							$active_icon = ($type->id == $selected_type) ? "<i class=\"icon-ok\"></i> " : "";
							printf('<li>%s</li>', HTML::anchor("admin/post/?type=".$type->id, $active_icon.Text::limit_chars($type->name, 20, "…", true)));
					    endforeach; ?>
						<li class="divider"></li>
						<li><?php echo HTML::anchor("admin/post/?type=file",$active_icon."Files"); ?></li>
						<li class="divider"></li>
						<li>
						<?php
						if ($selected_type == "") {
							echo HTML::anchor("admin/post", "<i class=\"icon-ok\"></i> ".__("All"));
						} else {
							echo HTML::anchor("admin/post", __("All"));							
						}
						?>
						</li>
					</ul>
				</div>
				
				<div class="btn-group pull-right hidden-phone">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#" rel="tooltip" data-placement="bottom" data-original-title="<?php echo __("More options here"); ?>">
						<i class="icon-align-justify"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a tabindex="-1" href="#"><?php echo __("Export data"); ?></a></li>
					</ul>
				</div>

			</div>
			
		</div>
		
		<div class="be-content">
			
			<form>
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:40px"></th>
						<th style="width:40px"></th>
						
						<?php if (!$selected_type): ?>
						<th style="width:50%;"><?php echo __("Title"); ?></th>
						<th style="width:20%;"><?php echo __("Type"); ?></th>
						<?php else: ?>
						<th style="width:70%;"><?php echo __("Title"); ?></th>
						<?php endif; ?>
						<th style="width:10%;" class="hidden-phone"><?php echo __("Author"); ?></th>
						<th style="width:10%;" class="hidden-phone"><?php echo __("Modified"); ?></th>
						<th style="width:10%;" class="hidden-phone"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contents as $post) : ?>
					<?php
						if ($post->active) {
							$classes = "";
						} else {
							$classes = " class=\"inactive\"";
						}
						
						$post_type = ($post->type == "file") ? $post->mime_type : $post->type;
					?>
					<tr<?php echo $classes; ?>>
					    <td>
						    <?php // echo HTML::anchor("#", '&nbsp;', array("name" => "post[]", "value" => $post->id, "class" => "check-toggle icon40-check-empty")); ?>
					    	<input type="checkbox" class="check icon40-check-empty" name="post[]" value="<?php echo $post->id; ?>">
					    </td>
					    <td>
					    	<span class="icon40-star<?php echo (!$post->star) ? '-empty' : '';?>"></span>
					    </td>

					    <td>
					    	<div>
						    	<?php echo HTML::anchor("admin/post/edit/".$post->id, Text::limit_chars($post->title, 50, "…", true)); ?>
					    	</div>
					    	<!--
					    	<div class="row-overlay">
						    	<span class="muted">goff!</span>
					    	</div>
					    	-->
					    </td>

						<?php if (!$selected_type): ?>
					    <td><?php echo $post_type; ?></td>
						<?php endif; ?>

					    <td class="hidden-phone"><?php echo HTML::anchor("admin/user/edit/".$post->author, $post->author); ?></td>
					    <td class="hidden-phone"><?php echo Util::date_relative($post->modified_date); ?> <small><?php echo $post->modified_by; ?></small></td>
					    <td class="hidden-phone">
						    <div class="tools">
					    		<?php echo HTML::anchor("?c=".$post->id, "<i class=\"icon-eye-open\"></i>"); ?>
						    	<?php echo HTML::anchor(Nonce::nonce_url("admin/post/delete/".$post->id, "be-delete-post-".$post->id), '<i class="icon40-times"></i>'); ?>
						    </div>
					    </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			</form>
			
			<?php echo $pagination; ?>
			
		</div>
	</div> <!-- be-main -->
	
</div>