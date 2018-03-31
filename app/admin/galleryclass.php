<?php
namespace admin;

class galleryclass{

	function listGallery($f3) {
		$f3->set('html_title','Administration - Gallery');
		$gal_query=new \DB\SQL\Mapper($f3->get('DB'),'p_gallery');
		$gal=$gal_query->find(array('id_products=?',$f3->get('PARAMS.product_id')),array('order'=>'position'));
		$f3->set('gallery',$gal);
		$f3->set('id_products',$f3->get('PARAMS.product_id'));
		$f3->set('content', 'admin/add_gallery.php');
		echo \View::instance()->render('admin/layout.php');
	}
	
	function addGallerySave($f3) {
		$save_gal=new \DB\SQL\Mapper($f3->get('DB'),'p_gallery');
		$n_id=$f3->get('POST.id_products');
		$ime=$f3->get('POST.name');
		$slika=explode(",", $f3->get('POST.image'));
		$poz=1;
		foreach ($slika as $sl) {
			$save_gal->id_products=$n_id;
			$save_gal->image=$sl;
			$save_gal->name=$ime;
			$save_gal->position=$poz;
			$save_gal->save();
			$save_gal->reset();
			$poz++;
		}
		$f3->reroute('/administration/product-gallery/'.$f3->get('POST.id_products'));
	}
	
	function gallerySortSave($f3) {
		$save_gal=new \DB\SQL\Mapper($f3->get('DB'),'p_gallery');
		$array_items=explode(",", $f3->get('POST.position'));
		echo $f3->get('POST.order');
		$order = 1;
		foreach ( $array_items as $item) {
			$save_gal->load(array('id=?',$item));
	    	$save_gal->position=$order;
			$save_gal->update();
			$save_gal->reset();
		    $order++;
		}
		$f3->reroute('/administration/product-gallery/'.$f3->get('POST.id_products'));
	}

	function deleteGallery($f3) {
		$delete_slajder=new \DB\SQL\Mapper($f3->get('DB'),'p_gallery');
		$delete_slajder->load(array('id=?',$f3->get('PARAMS.image_id')));
		$delete_slajder->erase();
		$f3->reroute('/administration/product-gallery/'.$f3->get('PARAMS.product_id'));
	}

}