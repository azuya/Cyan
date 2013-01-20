<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a Bliss Engine theme
 * and one of the two required files for a theme (the other being assets/css/style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://www.blissengine.org/Template_Hierarchy
 *
 */ 
?>

<?php require 'header.php'; ?>
<?php Theme::get_header(); ?>


	<!-- Content -->
	<div id="content">
    <?php echo $content; ?>
	</div>
	<!-- / Content -->
    	
<?php Theme::get_footer(); ?>