<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Referanslar_model extends Kodakil_Model
{	
	function __construct(){
		parent::__construct();
	}
	
	public function getReferances(){
		$this->db->select('*');
		$this->db->from('referances');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows()>0) {
			return $returnQuery->result();
		}else{
			return false;
		}
	}
}
?>