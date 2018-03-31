<?php
namespace front;

class catProClass{
	
	function category($f3){
		$f3->set('t_categories',$f3->get('DB')->exec('SELECT id, name, sef_url, description, keywords FROM categories WHERE visible=1 ORDER BY c_order'));

		//get cattegory id
		$key = array_search($f3->get('PARAMS.sef_url'), array_column($f3->get('t_categories'), 'sef_url'));
		$cat_id=$f3->get('t_categories')[$key]['id'];
		$cat_name=$f3->get('t_categories')[$key]['name'];

		$c_products = new \DB\SQL\Mapper($f3->get('DB'),'products');
		$limit = 3;
		$page = \Pagination::findCurrentPage();
		$filter = array('category = ? AND visible = ?',$cat_id,1);
		$option = array('order' => 'p_order DESC');
		$subset = $c_products->paginate($page-1, $limit, $filter, $option);
		$f3->set('t_products', $subset);
		$pagination = new \Pagination($subset['total'], $subset['limit']);
		$pagination->setTemplate('template/paginate_browse.php');
		$f3->set('paginate_browse_pos', $pagination->serve());

		$carticon = new \front\cartClass();
		$carticon->cartIcon($f3);

		$f3->set('head_title',$cat_name);
		$f3->set('meta_desc', $f3->get('t_categories')[$key]['description']); 
		$f3->set('meta_keywords', $f3->get('t_categories')[$key]['keywords']);
		$f3->set('image_social','/v_front/img/enef-logo.png');	
		$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));

		$f3->set('content','template/products.php');
		echo \View::instance()->render('template/layout.php');
	}

	function product($f3){
		$f3->set('t_product',$f3->get('DB')->exec('SELECT * FROM products WHERE sef_url=? AND visible=1', $f3->get('PARAMS.sef_url')));
		$product = $f3->get('t_product');

		if (isset($product) && $product) {
			$f3->set('t_categories',$f3->get('DB')->exec('SELECT id, name, sef_url FROM categories WHERE visible=1 ORDER BY c_order'));
			$cat=$f3->get('t_categories');

			foreach ($cat as $c) {
				if ($c['id'] == $product[0]['category']) {
					$cat_name=$c['name'];
					$cat_sef_url=$c['sef_url'];
					break;
				}
			}
			$f3->set('category_name',$cat_name);
			$f3->set('category_sef',$cat_sef_url);

			$f3->set('p_gallery',$f3->get('DB')->exec('SELECT image, name FROM p_gallery WHERE id_products=? ORDER BY position', $product[0]['id']));

			$f3->set('options',$f3->get('DB')->exec('SELECT id, id_product, name_option, type, position FROM options WHERE id_product=? ORDER BY position', $product[0]['id']));
			$f3->set('opt_field',$f3->get('DB')->exec('SELECT id, id_opt, name_field, price FROM opt_fields'));

			foreach ($f3->get('options') as $key_o => $value_o) {
				foreach ($f3->get('opt_field') as $key_f => $value_f) {
					if ($value_f['id_opt']==$value_o['id']) {
						$fields[]=array('id'=>$value_f['id'], 'id_opt'=>$value_f['id_opt'], 'name_field'=>$value_f['name_field'], 'price'=>$value_f['price']);
					}
				}
			}
			$f3->set('fields',$fields);

			$carticon = new \front\cartClass();
			$carticon->cartIcon($f3);

			$f3->set('head_title',$product[0]['name']);
			$f3->set('meta_desc', $product[0]['meta_desc']); 
			$f3->set('meta_keywords', $product[0]['keywords']);
			$f3->set('image_social', $product[0]['image']);	
			$f3->set('url_social',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('PATH'));

			$f3->set('content','template/product_detail.php');
			echo \View::instance()->render('template/layout.php');

		}
		else{
			$f3->error(404);
		}
	
	}
}