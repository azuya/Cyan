<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php
$types = ORM::factory('type')->find_all();
?>

<div id="<?php echo Util::get_page_id(); ?>" class="screen active">
	
	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
		
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<h1><?php
					if ($query["q"]) {
						echo sprintf(__("Search for '%s'"), $query["q"]);
					} else {
						echo __("Search");
					}
					?>
				</h1>
			</div>
			
			<div class="actions">

				<div class="item">
					<?php echo sprintf(__("%d items found"), $item_count); ?>
				</div>

			</div>
			
		</div>
		
		<div class="be-content">
			<?php
			if ($query["q"])
			{ 
				echo "<p>".sprintf(__("%d items found, displaying %d to %d."), $item_count, 1, 999)."</p>";
			}
			?>
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
					    <td><?php echo $post->type; ?></td>
					    <td><?php echo HTML::anchor("admin/user/edit/".$post->author, $post->author); ?></td>
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