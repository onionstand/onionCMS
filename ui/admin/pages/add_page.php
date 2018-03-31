<form action="/administration/add-page" method="post" id="form_add_p" class="cont_wrapper">
	<div class="row">
		<?php if (isset($alarm)){ ?>
			<div class="c-12">
				 <p class="allert"><?php echo $alarm; ?></p>
			</div>
		<?php } ?>
		<div class="c-12">
			<h3>Add Page</h3>
		</div>
	</div>
	<div class="row">
		<div class="c-6">
			<label>Title</label>
			<input
				class="u-full-width"
				type="text"
				id="title"
				name="title" 
				onchange="genSEF(this,document.forms['form_add_p'].sef_url)"
				onkeyup="genSEF(this,document.forms['form_add_p'].sef_url)" 
				required
				value="<?php if (isset($_POST['title'])){echo htmlentities($_POST['title'], ENT_COMPAT, 'utf-8');} ?>"
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
			<label>Contetnt</label>
			<textarea  name="contetnt" class="tinymce_textarea" placeholder="Contetnt" ><?php if (isset($_POST['contetnt'])){echo htmlentities($_POST['contetnt'], ENT_COMPAT, 'utf-8');} ?></textarea>
		</div>
	
		<div class="c-6">
			<label>Meta description</label>
			<input type="text" name="description" required class="u-full-width" value="<?php if (isset($_POST['description'])){echo htmlentities($_POST['description'], ENT_COMPAT, 'utf-8');} ?>" />
		</div>
		<div class="c-6">
			<label>Keywords</label>
			<input type="text" name="keywords" class="u-full-width" required value="<?php if (isset($_POST['keywords'])){echo htmlentities($_POST['keywords'], ENT_COMPAT, 'utf-8');} ?>" />
		</div>

		<div class="c-6">
			<label>Main Image</label>
			<input type="text" name="image_main" id="image_main" value="<?php if (isset($_POST['image_main'])){echo htmlentities($_POST['image_main'], ENT_COMPAT, 'utf-8');} ?>" required/>
			<a  class="myTooltip button" title="#elf">Choose image</a>
			<div id="elf"><div id="elfinder" style="width: 800px; height: 500px;"></div></div>
		</div>

		<div class="c-6">
		  	<label>Visible?</label>
			<label for="visible">
				<input type="radio" name="visible" value="1" id="visible" <?php if (isset($_POST['visible'])){if ($_POST['visible']==1){echo "checked";}} ?>>
				<span class="label-body">Yes</span>
			</label>
		 	<label for="invisible"><input type="radio" name="visible" value="0" id="invisible"><span class="label-body">No</span></label>
		</div>
	</div>
	
	
	
	<div class="row">
		<div class="c-12">
			<button class="button-primary" type="submit">Save</button>
			<a href="/administration" class="button">Cancle</a>
		</div>
	</div>
	<?php if (isset($_POST['id'])){
		?>
		<input type="hidden" name="id" value="<?php echo $_POST["id"];?>"/>
		<?php
	} ?>
</form>