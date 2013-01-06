<?php
// Load the user information
$user = Auth::instance()->get_user();
?>

<? if ($user) : ?>
	<div id="header">
	
		<!-- Admin menu -->
		<?php require Kohana::find_file('static', 'admin-menu','php'); ?>
		
		<!--
		<a class="brand" href="">Bliss Engine</a>
		-->
		<div id="be-search" class="container-fluid">
			<form class="navbar-search pull-right">
				<input type="text" class="search-query" placeholder="Search">
			</form>
		</div>
	
	</div>
<? endif; ?>