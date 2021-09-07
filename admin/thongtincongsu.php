<?php 
	include_once '../classes/admin.php';
	$ad=new admin;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin khách hàng</title>
	<?php include_once 'link.html'; ?>
</head>
<body>
	<?php include_once 'header.php';  ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<div class="content">
			<div class="menu">
				<a href="quanlysanpham.php"><div class="quan-ly-san-pham">TRANG CHỦ</div></a>
				<a href="thongtinkhachhang.php"><div class="tai-khoan-nguoi-dung">TÀI KHOẢN NGƯỜI DÙNG</div></a>
				<a href="lichsugiaodich.php"><div class="lich-su-giao-dich">LỊCH SỬ GIAO DỊCH</div></a>
				<a href="lichsunapthe.php"><div class="lich-su-nap-the">LỊCH SỬ NẠP THẺ</div></a>
				<div class="tai-khoan-cong-su"style="background-color: #3C3434; color: #FF0606">TÀI KHOẢN CỘNG SỰ</div>
				<a href="doithongtinadmin.php"><div class="doi-thong-tin-admin">ĐỔI THÔNG TIN ADMIN</div></a>
			</div>
			<div class="container-menu">
				<table id="example" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th width="5.4%">STT</th>
							<th width="47.3%">TEN NGUOI DUNG</th>
							<th width="47.3%">TEN TAI KHOAN</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show=$ad->show_all_congsu(); 
							$i=1;
							if($show){
								while ($result=$show->fetch_assoc()){
						 ?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><a href="doithongtincongsu_admin.php?action=<?php echo $result['congsu_id'] ?>"><?php echo $result['ten_congsu']; ?></a></td>
							<td><a href="doithongtincongsu_admin.php?action=<?php echo $result['congsu_id'] ?>"><?php echo $result['congsu_name']; ?></a></td>
						</tr>
						<?php 
						}
					}
						 ?>
					</tbody>
				</table>
				</div>
				<div class="container-o-menu-phu">
						<a href="quanlysanpham.php"><div class="o-menu-phu">QUAN LY SAN PHAM</div></a>
				</div>
				<div class="tai-khoan-cong-su-menu-phu">
						<div class="o-menu-phu"style="background-color: #3C3434; color: #FF0606">THONG TIN CONG SU</div> 
						<a href="themcongsu.php"><div class="o-menu-phu">THEM CONG SU</div></a>
						<a href="quanlydangbai.php"><div class="o-menu-phu">QUAN LY BAI DANG</div></a>
				</div>
	</div>
</body>
 <script type="text/javascript">
 	$(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
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