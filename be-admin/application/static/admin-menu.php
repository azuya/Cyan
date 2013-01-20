<?php
// Load the user information
$user = Auth::instance()->get_user();

if ($user) :
	$types = ORM::factory('type')->find_all();

	$query = $_GET;
	$cid = isset($query['c']) ? $query['c'] : "";

    // Load site configuration file
    $site = Kohana::$config->load('app');
?>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<?php echo HTML::anchor("admin/dashboard/", $site["site"]["title"], array("class" => "brand hidden-desktop")); ?>

				<div class="nav-collapse collapse">
					<ul class="nav">
						<li><?php echo HTML::anchor("admin/dashboard/", $site["site"]["title"], array("class" => "brand hidden-tablet hidden-phone")); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("admin/dashboard/", '<i class="icon-star"></i> '.__("Dashboard")); ?></li>
										<li><?php echo HTML::anchor(".", '<i class="icon-star"></i> '.__("View site")); ?></li>
										<li class="divider"></li>
										<li><?php echo HTML::anchor("admin/messages/", sprintf(__("%d messages"), 3)); ?></li>
										<li><?php echo HTML::anchor("admin/post/", sprintf(__("%d new content"), 2)); ?></li>
									</ul>
									<ul class="items">
										<li><?php echo HTML::anchor("admin/help", __("Help")); ?></li>
										<li><?php echo HTML::anchor("http://www.blissengine.org/", "BlissEngine.org"); ?></li>
										<li><?php echo HTML::anchor("http://www.blissengine.org/forum/", "Support forums"); ?></li>
										<li class="divider"></li>
										<li><?php echo HTML::anchor("admin/about", sprintf(__("About %s"), $site["bliss_engine"]["name"])); ?></li>
									</ul>
								</div>
							</div>
						</li>
						<li><?php echo HTML::anchor("admin/post", '<i class="icon-file icon-white"></i> '.__("Content")); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("post/new", __("Add content")); ?></li>
									</ul>
									<ul class="items">
										<?php foreach ($types as $type) : ?>
											<li><?php echo HTML::anchor("admin/post/?type=".$type->id, $type->name); ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</li>
						<li><?php echo HTML::anchor("admin/media", '<i class="icon-picture icon-white"></i> '.__("Media")); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("admin/post", __("Media")); ?></li>
										<li><?php echo HTML::anchor("admin/post/upload", __("Upload file"), array("class" => "btn")); ?></li>
									</ul>
									<ul class="items">
										<li><?php echo HTML::anchor("admin/post/?type=file", __("All files")); ?></li>
									</ul>
								</div>
							</div>
						</li>
						<li><?php echo HTML::anchor("admin/user", '<i class="icon-user icon-white"></i> '.__("Users")); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("admin/user", __("Users")); ?></li>
										<li><?php echo HTML::anchor("admin/user/new", __("Add user"), array("class" => "btn")); ?></li>
									</ul>
									<ul class="items">
										<li><?php echo HTML::anchor("admin/user", __("Users")); ?></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>

					<ul class="nav pull-right">

						<?php if ($cid) : ?>
						<li><?php echo HTML::anchor("admin/post/edit/".$cid, '<i class="icon-edit icon-white"></i>', array("id" => "edit-trigger", "class" => "no-dropdown")); ?></li>
						<?php endif; ?>

						<li><?php echo HTML::anchor("admin/search", '<i class="icon-search icon-white"></i>', array("id" => "search-trigger")); ?>
							<div class="submenu submenu-search">
								<div class="inner">
									<div id="be-search" class="container-fluid">
										<?php echo Form::open('search', array('method' => 'get')); ?>
										<?php echo Form::input('q', '', array("id" => "q", "placeholder" => sprintf(__("Search %s"), $site["site"]["title"]))); ?>
										<?php echo Form::submit('submit', __('Search'), array('class'=>'btn btn-primary')) ?>
										<?php echo Form::close(); ?>
									</div>
								</div>
							</div>
						</li>
						<li><?php echo HTML::anchor("admin/setting", '<i class="icon-cog icon-white"></i>'); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">

									</ul>
									<ul class="items">
										<li><?php echo HTML::anchor("admin/type", __("Content types")); ?></li>
										<li><?php echo HTML::anchor("admin/option", __("Options")); ?></li>
										<li><?php echo HTML::anchor("admin/language", __("Languages")); ?></li>
									</ul>
								</div>
							</div>
						</li>
						<li><?php echo HTML::anchor("admin/user/profile", '<i class="icon-user icon-white"></i>'); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("admin/user/profile", __("My profile")); ?></li>
										<li class="divider"></li>
										<li><?php echo HTML::anchor("user/logout", __("Logout")); ?></li>
									</ul>
									<ul class="items">
										<li>Ett item</li>
										<li>Item två</li>
										<li>En sak till och så</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
<?php endif; ?>