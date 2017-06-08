<?php  
/**
 * 
 */
class Hakkimizda_model extends Kodakil_model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getHakkimizda()
	{
		$q = $this->db->get('corporate');

		if ($q->num_rows()>0) {
			return $q->row();
		}else{
			return false;
		}
	}

	public function getImages()
	{
		$q = $this->db->get('corporate_image');

		if ($q->num_rows()>0) {
			return $q->result();
		}else{
			return false;
		}
	}

	public function getContents()
	{
		$categoryAndContents = array();
		$this->db->from('galery_category');
		$this->db->where(array('status' => 1, 'deleted' => 0));
		$this->db->order_by('sort', 'ASC');
		$listCategory = $this->db->get();
		if (!$listCategory->num_rows() > 0) 
		{
			return array();
		}
		$resultCategory = $listCategory->result();
		foreach ($resultCategory as $key => $categoryInfo) 
		{
			$this->db->from('galery_image');
			$this->db->where(array('category_slug' => $categoryInfo->slug, 'status' => 1));
			$this->db->order_by('sort','ASC');
			$allContents = $this->db->get();
			if ($allContents->num_rows()>0) 
			{
				$categoryInfo->contents = $allContents->result();
			}
			else
			{
				$categoryInfo->contents = array();
			}
			$categoryAndContents[] = $categoryInfo;
		}
		return $categoryAndContents;
	}
}
?>