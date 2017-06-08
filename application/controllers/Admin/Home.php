<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Home extends Kodakil_Controller{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Home_model');
		}
		public function index(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= "Home";
			$header_data->subMenu  	= "home";

			//Sayı Bilgileri	
			$data->sliderCount 		= $this->Home_model->sliderCount();
			$data->newsCount 		= $this->Home_model->newsCount();
			$data->staticsCount 	= $this->Home_model->staticsCount();
			$data->languagesCount 	= $this->Home_model->languagesCount();
			$data->categoryCount 	= $this->Home_model->categoryCount();
			$data->productCount 	= $this->Home_model->productCount();
			$data->pcategoryCount 	= $this->Home_model->pcategoryCount();
			$data->photoCount		= $this->Home_model->photoCount();
			//Sayı Bilgileri
			//İçerik Bilgileri
			$data->newsInfo			= $this->Home_model->newsInfo();
			//İçerik Bilgileri

			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/home',$data);
			$this->load->view('Admin/footer');
		}
	}
?>