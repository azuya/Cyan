<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<div>
    <h2><?php echo $content->title; ?></h2>
    <pre><?php echo $content->content; ?></pre>
    <?php echo HTML::anchor("content/edit/".$content->id, "Edit"); ?>
    <?php echo HTML::anchor("content/delete/".$content->id, "Delete"); ?>
</div>

<div id="comments">
	<?php foreach ($content->comments->find_all() as $comment) : ?>
		<!-- showing a single comment -->
		<?php echo View::factory('comment/single', array('comment'=>$comment)); ?>
	<?php endforeach; ?>
</div>

<!-- this practice should be preferable, instead of cluttering a single article page with everything -->
<?php echo View::factory('comment/edit', array('comment' => new Model_Comment(), 'content' => $content )); ?>
