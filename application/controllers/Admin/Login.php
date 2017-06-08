<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Login extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin/Login_model');
		if($this->session->userdata('user') == 1){
			redirect(admin_url('Home'));
		}
	}

	public function index(){
		$data 			= new StdClass;
		if ($this->input->post()){
			$gUrl		= "https://www.google.com/recaptcha/api/siteverify";
			$gSecret 	= getenv('RECAPTCHA_SECRET');
			$gResponse  = $this->input->post('g-recaptcha-response',true);
			$username 	= $this->input->post('username',true);
			$password 	= md5($this->input->post('password',true));
			$gVerify	= file_get_contents($gUrl.'?secret='.$gSecret.'&response='.$gResponse.'&remoteip='.$_SERVER['REMOTE_ADDR']);
			$gData = json_decode($gVerify);
			if ($gData->success && $gData->success == 'true'){
				if($this->Login_model->userIncoming($username,$password)){
					$this->session->set_userdata('user','1');
					redirect(admin_url('Home'));
				}else{
					$this->session->set_flashdata('giris_hatasi','1');
					redirect(site_url('Admin/login'));
				}
			}
			else{
				$this->session->set_flashdata('robot_hatasi','1');
				redirect(site_url('Admin/login'));
			}
		}
		$this->load->view('Admin/login');
	}
}
?>