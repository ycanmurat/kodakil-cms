<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Referances_model extends Kodakil_Model
	{	
		function __construct(){
			parent::__construct();
		}
		public function ReferancesImageUpload(){
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
		public function addReferances($referancesInfo){
			return $this->db->insert('referances',$referancesInfo);
		}
		public function getReferances(){
			$this->db->select('*');
			$this->db->from('referances');
			$this->db->where(array('deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function deleteReferances($Id){
			return $this->db->set('deleted',1)->where(array('Id'=>$Id))->update('referances');
		}
		public function referacesStatusUpdate($Id,$newInfo){
			return $this->db->set('status',$newInfo)->where(array('Id'=>$Id))->update('referances');
		}

		public function SetSort($data){

			foreach ($data as $key => $val) {
				$this->db->where(array('Id' => $key));
				$this->db->set(array('sort' => $val));
				$this->db->update('referances');
				}
				return true;
		}
	}
?>