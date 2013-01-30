<!DOCTYPE html>
<html lang="en">
<head> 
	<title><?php echo $title; ?></title> 
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="<?php echo $meta['keywords'] ?>">
	<meta name="description" content="<?php echo $meta['description'] ?>">
	<meta name="language" content="<?php echo I18n::lang(); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="canonical" href="<?php echo URL::site(Request::detect_uri(),true); ?>">
	<link rel="shortcut icon" href="<?php echo URL::site('favicon.png') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/assets/css/style.css">

	<?php Theme::be_header(); ?>
	<!--
    <link rel="stylesheet" type="text/css" media="all" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<script src="<?php echo URL::site(null, true, false); ?>be-admin/js/jquery-1.8.3.min.js"></script>
	-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/<?php echo $site["bliss_engine"]["jquery"]; ?>/jquery.min.js"></script>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- OpenGraph for facebook -->	
	<meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:type" content="article">
	<meta property="og:url" content="http://blisslegacy/index.php?special=article&amp;id=487">
	<meta property="og:image" content="http://blisslegacy/files/articles/487/glyphicons-417-rss.png">
	<meta property="og:site_name" content="<?php echo $site["site"]["title"]; ?>">
	<meta property="og:description" content="Elementum dictum phasellus adipiscing aenean urna ipsum at aliquam. Non in lacus fusce nibh accumsan rhoncus a mollis libero: Pellentesque ullamcorper nisl dapibus phasellus. &#8230;">
	<!-- OpenGraph for facebook -->	

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-57-precomposed.png">
</head> 
<body>

<header>
*** OVERALL HEADER ***
</header>