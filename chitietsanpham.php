<!DOCTYPE html>
<html>
<head>
	<title>Cadauto</title>
	<?php include_once './inc/header.php'; ?>
	<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
</head>
<body>
		<?php include_once 'dangnhap.php' ?>
		<div class="body">
			<div class="ten-ban-ve">Thiết kế nhà máy sản xuất sữa tươi</div>
			<div class="image-product">
				<div class="con-slider-product">
					<div class="next"><i class="fas fa-chevron-right"></i></div>
					<div class="prev"><i class="fas fa-chevron-left"></i></div>

					<div class="slider-product" style="background-color:red"><img src="https://th.bing.com/th/id/R.3a2265c774fa0d357a7d0bd8662da8fd?rik=lkftfQH4qEwRqw&pid=ImgRaw&r=0"></div>
					<div class="slider-product" style="background-color:yellow"><img src="https://cache.desktopnexus.com/thumbseg/1512/1512056-bigthumbnail.jpg"></div>
					<div class="slider-product" style="background-color:blue"><img src="https://i.pinimg.com/736x/35/6a/75/356a75b6499130a2e67c25d9af8d1dd9--sailor-moon-sailors.jpg"></div>
					<div class="slider-product" style="background-color:red"><img src="https://th.bing.com/th/id/R.3a2265c774fa0d357a7d0bd8662da8fd?rik=lkftfQH4qEwRqw&pid=ImgRaw&r=0"></div>
					<div class="slider-product" style="background-color:yellow"><img src="https://cache.desktopnexus.com/thumbseg/1512/1512056-bigthumbnail.jpg"></div>
					<div class="slider-product" style="background-color:blue"><img src="https://i.pinimg.com/736x/35/6a/75/356a75b6499130a2e67c25d9af8d1dd9--sailor-moon-sailors.jpg"></div>
					<div class="slider-product" style="background-color:red"><img src="https://th.bing.com/th/id/R.3a2265c774fa0d357a7d0bd8662da8fd?rik=lkftfQH4qEwRqw&pid=ImgRaw&r=0"></div>
				</div>
				<div style="clear: both"></div>


			<div class="con-image-slider">
				<div class="image-slider">
					<div class="image"style="background-color:red"><img src="https://th.bing.com/th/id/R.3a2265c774fa0d357a7d0bd8662da8fd?rik=lkftfQH4qEwRqw&pid=ImgRaw&r=0"></div>
					<div class="image"style="background-color:yellow"><img src="https://cache.desktopnexus.com/thumbseg/1512/1512056-bigthumbnail.jpg"></div>
					<div class="image"style="background-color:blue"><img src="https://i.pinimg.com/736x/35/6a/75/356a75b6499130a2e67c25d9af8d1dd9--sailor-moon-sailors.jpg"></div>
					<div class="image"style="background-color:orange"><img src="https://th.bing.com/th/id/R.3a2265c774fa0d357a7d0bd8662da8fd?rik=lkftfQH4qEwRqw&pid=ImgRaw&r=0"></div>
					<div class="image"style="background-color:violet"><img src="https://cache.desktopnexus.com/thumbseg/1512/1512056-bigthumbnail.jpg"></div>
					<div class="image"style="background-color:cyan"><img src="https://i.pinimg.com/736x/35/6a/75/356a75b6499130a2e67c25d9af8d1dd9--sailor-moon-sailors.jpg"></div>

					<div class="image"style="background-color:red"><img src="https://th.bing.com/th/id/R.3a2265c774fa0d357a7d0bd8662da8fd?rik=lkftfQH4qEwRqw&pid=ImgRaw&r=0"></div>
					<div class="image"style="background-color:yellow"><img src="https://cache.desktopnexus.com/thumbseg/1512/1512056-bigthumbnail.jpg"></div>
					<div class="image"style="background-color:blue"><img src="https://i.pinimg.com/736x/35/6a/75/356a75b6499130a2e67c25d9af8d1dd9--sailor-moon-sailors.jpg"></div>
					<div class="image"style="background-color:orange"><img src="https://th.bing.com/th/id/R.3a2265c774fa0d357a7d0bd8662da8fd?rik=lkftfQH4qEwRqw&pid=ImgRaw&r=0"></div>
					<div class="image"style="background-color:violet"><img src="https://cache.desktopnexus.com/thumbseg/1512/1512056-bigthumbnail.jpg"></div>
					<div class="image"style="background-color:cyan"><img src="https://i.pinimg.com/736x/35/6a/75/356a75b6499130a2e67c25d9af8d1dd9--sailor-moon-sailors.jpg"></div>
				</div>
			</div>


		</div>
			<div class="mo-ta-san-pham" style="border-top:none;border-bottom:none">
				<div class="ten-mo-ta">MÔ TẢ SẢN PHẨM</div>
				<div class="noi-dung-mo-ta">
				</div>
				<div class="dowload-product">DOWLOAD</div>
			</div>
		<div style="clear:both">
			<?php include_once './inc/footer.php'; ?>
		</div>
	</div>
</body>
<script type="text/javascript">
	var img = $('.slider-product').length;
	var kichthuoc=$('.slider-product').width();
	var max=kichthuoc*(img-1);
	var move=0;
	$('.next').click(function(){
		if(move<max){
			$('.con-slider-product').css('transition','all 0.5s');
			move+=kichthuoc;
			$('.con-slider-product').css('margin-left',-move);
		}else if(move=max){
			move=0;
			$('.con-slider-product').css('margin-left',-move);
			$('.con-slider-product').css('transition','all 0s');
		}

	})
	$('.prev').click(function(){
		if(move==0||move<0){
			move=max;
			$('.con-slider-product').css('transition','all 0s');
			$('.con-slider-product').css('margin-left',-move);
		}else if(move>0){
			move-=kichthuoc;
			$('.con-slider-product').css('margin-left',-move);
			$('.con-slider-product').css('transition','all 0.5s');
		}
	})
	$(window).resize(function(){
		location.reload(true)
	})
	setInterval(function(){
		$('.next').click();
	},5000)

</script>
<script type="text/javascript">
	var maxx_width = ($('.image').length)/2;
	var maxx=$('.image').width()* maxx_width
	console.log(maxx)

	var magin_right=$('.image').css('margin-right');
	var slice_right=Number(magin_right.slice(0,-2));

	var img_width = $('.image').css('width');
	var slice_width=Number(img_width.slice(0,-2));

	var total=slice_right+slice_width;
	var mov=0
	$('.next').click(function(){
	
		if(mov==maxx || mov>maxx ){
			mov=0
			$('.image-slider').css('margin-left',-mov);
			$('.image-slider').css('transition','all 0s')
		}else{
			mov+=total;
			$('.image-slider').css('margin-left',-mov);
			$('.image-slider').css('transition','all 0.5s')
		}
		console.log(mov)
	})
	$('.prev').click(function(){
		if(mov==0||mov<0){
			mov=maxx+slice_right*maxx_width;
			$('.image-slider').css('transition','all 0s');
			$('.image-slider').css('margin-left',-mov);
		}else if(mov>0){
			mov-=total;
			$('.image-slider').css('margin-left',-mov);
			$('.image-slider').css('transition','all 0.5s');
		}
		console.log(mov)
	})
</script>
</html>
