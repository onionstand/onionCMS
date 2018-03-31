<div class="content">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="<?php echo $SCHEME.'://'.$HOST; ?>">Početna</a></li>
			<li class="active"><?php echo $page_cont['0']['title'];?></li>
		</ol>
	</div>
	<div class="heading">
		<h2><?php echo $page_cont['0']['title'];?></h2>
		<hr>
	</div>
	<div>
		<?php echo View::instance()->raw($page_cont['0']['content']);?>
	</div>
</div>