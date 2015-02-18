<?php include "menu_admin.php";?>
<div class="row">
	<div class="small-12 large-12 columns">
		<h3>Promeni sifru</h3>
	</div>
	<form data-abide method="post" action="administration/edit_user_password_save" >
		<div class="small-12 large-6 columns">
			<label>New password <small>required</small>
				<input type="text" name="password" value="" required />
				<input type="hidden" name="name" value="<?php echo $_POST["name"];?>"/>
				<input type="hidden" name="id" value="<?php echo $_POST["id"];?>"/>
	   		</label>	
		</div>
		<div class="small-12 large-12 columns">
			<button type="submit">Submit</button>
		</div>
	</form>
</div>