<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<?php
	// Load the user information
	$user = Auth::instance()->get_user();
?>
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php // include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<div class="heading">
					<h1><?php echo __("Dashboard"); ?> <small><?php echo __("Since"); ?> <?php echo Date::fuzzy_span(strtotime($user->last_login)); ?></small></h1>
				</div>
			</div>
		</div>
		
		<div class="be-content">
			<div class="row-fluid">
		
				<div class="span4">
				  <h2>My first campaign</h2>
				  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				  <p><a class="btn" href="index.html#">View details »</a></p>
				</div>
		
				<div class="span4">
				  <h2>Who would win, Superman or Batman?</h2>
				  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				  <p><a class="btn" href="index.html#">View details »</a></p>
				</div>
		
				<div class="span4">
				  <h2>Heading</h2>
				  <p>Donec id elit non mi porta gravida at eget metus. Tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				  <p><a class="btn" href="index.html#">View details »</a></p>
				</div>
				
			</div><!-- row-fluid -->
		</div>
	</div> <!-- be-main -->

</div>