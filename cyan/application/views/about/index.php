<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("cyan/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
				<div class="heading">
					<h1><?php echo $site["cyan"]["name"]; ?> <small><?php echo $site["cyan"]["version"]; ?></small></h1>
				</div>
			</div>
		</div>
		
		<div class="be-content">
			<p class="lead">
				This is the first alpha of Cyan, the fabulous new CMS by Bobolo.
			</p>
			
			<ul>
				<li>Kohana <span class="muted">3.3.0</span></li>
					<ul>
						<li><a href="https://github.com/shadowhand/pagination">Pagination</a> – 3.2 <span class="muted">(Master)</span></li>
						<li><a href="https://github.com/shadowhand/email">Email</a> – 3.3 <span class="muted">(Develop)</span></li>
						<li><a href="https://github.com/shadowhand/purifier">Purifier</a> – 3.3 <span class="muted">(Develop)</span></li>
						<li><a href="https://github.com/shadowhand/bonafide">Bonafide</a> – 3.2 <span class="muted">(Develop)</span></li>
					</ul>
				<li><?php echo HTML::anchor("http://jquery.com/", "jQuery"); ?> – <span class="muted">1.9.1</span></li>
				<li><?php echo HTML::anchor("http://twitter.github.com/bootstrap/", "Bootstrap"); ?> – <span class="muted">2.3.1</span></li>
					<ul>
						<li><a href="http://www.eyecon.ro/bootstrap-datepicker/">Datepicker</a> – 12/3/2013</li>
					</ul>
				<!-- <li><?php echo HTML::anchor("http://ckeditor.com/", "CKEditor"); ?> – <span class="muted">4.0.1</span></li> -->
				<li><?php echo HTML::anchor("http://www.entypo.com/", "The Entypo Pictogram Suite"); ?> by Daniel Bruce – <span class="muted">2.0</span></li>
			</ul>
			
			<h2>Stuff</h2>
			
			<p>
				<a href="https://github.com/andersd/Cyan" class="external">Cyan on GitHub</a>
			</p>
		</div>
	</div> <!-- be-main -->

</div>