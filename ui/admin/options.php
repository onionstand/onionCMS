<div class="cont_wrapper">
	<div class="row">
		<?php if (isset($alarm)){ ?>
			<div class="c-12">
				 <p class="allert"><?php echo $alarm; ?></p>
			</div>
		<?php } ?>
		<div class="c-12">
			<h3>Options</h3>
		</div>
	</div>
	<form action="/administration/product-options" method="post" class="row">
		<div class="c-3">
			<label>Option name</label>
			<input type="text" name="name_option" class="u-full-width" required/>
		</div>
		<div class="c-3">
			<label>Type</label>
			<select name="type" class="u-full-width" required>
				<option value="checkbox">checkbox</option>
				<option value="radio">radio</option>
			</select>
		</div>
		<div class="c-3">
			<label>Order</label>
			<input type="text" name="position" class="u-full-width" required/>
			<input type="hidden" name="product_id" value="<?php echo $id_products;?>"/>
		</div>
		<div class="c-3">
			<button class="button-primary" type="submit">Save</button>
		</div>
	</form>



	<div class="row">
		<?php
		foreach ($options as $o) {
			?>
			<div class="c-4">
				<p><?php echo $o['name_option'];?> | <a href="/administration/delete-product-options/<?php echo $o['id'];?>/<?php echo $id_products;?>">Delete</a></p>
				<table>
					
				<?php
				if ($fields) {
					foreach ($fields as $key_fields => $value_fields) {
						if ($o['id']==$value_fields['id_opt']) {
							echo "<tr><td>".$value_fields['name_field'] . " </td><td> " . $value_fields['price'] . "</td><td> <a href='/administration/delete-product-options-field/".$value_fields['id']."/".$id_products."'>Delete</a> </td></tr>";
						}
					}
				}
				?>
				</table>
				<form action="/administration/product-options-field" method="post">
					<label>Name</label>
					<input type="hidden" name="id_opt" value="<?php echo $o['id'];?>"/>
					<input type="hidden" name="id_products" value="<?php echo $id_products;?>"/>
					<input type="text" name="name_field" class="u-full-width" required/>
					<label>Price</label>
					<input type="text" name="price" class="u-full-width" required/>
					<button class="button-primary" type="submit">Save</button>
				</form>
			</div>
			<?php
		}
		?>
		<div class="c-6">

		</div>
	</div>


</div>