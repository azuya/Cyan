<!DOCTYPE html>
<html lang="en"> 
<head> 
	<title>Bliss Engine</title> 
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="description" content="Bliss Engine">
	<meta name="author" content="Anders Dahlgren">
	<meta name="viewport" content="width=device-width">
	<base href="<?php echo URL::site(null, true, false); ?>">
	<link rel="canonical" href="<?php echo URL::site(Request::detect_uri(),true); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::site(null, true, false); ?>be-admin/css/be-admin.css">

	<!--
    <link rel="stylesheet" type="text/css" media="all" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<script src="<?php echo URL::site(null, true, false); ?>be-admin/js/jquery-1.8.2.min.js"></script>
	-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<link rel="shortcut icon" href="<?php echo URL::site(null, true, false); ?>be-admin/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL::site(null, true, false); ?>be-admin/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL::site(null, true, false); ?>be-admin/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL::site(null, true, false); ?>be-admin/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo URL::site(null, true, false); ?>be-admin/ico/apple-touch-icon-57-precomposed.png">
</head> 
<body>
    
	<!-- Header -->
	<?php include("be-admin/application/static/admin-menu.php"); ?>
	
	<!-- Content -->
	<div id="be-main" class="container-fluid">
		<?php if ($user) : ?>
		
			<div class="be-tools">
			<?php include("be-admin/application/static/admin-tools.php"); ?>
			</div>
			
		<?php endif; ?>
			
		<div class="be-main">
			<div id="be-screens">
				<?php echo $content; ?>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php include("be-admin/application/static/admin-footer.php"); ?>

	<!-- Script -->
	<?php include("be-admin/application/static/admin-scripts.php"); ?>
</body>
</html>