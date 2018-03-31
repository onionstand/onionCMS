<div class="content">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="<?php echo $SCHEME.'://'.$HOST; ?>">Početna</a></li>
			<li class="active">Kontakt</li>
		</ol>
	</div>
	<div class="heading">
		<h2>Kontaktirajte nas</h2>
		<hr>
	</div>
	<?php if (isset($alarm_ok) && $alarm_ok) {
		?>
		<div class="contact-alarm">
			<p><i class='material-icons'>done</i></p>
			<p><?php echo $alarm_ok;?></p>
			<p></p>
			<p><a href="/" class="button"><i class="material-icons">home</i></a></p>
		</div>
		<?php
	}
	else { ?>
	<div class="contact-w">	
		<form action="" method="post" class="cart-form-wrap" >
			<?php if (isset($alarm) && $alarm) {
				?>
				<div class="contact-alarm">
					<p><i class='material-icons'>warning</i></p>
					<p><?php echo $alarm;?></p>
				</div>
				<?php
			}
			?>
			<div class="cart-form">
				<label>Ime:
					<input type="text" name="name" class="contact-inp" value="<?php if (isset($_POST['name'])){echo htmlentities($_POST['name'], ENT_COMPAT, 'utf-8');} ?>" required>
				</label>
				<label>Telefon:
					<input type="text" name="tel" class="contact-inp" value="<?php if (isset($_POST['tel'])){echo htmlentities($_POST['tel'], ENT_COMPAT, 'utf-8');} ?>" required>
				</label>
			</div>
				<label>E-mail:
					<input type="text" name="email" class="contact-inp" value="<?php if (isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_COMPAT, 'utf-8');} ?>" required>
				</label>
			
				<label>Poruka:
					<textarea name="note" class="contact-inp"><?php if (isset($_POST['note'])){echo htmlentities($_POST['note'], ENT_COMPAT, 'utf-8');} ?></textarea>
				</label>
				<label>Sigurnosni kod 
					<img src="<?php echo $captcha;?>" title="captcha">
					<input type="text" class="contact-inp" placeholder="Ukucajte simbole sa slike" required name="captcha">
				</label>
				<label>
					<button class="button-primary contact-inp" type="submit"><i class="material-icons">send</i> Prosledite</button>
				</label>
			
		</form>
		<div>
			<div class="contact-info">
				<h5>Enef Centar</h5>
				<p>GEZE distributer.</p>
				<hr>
				<h6>Adresa:</h6>
				<p>Tadeuša Košćuška 24, 11000 Beograd</p>
				<h6>Telefon:</h6>
				<p>+381 (0)11 263 77 77<br>+381 (0)64 881 00 41</p>
				<h6>Email:</h6>
				<p>office@enef.rs</p>
			</div>
		</div>
	</div>
	<?php } ?>
</div>