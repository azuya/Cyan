<?php
$query = $_GET;
$q = isset($query['q']) ? $query['q'] : "";

if (Auth::instance()->logged_in()) : ?>
<div id="header">

	<!-- Admin menu -->
	<?php require Kohana::find_file('static', 'admin-menu','php'); ?>
	
	<!--
	<a class="brand" href="">Bliss Engine</a>
	-->
	<div id="be-search" class="container-fluid">
		<?php echo Form::open('search', array('method' => 'get', "class" => "navbar-search pull-right")); ?>
		<?php echo Form::input('q', $q, array("placeholder" => sprintf(__("Search %s"), $site["site"]["title"]), "class" => "search-query")); ?>
		<?php echo Form::close(); ?>
	</div>

</div>
<?php endif; ?>