<div class="cont_wrapper">
<div class="row">
	<div class="c-12">
		<h3>Products</h3>
	</div>
	<div class="c-6">
		<form method="post" action="/administration/list-products">
			<input type="text" name="search" required/>
			<input type="submit" value="Search" class="button">
		</form>
	</div>
	<div class="c-6">
		<a href="/administration/add-product" class="button">Add product</a>
	</div>

	<div class="c-12">
		<form method="post" action="add_news">
			<table>
				<thead>
					<tr>
						<th>Delete</th>
						<th>ID</th>
						<th>Name</th>
						<th>URL</th>
						<th>Image</th>
						<th>Price</th>
						<th>Category</th>
						<th>Order</th>
						<th>Visible</th>
						<th>On home</th>
						<th>Gallery</th>
						<th>Options</th>
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
						$for_foreach=$product_list;
						$pag=View::instance()->raw($paginate_browse_pos);
					}
					foreach ($for_foreach as $prod) { ?>
						<tr>
							<td>
								<a href="/administration/delete-product/<?php echo $prod['id']; ?>" onclick="return confirm_delete(this);">Delete</a>
							</td>
							<td><?php echo $prod['id']; ?></td>
							<td><?php echo $prod['name']; ?></td>
							<td><small><?php echo $prod['sef_url']; ?></small></td>
							<td><img src="<?php echo $prod['image']; ?>" style="width:70px;"></td>
							<td><?php echo $prod['price']; ?></td>
							<td><?php echo $prod['cat_name']; ?></td>
							<td><?php echo $prod['p_order']; ?></td>
							<td><?php if($prod['visible']==1){echo "Yes";} else {echo "No";} ?></td>
							<td><?php if($prod['onhome']==1){echo "Yes";} else {echo "No";} ?></td>
							<td>
								<a href="/administration/product-gallery/<?php echo $prod['id'];?>">Gallery</a>
							</td>
							
							<td>
								<a href="/administration/product-options/<?php echo $prod['id'];?>">Options</a>
							</td>
							
							<td>
								<a href="/administration/edit-product/<?php echo $prod['id'];?>">Edit</a>
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