<div class="content">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="<?php echo $SCHEME.'://'.$HOST; ?>">Početna</a></li>
			<li class="active">Pretraga</li>
		</ol>
	</div>
	<?php
	if ($alarm) {
		echo "<p class='alert'>" . $alarm . "</p>";
	}
	?>
	<div class="products">
		<?php
		if ($serch_result) {
			foreach ($serch_result as $pro) { ?>
				<div class="product">
					<a href="/<?php echo $pro['sef_prefiks'];?>/<?php echo $pro['sef_s'];?>"><img class="img-responsive" src="<?php echo dirname($pro['image_s']) .'/tn-'. basename($pro['image_s']);?>" alt="<?php echo $pro['name_s'];?>"></a>
					<span class="tag"><?php echo $pro['keywords_s'];?></span>
					<a href="/<?php echo $pro['sef_prefiks'];?>/<?php echo $pro['sef_s'];?>" class="tittle"><?php echo $pro['name_s'];?></a> 
					<div class="price-row">
						<!--<div class="price">$35055.00 <span>$200.00</span></div>-->
						<div class="price"><?php echo number_format($pro['price_s'], 2, ',', '.');?> RSD</div>
						<a href="/<?php echo $pro['sef_prefiks'];?>/<?php echo $pro['sef_s'];?>" class="ask-btn"><i class="material-icons">details</i></a>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>