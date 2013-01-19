<?php
// Load the user information
$user = Auth::instance()->get_user();

if ($user) :
	$types = ORM::factory('type')->find_all();
?>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<?php echo HTML::anchor("admin/dashboard/", $site["site"]["title"], array("class" => "brand")); ?>

				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="active"><?php echo HTML::anchor("admin/dashboard/", '<i class="icon-star icon-white"></i> '.__("Dashboard")); ?></li>
						<li><?php echo HTML::anchor("admin/post", '<i class="icon-file icon-white"></i> '.__("Content")); ?></li>
						<li><?php echo HTML::anchor("admin/user", '<i class="icon-user icon-white"></i> '.__("Users")); ?></li>
					</ul>

					<ul class="nav pull-right">
						<li><?php echo HTML::anchor("admin/search", '<i class="icon-search icon-white"></i> '.__("Search")); ?></li>
						<li><?php echo HTML::anchor("admin/option", '<i class="icon-cog icon-white"></i> '.__("Configuration")); ?></li>
						<li><?php echo HTML::anchor("admin/user/profile", '<i class="icon-user icon-white"></i> '.__("My profile")); ?></li>
					</ul>
				</div><!--/.nav-collapse -->

			</div>
		</div>
	</div>

   	<!--
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
		
			<div class="container-fluid">
		
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
	
				<ul class="nav main-menu">
					<li class="brand">Bliss Engine</li>
					<li><?php echo HTML::anchor("admin/dashboard/", __("Dashboard")); ?></li>
					<li><?php echo HTML::anchor("admin/post/", __("Content")); ?></li>
					<li><?php echo HTML::anchor("admin/user/", __("Users")); ?></li>
					<li class="pull-right"><?php echo HTML::anchor("admin/search/", __("Search")); ?></li>
				</ul>

			</div>
			
		</div>
	</div>
	-->
	
<?php endif; ?>