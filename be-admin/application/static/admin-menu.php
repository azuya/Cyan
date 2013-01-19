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
						<li><?php echo HTML::anchor("admin/dashboard/", '<i class="icon-star icon-white"></i> '.__("Dashboard")); ?></li>
						<li><?php echo HTML::anchor("admin/post", '<i class="icon-file icon-white"></i> '.__("Content")); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("admin/user", __("Search")); ?></li>
									</ul>
									<ul class="items">
										
										<?php foreach ($types as $type) : ?>
											<li><?php echo HTML::anchor("admin/post/?type=".$type->id, $type->name); ?></li>
										<?php endforeach; ?>
										
										<li>Sökning...</li>
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
						<li><?php echo HTML::anchor("admin/search", '<i class="icon-search icon-white"></i>', array("id" => "search-trigger")); ?>
							<div class="submenu submenu-search">
								<div class="inner">
									<div id="be-search" class="container-fluid">
										<?php echo Form::open('search', array('method' => 'get')); ?>
										<?php echo Form::input('q', $q, array("id" => "q", "placeholder" => sprintf(__("Search %s"), $site["site"]["title"]))); ?>
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
										<li><?php echo HTML::anchor("admin/type", __("Content types")); ?></li>
										<li><?php echo HTML::anchor("admin/option", __("Options")); ?></li>
										<li><?php echo HTML::anchor("admin/settings", __("Content types")); ?></li>
									</ul>
									<ul class="items">
										<li>Ett item</li>
										<li>Item två</li>
										<li>En sak till och så</li>
									</ul>
								</div>
							</div>
						</li>
						<li><?php echo HTML::anchor("admin/user/profile", '<i class="icon-user icon-white"></i>'); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("admin/user", __("Users")); ?></li>
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