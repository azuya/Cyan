<!DOCTYPE html>
<html lang="en"> 
<head> 
	<title><?php echo $title; ?></title> 
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="<?php echo $meta['keywords'] ?>">
	<meta name="description" content="<?php echo $meta['description'] ?>">
	<meta name="language" content="<?php echo I18n::lang(); ?>">
	<meta name="viewport" content="width=device-width">

	<base href="<?php echo URL::site(null, true, false); ?>">

	<link rel="canonical" href="<?php echo URL::site(Request::detect_uri(),true); ?>">
	<link rel="shortcut icon" href="<?php echo URL::site('favicon.png') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo URL::site(null, true, false); ?>be-admin/assets/css/be-admin.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/css/style.css">

    <?php
	// Load the user information
	$user = Auth::instance()->get_user();

    if ($user) : ?>
    <link rel="stylesheet" type="text/css" media="all" href="http://fonts.googleapis.com/css?family=Open+Sans">
    <?php endif; ?>

	<!--
	<script src="<?php echo URL::site(null, true, false); ?>be-admin/js/jquery-1.8.3.min.js"></script>
	-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-57-precomposed.png">
	
</style>
</head> 
<body>
	<!-- Admin menu -->
	<?php require Kohana::find_file('static', 'admin-menu','php'); ?>

	<!-- Content -->
	<div id="global-container">
    <?php echo $content; ?>
	</div>
	<!-- / Content -->
    	
	<!-- Script -->
	<?php require Kohana::find_file('static', 'scripts','php'); ?>
</body>
</html>