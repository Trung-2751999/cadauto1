<?php
include_once '../li/session.php';
include_once '../classes/admin.php';
Session::init(); 
$ad=new admin;
if($_GET['id']==NULL || !($_GET['id'])){
		header('Location:404.php');
	}else{
		$productid=$_GET['id'];
		Session::set('product_id_admin',$productid);
		$show_product=$ad->show_info_product_admin($productid);
		$get_image=$ad->show_image_admin($productid);
	}
if(isset($_GET['delete'])){
	$id_delete=$_GET['delete'];
	$delete=$ad->delete_image_product_admin($id_delete);
	header('Location:thongtinsanpham.php?id='. Session::get("product_id_admin"));
}
if(isset($_POST['update'])){
	$update=$ad->update_product($productid,$_FILES,$_POST);
	header('Location:thongtinsanpham.php?id='. Session::get("product_id_admin"));
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sản phẩm cộng sự</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php include_once 'link.html' ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="js/setup.js" type="text/javascript"></script>
</head>
<body>
				<div class="logo-bar">
					<a href="trangchu.php"><div class="logo"></div></a>
				</div>
	<div class="left" style="float: left">			
				<?php include_once 'avartaradmin.php'; ?>
				<div class="content">
				<div class="menu">
					<div class="quan-ly-san-pham"style="background-color: #3C3434; color: #FF0606">QUẢN LÝ SẢN PHẨM</div>
					<div class="tai-khoan-nguoi-dung">TÀI KHOẢN NGƯỜI DÙNG</div>
					<div class="lich-su-giao-dich">LỊCH SỬ GIAO DỊCH</div>
					<div class="lich-su-nap-the">LỊCH SỬ NẠP THẺ</div>
					<div class="tai-khoan-cong-su">TÀI KHOẢN CỘNG SỰ</div>
					<div class="doi-thong-tin-admin">ĐỔI THÔNG TIN ADMIN</div>
				</div>
					<div class="container-o-menu-phu">
							<div class="o-menu-phu">SLIDER</div>
							<a href="quanlysanpham.php"><div class="o-menu-phu">TRANG CHU</div></a>
					</div>
					<div class="tai-khoan-cong-su-menu-phu">
							<div class="o-menu-phu">THONG TIN CONG SU</div> 
							<div class="o-menu-phu">THEM CONG SU</div>
							<a href="quanlydangbai.php"><div class="o-menu-phu">QUAN LY BAI DANG</div></a>
					</div>
				</div>
	</div>
	<div class="right">
			<table class="add-thong-tin">
				<form action="" method="post" enctype="multipart/form-data">
				<?php
				 	if($show_product){
				 		$get_show=$show_product->fetch_assoc();
				 ?>
				<tr>
					<td><label>TÊN SẢN PHẨM:</label></td>
					<td><input name="product_name" type="text" value="<?php echo $get_show['product_name']?>"></td>
				</tr>
				<tr>
					<td><label>LOẠI SẢN PHẨM:</label></td>
					<td>
						<select type="select" name="product_type">
							<?php 
								if($get_show['product_type']==1){
							 ?>
	                        <option selected value="1">ĐỒ ÁN THIẾT BỊ</option>
	                        <option value="2">ĐỒ ÁN CÔNG NGHỆ</option>
	                        <option value="3">ĐỒ ÁN TỐT NGHIỆP</option>
	                        <?php 
	                        }elseif($get_show['product_type']==2){
	                         ?>
	                        <option value="1">ĐỒ ÁN THIẾT BỊ</option>
	                        <option selected  value="2">ĐỒ ÁN CÔNG NGHỆ</option>
	                        <option value="3">ĐỒ ÁN TỐT NGHIỆP</option>
	                        <?php
	                      	}else{ 
	                         ?>
	                        <option value="1">ĐỒ ÁN THIẾT BỊ</option>
	                        <option value="2">ĐỒ ÁN CÔNG NGHỆ</option>
	                        <option selected  value="3">ĐỒ ÁN TỐT NGHIỆP</option>
	                        <?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label>URL:</label></td>
					<td><input name="url" type="text" value="<?php echo $get_show['url'] ?>">
				</tr>
				<tr>
					<td><label>MÔ TẢ:</label></td>
					<td><textarea style="display: block" type="text" class="tinymce" name="des_product"><?php echo $get_show['des_product'] ?></textarea></td>
				</tr>
				<tr>
					<td><label>HÌNH ẢNH:</label></td>
					<td>
						<?php 
						if($get_image){
						while($show_image=$get_image->fetch_assoc()){
						 ?>
						 <div class="container-img" style='width: 50.9vw'>
							 <img class="<?php echo $show_image['id'] ?>" src="../upload/<?php echo $show_image['image'] ?>">
							 <div style="position:absolute;left:0;top:0;width:100vw;height:100vh;display:none;background-color:#C4C4C4" class="con-<?php echo $show_image['id'] ?>">
							 	<img class="scale" style="width: 18vw;height:18vw;position:absolute;left:43%;top:30%"src="../upload/<?php echo $show_image['image'] ?>">
							 	<a onclick="return confirm('Nếu xóa bạn sẽ không thể khôi phục lại. Bạn thật sự muốn xóa ảnh này ?')" 
							 	href="?id=<?php echo Session::get('product_id_admin')?>&delete=<?php echo $show_image['id'] ?>">
							 		<div class="delete-image"></div>
							 	</a>
							 </div>
						 </div>
						 <script type="text/javascript">
						 	$('.<?php echo $show_image['id'] ?>').click(function(){
						 		$('.con-<?php echo $show_image['id'] ?>').css('display','block');
						 		$('body').css('overflow','hidden');
						 		var overy=$('html,body').scrollTop();
						 		if(overy>0){
						 			$('html,body').scrollTop(0);
						 		}
						 	});
						 	$('.xdelete').click(function(){
						 		$('.con-<?php echo $show_image['id'] ?>').css('display','none');
						 		$('body').css('overflow','auto');
						 	});
						 	$('.con-<?php echo $show_image['id'] ?>').click(function(){
						 		$('.con-<?php echo $show_image['id'] ?>').css('display','none');
						 		$('body').css('overflow','auto');
						 	});
						 	$('.scale').hover(function(){
						 		$('.delete-image').css('top','100%');
						 	});
						 	$('.scale').mouseleave(function(){
						 		$('.delete-image').css('top','70%');
						 	})
						 </script>
						<?php 
							}
						}
						 ?>
						<input type="file" name="images[]" multiple="multiple">
					</td>
				</tr>
				<tr>
					<td><label>GIÁ THÀNH:</label></td>
					<td>
						<input type="number" min="10000" name="price" value="<?php echo $get_show['price'] ?>">
					</td>
				</tr>
				<?php 
					}elseif(isset($_GET['action'])){
					header('Location:login.php');
					}
					else{
					header('Location:404.php');
					} 	
				 ?>
			</table>
			<center><input  type="submit" name="update" value="UPDATE"></center>
			</form>
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