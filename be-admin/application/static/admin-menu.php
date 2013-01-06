<?php
// Load the user information
$user = Auth::instance()->get_user();

if ($user) :
	$types = ORM::factory('type')->find_all();
?>

	<div class="navbar navbar-inverse navbar-fixed-top">

    <div class="navbar-menu" id="admin-menu">
      <div class="navbar-inner">
        <div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
          <div class="nav-collapse collapse">

				<!-- Left Menu -->
				<ul class="nav">

					<!-- Site menu -->
					<li class="dropdown">
						<a href="index.html#campaigns" class="dropdown-toggle" data-toggle="dropdown"><?php echo $site["site"]["title"]; ?> <span class="social-count">5</span></a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("", __("View site")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("admin/dashboard", __("Dashboard")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("admin/messages/", sprintf(__("%d messages"), 3)); ?></li>
							<li><?php echo HTML::anchor("admin/post/", sprintf(__("%d new content"), 2)); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("admin/help", __("Help")); ?></li>
							<li><?php echo HTML::anchor("http://www.blissengine.org/", "BlissEngine.org"); ?></li>
							<li><?php echo HTML::anchor("http://www.blissengine.org/forum/", "Support forums"); ?></li>
							<li><?php echo HTML::anchor("admin/about", sprintf(__("About %s"), $site["bliss_engine"]["name"])); ?></li>
						</ul>
					</li>
					
					<!-- Content -->
					<li class="dropdown">
						<a href="index.html#add" class="dropdown-toggle" data-toggle="dropdown"><?php echo __("Content");?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("admin/post", __("Content")); ?></li>
							<li class="divider"></li>
							<?php
							foreach ($types as $type) {
								echo "<li>".HTML::anchor("admin/post/index/?type=".$type->id, $type->name)."</li>";
							}
							?>
						</ul>
					</li>

					<!-- Add -->
					<li class="dropdown">
						<a href="index.html#add" class="dropdown-toggle" data-toggle="dropdown"><?php echo __("Add");?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<?php
							foreach ($types as $type) {
								echo "<li>".HTML::anchor("admin/post/new/?type=".$type->id, $type->name)."</li>";
							}
							?>
							
						</ul>
					</li>
				</ul>

				<!-- Right menu -->
				<ul class="nav pull-right">
					<? if (strtolower(Request::current()->controller()) == "viewer") : ?>
					<li>
						<a href="">View</a>
					</li>
					<li>
						<?php echo HTML::anchor("admin/post/edit/".Arr::get($_GET, 'c', '0'), __("Edit")); ?>
					</li>
					<?php endif; ?>
					<li class="dropdown">
						<a href="index.html#about" class="dropdown-toggle" data-toggle="dropdown"><?php echo __("Configuration");?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("admin/option", __("Site settings")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("admin/user", __("Users")); ?></li>
							<!--
							<li><a href="#">Modules</a></li>
							<li><a href="#">Subsites</a></li>
							-->
							<li class="divider"></li>
							<li><?php echo HTML::anchor("admin/type", __("Types")); ?></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle name" data-toggle="dropdown">
							<img height="20" src="https://secure.gravatar.com/avatar/676cb2730f0afc5abd5a9c279d532aff?s=140&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png" alt="avatar" width="20">
							<?php echo $user->username; ?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("admin/user/profile", __("My profile")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("admin/user/logout", __("Logout")); ?></li>
						</ul>
					</li>

				</ul>
				
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
	</div> <!-- /.navbar -->
	
<?php endif; ?>