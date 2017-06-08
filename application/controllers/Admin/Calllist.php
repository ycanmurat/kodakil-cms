<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Calllist extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Calllist_model');
		}

		public function index(){
			$data 			= new StdClass;
			$data->mainMenu = 'Calllist';
			$data->subMenu	= 'CalllistList';

			$data->list 	= $this->Calllist_model->getCallList();

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/callist');
			$this->load->view('Admin/footer');
		}

		public function delete($id)
		{
			$this->Calllist_model->delete($id);
			redirect(admin_url('Calllist'));
		}

	}
?>