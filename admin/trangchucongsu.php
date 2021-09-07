<?php 
	include_once('../classes/product.php');
	Session::init();
	$pd=new product();
	if(isset($_POST['update'])){
		 $insertpd=$pd->insert_product($_POST,$_FILES);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ cộng sự</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php include_once 'link.html'; ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="js/setup.js" type="text/javascript"></script>
</head>
<body>
				<div class="logo-bar">
					<div class="logo"></div>
				</div>
				<div class="left" style="float: left">			
					<?php include_once 'avartarcongsu.php'; ?>
					<div class="content">
						<div class="menu">
							<div class="quan-ly-san-pham"style="background-color: #3C3434; color: #FF0606">QUẢN LÝ BÀI ĐĂNG</div>
							<div class="tai-khoan-nguoi-dung"><a href="lichsudangbaicongsu.php">LỊCH SỬ BÀI ĐĂNG</a></div>
							<div class="lich-su-giao-dich"><a href="doithongtincongsu.php">ĐỔI THÔNG TIN</a></div>
						</div>
					</div>
				</div>
	<div class="right">
		<center>
		<?php 
			if(isset( $insertpd)){
				echo $insertpd;
			}
		 ?>
		</center>
		
		<form action="trangchucongsu.php" method="post" enctype="multipart/form-data">
			<table  class="add-thong-tin">
				<tr>
					<td><label>TÊN SẢN PHẨM:</label></td>
					<td><input name="product_name" type="text"></td>
				</tr>
				<tr>
					<td><label>LOẠI SẢN PHẨM:</label></td>
					<td>
						<select type="select" name="product_type">
							<option>---CHỌN LOẠI ĐỒ ÁN---</option>
	                        <option value="1">ĐỒ ÁN THIẾT BỊ</option>
	                        <option value="2">ĐỒ ÁN CÔNG NGHỆ</option>
	                        <option value="3">ĐỒ ÁN TỐT NGHIỆP</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label>URL:</label></td>
					<td><input name="url" type="text"></td>
				</tr>
				<tr>
					<td><label>HÌNH ẢNH:</label></td>
					<td><input name="images[]" type="file" multiple="multiple"></td>
				</tr>
				<tr>
					<td><label>MÔ TẢ:</label></td>
					<td><textarea name="des_product" type="text" class="tinymce"></textarea></td>
				</tr>
			</table>
			<center><input type="submit" name="update" value="POST"></center>
	</div>
</body>

<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
</html>