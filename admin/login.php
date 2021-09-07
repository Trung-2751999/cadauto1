
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Cadauto</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
	<?php
	include_once '../classes/login.php';
	?>
	<?php 
		$adminlogin = new adminlogin();
		if(isset($_POST['admin'])){
			$admin_name=$_POST['admin_name'];
			$admin_pass=md5($_POST['admin_pass']);
			$get_adminlogin=$adminlogin->login_admin($admin_name,$admin_pass);
		}
		$congsulogin = new congsulogin();
		if(isset($_POST['congsu'])){
			$congsu_name=$_POST['congsu_name'];
			$congsu_pass=md5($_POST['congsu_pass']);
			$get_congsulogin=$congsulogin->login_congsu($congsu_name,$congsu_pass);
		}
	 ?>

</head>
<body>
	<form method="post">
		<div class="container">
				<div class="admin_login">
					<div class="login">
					<h1>ĐĂNG NHẬP ADMIN </h1>
					<center>
					<?php 
						if(isset($get_adminlogin)){
							echo $get_adminlogin;
						}
					 ?>
					</center>
					<div><input type="text" name="admin_name" placeholder="Tên đăng nhập" /></div>
					<div><input type="password" name="admin_pass" placeholder="Mật khẩu" /></div>
					<center><input class="submit" type="submit" name="admin" value="ĐĂNG NHẬP"></center>
					</div>
				</div>
			<div class="congsu_login">
				<div class="login">
				<h1>ĐĂNG NHAP CONG SU </h1>
				<center>
					<?php 
						if(isset($get_congsulogin)){
							echo $get_congsulogin;
						}
					 ?>
				</center>
				<div><input type="text" name="congsu_name" placeholder="Tên đăng nhập" /></div>
				<div><input type="password" name="congsu_pass" placeholder="Mật khẩu" /></div>
				<center><input class="submit" type="submit" name="congsu" value="ĐĂNG NHẬP"></center>
				</div>
			</div>
		</div>
	</form>	

</body>
</html>