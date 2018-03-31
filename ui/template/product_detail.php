<div class="content">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="<?php echo $SCHEME.'://'.$HOST; ?>">Početna</a></li>
			<li><a href="/kategorija/<?php echo $category_sef;?>"><?php echo $category_name;?></a></li>
			<li class="active"><?php echo $t_product[0]['name'];?></li>
		</ol>
	</div>


	<div class="prod-det-head">
		<div class="prod-images prod-gallery">
			<a class="image-det-main" href="<?php echo $t_product[0]['image'];?>"><img src="<?php echo $t_product[0]['image'];?>" alt="<?php echo $t_product[0]['name'];?>"></a>
			<div class="small-images">
				<?php
				foreach ($p_gallery as $image_g) {
					?>
					<a href="<?php echo $image_g['image'];?>" class="small-image"><img src="<?php echo dirname($image_g['image']) .'/tn-'. basename($image_g['image']);?>"></a>
					<?php
				}
				?>
			</div>
		</div>
		<div>
			<form id="formcart" action="/korpa" method="post">
				<span class="tags-det"><?php echo $t_product[0]['keywords'];?></span>
				<h5><?php echo $t_product[0]['name'];?></h5>
				<p class="price-det" >Cena: <span id="price-det"><?php echo number_format($t_product[0]['price'], 2, ',', '.');?></span> RSD</p>
				
				<?php
				foreach ($options as $o) {
					?>
					<p><strong><?php echo $o['name_option'];?></strong></p>
					<?php
					foreach ($fields as $key_fields => $value_fields) {
						if ($o['id']==$value_fields['id_opt']) {
							?>
							<label>
								<input type="<?php echo $o['type'];?>" name="opt-<?php echo $o['id'];?>" value="<?php echo $value_fields['name_field'];?> (<?php echo $value_fields['price'];?>)" onclick="cart()"> 
								<?php echo $value_fields['name_field'];?> (+ <?php echo number_format($value_fields['price'], 2, ',', '.');?>)
							</label>
							<?php
						}
					}
				}
				?>
				<div><label>Količina: <input type="text" name="qty" value="1"></label></div>
				<input type="hidden" id="product_name" name="product_name" value="<?php echo $t_product[0]['name'];?>">
				<input type="hidden" id="product_price" name="product_price" value="<?php echo number_format($t_product[0]['price'], 2, ',', '.');?>">
				<input type="hidden" id="sef_url" name="sef_url" value="<?php echo $t_product[0]['sef_url'];?>">
				<button type="submit"><i class="material-icons">add_shopping_cart</i> Dodaj u korpu</button>
			</form>
		</div>
	</div>

	<div class="prod-det-desc">
		<?php echo View::instance()->raw($t_product[0]['description']);?>
	</div>

</div>

<script>
function cart() {
    var options_p = document.forms.namedItem("formcart");
    var product = "<?php echo $t_product[0]['name'];?>";
    var price = Number("<?php echo $t_product[0]['price'];?>");
    var txt = "";
    var i;
    for (i = 0; i < options_p.length; i++) {
        if (options_p[i].checked) {
            txt = txt + " + " + options_p[i].value;
            price = Number(price) + Number(options_p[i].value.match(/\(([^)]+)\)/)[1]);
        }
    }
    
    price=price.formatMoney(2, ',', '.');
    document.getElementById("product_name").value = product + txt;
    document.getElementById("product_price").value = price;
    document.getElementById("price-det").innerHTML = price;
}

Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
</script>