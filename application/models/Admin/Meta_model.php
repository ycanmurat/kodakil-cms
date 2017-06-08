<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Meta_model extends Kodakil_Model{
		function __construct(){
			parent::__construct();
		}
		public function updateMetaTag($metaData){
			return $this->db->set($metaData)->where(array('Id'=>1))->update('tags');
		}
		public function getMeta(){
			$this->db->select('*');
			$this->db->from('tags');
			$this->db->where(array('Id'=>1));
			$resultQuery = $this->db->get();
			if ($resultQuery->num_rows()>0){
				return $resultQuery->row();
			}else{
				return false;
			}
		}
	}
?>