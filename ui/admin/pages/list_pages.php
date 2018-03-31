<div class="cont_wrapper">
<div class="row">
	<div class="c-12">
		<h3>Pages</h3>
	</div>
	<div class="c-6">
		<form method="post" action="/administration/list-pages">
			<input type="text" name="search" required/>
			<input type="submit" value="Search" class="button">
		</form>
	</div>
	<div class="c-6">
		<a href="/administration/add-page" class="button">Add page</a>
	</div>

	<div class="c-12">
		<form method="post" action="add_page">
			<table>
				<thead>
					<tr>
						<th>Delete</th>
						<th>ID</th>
						<th>Title</th>
						<th>URL</th>
						<th>Image</th>				
						<th>Visible</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($search)) {
						$for_foreach=$search;
						$pag=NULL;
					}
					else{
						$for_foreach=$paginate['subset'];
						$pag = View::instance()->raw($paginate_browse_pos);
					}
					foreach ($for_foreach as $p) { ?>
						<tr>
							<td>
								<a href="/administration/delete-page/<?php echo $p['id']; ?>" onclick="return confirm_delete(this);">Delete</a>
							</td>
							<td><?php echo $p['id']; ?></td>
							<td><?php echo $p['title']; ?></td>
							<td><small><?php echo $p['sef_url']; ?></small></td>
							<td><img src="<?php echo $p['image_main']; ?>" style="width:70px;"></td>
							<td><?php if($p['visible']==1){echo "Yes";} else {echo "No";} ?></td>
							<td>
								<a href="/administration/edit-page/<?php echo $p['id'];?>">Edit</a>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</form>
		<?php echo $pag;?>
	</div>
</div>
</div>