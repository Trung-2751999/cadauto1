<?php 
	include_once('../li/database.php');
	include_once('../helper/format.php');
	include_once('../li/session.php');
	Session::init();
?>
<?php 
	/**
	 * 
	 */
	class changeinfo
	{
		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}
		public function insert_congsu($data){
			$user_trim=mysqli_escape_string($this->db->link,$data['user']);
			$user_trimed= preg_replace('/ /','',$user_trim);
			$user=mysqli_escape_string($this->db->link,$user_trimed);

			$pass_trim=mysqli_escape_string($this->db->link,$data['pass']);
			$pass_trimed=$this->fm->validation($pass_trim);
			$pass=mysqli_escape_string($this->db->link,$pass_trimed);

			$pass2=mysqli_escape_string($this->db->link,$data['pass_2']);
			$congsu_name=mysqli_escape_string($this->db->link,$data['congsu_name']);

			if($user==''||$pass==''||$pass2==''||$congsu_name==''){
				$alert='Phát hiện trường nhập bỏ trống';
				return $alert;
			}elseif(strlen($user)<8 || strlen($pass)<8){
				$alert="Tên tài khoản và mật khẩu phải dài hơn 8 kí tự. Vui lòng kiểm tra lại và loại bỏ các kí tự khoảng trắng !";
				return $alert;
			}elseif($pass2!=$pass){
				$alert="Nhập lại mật khẩu không đúng. Vui lòng thử lại !";
				return $alert;
			}

			$scan="SELECT * FROM tbl_congsu WHERE congsu_name='$user'";
			$result_scan=$this->db->select($scan);
			if($result_scan==NULL){
			$insert="INSERT INTO tbl_congsu(ten_congsu,congsu_name,congsu_pass) VALUES ('$congsu_name','$user',md5('$pass'))";
			$result_insert=$this->db->insert($insert);
			if($result_insert){
				$alert="Thêm cộng sự thành công";
				return $alert;
			}
			}else{
				$alert="Tên tài khoản đã có người đăng kí. Vui lòng thử lại !";
				return $alert;
			}
		}


		public function changeinfo_congsu_admin($data,$id){
			$user_trim=mysqli_escape_string($this->db->link,$data['user']);
			$user_trimed= preg_replace('/ /','',$user_trim);
			$user=mysqli_escape_string($this->db->link,$user_trimed);

			$pass_trim=mysqli_escape_string($this->db->link,$data['pass']);
			$pass_trimed=$this->fm->validation($pass_trim);
			$pass=mysqli_escape_string($this->db->link,$pass_trimed);

			$pass2=mysqli_escape_string($this->db->link,$data['pass_2']);
			$congsu_name=mysqli_escape_string($this->db->link,$data['congsu_name']);

			$id=mysqli_escape_string($this->db->link,$id);

			$scan="SELECT * FROM tbl_congsu WHERE congsu_name='$user' AND congsu_id!='$id'";
			$result_scan=$this->db->select($scan);
			$scan_pass="SELECT * FROM tbl_congsu WHERE congsu_pass='$pass' AND congsu_id='$id'";
			$result_scan_pass=$this->db->select($scan_pass);
			if($user==''||$pass==''||$pass2==''||$congsu_name==''){
				$alert='Phát hiện trường nhập bỏ trống';
				return $alert;
			}elseif($result_scan_pass!=NULL){
				$alert='Bạn chưa cập nhật mật khẩu !';
				return $alert;
			}elseif($result_scan!=NULL){
				$alert="Tên tài khoản đã có người đăng kí. Vui lòng thử lại !";
				return $alert;
			}elseif(strlen($user)<8 || strlen($pass)<8){
				$alert="Tên tài khoản và mật khẩu phải dài hơn 8 kí tự. Vui lòng kiểm tra lại và loại bỏ các kí tự khoảng trắng !";
				return $alert;
			}elseif($pass2!=$pass){
				$alert="Nhập lại mật khẩu không đúng. Vui lòng thử lại !";
				return $alert;
			}
			else{
				$change="UPDATE tbl_congsu SET congsu_name='$user', ten_congsu='$congsu_name',congsu_pass=md5('$pass'),congsu_name='$user' WHERE congsu_id='$id'";
				$result=$this->db->update($change);
		}	
			if($result){
				$alert="Đã cập nhật thành công !";
				return $alert;
		}
	}
		public function show_info_congsu(){
			$id=Session::get('congsu_id');
			$query="SELECT * FROM tbl_congsu WHERE congsu_id='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function show_info_congsu_admin($id){
			$query="SELECT * FROM tbl_congsu WHERE congsu_id='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function show_info_admin(){
			$id=Session::get('adminId');
			$query="SELECT * FROM tbl_admin WHERE admin_id='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function changeinfo_admin($data){
			$user_trim=mysqli_escape_string($this->db->link,$data['user']);
			$user_trimed= preg_replace('/ /','',$user_trim);
			$user=mysqli_escape_string($this->db->link,$user_trimed);

			$pass_trim=mysqli_escape_string($this->db->link,$data['pass']);
			$pass_trimed=$this->fm->validation($pass_trim);
			$pass=mysqli_escape_string($this->db->link,$pass_trimed);

			$pass2=mysqli_escape_string($this->db->link,$data['pass_2']);
			$admin_name=mysqli_escape_string($this->db->link,$data['admin_name']);

			$id=Session::get('adminId');

			$scan="SELECT * FROM tbl_admin WHERE admin_name='$user' AND admin_id!='$id'";
			$result_scan=$this->db->select($scan);
			$scan_pass="SELECT * FROM tbl_admin WHERE admin_pass='$pass' AND admin_id='$id'";
			$result_scan_pass=$this->db->select($scan_pass);
			if($user==''||$pass==''||$pass2==''||$admin_name==''){
				$alert='Phát hiện trường nhập bỏ trống';
				return $alert;
			}elseif($result_scan_pass!=NULL){
				$alert='Bạn chưa cập nhật mật khẩu !';
				return $alert;
			}elseif($result_scan!=NULL){
				$alert="Tên tài khoản đã có người đăng kí. Vui lòng thử lại !";
				return $alert;
			}elseif(strlen($user)<8 || strlen($pass)<8){
				$alert="Tên tài khoản và mật khẩu phải dài hơn 8 kí tự. Vui lòng kiểm tra lại và loại bỏ các kí tự khoảng trắng !";
				return $alert;
			}elseif($pass2!=$pass){
				$alert="Nhập lại mật khẩu không đúng. Vui lòng thử lại !";
				return $alert;
			}
			else{
				$change="UPDATE tbl_admin SET admin_name='$user', name_admin='$admin_name',admin_pass=md5('$pass') WHERE admin_id='$id'";
				$result=$this->db->update($change);
		}	
			if($result){
				$alert="Đã cập nhật thành công !";
				return $alert;
		}
	}		public function changeinfo_congsu($data){
			$user_trim=mysqli_escape_string($this->db->link,$data['user']);
			$user_trimed= preg_replace('/ /','',$user_trim);
			$user=mysqli_escape_string($this->db->link,$user_trimed);

			$pass_trim=mysqli_escape_string($this->db->link,$data['pass']);
			$pass_trimed=$this->fm->validation($pass_trim);
			$pass=mysqli_escape_string($this->db->link,$pass_trimed);

			$pass2=mysqli_escape_string($this->db->link,$data['pass_2']);
			$congsu_name=mysqli_escape_string($this->db->link,$data['congsu_name']);
			$id=Session::get('congsu_id');

			$scan="SELECT * FROM tbl_congsu WHERE congsu_name='$user' AND congsu_id!='$id'";
			$result_scan=$this->db->select($scan);
			$scan_pass="SELECT * FROM tbl_congsu WHERE congsu_pass='$pass' AND congsu_id='$id'";
			$result_scan_pass=$this->db->select($scan_pass);
			if($user==''||$pass==''||$pass2==''||$congsu_name==''){
				$alert='Phát hiện trường nhập bỏ trống';
				return $alert;
			}elseif($result_scan_pass!=NULL){
				$alert='Bạn chưa cập nhật mật khẩu !';
				return $alert;
			}elseif($result_scan!=NULL){
				$alert="Tên tài khoản đã có người đăng kí. Vui lòng thử lại !";
				return $alert;
			}elseif(strlen($user)<8 || strlen($pass)<8){
				$alert="Tên tài khoản và mật khẩu phải dài hơn 8 kí tự. Vui lòng kiểm tra lại và loại bỏ các kí tự khoảng trắng !";
				return $alert;
			}elseif($pass2!=$pass){
				$alert="Nhập lại mật khẩu không đúng. Vui lòng thử lại !";
				return $alert;
			}
			else{
				$change="UPDATE tbl_congsu SET congsu_name='$user', ten_congsu='$congsu_name',congsu_pass=md5('$pass'),congsu_name='$user' WHERE congsu_id='$id'";
				$result=$this->db->update($change);
		}	
			if($result){
				$alert="Đã cập nhật thành công !";
				return $alert;
		}
	}
}