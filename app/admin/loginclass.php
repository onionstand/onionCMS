<?php
namespace admin;

class loginClass{
//login to cms
	function login($f3) {
		if ($f3->get('SESSION.poweradmin')) $f3->reroute('/administration');
		$f3->clear('alarm');
		$f3->set('alarm','0');
		$f3->set('head_title','Login');
		$captcha = new \admin\toolsClass();
		$captcha->imgCaptcha($f3);
    	echo \View::instance()->render('admin/login.php');
	}

	function logout($f3) {
		$f3->clear('SESSION');
		$f3->reroute('/');
		$f3->clear('BACKEND_USER');
	}

	function authUser($f3) {
		if ($f3->get('POST.captcha')===$f3->get('SESSION.captcha_code')){
			$administrator=new \DB\SQL\Mapper($f3->get('DB'),'user');
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
				$f3->set('alarm','Login failed.');
				$f3->set('head_title','Login failed');
				
				$captcha = new \admin\toolsClass();
				$captcha->imgCaptcha($f3);
				echo \View::instance()->render('admin/login.php');
			}
		}
		else {
				$f3->clear('alarm');
				$f3->set('alarm','Wrong captcha code.');
				$f3->set('head_title','Login failed');
				
				$captcha = new \admin\toolsClass();
				$captcha->imgCaptcha($f3);
				echo \View::instance()->render('admin/login.php');
			}
	}

	function isLoggedIn($f3) {
        if ($f3->exists('SESSION.poweradmin')) {
            $administrator=new \DB\SQL\Mapper($f3->get('DB'),'user');
            $administrator->load(array('name=?',$f3->get('SESSION.poweradmin')));
            if(!$administrator->dry()) {
                $f3->set('BACKEND_USER',$administrator->name);
                return true;
            }
        }
        return false;
    }

}