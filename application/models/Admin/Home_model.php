<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Home_model extends Kodakil_Model
	{	
		function __construct(){
			parent::__construct();
		}
		public function sliderCount(){
			$this->db->select('Id,status');
			$this->db->from('sliders');
			$this->db->where(array('status'=>1));
			$returnQuery = $this->db->get();
			return $returnQuery->num_rows();
		}
		public function newsCount(){
			$this->db->select('Id');
			$this->db->from('news');
			$returnQuery = $this->db->get();
			return $returnQuery->num_rows();
		}
		public function staticsCount(){
			$this->db->select('Id,statics_status');
			$this->db->from('statics');
			$this->db->where(array('statics_status'=>1));
			$returnQuery = $this->db->get();
			return $returnQuery->num_rows();
		}
		public function languagesCount(){
			$this->db->select('Id,status,deleted');
			$this->db->from('languages');
			$this->db->where(array('status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			return $returnQuery->num_rows();
		}
		public function categoryCount(){
			$this->db->select('Id,status,deleted');
			$this->db->from('category');
			$this->db->where(array('status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			return $returnQuery->num_rows();
		}
		public function productCount(){
			$this->db->select('Id,status,deleted');
			$this->db->from('products');
			$this->db->where(array('status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			return $returnQuery->num_rows();
		}
		public function pcategoryCount(){
			$this->db->select('Id,status,deleted');
			$this->db->from('galery_category');
			$this->db->where(array('status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			return $returnQuery->num_rows();
		}
		public function photoCount(){
			$this->db->select('Id,status');
			$this->db->from('galery_category');
			$this->db->where(array('status'=>1));
			$returnQuery = $this->db->get();
			return $returnQuery->num_rows();
		}
		public function newsInfo(){
			$this->db->select('*');
			$this->db->from('news');
			$this->db->order_by('Id','DESC');
			$this->db->limit(3);
			$returnQuery = $this->db->get();
			if($returnQuery->num_rows()>0){
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		
	}
?>