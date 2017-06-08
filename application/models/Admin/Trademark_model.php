<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Trademark_model extends Kodakil_Model{

	function __construct(){
		parent::__construct();
	}

	public function addTrademark($postData){
		return $this->db->insert('trademark',$postData);
	}

	public function getTrademark(){
		$this->db->select('*');
		$this->db->from('trademark');
		$this->db->where(array('deleted'=>0));
		$this->db->order_by('id','DESC');
		$getTrademarkQuery = $this->db->get();
		if ($getTrademarkQuery->num_rows()>0) {
			return $getTrademarkQuery->result();
		}else{
			return false;
		}
	}

	public function trademarkInfo($id){
		$this->db->select('*');
		$this->db->from('trademark');
		$this->db->where(array('id'=>$id));
		$trademarkInfo = $this->db->get();
		if ($trademarkInfo->num_rows()>0) {
			return $trademarkInfo->row();
		}else{
			return false;
		}
	}

	public function updateTrade($id,$trademarkData){
		return $this->db->set($trademarkData)->where(array('id'=>$id))->update('trademark');
	}

	public function trademarkStatusUpdate($id,$newInfo){
		$data = array('id'=>$id,'status'=>$newInfo);
		return $this->db->set($data)->where(array('id'=>$id))->update('trademark');
	}
		
	public function deleteTrademark($id){
		return $this->db->set(array('deleted'=>1))->where(array('id'=>$id))->update('trademark');
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