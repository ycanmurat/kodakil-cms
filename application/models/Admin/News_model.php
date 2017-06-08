<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class News_model extends Kodakil_Model{
	    function __construct(){
			parent::__construct();
		}
		public function NewsAdd($description,$menu_id,$title,$author,$content,$picture){
			$data = array('description'=>$description,'menu_id'=>$menu_id,'title'=>$title,'author'=>$author,'content'=>$content,'picture'=>$picture,'title_slug'=>url_seo($title));
			if($this->db->insert('news',$data)){
				return true;
			}else{
				return false;
			}
		}
		public function NewsInfo(){
			$this->db->select('m.*,n.*');
			$this->db->from('menu m');
			$this->db->join('news n','m.Id = n.menu_id');
			$this->db->where(array('n.deleted'=>0,'m.deleted'=>0));
			$returnQuery = $this->db->get();
			if ($returnQuery->num_rows()>0) {
				return $returnQuery->result();
			}else{
				return false;
			}
		}

		public function updateNews($description,$menu_id,$title,$author,$content,$picture,$Id){
			$data = array('description'=>$description,'menu_id'=>$menu_id,'title'=>$title,'author'=>$author,'content'=>$content,'picture'=>$picture,'title_slug'=>url_seo($title));
			return $this->db->set($data)->where(array('Id'=>$Id))->update('news');
		}
		public function deleteNews($Id){
			return $this->db->set('deleted',1)->where(array('Id'=>$Id))->update('news');
		}
		public function editNews($Id){
			$this->db->select('*');
			$this->db->from('news');
			$this->db->where(array('Id'=>$Id));
			$getNewsInfo = $this->db->get();
			if($getNewsInfo->num_rows()>0){
				return $getNewsInfo->row();
			}else{
				return false;
			}
		}
		public function NewsImageUpload(){
			if ($_FILES['file']["type"] == 'application/octet-stream' OR 
					$_FILES['file']["type"] == 'application/postscript' OR 
						$_FILES['file']["type"] == 'image/png' OR 
							$_FILES['file']["type"] == 'image/jpeg' OR 
								$_FILES['file']["type"] == 'image/gif' OR 
									$_FILES['file']["type"] =='image/svg+xml' OR 
										$_FILES['file']["type"] == 'application/pdf'){

			$target_dir 	= "assets/uploads/";
			$rand 			= rand(10,999999999999);
			$rand 			= md5(md5($rand).md5(strtotime('now')));
			$target_file 	= $target_dir.$rand.url_seo($_FILES['file']["name"]);
			$newname 		= "";
			$namearr 		= explode('-', $target_file);
			$count 			= count($namearr)-1;
			foreach ($namearr as $key => $val){
				if($key == $count){
					$newname .= ".".$val;
				}elseif ($key == 0){
					$newname .= $val;
				}else{
					$newname .= "-".$val;
				}
			}
			$target_file 	= $newname;
			if (move_uploaded_file($_FILES['file']["tmp_name"], $target_file)){
				return $target_file;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		public function editStatus($Id,$new_info){
			return $this->db->set('status',$new_info)->where(array('Id'=>$Id))->update('news');
		}
		public function menu_list(){
			$this->db->select('*');
			$this->db->from('menu');
			$this->db->where(array('status'=>1,'deleted'=>0));
			$returnQuery = $this->db->get();
			if ($returnQuery->num_rows()>0) {
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function addPicture($title,$picture,$Id){
			$data = array('title'=>$title,'picture'=>$picture,'content_id'=>$Id);
			return $this->db->insert('news_picture',$data);
		}

		public function getPictureInfo($Id){
			$this->db->select('*');
			$this->db->from('news_picture');
			$this->db->where(array('content_id'=>$Id,'deleted'=>0));
			$returnQuery = $this->db->get();
			if ($returnQuery->num_rows()>0) {
				return $returnQuery->result();
			}else{
				return false;
			}
		}
		public function deletePictureNews($Id){
			return $this->db->set('deleted',1)->where(array('Id'=>$Id))->update('news_picture');
		}
		public function pictureEditStatus($Id,$new_info){
			return $this->db->set('status',$new_info)->where(array('Id'=>$Id))->update('news_picture');
		}
		
	}
?>