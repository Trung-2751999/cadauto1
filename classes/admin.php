<?php 
	include_once('../li/database.php');
	include_once('../helper/format.php');
	include_once('../li/session.php');
?>
<?php 
	/**
	 * 
	 */
	class admin
	{
		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}
		public function show_products(){
			$pd="SELECT tbl_product.*,tbl_congsu.ten_congsu,tbl_congsu.congsu_name FROM tbl_congsu INNER JOIN tbl_product ON tbl_congsu.congsu_id=tbl_product.congsu_id ORDER BY tbl_product.product_id DESC";
			return $this->db->select($pd);
		}
		public function show_product($id){
			$id=mysqli_escape_string($this->db->link,$id);
			$query="SELECT * FROM tbl_product WHERE product_id='$id'";
			return $this->db->select($query);
		}
		public function show_image($id){
			$id=mysqli_escape_string($this->db->link,$id);
			$query="SELECT * FROM image_product WHERE id_product='$id' ";
			return $this->db->select($query);
		}
		public function delete_image($id){
			$id=mysqli_real_escape_string($this->db->link,$id);
			$query="DELETE FROM image_product WHERE id='$id'";
			$results = $this->db->delete($query);
		}
		public function show_all_congsu(){
			$query="SELECT * FROM tbl_congsu";
			$results = $this->db->select($query);
			return $results;
		}
		public function delete_product($id){
			$id=mysqli_real_escape_string($this->db->link,$id);
			$query="DELETE FROM tbl_product_admin WHERE id='$id'";
			$results = $this->db->delete($query);
			$deleteimg="DELETE FROM image_product_admin WHERE id_product='$id'";
			$resultsimg=$this->db->delete($deleteimg);
		}
		public function show_product_admin(){
			$query="SELECT * FROM tbl_product_admin ORDER BY id DESC";
			return $this->db->select($query);
		}
		public function show_info_product_admin($productid){
			$productid=mysqli_escape_string($this->db->link,$productid);
			$query="SELECT * FROM tbl_product_admin WHERE id='$productid'";
			$result=$this->db->select($query);
			return $result;
		}
		public function show_image_admin($productid){
			$productid=mysqli_escape_string($this->db->link,$productid);
			$query="SELECT * FROM image_product_admin WHERE id_product='$productid'";
			$result=$this->db->select($query);
			return $result;
		}
		public function delete_image_product_admin($productid){
			$productid=mysqli_escape_string($this->db->link,$productid);
			$query="DELETE FROM image_product_admin WHERE id='$productid'";
			$result=$this->db->delete($query);
		}
		public function select_exist($productid){
			$productid=mysqli_escape_string($this->db->link,$productid);
			$query="SELECT * FROM tbl_product_admin WHERE id_product_congsu='$productid'";
			$result=$this->db->select($query);
			return $result;
		}
		public function backup_product($productid,$_file,$data,$id){
				$id=mysqli_escape_string($this->db->link,$id);
				$productid=mysqli_escape_string($this->db->link,$productid);
				$product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
				$product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);
				$url = mysqli_real_escape_string($this->db->link, $data['url']);
				$des_product = mysqli_real_escape_string($this->db->link, $data['des_product']);
				$price = mysqli_real_escape_string($this->db->link, $data['price']);
				$file_name = $_FILES['images']['name'];

				if($product_name=="" ||$product_type==""||$url==""||$des_product==""||$file_name==""||$price==""){
				$alert = "Không được để trống bất cứ trường nhập nào";
				return $alert;
			}
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
		}		if(empty($file_names)){
					$select_null="SELECT * FROM image_product WHERE id_product='$productid'";
					$result_null = $this->db->select($select_null);
					if($result_null!=NULL){

					$query="UPDATE tbl_product_admin SET product_name='$product_name',product_type='$product_type',url='$url',des_product='$des_product',price='$price' WHERE id_product_congsu='$productid'";
					$result = $this->db->update($query);

					$ins_img="INSERT INTO image_product_admin(id_product,image) SELECT tbl_product_admin.id,image_product.image FROM tbl_product_admin,image_product WHERE tbl_product_admin.id='$id'AND image_product.id_product='$productid'";
					$result_ins_img = $this->db->insert($ins_img);

					if($result && $result_ins_img){
						$alert = "Backup sản phẩm thành công";
						return $alert;
						}
					}else{
						$alert="Sản phẩm chưa có bất kì ảnh mô tả nào. Hãy thêm ảnh !!!";
						return $alert;
					}
				}else{
					for($count_ex=0;$count_ex<count($_FILES['images']['name']);$count_ex++){
					$permiteds = array('jpg','jpeg','png','gif');
					$file_names = $_FILES['images']['name'][$count_ex];
					$files_temps = $_FILES['images']['tmp_name'][$count_ex];
					$divs=explode('.',$file_names);
					$files_ext=end($divs);
					$uniques_image=$divs[0].'-'.rand().'.'.$files_ext;
					$uploads_image = "../upload/".$uniques_image;

					move_uploaded_file($files_temps,$uploads_image);
					$querys="INSERT INTO image_product_admin(image,id_product)VALUES('$uniques_image','$id')";
					$resultimg_admin = $this->db->insert($querys);
				}
				$query="UPDATE tbl_product_admin SET product_name='$product_name',product_type='$product_type',url='$url',des_product='$des_product',price='$price' WHERE id_product_congsu='$productid'";
					$result = $this->db->update($query);
				}
				if($resultimg_admin && $result){
				$alert = "Update sản phẩm thành công !";
				return $alert;
				}
			}
			


		public function update_product($productid,$_file,$data){
				$productid=mysqli_escape_string($this->db->link,$productid);
				$product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
				$product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);
				$url = mysqli_real_escape_string($this->db->link, $data['url']);
				$des_product = mysqli_real_escape_string($this->db->link, $data['des_product']);
				$price = mysqli_real_escape_string($this->db->link, $data['price']);
				$file_name = $_FILES['images']['name'];

				if($product_name=="" ||$product_type==""||$url==""||$des_product==""||$file_name==""||$price==""){
				$alert = "Không được để trống bất cứ trường nhập nào";
				return $alert;
				}

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
					$select_null="SELECT * FROM image_product_admin WHERE id_product='$productid'";
					$result_null = $this->db->select($select_null);
					if($result_null!=NULL){
					$query="UPDATE tbl_product_admin SET product_name='$product_name',product_type='$product_type',url='$url',des_product='$des_product',price='$price' WHERE id='$productid'";
					$result = $this->db->update($query);
					if($result){
						$alert = "Update sản phẩm thành công";
						return $alert;
					}
				}else{
					$alert="Sản phẩm không có bất kì ảnh mô tả nào. Hãy thêm ảnh";
					return $alert;
				}
			}else{
				for($count_ex=0;$count_ex<count($_FILES['images']['name']);$count_ex++){
				$permiteds = array('jpg','jpeg','png','gif');
				$file_names = $_FILES['images']['name'][$count_ex];
				$files_temps = $_FILES['images']['tmp_name'][$count_ex];
				$divs=explode('.',$file_names);
				$files_ext=end($divs);
				$uniques_image=$divs[0].'-'.rand().'.'.$files_ext;
				$uploads_image = "../upload/".$uniques_image;

				move_uploaded_file($files_temps,$uploads_image);
				$querys="INSERT INTO image_product_admin(image,id_product)VALUES('$uniques_image','$productid')";
				$resultimg_admin = $this->db->insert($querys);
					}
				$query="UPDATE tbl_product_admin SET product_name='$product_name',product_type='$product_type',url='$url',des_product='$des_product',price='$price' WHERE id='$productid'";
				$result = $this->db->update($query);
			}
			if($resultimg_admin && $result){
				$alert = "Update sản phẩm thành công !";
				return $alert;
			}
		}

		public function post_product($data,$file,$id){
			$id=mysqli_real_escape_string($this->db->link, $id);
			$product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
			$product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);
			$url = mysqli_real_escape_string($this->db->link, $data['url']);
			$des_product = mysqli_real_escape_string($this->db->link, $data['des_product']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$file_name = $_FILES['images']['name'];

			if($product_name=="" ||$product_type==""|$url==""||$des_product==""||$price==""){
				$alert = "Không được để trống bất cứ trường nhập nào";
				return $alert;
			}
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
					$alert = "Bạn chỉ có thể upload file dạng:-".implode(',', $permiteds)." và kích thước ảnh không quá 2MB";
					return $alert;
					die();
				}
				elseif(!empty($file_names) && $files_sizes>1024*1024*1024*5){
					
						$alert = "Chỉ được upload ảnh có kích thước dưới".$Mb."";
						return $alert;
						die();
				}
				elseif(empty($file_names)){
					break;
				}
				elseif(in_array($files_ext, $permiteds)==false){
					$alert = "Bạn chỉ có thể upload file dạng:-".implode(',', $permiteds)."";
					return $alert;
					die();
				}
			}
				if(empty($file_names)){
				$select_null="SELECT * FROM image_product WHERE id_product='$id'";
				$result_null = $this->db->select($select_null);
				if($result_null!=NULL){
				$query="INSERT INTO tbl_product_admin(product_name,product_type,url,des_product,price,id_product_congsu)VALUES('$product_name','$product_type','$url','$des_product','$price','$id')";
				$result=$this->db->insert($query);

						$select="SELECT MAX(id) FROM tbl_product_admin";
						$result_select=$this->db->insert($select)->fetch_assoc();
						$max_id=$result_select["MAX(id)"];
				
				$queryimg="INSERT INTO image_product_admin(image,id_product) SELECT image_product.image,tbl_product_admin.id FROM image_product,tbl_product_admin WHERE image_product.id_product='$id' AND tbl_product_admin.id='$max_id'";
				$resultimg = $this->db->insert($queryimg);


				if($resultimg && $result){
					$update_query="UPDATE tbl_product SET status='ĐÃ DUYỆT' WHERE product_id='$id'";
					$update=$this->db->update($update_query);

					$alert = "Post sản phẩm thành công !";
					return $alert;
					}else{
						$alert = "Post sản phẩm thất bại. Vui lòng kiểm tra lại !";
						return $alert;
					}
				}else{
					$alert="Sản phẩm không có bất kì ảnh mô tả nào. Hãy thêm ảnh";
					return $alert;
				}
			}else{
				$query="INSERT INTO tbl_product_admin(product_name,product_type,url,des_product,price,id_product_congsu)VALUES('$product_name','$product_type','$url','$des_product','$price','$id')";
				$result=$this->db->insert($query);

				for($count_ex=0;$count_ex<count($_FILES['images']['name']);$count_ex++){
				$permiteds = array('jpg','jpeg','png','gif');
				$file_names = $_FILES['images']['name'][$count_ex];
				$files_temps = $_FILES['images']['tmp_name'][$count_ex];
				$divs=explode('.',$file_names);
				$files_ext=end($divs);
				$uniques_image=$divs[0].'-'.rand().'.'.$files_ext;
				$uploads_image = "../upload/".$uniques_image;

				move_uploaded_file($files_temps,$uploads_image);
				$select="SELECT MAX(id) FROM tbl_product_admin";
				$result=$this->db->insert($select);
				$get_id = $result->fetch_assoc();
				$ex_id=$get_id["MAX(id)"];
				$querys="INSERT INTO image_product_admin(image,id_product)VALUES('$uniques_image','$ex_id')";
				$resultimg_admin = $this->db->insert($querys);
					}


				$select="SELECT MAX(id) FROM tbl_product_admin";
				$result_select=$this->db->insert($select)->fetch_assoc();
				$max_id=$result_select["MAX(id)"];
				
				$queryimg="INSERT INTO image_product_admin(image,id_product) SELECT image_product.image,tbl_product_admin.id FROM image_product,tbl_product_admin WHERE image_product.id_product='$id' AND tbl_product_admin.id='$max_id'";
				$resultimg = $this->db->insert($queryimg);


				if($result && $resultimg_admin && $resultimg){
					$update_query="UPDATE tbl_product SET status='ĐÃ DUYỆT' WHERE product_id='$id'";
					$update=$this->db->update($update_query);

					$alert = "Post sản phẩm thành công !";
					return $alert;
					}else{
						$alert = "Post sản phẩm thất bại. Vui lòng kiểm tra lại !";
						return $alert;
					}
			}
		}

	}