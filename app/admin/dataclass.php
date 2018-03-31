<?php
namespace admin;


class dataClass{

	function listData($f3, $table, $title, $pag_adres, $template){
		$query=new \DB\SQL\Mapper($f3->get('DB'), $table);
		if ($f3->get('POST.search')) {
			$search=$query->find(array('name LIKE ?','%'.$f3->get('POST.search').'%'));
			$f3->set('search',$search);
		}
		else{

			$limit = 10;
			$page = \Pagination::findCurrentPage();
			$filter = null;
			$option = array('order' => 'id DESC');
			$subset = $query->paginate($page-1, $limit, $filter, $option);
			$f3 = \Base::instance();
			$f3->set('paginate', $subset);

			$pages = new \Pagination($subset['total'], $subset['limit']);
			$pages->setTemplate('template/paginate_browse.php');
			$f3->set('paginate_browse_pos', $pages->serve());
		}




		$f3->set('html_title','Administration - '.$title);
		$f3->set('content', $template);
		echo \View::instance()->render('admin/layout.php');
	}


	function dataSave($f3, $table, $title, $template, $reroute_t) {
		$save=new \DB\SQL\Mapper($f3->get('DB'), $table);
		if ($f3->get('POST.id')) {
			$sef_title_not_unique=$save->findone(array('sef_url = ? AND id != ?',\Web::instance()->slug($f3->get('POST.sef_url')),$f3->get('POST.id')));
		}
		else{
			$sef_title_not_unique=$save->findone(array('sef_url = ?',\Web::instance()->slug($f3->get('POST.sef_url'))));
		}
		if($sef_title_not_unique){
			$f3->clear('alarm');
			$f3->set('alarm','SEF title must be unique');
			$f3->set('html_title','Administration - '.$title);
			$f3->set('wysiwyg','admin/wysiwyg.php');
			$f3->set('content', $template);
			echo \View::instance()->render('admin/layout.php');
		}
		else{
			if ($f3->get('POST.id')) {
				$save->load(array('id=?',$f3->get('POST.id')));
				$save->copyFrom('POST');
				$save->sef_url=\Web::instance()->slug($f3->get('POST.sef_url'));
				$save->save();
				$f3->reroute($reroute_t);
			}
			else{
				$save->copyFrom('POST');
				$save->sef_url=\Web::instance()->slug($f3->get('POST.sef_url'));
				$save->save();
				$f3->reroute($reroute_t);
			}
		}
	}

}
?>