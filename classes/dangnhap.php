<?php 
	include_once('./li_index/database.php');
	include_once('./helper/format.php');
	include_once('./li_index/session.php');
	Session::init();
?>
<?php 
	/**
	 * 
	 */
	class dangnhap
	{
		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}
	public function dangnhap($data){
			$user_trim=mysqli_escape_string($this->db->link,$data['user']);
			$user_trimed= preg_replace('/ /','',$user_trim);
			$user=mysqli_escape_string($this->db->link,$user_trimed);


			$pass_trim=mysqli_escape_string($this->db->link,$data['pass']);
			$pass_trimed=$this->fm->validation($pass_trim);
			$pass=mysqli_escape_string($this->db->link,$pass_trimed);

			if($user==''){
				$alert='Phát hiện trường nhập [tên đăng nhập] bỏ trống';
				return $alert;
			}elseif($pass==''){
				$alert='Phát hiện trường nhập [mật khẩu] bỏ trống';
				return $alert;
			}else{
				$query="SELECT * FROM tbl_dangki WHERE ten_dang_nhap='$user' AND pass=md5('$pass') LIMIT 1";
				$result=$this->db->select($query);
				if($result != false){
					$value=$result->fetch_assoc();
					Session::set('cus_login',true);
					Session::set('cus_id',$value['id']);
					header('location:index.php');
				}else{
					$alert = "Tài khoản và mật khẩu không được tìm thấy";
					return $alert;
				}
			}
		}
	public function xuat_cus(){
		$id=Session::get('cus_id');
		$query="SELECT * FROM tbl_dangki WHERE id='$id'";
		$result=$this->db->select($query);
		return $result;
	}
	}
?>