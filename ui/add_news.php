<div class="row">
	<?php if (isset($alarm)){ ?>
		<div class="small-12 medium-4 large-4 small-centered medium-centered large-centered columns">
			<div data-alert class="alert-box alert">
			 <?php echo $alarm; ?>
			  <a href="#" class="close">&times;</a>
			</div>
		</div>
	<?php } ?>
	<div class="small-12 large-12 columns">
		<h3>Add News</h3>
	</div>
</div>
<form data-abide method="post" id="form_add_news">
	<div class="row">
		<div class="small-12 large-6 columns">
			<label>Title <small>required</small>
				<input type="text" id="title" name="title" 
					onchange="genSEF(this,document.forms['form_add_news'].sef_title)"
					onkeyup="genSEF(this,document.forms['form_add_news'].sef_title)" 
					required
					value="<?php if (isset($_POST['title'])){echo htmlentities($_POST['title'], ENT_COMPAT, 'utf-8');} ?>"
				/>
	   		</label>
	   		<small class="error">Field title is required.</small>	
		</div>
		<div class="small-12 large-6 columns">
			<label>SEF Title <small>required</small>
				<input type="text" id="sef_title" name="sef_title" required pattern="^[a-z0-9-_]+$" value="<?php if (isset($_POST['sef_title'])){echo htmlentities($_POST['sef_title'], ENT_COMPAT, 'utf-8');} ?>" />
	   		</label>
	   		<small class="error">Field SEF Title is required.</small>	
		</div>
	</div>
	<div class="row">
		<div class="small-12 large-12 columns">
			<label>Content <small>required</small>
				<textarea  name="content" id="tinymce_textarea" placeholder="Content">
					<?php if (isset($_POST['content'])){echo htmlentities($_POST['content'], ENT_COMPAT, 'utf-8');} ?>
				</textarea>
	   		</label>
	   		<small class="error">Field Content is required.</small>	
		</div>
	</div>
	<div class="row">
		<div class="small-12 large-6 columns">
			<label>Description <small>required</small>
				<input type="text" name="description" required value="<?php if (isset($_POST['description'])){echo htmlentities($_POST['description'], ENT_COMPAT, 'utf-8');} ?>" />
	   		</label>
	   		<small class="error">Field description is required.</small>	
		</div>
		<div class="small-12 large-6 columns">
			<label>Keywords <small>required</small>
				<input type="text" name="keywords" required value="<?php if (isset($_POST['keywords'])){echo htmlentities($_POST['keywords'], ENT_COMPAT, 'utf-8');} ?>" />
	   		</label>
	   		<small class="error">Field Keywords is required.</small>	
		</div>
		<div class="small-12 large-6 columns">
			<label>Author <small>required</small>
				<input type="text" name="author" required value="<?php if (isset($_POST['author'])){echo htmlentities($_POST['author'], ENT_COMPAT, 'utf-8');} ?>" />
	   		</label>
	   		<small class="error">Field Author is required.</small>	
		</div>
		<div class="small-12 large-6 columns">
			<label>Date <small>required</small>
				<input type="text" name="date" id="datepicker" required value="<?php if (isset($_POST['date'])){echo htmlentities($_POST['date'], ENT_COMPAT, 'utf-8');} ?>" />
	   		</label>
	   		<small class="error">Field Date is required.</small>	
		</div>
		<div class="small-12 large-6 columns">
			<label>Tag <small>required</small>
				<input type="text" name="tag" required value="<?php if (isset($_POST['tag'])){echo htmlentities($_POST['tag'], ENT_COMPAT, 'utf-8');} ?>" />
	   		</label>
	   		<small class="error">Field Tag is required.</small>	
		</div>
		<div class="small-12 large-6 columns">
			<a class="button" href="javascript: openwindow()">Image manager</a>
		</div>
	</div>
	<div class="row">
		<div class="small-12 large-6 columns">
			<button type="submit">Save</button>
		</div>
		<div class="small-12 large-6 columns">
			<a href="administration" class="button">Cancel</a>
		</div>
	</div>
	<?php if (isset($_POST['id'])){
		?>
		<input type="hidden" name="id" value="<?php echo $_POST["id"];?>"/>
		<?php
	} ?>
</form>
