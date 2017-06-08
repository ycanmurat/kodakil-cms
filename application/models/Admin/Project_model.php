<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Project_model extends Kodakil_Model
{
	function __construct(){
		parent::__construct();
	}

	public function fileUpload($file){
		if ($file["type"] == 'application/octet-stream' OR 
				$file["type"] == 'application/postscript' OR 
					$file["type"] == 'image/png' OR 
						$file["type"] == 'image/jpeg' OR 
							$file["type"] == 'image/gif' OR 
								$file["type"] =='image/svg+xml' OR 
									$file["type"] == 'application/pdf'){

		$target_dir 	= "assets/uploads/";
		$rand 			= rand(10,999999999999);
		$rand 			= md5(md5($rand).md5(strtotime('now')));
		$target_file 	= $target_dir.$rand.url_seo($file["name"]);
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
		if (move_uploaded_file($file["tmp_name"], $target_file)){
			return $target_file;
			}else{
				return '';
			}
		}else{
			return '';
		}
	}

	public function addProject($data)
	{
		$data->galeri 					= reverseArray($data->files['galeri']);
		$data->posts->main_image 		= $this->fileUpload($data->files['main_image']);
		$data->posts->page_background 	= $this->fileUpload($data->files['page_background']);
		$data->posts->image2 			= $this->fileUpload($data->files['image2']);
		$data->posts->image3 			= $this->fileUpload($data->files['image3']);
		$data->posts->image5 			= $this->fileUpload($data->files['image5']);
		$data->posts->slug 				= url_seo($data->posts->name);

		$this->db->set($data->posts);
		$this->db->insert('project');
		$project_id = $this->db->insert_id();

		$galeri = array();
		foreach ($data->galeri as $key => $val) {
			$galeri[] = array('image' => $this->fileUpload($val),'project_id' => $project_id);
		}
		$this->db->insert_batch('project_img', $galeri); 

		return true;
	}

	public function UpdateProject($data,$id)
	{
		$data->galeri 					= reverseArray($data->files['galeri']);

		$main_image 		= $this->fileUpload($data->files['main_image']);
		if ($main_image != '') {
			$data->posts->main_image = $main_image;
		}
		$page_background 	= $this->fileUpload($data->files['page_background']);
		if ($page_background != '') {
			$data->posts->page_background = $page_background;
		}
		$image2 			= $this->fileUpload($data->files['image2']);
		if ($image2 != '') {
			$data->posts->image2 = $image2;
		}
		$image3 			= $this->fileUpload($data->files['image3']);
		if ($image3 != '') {
			$data->posts->image3 = $image3;
		}
		$image5 			= $this->fileUpload($data->files['image5']);
		if ($image5 != '') {
			$data->posts->image5 = $image5;
		}

		$data->posts->slug 	= url_seo($data->posts->name);

		$this->db->set($data->posts);
		$this->db->where('id',$id);
		$this->db->update('project');

		$galeri = array();
		foreach ($data->galeri as $key => $val) {
			$galeris = $this->fileUpload($val);

			if ($galeris != '') {
				$galeri[] = array('image' => $galeris,'project_id' => $id);
			}
		}
		if ($galeri != array()) {
			$this->db->insert_batch('project_img', $galeri); 
		}

		return true;
	}

	public function getAllProject()
	{
		$this->db->where(array('deleted' => 0));
		$this->db->select('id,name,slug,sort,status,added_time');
		$q = $this->db->get('project');

		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return array();
		}
	}

	public function UpdateStatus($id,$status)
	{
		$this->db->where(array('id' => $id));
		$this->db->set(array('status' => $status));
		$this->db->update('project');
		return true;
	}

	public function delete($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->set(array('deleted' => 1));
		$this->db->update('project');
		return true;
	}

	public function getProjectById($id)
	{
		$this->db->where(array('id' => $id,'deleted' => 0));
		$q = $this->db->get('project');

		if ($q->num_rows()>0) {
			$q = $q->row();
			$this->db->where('project_id',$id);
			$qq = $this->db->get('project_img');

			if ($qq->num_rows()>0) {
				$q->galeri = $qq->result();
			}
			else{
				$q->galeri = array();
			}
		}else{
			return array();
		}
		return $q;
	}

	public function galeriImageDeleteById($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete('project_img');
		return true;
	}
}
?>