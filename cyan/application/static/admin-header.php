<?php if (Auth::instance()->logged_in()) : ?>
<header class="admin">

	<!-- Admin menu -->
	<?php require Kohana::find_file('static', 'admin-menu','php'); ?>

</header>
<?php endif; ?>