<div class="row">
	<?php if ($alarm){ ?>
		<div class="small-12 medium-4 large-4 small-centered medium-centered large-centered columns">
			<div data-alert class="alert-box alert">
			 <?php echo $alarm; ?>
			  <a href="#" class="close">&times;</a>
			</div>
		</div>
	<?php } ?>
	<div class="small-12 medium-4 large-4 small-centered medium-centered large-centered columns">
		<fieldset>
			<legend>Login:</legend>
			<form data-abide method="post">
				<div class="small-12 columns">
					<label>
						Name <small>required</small>
						<input type="text" required pattern="[a-zA-Z]+" name="name">
					</label>
					<small class="error">Name is requred.</small>
				</div>
				<div class="small-12 columns">
					<label>Password <small>required</small>
						<input type="password" id="password" required pattern="[a-zA-Z]+" name="password">
					</label>
					<small class="error">Password is requred.</small>
				</div>
				<div class="small-12 columns">
					<img src="<?php echo $captcha;?>" title="captcha" />
				</div>
				<div class="small-12 columns">
					<label>Captcha <small>required</small>
						<input type="text" id="captcha" required pattern="[a-zA-Z]+" name="captcha">
					</label>
					<small class="error">Captcha is requred.</small>
				</div>
				<div class="small-12 columns">
					<button type="submit">Submit</button>
				</div>
			</form>
		</fieldset>
	</div>
</div>