<?php

$f3=require('lib/base.php');
$f3->set('DEBUG',2);
$f3->config('app/config.ini');
$f3->set('DB',new DB\SQL($f3->get('DATABASE_CONNECTION.0'),$f3->get('DATABASE_CONNECTION.1'),$f3->get('DATABASE_CONNECTION.2')));

$f3->route('GET /','Front->welcome');

$f3->route('GET /login','Admin->login');
$f3->route('POST /login','Admin->authUser');
$f3->route('GET /logout','Admin->logout');

$logged_in = new Admin();
if ($logged_in->isLoggedIn($f3)) {
	$f3->route('GET /administration','Admin->administration');
	$f3->route('GET /administration/add_news','Admin->addNews');
	$f3->route('POST /administration/add_news','Admin->addNewsSave');
	$f3->route('GET /administration/image_manager','Admin->imageManager');
	$f3->route('POST /administration/image_manager','Admin->imageManagerUpload');
	
}

$f3->run();
