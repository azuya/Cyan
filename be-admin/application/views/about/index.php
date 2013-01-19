<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="dashboard-index" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<div class="be-header">
			<div class="title">
			<h1><?php echo $site["bliss_engine"]["name"]; ?> <small><?php echo $site["bliss_engine"]["version"]; ?></small></h1>
			</div>
		</div>
		
		<div class="be-content">
			<p class="lead">
				This is the first alpha of Bliss Engine, the fabulous new CMS by Bobolo.
			</p>
			
			<ul>
				<li>Kohana <span class="muted">3.3.0</span></li>
					<ul>
						<li><a href="https://github.com/shadowhand/pagination">Pagination</a> <span class="muted">3.3 (Master)</span></li>
						<li><a href="https://github.com/shadowhand/email">Email</a> <span class="muted">3.3 (Develop)</span></li>
						<li><a href="https://github.com/shadowhand/purifier">Purifier</a> <span class="muted">3.3 (Develop)</span></li>
						<li><a href="https://github.com/shadowhand/bonafide">Bonafide</a> <span class="muted">3.2 (Develop)</span></li>
					</ul>
				<li>jQuery <span class="muted">1.8.3</span></li>
				<li>Bootstrap <span class="muted">2.2.2</span></li>
				<li>CKEditor <span class="muted">4.0.1</span></li>
			</ul>
			
			<h2>Stuff</h2>
			
			<p>
				<a href="https://github.com/andersd/Bliss-Engine">Bliss Engine on GitHub</a>
			</p>
		</div>
	</div> <!-- be-main -->

</div>