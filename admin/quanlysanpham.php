
<?php 
	include_once '../classes/admin.php';
	$admin=new admin;
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$admin->delete_product($id);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý sản phẩm</title>
	<?php include_once 'link.html'; ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include_once 'header.php';  ?>
	<div class="content">
			<div class="menu">
				<div class="quan-ly-san-pham" style="background-color: #3C3434; color: #FF0606">TRANG CHU</div>
				<a href="thongtinkhachhang.php"><div class="tai-khoan-nguoi-dung">TÀI KHOẢN NGƯỜI DÙNG</div></a>
				<a href="lichsugiaodich.php"><div class="lich-su-giao-dich">LỊCH SỬ GIAO DỊCH</div></a>
				<a href="lichsunapthe.php"><div class="lich-su-nap-the">LỊCH SỬ NẠP THẺ</div></a>
				<div class="tai-khoan-cong-su">TÀI KHOẢN CỘNG SỰ</div>
				<a href="doithongtinadmin.php"><div class="doi-thong-tin-admin">ĐỔI THÔNG TIN ADMIN</div></a>
			</div>
			<div class="container-menu">
				<table id="example" class="table table-striped table-bordered" >
					<thead>
						<tr>
							<th width="5.4%">STT</th>
							<th width="44.66%%">TÊN SẢN PHẨM</th>
							<th width="22.86%">LOẠI SẢN PHẨM</th>
							<th width="12.78%%">GIÁ TIỀN</th>
							<th width="12.87%">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_product=$admin->show_product_admin();
							$i=1;
							if($show_product){
								while($result=$show_product->fetch_assoc()){
						 ?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><a href="thongtinsanpham.php?id=<?php echo $result['id'] ?>"><?php echo $result['product_name'] ?></td>
							<td><?php
								if($result['product_type']== '1'){
							 		echo 'ĐỒ ÁN THIẾT BỊ';
							 	}elseif($result['product_type']== '2'){
							 		echo 'ĐỒ ÁN CÔNG NGHỆ';
							 	}else{
							 		echo 'ĐỒ ÁN TỐT NGHIỆP';
							 	}
							 ?></td>
							<td><?php echo $result['price']." "."VND" ?></td>
							<td><a onclick="return confirm('Sẽ không có bản sao lưu. Bạn có chắc chắn muốn xóa sản phẩm này chứ !!!')" href="?delete=<?php echo $result['id'] ?>">XÓA</a></td>
						</tr>
						<?php 
							}
						}
						 ?>
					</tbody>
				</table>
			</div>
				<div class="container-o-menu-phu">
						<div class="o-menu-phu"style="background-color: #3C3434; color: #FF0606">QUAN LY SAN PHAM</div>
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