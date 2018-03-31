<?php
namespace admin;

class optionsclass{

	function listOptions($f3) {
		$f3->set('html_title','Administration - Options');
		$opt_query=new \DB\SQL\Mapper($f3->get('DB'),'options');
		$opt=$opt_query->find(array('id_product=?',$f3->get('PARAMS.product_id')),array('order'=>'position'));

		$fields_query=new \DB\SQL\Mapper($f3->get('DB'),'opt_fields');
		foreach ($opt as $o) {
			$fields_query->load(array('id_opt = ?',$o['id']));
			if (!$fields_query->dry()) {
				while ( !$fields_query->dry() ) {
					$fields[]=array('id'=>$fields_query->id, 'id_opt'=>$fields_query->id_opt, 'name_field'=>$fields_query->name_field, 'price'=>$fields_query->price);
					$fields_query->next();
				}
			}
    	}

    	$f3->set('fields',$fields);

		$f3->set('options',$opt);
		$f3->set('id_products',$f3->get('PARAMS.product_id'));
		$f3->set('content', 'admin/options.php');
		echo \View::instance()->render('admin/layout.php');
	}

	function addOptionSave($f3) {
		$save=new \DB\SQL\Mapper($f3->get('DB'), 'options');
		$save->copyFrom('POST');
		$save->id_product=$f3->get('POST.product_id');
		$save->save();
		$f3->reroute('/administration/product-options/'.$f3->get('POST.product_id'));

	}

	function addOptionFieldSave($f3) {
		$save=new \DB\SQL\Mapper($f3->get('DB'), 'opt_fields');
		//$save->copyFrom('POST');
		$save->id_opt=$f3->get('POST.id_opt');
		$save->name_field=$f3->get('POST.name_field');
		$save->price=$f3->get('POST.price');
		$save->save();
		$f3->reroute('/administration/product-options/'.$f3->get('POST.id_products'));

	}

	function deleteOptionField($f3) {
		$delete=new \DB\SQL\Mapper($f3->get('DB'), 'opt_fields');
		$delete->load(array('id=?',$f3->get('PARAMS.field_id')));
		$delete->erase();
		//$f3->get('DB')->exec('DELETE FROM gallery WHERE id=?;', $f3->clean($f3->get('PARAMS.id')) );
		//var_dump(expression);
		$f3->reroute('/administration/product-options/'.$f3->get('PARAMS.product_id'));
	}

	function deleteOption($f3) {
		$delete=new \DB\SQL\Mapper($f3->get('DB'), 'options');
		$delete->load(array('id=?',$f3->get('PARAMS.opt_id')));
		$delete->erase();
		//$f3->get('DB')->exec('DELETE FROM gallery WHERE id=?;', $f3->clean($f3->get('PARAMS.id')) );
		//var_dump(expression);
		$f3->reroute('/administration/product-options/'.$f3->get('PARAMS.product_id'));
	}

}