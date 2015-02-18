<?php include "menu_admin.php";?>
<div class="row">
	<div class="small-12 large-12 columns">
		<h3>Users</h3>
	</div>
	<?php if (isset($alarm)){ ?>
		<div class="small-12 medium-4 large-4 small-centered medium-centered large-centered columns">
			<div data-alert class="alert-box alert">
			 <?php echo $alarm; ?>
			  <a href="#" class="close">&times;</a>
			</div>
		</div>
	<?php } ?>

	<div class="small-12 large-12 columns">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>E-mail</th>
					<th>User Level</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($user as $per_user) { ?>
					<tr>
						<td><?php echo $per_user['id'];?></td>
						<td><?php echo $per_user['name'];?></td>
						<td><?php echo $per_user['email'];?></td>
						<td><?php echo $per_user['user_level'];?></td>
						<td>
							<form method="post" action="administration/edit_user_details" style="margin:0;">
								<input type="hidden"  name="id" value="<?php echo $per_user['id'];?>"/>
								<input type="hidden"  name="name" value="<?php echo $per_user['name'];?>"/>
								<button type="submit" class="button tiny" style="margin:0;">Edit</button>
							</form>
						</td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>

	<form data-abide method="post">
		<div class="small-12 large-6 columns">
			<label>Name <small>required</small>
				<input type="text"  placeholder="Username" name="name" required pattern="[a-zA-Z]+"/>
	   		</label>
	   		<small class="error">Name is required.</small>	
		</div>
		<div class="small-12 large-6 columns">
			<label>E-mail <small>required</small>
				<input type="text"  placeholder="E-mail" name="email" required pattern="email"/>
	   		</label>
	   		<small class="error">E-mail is required.</small>	
		</div>
		<div class="small-12 large-6 columns">
			<label>User Level <small>required</small>
				<input type="text"  placeholder="User Level" name="user_level" required pattern="number"/>
	   		</label>
	   		<small class="error">User Level is required.</small>	
		</div>
		<div class="small-12 large-6 columns">
			<label>Password <small>required</small>
				<input type="text" placeholder="Password"  name="password" required />
	   		</label>
	   		<small class="error">Password is required.</small>	
		</div>
		<div class="small-12 large-12 columns">
			<button type="submit">Submit</button>
		</div>
	</form>
</div>