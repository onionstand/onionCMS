<?php
namespace admin;

class toolsClass{
    function imgCaptcha($f3) {
		$img_captcha=new \Image();
		$f3->set(
			'captcha',$f3->base64(
				($img_captcha->captcha('/v_admin/fonts/thunder.ttf',16,4,'SESSION.captcha_code')->dump()),'image/png'
			)
		);
	}

	function elfinder($f3){
		echo \View::instance()->render('/admin/elfinder.php');
	}

}