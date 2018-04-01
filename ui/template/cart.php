<div class="content">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="<?php echo $SCHEME.'://'.$HOST; ?>">Home</a></li>
			<?php if (isset($_POST['sef_url'])){
				?>
				<li>
					<a href="/proizvod/<?php echo htmlentities($_POST['sef_url'], ENT_COMPAT, 'utf-8');?>"><?php echo htmlentities($_POST['product_name'], ENT_COMPAT, 'utf-8');?></a>
				</li>
				<?php
			} ?>
			<li class="active">Korpa</li>
		</ol>
	</div>


	<div class="cart">
		<?php if (isset($alarm)) {?>
			<p class="alert"><?php echo $alarm;?></p>
    	<?php } ?>
		<div class="table-r">
			<table>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Total</th>
					<th></th>
				</tr>
				<?php
				$zbir=0;
				foreach ($p_cart as $pro) {
					$zbir += str_replace('.', '',$pro['product_price']) * $pro['qty'];
					?>
					<tr>
						<td><?php echo $pro['product_name'];?></td>
						<td><?php echo $pro['product_price'];?></td>
						<td><?php echo $pro['qty'];?></td>
						<td><?php echo number_format((str_replace('.', '',$pro['product_price']) * $pro['qty']), 2, ',', '.');?></td>
						<td><a href="/brisi-stavku/<?php echo $pro['_id'];?>">Ukloni</a></td>
					</tr>
				<?php } ?>
					<tr>
						<td></td>
						<td></td>
						<td>Zbir:</td>
						<td><?php echo number_format($zbir, 2, ',', '.');?></td>
						<td></td>
					</tr>
			</table>
		</div>
		<div class="heading">
			<h2>Za zaključivanje kupovine popunite sledeća polja:</h2>
			<hr>
		</div>
		<form action="/slanje-narudzbine" method="post" class="cart-form">
			<label>Ime:
			<input type="text" name="name" value="<?php if (isset($_POST['name'])){echo htmlentities($_POST['name'], ENT_COMPAT, 'utf-8');} ?>" required></label>
			<label>Telefon:
			<input type="text" name="tel" value="<?php if (isset($_POST['tel'])){echo htmlentities($_POST['tel'], ENT_COMPAT, 'utf-8');} ?>" required></label>
			<label>E-mail:
			<input type="text" name="email" value="<?php if (isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_COMPAT, 'utf-8');} ?>" required></label>
			<label>Adresa:
			<input type="text" name="adress" value="<?php if (isset($_POST['adress'])){echo htmlentities($_POST['adress'], ENT_COMPAT, 'utf-8');} ?>" required></label>
			<label>Grad:
			<input type="text" name="city" value="<?php if (isset($_POST['city'])){echo htmlentities($_POST['city'], ENT_COMPAT, 'utf-8');} ?>" required></label>
			<label>Napomena:
			<textarea name="note"><?php if (isset($_POST['note'])){echo htmlentities($_POST['note'], ENT_COMPAT, 'utf-8');} ?></textarea></label>
			<label>Sigurnosni kod 
				<img src="<?php echo $captcha;?>" title="captcha">
				<input type="text" placeholder="Ukucajte simbole sa slike" required name="captcha">
			</label>
			<label>
				<button class="button-primary" type="submit"><i class="material-icons">shopping_cart</i> Prosledite narudžbinu</button>
			</label>
		</form>
	</div>

</div>
