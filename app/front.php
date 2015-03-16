<?php
class Front{
	function welcome($f3) {
		$f3->set('html_title','Testiram logovanje');
		$news_all=new DB\SQL\Mapper($f3->get('DB'),'news');

		$news_paginate=$news_all->paginate(0,5);
		$f3->set('news_paginate',$news_paginate);
		$f3->set('content','template/welcome.php');
		echo View::instance()->render('template/layout_front.php');
	}
}