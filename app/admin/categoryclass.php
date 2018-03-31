<?php
namespace admin;

class categoryClass{

	function listCategories($f3){
		$category = new \admin\dataClass();
		//$f3, $table, $title, $pag_adres, $template
		$category->listData($f3, 'categories', 'list categories', '/administration/list-categories/', 'admin/categories/list_categories.php');
	}

	function addCategory($f3) {
		$f3->set('html_title','Administration - add product');
		$f3->set('wysiwyg','admin/wysiwyg.php');
		$f3->set('content', 'admin/categories/add_category.php');
		echo \View::instance()->render('admin/layout.php');
	}

	function editCategory($f3) {
		$query=new \DB\SQL\Mapper($f3->get('DB'), 'categories');
		$query->load(array('id=?',$f3->get('PARAMS.id')));
		$query->copyTo('POST');
		$f3->set('html_title','Administration - edit category');
		$f3->set('wysiwyg','admin/wysiwyg.php');
		$f3->set('content', 'admin/categories/add_category.php');
		echo \View::instance()->render('admin/layout.php');
	}

	function saveCategory($f3){
		$category = new \admin\dataClass();
		//$f3, $table, $title, $template, $reroute_t
		$category->dataSave($f3, 'categories', 'error', 'admin/categories/add_categories.php', '/administration/list-categories');
	}

	function deleteCategory($f3) {
		$delete=new \DB\SQL\Mapper($f3->get('DB'), 'categories');
		$delete->load(array('id=?',$f3->get('PARAMS.id')));
		$delete->erase();
		//$f3->get('DB')->exec('DELETE FROM gallery WHERE id=?;', $f3->clean($f3->get('PARAMS.id')) );
		$f3->reroute('/administration/list-categories');
	}
}