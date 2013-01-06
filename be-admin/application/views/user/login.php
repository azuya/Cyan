<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Form::open('user/login', array("class" => "form-horizontal")); ?>
<div class="modal">
	
	<div class="modal-header">
		<h3><?php echo $site["site"]["title"]; ?></h3>
	</div>
	
	<div class="modal-body">
	 
		<? if ($message) : ?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<?php echo $message; ?>
			</div>
		<? endif; ?>
		
		<div class="control-group">
			<?php echo Form::label('username', __("Username or Email"), array("class" => "control-label", "for" => "username")); ?>
			<div class="controls"><?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array("placeholder" => __("Username or Email"), "id" => "username")); ?></div>
		</div>
		 
		<div class="control-group">
			<?php echo Form::label('password', __("Password"), array("class" => "control-label", "placeholder" => __("Password"))); ?>
			<div class="controls"><?php echo Form::password('password', '', array("placeholder" => __("Password"), "id" => "password")); ?></div>
		</div>
	 
		<div class="control-group">
			<div class="controls">
			<label class="checkbox"><?php echo Form::checkbox('remember'); ?> <?php echo __("Remember Me"); ?></label>
			</div>
			
			<!--
			<?php echo Form::label('remember', __("Remember Me"), array("class" => "control-label")); ?>
			<div class="controls"><?php echo Form::checkbox('remember'); ?></div>
			-->
		</div>
	
		<div class="control-group">
			<div class="controls">
			<p><?php echo __("Or") ?> <?php echo HTML::anchor('user/register', __('Create a new account')); ?></p>
			</div>
		</div>

	</div>

	<div class="modal-footer">
	<?php echo Form::submit('login', __('Lost your password?'), array('class'=>'btn pull-left')); ?>
	<?php echo Form::submit('login', __('Login'), array('class'=>'btn btn-primary')); ?>
	</div>

</div>
<?php echo Form::close(); ?>

<div style="position: fixed; bottom: 0; width: 100%;">
<p style="text-align:center;">Copyright &copy; 2013 Bobolo – Visit <a href="http://www.blissengine.org">blissengine.org</a> for more information</p>
</div>