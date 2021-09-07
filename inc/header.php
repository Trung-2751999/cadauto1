<?php 
    include_once './li_index/session.php';
    include_once './classes/dangnhap.php';
    Session::init();
?>
<?php 
    if(isset($_GET['action'])&&$_GET['action']=='logout'){
        Session::delete();
    }

 ?>
 <?php
    $dangnhap= new dangnhap;
    if(isset($_POST['submit'])){
        $result=$dangnhap->dangnhap($_POST);
        echo "<script>alert('$result')</script>";
    }
  ?>
<link rel="icon" type="image/png" sizes="16x16"  href="favicons/favicon-16x16.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="all.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<header>
        <div class="logo-bar" style="position:fixed;display:block">
            <a href="index.php"><div class="logo"><img src="inc/logo.png"></div></a>
            <div class="search">
                <div class="search-button">
                </div>
            </div>
            <div class="do-an">ĐỒ ÁN THIẾT BỊ</div>
            <div class="do-an">ĐỒ ÁN CÔNG NGHỆ</div>
            <div class="do-an">ĐỒ ÁN TỐT NGHIỆP</div>
            <?php  
                if(Session::get('cus_login')==false){
            ?>
            <div class="dang-nhap">Đăng nhập</div>
            <div class="dang-ki">|| <a href="dangki.php">Đăng kí</a></div>
            <?php 
                }else{
                    $dangnhap = new dangnhap;
                    $name =  $dangnhap->xuat_cus()->fetch_assoc();
             ?>   
            <div class="dang-nhap-1" style="margin-right:3vw,margin-top:">Xin chao, <a href=""><?php echo $name['ten_nguoi_dung'] ?></a></div>
            <?php 
                }
             ?>
             <div class="menu-phu" style="display:none">
                 <div class="arrow"></div>
                 <div class="menu-1 info"><a href="thongtincanhan.php"><i class="fas fa-user"></i> Thông tin cá nhân</a></div>
                 <div class="menu-1 deal"><a href="lichsugiaodich.php"><i class="fas fa-shopping-bag"></i> Lịch sử giao dịch</a></div>
                 <div class="menu-1 card "><a href="lichsunapthe.php"><i class="far fa-credit-card"></i> Lịch sử nạp thẻ</a></div>
                 <div class="menu-1 card "><a href="napthe.php"><i class="fas fa-money-check-alt"></i> Nạp thẻ</a></div>
                 <div class="menu-1 out"><a href="?action=logout"><i class="fas fa-power-off"></i> Thoát</a></div>
             </div>
        </div>
</header>
<script type="text/javascript">
    $('.dang-nhap-1 a').hover(function(){
        $('.menu-phu').css('display','block');
    })
    $('.menu-phu').hover(function(){
        $('.menu-phu').css('display','block');
    })
    $('.menu-phu').mouseleave(function(){
        $('.menu-phu').css('display','none');
    })
</script>