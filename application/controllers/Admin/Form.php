<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Form extends Kodakil_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Form_model','FM');
		}

		public function formPositionAdd()
		{
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Form';
			$header_data->subMenu 	= 'formPositionAdd';
			if ($this->input->post()) {
				$postData = $this->getAllPosts();
				if ($this->FM->addPosition($postData)) {
					$this->session->set_flashdata('onay',1);
					redirect(admin_url('Form/formPositionAdd'));
				} else {
					$this->session->set_flashdata('hata',1);
					redirect(admin_url('Form/formPositionAdd'));
				}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/form_position',$data);
			$this->load->view('Admin/footer');
		}

		public function positionList()
		{
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Form';
			$header_data->subMenu 	= 'positionList';
			$data->positions = $this->FM->getPositions();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/positions',$data);
			$this->load->view('Admin/footer');
		}

		public function positionStatusUpdate($id,$newInfo)
		{
			if ($this->FM->positionStatusUpdate($id,$newInfo)) {
				redirect(admin_url('Form/positionList'));
			} else {
				redirect(admin_url('Form/positionList'));
			}
		}

		public function deletePosition($id)
		{
			if ($this->FM->deletePosition($id)) {
				redirect(admin_url('Form/positionList'));
			} else {
				redirect(admin_url('Form/positionList'));
			}
		}

		public function contactForm()
		{
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Form';
			$header_data->subMenu 	= 'contactForm';
			$data->forms = $this->FM->getForms();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/form',$data);
			$this->load->view('Admin/footer');
		}

		public function deleteContact($id)
		{
			if ($this->FM->deleteContact($id)) {
				redirect(admin_url('Form/contactForm'));
			} else {
				redirect(admin_url('Form/contactForm'));
			}
		}

		public function human_resources()
		{
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Form';
			$header_data->subMenu 	= 'human_resources';
			$data->application = $this->FM->getApplication();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/human_resources',$data);
			$this->load->view('Admin/footer');
		}

		public function deleteApplication($id)
		{
			if ($this->FM->deleteApplication($id)) {
				redirect(admin_url('Form/human_resources'));
			} else {
				redirect(admin_url('Form/human_resources'));
			}
		}

		public function dealershipForm()
		{
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Form';
			$header_data->subMenu 	= 'dealershipForm';
			$data->forms = $this->FM->getDealerShipForm();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/dealership_form',$data);
			$this->load->view('Admin/footer');
		}

		public function deleteDealerShip($id)
		{
			if ($this->FM->deleteDealerShip($id)) {
				redirect(admin_url('Form/dealershipForm'));
			} else {
				redirect(admin_url('Form/dealershipForm'));
			}
		}
	}
?>