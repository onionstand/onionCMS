<form method="post" action="/administration/add-product" id="form_add_product" class="cont_wrapper">
	<div class="row">
		<?php if (isset($alarm)){ ?>
			<div class="c-12">
				 <p class="allert"><?php echo $alarm; ?></p>
			</div>
		<?php } ?>
		<div class="c-12">
			<h3>Add Product</h3>
		</div>
	</div>
	<div class="row">
		<div class="c-6">
			<label>Name</label>
			<input
				class="u-full-width"
				type="text"
				id="name"
				name="name" 
				onchange="genSEF(this,document.forms['form_add_product'].sef_url)"
				onkeyup="genSEF(this,document.forms['form_add_product'].sef_url)" 
				required
				value="<?php if (isset($_POST['name'])){echo htmlentities($_POST['name'], ENT_COMPAT, 'utf-8');} ?>"
			/>
		</div>
		<div class="c-6">
			<label>SEF title</label>
			<input
				type="text"
				id="sef_url"
				name="sef_url"
				required
				value="<?php if (isset($_POST['sef_url'])){echo htmlentities($_POST['sef_url'], ENT_COMPAT, 'utf-8');} ?>"
				class="u-full-width" />
		</div>

		<div class="c-12">
			<label>Description</label>
			<textarea  name="description" class="tinymce_textarea" placeholder="Description" ><?php if (isset($_POST['description'])){echo htmlentities($_POST['description'], ENT_COMPAT, 'utf-8');} ?></textarea>
		</div>
	
		<div class="c-6">
			<label>Meta description</label>
			<input type="text" name="meta_desc" required class="u-full-width" value="<?php if (isset($_POST['meta_desc'])){echo htmlentities($_POST['meta_desc'], ENT_COMPAT, 'utf-8');} ?>" />
		</div>
		<div class="c-6">
			<label>Keywords</label>
			<input type="text" name="keywords" class="u-full-width" required value="<?php if (isset($_POST['keywords'])){echo htmlentities($_POST['keywords'], ENT_COMPAT, 'utf-8');} ?>" />
		</div>

		<div class="c-6">
			<label>Category</label>
			<select name="category">
				<?php 
				if (isset($_POST['category'])){
					$cat_id=$_POST['category'];
				}
				else{
					$cat_id=0;
				}
				foreach ($categories as $cat) { ?>
					<option value="<?php echo $cat['id'];?>" 
					<?php if($cat['id']==$cat_id){echo "selected";}?>
					>
					<?php echo $cat['name'];?></option>
				<?php }?>
			</select>
		</div>
		<div class="c-6">
			<label>Price</label>
			<input type="text" name="price" class="u-full-width" required value="<?php if (isset($_POST['price'])){echo htmlentities($_POST['price'], ENT_COMPAT, 'utf-8');} ?>" />
		</div>

		<div class="c-6">
			<label>Main Image</label>
			<input type="text" name="image" id="image_main" value="<?php if (isset($_POST['image'])){echo htmlentities($_POST['image'], ENT_COMPAT, 'utf-8');} ?>" required/>
			<a  class="myTooltip button" title="#elf">Choose image</a>
			<div id="elf"><div id="elfinder" style="width: 800px; height: 500px;"></div></div>
			
		</div>
		<div class="c-3">
		  	<label>Show on home?</label>
			<label for="onhome"><input type="radio" name="onhome" value="1" id="onhome" <?php if (isset($_POST['onhome'])){if ($_POST['onhome']==1){echo "checked";}} ?>><span class="label-body">Yes</span></label>
		 	<label for="noonhome"><input type="radio" name="onhome" value="0" id="noonhome"><span class="label-body">No</span></label>
		</div>
		<div class="c-3">
		  	<label>Visible?</label>
			<label for="visible"><input type="radio" name="visible" value="1" id="visible" <?php if (isset($_POST['visible'])){if ($_POST['visible']==1){echo "checked";}} ?>><span class="label-body">Yes</span></label>
		 	<label for="hidden"><input type="radio" name="visible" value="0" id="hidden"><span class="label-body">No</span></label>
		</div>
		<div class="c-6">
			<label>Order</label>
			<input type="text" name="p_order" class="u-full-width" required value="<?php if (isset($_POST['p_order'])){echo htmlentities($_POST['p_order'], ENT_COMPAT, 'utf-8');} ?>" />
		</div>
	</div>
	
	
	
	<div class="row">
		<div class="c-12">
			<button class="button-primary" type="submit">Save</button>
			<a href="/administration/list-products" class="button">Cancel</a>
		</div>
	</div>
	<?php if (isset($_POST['id'])){
		?>
		<input type="hidden" name="id" value="<?php echo $_POST["id"];?>"/>
		<?php
	} ?>
</form>