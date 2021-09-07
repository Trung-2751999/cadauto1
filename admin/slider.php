<!DOCTYPE html>
<html>
<head>
	<title>SLIDER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php include_once 'link.html'; ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
</head>
<body>
	<?php include_once 'header.php';  ?>
	<div class="content">
			<div class="menu">
				<a href="trangchu.php"><div class="quan-ly-san-pham" style="background-color: #3C3434; color: #FF0606">QUẢN LÝ SẢN PHẨM</div></a>
				<div class="tai-khoan-nguoi-dung">TÀI KHOẢN NGƯỜI DÙNG</div>
				<div class="lich-su-giao-dich">LỊCH SỬ GIAO DỊCH</div>
				<div class="lich-su-nap-the">LỊCH SỬ NẠP THẺ</div>
				<div class="tai-khoan-cong-su">TÀI KHOẢN CỘNG SỰ</div>
				<div class="doi-thong-tin-admin">ĐỔI THÔNG TIN ADMIN</div>
			</div>
				<table class="table">
					<tr>
						<th width="5.4%">STT</th>
						<th width="44.66%%">TÊN SẢN PHẨM</th>
						<th width="22.86%">LOẠI SẢN PHẨM</th>
						<th width="12.78%%">HÌNH ẢNH</th>
						<th width="12.87%">ACTION</th>
					</tr>
					<tr>
						<td>1</td>
						<td>THIẾT KẾ NHÀ MÁY SẢN XUẤT SỮA TƯƠI TIỆT TRÙNG</td>
						<td>ĐỒ ÁN TỐT NGHIỆP</td>
						<td>IMAGE</td>
						<td>XÓA</td>
					</tr>
					<tr>
						<td>1</td>
						<td>THIẾT KẾ NHÀ MÁY SẢN XUẤT SỮA TƯƠI TIỆT TRÙNG</td>
						<td>ĐỒ ÁN TỐT NGHIỆP</td>
						<td>IMAGE</td>
						<td>XÓA</td>
					</tr>
					<tr>
						<td>1</td>
						<td>THIẾT KẾ NHÀ MÁY SẢN XUẤT SỮA TƯƠI TIỆT TRÙNG</td>
						<td>ĐỒ ÁN TỐT NGHIỆP</td>
						<td>IMAGE</td>
						<td>XÓA</td>
					</tr>
					<tr>
						<td>1</td>
						<td>THIẾT KẾ NHÀ MÁY SẢN XUẤT SỮA TƯƠI TIỆT TRÙNG</td>
						<td>ĐỒ ÁN TỐT NGHIỆP</td>
						<td>IMAGE</td>
						<td>XÓA</td>
					</tr>
				</table>
				<div class="container-o-menu-phu">
						<div class="o-menu-phu" style="background-color: #3C3434; color: #FF0606">SLIDER</div>
						<div class="o-menu-phu">TRANG CHU</div>
				</div>
				<div class="tai-khoan-cong-su-menu-phu">
						<a href="thongtincongsu.php"><div class="o-menu-phu">THONG TIN CONG SU</div></a>
						<a href="themcongsu.php"><div class="o-menu-phu">THEM CONG SU</div></a>
						<a href="quanlydangbai.php"><div class="o-menu-phu"><a href="quanlydangbai.php">QUAN LY BAI DANG</div></a>
				</div>
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