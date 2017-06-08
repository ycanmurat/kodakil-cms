<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Video_model extends Kodakil_Model
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

		public function addVideo($data){
			if($this->db->insert('galery_video',$data)){
				return true;
			}else{
				return false;
			}
		}

		public function imageInfo(){
			$this->db->select('v.*, (SELECT name FROM video_category WHERE id = v.category_id) menuName');
			$this->db->from('galery_video v');
			$this->db->order_by('v.id','asc');
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}

		public function VideoEditStatus($Id,$st){
			return $this->db->set('status',$st)->where('Id',$Id)->update('galery_video');
		}

		public function deleteVideo($Id){
			return $this->db->delete('galery_video',array('Id'=>$Id));
		}

		public function delete($Id){
			$this->db->where(array('Id'=>$Id));
			$this->db->delete('galery_video');
			return true;
		}

		public function getImage($Id){
			$this->db->select('*');
			$this->db->from('galery_video');
			$this->db->where(array('Id'=>$Id));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->row();
			}else{
				return false;
			}
		}

		public function categoryDel($id)
		{
			$this->db->set(array('deleted' => 1));
			$this->db->where(array('id' => $id));
			$this->db->update('video_category');
			return true;
		}

		public function getCategoryAll()
		{
			$this->db->where(array('deleted'=>0));
			$q = $this->db->get('video_category');
			if($q->num_rows()>0){
				return $q->result();
			}else{
				return array();
			}
		}

		public function addCategory($name)
		{
			$this->db->set(array('name' => $name));
			$this->db->insert('video_category');
			return true;
		}

		public function getVideoCategoryAll()
		{
			$this->db->where(array('deleted' => 0));
			$q = $this->db->get('video_category');
			if($q->num_rows()>0){
				return $q->result();
			}else{
				return array();
			}
		}

		public function VideoImageUpload(){
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