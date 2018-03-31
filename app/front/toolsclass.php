<?php
namespace front;

class toolsClass{
	function paginateBrowse($f3, $total_p, $limit_p, $count_p, $pos_p, $url_p) {
		$f3->set('total_p',$total_p);
		$f3->set('limit_p',$limit_p);
		$f3->set('count_p',$count_p);
		$f3->set('pos_p',$pos_p);
		$f3->set('url_p',$url_p);
		$f3->set('paginate_browse_pos','template/paginate_browse.php');
	}

	function siteSearch($f3) {
		if(strlen($f3->get('GET.term_search'))>3){
			$term_search=$f3->clean($f3->get('GET.term_search'));
			
			
			$f3->set('serch_result',$f3->get('DB')->exec("
					SELECT name AS name_s, sef_url AS sef_s, 'proizvod' AS sef_prefiks, image AS image_s, keywords AS keywords_s, price AS price_s FROM products WHERE name LIKE :term OR description LIKE :term 
					",
					//UNION ALL SELECT
					array(':term'=>'%'.$term_search.'%')
				));
			$f3->set('content','template/search.php');
			if ($f3->get('DB')->count()==0){$f3->set('alarm','Nema rezultata.');}
		}
		else{
			$f3->set('alarm','Termin pretrage mora da ima više od 3 slova.');
			$f3->set('content','template/search.php');
		}

		$f3->set('html_title','ENEF - Pretraga');
		$f3->set('meta_desc', 'Pretraga sajta enef.rs');
		$f3->set('meta_keywords', 'GEZE');
		$f3->set('image_social', '/v_front/img/enef-logo.png');
		//$f3->set('gmap_js','1');
		$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));
		$carticon = new \front\cartClass();
		$carticon->cartIcon($f3);
		$f3->set('t_categories',$f3->get('DB')->exec('SELECT name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
		$f3->set('content','template/search.php');
		echo \View::instance()->render('template/layout.php');
	}
}