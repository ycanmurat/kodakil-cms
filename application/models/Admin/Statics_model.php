<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Statics_model extends Kodakil_Model{
		function __construct(){
			parent::__construct();
		}
		public function addStatics($statics_title,$description,$keywords,$statics_name,$statics_link,$statics_content,$lang_id){
			$data=array('statics_title'=>$statics_title,'description'=>$description, 'keywords'=>$keywords,'statics_name'=>$statics_name,'statics_link'=>$statics_link,'statics_content'=>$statics_content,'lang_id'=>$lang_id);
			 return $this->db->insert('statics',$data);
		}
		public function getStaticsInfo(){
			$this->db->select('s.*, lg.lang_name');
			$this->db->from('statics s');
			$this->db->join('languages lg','s.lang_id = lg.Id');
			$this->db->order_by('s.Id','DESC');
			$getStaticsQuery = $this->db->get();
			if($getStaticsQuery->num_rows()>0){
				return $getStaticsQuery->result();
			}else{
				return false;
			}
		}
		public function deleteStatics($Id){
			return $this->db->delete('statics',array('Id'=>$Id));
		}
		public function getStatics($Id){
			$this->db->select('s.*, lg.lang_name');
			$this->db->from('statics s');
			$this->db->join('languages lg','s.lang_id = lg.Id');
			$this->db->where(array('s.Id'=>$Id));
			$getInfo = $this->db->get();
			if($getInfo->num_rows()>0){
				return $getInfo->row();
			}else{
				return false;
			}
		}
		public function updateStatics($statics_title,$description,$keywords,$statics_name,$statics_link,$statics_content,$lang_id,$Id){
			$data=array('statics_title'=>$statics_title,'description'=>$description,'keywords'=>$keywords,'statics_name'=>$statics_name,'statics_link'=>$statics_link,'statics_content'=>$statics_content,'lang_id'=>$lang_id);
			$this->db->where(array('Id' => $Id));
			return $this->db->update('statics',$data);
		}
		public function editStatus($Id,$newInfo){
			return $this->db->set('statics_status',$newInfo)->where(array('Id'=>$Id))->update('statics');
		}
		public function languageList(){
			$this->db->select('Id,lang_name,status,deleted');
			$this->db->from('languages');
			$this->db->where(array('status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
	}
?>