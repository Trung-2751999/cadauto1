<?php 
include_once('../li/session.php');
include_once('../classes/changeinfo.php');
Session::init();
?>
<?php
$change= new changeinfo;  
if(isset($_POST['change'])){
	$change_info=$change->changeinfo_congsu($_POST);
	echo "<script>alert('$change_info')</script>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Đổi thông tin</title>
	<meta charset="utf-8">
	<?php include_once 'link.html'; ?>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
</head>
<body>
	<style type="text/css">
		td{
		padding-top:3%;
		}
	</style>
	
		<div class="logo-bar">
			<div class="logo"></div>
		</div>
	<div class="left" style="float: left">
	<?php include_once 'avartarcongsu.php'; ?>			
				<div class="content">
					<div class="menu">
						<div class="quan-ly-san-pham"><a href="trangchucongsu.php">QUẢN LÝ BÀI ĐĂNG</div>
						<div class="tai-khoan-nguoi-dung"><a href="lichsudangbaicongsu.php">LỊCH SỬ BÀI ĐĂNG</a></div>
						<div class="lich-su-giao-dich"style="background-color: #3C3434; color: #FF0606">ĐỔI THÔNG TIN</div>
					</div>
					<div class="container-o-menu-phu">
							<div class="o-menu-phu">SLIDER</div>
							<div class="o-menu-phu">TRANG CHU</div>
							<div class="o-menu-phu">DO AN THIET BI</div>
							<div class="o-menu-phu">DO AN CONG NGHE</div>
							<div class="o-menu-phu">DO AN TOT NGHIEP</div>
							<div class="o-menu-phu">THEM SAN PHAM</div>
					</div>
					<div class="tai-khoan-cong-su-menu-phu">
							<div class="o-menu-phu">THONG TIN CONG SU</div> 
							<div class="o-menu-phu">THEM CONG SU</div>
							<div class="o-menu-phu">QUAN LY BAI DANG</div>
					</div>
				</div>
	</div>
	<div class="right">
		<form method="post">
		<table class="add-thong-tin">
			<?php
				$show=$change->show_info_congsu()->fetch_assoc();
			 ?>
			<tr>
				<td><label>TÊN ĐĂNG NHẬP:</label></td>
				<td><input type="text" name="user" value="<?php echo $show['congsu_name'] ?>"></td>
			</tr>
			<tr>
				<td><label>TÊN CỘNG SỰ:</label></td>
				<td><input type="text" name="congsu_name"value="<?php echo $show['ten_congsu'] ?>"></td>
			</tr>
			<tr>
				<td><label>MẬT KHẨU:</label></td>
				<td><input type="password" name="pass_2"value="<?php echo $show['congsu_pass'] ?>"></td>
			</tr>
			<tr>
				<td><label>NHẬP LẠI MẬT KHẨU:</label></td>
				<td><input type="password" name="pass"value="<?php echo $show['congsu_pass'] ?>"></td>
			</tr>
		</table>
		<center><input style="margin-top: 3% " type="submit" name="change" value="UPDATE"></center>
	</form>
	</div>
</body>
</html>