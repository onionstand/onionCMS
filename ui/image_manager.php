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
		<h3>Image manager</h3>
	</div>
	<div class="small-12 large-12 columns">
		<ul class="clearing-thumbs small-block-grid-6" data-clearing>
			<?php foreach ($files_images as $file) {
				if (($file!="..") AND ($file!=".")) {?>
					<li>
						<a href="<?php echo $UPLOADS . $file; ?>">
							<img src="<?php echo $UPLOADS."/tn/" . $file; ?>" alt="<?php echo $UPLOADS . $file; ?>" data-caption="<?php echo  $SCHEME.'://'.$HOST.$BASE.'/'.$UPLOADS.$file; ?>">
						</a>
					</li>
				<?php }?>
			<?php } ?>
		</ul>
	</div>
	<div class="small-12 large-6 columns">
		<form method="post" enctype="multipart/form-data" data-abide>
			<div class="small-12 large-6 columns">
				<label>Select file to upload: <small>required</small>
					<input type="file" name="file_for_upload" id="file_to_upload" required />
		   		</label>
		   		<small class="error">File is required.</small>
			</div>
			<div class="small-12 large-12 columns">
				<button type="submit">Upload</button>
			</div>
		</form>
	</div>
	<div class="small-12 large-6 columns">
	</div>
</div>