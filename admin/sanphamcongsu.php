<?php 
	include_once '../classes/admin.php';
	include_once '../li/session.php';
	Session::init(); 
 ?>
<?php
	$pd=new admin; 
	if($_GET['id']==NULL || !isset($_GET['id'])){
		header('Location:404.php');
	}else{
		$product_id=$_GET['id'];
		Session::set('product_id_delete',$_GET['id']);
		$get_product=$pd->show_product($product_id);
		$get_image=$pd->show_image($product_id);
	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$delete=$pd->delete_image($id);
		header('Location:sanphamcongsu.php?id='.Session::get("product_id_delete"));
	}

	if(isset($_POST['POST'])){
		$scan=$pd->select_exist($product_id);
		if($scan){
			$result_scan=$scan->fetch_assoc();
			$id=$result_scan['id'];
			$result=$pd->backup_product($product_id,$_FILES,$_POST,$id);
			echo "<script>alert('$result')</script>";
		}else{
		$post=$pd->post_product($_POST,$_FILES,$product_id);
		echo "<script>alert('$post')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin sản phẩm</title>
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
				<?php include_once 'avartaradmin.php'; ?>
				<div class="content">
				<div class="menu">
					<div class="quan-ly-san-pham">QUẢN LÝ SẢN PHẨM</div>
					<div class="tai-khoan-nguoi-dung">TÀI KHOẢN NGƯỜI DÙNG</div>
					<div class="lich-su-giao-dich">LỊCH SỬ GIAO DỊCH</div>
					<div class="lich-su-nap-the">LỊCH SỬ NẠP THẺ</div>
					<div class="tai-khoan-cong-su"style="background-color: #3C3434; color: #FF0606">TÀI KHOẢN CỘNG SỰ</div>
					<div class="doi-thong-tin-admin">ĐỔI THÔNG TIN ADMIN</div>
				</div>
					<div class="container-o-menu-phu">
							<div class="o-menu-phu">SLIDER</div>
							<a href="quanlysanpham.php"><div class="o-menu-phu">TRANG CHU</div></a>
					</div>
					<div class="tai-khoan-cong-su-menu-phu">
							<div class="o-menu-phu">THONG TIN CONG SU</div> 
							<div class="o-menu-phu">THEM CONG SU</div>
							<div class="o-menu-phu"style="background-color: #3C3434; color: #FF0606">QUAN LY BAI DANG</div>
					</div>
				</div>
	</div>
	<div class="right">
			<table class="add-thong-tin">
				<form action="" method="post" enctype="multipart/form-data">
				<?php
					if($get_product){ 
					$result=$get_product->fetch_assoc();
				?>
				<tr>
					<td><label>TÊN SẢN PHẨM:</label></td>
					<td><input name="product_name" type="text" value="<?php echo $result['product_name'] ?>"></td>
				</tr>
				<tr>
					<td><label>LOẠI SẢN PHẨM:</label></td>
					<td>
						<select type="select" name="product_type">
							<?php 
								if($result['product_type']==1){
							 ?>
	                        <option selected value="1">ĐỒ ÁN THIẾT BỊ</option>
	                        <option value="2">ĐỒ ÁN CÔNG NGHỆ</option>
	                        <option value="3">ĐỒ ÁN TỐT NGHIỆP</option>
	                        <?php 
	                        }elseif($result['product_type']==2){
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
				<tr>
					<td><label>URL:</label></td>
					<td><input name="url" type="text" value="<?php echo $result['url'] ?>">
					</td>
				</tr>
				<tr>
					<td><label>MÔ TẢ:</label></td>
					<td><textarea style="display: block" type="text" class="tinymce" name="des_product"><?php echo $result['des_product'] ?></textarea></td>
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
							 	href="?id=<?php echo Session::get('product_id_delete')?>&delete=<?php echo $show_image['id'] ?>">
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
						<input type="number" name="price" min="10000"
						 value=
						 "<?php
						 		$scan=$pd->select_exist($product_id);
									if($scan){
										$result_scan=$scan->fetch_assoc();
										echo $result_scan['price'];
									}
						   ?>">
					</td>
				</tr>
			</table>
			<center><input type="submit" name="POST" value="POST"></center>
			<?php 
				}elseif(isset($_GET['action'])){
					header('Location:login.php');
			}
				else{
				header('Location:404.php');
			} 
			?>
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