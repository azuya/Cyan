<?php
// Load the user information
$user = Auth::instance()->get_user();

if ($user) {
	$content_types = ORM::factory('content_type')->find_all();
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
				
					<!-- Goff -->
					<li class="dropdown">
						<a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-star icon-white"></i></a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("about", __("About Bliss Engine")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("help", __("Help")); ?></li>
							<li><?php echo HTML::anchor("http://www.blissengine.org/", "BlissEngine.org"); ?></li>
							<li><?php echo HTML::anchor("http://www.blissengine.org/forum/", "Support forums"); ?></li>
						</ul>
					</li>

					<!-- Site menu -->
					<li class="dropdown">
						<a href="index.html#campaigns" class="dropdown-toggle" data-toggle="dropdown"><?php echo "MY sitename";?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("", __("View site")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("dashboard", __("Dashboard")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("help", __("Help")); ?></li>
							<li><?php echo HTML::anchor("http://www.blissengine.org/", "BlissEngine.org"); ?></li>
							<li><?php echo HTML::anchor("http://www.blissengine.org/forum/", "Bliss Engine forums"); ?></li>
							<li><?php echo HTML::anchor("about", __("About Bliss Engine")); ?></li>
						</ul>
					</li>
					
					<!-- Content -->
					<li class="dropdown">
						<a href="index.html#add" class="dropdown-toggle" data-toggle="dropdown"><?php echo __("Content");?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("content", __("Content")); ?></li>
							<li class="divider"></li>
							<?php
							foreach ($content_types as $item) {
								echo "<li>".HTML::anchor("content/index/?content-type=".$item->id, $item->name)."</li>";
							}
							?>
						</ul>
					</li>

					<!-- Add -->
					<li class="dropdown">
						<a href="index.html#add" class="dropdown-toggle" data-toggle="dropdown"><?php echo __("Add");?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<?php
							foreach ($content_types as $item) {
								echo "<li>".HTML::anchor("content/new/?content-type=".$item->id, $item->name)."</li>";
							}
							?>
							
						</ul>
					</li>
				</ul>

				<!-- Right menu -->
				<ul class="nav pull-right">
					<li>
						<a href="">View</a>
					</li>
					<li>
						<?php echo HTML::anchor("content/edit/".Arr::get($_GET, 'c', '0'), __("Edit")); ?>
					</li>
					<li class="dropdown">
						<a href="index.html#about" class="dropdown-toggle" data-toggle="dropdown"><?php echo __("Configuration");?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("option", __("Site settings")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("user", __("User")); ?></li>
							<li><a href="#">Modules</a></li>
							<li><a href="#">Subsites</a></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("content_type", __("Content types")); ?></li>
						</ul>
					</li>

					<!-- Notifications -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="social-count-right">5</span>
						</a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("messages/", "<i class=\"icon-envelope\"></i> ".sprintf(__("%d messages"), 3)); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("content/", sprintf(__("%d new content"), 2)); ?></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle name" data-toggle="dropdown">
							<img height="20" src="https://secure.gravatar.com/avatar/676cb2730f0afc5abd5a9c279d532aff?s=140&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png" width="20">
							<?php echo $user->username; ?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("user/profile", __("My profile")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("user/logout", __("Logout")); ?></li>
						</ul>
					</li>

				</ul>
				
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
	</div> <!-- /.navbar -->
	
<?php } ?>