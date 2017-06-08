<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Hizmetlerimiz_model extends Kodakil_Model{

	function __construct(){
		parent::__construct();
	}

	public function updateServices($services){
		return $this->db->set($services)->where(array('id'=>1))->update('services_index');
	}

	public function getServices(){
		$this->db->select('*');
		$this->db->from('services_index');
		$this->db->where(array('id'=>1));
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows()>0) {
			return $returnQuery->row();
		}else{
			return false;
		}
	}

}
?>