<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Form_model extends Kodakil_Model{

	function __construct(){
		parent::__construct();
	}

	public function addPosition($postData)
	{
		return $this->db->insert('position',$postData);
	}

	public function getPositions()
	{
		$this->db->from('position');
		$this->db->where(array('deleted'=>0));
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function positionStatusUpdate($id,$newInfo)
	{
		return $this->db->set(array('status'=>$newInfo))->where(array('id'=>$id))->update('position');
	}

	public function deletePosition($id)
	{
		return $this->db->set(array('deleted'=>1))->where(array('id'=>$id))->update('position');
	}

	public function deleteContact($id)
	{
		return $this->db->set(array('deleted'=>1))->where(array('id'=>$id))->update('contact_form');
	}

	public function getForms()
	{
		$this->db->from('contact_form');
		$this->db->where(array('deleted'=>0));
		$this->db->order_by('id','DESC');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function getApplication()
	{
		$this->db->select('hr.*,lc.CityID,lc.CityName,lco.CountyID,lco.CountyName,p.id position_id,p.name');
		$this->db->from('human_resources hr');
		$this->db->join('location_cities lc','lc.CityID = hr.city_id');
		$this->db->join('location_counties lco','lco.CountyID = hr.town_id');
		$this->db->join('position p','p.id = hr.position');
		$this->db->where(array('hr.deleted'=>0));
		$this->db->order_by('hr.id','DESC');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function deleteApplication($id)
	{
		return $this->db->set(array('deleted'=>1))->where(array('id'=>$id))->update('human_resources');
	}

	public function getDealerShipForm()
	{
		$this->db->select('da.*,lc.CityID,lc.CityName,lco.CountyID,lco.CountyName');
		$this->db->from('dealership_application da');
		$this->db->join('location_cities lc','lc.CityID = da.il');
		$this->db->join('location_counties lco','lco.CountyID = da.ilce');
		$this->db->where(array('da.deleted'=>0));
		$this->db->order_by('da.id','DESC');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows() > 0) {
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function deleteDealerShip($id)
	{
		return $this->db->set(array('deleted'=>1))->where(array('id'=>$id))->update('dealership_application');
	}
}
?>