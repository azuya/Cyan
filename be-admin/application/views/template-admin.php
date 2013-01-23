<!DOCTYPE html>
<html lang="en"> 
<head> 
	<title><?php echo $site["site"]["title"]; ?></title> 
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width">

	<link rel="canonical" href="<?php echo URL::site(Request::detect_uri(),true); ?>">	
	<link rel="shortcut icon" href="<?php echo URL::site('favicon.png') ?>">
	
	<link rel="stylesheet" type="text/css" href="<?php echo URL::site(null, true, false); ?>be-admin/assets/css/be-admin.css">
	<!--
	<link rel="stylesheet" type="text/css" media="all" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700">
	<script src="<?php echo URL::site(null, true, false); ?>be-admin/js/jquery-1.8.3.min.js"></script>
	-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/<?php echo $site["bliss_engine"]["jquery"]; ?>/jquery.min.js"></script>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL::site(null, true, false); ?>be-admin/assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL::site(null, true, false); ?>be-admin/assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL::site(null, true, false); ?>be-admin/assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo URL::site(null, true, false); ?>be-admin/assets/ico/apple-touch-icon-57-precomposed.png">
</head> 
<body>

	<div id="top">

		<!-- Header -->
		<?php require Kohana::find_file('static', 'admin-header','php'); ?>
		
		<!-- Content wrapper -->
		<div id="content" class="container-fluid">
		
			<?php if (true) : ?>
			<div id="system-alert" class="alert alert-block fade in">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo __("<strong>Warning!</strong> Someone else is editing this content. It's advised that you don't edit it at the same time."); ?>
			</div>
			<?php endif; ?>
		
			<!-- Content -->
			<div id="be-container">
				<?php echo $content; ?>
			</div>
	
		</div> <!-- / content wrapper -->
	
		<!-- Footer -->
		<?php require Kohana::find_file('static', 'admin-footer','php'); ?>

	</div> <!-- / top -->

	<!-- Scripts -->
	<?php require Kohana::find_file('static', 'scripts','php'); ?>
</body>
</html>