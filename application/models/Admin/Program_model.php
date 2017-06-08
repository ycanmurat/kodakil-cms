<?php 
/**
 * 
 */
class Program_model extends Kodakil_model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getInstructor()
	{
		$this->db->select('id,name_surname');
		$q = $this->db->get('instructors');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return false;
		}
	}

	public function getProgramMenu()
	{
		$this->db->where(array('deleted' => 0));
		$q = $this->db->get('program_menu');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return array();
		}
	}

	public function getAllPrograms()
	{
		$this->db->where(array('deleted' => 0));
		$q = $this->db->get('program');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return array();
		}
	}

	public function editStatus($id,$status)
	{
		$this->db->set(array('status' => $status));
		$this->db->where(array('id' => $id));
		$this->db->update('program');
		return true;
	}

	public function addDay($name,$sort,$id)
	{
		$this->db->set(array('name' => $name, 'sort' => $sort, 'program_id' => $id));
		$this->db->insert('program_day');
		return true;
	}

	public function deleteProgram($id)
	{
		$this->db->set(array('deleted' => 1));
		$this->db->where(array('id' => $id));
		$this->db->update('program');
		return true;
	}

	public function deleteDay($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete('program_day');
		return true;
	}

	public function GetProgramInstructor($id)
	{
		$this->db->select('i.*,(SELECT name_surname FROM instructors WHERE id = i.instructor_id) name');
		$this->db->where('program_id',$id);
		$q = $this->db->get('program_instructor i');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return array();
		}
	}

	public function deleteInstructor($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete('program_instructor');
		return true;
	}

	public function getNotUsedInstructor($id)
	{
		$this->db->select('instructor_id');
		$this->db->where(array('program_id' => $id));
		$q = $this->db->get('program_instructor');
		$a = array();
		if ($q->num_rows()>0) {
			$q = $q->result();
			foreach ($q as $key => $val) {
				$a[] = $val->instructor_id;
			}
		}else{
			$a = array(0);
		}

		$this->db->select('id,name_surname');
		$this->db->where(array('deleted' => 0,'status' => 1));
		$this->db->where_not_in('i.id', $a);
		$q = $this->db->get('instructors i');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return false;
		}
	}

	public function addInstructor($instructor_id,$program_id)
	{
		$this->db->set(array('program_id'=>$program_id,'instructor_id' => $instructor_id));
		$this->db->insert('program_instructor');
		return true;
	}

	public function deleteDayDetail($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete('program_day_detail');
		return true;
	}

	public function addDayDetail($name,$time,$sort,$day_id,$program_id)
	{
		$this->db->set(array('name' => $name, 'sort' =>$sort,'time' => $time,'day_id' => $day_id, 'program_id' => $program_id));
		$this->db->insert('program_day_detail');
		return true;
	}

	public function getProgramById($id)
	{
		$this->db->where(array('deleted' => 0, 'id' => $id));
		$q = $this->db->get('program');
		if ($q->num_rows()>0) {
			return $q->row();
		}else{
			return false;
		}
	}

	public function getDayDetailById($id)
	{
		$this->db->where(array('day_id' => $id));
		$q = $this->db->get('program_day_detail');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return array();
		}
	}

	public function addProgram($data)
	{
		$this->db->set($data);
		$this->db->insert('program');
		return true;
	}

	public function editProgram($data,$id)
	{
		$this->db->where(array('id' => $id));
		$this->db->set($data);
		$this->db->update('program');
		return true;
	}

	public function getDayById($id)
	{
		$this->db->select('d.*,(SELECT COUNT(*) FROM program_day_detail dd WHERE d.id = dd.day_id) icerik');
		$this->db->where(array('program_id'=>$id));
		$q = $this->db->get('program_day d');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return array();
		}
	}

	public function menudelete($id)
	{
		$this->db->where('id',$id);
		$this->db->set(array('deleted' => 1));
		$this->db->update('program_menu');
		return true;
	}

	public function addMenu($menu)
	{
		$this->db->set(array('name'=>$menu));
		$this->db->insert('program_menu');
		return true;
	}

	public function ImageUpload(){

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
		if (substr($target_file, -3) != 'php' OR substr($target_file, -2) != 'js' ) {
			if (move_uploaded_file($_FILES['file']["tmp_name"], $target_file)){
				$this->session->set_flashdata('banner',$target_file);
				return 1;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function getRegistrationByProgramId($id)
	{
		$this->db->where(array('program_id' => $id));
		$q = $this->db->get('program_registration');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return array();
		}
	}
}
?>