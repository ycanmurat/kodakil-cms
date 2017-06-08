<?php  
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Catalog_model extends Kodakil_model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getCatalog()
	{
		$this->db->from('catalog');
		$this->db->where(array('deleted'=>0));
		$this->db->order_by('id','DESC');
		$getCatalogQuery = $this->db->get();
		if ($getCatalogQuery->num_rows()>0) {
			return $getCatalogQuery->result();
		}else{
			return array();
		}
	}

	public function addCatalog($catalogData){
		return $this->db->insert('catalog',$catalogData);
	}

	public function addLinkCatalog($catalogLinkData){
		return $this->db->insert('catalog',$catalogLinkData);
	}

	public function catalogInfo($id){
		$this->db->from('catalog');
		$this->db->where(array('Id'=>$id));
		$catalogInfo = $this->db->get();
		if ($catalogInfo->num_rows()>0) {
			return $catalogInfo->row();
		}else{
			return false;
		}
	}

	public function updateCatalog($id,$catalogData){
		return $this->db->set($catalogData)->where(array('id'=>$id))->update('catalog');
	}

	public function CatalogStatusUpdate($id,$newInfo){
		return $this->db->set(array('status'=>$newInfo))->where(array('Id'=>$id))->update('catalog');
	}
		
	public function deleteCatalog($id){
		return $this->db->set(array('deleted'=>1))->where(array('Id'=>$id))->update('catalog');
	}

	public function ContentImageUpload(){
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