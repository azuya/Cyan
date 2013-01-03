<?php
// Load the user information
$user = Auth::instance()->get_user();

if ($user) {
	$content_types = ORM::factory('content_type')->find_all();
?>

<div id="header">

	<?php include("be-admin/application/static/admin-menu.php"); ?>
	
	<!--
	<a class="brand" href="">Bliss Engine</a>
	-->
	<div class="container-fluid">
		<form class="navbar-search pull-right">
			<input type="text" class="search-query" placeholder="Search">
		</form>
	</div>

</div>
<?php } ?>