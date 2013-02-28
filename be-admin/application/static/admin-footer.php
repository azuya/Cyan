<?php
// Load the user information
$user = Auth::instance()->get_user();
?>

<? if ($user) : ?>
<!--
<footer class="admin">
	<div class="inner">

		<p class="muted credit">Copyright &copy; <?php echo $site["cyan"]["copyright"]; ?> by <a href="http://www.cyancms.com">Cyan</a>.</p>

	<div>
</footer>
-->

<!-- Scroll to top -->
<button id="scroll-to-top" class="btn btn-primary offscreen" type="button">&uarr;</button>
<? endif; ?>