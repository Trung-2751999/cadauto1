<?php 
include_once '../li/session.php';
include_once '../classes/changeinfo.php'; 
session::checkSession();
Session::init();
$change=new changeinfo;
$result=$change->show_info_admin()->fetch_assoc();
 ?>
<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<header>
		<form method="post">
			<div class="logo-bar">
				<a href="trangchu.php"><div class="logo"></div></a>
			</div>
			<div class="inf-user">
				<div class="user-name">
					<div class="avartar"><i style="margin-left: 25%;margin-top:20%;font-size: 4vw;color: white" class="fas fa-user"></i></div>
					<div class="name"><?php echo $result['name_admin']; ?></div>
					<?php 
						if(isset($_GET['action']) && $_GET['action']=='logout'){
							session::destroy();
						}
					 ?>
					<div class="log-out"><a href="?action=logout"><i style="margin-bottom:1vw;font-size:2vw" class="fas fa-power-off"></i></a></div>
				</div>
				<div class="money-and-cus">
					<div class="money">
						<div class="des-img-money"></div>
						<div class="money-number">1000000 VND</div>
					</div>
					<div class="cus">
						<div class="des-img-cus"></div>
						<div class="cus-number">1000000</div>
					</div>
				</div>
			</div>
		</form>
	</header>