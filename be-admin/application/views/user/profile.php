<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div id="media-profile" class="screen active">

	<?php $errors = isset($errors) ? $errors : array(); ?>
	<?php echo Form::open('user/post', array("class" => "form-horizontal")); ?>
	
		<div class="be-header">
			<div class="title">
				<h1>Info for user "<?php echo $user->username; ?>"</h1>
			</div>
			
			<div class="actions">
				<?php echo Form::submit('submit', __('Submit'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
		
		<div class="be-content">
	
			<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
					<li><a href="#tab2" data-toggle="tab">Section 2</a></li>
				</ul>
			
				<div class="tab-content">
					<div class="tab-pane active" id="tab1">
			
			
						<legend>Legend</legend>
						
						<div class="control-group">
							<?php echo Form::label('username', __("Username"), array("class" => "control-label", "for" => "username")); ?>
							<div class="controls"><?php echo Form::input('username', $user->username, array("placeholder" => __("Username"), "id" => "username")); ?></div>
						</div>
						 
						<div class="control-group">
							<?php echo Form::label('first_name', __("First name"), array("class" => "control-label", "for" => "first_name")); ?>
							<div class="controls"><?php echo Form::input('first_name', '', array("placeholder" => __("First name"), "id" => "first_name")); ?></div>
						</div>
						 
						<div class="control-group">
							<?php echo Form::label('last_name', __("Last name"), array("class" => "control-label", "for" => "last_name")); ?>
							<div class="controls"><?php echo Form::input('last_name', '', array("placeholder" => __("Last name"), "id" => "last_name")); ?></div>
						</div>
						 
						<div class="control-group">
							<?php echo Form::label('email', __("Email"), array("class" => "control-label", "for" => "email")); ?>
							<div class="controls"><?php echo Form::input('email', $user->email, array("placeholder" => __("Email"), "id" => "email")); ?></div>
						</div>
						 
						<div class="control-group">
							<?php echo Form::label('password', __("Password"), array("class" => "control-label", "placeholder" => __("Password"))); ?>
							<div class="controls"><?php echo Form::password('password', '', array("placeholder" => __("Password"), "id" => "password")); ?></div>
						</div>
						 
						<ul>
						    <li><?php echo __("Number of logins") ?>: <?php echo Num::format($user->logins, 0, false); ?></li>
						    <li><?php echo __("Last login") ?>: <?php echo Date::fuzzy_span(strtotime($user->last_login)); ?></li>			    
						</ul>
					</div>
					<div class="tab-pane" id="tab2">
						<p>Howdy, I'm in Section 2.</p>
					</div>
				</div>
			
			</div>
		
		</div>
	<?php echo Form::close(); ?>

</div>