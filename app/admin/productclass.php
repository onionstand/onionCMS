<?php
namespace admin;

class productClass{
	
	function listProducts($f3){
		if ($f3->get('POST.search')) {
			$search=$f3->get('DB')->exec('SELECT products.*, categories.name AS cat_name FROM products LEFT JOIN categories ON products.category = categories.id WHERE products.name LIKE ?', '%'.$f3->get('POST.search').'%');
			$f3->set('search',$search);
		}
		else{
			$limit_per_page = 10;
			$page = \Pagination::findCurrentPage();
			// get total
			$count_res = $f3->get('DB')->exec('SELECT COUNT(*) AS rows FROM products');
			$max_count = $count_res[0]['rows'];
			// get results
			$results = $f3->get('DB')->exec('SELECT products.*, categories.name AS cat_name FROM products LEFT JOIN categories ON products.category = categories.id LIMIT '.$limit_per_page.' OFFSET '.(($page-1)*$limit_per_page));
			$f3->set('product_list', $results);

			$pagination = new \Pagination($max_count, $limit_per_page);
			$pagination->setTemplate('template/paginate_browse.php');
			$pagebrowser_html = $pagination->serve();
			$f3->set('paginate_browse_pos', $pagebrowser_html);
		}
		
		$f3->set('html_title','Administration - List products');
		$f3->set('content', 'admin/products/list_products.php');
		echo \View::instance()->render('admin/layout.php');
	}

	function addProduct($f3) {
		$query_cat=new \DB\SQL\Mapper($f3->get('DB'),'categories',array('id','name'));
		$categories=$query_cat->find();
		$f3->set('categories',$categories);

		$f3->set('html_title','Administration - add product');
		$f3->set('wysiwyg','admin/wysiwyg.php');
		$f3->set('content', 'admin/products/add_product.php');
		echo \View::instance()->render('admin/layout.php');
	}

	function editProduct($f3) {
		$query=new \DB\SQL\Mapper($f3->get('DB'), 'products');
		$query->load(array('id=?',$f3->get('PARAMS.id')));
		$query->copyTo('POST');

		$query_cat=new \DB\SQL\Mapper($f3->get('DB'),'categories',array('id','name'));
		$categories=$query_cat->find();
		$f3->set('categories',$categories);
		
		$f3->set('html_title','Administration - edit product');
		$f3->set('wysiwyg','admin/wysiwyg.php');
		$f3->set('content', 'admin/products/add_product.php');
		echo \View::instance()->render('admin/layout.php');
	}

	function saveProduct($f3){
		$product = new \admin\dataClass();

		$query_cat=new \DB\SQL\Mapper($f3->get('DB'),'categories',array('id','name'));
		$categories=$query_cat->find();
		$f3->set('categories',$categories);
		//$f3, $table, $title, $template, $reroute_t
		$product->dataSave($f3, 'products', 'error', 'admin/products/add_product.php', '/administration/list-products');
	}

	function deleteProduct($f3) {
		$delete=new \DB\SQL\Mapper($f3->get('DB'), 'products');
		$delete->load(array('id=?',$f3->get('PARAMS.id')));
		$delete->erase();
		//$f3->get('DB')->exec('DELETE FROM gallery WHERE id=?;', $f3->clean($f3->get('PARAMS.id')) );
		$f3->reroute('/administration/list-products');
	}

}