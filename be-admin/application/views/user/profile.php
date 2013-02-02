<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="<?php echo Util::get_page_id(); ?>" class="screen active">

	<div class="be-tools">
		<?php include("be-admin/application/static/admin-tools.php"); ?>
	</div>
	
	<div class="be-main">
		<?php $errors = isset($errors) ? $errors : array(); ?>
		<?php echo Form::open('user/post/', array("class" => "form-horizontal")); ?>

		<div class="be-header">
			<div class="title">
				<h1><?php echo __("My profile"); ?></h1>
			</div>

			<div class="actions">
				<?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
		
		<div class="be-content">
			<?php $errors = isset($errors) ? $errors : array(); ?>
			
			<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
					<li><a href="#tab2" data-toggle="tab">Section 2</a></li>
				</ul>
			
				<div class="tab-content">
					<div class="tab-pane active" id="tab1">
						
						<div class="control-group">
							<?php echo Form::label('username', __("Username"), array("class" => "control-label", "for" => "username")); ?>
							<div class="controls"><?php echo Form::input('username', $user->username, array("placeholder" => __("Username"))); ?></div>
						</div>
						 
						<div class="control-group">
							<?php echo Form::label('first_name', __("First name"), array("class" => "control-label", "for" => "first_name")); ?>
							<div class="controls"><?php echo Form::input('first_name', '', array("placeholder" => __("First name"))); ?></div>
						</div>
						 
						<div class="control-group">
							<?php echo Form::label('last_name', __("Last name"), array("class" => "control-label", "for" => "last_name")); ?>
							<div class="controls"><?php echo Form::input('last_name', '', array("placeholder" => __("Last name"))); ?></div>
						</div>
						 
						<div class="control-group">
							<?php echo Form::label('email', __("Email"), array("class" => "control-label", "for" => "email")); ?>
							<div class="controls"><?php echo Form::input('email', $user->email, array("placeholder" => __("Email"))); ?></div>
						</div>
						 
						<div class="control-group">
							<?php echo Form::label('password', __("Password"), array("class" => "control-label")); ?>
							<div class="controls"><?php echo Form::password('password', '', array("placeholder" => __("Password"))); ?></div>
						</div>
						 
						<ul>
						    <li><?php echo __("Number of logins") ?>: <?php echo Num::format($user->logins, 0, false); ?></li>
						    <li><?php echo __("Last login") ?>: <?php echo Date::fuzzy_span(strtotime($user->last_login)); ?></li>			    
						</ul>
					</div> <!-- tab-pane -->
				
					<div class="tab-pane" id="tab2">
						<p>Howdy, I'm in Section 2.</p>
					</div>
				
				</div> <!-- tab-content -->

			</div> <!-- tabbable -->
						
		</div>
		<?php echo Form::close(); ?>
	</div> <!-- be-main -->

</div>