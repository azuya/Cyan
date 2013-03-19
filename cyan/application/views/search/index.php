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
				<div class="heading">
					<h1><?php
						if ($query["q"]) {
							echo sprintf(__("Search for '%s'"), $query["q"]);
						} else {
							echo __("Search");
						}
						?>
					</h1>
				</div>
			</div>
			
			<div class="actions">

				<div class="item">
					<?php echo sprintf(__("%d items found"), $item_count); ?>
				</div>

			</div>
			
		</div>
		
		<div class="be-content">
			<?php
			// if ($query["q"])
			// { 
			// 	echo "<p>".sprintf(__("%d items found, displaying %d to %d."), $item_count, 1, 999)."</p>";
			// }
			?>
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:40px"></th>
						<th style="width:50%;"><?php echo __("Title"); ?></th>
						<th style="width:20%;"><?php echo __("Type"); ?></th>
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
					?>
					<tr<?php echo $classes; ?>>
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

					    <td><?php echo $post->type; ?></td>
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
			
			<?php echo $pagination; ?>
			
		</div>
	</div> <!-- be-main -->
	
</div>