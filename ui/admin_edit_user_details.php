<?php include "menu_admin.php";?>
<div class="row">
	<div class="small-12 large-12 columns">
		<h3>Promeni sifru</h3>
	</div>
	<form data-abide method="post" action="administration/edit_user_details_save" >
		<div class="small-12 large-6 columns">
			<a href="administration/edit_user_change_password/<?php echo $_POST["name"];?>/<?php echo $_POST["id"];?>">Change Password</a>
		</div>
		<div class="small-12 large-6 columns">
			<label>Username <small>required</small>
				<input type="text" name="name" value="<?php echo $_POST["name"];?>" required />
				<input type="hidden" name="id" value="<?php echo $_POST["id"];?>"/>
	   		</label>	
		</div>
		<div class="small-12 large-6 columns">
			<label>E-mail <small>required</small>
				<input type="text" name="email" value="<?php echo $_POST["email"];?>" required pattern="email"/>
	   		</label>	
		</div>
		<div class="small-12 large-6 columns">
			<label>User level <small>required</small>
				<input type="text" name="user_level" value="<?php echo $_POST["user_level"];?>" required pattern="number"/>
	   		</label>	
		</div>
		<div class="small-12 large-12 columns">
			<button type="submit">Submit</button>
		</div>
	</form>
</div>