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

	<!-- Content -->
    <div class="container-narrow" id="content">

      <div class="jumbotron">
        <h1>Cyan CMS</h1>
        <p class="lead">On February 28 2013, everything changed – <strong>Cyan</strong> was born. The modest goal with Cyan is to create the best CMS the world has ever seen. It should run on all platforms, be open and free and rely on modern web technologies such as HTML5 and CSS3.</p>
        <p>Working with clients and CMS:es for the last five year I've learnt a few things of what clients want and expect from a webpage and what they later on wants. Perhaps they start out nice and easily with one language and ten pages, but what happens if they after a year want to add two more languages and the possibility to have more themes and than a few admins? The goal with Bliss Engine is that this will be possible from the start, without needing to rely on too many third party plugins from different sources.</p>
        <h2>What's next?</h2>
        <p>Next up is a new site here on this location. I will run Cyan on this site as a demo and proof of concept as soon as the first Alpha is useful.</p>
      </div>

      <?php echo $content; ?>
      <hr>

      <div class="row-fluid marketing">
        <div class="span6">
          <h4>Goals</h4>
          <ul>
			<li>Simplest, yet most powerful, user interface possible</li>
			<li>Multi-lingual from the start</li>
			<li>Full version control of content</li>
			<li>Hierarchical user structure</li>
			<li>Multi-site possibilities with different themes on different parts of the website</li>
			<li>Flexible plugin structure</li>
			<li>High performance</li>
			<li>Small footprint</li>
			<li>Full cache support for all content</li>
			<li>Inline-editing</li>
			<li>Full drag-and-drop</li>
			<li>Fully customizable data structure</li>
			<li>Full AJAX implementation</li>
			<li>Secure</li>
			<li>APIs</li>
			<li>HTML 5 and CSS 3</li>
			<li>Should work in mobile devices out of the box using responsive layout</li>
			<li>Admin UI should work in all devices - mobiles, pads etc.</li>
			<li>UTF-8 encoded from square one</li>
          </ul>
        </div>

        <div class="span6">
          <h4>Requirements</h4>
	         <ul>
				<li>A Unix or Windows-based web server running Apache</li>
				<li><strong>PHP</strong> version 5.2.4 or newer</li>
				<li><strong>MySQL</strong> 5.0.15 or newer</li>
			</ul>

          <h4>License</h4>
          <p>Not yet decided</p>
        </div>
      </div>

      <hr>
      <div class="footer">
        <p>&copy; Bobolo 2013</p>
      </div>
      
    </div>
    <!-- /Content -->
    	
<?php Theme::get_footer(); ?>