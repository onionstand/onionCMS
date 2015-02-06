<?php
class Front{
	function welcome($f3) {
		$f3->set('html_title','Testiram logovanje');
		$f3->set('content','welcome.php');
		echo View::instance()->render('layout_front.php');
	}
}