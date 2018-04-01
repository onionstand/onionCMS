<div class="cont_wrapper">
<div class="row">
	<div class="c-12">
		<h3>Change Password</h3>
	</div>
</div>
<form data-abide method="post" action="/administration/edit_user_password_save" class="row">
	<div class="c-12">
		<label>New password <small>required</small>
			<input type="text" name="password" value="" required />
			<input type="hidden" name="id" value="<?php echo $id_user;?>"/>
   		</label>	
	</div>
	<div class="c-12">
		<button type="submit">Submit</button>
	</div>
</form>
</div>