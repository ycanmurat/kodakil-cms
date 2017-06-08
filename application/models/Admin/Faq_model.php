<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Faq_model extends Kodakil_Model
{
	function __construct(){
		parent::__construct();
	}
	public function insertQuestion($inputArray){
		if ($this->db->insert('faq',$inputArray)) {
			return true;
		}else{
			return false;
		}
	}
	public function getFaq(){
		$this->db->select('*');
		$this->db->from('faq');
		$this->db->where(array('deleted'=>0));
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows()>0) {
			return $returnQuery->result();
		}else{
			return false;
		}
	}
	public function faqStatusUpdate($Id,$newInfo){
		return $this->db->set('status',$newInfo)->where(array('Id'=>$Id))->update('faq');
	}
	public function deleteFaq($Id){
		return $this->db->set('deleted','1')->where(array('Id'=>$Id))->update('faq');
	}
	public function SetSort($sort){
		foreach ($sort as $key => $val) {
			$this->db->where(array('Id' => $key));
			$this->db->set(array('sort' => $val));
			$this->db->update('faq');
			}
		return true;
	}
	public function getQuery($Id){
		$this->db->select('*');
		$this->db->from('faq');
		$this->db->where(array('Id'=>$Id));
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows()>0) {
			return $returnQuery->row();
		}else{
			return false;
		}
	}
	public function updateQuestion($Id,$inputArray){
		return $this->db->set($inputArray)->where(array('Id'=>$Id))->update('faq');
	}
}
?>