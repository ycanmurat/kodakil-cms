<?if(!defined('BASEPATH'))exit('No direct script access allowed');
class Ajax_model extends Kodakil_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getCountiesByCities($CityID)
	{
		$this->db->from('location_counties');
		$this->db->where(array('CityID'=>$CityID));
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->result();
		} else {
			return false;
		}
	}
}
?>