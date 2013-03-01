<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Form::open('login'); ?>
<div class="modal modal-login">
	
	<div class="modal-body">
	 
		<h2><?php echo $site["site"]["title"]; ?></h2>
		<p class="lead"><?php echo __("Welcome to login to :site! Enter your username or email address and password in the form below.", array(":site" => $site["site"]["title"])); ?></p>

		<? if ($message) : ?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<?php echo $message; ?><br>
			<?php echo Html::anchor('lost-password', __('Lost your password?')); ?>
		</div>
		<? endif; ?>
		
		<?php //echo Form::label('username', __("Username or Email"), array("class" => "control-label", "for" => "username")); ?>
		<div class="controls"><?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array("class" => "input50-envelope", "placeholder" => __("Username or Email"), "id" => "username", "autofocus")); ?></div>
	 
		<?php //echo Form::label('password', __("Password"), array("class" => "control-label", "placeholder" => __("Password"))); ?>
		<div class="controls"><?php echo Form::password('password', '', array("class" => "input50-lock", "placeholder" => __("Password"), "id" => "password")); ?></div>
 
		<?php echo Form::submit('login', __('Login'), array('class'=>'btn btn-primary btn-block btn-large', "id" => "login")); ?>

	</div>

</div>
<?php echo Form::close(); ?>

	<!--
	<p style="text-align:center;">Powered by <a href="http://www.cyancms.com"><?php echo $site["cyan"]["name"]; ?></a>, Copyright &copy; 2013</p>
	
	<div class="controls">
	<label class="checkbox"><?php echo Form::checkbox('remember'); ?> <?php echo __("Remember Me"); ?></label>
	</div>

	<?php echo Form::label('remember', __("Remember Me"), array("class" => "control-label")); ?>
	<div class="controls"><?php echo Form::checkbox('remember'); ?></div>

	<div class="controls">
	<p><?php echo __("Or") ?> <?php echo HTML::anchor('user/register', __('Create a new account')); ?></p>
	</div>
	-->

<!--
<div style="position: fixed; bottom: 0; width: 100%;">
<p style="text-align:center;">Copyright &copy; 2013 Bobolo – Visit <a href="http://www.cyancms.com">cyancms.com</a> for more information</p>
</div>
-->