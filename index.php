<!DOCTYPE html>
<html>
<head>
	<title>Cadauto</title>
	<?php include_once './inc/header.php'; ?>
	<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
</head>
<?php include_once 'dangnhap.php'; ?>
<body>
	<div class="body" style="display:block">
		<div class="header">

			<div class="con-slider">
				<?php include_once 'slider.php'; ?>
			</div>

			<div class="image-right">
				<div class="image-right-1"></div>
				<div class="image-right-2"></div>
			</div>
		</div>
		<div class="line"></div>
		<div class="con-product">
			<?php 
				$i=1;
				for($i=1;$i<=16;$i++):
			 ?>
			<div class="product">
				<a href="chitietsanpham.php"><div class="image-des"></div></a>
				<div class="name-product"></div>
				<div class="des">
					<div class="dowload-number"><i class="fas fa-download"></i> 0000</div>
					<div class="update-time"><i class="far fa-calendar-check"></i> 27-8-2021</div>
					<div class="dowload-button"><a href="chitietsanpham.php">DOWLOAD</a></div>
				</div>
			</div>
			<?php endfor ?>

			<div style="clear:both">
				<?php include_once './inc/footer.php' ?>
			</div>
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
