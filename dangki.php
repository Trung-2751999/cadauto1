<?php include_once('./classes/dangki.php');  ?>
<?php 
	$dangki=new dangki;
	if(isset($_POST['post'])){
		$login=$dangki->dangki($_POST);
		echo "<script>alert('$login')</script>";
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
			<div class="tieu-de">ĐĂNG KÍ</div>
			<div class="content-dang-ki">
			<form method="post">
				<div class="input-dangki">
					<input type="text" name="user" placeholder="Tên đăng nhập">
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
				<div class="input-dangki">
					<input type="text" name="name" placeholder="Tên người dùng">
				</div>
				<div class="input-dangki">
					<input type="date" name="birthday" placeholder="Ngày sinh">
				</div>
				<div class="input-dangki">
					<input type="number" min="10000000" name="phone" placeholder="Số điện thoại">
				</div>
				<div class="dangki-submit">
					<input  type="submit" name="post" value="ĐĂNG KÍ" >
				</div>
			</form>
			</div>
		</div>
		<div class="footer">
				<?php include_once './inc/footer.php' ?>
		</div>
	</div>
</body>
<script type="text/javascript">
	$('.close-dang-nhap').click(function(){
		$('.background-dangnhap').css('display','none');
		$('.body').css('display','block');
	});
	$('.dang-nhap').click(function(){
		$('.body').css('display','none');
		$('.background-dangnhap').css('display','block');
	})
</script>
</html>