<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Team_model extends Kodakil_Model
{

	function __construct(){
		parent::__construct();
	}

	public function addTam($teamData)
	{
		return $this->db->insert('team',$teamData);
	}

	public function getTeam()
	{
		$this->db->select('*');
		$this->db->from('team');
		$this->db->where(array('deleted'=>0));
		$this->db->order_by('id','DESC');
		$getBlogQuery = $this->db->get();
		if ($getBlogQuery->num_rows()>0) {
			return $getBlogQuery->result();
		}else{
			return array();
		}
	}

	public function teamInfo($id){
		$this->db->select('*');
		$this->db->from('team');
		$this->db->where(array('id'=>$id));
		$blogInfo = $this->db->get();
		if ($blogInfo->num_rows()>0) {
			return $blogInfo->row();
		}else{
			return false;
		}
	}

	public function updateTeam($id,$teamData){
		return $this->db->set($teamData)->where(array('id'=>$id))->update('team');
	}

	public function teamStatusUpdate($id,$newInfo){
		$data = array('id'=>$id,'status'=>$newInfo);
		return $this->db->set($data)->where(array('id'=>$id))->update('team');
	}
		
	public function deleteTeam($id){
		return $this->db->set(array('deleted'=>1))->where(array('id'=>$id))->update('team');
	}

	public function ContentImageUpload()
	{
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