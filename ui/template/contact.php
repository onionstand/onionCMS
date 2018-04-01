<div class="content">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="<?php echo $SCHEME.'://'.$HOST; ?>">Home</a></li>
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
				<label>Name:
					<input type="text" name="name" class="contact-inp" value="<?php if (isset($_POST['name'])){echo htmlentities($_POST['name'], ENT_COMPAT, 'utf-8');} ?>" required>
				</label>
				<label>Phone:
					<input type="text" name="tel" class="contact-inp" value="<?php if (isset($_POST['tel'])){echo htmlentities($_POST['tel'], ENT_COMPAT, 'utf-8');} ?>" required>
				</label>
			</div>
				<label>E-mail:
					<input type="text" name="email" class="contact-inp" value="<?php if (isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_COMPAT, 'utf-8');} ?>" required>
				</label>
			
				<label>Message:
					<textarea name="note" class="contact-inp"><?php if (isset($_POST['note'])){echo htmlentities($_POST['note'], ENT_COMPAT, 'utf-8');} ?></textarea>
				</label>
				<label>Captcha code 
					<img src="<?php echo $captcha;?>" title="captcha">
					<input type="text" class="contact-inp" required name="captcha">
				</label>
				<label>
					<button class="button-primary contact-inp" type="submit"><i class="material-icons">send</i> Send</button>
				</label>
			
		</form>
		<div>
			<div class="contact-info">
				<h5>Company</h5>
				<p>Work hard</p>
				<hr>
				<h6>Adresa:</h6>
				<p>Moon street</p>
				<h6>Phone:</h6>
				<p>012 345 678<br>012 345 678</p>
				<h6>Email:</h6>
				<p>office@company.com</p>
			</div>
		</div>
	</div>
	<?php } ?>
</div>