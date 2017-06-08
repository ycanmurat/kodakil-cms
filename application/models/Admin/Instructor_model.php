<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Instructor_model extends Kodakil_Model
	{
		function __construct(){
			parent::__construct();
		}

		public function getInstructors(){
			$this->db->select('id,name_surname,title,picture,status,deleted');
			$this->db->from('instructors');
			$this->db->where(array('deleted'=>0));
			$getInstructors = $this->db->get();
			if ($getInstructors->num_rows()>0) {
				return $getInstructors->result();
			}else{
				return false;
			}
		}

		public function addInstructor($instructorInfo){
			return $this->db->insert('instructors',$instructorInfo);
		}

		public function instructorStatusUpdate($id,$newInfo){
			$data = array('id'=>$id,'status'=>$newInfo);
			return $this->db->set($data)->where(array('id'=>$id))->update('instructors');
		}
		
		public function instructorDelete($id){
			return $this->db->set(array('deleted'=>1))->where(array('id'=>$id))->update('instructors');
		}

		public function ImageUpload(){
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

		public function getInstructorsInfo($id){
			$this->db->select('*');
			$this->db->from('instructors');
			$this->db->where(array('id'=>$id));
			$getInstructorsInfoQuery = $this->db->get();
			if ($getInstructorsInfoQuery->num_rows()>0) {
				return $getInstructorsInfoQuery->row();
			}else{
				return false;
			}
		}

		public function cacheInfo($id){
			$this->db->select('id,picture');
			$this->db->from('instructors');
			$this->db->where(array('id'=>$id));
			$getInstructorsInfoQuery = $this->db->get();
			if ($getInstructorsInfoQuery->num_rows()>0) {
				return $getInstructorsInfoQuery->row();
			}else{
				return false;
			}
		}

		public function updateInstructor($instructorInfo,$id){
			return $this->db->set($instructorInfo)->where(array('id'=>$id))->update('instructors');
		}
	
	}
?>