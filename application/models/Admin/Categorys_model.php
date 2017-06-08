<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Categorys_model extends Kodakil_Model
	{
		function __construct(){
			parent::__construct();
		}
		public function getLanguages(){
			$this->db->select('Id,short_code,lang_name,status,deleted');
			$this->db->from('languages');
			$this->db->where(array('status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function addCategory($category_title,$description,$keywords,$sort,$menu,$lang,$category_slug,$default_image){
			$categoryInfo 	=  ['sort' 			=> $sort,
								'menu' 			=> $menu,
								'default_image' => $default_image];
			if($this->db->insert('category',$categoryInfo)){
				$insertId 	= $this->db->insert_id();
				$Insert  	= array();
				$Data	 	= array();
				foreach ($category_slug as $key => $Ins){
					$Data[$key] = url_seo($Ins);
				}
				$category_slug = $Data;
				foreach ($lang as $key => $Join) {
					$Insert[]  = array('category_id' 	=> $insertId,
									   'lang_id' 	 	=> $key,
									   'name' 		 	=> $Join,
									   'category_slug'	=> $category_slug[$key],
									   'category_title'	=> $category_title,
								       'description' 	=> $description,
								       'keywords'		=> $keywords);
				}
				if ($this->db->insert_batch('category_lang', $Insert)){
					return true;
				}else{
					$this->db->where('id', $insertId)->delete('category');
					return false;
				}
			}else{
				return false;
			}
		}
		public function getCategory(){
			$this->db->select('c.Id,c.status,c.menu,c.sort,c.deleted,cl.category_title,cl.category_id,cl.lang_id,cl.name,cl.category_slug');
			$this->db->from('category c');
			$this->db->join('category_lang cl','c.Id = cl.category_id');
			$this->db->where(array('c.deleted' => 0, 'cl.lang_id' => 1));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function editStatus($Id,$st){
			return $this->db->set('status',$st)->where('Id',$Id)->update('category');
		}
		public function deleteCategory($Id){
			return $this->db->set('deleted',1)->where('Id',$Id)->update('category');
		}
		public function categoryInfo($Id)
		{
			return $this->db->query("SELECT l.Id newlang_id, l.lang_name, cat.* FROM languages l LEFT JOIN (SELECT c.menu, c.sort,c.default_image, cl.* FROM category c INNER JOIN category_lang cl ON c.Id = cl.category_id WHERE c.id = $Id) cat ON cat.lang_id = l.Id WHERE l.deleted = 0 AND l.status = 1 GROUP BY l.id")->result();
		}
		public function updateCategory($Id,$category_title,$description,$keywords,$sort,$menu,$lang,$newlang = false,$category_slug,$default_image){
			$data 	=	['sort' 				=> $sort,
						 'menu' 				=> $menu,
						 'default_image' 		=> $default_image];
			if($this->db->where('Id',$Id)->update('category',$data)){
				$data_update 		= array();
				$data_insert 		= array();
				foreach($lang as $key => $value){
					$name_slug 		= url_seo($category_slug[$key]);
					$data_update 	= array('name' 			=> $value,
										 	'category_slug' => $name_slug);	
					$this->db->where('category_id',$Id)->where('lang_id',$key)->update('category_lang', $data_update);
				}
				if($newlang){
					foreach($newlang as $key => $value){
							$name_slug 		= url_seo($category_slug[$key]);
							$data_insert[] 	= array('category_id' 	=> $Id,
													'lang_id' 		=> $key,
													'name' 			=> $value,
													'category_slug' => $name_slug,
													'description' 	=> $description,
						 							'keywords' 		=> $keywords,
						 							'category_title'=> $category_title,);
					}
					$this->db->insert_batch('category_lang',$data_insert);
				}
				return true;
			}else{
				return false;
			}
		}
		public function CategoryImageUpload(){
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
	}
?>