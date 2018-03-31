<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title><?php echo $head_title;?></title>
		<link rel="stylesheet" href="/v_admin/css/reset.css">
		<link rel="stylesheet" href="/v_admin/css/styles.css">
		

	</head>
	<body>
		<div class="wrapper_login">
			<h1>Login:</h1>
			<?php if ($alarm) {
				echo '<p>'.$alarm.'</p>';
			}?>
			<div class="login_box">
				<form method="post">
					<div>
						<label for="name">Username</label>
						<input type="text" name="name" id="name" required>
					</div>
					<div>
						<label for="password">Password</label>
						<input type="password" name="password" id="password" required>
					</div>
					<div >
						<img src="<?php echo $captcha;?>" title="captcha" />
					</div>
					<div>
						<label>Captcha </label>
						<input type="text" id="captcha" name="captcha" required>
									
					</div>
					<div>
						<input type="submit" name="login" value="Login">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>