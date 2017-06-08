<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Hizmetlerimiz extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Hizmetlerimiz_model');
		}

		public function index(){
			$data 			= new StdClass;
			$data->mainMenu = 'Hizmetlerimiz';
			$data->subMenu 	= 'Hizmetlerimiz';
			if ($this->input->post()) {
				$title_1 	= $this->input->post('title_1',true);
				$title_2 	= $this->input->post('title_2',true);
				$title_3 	= $this->input->post('title_3',true);
				$title_4 	= $this->input->post('title_4',true);
				$title_5 	= $this->input->post('title_5',true);
				$title_6 	= $this->input->post('title_6',true);
				$content_1 	= $this->input->post('content_1',true);
				$content_2 	= $this->input->post('content_2',true);
				$content_3 	= $this->input->post('content_3',true);
				$content_4 	= $this->input->post('content_4',true);
				$content_5 	= $this->input->post('content_5',true);
				$content_6 	= $this->input->post('content_6',true);
				$services 	= array('title_1' 	=> $title_1,
									'title_2' 	=> $title_2,
									'title_3'	=> $title_3,
									'title_4'	=> $title_4,
									'title_5'	=> $title_5,
									'title_6'	=> $title_6,
									'content_1' => $content_1,
									'content_2' => $content_2,
									'content_3' => $content_3,
									'content_4' => $content_4,
									'content_5' => $content_5,
									'content_6' => $content_6);
				if ($this->Hizmetlerimiz_model->updateServices($services)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Hizmetlerimiz'));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Hizmetlerimiz'));
				}
			}
			$data->services = $this->Hizmetlerimiz_model->getServices();
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/hizmetlerimiz');
			$this->load->view('Admin/footer');
		}

	}
?>