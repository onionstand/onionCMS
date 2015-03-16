
<?php foreach ($news_paginate['subset'] as $news_page) { ?>
<article>
	<h3><a href="#"><?php echo $news_page['title'];?></a></h3>
	<h6>Written by <a href="#"><?php echo $news_page['author'];?></a> on <?php echo $news_page['date'];?></h6>
	<?php echo View::instance()->raw($news_page['content']);?>
</article>
<hr/>
<?php } ?>