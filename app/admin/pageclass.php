<?php
namespace admin;

class pageClass{

	//Pages ###################################################################################
	function listPages($f3) {
		$pages = new \admin\dataClass();
		//id 	sef_title 	title 	contetnt 	description 	keywords 	image_main 	visible 
		$pages->listData($f3, 'pages', 'list pages', '/administration/list-pages/', 'admin/pages/list_pages.php');
	}

	function addPage($f3) {
		$f3->set('html_title','Administration-add page');
		$f3->set('wysiwyg','admin/wysiwyg.php');
		$f3->set('content','admin/pages/add_page.php');
		echo \View::instance()->render('admin/layout.php');
	}

	function editPage($f3) {
		$f3->set('html_title','Administration-edit page');
		$news_query=new DB\SQL\Mapper($f3->get('DB'),'pages');
		$news_query->load(array('id=?',$f3->get('PARAMS.id')));
		$news_query->copyTo('POST');
		$f3->set('wysiwyg','admin/wysiwyg.php');
		$f3->set('content','admin/pages/add_page.php');
		echo \View::instance()->render('admin/layout.php');
	}	

	function savePage($f3){
		$page = new \admin\dataClass();
		//$f3, $table, $title, $template, $reroute_t
		$page->dataSave($f3, 'pages', 'error', 'admin/pages/add_page.php', '/administration/list-pages');
	}

	function deletePage($f3) {
		$delete_page=new DB\SQL\Mapper($f3->get('DB'),'pages');
		$delete_page->load(array('id=?',$f3->get('PARAMS.id')));
		$delete_page->erase();
		$f3->reroute('/administration/list_pages');
	}
}