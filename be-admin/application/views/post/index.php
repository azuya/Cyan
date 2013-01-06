<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php
$types = ORM::factory('type')->find_all();
?>

<div id="content-index" class="screen active">
	
	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
		
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<h1>
					<?php
					$selected_type_id = isset($_GET['type']) ? $_GET['type'] : "";
					if ($selected_type_id) {
				        $filter_type = new Model_Type($selected_type_id);						
						echo $filter_type->name;
					} else {
						echo __("Content");						
					}
					?>
				</h1>
			</div>
			
			<div class="actions left">
				<?php
				if ($selected_type_id)
				{ 
					echo HTML::anchor("admin/post/new?type=".$selected_type_id, "<i class=\"icon-plus-sign\"></i> ".__("New content"), array("class" => "btn"));
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
				
				<small class="be-tooltip" rel="tooltip" title="Tooltip är coolt och fungerar ju från start!">?</small>
				
			</div>
			
			<div class="actions">

				<div class="item">
					<?php echo $item_count." ".__("items"); ?>
				</div>

				<div class="btn-group">
					<button class="btn"><?php echo __("Sort"); ?></button>
					<button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a tabindex="-1" href="#"><i class="icon-ok"></i> <?php echo __("Title"); ?></a></li>
						<li><a tabindex="-1" href="#"><?php echo __("Content type"); ?></a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" href="#"><?php echo __("Created date"); ?></a></li>
						<li><a tabindex="-1" href="#"><?php echo __("Modified date"); ?></a></li>
					</ul>
				</div><div class="btn-group">
					<button class="btn"><?php echo __("Filter"); ?></button>
					<button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
					<ul class="dropdown-menu">
						<?php foreach ($types as $type) {
							echo "<li>";
							
							if ($type->id == $selected_type_id) {
								$active_icon = "<i class=\"icon-ok\"></i> ";
							} else {
								$active_icon = "";
							}
							
							echo HTML::anchor("admin/post/?type=".$type->id, $active_icon.Text::limit_chars($type->name, 20, "…", true));
							echo "</li>";
						}
						?>
						<li class="divider"></li>
						<li>
						<?php
						if ($selected_type_id == "") {
							echo HTML::anchor("admin/post", "<i class=\"icon-ok\"></i> ".__("All"));
						} else {
							echo HTML::anchor("admin/post", __("All"));							
						}
						?>
						</li>
					</ul>
				</div><div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-align-justify"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a tabindex="-1" href="#"><?php echo __("Export data"); ?></a></li>
					</ul>
				</div>

			</div>
			
		</div>
		
		<div class="be-content">
			
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:60%;"><?php echo __("Title"); ?></th>
						<th style="width:20%;"><?php echo __("Type"); ?></th>
						<th style="width:10%;"><?php echo __("Author"); ?></th>
						<th style="width:10%;"></th>
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
					?>
					<tr<?php echo $classes; ?>>
					    <td>
					    	<div>
						    	<?php echo HTML::anchor("admin/post/edit/".$post->id, Text::limit_chars($post->title, 50, "…", true)); ?>
						    	<span class="row-show-on-hover">
						    		<?php echo HTML::anchor("?c=".$post->id, "<i class=\"icon-eye-open\"></i> ".__("View")); ?>
						    	</span>
					    	</div>
					    	<div class="row-overlay">
						    	<span class="muted">goff!</span>
					    	</div>
					    </td>
					    <td><?php echo $post->type_id; ?></td>
					    <td><?php echo HTML::anchor("admin/user/edit/".$post->author_id, $post->author_id); ?></td>
					    <td>
					    	<div class="row-show-on-hover">
					    	<?php echo HTML::anchor("admin/content/delete/".$post->id, "Delete"); ?>
					    	</div>
					    </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php echo $pagination; ?>
			
		</div>
	</div> <!-- be-main -->
	
</div>