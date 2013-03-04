<script src="<?php echo URL::site(null, true, false); ?>cyan/assets/js/cyan-scripts.min.js"></script>
<?php
// Load the user information
$user = Auth::instance()->get_user();

if ($user) : ?>
	<script src="<?php echo URL::site(null, true, false); ?>cyan/assets/js/cyan-admin.min.js"></script>
	<script src="<?php echo URL::site(null, true, false); ?>cyan/vendor/ckeditor/ckeditor.js"></script>
<? endif; ?>