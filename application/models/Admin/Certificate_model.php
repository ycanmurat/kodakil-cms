<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Certificate_model extends Kodakil_Model{

	function __construct(){
		parent::__construct();
	}

	public function addCertificate($certificateInfo){
		return $this->db->insert('certificates',$certificateInfo);
	}

	public function getCertificates(){
		$this->db->select('*');
		$this->db->from('certificates');
		$this->db->where(array('deleted'=>0));
		$getCertificatesQuery = $this->db->get();
		if ($getCertificatesQuery->num_rows()>0) {
			return $getCertificatesQuery->result();
		}else{
			return false;
		}
	}

	public function certificateStatusUpdate($id,$newInfo){
		$data = array('id'=>$id,'status'=>$newInfo);
		return $this->db->set($data)->where(array('id'=>$id))->update('certificates');
	}
		
	public function certificateDelete($id){
		return $this->db->set(array('deleted'=>1))->where(array('id'=>$id))->update('certificates');
	}

	public function imageUpload(){
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

		public function getCertificateById($id)
		{
			$this->db->from('certificates');
			$this->db->where(array('id'=>$id));
			$getCertificatesQuery = $this->db->get();
			if ($getCertificatesQuery->num_rows()>0) {
				return $getCertificatesQuery->row();
			}else{
				return array();
			}
		}

		public function updateCertificate($id,$certificateInfo)
		{
			return $this->db->set($certificateInfo)->where(array('id'=>$id))->update('certificates');
		}
}
?>