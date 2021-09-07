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
	class dangki
	{
		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}
		public function doi_mat_khau_cap_2($data){
			$id=Session::get('cus_id');

			$pass_trim=mysqli_escape_string($this->db->link,$data['pass_2_new']);
			$pass_trimed=$this->fm->validation($pass_trim);
			$pass_2_new=mysqli_escape_string($this->db->link,$pass_trimed);

			$pass_trim_new_2_again=mysqli_escape_string($this->db->link,$data['pass_new_2_again']);
			$pass_trimed_new_2_again=$this->fm->validation($pass_trim_new_2_again);
			$pass_new_2_again=mysqli_escape_string($this->db->link,$pass_trimed_new_2_again);

			$pass_trim_2_old=mysqli_escape_string($this->db->link,$data['pass_2_old']);
			$pass_trimed_2_old=$this->fm->validation($pass_trim_2_old);
			$pass_2_old=mysqli_escape_string($this->db->link,$pass_trimed_2_old);

			$pass_trim_2_old_again=mysqli_escape_string($this->db->link,$data['pass_2_old_again']);
			$pass_trimed_2_old_again=$this->fm->validation($pass_trim_2_old_again);
			$pass_2_old_again=mysqli_escape_string($this->db->link,$pass_trimed_2_old_again);

			$select="SELECT * FROM tbl_dangki WHERE id='$id'";
			$result=$this->db->select($select)->fetch_assoc();
			
			if($pass_2_new==''){
				$alert='Phát hiện trường nhập [Mật khẩu cấp 2 mới] bỏ trống';
				return $alert;
			}elseif($pass_2_old==''){
				$alert='Phát hiện trường nhập [Mật khẩu cấp 2 cũ] bỏ trống';
				return $alert;
			}elseif($pass_2_new!=$pass_new_2_again){
				$alert='Nhập lại mật khẩu cấp 2 mới không đúng ';
				return $alert;
			}elseif($pass_2_old!=$pass_2_old_again){
				$alert='Nhập lại mật khẩu cấp 2 cũ không đúng ';
				return $alert;
			}elseif (md5($pass_2_old)!=$result['pass_2']) {
				$alert="Nhập mật khẩu cấp 2 không đúng. Vui lòng thử lại";
				return $alert;
			}elseif(strlen($pass_2_new)<8){
				$alert="Mật khẩu phải dài hơn 8 kí tự. Vui lòng kiểm tra lại và loại bỏ các kí tự khoảng trắng !";
				return $alert;
			}else{
			$update="UPDATE tbl_dangki SET pass_2=md5('$pass_2_new') WHERE id='$id'";
			$result=$this->db->update($update);
			$alert='Thay đổi mật khẩu cấp 2 thành công !';
			return $alert;
		}
	}
		public function doi_mat_khau($data){
			$id=Session::get('cus_id');

			$pass_trim=mysqli_escape_string($this->db->link,$data['pass']);
			$pass_trimed=$this->fm->validation($pass_trim);
			$pass=mysqli_escape_string($this->db->link,$pass_trimed);

			$pass_trim_new=mysqli_escape_string($this->db->link,$data['pass_new']);
			$pass_trimed_new=$this->fm->validation($pass_trim_new);
			$pass_new=mysqli_escape_string($this->db->link,$pass_trimed_new);

			$pass_trim_2=mysqli_escape_string($this->db->link,$data['pass_2']);
			$pass_trimed_2=$this->fm->validation($pass_trim_2);
			$pass_2=mysqli_escape_string($this->db->link,$pass_trimed_2);

			$pass_trim_new_2=mysqli_escape_string($this->db->link,$data['pass_new_2']);
			$pass_trimed_new_2=$this->fm->validation($pass_trim_new_2);
			$pass_new_2=mysqli_escape_string($this->db->link,$pass_trimed_new_2);

			$pass_trim_3=mysqli_escape_string($this->db->link,$data['pass_3']);
			$pass_trimed_3=$this->fm->validation($pass_trim_3);
			$pass_3=mysqli_escape_string($this->db->link,$pass_trimed_3);


			$select="SELECT * FROM tbl_dangki WHERE id='$id'";
			$result=$this->db->select($select)->fetch_assoc();

			if($pass==''){
				$alert='Phát hiện trường nhập [Mật khẩu cũ] bỏ trống';
				return $alert;
			}elseif($pass_new==''){
				$alert='Phát hiện trường nhập [Mật khẩu mới] bỏ trống';
				return $alert;
			}elseif($pass_2==''){
				$alert='Phát hiện trường nhập [Mật khẩu cấp 2] bỏ trống';
				return $alert;
			}elseif(strlen($pass_new)<8){
				$alert="Mật khẩu phải dài hơn 8 kí tự. Vui lòng kiểm tra lại và loại bỏ các kí tự khoảng trắng !";
				return $alert;
			}elseif (md5($pass)!=$result['pass']) {
				$alert="Nhập mật khẩu không đúng. Vui lòng thử lại";
				return $alert;
			}elseif (md5($pass_2)!=$result['pass_2']) {
				$alert="Nhập mật khẩu cấp 2 không đúng. Vui lòng thử lại";
				return $alert;
			}elseif ($pass_new!=$pass_new_2) {
				$alert="Nhập lại mật khẩu mới không chính xác. Vui lòng thử lại";
				return $alert;
			}elseif ($pass_new!=$pass_new_2) {
				$alert="Nhập lại mật khẩu mới không chính xác. Vui lòng thử lại";
				return $alert;
			}elseif ($pass_2!=$pass_3) {
				$alert="Nhập lại mật khẩu cấp 2 không chính xác. Vui lòng thử lại";
				return $alert;
			}else{
			$update="UPDATE tbl_dangki SET pass=md5('$pass_new') WHERE id='$id'";
			$result=$this->db->update($update);
			$alert='Thay đổi mật khẩu thành công !';
			return $alert;
		}
	}
		public function show_cus(){
			$id=Session::get('cus_id');
			$query="SELECT * FROM tbl_dangki WHERE id='$id'";
			$result=$this->db->select($query);
			return $result;
		}
		public function update_info($data){
			$id=Session::get('cus_id');

			$user_trim=mysqli_escape_string($this->db->link,$data['user']);
			$user_trimed= preg_replace('/ /','',$user_trim);
			$user=mysqli_escape_string($this->db->link,$user_trimed);


			$pass_trim=mysqli_escape_string($this->db->link,$data['pass']);
			$pass_trimed=$this->fm->validation($pass_trim);
			$pass=mysqli_escape_string($this->db->link,$pass_trimed);

			$xac_nhan_mat_khau=mysqli_escape_string($this->db->link,$data['pass_2']);

			$pass_trim_2=mysqli_escape_string($this->db->link,$data['pass_3']);
			$pass_trimed_2=$this->fm->validation($pass_trim);
			$pass_2=mysqli_escape_string($this->db->link,$pass_trimed);

			$name_trim=mysqli_escape_string($this->db->link,$data['name']);
			$name_trimed= preg_replace('/ /','',$name_trim);
			$name=mysqli_escape_string($this->db->link,$name_trimed);

			$xac_nhan_mat_khau_2=mysqli_escape_string($this->db->link,$data['pass_4']);
			$birthday=mysqli_escape_string($this->db->link,$data['birthday']);
			$phone=mysqli_escape_string($this->db->link,$data['phone']);

			$select="SELECT * FROM tbl_dangki WHERE id='$id'";
			$result=$this->db->select($select)->fetch_assoc();


			if($user==''){
				$alert='Phát hiện trường nhập [tên đăng nhập] bỏ trống';
				return $alert;
			}elseif($pass==''){
				$alert='Phát hiện trường nhập [mật khẩu] bỏ trống';
				return $alert;
			}elseif($xac_nhan_mat_khau==''){
				$alert='Phát hiện trường nhập [xác nhận mật khẩu] bỏ trống';
				return $alert;
			}elseif($pass_2==''){
				$alert='Phát hiện trường nhập [mật khẩu cấp 2] bỏ trống';
				return $alert;
			}elseif($xac_nhan_mat_khau_2==''){
				$alert='Phát hiện trường nhập [xác nhận mật khẩu cấp 2] bỏ trống';
				return $alert;
			}elseif($birthday==''){
				$alert='Phát hiện trường nhập [ngày sinh] bỏ trống';
				return $alert;
			}elseif($name==''){
				$alert='Phát hiện trường nhập [tên người dùng] bỏ trống';
				return $alert;
			}elseif($phone==''){
				$alert='Phát hiện trường nhập [số điện thoại] bỏ trống';
				return $alert;
			}elseif(strlen($user)<8 || strlen($pass)<8){
				$alert="Tên tài khoản và mật khẩu phải dài hơn 8 kí tự. Vui lòng kiểm tra lại và loại bỏ các kí tự khoảng trắng !";
				return $alert;
			}elseif(strlen($name)>10||strlen($name)<1){
				$alert="Tên người không đúng định dạng!";
				return $alert;
			}elseif($xac_nhan_mat_khau!=$pass){
				$alert="Nhập lại mật khẩu không đúng. Vui lòng thử lại !";
				return $alert;
			}elseif($xac_nhan_mat_khau_2!=$pass_2){
				$alert="Nhập lại mật khẩu cấp 2 không đúng. Vui lòng thử lại !";
				return $alert;
			}elseif (md5($pass)!=$result['pass']) {
				$alert="Nhập mật khẩu không đúng. Vui lòng thử lại";
				return $alert;
			}elseif (md5($pass_2)!=$result['pass_2']) {
				$alert="Nhập mật khẩu cấp 2 không đúng. Vui lòng thử lại";
				return $alert;
			}

			$scan="SELECT * FROM tbl_dangki WHERE ten_dang_nhap='$user' AND id!='$id'";
			$result_scan=$this->db->select($scan);
			if($result_scan!=NULL){
				$alert='Tên đăng nhập đã có người đăng kí';
				return $alert;
			}else{
			$update="UPDATE tbl_dangki SET ten_dang_nhap='$user',birthday='$birthday',phone='$phone',ten_nguoi_dung='$name' WHERE id='$id'";
			$result=$this->db->update($update);
			$alert='Cập nhật thành công !';
			return $alert;

		}
	}

		public function dangki($data){
			$user_trim=mysqli_escape_string($this->db->link,$data['user']);
			$user_trimed= preg_replace('/ /','',$user_trim);
			$user=mysqli_escape_string($this->db->link,$user_trimed);


			$pass_trim=mysqli_escape_string($this->db->link,$data['pass']);
			$pass_trimed=$this->fm->validation($pass_trim);
			$pass=mysqli_escape_string($this->db->link,$pass_trimed);

			$xac_nhan_mat_khau=mysqli_escape_string($this->db->link,$data['pass_2']);

			$pass_trim_2=mysqli_escape_string($this->db->link,$data['pass_3']);
			$pass_trimed_2=$this->fm->validation($pass_trim);
			$pass_2=mysqli_escape_string($this->db->link,$pass_trimed);

			$name_trim=mysqli_escape_string($this->db->link,$data['name']);
			$name_trimed= preg_replace('/ /','',$name_trim);
			$name=mysqli_escape_string($this->db->link,$name_trimed);

			$xac_nhan_mat_khau_2=mysqli_escape_string($this->db->link,$data['pass_4']);
			$birthday=mysqli_escape_string($this->db->link,$data['birthday']);
			$phone=mysqli_escape_string($this->db->link,$data['phone']);

			if($user==''){
				$alert='Phát hiện trường nhập [tên đăng nhập] bỏ trống';
				return $alert;
			}elseif($pass==''){
				$alert='Phát hiện trường nhập [mật khẩu] bỏ trống';
				return $alert;
			}elseif($xac_nhan_mat_khau==''){
				$alert='Phát hiện trường nhập [xác nhận mật khẩu] bỏ trống';
				return $alert;
			}elseif($pass_2==''){
				$alert='Phát hiện trường nhập [mật khẩu cấp 2] bỏ trống';
				return $alert;
			}elseif($xac_nhan_mat_khau_2==''){
				$alert='Phát hiện trường nhập [xác nhận mật khẩu cấp 2] bỏ trống';
				return $alert;
			}elseif($birthday==''){
				$alert='Phát hiện trường nhập [ngày sinh] bỏ trống';
				return $alert;
			}elseif($name==''){
				$alert='Phát hiện trường nhập [tên người dùng] bỏ trống';
				return $alert;
			}elseif($phone==''){
				$alert='Phát hiện trường nhập [số điện thoại] bỏ trống';
				return $alert;
			}elseif(strlen($user)<8 || strlen($pass)<8){
				$alert="Tên tài khoản và mật khẩu phải dài hơn 8 kí tự. Vui lòng kiểm tra lại và loại bỏ các kí tự khoảng trắng !";
				return $alert;
			}elseif(strlen($name)>10||strlen($name)<1){
				$alert="Tên người không đúng định dạng!";
				return $alert;
			}elseif($xac_nhan_mat_khau!=$pass){
				$alert="Nhập lại mật khẩu không đúng. Vui lòng thử lại !";
				return $alert;
			}elseif($xac_nhan_mat_khau_2!=$pass_2){
				$alert="Nhập lại mật khẩu cấp 2 không đúng. Vui lòng thử lại !";
				return $alert;
			}
			$scan="SELECT * FROM tbl_dangki WHERE ten_dang_nhap='$user'";
			$result_scan=$this->db->select($scan);
			if($result_scan!=NULL){
				$alert='Tên đăng nhập đã có người đăng kí';
				return $alert;
			}else{
			$query="INSERT INTO tbl_dangki(ten_dang_nhap,pass,pass_2,birthday,phone,ten_nguoi_dung) VALUES('$user',
			md5('$pass'),md5('$pass_2'),'$birthday','$phone','$name')";
			$result=$this->db->insert($query);
			$alert='Đăng kí thành công !';
			return $alert;
			}
		}
	}
?>
