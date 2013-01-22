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
	
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo URL::site(null, true, false); ?>be-content/themes/bliss/ico/apple-touch-icon-57-precomposed.png">
</head> 
<body>
	
	*** OVERALL HEADER ***<br>