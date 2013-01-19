<?php
// Load the user information
$user = Auth::instance()->get_user();
?>

<? if ($user) : ?>
	<footer class="admin">

		<p class="muted credit">Copyright &copy; <?php echo $site["bliss_engine"]["copyright"]; ?> by <a href="http://www.blissengine.org">Bobolo</a>.</p>

		<!-- Scroll to top -->
		<button id="scroll-to-top" class="offscreen" type="button">&uarr;</button>

	</footer>
<? endif; ?>