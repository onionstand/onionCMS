<?php include "menu_admin.php";?>
<div class="row">
	<div class="small-12 large-12 columns">
		<h3>Error:</h3>
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
	</div>
</div>