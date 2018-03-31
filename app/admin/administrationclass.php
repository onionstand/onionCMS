<?php
namespace admin;

class administrationClass{
	function administration($f3){
		$f3->set('html_title','Administration');
		$f3->set('content','admin/administration.php');
		echo \View::instance()->render('admin/layout.php');
	}
}