<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Human_resources_model extends Kodakil_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getCities()
	{
		$this->db->select('CityID,CityName');
		$this->db->from('location_cities');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function getPositions()
	{
		$this->db->from('position');
		$this->db->where(array('deleted'=>0,'status'=>1));
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function formAdd($postData)
	{
		return $this->db->insert('human_resources',$postData);
	}

	public function imageUpload()
	{
		if ((substr($_FILES['file']["name"],-2) != 'js') AND (substr($_FILES['file']["name"],-3) != 'php')){
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