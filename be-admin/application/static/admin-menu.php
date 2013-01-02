<?php
// Load the user information
$user = Auth::instance()->get_user();

if ($user) {
?>

<header class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="">Bliss Engine</a>
			
			<form class="navbar-form pull-right">
				<div class="input-append">
					<input class="span2" id="appendedInputButton" size="16" type="text"><button class="btn" type="button"><i class="icon-search"></i></button>
				</div>
			</form>
			
		</div>
	</div>

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
					<!--
					<li class="active"><a href="index.html#">Home</a></li>
					-->
					<li class="dropdown">
						<a href="index.html#campaigns" class="dropdown-toggle" data-toggle="dropdown"><?php echo "MY sitename";?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo HTML::anchor("", __("View site")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("content", __("Content")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("dashboard", __("Dashboard")); ?></li>
							<li class="divider"></li>
							<li><?php echo HTML::anchor("help", __("Help")); ?></li>
							<li><?php echo HTML::anchor("http://www.blissengine.org/", "BlissEngine.org"); ?></li>
							<li><?php echo HTML::anchor("http://www.blissengine.org/forum/", "Bliss Engine forums"); ?></li>
							<li><?php echo HTML::anchor("about", __("About Bliss Engine")); ?></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="index.html#add" class="dropdown-toggle" data-toggle="dropdown"><?php echo __("Add");?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<?php
					        $content_types = ORM::factory('content_type')->find_all();
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

					<!--
					<li class="dropdown">
						<a href="#" class="btn">1</a>
					</li>
					-->

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->username; ?> <b class="caret"></b></a>
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
</header>

<button id="ScrollToTop" class="Button WhiteButton Indicator Offscreen" type="button">&uarr;</button>
<?php } ?>