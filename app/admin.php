<?php
class Admin{
//login to cms
	function login($f3) {
		if ($f3->get('SESSION.poweradmin')) $f3->reroute('/administration');
		$f3->clear('alarm');
		$f3->set('alarm','0');
		$f3->set('html_title','Login');
		$this->imgCaptcha($f3);
    	$f3->set('content','login.php');
    	echo View::instance()->render('layout_admin.php');
	}

	function logout($f3) {
		$f3->clear('SESSION');
		$f3->reroute('/');
		$f3->clear('BACKEND_USER');
	}

	function authUser($f3) {
		if ($f3->get('POST.captcha')===$f3->get('SESSION.captcha_code')){
			$administrator=new DB\SQL\Mapper($f3->get('DB'),'user');
	        $administrator->load(array('name=?', $f3->get('POST.name')));
	        $crypt= \Bcrypt::instance();
	        $pass= $crypt->verify($f3->get('POST.password'), $administrator->password);
			if($pass === TRUE) {
				$administrator->load(array('name=?',$f3->get('POST.name')));
				$f3->set('SESSION.poweradmin',$administrator->name);
				$f3->set('SESSION.poweradmin_id',$administrator->id);
				$f3->reroute('/administration');
			}
			else {
				$f3->clear('alarm');
				$f3->set('alarm','Logovanje je neuspesno');
				$f3->set('html_title','Neuspesno logovanje');
				
				$this->imgCaptcha($f3);

				$f3->set('content','login.php');
				echo View::instance()->render('layout_admin.php');
			}
		}
		else {
				$f3->clear('alarm');
				$f3->set('alarm','Pogrešan captcha kod.');
				$f3->set('html_title','Neuspešno logovanje');
				
				$this->imgCaptcha($f3);

				$f3->set('content','login.php');
				echo View::instance()->render('layout_admin.php');
			}
	}

	function isLoggedIn($f3) {
        if ($f3->exists('SESSION.poweradmin')) {
            $administrator=new DB\SQL\Mapper($f3->get('DB'),'user');
            $administrator->load(array('name=?',$f3->get('SESSION.poweradmin')));
            if(!$administrator->dry()) {
                $f3->set('BACKEND_USER',$administrator->name);
                return true;
            }
        }
        return false;
    }
//Captcha for login,
    function imgCaptcha($f3) {
		$img_captcha=new Image();
		$f3->set(
			'captcha',$f3->base64(
				($img_captcha->captcha('fonts/thunder.ttf',16,5,'SESSION.captcha_code')->dump()),'image/png'
			)
		);
	}
//end of login to cms

//check name availability $f3->get('POST.name')
	 function checkNameAvailability($f3,$name,$id=0) {
	 	if ($id===0) {
	 		$check_name=new DB\SQL\Mapper($f3->get('DB'),'user');
			$check_name_bool=$check_name->findone(array('name = ?',$name));
			return $check_name_bool;
	 	}
	 	else{
	 		$check_name=new DB\SQL\Mapper($f3->get('DB'),'user');
			$check_name_bool=$check_name->findone(array('name = ? AND id != ?',$name,$id));
			return $check_name_bool;
	 	}
	 }

//end check name availability


//New administartor
	function editUser($f3) {
		$f3->set('html_title','Administration - Add User');

		$fields = array('id','name','email','user_level');
		$user_query=new DB\SQL\Mapper($f3->get('DB'),'user',$fields);
		$user=$user_query->find();
		$f3->set('user',$user);
		$f3->set('content','admin_edit_user.php');
		echo View::instance()->render('layout_admin.php');
	}
	function editUserNewUserSave($f3) {
		if($this->checkNameAvailability($f3,$f3->get('POST.name'))) {
			$f3->set('alarm','That username is not available');
			$f3->set('html_title','Administration - Add User');
			$fields = array('id','name','email','user_level');
			$user_query=new DB\SQL\Mapper($f3->get('DB'),'user',$fields);
			$user=$user_query->find();
			$f3->set('user',$user);
			$f3->set('content','admin_edit_user.php');
			echo View::instance()->render('layout_admin.php');
		}
		else{
			$add_user=new DB\SQL\Mapper($f3->get('DB'),'user');
			$add_user->copyFrom('POST');
			$crypt = \Bcrypt::instance();
	        $new_password = $crypt->hash($f3->get('POST.password'));
			$add_user->password=$new_password;
			$add_user->save();
			$f3->reroute('/administration/edit_user');
		}
	}
	function changeUserDetails ($f3) {
		$user_details=new DB\SQL\Mapper($f3->get('DB'),'user');
		if ($f3->get('POST.name')){
			$id_user=$f3->get('POST.id');
			$user_details->load(array('id=?',$id_user));
			$user_details->copyTo('POST');
			$f3->set('html_title','Administation - change user details');
			$f3->set('content','admin_edit_user_details.php');
			echo View::instance()->render('layout_admin.php');
		}
	}
	function changeUserDetailsPost ($f3) {
		$user_details=new DB\SQL\Mapper($f3->get('DB'),'user');
		if ($f3->get('POST.name')){
			$id_user=$f3->get('POST.id');
			if($this->checkNameAvailability($f3, $f3->get('POST.name'),$f3->get('POST.id'))) {

				$f3->set('alarm','That username is already in use!');
				$f3->set('html_title','Administration-Edit user dtails');
				$f3->set('content','admin_error.php');
				echo View::instance()->render('layout_admin.php');
			}
			else{
				var_dump($f3->get('POST'));
				$user_details->load(array('id=?',$f3->get('POST.id')));
				//$user_details->copyFrom('POST');
				$user_details->name=$f3->get('POST.name');
				$user_details->email=$f3->get('POST.email');
				$user_details->user_level=$f3->get('POST.user_level');
				$user_details->save();
				$f3->reroute('/administration/edit_user');
			}
		}
	}

	function changeUserDetailsPassword ($f3) {
		$user_details=new DB\SQL\Mapper($f3->get('DB'),'user');
		if ($f3->get('POST.name')){
			$id_user=$f3->get('POST.id');
			$user_details->load(array('id=?',$id_user));
			$crypt = \Bcrypt::instance();
        	$new_password = $crypt->hash($f3->get('POST.password'));
			$user_details->password=$new_password;
			$user_details->save();
			$f3->reroute('/administration/edit_user');
		}
	}


	function administration($f3){
		$f3->set('html_title','Administration');
		$db=$f3->get('DB');
		$f3->set('all_news',$db->exec('SELECT * FROM news'));
		$f3->set('content','administration.php');
		echo View::instance()->render('layout_admin.php');
	}

//add news
	function addNews($f3) {
		$f3->set('html_title','Administration-add news');
		$f3->set('content','add_news.php');
		echo View::instance()->render('layout_admin.php');
	}

	function addNewsSave($f3) {
		$save_news=new DB\SQL\Mapper($f3->get('DB'),'news');
		$sef_title_not_unique=$save_news->findone(array('sef_title = ?',Web::instance()->slug($f3->get('POST.sef_title'))));
		if($sef_title_not_unique){
			$f3->clear('alarm');
			$f3->set('alarm','Sef title already exists.');
			$f3->set('html_title','Administration-add news');
			$f3->set('content','add_news.php');
			echo View::instance()->render('layout_admin.php');
		}
		else{
			$save_news->copyFrom('POST');
			$date_strtotime=strtotime( $f3->get('POST.date') );
			$date_for_base=date("Y-m-d",$date_strtotime);
			$save_news->date=$date_for_base;
			$save_news->sef_title=Web::instance()->slug($f3->get('POST.sef_title'));
			$save_news->save();
			$f3->reroute('/administration');
		}
	}

	function editNews($f3) {
		$f3->set('html_title','Administration-edit news');
		//$news_id=$f3->get('PARAMS.news_id');
		$news_query=new DB\SQL\Mapper($f3->get('DB'),'news');
		$news_query->load(array('id=?',$f3->get('PARAMS.news_id')));
		$news_query->copyTo('POST');

		$f3->set('content','add_news.php');
		echo View::instance()->render('layout_admin.php');
	}
	function editNewsSave($f3) {
		$edit_news=new DB\SQL\Mapper($f3->get('DB'),'news');
		$sef_title_not_unique=$edit_news->findone(array('sef_title = ? AND id != ?',Web::instance()->slug($f3->get('POST.sef_title')),$f3->get('POST.id')));
		if($sef_title_not_unique){
			$f3->clear('alarm');
			$f3->set('alarm','Sef title already exists.');
			$f3->set('html_title','Administration-add news');
			$f3->set('content','add_news.php');
			echo View::instance()->render('layout_admin.php');
		}
		else {
			$edit_news->load(array('id=?',$f3->get('POST.id')));
			$edit_news->copyFrom('POST');
			$date_strtotime=strtotime( $f3->get('POST.date') );
			$date_for_base=date("Y-m-d",$date_strtotime);
			$edit_news->date=$date_for_base;
			$edit_news->sef_title=Web::instance()->slug($f3->get('POST.sef_title'));
			$edit_news->save();
			$f3->reroute('/administration');
		}
	}

	function imageManager($f3) {
		$f3->set('html_title','Image Manager');
		$f3->set('files_images',scandir($f3->get('UPLOADS')."/tn"));
		//$f3->set('i',0);
		$f3->set('content','image_manager.php');
		echo View::instance()->render('layout_admin.php');
	}

//Image manager. Allowed: 1mb, jpeg.
	function imageManagerUpload($f3) {
		$file_upload=$f3->get('POST.file_for_upload');
		$overwrite=false;
		$slug=true;
		function callback($file_upload) {
			global $f3;
			if($file_upload['size'] > (1 * 1024 * 1024)){
				$f3->set('alarm','File is too big.');
				return false;
				
			}
			elseif ($file_upload['type'] != "image/jpeg"){
				$f3->set('alarm','File must be image/jpeg.');
				return false;
			}
			else {
				$f3->set('image_uploaded',$file_upload['name']);
				return true;
			}
		}
		$file_uploaded= Web::instance()->receive('callback', $overwrite, $slug);
		if ((current($file_uploaded))!==FALSE){
			$img=new \Image($f3->get('image_uploaded'));
			$img->resize(100,100);
			$f3->write(str_replace("uploads/", "uploads/tn/", $f3->get('image_uploaded')),$img->dump('jpeg'));
		}
		$f3->reroute('/administration/image_manager');
	}

	function imageManagerDelete($f3,$params) {
		unlink($f3->get('ROOT').'\\'.substr($f3->get('BASE'), 1).'\\uploads\\'.$params['image_name_delete']);
		unlink($f3->get('ROOT').'\\'.substr($f3->get('BASE'), 1).'\\uploads\\tn\\'.$params['image_name_delete']);
		$f3->reroute('/administration/image_manager');
	}
}