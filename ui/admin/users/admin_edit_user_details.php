<div class="cont_wrapper">
<div class="row">
	<div class="c-12">
		<h3>Change Password</h3>
	</div>
</div>
<form method="post" action="/administration/edit_user_details_save" class="row">
	<div class="c-6">
		<a href="/administration/edit_user_change_password/<?php echo $_POST["id"];?>">Promeni sifru</a>
	</div>
	<div class="c-6">
		<label>Username <small>required</small>
			<input type="text" name="name" value="<?php echo $_POST["name"];?>" required />
			<input type="hidden" name="id" value="<?php echo $_POST["id"];?>"/>
   		</label>	
	</div>
	<div class="c-6">
		<label>E-mail <small>required</small>
			<input type="text" name="email" value="<?php echo $_POST["email"];?>" required/>
   		</label>	
	</div>
	<div class="c-6">
		<label>User level <small>required</small>
			<input type="text" name="level" value="<?php echo $_POST["level"];?>" required/>
   		</label>	
	</div>
	<div class="c-6">
		<button type="submit">Submit</button>
	</div>
</form>
</div>
