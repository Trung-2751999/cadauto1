<?php 
	include_once('../classes/admin.php');
	include_once('../li/session.php');
	Session::init();
	$pd=new admin();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý bài đăng</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php include_once 'link.html';?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include_once 'header.php';  ?>
	<div class="content">
			<div class="menu">
				<a href="quanlysanpham.php"><div class="quan-ly-san-pham">TRANG CHỦ</div></a>
				<a href="thongtinkhachhang.php"><div class="tai-khoan-nguoi-dung">TÀI KHOẢN NGƯỜI DÙNG</div></a>
				<a href="lichsugiaodich.php"><div class="lich-su-giao-dich">LỊCH SỬ GIAO DỊCH</div></a>
				<a href="lichsunapthe.php"><div class="lich-su-nap-the">LỊCH SỬ NẠP THẺ</div></a>
				<div class="tai-khoan-cong-su"style="background-color: #3C3434; color: #FF0606">TÀI KHOẢN CỘNG SỰ</div>
				<a href="doithongtinadmin.php"><div class="doi-thong-tin-admin">ĐỔI THÔNG TIN ADMIN</div></a>
			</div>
			</div>
			<div class="container-menu">
				<table id="example" class="table table-striped table-bordered" >
					<thead>
						<tr>
							<th width="5.4%">STT</th>
							<th width="15.57%">TÊN CỘNG SỰ</th>
							<th width="18.63%">TÊN ĐĂNG NHẬP</th>
							<th width="43.27%">TÊN SẢN PHẨM</th>
							<th>THỜI GIAN</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show=$pd->show_products();
							$i=1;
							if($show){
							while ($result=$show->fetch_assoc()) {
						 ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $result['ten_congsu']; ?></td>
							<td><?php echo $result['congsu_name']; ?></td>
							<td><a href="sanphamcongsu.php?id=<?php echo $result['product_id'] ?>"><?php echo $result['product_name'] ?></a></td>
							<td><?php echo date('d-m-Y H:i:s',strtotime($result["date_product"]));?></td>
						</tr>
						<?php 
							}
						}
						 ?>
					</tbody>
				</table>
			</div>
				<div class="container-o-menu-phu" style="margin-left: 17.125vw">
						<a href=quanlysanpham.php><div class="o-menu-phu">QUẢN LÝ SẢN PHẨM</div></a>
				</div>
				<div class="tai-khoan-cong-su-menu-phu"style="margin-left: 17.125vw">
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
	});
</script>
</html>