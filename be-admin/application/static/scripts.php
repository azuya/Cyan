<script src="<?php echo URL::site(null, true, false); ?>be-admin/assets/js/be-scripts.min.js"></script>
<?php
// Load the user information
$user = Auth::instance()->get_user();
?>

<? if ($user) : ?>
	<script src="<?php echo URL::site(null, true, false); ?>be-admin/assets/js/be-admin.min.js"></script>
	<script src="<?php echo URL::site(null, true, false); ?>be-admin/vendor/ckeditor/ckeditor.js"></script>
<? endif; ?>