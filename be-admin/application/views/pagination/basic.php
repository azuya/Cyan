<div class="pagination pagination-right">

	<ul>
		
		<?php if ($first_page !== FALSE): ?>
		<li><a href="<?php echo HTML::chars($page->url($first_page)) ?>" rel="first">«</a></li>
		<?php else: ?>
		<li><a href="<?php echo HTML::chars($page->url($first_page)) ?>" rel="first">«</a></li>
		<?php endif ?>
		
		<?php if ($previous_page !== FALSE): ?>
		<li><a href="<?php echo HTML::chars($page->url($previous_page)) ?>" rel="prev">‹</a></li>
		<?php else: ?>
		<li class="disabled"><a href="#" rel="prev">‹</a></li>
		<?php endif ?>
		
		<?php for ($i = 1; $i <= $total_pages; $i++): ?>
		
			<?php if ($i == $current_page): ?>
			<li class="active"><a href="#"><?php echo $i ?></a></li>
			<?php else: ?>
			<li><a href="<?php echo HTML::chars($page->url($i)) ?>"><?php echo $i ?></a></li>
			<?php endif ?>
		
		<?php endfor ?>
		
		<?php if ($next_page !== FALSE): ?>
		<li><a href="<?php echo HTML::chars($page->url($next_page)) ?>" rel="next">›</a></li>
		<?php else: ?>
		<li class="disabled"><a href="<?php echo HTML::chars($page->url($next_page)) ?>" rel="next">›</a></li>
		<?php endif ?>
		
		<?php if ($last_page !== FALSE): ?>
		<li><a href="<?php echo HTML::chars($page->url($last_page)) ?>" rel="last">»</a></li>
		<?php else: ?>
		<li class="disabled"><a href="<?php echo HTML::chars($page->url($last_page)) ?>" rel="last">»</a></li>
		<?php endif ?>
	
	</ul>
</div>