<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Constract_model extends Kodakil_Model
{
	function __construct(){
		parent::__construct();
	}

	public function menu()
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->order_by('sort','ASC');
		$menuQuery = $this->db->get();
		if ($menuQuery->num_rows()>0) {
			return $menuQuery->result();
		}else{
			return false;
		}
		/*$this->db->select('m.*,n.title,n.title_slug');
		$this->db->from('menu m');
		$this->db->join('news n','n.menu_id = m.id');
		$this->db->where(array('m.status' => 1, 'm.deleted' => 0));
		$this->db->order_by('m.sort','ASC');
		$q = $this->db->get();
		$q = $q->result();
		$data = array();

		foreach ($q as $key => $val) {
			$data[$val->Id] = array('id' 	=> $val->Id,
								  	'name' 	=> $val->menu,
								  	'sort' 	=> $val->sort,
								  	'data' 	=> array());
		}

		foreach ($q as $key => $val) {
			$data[$val->Id]['data'][] = array('title' => $val->title, 'slug' => $val->title_slug);
		}

		return $data;*/
	}

	public function getFooterEducation(){
		$this->db->select('menu,menu_slug,title,sort,status,deleted');
		$this->db->from('menu');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->limit(6);
		$this->db->order_by('Id','DESC');
		$getFooterEducationQuery = $this->db->get();
		if ($getFooterEducationQuery->num_rows()>0) {
			return $getFooterEducationQuery->result();
		}else{
			return false;
		}
	}

	public function getLangStatics()
	{
		$this->db->where(array('id' => 1));
		$q = $this->db->get('languages');
		return json_decode($q->row()->lang_json);
	}
}
?>