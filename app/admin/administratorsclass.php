<?php
namespace admin;

class administratorsClass{
	function editUser($f3) {
		$f3->set('html_title','Administration - Add User');

		$fields = array('id','name','email','level');
		$user_query=new \DB\SQL\Mapper($f3->get('DB'),'user',$fields);
		$user=$user_query->find();
		$f3->set('user',$user);
		$f3->set('content','admin/users/admin_edit_user.php');
		echo \View::instance()->render('admin/layout.php');
	}
	function editUserNewUserSave($f3) {
		if($this->checkNameAvailability($f3,$f3->get('POST.name'))) {
			$f3->set('alarm','That username is not available');
			$f3->set('html_title','Administration - Add User');
			$fields = array('id','name','email','level');
			$user_query=new \DB\SQL\Mapper($f3->get('DB'),'user',$fields);
			$user=$user_query->find();
			$f3->set('user',$user);
			$f3->set('content','admin/users/admin_edit_user.php');
			echo \View::instance()->render('admin/layout.php');
		}
		else{
			$add_user=new \DB\SQL\Mapper($f3->get('DB'),'user');
			$add_user->copyFrom('POST');
			$crypt = \Bcrypt::instance();
	        $new_password = $crypt->hash($f3->get('POST.password'));
			$add_user->password=$new_password;
			$add_user->save();
			$f3->reroute('/administration/edit_user');
		}
	}
	function changeUserDetails ($f3) {
		$user_details=new \DB\SQL\Mapper($f3->get('DB'),'user');
		if ($f3->get('POST.name')){
			$id_user=$f3->get('POST.id');
			$user_details->load(array('id=?',$id_user));
			$user_details->copyTo('POST');
			$f3->set('html_title','Administation - change user details');
			$f3->set('content','admin/users/admin_edit_user_details.php');
			echo \View::instance()->render('admin/layout.php');
		}
	}
	function changeUserDetailsPost ($f3) {
		$user_details=new \DB\SQL\Mapper($f3->get('DB'),'user');
		if ($f3->get('POST.name')){
			$id_user=$f3->get('POST.id');
			if($this->checkNameAvailability($f3, $f3->get('POST.name'),$f3->get('POST.id'))) {

				$f3->set('alarm','That username is already in use!');
				$f3->set('html_title','Administration-Edit user dtails');
				$f3->set('content','/admin/users/admin_error.php');
				echo \View::instance()->render('admin/layout.php');
			}
			else{
				var_dump($f3->get('POST'));
				$user_details->load(array('id=?',$f3->get('POST.id')));
				//$user_details->copyFrom('POST');
				$user_details->name=$f3->get('POST.name');
				$user_details->email=$f3->get('POST.email');
				$user_details->user_level=$f3->get('POST.level');
				$user_details->save();
				$f3->reroute('/administration/edit_user');
			}
		}
	}

	function changeUserDetailsPasswordSave ($f3) {
		$user_details=new \DB\SQL\Mapper($f3->get('DB'),'user');
		if ($f3->get('POST.id')){
			$id_user=$f3->get('POST.id');
			$user_details->load(array('id=?',$id_user));
			$crypt = \Bcrypt::instance();
        	$new_password = $crypt->hash($f3->get('POST.password'));
			$user_details->password=$new_password;
			$user_details->save();
			$f3->reroute('/administration/edit_user');
		}
	}

	function changeUserDetailsPassword ($f3) {
		$f3->set('html_title','Administration-Edit user password');
		$f3->set('id_user',$f3->get('PARAMS.id'));
		$f3->set('content','admin/users/admin_edit_user_password.php');
		echo \View::instance()->render('admin/layout.php');
	}
}