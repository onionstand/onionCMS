<!doctype html>
<html lang="sr">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title><?php echo $head_title;?></title>
		<meta name="description" content="<?php echo $meta_desc; ?>">
        <meta name="keywords" content="<?php echo $meta_keywords; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php if(isset($url_social)){
            ?>
            <meta property="og:url" content="<?php echo $url_social; ?>" />
            <?php
        }?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $head_title; ?>" />
        <meta property="og:description" content="<?php echo $meta_desc; ?>" />
        <?php if(isset($image_social)){
            ?>
            <meta property="og:image" content="<?php echo $image_social; ?>" />
            <?php
        }
        ?>

		<link rel="stylesheet" href="/v_front/css/app.css">
		<link rel="stylesheet" href="/v_front/css/ideal-image-slider.css">
		<link rel="stylesheet" href="/v_front/css/ideal-image-slider-theme.css">
		<link rel="stylesheet" href="/v_front/css/baguetteBox.css">
		<link rel="stylesheet" href="/v_admin/css/drooltip.css">
		
	</head>
	<body>
		<header>
			<div class="container-header">
				<div><img src="/v_front/img/enef-logo.png" alt="Enef Centar"></div>
				
				<div class="search">
					<form method="get" class="search-form" action="/pretraga">
						<input name="term_search" class="search-field" placeholder="Search..">
						<button type="submit" class="search-button"><i class="material-icons">search</i></button>
					</form>
				</div>
				
				<div>
					<i class="material-icons phone-head">phone_iphone</i>
					<span>
						<strong>NAZOVITE NAS</strong><br>
						<small>+381 11 263 77 77</small>
					</span>
				</div>
			</div>
		</header>
		
		<nav>
			<div class="container-nav">
				<a href="" class="cat-title"><i class="material-icons">local_offer</i>Naši Proizvodi</a>
				<div class="nav-right">
					<div class="menu">
						<a href="/"><i class="material-icons">home</i></a>
						<a href="/o-nama">O nama</a>
						<a href="/kontakt">Kontakt</a>
					</div>
					<div>
						<a href="/korpa"><i class="material-icons">shopping_cart</i><span class="cart-qty-number"><?php echo $cart_qty;?></span></a>
					</div>
				</div>
			</div>
		</nav>

		<main>
			<div class="sidebar">
				<div class="category">
					<ul>
						<?php
						foreach ($t_categories as $cat) { ?>
							<li><a href="/kategorija/<?php echo $cat['sef_url'];?>"><?php echo $cat['name'];?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="baner-left"><img src="/v_front/img/baner.jpg" alt="baner"></div>
				<div class="heading">
					<h2>Prečice</h2>
					<hr>
				</div>
				<div class="tagcloud">
					<a href="#">Kvaka</a>
					<a href="#">Vrata za kuce</a>
					<a href="#">Kamena Vuna</a>
					<a href="#">Vrata za graze</a>
					<a href="#">Kaktus</a>
				</div>
			</div>
			<?php  echo $this->render(Base::instance()->get('content')); ?>
		</main>

		<footer>
			<div class="container-footer">
				<p>© 2018 ENEF centar. Sva prava rezervisana.</p>
				<div class="footer-icons">
					<a href="#"><i class="material-icons">mail_outline</i></a>
				</div>
			</div>
		</footer>
		<!--<script type="text/javascript" src="/v_front/js/drooltip.src.js"></script>-->
		<script type="text/javascript" src="/v_front/js/ideal-image-slider.min.js"></script>
		<script type="text/javascript" src="/v_front/js/baguetteBox.min.js"></script>
		<script type="text/javascript">
			baguetteBox.run('.prod-gallery');
		</script>
		<script type="text/javascript" src="/v_front/js/app.js"></script>
	</body>
</html>