<?php
// Load the user information
$user = Auth::instance()->get_user();

if ($user) {
?>
<script src="<?php echo URL::site(null, true, false); ?>be-admin/js/bootstrap.min.js"></script>
<script src="<?php echo URL::site(null, true, false); ?>be-admin/js/be-admin.js"></script>
<script src="<?php echo URL::site(null, true, false); ?>be-admin/addons/ckeditor/ckeditor.js"></script>
<?php
}
?>