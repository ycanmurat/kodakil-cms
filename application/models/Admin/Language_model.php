<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Language_model extends Kodakil_Model
{	
	function __construct(){
		parent::__construct();
	}
	public function languages_list(){
		$this->db->select('*');
		$this->db->from('languages');
		$this->db->where(array('deleted' => 0));
		$listQuery = $this->db->get();
		if($listQuery->num_rows()>0){
			return $listQuery->result();
		}else{
			return false;
		}
	}
	public function addLanguage($lang){
		if($this->db->insert('languages',$lang)){
			return true;
		}else{
			return false;
		}
	}
	public function UpdateLanguage($Id,$st){
		return $this->db->set('status',$st)->where('Id',$Id)->update('languages');
	}
	public function deleteLanguage($Id){
		return $this->db->set('deleted',1)->where('Id',$Id)->update('languages');
	}
	public function infoLanguage($Id){
		$this->db->select('Id,short_code,lang_name');
		$this->db->from('languages');
		$this->db->where(array('Id'=>$Id,'deleted'=>0));
		$returnQuery = $this->db->get();
		if($returnQuery->num_rows()>0){
			return $returnQuery->row();
		}else{
			return false;
		}
	}
	public function languageNewEdit($Id,$infoLang){
		return $this->db->set($infoLang)->where('Id',$Id)->update('languages');
	}

	public function getStatics($lang_id)
	{
		$this->db->select('lang_json');
		$this->db->where(array('id' => $lang_id));
		$q = $this->db->get('languages');

		if ($q->num_rows()>0) {
			return $q->row()->lang_json;
		}
		else{
			return false;
		}
	}

	public function JsoneSave($id,$data)
	{
		$this->db->where(array('id'=>$id));
		$this->db->set(array('lang_json' => $data));
		$this->db->update('languages');
	}
}	
?>