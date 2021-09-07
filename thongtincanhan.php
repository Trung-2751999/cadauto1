<?php 
	include_once('./classes/dangki.php'); 
	include_once './li_index/session.php';
	Session::init();
	Session::checkSession_customer(); 
?>
<?php 
	$show=new dangki;
	$result=$show->show_cus()->fetch_assoc();
 ?>
 <?php 
 	if(isset($_POST['post'])){
 		$update=$show->update_info($_POST);
 		echo "<script>alert('$update')</script>";
 		header('Refresh: 0.1; URL=thongtincanhan.php');
 	}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<?php include_once './inc/header.php'; ?>
	<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
</head>
<body>
	<?php include_once 'dangnhap.php'; ?>
	<div class="body">
		<div class="form-dang-ki">
			<div class="tieu-de">THÔNG TIN CÁ NHÂN</div>
			<div class="content-dang-ki">
			<form method="post">
				<div class="input-dangki">
					<input type="text" name="user" placeholder="Tên đăng nhập" value="<?php echo $result['ten_dang_nhap'] ?>">
				</div>
				<div class="input-dangki">
					<input type="text" name="name" placeholder="Tên người dùng" value="<?php echo $result['ten_nguoi_dung'] ?>">
				</div>
				<div class="input-dangki">
					<input type="date" name="birthday" placeholder="Ngày sinh" value="<?php echo $result['birthday'] ?>">
				</div>
				<div class="input-dangki">
					<input type="number" min="100000000" max="1000000000" name="phone" placeholder="Số điện thoại"value="<?php echo $result['phone'] ?>">
				</div>
				<div class="input-dangki">
					<input type="password" name="pass" placeholder="Mật khẩu">
				</div>
				<div class="input-dangki">
					<input type="password" name="pass_2" placeholder="Nhập lại mật khẩu">
				</div>
				<div class="input-dangki">
					<input type="password" name="pass_3" placeholder="Mật khẩu cấp 2">
				</div>
				<div class="input-dangki">
					<input type="password" name="pass_4" placeholder="Nhập lại mật khẩu cấp 2">
				</div>
				<div class="dangki-submit">
					<input style="margin-left:3.5vw"  type="submit" name="post" value="CẬP NHẬT" >
					<div class="doi-mat-khau"><a href="doimatkhau.php">ĐỔI MẬT KHẨU</a></div>
				</div>
			</form>
			</div>
		</div>
		<div class="so-du">
			<p style="color:red">SỐ DƯ TRONG TÀI KHOẢN CỦA BẠN LÀ:1000000 VND</p>
			<p>BẠN MUỐN NẠP THÊM</p>
			<p style="color:cyan">CLICK VÀO ĐÂY</p>
		</div>
		<div class="footer">
				<?php include_once './inc/footer.php' ?>
		</div>
	</div>
</body>
</html>