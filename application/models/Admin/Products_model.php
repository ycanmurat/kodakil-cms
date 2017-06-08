<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Products_model extends Kodakil_Model
	{		
		function __construct(){
			parent::__construct();
		}
		public function languageList(){
			$this->db->select('Id,lang_name,status,deleted');
			$this->db->from('languages');
			$this->db->where(array('status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function ProductImageUpload(){
			if ($_FILES['file']["type"] == 'application/octet-stream' OR 
					$_FILES['file']["type"] == 'application/postscript' OR 
						$_FILES['file']["type"] == 'image/png' OR 
							$_FILES['file']["type"] == 'image/jpeg' OR 
								$_FILES['file']["type"] == 'image/gif' OR 
									$_FILES['file']["type"] =='image/svg+xml' OR 
										$_FILES['file']["type"] == 'application/pdf'){

			$target_dir 	= "assets/uploads/";
			$rand 			= rand(10,999999999999);
			$rand 			= md5(md5($rand).md5(strtotime('now')));
			$target_file 	= $target_dir.$rand.url_seo($_FILES['file']["name"]);
			$newname 		= "";
			$namearr 		= explode('-', $target_file);
			$count 			= count($namearr)-1;
			foreach ($namearr as $key => $val){
				if($key == $count){
					$newname .= ".".$val;
				}elseif ($key == 0){
					$newname .= $val;
				}else{
					$newname .= "-".$val;
				}
			}
			$target_file 	= $newname;
			if (move_uploaded_file($_FILES['file']["tmp_name"], $target_file)){
				return $target_file;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		public function addProduct($productInfo){
			return $this->db->insert('products',$productInfo);
		}
		public function category_list(){
			$this->db->select('c.Id,c.status,c.deleted,cl.category_id,cl.lang_id,cl.name');
			$this->db->from('category c');
			$this->db->join('category_lang cl','c.Id = cl.category_id');
			$this->db->where(array('c.status'=>1,'c.deleted'=>0,'cl.lang_id'=>1));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function productInfo(){
			
			$this->db->select('c.Id,c.status,c.deleted,cl.category_id,cl.category_title,l.Id,l.lang_name,l.status,l.deleted,p.Id,p.product_name,p.lang_id,p.product_image,p.category_id,p.status,p.deleted');
			$this->db->from('products p');
			$this->db->join('category c','p.category_id = c.Id');
			$this->db->join('languages l','p.lang_id = l.Id');
			$this->db->join('category_lang cl','c.Id = cl.category_id');
			$this->db->where(array('c.deleted'=>0,'l.deleted'=>0,'p.deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
			
		}
		public function editStatus($Id,$st){
			return $this->db->set('status',$st)->where('Id',$Id)->update('products');
		}
		public function deleteProduct($Id){
			return $this->db->set('deleted',1)->where('Id',$Id)->update('products');
		}
		public function product($Id){
			$this->db->select('*');
			$this->db->from('products');
			$this->db->where(array('status'=>1,'deleted'=>0,'Id'=>$Id));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->row();
			}else{
				return false;
			}
		}
		public function eProduct($productInfo,$Id){
			return $this->db->set($productInfo)->where('Id',$Id)->update('products');
		}
		public function newProductInfo(){
			$this->db->select('Id,product_name,lang_id,status,deleted');
			$this->db->from('products');
			$this->db->where(array('lang_id'=>1,'status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function ProductIsThere($product_id){
			$this->db->select('*');
			$this->db->from('new_products');
			$this->db->where(array('product_id'=>$product_id));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function addNewProduct($product_id){
			$p = array('product_id'=>$product_id);
			return $this->db->insert('new_products',$p);
		}
		public function getNewsProduct(){
			$this->db->select('np.Id,np.product_id,p.product_name,p.status,p.deleted,p.lang_id');
			$this->db->from('new_products np');
			$this->db->join('products p','np.product_id = p.Id');
			$this->db->where(array('p.lang_id'=>1,'p.status'=>1,'p.deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function deleteNewProduct($Id){
			return $this->db->delete('new_products', array('Id' => $Id));
		}

	}
?>