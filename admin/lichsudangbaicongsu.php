<!DOCTYPE html>
<html>
<head>
	<title>Lịch sử đăng bài</title>

	<?php
	 include_once 'link.html';
	 include_once '../li/session.php';
	 include_once '../classes/product.php';
	 include_once '../classes/changeinfo.php'; 
	 Session::checkSession_congsu(); 
	 Session::init(); 
		if(isset($_GET['action']) && $_GET['action']=='logout'){
			session::destroy();
		}
	$change=new changeinfo;
	$result=$change->show_info_congsu()->fetch_assoc();
	$pd=new product;
	$result_product=$pd->count_success()->fetch_assoc();
	$result_dont_success=$pd->count_dont_success()->fetch_assoc();
	 ?>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
	 <link rel="stylesheet" type="text/css" href="css/all.min.css">
</head>
<body>
	<header>
			<div class="logo-bar">
				<div class="logo"></div>
			</div>
			<div class="inf-user">
				<div class="user-name">
					<div class="avartar"><i style="margin-left: 25%;margin-top:20%;font-size: 4vw;color: white" class="fas fa-user"></i></div>
					<div class="name"><?php echo $result['congsu_name']; ?></div>
					<div class="log-out"><a href="?action=logout"><i style="margin-bottom:1vw;font-size: 2vw;" class="fas fa-power-off"></i></a></div>
				</div>
				<div class="money-and-cus">
					<div class="money">
						<div class="des-img-money"></div>
						<div class="money-number"><?php echo $result_product["COUNT('status')"] ?></div>
					</div>
					<div class="cus">
						<div class="des-img-cus"></div>
						<div class="cus-number"><?php echo $result_dont_success["COUNT('status')"] ?></div>
					</div>
				</div>
			</div>
	</header>
	<div class="content">
			<div class="menu">
				<div class="quan-ly-san-pham"><a href="trangchucongsu.php">QUẢN LÝ BÀI ĐĂNG</a></div>
				<div class="tai-khoan-nguoi-dung"style="background-color: #3C3434; color: #FF0606">LỊCH SỬ BÀI ĐĂNG</div>
				<div class="lich-su-giao-dich"><a href="doithongtincongsu.php">ĐỔI THÔNG TIN</a></div>
			</div>
			<div class="container-menu">
				<table id="example" class="table table-striped table-bordered" >
					<thead>
						<tr>
							<th width="5.4%">STT</th>
							<th width="54%">TÊN SẢN PHẨM</th>
							<th width="20%">THỜI GIAN ĐĂNG BÀI</th>
							<th width="">TRẠNG THÁI</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$pd=new product();
						$i=1;
						$get_product=$pd->get_product();
						if($get_product){
						while($result=$get_product->fetch_assoc()) {
						 ?>
						<tr>
							<td><?php echo $i++;  ?></td>
							<td><a href="thongtinbaidangcongsu.php?product=<?php echo $result['product_id'] ?>"><?php echo $result['product_name']; ?></a></td>
							<td><?php echo date('d-m-Y H:i:s',strtotime($result["date_product"]));?></td>
							<td><?php echo $result['status'];  ?></td>
						</tr>
						<?php 
						}
					}
						 ?>
					</tbody>
				</table>
			</div>
	</div>
</body>
 <script type="text/javascript">
 	$(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
</html>