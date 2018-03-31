<!doctype html>
<html lang="en">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title><?php echo $head_title;?></title>
		<link rel="stylesheet" href="/v_admin/css/reset.css">
		<link rel="stylesheet" href="/v_admin/css/styles.css">
		<link rel="stylesheet" href="/v_admin/css/drooltip.css">
		<script type="text/javascript" src="/v_admin/js/drooltip.src.js"></script>
		<script src="/v_admin/js/sef_title.js"></script>
		<!--<script data-main="/v_admin/elfinder/main_button.js" src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.5/require.min.js"></script>-->
		<script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.5/require.min.js"></script>
		<script type="text/javascript" src="/v_admin/elfinder/main_button.js"></script>
		<!--
		<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		-->
		<!-- WYSIWYG -->
		
		<?php if (isset($wysiwyg)){
			?>
			<script src="/v_admin/tinymce/js/tinymce/tinymce.min.js"></script>
			<?php
			echo $this->render(Base::instance()->get('wysiwyg'));
		} ?>

	</head>
	<body>
		<div class="wrapper">
			<div class="menu_wrapper">
				<!--
				<ul class="menu">
					<li>Admin</li>
					<li class="myTooltip" title="#menu_cat"><a href="#">Categories</a></li>
					<li class="myTooltip" title="#menu_product"><a href="#">Product</a></li>
					<li>Pages</li>
				</ul>
				<div id="menu_cat">
					<ul class="submenu">
						<li><a href="/administration/list-categories">List Categories</a></li>
						<li><a href="/administration/add-category">Add Categoriy</a></li>
					</ul>
				</div>
				-->
				<ul class="menu">
					<li><a href="/administration">Admin</a></li>
					<li><a href="/administration/list-categories">Categories</a></li>
					<li><a href="/administration/list-products">Products</a></li>
					<li><a href="/administration/list-pages">Pages</a></li>
				</ul>
			</div>
			<?php echo $this->render(Base::instance()->get('content')); ?>
		</div>
		<script type="text/javascript" src="/v_admin/js/app.js"></script>

	</body>
</html>