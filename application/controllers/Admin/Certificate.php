<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Certificate extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Certificate_model');
		}
		public function index(){
			$data 				= new stdClass;
			$data->mainMenu 	= 'Certificate';
			$data->subMenu 		= 'CertificateList';
			$data->certificates = $this->Certificate_model->getCertificates();
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/certificate_list',$data);
			$this->load->view('Admin/footer');
		}

		public function add(){
			$data 			= new stdClass;
			$data->mainMenu = 'Certificate';
			$data->subMenu 	= 'CertificateAdd';
			if ($this->input->post()) {
				$certificateInfo = $this->getAllPosts();
				$certificateInfo->picture = $this->session->flashdata('image');
				if ($this->Certificate_model->addCertificate($certificateInfo)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Certificate/add'));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Certificate/add'));
				}
			}
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/certificate_add',$data);
			$this->load->view('Admin/footer');
		}
		
		public function ImageUpload(){	
		$sonuc = $this->Certificate_model->imageUpload();
			if ($sonuc != false){
				$this->session->set_flashdata('image', $sonuc);
			}
		}

		public function certificateStatusUpdate($id,$newInfo){
			if($this->Certificate_model->certificateStatusUpdate($id,$newInfo)){
				redirect(admin_url('Certificate'));
			}else{
				redirect(admin_url('Certificate'));
			}
		}
		public function deleteCertificate($id){
			if($this->Certificate_model->certificateDelete($id)){
				redirect(admin_url('Certificate'));
			}else{
				redirect(admin_url('Certificate'));
			}
		}

		public function edit($id='')
		{
			$data 			= new stdClass;
			$data->mainMenu = 'Certificate';
			$data->subMenu 	= 'CertificateAdd';
			$data->cInfo = $this->Certificate_model->getCertificateById($id);
			if ($this->input->post()) {
				$certificateInfo = $this->getAllPosts();
				if (empty($this->session->flashdata('image'))) {
					$certificateInfo->picture = $data->cInfo->picture;
				} else {
					$certificateInfo->picture = $this->session->flashdata('image');
				}
				if ($this->Certificate_model->updateCertificate($id,$certificateInfo)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Certificate/edit/'.$id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Certificate/edit/'.$id));
				}
			}
			$data->cInfo = $this->Certificate_model->getCertificateById($id);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/certificate_edit',$data);
			$this->load->view('Admin/footer');
		}

	}
?>