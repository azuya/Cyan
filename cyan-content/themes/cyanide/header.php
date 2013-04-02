<!DOCTYPE html>
<html lang="<?php echo I18n::lang(); ?>">
<head> 
	<title><?php echo $title; ?></title> 
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="<?php echo $meta['keywords'] ?>">
	<meta name="description" content="<?php echo $meta['description'] ?>">
	<meta name="language" content="<?php echo I18n::lang(); ?>">

	<!-- Mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=320.1">

	<!-- OpenGraph for facebook -->	
	<meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:type" content="article">
	<meta property="og:url" content="http://cyan/index.php?special=article&amp;id=487">
	<meta property="og:image" content="http://cyan/files/articles/487/glyphicons-417-rss.png">
	<meta property="og:site_name" content="<?php echo $site["site"]["title"]; ?>">
	<meta property="og:description" content="Elementum dictum phasellus adipiscing aenean urna ipsum at aliquam. Non in lacus fusce nibh accumsan rhoncus a mollis libero: Pellentesque ullamcorper nisl dapibus phasellus. &#8230;">
	<!-- OpenGraph for facebook -->	

	<link rel="canonical" href="<?php echo URL::site(Request::detect_uri(),true); ?>">
	<link rel="shortcut icon" href="<?php echo URL::site('favicon.png') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo URL::site(null, true, false); ?>cyan-content/themes/<?php echo $site["site"]["theme"]; ?>/assets/css/style.css">

	<?php Theme::cyan_header(); ?>
	<?php echo HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/'.$site["cyan"]["jquery"].'/jquery.min.js'); ?>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<?php echo HTML::script('http://html5shim.googlecode.com/svn/trunk/html5.js'); ?>
	<![endif]-->

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL::site(null, true, false); ?>cyan-content/themes/<?php echo $site["site"]["theme"]; ?>/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL::site(null, true, false); ?>cyan-content/themes/<?php echo $site["site"]["theme"]; ?>/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL::site(null, true, false); ?>cyan-content/themes/<?php echo $site["site"]["theme"]; ?>/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo URL::site(null, true, false); ?>cyan-content/themes/<?php echo $site["site"]["theme"]; ?>/ico/apple-touch-icon-57-precomposed.png">
</head> 
<body>

	<header>
	<!-- *** OVERALL HEADER *** -->
	</header>
	
	<!-- Content -->
    <div class="container-narrow" id="content">
