<div class="cont_wrapper">
<div class="row">
	<div class="c-12">
		<h3>Categories</h3>
	</div>
	<div class="c-6">
		<form method="post" action="/administration/list-categories">
			<input type="text" name="search" required/>
			<input type="submit" value="Search" class="button">
		</form>
	</div>
	<div class="c-6">
		<a href="/administration/add-category" class="button">Add category</a>
	</div>

	<div class="c-12">
		<form method="post" action="add_news" data-abide>
			<table>
				<thead>
					<tr>
						<th>Delete</th>
						<th>ID</th>
						<th>Name</a></th>
						<th>URL</th>
						<th>Description</th>
						<th>Keywords</th>
						<th>Order</th>
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
					foreach ($for_foreach as $cat) { ?>
						<tr>
							<td>
								<a href="/administration/delete-category/<?php echo $cat['id']; ?>" onclick="return confirm_delete(this);">Delete</a>
							</td>
							<td><?php echo $cat['id']; ?></td>
							<td><?php echo $cat['name']; ?></td>
							<td><small><?php echo $cat['sef_url']; ?></small></td>
							<td><?php echo $cat['description']; ?></td>
							<td><?php echo $cat['keywords']; ?></td>
							<td><?php echo $cat['c_order']; ?></td>
							<td><?php if($cat['visible']==1){echo "Yes";} else {echo "No";} ?></td>
							<td>
								<a href="/administration/edit-category/<?php echo $cat['id'];?>">Edit</a>
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