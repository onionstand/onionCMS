<?php
class Front{
	// $total_p, $limit_p, $count_p, $pos_p
	function paginateBrowse($f3, $total_p, $limit_p, $count_p, $pos_p) {
		$f3->set('paginate_browse_pos','template/paginate_browse.php');
	}
	function welcome($f3) {
		$f3->set('html_title','Testiram logovanje');
		$news_all=new DB\SQL\Mapper($f3->get('DB'),'news');

		$news_paginate=$news_all->paginate(0,5);
		$f3->set('news_paginate',$news_paginate);
		$f3->set('content','template/welcome.php');
		$this->paginateBrowse($f3,$news_paginate['total'],$news_paginate['limit'],$news_paginate['count'],$news_paginate['pos']);
		echo View::instance()->render('template/layout_front.php');
	}
}