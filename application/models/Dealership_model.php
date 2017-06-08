<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Dealership_model extends Kodakil_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getCities()
	{
		$this->db->select('CityID,CityName');
		$this->db->from('location_cities');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function formAdd($postData)
	{
		return $this->db->insert('dealership_application',$postData);
	}
}
?>