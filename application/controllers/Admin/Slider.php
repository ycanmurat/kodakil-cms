<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Slider extends Kodakil_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Slider_model');
		}
		
		public function index()
		{
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Slider';
			$header_data->subMenu 	= 'SliderList';
			$data->getSliders 		= $this->Slider_model->getSlider();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/slider',$data);
			$this->load->view('Admin/footer');
		}

		public function mobileSlider()
		{
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Slider';
			$header_data->subMenu 	= 'mobileSliderList';
			$data->getSliders 		= $this->Slider_model->getMobileSlider();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/mobile_slider',$data);
			$this->load->view('Admin/footer');
		}
		
		public function add()
		{
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Slider';
			$header_data->subMenu  	= 'SliderAdd';
			if ($this->input->post()){
				$post 				= $this->getAllPosts();
				$post->picture_info = $this->session->flashdata('sliderImage');
				if($this->Slider_model->addSlider($post)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/slider_add',$data);
			$this->load->view('Admin/footer');
		}

		public function mobileSliderAdd()
		{
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Slider';
			$header_data->subMenu  	= 'mobileSliderAdd';
			if ($this->input->post()){
				$post 				= $this->getAllPosts();
				$post->picture_info = $this->session->flashdata('sliderImage');
				if($this->Slider_model->addMobileSlider($post)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/mobile_slider_add',$data);
			$this->load->view('Admin/footer');
		}

		public function ImageUpload()
		{	
			$sonuc = $this->Slider_model->SliderImageUpload();
				if ($sonuc != false){
					$this->session->set_flashdata('sliderImage', $sonuc);
				}
		}

		public function sliderStatusUpdate($Id,$newInfo)
		{
			if($this->Slider_model->sliderStatusUpdate($Id,$newInfo)){
				redirect(admin_url('Slider'));
			}else{
				redirect(admin_url('Slider'));
			}
		}

		public function deleteSlider($Id)
		{
			if($this->Slider_model->sliderDelete($Id)){
				redirect(admin_url('Slider'));
			}else{
				redirect(admin_url('Slider'));
			}
		}

		public function sliderSort()
		{
			$sort = $this->input->post('sort',true);
			$this->Slider_model->SetSort($sort);
			redirect(site_url('Admin/Slider'));
		}

		public function sliderEdit($Id)
		{
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Slider';
			$header_data->subMenu  	= 'SliderList';
			$data->sliderInfo = $this->Slider_model->getIdSlider($Id);
			if ($this->input->post()){
				$post = $this->getAllPosts();
				if (empty($this->session->flashdata('sliderImage'))) {
					$post->picture_info = $data->sliderInfo->picture_info;
				} else {
					$post->picture_info = $this->session->flashdata('sliderImage');
				}
				if($this->Slider_model->updateSlider($post,$Id)) {
					$this->session->set_flashdata('onay','1');
				} else {
					$this->session->set_flashdata('hata','1');
				}
			}
			$data->sliderInfo = $this->Slider_model->getIdSlider($Id);
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/slider_edit',$data);
			$this->load->view('Admin/footer');
		}

		public function mobileSliderEdit($Id)
		{
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Slider';
			$header_data->subMenu  	= 'mobileSliderList';
			$data->sliderInfo = $this->Slider_model->getIdMobilSlider($Id);
			if ($this->input->post()){
				$post = $this->getAllPosts();
				if (empty($this->session->flashdata('sliderImage'))) {
					$post->picture_info = $data->sliderInfo->picture_info;
				} else {
					$post->picture_info = $this->session->flashdata('sliderImage');
				}
				if($this->Slider_model->updateMobileSlider($post,$Id)) {
					$this->session->set_flashdata('onay','1');
				} else {
					$this->session->set_flashdata('hata','1');
				}
			}
			$data->sliderInfo = $this->Slider_model->getIdMobilSlider($Id);
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/mobile_slider_edit',$data);
			$this->load->view('Admin/footer');
		}

		public function deleteMobileSlider($Id)
		{
			if($this->Slider_model->deleteMobileSlider($Id)){
				redirect(admin_url('Slider/mobileSlider'));
			}else{
				redirect(admin_url('Slider/mobileSlider'));
			}
		}
		
	}
?>