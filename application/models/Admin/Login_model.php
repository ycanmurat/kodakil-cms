<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Login_model extends Kodakil_Model{
		function __construct(){
			parent::__construct();
		}
		public function userIncoming($username,$password){
			$this->db->select('username','password');
			$this->db->from('administrators');
			$this->db->where(array('username' => $username, 'password' => $password));
			$userQueryGet = $this->db->get();
			if($userQueryGet->num_rows()>0){
				$this->session->set_userdata('admin_info',$userQueryGet->row());	
				return true;
			}else{
				return false;
			}
		}

	}
?>