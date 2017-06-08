<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Contact_model extends Kodakil_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		public function getContact()
		{
			$this->db->select('*');
			$this->db->from('contact_form');
			$this->db->where(array('deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return array();
			}
		}

		public function delete($id)
		{
			return $this->db->set(array('deleted'=>1))->where(array('id'=>$id))->update('contact_page');
		}

		public function addPage($postData)
		{
			return $this->db->insert('contact_page',$postData);
		}

		public function getPages()
		{
			$this->db->from('contact_page');
			$this->db->where(array('deleted'=>0));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return array();
			}
		}

		public function contactInfo($id)
		{
			$this->db->from('contact_page');
			$this->db->where(array('id'=>$id));
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->row();
			}else{
				return false;
			}
		}

		public function updatePage($id,$postData)
		{
			return $this->db->set($postData)->where(array('id'=>$id))->update('contact_page');
		}

		public function statusUpdate($id,$newInfo)
		{
			return $this->db->set(array('status'=>$newInfo))->where(array('id'=>$id))->update('contact_page');
		}
	}
?>