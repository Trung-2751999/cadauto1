<!DOCTYPE html>
<html>
<head>
	<title>Thông tin khách hàng</title>
	<?php include_once 'link.html'; ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include_once 'header.php';  ?>
	<div class="content">
			<div class="menu">
				<a href="quanlysanpham.php"><div class="quan-ly-san-pham">TRANG CHỦ</div></a>
				<div class="tai-khoan-nguoi-dung" style="background-color: #3C3434; color: #FF0606">TÀI KHOẢN NGƯỜI DÙNG</div>
				<a href="lichsugiaodich.php"><div class="lich-su-giao-dich">LỊCH SỬ GIAO DỊCH</div></a>
				<a href="lichsunapthe.php"><div class="lich-su-nap-the">LỊCH SỬ NẠP THẺ</div></a>
				<div class="tai-khoan-cong-su">TÀI KHOẢN CỘNG SỰ</div>
				<a href="doithongtinadmin.php"><div class="doi-thong-tin-admin">ĐỔI THÔNG TIN ADMIN</div></a>
			</div>
			<div class="container-menu">
				<table id="example" class="table table-striped table-bordered" >
					<thead>
						<tr>
							<th width="0%">STT</th>
							<th width="18%">TÊN NGƯỜI DÙNG</th>
							<th width="19.35%">TÊN ĐĂNG NHẬP</th>
							<th width="20.61%">MẬT KHẨU</th>
							<th width="24.21%">MẬT KHẨU CẤP 2</th>
							<th>NGÀY SINH</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>TRUNG</td>
							<td>QQQQQQQQQQQQ</td>
							<td>123456</td>
							<td>123456</td>
							<td>27-5-1999</td>
						</tr>
						<tr>
							<td>1</td>
							<td>TRUNG</td>
							<td>QQQQQQQQQQQQ</td>
							<td>123456</td>
							<td>123456</td>
							<td>27-5-1999</td>
						</tr>
						<tr>
							<td>1</td>
							<td>TRUNG</td>
							<td>QQQQQQQQQQQQ</td>
							<td>123456</td>
							<td>123456</td>
							<td>27-5-1999</td>
						</tr>
						<tr>
							<td>1</td>
							<td>TRUNG</td>
							<td>QQQQQQQQQQQQ</td>
							<td>123456</td>
							<td>123456</td>
							<td>27-5-1999</td>
						</tr>
					</tbody>
				</table>
			</div>
				<div class="container-o-menu-phu">
						<a href=quanlysanpham.php><div class="o-menu-phu">QUẢN LÝ SẢN PHẨM</div></a>
				</div>
				<div class="tai-khoan-cong-su-menu-phu">
						<a href="thongtincongsu.php"><div class="o-menu-phu">THONG TIN CONG SU</div></a>
						<a href="themcongsu.php"><div class="o-menu-phu">THEM CONG SU</div></a>
						<a href="quanlydangbai.php"><div class="o-menu-phu">QUAN LY BAI DANG</div></a>
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
 <script type="text/javascript">
 	$(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
</html>