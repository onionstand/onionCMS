<?php

// Kickstart the framework
$f3=require('lib/base.php');

$f3->set('DEBUG',3);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('luka-bazuka/config.ini');

$f3->set('DB',new DB\SQL($f3->get('DATABASE_CONNECTION.0'),$f3->get('DATABASE_CONNECTION.1'),$f3->get('DATABASE_CONNECTION.2')));

$f3->route('GET /','front\pageclass->welcome');

$f3->route(array('GET /kategorija/@sef_url','GET /kategorija/@sef_url/@page'),'front\catproclass->category');
$f3->route('GET /proizvod/@sef_url','front\catproclass->product');

$f3->route('POST /korpa','front\cartclass->insertCart');
$f3->route('GET /korpa','front\cartclass->getCart');
$f3->route('GET /brisi-stavku/@cart_id','front\cartclass->deleteProdFromCart');
$f3->route('POST /slanje-narudzbine','front\cartclass->sendOrder');

$f3->route('GET /o-nama','front\pageclass->oNama');
$f3->route('GET /kontakt','front\pageclass->kontakt');
$f3->route('POST /kontakt','front\pageclass->slanjeEmail');

//search
$f3->route('GET /pretraga','front\toolsclass->siteSearch');

//login
$f3->route('GET /secretlogindoor','admin\loginclass->login');
$f3->route('POST /secretlogindoor','admin\loginclass->authUser');
$f3->route('GET /logout','admin\loginclass->logout');

$logged_in = new admin\loginclass();
if ($logged_in->isLoggedIn($f3)) {
	$f3->route('GET /administration','admin\administrationclass->administration');
	//Categories
	$f3->route(
		array('GET /administration/list-categories', 'GET /administration/list-categories/@page', 'POST /administration/list-categories'),
		'admin\categoryclass->listCategories'
	);
	$f3->route('GET /administration/add-category','admin\categoryclass->addCategory');
	$f3->route('POST /administration/add-category','admin\categoryclass->saveCategory');
	$f3->route('GET /administration/edit-category/@id','admin\categoryclass->editCategory');
	$f3->route('GET /administration/delete-category/@id','admin\categoryclass->deleteCategory');
	//Products
	$f3->route(
		array('GET /administration/list-products', 'GET /administration/list-products/@page', 'POST /administration/list-products'),
		'admin\productclass->listProducts'
	);
	$f3->route('GET /administration/add-product','admin\productclass->addProduct');
	$f3->route('POST /administration/add-product','admin\productclass->saveProduct');
	$f3->route('GET /administration/edit-product/@id','admin\productclass->editProduct');
	$f3->route('GET /administration/delete-product/@id','admin\productclass->deleteProduct');
	//gallery
	$f3->route('GET /administration/product-gallery/@product_id','admin\galleryclass->listGallery');
	$f3->route('POST /administration/product-gallery/@product_id','admin\galleryclass->addGallerySave');
	$f3->route('GET /administration/delete-gallery-image/@image_id/@product_id','admin\galleryclass->deleteGallery');
	$f3->route('POST /administration/gallery-sort-save','admin\galleryclass->gallerySortSave');
	//options
	$f3->route('GET /administration/product-options/@product_id','admin\optionsclass->listOptions');
	$f3->route('POST /administration/product-options','admin\optionsclass->addOptionSave');
	$f3->route('POST /administration/product-options-field','admin\optionsclass->addOptionFieldSave');
	$f3->route('GET /administration/delete-product-options-field/@field_id/@product_id','admin\optionsclass->deleteOptionField');
	$f3->route('GET /administration/delete-product-options/@opt_id/@product_id','admin\optionsclass->deleteOption');
	//pages
	$f3->route(
		array('GET /administration/list-pages', 'GET /administration/list-pages/@page', 'POST /administration/list-pages'),
		'admin\pageclass->listPages'
	);
	$f3->route('GET /administration/add-page','admin\pageclass->addPage');
	$f3->route('POST /administration/add-page','admin\pageclass->savePage');
	$f3->route('GET /administration/edit-page/@id','admin\pageclass->editPage');
	$f3->route('GET /administration/delete-page/@id','admin\pageclass->deletePage');

	//elfinder
	$f3->route('GET /elfinder_file','admin\toolsclass->elfinder');
	//Users
	$f3->route('POST /administration/edit_user_details','admin\administratorsclass->changeUserDetails');
	$f3->route('POST /administration/edit_user_details_save','admin\administratorsclass->changeUserDetailsPost');
	$f3->route('GET /administration/edit_user','admin\administratorsclass->editUser');
	$f3->route('POST /administration/edit_user','admin\administratorsclass->editUserNewUserSave');
	$f3->route('GET /administration/edit_user_change_password/@id','admin\administratorsclass->changeUserDetailsPassword');
	$f3->route('POST /administration/edit_user_password_save','admin\administratorsclass->changeUserDetailsPasswordSave');


}

$f3->run();
