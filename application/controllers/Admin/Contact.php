<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Contact extends Kodakil_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Contact_model');
		}

		public function index()
		{
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Contact';
			$header_data->subMenu	= 'contactList';
			$data->pages 			= $this->Contact_model->getPages();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/contact',$data);
			$this->load->view('Admin/footer');
		}

		public function add()
		{
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Contact';
			$header_data->subMenu	= 'contactAdd';
			if ($this->input->post()) {
				$postData = $this->getAllPosts();
				$postData->title_slug = url_seo($postData->title);
				if ($this->Contact_model->addPage($postData)) {
					$this->session->set_flashdata('onay',1);
					redirect(admin_url('Contact/add'));
				} else {
					$this->session->set_flashdata('hata',1);
					redirect(admin_url('Contact/add'));
				}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/contact_add',$data);
			$this->load->view('Admin/footer');
		}

		public function delete($id)
		{
			if($this->Contact_model->delete($id)){
				redirect(admin_url('Contact'));
			}else{
				redirect(admin_url('Contact'));
			}
		}

		public function statusUpdate($id,$newInfo)
		{
			if($this->Contact_model->statusUpdate($id,$newInfo)){
				redirect(admin_url('Contact'));
			}else{
				redirect(admin_url('Contact'));
			}
		}

		public function edit($id=''){
			$data 				= new StdClass;
			$data->mainMenu 	= 'Contact';
			$data->subMenu		= 'contactList';
			if ($this->input->post()) {
				$postData = $this->getAllPosts();
				if ($this->Contact_model->updatePage($id,$postData)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Contact/edit/'.$id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Contact/edit/'.$id));
				}
			}
			$data->contactInfo = $this->Contact_model->contactInfo($id);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/contact_edit',$data);
			$this->load->view('Admin/footer');
		}
	}
?>