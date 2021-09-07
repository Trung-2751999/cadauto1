<?php 
	include_once './classes/dangki.php';
	include_once './li_index/session.php';
	Session::init();
	Session::checkSession_customer(); 
 ?>
<?php 
	if(isset($_POST['post'])){
		$update=new dangki;
		$result=$update->doi_mat_khau($_POST);
		echo "<script>alert('$result')</script>";
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
			<div class="tieu-de">ĐỔI MẬT KHẨU</div>
			<div class="content-dang-ki">
				<form method="post">
					<div class="input-dangki">
						<input type="password" name="pass" placeholder="Mật khẩu cũ">
					</div>
					<div class="input-dangki">
						<input type="password" name="pass_new" placeholder="Mật khẩu mới">
					</div>
					<div class="input-dangki">
						<input type="password" name="pass_new_2" placeholder="Nhập lại mật khẩu mới">
					</div>
					<div class="input-dangki">
						<input type="password" name="pass_2" placeholder="Mật khẩu cấp 2">
					</div>
					<div class="input-dangki">
						<input type="password" name="pass_3" placeholder="Nhập lại mật khẩu cấp 2">
					</div>
					<div class="dangki-submit">
						<input style="margin-left:8.5vw"  type="submit" name="post" value="XÁC NHẬN" >
						<div class="doi-mat-khau-cap-2"><a href="doimatkhaucap2.php">ĐỔI MẬT KHẨU CẤP 2</a></div>
					</div>
				</form>
			</div>
		</div>
		<div class="footer">
				<?php include_once './inc/footer.php' ?>
		</div>
	</div>
</body>
</html>