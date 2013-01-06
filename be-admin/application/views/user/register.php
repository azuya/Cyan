<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Form::open('user/register', array("class" => "form-horizontal")); ?>
<div class="modal">
	
	<div class="modal-header">
		<h3><?php echo __("Register new user"); ?></h3>
	</div>
	
	<div class="modal-body">

		<p class="lead">
			<?php echo sprintf(__("Fill in the form below to register an account with %s."), $site["site"]["title"]); ?>
		</p>
		
		<? if ($message) : ?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<?php echo $message; ?>
			</div>
		<? endif; ?>

 		<div class="control-group">
			<?php echo Form::label('username', __("Username"), array("class" => "control-label", "for" => "username")); ?>
			<div class="controls">
				<?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array("placeholder" => __("Username"), "id" => "username")); ?>
				<div class="label label-important"><?php echo Arr::get($errors, 'username');?></div>
			</div>
		</div>
	
		<div class="control-group">
			<?php echo Form::label('email', __("Email"), array("class" => "control-label", "for" => "email")); ?>
			<div class="controls">
				<?php echo Form::input('email', HTML::chars(Arr::get($_POST, 'email')), array("placeholder" => __("Email"), "id" => "email")); ?>
				<div class="label label-important"><?php echo Arr::get($errors, 'email');?></div>
			</div>
		</div>
	
		<div class="control-group">
			<?php echo Form::label('password', __("Password"), array("class" => "control-label", "for" => "password")); ?>
			<div class="controls">
				<?php echo Form::password('password', HTML::chars(Arr::get($_POST, 'password')), array("placeholder" => __("Password"), "id" => "password")); ?>
				<div class="label label-important"><?php echo Arr::path($errors, '_external.password');?></div>
			</div>
		</div>
	
		<div class="control-group">
			<?php echo Form::label('password_confirm', __("Confirm password"), array("class" => "control-label", "for" => "password_confirm")); ?>
			<div class="controls">
				<?php echo Form::password('password_confirm', HTML::chars(Arr::get($_POST, 'password_confirm')), array("placeholder" => __("Confirm password"), "id" => "password_confirm")); ?>
				<div class="label label-important"><?php echo Arr::path($errors, '_external.password_confirm');?></div>
			</div>
		</div>
	
	</div>

	<div class="modal-footer">
		<p class="pull-left">Or <?= HTML::anchor('user/login', 'login'); ?> if you have an account already.</p>
		<?php echo Form::submit('login', __('Register'), array('class'=>'btn btn-primary')); ?>
	</div>

</div>
<?php echo Form::close(); ?>
 
