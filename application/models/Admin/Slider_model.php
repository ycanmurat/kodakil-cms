<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Slider_model extends Kodakil_Model{
		function __construct()
		{
			parent::__construct();
		}

		public function addSlider($data){
			if($this->db->insert('sliders',$data)){
				return true;
			}else{
				return false;
			}
		}

		public function addMobileSlider($post){
			if($this->db->insert('mobile_sliders',$post)){
				return true;
			}else{
				return false;
			}
		}

		public function getSlider(){
			$this->db->select('*');
			$this->db->from('sliders');
			$sliderGetQuery = $this->db->get();
			if($sliderGetQuery->num_rows()>0){
				return $sliderGetQuery->result();
			}else{
				return false;
			}
		}
		
		public function getMobileSlider(){
			$this->db->select('*');
			$this->db->from('mobile_sliders');
			$sliderGetQuery = $this->db->get();
			if($sliderGetQuery->num_rows()>0){
				return $sliderGetQuery->result();
			}else{
				return false;
			}
		}

		public function sliderStatusUpdate($Id,$newInfo){
			$data = array('Id'=>$Id,'status'=>$newInfo);
			return $this->db->set($data)->where(array('Id'=>$Id))->update('sliders');
		}

		public function sliderDelete($Id){
			return $this->db->delete('sliders',array('Id'=>$Id));
		}

		public function deleteMobileSlider($Id){
			return $this->db->delete('mobile_sliders',array('Id'=>$Id));
		}

		public function SetSort($data){

			foreach ($data as $key => $val) {
				$this->db->where(array('Id' => $key));
				$this->db->set(array('sort' => $val));
				$this->db->update('sliders');
				}
				return true;
		}

		public function SliderImageUpload(){
			if ($_FILES['file']["type"] == 'application/octet-stream' OR 
					$_FILES['file']["type"] == 'application/postscript' OR 
						$_FILES['file']["type"] == 'image/png' OR 
							$_FILES['file']["type"] == 'image/jpeg' OR 
								$_FILES['file']["type"] == 'image/webp' OR 
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

		public function getIdSlider($Id)
		{
			$this->db->select('*');
			$this->db->from('sliders');
			$this->db->where(array('Id'=>$Id));
			$returnQuery = $this->db->get();
			if ($returnQuery->num_rows()>0) {
				return $returnQuery->row();
			} else {
				return false;
			}
		}

		public function updateSlider($post,$Id)
		{
			return $this->db->set($post)->where(array('Id'=>$Id))->update('sliders');
		}

		public function getIdMobilSlider($Id)
		{
			$this->db->select('*');
			$this->db->from('mobile_sliders');
			$this->db->where(array('Id'=>$Id));
			$returnQuery = $this->db->get();
			if ($returnQuery->num_rows()>0) {
				return $returnQuery->row();
			} else {
				return false;
			}
		}

		public function updateMobileSlider($post,$Id)
		{
			return $this->db->set($post)->where(array('Id'=>$Id))->update('mobile_sliders');
		}
	}
?>