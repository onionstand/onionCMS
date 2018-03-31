<?php
namespace front;

class cartClass{

	function insertCart($f3){
		$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));

		$basket = new \Basket('ceger');

		
		$basket->set('product_name',$f3->get('POST.product_name'));
		$basket->set('product_price',$f3->get('POST.product_price'));
		$basket->set('sef_url',$f3->get('POST.sef_url'));
		$basket->set('qty',$f3->get('POST.qty'));
		$basket->save();
		$basket->reset();

		$this->cartIcon($f3);

		$captcha = new \admin\toolsClass();
		$captcha->imgCaptcha($f3);
		$f3->set('p_cart',$basket->find());

		$f3->set('head_title','Korpa');
		$f3->set('meta_desc','Korpa proizvoda');
		$f3->set('meta_keywords','Korpa proizvoda');
		$f3->set('image_social','/v_front/img/enef-logo.png');	
		$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));

		$f3->set('content','template/cart.php');
		echo \View::instance()->render('template/layout.php');
	}

	function getCart($f3){
		$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
		$basket = new \Basket('ceger');
		$f3->set('p_cart',$basket->find());

		
		$this->cartIcon($f3);

		$captcha = new \admin\toolsClass();
		$captcha->imgCaptcha($f3);
		$f3->set('head_title','Korpa');
		$f3->set('meta_desc','Korpa proizvoda');
		$f3->set('meta_keywords','Korpa proizvoda');
		$f3->set('image_social','/v_front/img/enef-logo.png');	
		$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));

		$f3->set('content','template/cart.php');
		echo \View::instance()->render('template/layout.php');

	}

	function deleteProdFromCart($f3){
		//$basket = new \Basket('ceger');
		//var_dump($basket->find());
		//$basket->erase('sef_url',$f3->get('PARAMS.sef_url'));
		unset($_SESSION['ceger'][$f3->get('PARAMS.cart_id')]);
		$f3->reroute('/korpa');
	}

	function cartIcon($f3) {
		$basket = new \Basket('ceger');
		//$basket->count();
		$f3->set('prod_in_basket',$basket->find());
		$c_qty=0;
		foreach ($f3->get('prod_in_basket') as $pro_kol) {
			$c_qty+=$pro_kol['qty'];
		}
		$f3->set('cart_qty',$c_qty);
	}

	function sendOrder($f3){
		$basket = new \Basket('ceger');
		if ($f3->get('POST.captcha')===$f3->get('SESSION.captcha_code')){
			$audit = \Audit::instance();
			if($audit->email($f3->get('POST.email'), FALSE)){
				$f3->set('products_all',$basket->find());
				
				if (null !== ($f3->get('POST.note'))) { $note=$f3->get('POST.note'); } else {$note="nema";}
				$to = 'lukastojanovicbg@gmail.com,'.$f3->get('POST.email');
				$subject = 'Narudžbina sa sajta';
				$message = '
				<html>
				<head>
					<title>Narudžbina sa sajta</title>
				</head>
				<body>
					<p>Naručio: '. $f3->get('POST.name') .'</p>
					<p>E-mail: '. $f3->get('POST.email') .'</p>
					<p>Telefon: '. $f3->get('POST.tel') .'</p>
					<p>Adresa: '. $f3->get('POST.adress') .'</p>
					<p>Grad: '. $f3->get('POST.city') .'</p>
					<p>Napomena: '. $note .'</p>
					<table border="1"><tr><th>Ime robe:</th><th>Cena:</th><th>Količina:</th><th>Zbir:</th></tr>
				';
				$total=0;
				foreach ($f3->get('products_all') as $produ) {
					$message.= '<tr><td>'.$produ['product_name'].'</td><td>'.$produ['product_price'].'</td><td>'.$produ['qty'].'</td><td>'.$produ['qty']*$produ['product_price'].'</td></tr>';
					$total+=$produ['qty']*$produ['product_price'];
				}
				$message.= '<tr><td></td><td></td><td>Ukupno:</td>'.$total.'</tr>
					</table>';
				
				$message.= '</body></html>';
				$headers = "From: office@energetska-efikasnost.rs" . "\r\n" . "MIME-Version: 1.0" . "\r\n" . "Content-type: text/html; charset=UTF-8" . "\r\n"; 
				mail($to, $subject, $message, $headers);
				$basket->drop();
				$f3->set('head_title','Korpa');
				$f3->set('meta_desc','Korpa proizvoda');
				$f3->set('meta_keywords','Korpa proizvoda');
				$f3->set('image_social','/v_front/img/enef-logo.png');	
				$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));
				
				$f3->set('alarm','Narudžbina je poslata.');

				$this->cartIcon($f3);

				$captcha = new \admin\toolsClass();
				$captcha->imgCaptcha($f3);
				
				$f3->set('p_cart',$basket->find());
				$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
				$f3->set('content','template/cart.php');
				echo \View::instance()->render('template/layout.php');
			}
			else{
				$f3->set('head_title','Korpa');
				$f3->set('meta_desc','Korpa proizvoda');
				$f3->set('meta_keywords','Korpa proizvoda');
				$f3->set('image_social','/v_front/img/enef-logo.png');	
				$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));

				$f3->set('alarm','Pogrešan email.');

				$this->cartIcon($f3);

				$captcha = new \admin\toolsClass();
				$captcha->imgCaptcha($f3);
				
				$f3->set('p_cart',$basket->find());
				$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
				$f3->set('content','template/cart.php');
				echo \View::instance()->render('template/layout.php');
			};
		}
		else{
			$f3->set('head_title','Korpa');
			$f3->set('meta_desc','Korpa proizvoda');
			$f3->set('meta_keywords','Korpa proizvoda');
			$f3->set('image_social','/v_front/img/enef-logo.png');	
			$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));
			$f3->set('alarm','Pogrešan kod sa slike.');

			$this->cartIcon($f3);

			$captcha = new \admin\toolsClass();
			$captcha->imgCaptcha($f3);
			
			$f3->set('p_cart',$basket->find());
			$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
			$f3->set('content','template/cart.php');
			echo \View::instance()->render('template/layout.php');
		}
	}
}