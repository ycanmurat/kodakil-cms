<?php  
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Catalog_model extends Kodakil_model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getCatalog()
	{
		$this->db->select('*');
		$this->db->from('catalog');
		$this->db->where(array('deleted'=>0,'status'=>1));
		$this->db->order_by('id','DESC');
		$getCatalogQuery = $this->db->get();
		if ($getCatalogQuery->num_rows()>0) {
			return $getCatalogQuery->result();
		}else{
			return array();
		}
	}
}
?>