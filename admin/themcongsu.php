<?php 
include_once('../li/session.php');
include_once('../classes/changeinfo.php');
Session::init();
?>

<?php
$change= new changeinfo; 
if(isset($_POST['post'])){
	$get_show=$change->insert_congsu($_POST);
	echo "<script>alert('$get_show')</script>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm cộng sự</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php include_once 'link.html' ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
</head>
<body>
				<div class="logo-bar">
					<a href="trangchu.php"><div class="logo"></div></a>
				</div>
	<div class="left" style="float: left">			
				<?php include_once 'avartaradmin.php'; ?>
				<div class="content">
				<div class="menu">
					<a href="quanlysanpham.php"><div class="quan-ly-san-pham">TRANG CHỦ</div></a>
					<a href="thongtinkhachhang.php"><div class="tai-khoan-nguoi-dung">TÀI KHOẢN NGƯỜI DÙNG</div></a>
					<a href="lichsugiaodich.php"><div class="lich-su-giao-dich">LỊCH SỬ GIAO DỊCH</div></a>
					<a href="lichsunapthe.php"><div class="lich-su-nap-the">LỊCH SỬ NẠP THẺ</div></a>
					<div class="tai-khoan-cong-su"style="background-color: #3C3434; color: #FF0606">TÀI KHOẢN CỘNG SỰ</div>
					<a href="doithongtinadmin.php"><div class="doi-thong-tin-admin">ĐỔI THÔNG TIN ADMIN</div></a>
				</div>
					<div class="container-o-menu-phu">
							<a href="quanlysanpham.php"><div class="o-menu-phu">QUẢN LÝ SẢN PHẨM</div></a>
					</div>
					<div class="tai-khoan-cong-su-menu-phu">
							<a href="thongtincongsu.php"><div class="o-menu-phu">THONG TIN CONG SU</div></a>
							<div class="o-menu-phu"style="background-color: #3C3434; color: #FF0606">THEM CONG SU</div>
							<a href="quanlydangbai.php"><div class="o-menu-phu">QUAN LY BAI DANG</div></a>
					</div>
				</div>
	</div>
	<div class="right">
		<table class="add-thong-tin">
			<form method="post">
			<tr>
				<td><label>TÊN ĐĂNG NHẬP:</label></td>
				<td><input type="text" name="user"></td>
			</tr>
			<tr>
				<td><label>TÊN CỘNG SỰ:</label></td>
				<td><input type="text" name="congsu_name"></td>
			</tr>
			<tr>
				<td><label>MẬT KHẨU:</label></td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td><label>NHẬP LẠI MẬT KHẨU:</label></td>
				<td><input type="password" name="pass_2"></td>
			</tr>
		</table>
		<center><input type="submit" name="post" value="POST"></center>
	</form>
	</div>
</body>
<script type="text/javascript">
	$('.quan-ly-san-pham').mouseover(function(){
		$('.container-o-menu-phu').css('display','block');
	});
	$('.tai-khoan-nguoi-dung, .lich-su-giao-dich, .lich-su-nap-the, .tai-khoan-cong-su, .doi-thong-tin-admin').mouseover(function(){
		$('.container-o-menu-phu').css('display','none');
	});
	$('.tai-khoan-cong-su').mouseover(function(){
		$('.tai-khoan-cong-su-menu-phu').css('display','block');
	});
	$('.tai-khoan-nguoi-dung, .lich-su-giao-dich, .lich-su-nap-the, .quan-ly-san-pham, .doi-thong-tin-admin').mouseover(function(){
		$('.tai-khoan-cong-su-menu-phu').css('display','none');
	});
	$(window).click(function(){
		$('.container-o-menu-phu').css('display','none');
		$('.tai-khoan-cong-su-menu-phu').css('display','none');
	});
</script>
</html>