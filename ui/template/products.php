<div class="content">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="<?php echo $SCHEME.'://'.$HOST; ?>">Početna</a></li>
			<li class="active"><?php echo $head_title;?></li>
		</ol>
	</div>


	<div class="products">
		<?php
		foreach ($t_products['subset'] as $pro) { ?>
			<div class="product">
				<a href="/proizvod/<?php echo $pro['sef_url'];?>"><img class="img-responsive" src="<?php echo dirname($pro['image']) .'/tn-'. basename($pro['image']);?>" alt="<?php echo $pro['name'];?>"></a>
				<span class="tag"><?php echo $pro['keywords'];?></span>
				<a href="/proizvod/<?php echo $pro['sef_url'];?>" class="tittle"><?php echo $pro['name'];?></a> 
				<div class="price-row">
					<!--<div class="price">$35055.00 <span>$200.00</span></div>-->
					<div class="price"><?php echo number_format($pro['price'], 2, ',', '.');?> RSD</div>
					<a href="/proizvod/<?php echo $pro['sef_url'];?>" class="ask-btn"><i class="material-icons">details</i></a>
				</div>
			</div>
		<?php } ?>

	</div>
	<?php echo View::instance()->raw($paginate_browse_pos);?>

</div>