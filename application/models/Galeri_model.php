<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Galeri_model extends Kodakil_Model
{
	function __construct(){
		parent::__construct();
	}

	public function getImages(){
		$this->db->from('galery_image');
		$this->db->where(array('status'=>1));
		$this->db->order_by('id','DESC');
		$getCategoryQuery = $this->db->get();
		if ($getCategoryQuery->num_rows()>0) {
			return $getCategoryQuery->result();
		}else{
			return false;
		}
	}

	public function getPictures(){
		$categoriesAndProduct = array();
		$this->db->select('*');
		$this->db->from('galery_category');
		$this->db->where(array('status'=>1,'deleted'=>0));
		$this->db->order_by('sort','ASC');
		$returnQuery = $this->db->get();
		if (!$returnQuery->num_rows() > 0) 
		{
			return array();
		}
		$infoQuery = $returnQuery->result();
		foreach ($infoQuery as $key => $infoProduct) 
		{
			$this->db->select('*');
			$this->db->from('galery_image');
			$this->db->where(array('image_category'=>$infoProduct->Id,'status'=>1));
			$this->db->order_by('id','DESC');
			$listProduct = $this->db->get();
			if ($listProduct->num_rows()>0) 
			{
				$infoProduct->products = $listProduct->result();
			}
			else
			{
				$infoProduct->products = array();
			}
			$categoriesAndProduct[] = $infoProduct;
		}
		return $categoriesAndProduct;
	}

	public function getVideos()
	{
		$this->db->select('v.*,c.name categoryName');
		$this->db->where(array('c.deleted' => 0,'v.status' => 1));
		$this->db->from('galery_video v');
		$this->db->join('video_category c','c.id = v.category_id');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			$q = $q->result();
			$data = array();
			foreach ($q as $key => $val) {
				if (!isset($data[$val->category_id])) {
					$data[$val->category_id] = array();
				}

				$data[$val->category_id][] = $val;
			}
			return $data;
		}else{
			return false;
		}
	}
}
?>