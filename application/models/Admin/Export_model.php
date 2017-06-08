<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Export_model extends Kodakil_Model
	{
		function __construct(){
			parent::__construct();
		}
		public function get(){
			$this->db->select('user_email,user_ip,added_time');
			$this->db->from('bulletin');
			$this->db->where(array('deleted'=>0));
			$this->db->order_by('Id','DESC');
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
	}
?>