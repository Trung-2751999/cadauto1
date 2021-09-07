<?php 
include_once '../li/session.php';
include_once '../classes/changeinfo.php'; 
session::checkSession_congsu();
Session::init();
$change=new changeinfo;
$result=$change->show_info_congsu()->fetch_assoc();
?>
<link rel="stylesheet" type="text/css" href="css/all.min.css">
<div class="inf-user">
	<div class="user-name">
		<?php 
			if(isset($_GET['action']) && $_GET['action']=='logout'){
				session::destroy();
				}
		?>
		<div class="avartar"><i style="margin-left: 25%;margin-top:20%;font-size: 4vw; color: white" class="fas fa-user"></i></div>
		<div class="name"><?php echo $result['ten_congsu']; ?></div>
		<a href="?action=logout"><div class="log-out"><i style=" margin-bottom:1vw;font-size:2vw"  class="fas fa-power-off"></i></div></a>
	</div>
</div>