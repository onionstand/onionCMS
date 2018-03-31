<div class="cont_wrapper">
	<div class="row">
		<?php if (isset($alarm)){ ?>
			<div class="c-12">
				 <p><?php echo $alarm; ?></p>
			</div>
		<?php } ?>
		<div class="c-12">
			<h3>Add Product</h3>
		</div>
	</div>
	<div class="row">
		<div class="c-12">
			<form method="post" action="/administration/gallery-sort-save">
				<input type="hidden" name="id_products" value="<?php echo $id_products;?>"/>
				<input type="hidden" name="position" id="position"/>
				<button class="button-primary" type="submit">Save order</button>
			</form>
			<div id="response"></div>
		</div>
	</div>

	<div class="row">
		<div class="c-12">
			<ul class="row" id="sortable">
				<?php foreach ($gallery as $image) { ?>
					<li class="c-2" id="<?php echo $image['id'];?>">
						<img src="<?php echo dirname($image['image']) .'/tn-'. basename($image['image']);?>"></img>
						<p><a href="/administration/delete-gallery-image/<?php echo $image['id'];?>/<?php echo $id_products;?>">Delete</a></p>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="row">
		<form method="post" class="c-12">
			<div class="row">
				<div class="c-6">
					<label>Name</label>
					<input type="text" name="name" required/>
				</div>
				<div class="c-6">
					<label>Image</label>
					<input type="text" name="image" id="image_main" value="<?php if (isset($_POST['image'])){echo htmlentities($_POST['image'], ENT_COMPAT, 'utf-8');} ?>" required/>
					<a  class="myTooltip button" title="#elf">Choose image</a>
					<div id="elf"><div id="elfinder" style="width: 800px; height: 500px;"></div></div>
				</div>
			</div>
			<div class="row">
				<div class="c-6">
					<input type="hidden" name="id_products" value="<?php echo $id_products;?>"/>
					<button type="submit">Save</button>
				</div>
				<div class="c-6">
					<a href="/administration/list-products" class="button">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
require(['jquery','jquery-ui'], function() {
	$(function () {
	    $("#sortable").sortable({
	        update: function (event, ui) {
	            var order = $(this).sortable('toArray');
	            $("#position").val(order);
	        }
	    }).disableSelection();
	    
	});
});

</script>