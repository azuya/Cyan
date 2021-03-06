<?php
// Load the user information
$user = Auth::instance()->get_user();

if ($user) :
	$types = ORM::factory('type')->order_by('sort', 'asc')->find_all();

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
						<li class="logo">
							<?php echo HTML::anchor("admin/dashboard/", $site["site"]["title"], array("class" => "brand hidden-tablet hidden-phone")); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("admin/dashboard/", '<i class="icon-home"></i> '.__("Dashboard")); ?></li>
										<li><?php echo HTML::anchor("/", '<i class="icon-eye-open"></i> '.__("View site")); ?></li>
										<!--
										<li class="divider"></li>
										<li><?php echo HTML::anchor("admin/messages/", sprintf(__("%d messages"), 3)); ?></li>
										<li><?php echo HTML::anchor("admin/post/", sprintf(__("%d new content"), 2)); ?></li>
										-->
									</ul>
									<ul class="items">
										<li><?php echo HTML::anchor("admin/help", '<span class="text">'.__("Help").'</span>'.'<i class="icon60-help"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/news", '<span class="text">'.__("Cyan News").'</span>'.'<i class="icon60-megaphone"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("http://www.cyancms.com/", '<span class="text">'."CyanCMS.com".'</span>'.'<i class="icon60-earth"></i><br>', array("class" => "link external")); ?></li>
										<li><?php echo HTML::anchor("http://www.cyancms.com/forum/", '<span class="text">'.__("Support forums").'</span>'.'<i class="icon60-comments"></i><br>', array("class" => "link external")); ?></li>
										<li><?php echo HTML::anchor("admin/about", '<span class="text">'.__("About").'</span>'.'<i class="icon60-info"></i><br>', array("class" => "link")); ?></li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<?php echo HTML::anchor("admin/post", '<i class="icon40-page"></i> '.__("Content"), array("rel" => "tooltip", "data-placement" => "bottom", "data-original-title" => __("Your content is located here"))); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("#", __("All content")); ?></li>
										<li><?php echo HTML::anchor("#", __("Newest content")); ?></li>
										<li><?php echo HTML::anchor("#", __("Last updated content")); ?></li>
										<li><?php echo HTML::anchor("admin/type/", __("Manage content types")); ?></li>
									</ul>
									<ul class="items">
										<li><?php echo HTML::anchor("admin/post", '<span class="text">'.__("All content").'</span>'.'<i class="icon60-dots"></i><br>', array("class" => "link")); ?></li>
										<?php foreach ($types as $type) : ?>
											<li>
												<?php
												$link = '<span class="text">'.$type->name.'</span>'.'<i class="icon60-'.$type->icon.'"></i><br>';
												echo HTML::anchor("admin/post/?type=".$type->id, $link, array("class" => "link")); ?>
												<?php echo HTML::anchor("admin/post/new?type=".$type->id, "", array("class" => "add")); ?>												
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<?php echo HTML::anchor("admin/media", '<i class="icon40-images"></i> '.__("Media"), array("rel" => "tooltip", "data-placement" => "bottom", "data-original-title" => __("Manage and upload files"))); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("admin/post", __("Media")); ?></li>
									</ul>
									<ul class="items">
										<li><?php echo HTML::anchor("admin/post/?type=file", '<span class="text">'.__("All files").'</span>'.'<i class="icon60-dots"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/post/upload", '<span class="text">'.__("Upload files").'</span>'.'<i class="icon60-upload"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/post/?type=file&filetype=image", '<span class="text">'.__("Images").'</span>'.'<i class="icon60-images"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/post/?type=file&filetype=video", '<span class="text">'.__("Videos").'</span>'.'<i class="icon60-film"></i><br>', array("class" => "link")); ?></li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<?php echo HTML::anchor("admin/user", '<i class="icon40-users"></i> '.__("Users"), array("rel" => "tooltip", "data-placement" => "bottom", "data-original-title" => __("Manage users, groups and access rights"))); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
										<li><?php echo HTML::anchor("admin/user", __("All users")); ?></li>
										<li><?php echo HTML::anchor("#", __("Newest users")); ?></li>
										<li><?php echo HTML::anchor("#", __("Last updated users")); ?></li>
										<li><?php echo HTML::anchor("admin/user/new", __("Add user"), array("class" => "btn")); ?></li>
									</ul>
									<ul class="items">
										<li><?php echo HTML::anchor("admin/user", '<span class="text">'.__("All users").'</span>'.'<i class="icon60-dots"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/usergroup", '<span class="text">'.__("User groups").'</span>'.'<i class="icon60-users"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/role", '<span class="text">'.__("Roles").'</span>'.'<i class="icon60-users"></i><br>', array("class" => "link")); ?></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>

					<ul class="nav pull-right">

						<?php if ($cid) : ?>
						<li><?php echo HTML::anchor("admin/post/edit/".$cid, '<i class="icon40-edit"></i>'.'<span> '.__("Edit").'</span>', array("id" => "edit-trigger", "class" => "no-dropdown")); ?></li>
						<?php endif; ?>

						<li>
							<?php echo HTML::anchor("admin/search", '<i class="icon40-search"></i>'.'<span> '.__("Search").'</span>', array("id" => "search-trigger", "rel" => "tooltip", "data-placement" => "bottom", "data-original-title" => __("Search your site"))); ?>
							<div class="submenu submenu-search">
								<div class="inner">
									<div id="be-search" class="container-fluid">
										<?php echo Form::open('search', array('method' => 'get')); ?>
										<?php echo Form::input('q', '', array("id" => "q", "class" => "input50-search", "placeholder" => sprintf(__("Search %s"), $site["site"]["title"]))); ?>
										<?php echo Form::submit('submit', __('Search'), array('class'=>'btn btn-primary')) ?>
										<?php echo Form::close(); ?>
									</div>
								</div>
							</div>
						</li>
						<li>
							<?php echo HTML::anchor("admin/setting", '<i class="icon40-cog"></i>'.'<span> '.__("Configuration").'</span>', array("rel" => "tooltip", "data-placement" => "bottom", "data-original-title" => __("Configure your site here"))); ?>
							<div class="submenu">
								<div class="inner">
									<ul class="menu">
									</ul>
									<ul class="items">
										<li><?php echo HTML::anchor("admin/type", '<span class="text">'.__("Content types").'</span>'.'<i class="icon60-box"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/category", '<span class="text">'.__("Categories").'</span>'.'<i class="icon60-basket"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/user/fields", '<span class="text">'.__("User fields").'</span>'.'<i class="icon60-tag"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/tags", '<span class="text">'.__("Tags").'</span>'.'<i class="icon60-tag"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/module", '<span class="text">'.__("Modules").'</span>'.'<i class="icon60-cabinet"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/role", '<span class="text">'.__("Roles").'</span>'.'<i class="icon60-user"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/option", '<span class="text">'.__("Options").'</span>'.'<i class="icon60-cog"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/form", '<span class="text">'.__("Forms").'</span>'.'<i class="icon60-window"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/language", '<span class="text">'.__("Languages").'</span>'.'<i class="icon60-earth"></i><br>', array("class" => "link")); ?></li>
										<li><?php echo HTML::anchor("admin/site", '<span class="text">'.__("Sites").'</span>'.'<i class="icon60-boxes"></i><br>', array("class" => "link")); ?></li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<?php echo HTML::anchor("admin/user/profile", '<i class="icon40-user"></i>'.'<span> '.__("Profile").'</span>', array("rel" => "tooltip", "data-placement" => "bottom", "data-original-title" => __("Get to and update your profile here"))); ?>
							<div class="submenu submenu-profile">
								<div class="inner">
									<div class="top">
										<div class="photo">
											<img data-src="holder.js/100x100" class="photo">
											<?php echo HTML::anchor("user/logout", __("Change photo"), array("class" => "change-photo")); ?>
										</div>
										<div>
											<h4><?php echo HTML::anchor("admin/user/profile", trim($user->username." ".$user->first_name . " " . $user->last_name)); ?></h4>
											<p><?php echo $user->email; ?></p>
										</div>
									</div>
									<div class="bottom">
										<?php echo HTML::anchor("user/logout", __("Logout"), array("class" => "btn btn-primary")); ?>
									</div>
								</div>
							</div>
						</li>
						<li>
							<?php echo HTML::anchor("#", '<i class="icon40-dot-empty"></i>'.'<span> '.__("Notifications").'</span>', array("id" => "notification-indicator", "rel" => "tooltip", "data-placement" => "bottom", "data-original-title" => __("You have no unread notifications"))); ?>
							<div class="submenu submenu-notifications" id="notifications">
								<ul>
									<li><?php echo HTML::anchor("admin", '<i class="icon-envelope"></i> '.sprintf(__("%d messages"), 3), array("class" => "link")); ?></li>
									<li><?php echo HTML::anchor("admin", '<i></i> '.sprintf(__("%d new items to moderate"), 12), array("class" => "link")); ?></li>
								</ul>
							</div>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
<?php endif; ?>