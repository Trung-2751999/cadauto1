<?php 
	include_once('../li/database.php');
	include_once('../helper/format.php');
	include_once('../li/session.php');
?>
<?php 
	/**
	 * 
	 */
	class product
	{
		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}
		public function insert_product($data,$files){
			
			$product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
			$product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);
			$url = mysqli_real_escape_string($this->db->link, $data['url']);
			$des_product = mysqli_real_escape_string($this->db->link, $data['des_product']);
			$file_name = $_FILES['images']['name'];

			// Kiem tra hinh anh va lay hinh anh cho vao folder upload

			if($product_name=="" ||$product_type==""|$url==""||$des_product==""||$file_name==""){
				$alert = "<span class='succses' style='color:red'>Không được để trống bất cứ trường nhập nào</span>";
				return $alert;
			}

			$congsu_id=Session::get('congsu_id');

			for($count_check=0;$count_check<count($_FILES['images']['name']);$count_check++){

				$permiteds = array('jpg','jpeg','png','gif');
				$file_names = $_FILES['images']['name'][$count_check];
				$files_temps = $_FILES['images']['tmp_name'][$count_check];
				$files_sizes = $_FILES['images']['size'][$count_check];
				$divs=explode('.',$file_names);
				$files_ext=end($divs);
				$uniques_image=$divs[0].'-'.rand().'.'.$files_ext;
				$uploads_image = "../upload/".$uniques_image;

				if(in_array($files_ext, $permiteds)==false && !empty($file_names)){
					$alert = "<span class='error'>Bạn chỉ có thể upload file dạng:-".implode(',', $permiteds)." và kích thước ảnh không quá 2MB </span>";
					return $alert;
					die();
				}
				elseif(!empty($file_names) && $files_sizes>1024*1024*1024*5){
					
						$alert = "<span class='error'>Chỉ được upload ảnh có kích thước dưới".$Mb."</span>";
						return $alert;
						die();
				}
				elseif(in_array($files_ext, $permiteds)==false){
					$alert = "<span class='error'>Bạn chỉ có thể upload file dạng:-".implode(',', $permiteds)."</span>";
					return $alert;
					die();
				}
			}
			$query="INSERT INTO tbl_product(product_name,product_type,url,des_product,congsu_id,status)VALUES('$product_name','$product_type','$url','$des_product','$congsu_id','CHƯA DUYỆT')";
			$result = $this->db->insert($query);	

			for($count_ex=0;$count_ex<count($_FILES['images']['name']);$count_ex++){
				$permiteds = array('jpg','jpeg','png','gif');
				$file_names = $_FILES['images']['name'][$count_ex];
				$files_temps = $_FILES['images']['tmp_name'][$count_ex];
				$divs=explode('.',$file_names);
				$files_ext=end($divs);
				$uniques_image=$divs[0].'-'.rand().'.'.$files_ext;
				$uploads_image = "../upload/".$uniques_image;

				move_uploaded_file($files_temps,$uploads_image);
				$select="SELECT MAX(product_id) FROM tbl_product WHERE congsu_id='$congsu_id'";
				$result=$this->db->insert($select);
				$get_id = $result->fetch_assoc();
				$ex_id=$get_id["MAX(product_id)"];
				$querys="INSERT INTO image_product(image,id_product)VALUES('$uniques_image','$ex_id')";
				$results = $this->db->insert($querys);

			}
				if($results && $result){
					$alert = "<span class='succses'style='color:green'>Thêm sản phẩm thành công</span>";
					return $alert;
				}
			}
			public function get_product(){
				$congsu_id=Session::get('congsu_id');
				$query="SELECT * FROM tbl_product WHERE congsu_id='$congsu_id' ORDER BY product_id DESC";
				$result=$this->db->select($query);
				return $result;
			}
			public function show_product($productid){
				$productid=mysqli_escape_string($this->db->link,$productid);
				$query="SELECT * FROM tbl_product WHERE product_id='$productid'";
				$result=$this->db->select($query);
				return $result;
			}
			public function count_success(){
				$congsu_id=Session::get('congsu_id');
				$query="SELECT COUNT('status') FROM tbl_product WHERE congsu_id='$congsu_id' AND status='ĐÃ DUYỆT'";
				$result=$this->db->select($query);
				return $result;
			}
			public function count_dont_success(){
				$congsu_id=Session::get('congsu_id');
				$query="SELECT COUNT('status') FROM tbl_product WHERE congsu_id='$congsu_id' AND status='CHƯA DUYỆT'";
				$result=$this->db->select($query);
				return $result;
			}
			public function show_image($productid){
				$productid=mysqli_escape_string($this->db->link,$productid);
				$query="SELECT * FROM image_product WHERE id_product='$productid'";
				$result=$this->db->select($query);
				return $result;
			}
			public function update_product($productid,$_file,$data){
				$productid=mysqli_escape_string($this->db->link,$productid);
				$product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
				$product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);
				$url = mysqli_real_escape_string($this->db->link, $data['url']);
				$des_product = mysqli_real_escape_string($this->db->link, $data['des_product']);
				$file_name = $_FILES['images']['name'];

				if($product_name=="" ||$product_type==""|$url==""||$des_product==""||$file_name==""){
				$alert = "<span class='succses' style='color:red'>Không được để trống bất cứ trường nhập nào</span>";
				return $alert;
				}
					$congsu_id=Session::get('congsu_id');

			for($count_check=0;$count_check<count($_FILES['images']['name']);$count_check++){

				$permiteds = array('jpg','jpeg','png','gif');
				$file_names = $_FILES['images']['name'][$count_check];
				$files_temps = $_FILES['images']['tmp_name'][$count_check];
				$files_sizes = $_FILES['images']['size'][$count_check];
				$divs=explode('.',$file_names);
				$files_ext=end($divs);
				$uniques_image=$divs[0].'-'.rand().'.'.$files_ext;
				$uploads_image = "../upload/".$uniques_image;

				if(in_array($files_ext, $permiteds)==false && !empty($file_names)){
					$alert = "<span class='error'>Bạn chỉ có thể upload file dạng:-".implode(',', $permiteds)." và kích thước ảnh không quá 2MB </span>";
					return $alert;
					die();
				}
				elseif(!empty($file_names) && $files_sizes>1024*1024*1024*5){
					
						$alert = "<span class='error'>Chỉ được upload ảnh có kích thước dưới".$Mb."</span>";
						return $alert;
						die();
				}
				elseif(empty($file_names)){
					break;
				}
				elseif(in_array($files_ext, $permiteds)==false){
					$alert = "<span class='error'>Bạn chỉ có thể upload file dạng:-".implode(',', $permiteds)."</span>";
					return $alert;
					die();
				}
			}
			if(empty($file_names)){
			$query="UPDATE tbl_product SET product_name='$product_name',product_type='$product_type',url='$url',des_product='$des_product',congsu_id='$congsu_id' WHERE product_id='$productid'";
			$result = $this->db->update($query);
			if($result){
					$alert = "<span class='succses'style='color:green'>Update sản phẩm thành công</span>";
					return $alert;
				}
			}else{
			$query="UPDATE tbl_product SET product_name='$product_name',product_type='$product_type',url='$url',des_product='$des_product',congsu_id='$congsu_id' WHERE product_id='$productid'";
			$result = $this->db->update($query);

			for($count_ex=0;$count_ex<count($_FILES['images']['name']);$count_ex++){
				$permiteds = array('jpg','jpeg','png','gif');
				$file_names = $_FILES['images']['name'][$count_ex];
				$files_temps = $_FILES['images']['tmp_name'][$count_ex];
				$divs=explode('.',$file_names);
				$files_ext=end($divs);
				$uniques_image=$divs[0].'-'.rand().'.'.$files_ext;
				$uploads_image = "../upload/".$uniques_image;

				move_uploaded_file($files_temps,$uploads_image);
				$querys="INSERT INTO image_product(image,id_product)VALUES('$uniques_image','$productid')";
				$results = $this->db->insert($querys);
			}
		}
				if($results && $result){
					$alert = "<span class='succses'style='color:green'>Update sản phẩm thành công</span>";
					return $alert;
				}
			}
		public function delete_image($id){
			$id=mysqli_real_escape_string($this->db->link,$id);
			$query="DELETE FROM image_product WHERE id='$id'";
			$results = $this->db->delete($query);
		}
		public function show_all_product(){
			$query="SELECT * FROM tbl_product";
			$results = $this->db->select($query);
			return $results;
		}

			
	}

	
 ?>