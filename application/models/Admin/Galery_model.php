<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Galery_model extends Kodakil_Model
	{
		function __construct(){
			parent::__construct();
		}
		
		public function addCategory($postData){
			return $this->db->insert('galery_category',$postData);
		}
		public function getCategory(){
			$this->db->select('Id,category_title,status,sort,deleted');
			$this->db->from('galery_category');
			$this->db->where(array('deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function deleteCategory($Id){
			return $this->db->set('deleted',1)->where('Id',$Id)->update('galery_category');
		}
		public function editStatus($Id,$st){
			return $this->db->set('status',$st)->where('Id',$Id)->update('galery_category');
		}
		public function categoryInfo($Id)
		{
			$this->db->select('*');
			$this->db->from('galery_category');
			$this->db->where(array('Id'=>$Id));
			$categoryInfoQuery = $this->db->get();
			if ($categoryInfoQuery->num_rows()>0) {
				return $categoryInfoQuery->row();
			}else{
				return false;
			}
		}
		public function updateCategory($Id,$postData){
			return $this->db->set($postData)->where(array('Id'=>$Id))->update('galery_category');
		}
		public function category_list(){
			$this->db->select('Id,category_title,status,deleted');
			$this->db->from('galery_category');
			$this->db->where(array('status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function GaleryImageUpload(){
			if ($_FILES['file']["type"] == 'application/octet-stream' OR 
					$_FILES['file']["type"] == 'application/postscript' OR 
						$_FILES['file']["type"] == 'image/png' OR 
							$_FILES['file']["type"] == 'image/jpeg' OR 
								$_FILES['file']["type"] == 'image/webp' OR 
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
		public function addImage($data){
			if($this->db->insert('galery_image',$data)){
				return true;
			}else{
				return false;
			}
		}
		public function imageInfo(){
			$this->db->select('gi.*,gc.id cat_id,gc.category_title,gc.slug');
			$this->db->from('galery_image gi');
			$this->db->join('galery_category gc','gc.slug = gi.category_slug');
			$this->db->order_by('gi.id','DESC');
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}

		}
		public function GaleryEditStatus($id,$st){
			return $this->db->set('status',$st)->where('id',$id)->update('galery_image');
		}
		public function deleteGalery($id){
			return $this->db->delete('galery_image',array('id'=>$id));
		}
		public function delete($id){
			$this->db->select('id,image_url');
			$this->db->from('galery_image');
			$this->db->where(array('id'=>$id));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->row();
			}else{
				return false;
			}
		}
		public function getImage($Id){
			$this->db->select('*');
			$this->db->from('galery_image');
			$this->db->where(array('Id'=>$Id));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->row();
			}else{
				return false;
			}
		}
		public function updateGalery($postData,$id){
			return $this->db->set($postData)->where(array('id'=>$id))->update('galery_image');
		}

		public function SetSort($data){

			foreach ($data as $key => $val) {
				$this->db->where(array('id' => $key));
				$this->db->set(array('sort' => $val));
				$this->db->update('galery_image');
				}
				return true;
		}

		public function getCategoryList()
		{
			$this->db->from('galery_category');
			$this->db->where(array('status'=>1));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return array();
			}
		}
	}
?>