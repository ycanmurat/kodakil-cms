<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Calllist_model extends Kodakil_Model{

	function __construct(){
		parent::__construct();
	}

	public function getCallList()
	{
		$this->db->order_by('id','DESC');
		$q = $this->db->get('call_list');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return array();
		}
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('call_list');
		return true;
	}
}
?>