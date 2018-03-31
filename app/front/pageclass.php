<?php
namespace front;

class pageClass{

	function welcome($f3){
		$f3->set('html_title','GEZE Srbija');
		$f3->set('meta_desc','GEZE Srbija'); 
		$f3->set('meta_keywords', 'GEZE Srbija');
		$f3->set('image_social','/v_front/img/enef-logo.png');
		$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));
		//$f3->set('products_for_index',$f3->get('DB')->exec('SELECT * FROM products WHERE onhome=1 ORDER BY name LIMIT 8'));
		$carticon = new \front\cartClass();
		$carticon->cartIcon($f3);
		
		$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
		$f3->set('content','template/welcome.php');
		echo \View::instance()->render('template/layout.php');
	}

	function kontakt($f3){
		$f3->set('html_title','Kontaktirajte ENEF');
		$f3->set('meta_desc','Kontaktirajte ENEF'); 
		$f3->set('meta_keywords', 'ENEF Centar');
		$f3->set('image_social','/v_front/img/enef-logo.png');
		$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));
		$carticon = new \front\cartClass();
		$carticon->cartIcon($f3);
		$captcha = new \admin\toolsClass();
		$captcha->imgCaptcha($f3);
		$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
		$f3->set('content','template/contact.php');
		echo \View::instance()->render('template/layout.php');
	}

	function slanjeEmail($f3){
		if ($f3->get('POST.captcha')===$f3->get('SESSION.captcha_code')){
			$audit = \Audit::instance();
			if($audit->email($f3->get('POST.email'), FALSE)){
				
				if($f3->get('POST.name')){
					$ime=$f3->clean($f3->get('POST.name'));
				}
				else{$ime="nema";}
				
				if($f3->get('POST.email')){
					$email_posiljalac=$f3->clean($f3->get('POST.email'));
				}
				else{$email_posiljalac="nema";}
				
				if($f3->get('POST.tel')){
					$telefon=$f3->clean($f3->get('POST.tel'));
				}
				else{$telefon="nema";}

				if($f3->get('POST.note')){
					$posebni_zahtevi=$f3->clean($f3->get('POST.note'));
				}
				else{$posebni_zahtevi="nema";}

				$message = 'Poruka sa kontakt forme od: ' . $ime . " | " . $email_posiljalac . "\r\nPoruka:\r\n" . $posebni_zahtevi;
				if(@mail("<lukastojanovicbg@gmail.com>", "Poruka od ".$ime, $message)){
					$f3->set('alarm_ok','Vaša poruka je poslata.');
				}
				else{
					$f3->set('alarm','Greška!!! Probajte kasnije.');
				}

				$captcha = new \admin\toolsClass();
				$captcha->imgCaptcha($f3);
				
				$f3->set('html_title','Kontaktirajte ENEF');
				$f3->set('meta_desc','Kontaktirajte ENEF'); 
				$f3->set('meta_keywords', 'ENEF Centar');
				$f3->set('image_social','/v_front/img/enef-logo.png');
				$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));
				$carticon = new \front\cartClass();
				$carticon->cartIcon($f3);
				$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
				$f3->set('content','template/contact.php');
				echo \View::instance()->render('template/layout.php');
			}
			else{
				$f3->set('alarm','Neispravan email.');


				$captcha = new \admin\toolsClass();
				$captcha->imgCaptcha($f3);
				
				$f3->set('html_title','Kontaktirajte ENEF');
				$f3->set('meta_desc','Kontaktirajte ENEF'); 
				$f3->set('meta_keywords', 'ENEF Centar');
				$f3->set('image_social','/v_front/img/enef-logo.png');
				$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));
				$carticon = new \front\cartClass();
				$carticon->cartIcon($f3);
				$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
				$f3->set('content','template/contact.php');
				echo \View::instance()->render('template/layout.php');
			};
		}
		else{
			$f3->set('alarm','Pogrešan kod sa slike.');

			$captcha = new \admin\toolsClass();
			$captcha->imgCaptcha($f3);
			
			$f3->set('html_title','Kontaktirajte ENEF');
			$f3->set('meta_desc','Kontaktirajte ENEF'); 
			$f3->set('meta_keywords', 'ENEF Centar');
			$f3->set('image_social','/v_front/img/enef-logo.png');
			$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));
			$carticon = new \front\cartClass();
			$carticon->cartIcon($f3);
			$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
			$f3->set('content','template/contact.php');
			echo \View::instance()->render('template/layout.php');
		}
	
	}

	function oNama($f3){
		$f3->set('page_cont',
			$f3->get('DB')->exec('SELECT title,content,description,keywords,image_main FROM pages WHERE sef_url="o-nama";')
		);
		if ($f3->get('page_cont')) {
			$f3->set('html_title', $f3->get('page_cont')['0']['title']);
			$f3->set('meta_desc', $f3->get('page_cont')['0']['description']);
			$f3->set('meta_keywords', $f3->get('page_cont')['0']['keywords']);
			$f3->set('image_social', 'http://pivsketure.rs/v_front/img/pivske-ture-logo.png');
			$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));

			$carticon = new \front\cartClass();
			$carticon->cartIcon($f3);
			$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
			$f3->set('content','template/page.php');
			echo \View::instance()->render('template/layout.php');
		}
		else{
			$f3->error(404);
		}
	}



}