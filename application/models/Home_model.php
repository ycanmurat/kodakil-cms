<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Home_model extends Kodakil_Model
{	
	function __construct(){
		parent::__construct();
	}


	public function getGalery($adet = 6){
		$this->db->from('galery_image');
		$this->db->where(array('status'=>1));
		$this->db->limit($adet);
		$this->db->order_by('id','DESC');
		$getCategoryQuery = $this->db->get();
		if ($getCategoryQuery->num_rows()>0) {
			return $getCategoryQuery->result();
		}else{
			return false;
		}
	}
	
	public function getReferances(){
		$this->db->select('*');
		$this->db->from('referances');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->order_by('sort','ASC');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows()>0) {
			return $returnQuery->result();
		}else{
			return false;
		}
	}

	public function getSliders(){
		$this->db->from('sliders');
		$this->db->where(array('status'=>1));
		$this->db->order_by('sort','ASC');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows()>0) {
			return $returnQuery->result();
		}else{
			return false;
		}
	}

	public function addCallList()
	{
		$data = new StdClass;
		$data->name  = $this->input->post('name',true);
		$data->gsm 	 = $this->input->post('gsm',true);
		$data->email = $this->input->post('email',true);
		$data->ip 	 = $this->input->ip_address();
		
		$this->db->where('ip',$data->ip);
		$q = $this->db->count_all_results('call_list');
		if ($q<5) {
			$this->db->set($data);
			$this->db->insert('call_list');
		}
		return true;
	}

	public function getCorporate(){
		$this->db->select('*');
		$this->db->from('corporate');
		$this->db->where(array('Id'=>1));
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows()>0) {
			return $returnQuery->row();
		}else{
			return false;
		}
	}

	public function getNews(){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where(array('deleted'=>0,'status'=>1));
		$this->db->order_by('Id','DESC');
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows()>0) {
			return $returnQuery->result();
		}else{
			return false;
		}
	}

	public function getComment()
	{
		$this->db->where(array('status' => 1));
		$this->db->limit(10);
		$this->db->order_by('sort','ASC');
		$q = $this->db->get('comment');
		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return array();
		}
	}

	public function getServices(){
		$this->db->from('certificates');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->order_by('id','DESC');
		$this->db->limit(4);
		$returnQuery = $this->db->get();
		if ($returnQuery->num_rows()>0) {
			return $returnQuery->result();
		}else{
			return array();
		}
	}

	public function getHakkimizda()
	{
		$this->db->select('title,title_content');
		$q = $this->db->get('corporate');
		
		if ($q->num_rows()>0) {
			return $q->row();
		}else{
			return false;
		}
	}

	public function setContact($cInfo){
		return $this->db->insert('accession_user',$cInfo);
	}

	public function Addbulletin($data){
		return $this->db->insert('bulletin',$data);
	}

	public function getPrograms()
	{
		$this->db->where(array('deleted' => 0));
		$q = $this->db->get('program_menu');
		if ($q->num_rows()>0) {
			$menus = $q->result();
			$mq = array();
			foreach ($menus as $key => $val) {
				$mq[] = $val->Id;
			}
		}else{
			return false;
		}

		$this->db->select('p.*,(SELECT name_surname FROM instructors WHERE id=p.instructor_id) instructors_name');
		$this->db->where(array('p.deleted' => 0, 'status' => 1));
		$this->db->where_in('menu_id',$mq);
		$q = $this->db->get('program p');
		if ($q->num_rows()>0) {
			$q = $q->result();
		}else{
			return false;
		}

		$a = array();
		foreach ($menus as $key => $val) {
			$a[$key] = $val;
			$a[$key]->data = array();
			foreach ($q as $key2 => $val2) {
				if ($val2->menu_id == $val->Id) {
					$a[$key]->data[] = $val2; 
				}
			}
		}
		
		return $a;
	}
	
	public function getMobileSlider()
	{
		$this->db->select('*');
		$this->db->from('mobile_sliders');
		$this->db->where(array('status'=>1));
		$return = $this->db->get();
		if ($return->num_rows()>0) {
			return $return->result();
		} else {
			return array();
		}
	}

	public function getSliderTwoBlogContent()
	{
		$this->db->from('blog');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->order_by('id','DESC');
		$this->db->limit(2);
		$returnQuery = $this->db->get();
		if($returnQuery->num_rows() > 0){
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function getBlogContent()
	{
		$this->db->from('blog');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->order_by('id','DESC');
		$this->db->limit(3);
		$returnQuery = $this->db->get();
		if($returnQuery->num_rows() > 0){
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function getTrademarkContent()
	{
		$this->db->from('trademark');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->order_by('id','DESC');
		$this->db->limit(8);
		$returnQuery = $this->db->get();
		if($returnQuery->num_rows() > 0){
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function getTeams()
	{
		$this->db->from('team');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->order_by('id','DESC');
		$returnQuery = $this->db->get();
		if($returnQuery->num_rows() > 0){
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function getTrademarks()
	{
		$this->db->from('trademark');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->order_by('id','DESC');
		$this->db->limit(8);
		$returnQuery = $this->db->get();
		if($returnQuery->num_rows() > 0){
			return $returnQuery->result();
		} else {
			return array();
		}
	}

	public function getImages()
	{
		$this->db->from('galery_image');
		$this->db->where(array('status'=>1));
		$this->db->order_by('id','DESC');
		$returnQuery = $this->db->get();
		if($returnQuery->num_rows() > 0){
			return $returnQuery->result();
		} else {
			return array();
		}
	}
}
?>