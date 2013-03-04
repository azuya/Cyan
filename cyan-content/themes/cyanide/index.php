<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a Cyan theme
 * and one of the two required files for a theme (the other being assets/css/style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://www.cyancms.com/Template_Hierarchy
 *
 */ 
?>

<?php require 'header.php'; ?>
<?php Theme::get_header(); ?>

<?php echo $content; ?>
    	
<?php Theme::get_footer(); ?>