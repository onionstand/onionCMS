<div class="cont_wrapper">
<div class="row">
	<div class="c-12">
		<h3>Users</h3>
	</div>
	<?php if (isset($alarm)){ ?>
		<div class="c-12">
			<p><?php echo $alarm; ?></p>
		</div>
	<?php } ?>

	<div class="c-12">
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
						<td><?php echo $per_user['level'];?></td>
						<td>
							<form method="post" action="/administration/edit_user_details" style="margin:0;">
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
		<div class="c-6">
			<label>Name <small>required</small>
				<input type="text"  placeholder="Username" name="name" required/>
	   		</label>
		</div>
		<div class="c-6">
			<label>E-mail <small>required</small>
				<input type="text"  placeholder="E-mail" name="email" required/>
	   		</label>
		</div>
		<div class="c-6">
			<label>User Level <small>required</small>
				<input type="text"  placeholder="User Level" name="level" required/>
	   		</label>
		</div>
		<div class="c-6">
			<label>Password <small>required</small>
				<input type="text" placeholder="Password"  name="password" required />
	   		</label>
		</div>
		<div class="c-6">
			<button type="submit">Submit</button>
		</div>
	</form>
</div>
</div>