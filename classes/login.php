<?php 
	include'../li/session.php';
	session::checkLogin();
	include'../li/database.php';
	include'../helper/format.php';
	session::checkLogin_congsu();
 ?>
<?php 
	/**
	 * 
	 */
	class adminlogin  
	{
		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}
		public function login_admin($admin_name,$admin_pass){
			$admin_name = $this->fm->validation($admin_name);
			$admin_pass = $this->fm->validation($admin_pass);

			$admin_name = mysqli_real_escape_string($this->db->link, $admin_name);
			$admin_pass = mysqli_real_escape_string($this->db->link, $admin_pass);

			if(empty($admin_name) || empty($admin_pass)){
				$alert = "Tài khoản và mật khẩu không được để trống";
				return $alert;
			}else{
				$query="SELECT * FROM tbl_admin WHERE admin_name= '$admin_name' AND admin_pass = '$admin_pass' LIMIT 1";
				$result = $this->db->select($query);

				if($result != false){
					$value = $result->fetch_assoc();
					Session::set('adminlogin',true);
					Session::set('adminId',$value['admin_id']);
					Session::set('admin_name',$value['admin_name']);
					Session::set('adminName',$value['name_admin']);
					header('Location:trangchu.php');
				}else{
					$alert = "Tài khoản và mật khẩu không được tìm thấy";
					return $alert;
				}

				}
			}

		}
		class congsulogin  
		{
		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}
		public function login_congsu($congsu_name,$congsu_pass){
			$congsu_name = $this->fm->validation($congsu_name);
			$congsu_pass = $this->fm->validation($congsu_pass);

			$congsu_name = mysqli_real_escape_string($this->db->link, $congsu_name);
			$congsu_pass = mysqli_real_escape_string($this->db->link, $congsu_pass);

			if(empty($congsu_name) || empty($congsu_pass)){
				$alert = "Tài khoản và mật khẩu không được để trống";
				return $alert;
			}else{
				$query="SELECT * FROM tbl_congsu WHERE congsu_name= '$congsu_name' AND congsu_pass = '$congsu_pass' LIMIT 1";
				$result = $this->db->select($query);

				if($result != false){
					$value = $result->fetch_assoc();
					Session::set('congsulogin',true);
					Session::set('congsu_id',$value['congsu_id']);
					Session::set('congsu_name',$value['congsu_name']);
					Session::set('ten_congsu',$value['ten_congsu']);
					header('Location:trangchucongsu.php');
				}else{
					$alert = "Tài khoản và mật khẩu không được tìm thấy";
					return $alert;
				}

				}
			}

		}
	
 ?>