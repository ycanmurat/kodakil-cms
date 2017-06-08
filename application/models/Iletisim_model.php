<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Iletisim_model extends Kodakil_Model
{	
	function __construct(){
		parent::__construct();
	}
	
	public function setContact($contactInfo)
	{
		return $this->db->insert('contact_form',$contactInfo);
	}

	public function getTitles()
	{
		$this->db->from('contact_page');
		$this->db->where(array('deleted'=>0,'status'=>1));
		$this->db->order_by('id','ASC');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function getMinPage()
	{
		$this->db->from('contact_page');
		$this->db->where(array('deleted'=>0,'status'=>1));
		$this->db->select_min('id');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			$this->db->from('contact_page');
			$this->db->where(array('deleted'=>0,'status'=>1,'id'=>$returnQuery->row()->id));
			$return = $this->db->get();
			if ($return->num_rows() > 0) {
				return $return->row();
			} else {
				return array();
			}
		} else {
			return array();
		}
	}

	public function getPage($slug)
	{
		$this->db->from('contact_page');
		$this->db->where(array('deleted'=>0,'status'=>1,'title_slug'=>$slug));
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->row();
		} else {
			return false;
		}
	}

}
?>