<ul class="pagination" role="menubar" aria-label="Pagination">
	<?php if ($pos_p!=0) {?>
		<li class="arrow">
			<a href="0">&laquo; First</a>
		</li>
		<li class="arrow">
			<a href="<?php echo $pos_p-1;?>">&laquo; Previous</a>
		</li>
	<?php }
	else{ ?>
		<li class="arrow unavailable" aria-disabled="true">
			<a href="">&laquo; First</a>
		</li>
		<li class="arrow unavailable" aria-disabled="true">
			<a href="">&laquo; Previous</a>
		</li>
	<?php }	?>
	

	<li class="current">
		<a href=""><?php echo $pos_p;?></a>
	</li>


	<?php if ($pos_p < $count_p-1) {?>
		<li class="arrow">
			<a href="<?php echo $pos_p+1;?>">Next &raquo;</a>
		</li>
		<li class="arrow">
			<a href="<?php echo $count_p-1;?>"> Last &raquo;</a>
		</li>
	<?php }
	else{ ?>
		<li class="arrow unavailable" aria-disabled="true">
			<a href="">Next &raquo;</a>
		</li>
		<li class="arrow unavailable" aria-disabled="true">
			<a href=""> Last &raquo;</a>
		</li>
	<?php }	?>
</ul>