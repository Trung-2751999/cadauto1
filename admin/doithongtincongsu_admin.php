<?php 
include_once('../li/session.php');
include_once('../classes/changeinfo.php');
Session::init();
?>

<?php
$change= new changeinfo; 
if(isset($_GET['action'])){
	$id=$_GET['action'];
	$get_show=$change->show_info_congsu_admin($id);
} 
if(isset($_POST['change'])){
	$id=$_GET['action'];
	$change_info=$change->changeinfo_congsu_admin($_POST,$id);
	echo "<script>alert('$change_info')</script>";
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
					<div class="quan-ly-san-pham">QUẢN LÝ SẢN PHẨM</div>
					<div class="tai-khoan-nguoi-dung">TÀI KHOẢN NGƯỜI DÙNG</div>
					<div class="lich-su-giao-dich">LỊCH SỬ GIAO DỊCH</div>
					<div class="lich-su-nap-the">LỊCH SỬ NẠP THẺ</div>
					<div class="tai-khoan-cong-su"style="background-color: #3C3434; color: #FF0606">TÀI KHOẢN CỘNG SỰ</div>
					<div class="doi-thong-tin-admin">ĐỔI THÔNG TIN ADMIN</div>
				</div>
					<div class="container-o-menu-phu">
							<a href=quanlysanpham.php><div class="o-menu-phu">QUẢN LÝ SẢN PHẨM</div></a>
					</div>
					<div class="tai-khoan-cong-su-menu-phu">
							<a href="thongtincongsu.php"><div class="o-menu-phu">THONG TIN CONG SU</div></a>
							<div class="o-menu-phu">THEM CONG SU</div>
							<div class="o-menu-phu">QUAN LY BAI DANG</div>
					</div>
				</div>
	</div>
	<div class="right">
		<form method="post">
		<table class="add-thong-tin">
			<?php
				if($get_show){
					$show=$get_show->fetch_assoc();
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
				<td><input type="password" name="pass"value="<?php echo $show['congsu_pass'] ?>"></td>
			</tr>
			<tr>
				<td><label>NHẬP LẠI MẬT KHẨU:</label></td>
				<td><input type="password" name="pass_2"value="<?php echo $show['congsu_pass'] ?>"></td>
			</tr>
			<?php 
				}
			 ?>
		</table>
		<center><input style="margin-top: 3% " type="submit" name="change" value="UPDATE"></center>
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