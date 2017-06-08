<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Corporate extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Corporate_model');
		}
		public function index(){
			$data 					= new StdClass;
			$header_data 			= new StdClass;
			$header_data->mainMenu 	= 'Corporate';
			$header_data->subMenu  	= 'CorporateUpdate';
			$data->temporary_info   = $this->Corporate_model->corporateInfo();

			if($this->input->post()){

				$postdata = $this->getAllPosts();
				$postdata->picture 			= $this->session->userdata('NewsImage');
				$postdata->secont_picture 	= $this->session->userdata('NewsImage2');
				$postdata->third_picture 	= $this->session->userdata('NewsImage3');
				//prex($postdata);

				if($this->Corporate_model->upDate($postdata)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}

			$data->images   		= $this->Corporate_model->corporateImage();
			//prex($data->images);
			$data->corporateInfo   	= $this->Corporate_model->corporateInfo();


			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/corporate',$data);
			$this->load->view('Admin/footer');
		}

		public function deleteImage($id)
		{
			//prex('asd');
			$this->Corporate_model->deleteImage($id);
			redirect(site_url('Admin/Corporate'));
		}

		public function ImageUpload($i){
			echo '1';
			if ($i == 1) {
				$NewsUpload = $this->Corporate_model->NewsImageUpload();
				if ($NewsUpload != false){
					$this->session->set_userdata('NewsImage', $NewsUpload);
				}
			}elseif ($i == 2) {
				$NewsUpload = $this->Corporate_model->NewsImageUpload();
				if ($NewsUpload != false){
					$this->session->set_userdata('NewsImage2', $NewsUpload);
				}
			}elseif ($i == 3) {
				$NewsUpload = $this->Corporate_model->NewsImageUpload();
				if ($NewsUpload != false){
					$this->session->set_userdata('NewsImage3', $NewsUpload);
				}
			}
		}
	}
?>