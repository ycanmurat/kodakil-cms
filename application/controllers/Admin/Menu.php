<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Menu extends Kodakil_Controller{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Menu_model');
		}
		public function index(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Menu';
			$header_data->subMenu 	= 'MenuList';
			$data->getMenu 			= $this->Menu_model->getMenu();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/menu',$data);
			$this->load->view('Admin/footer');
		}
		public function add(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Menu';
			$header_data->subMenu 	= 'MenuAdd';
			if ($this->input->post()) {
				$menu 		= $this->input->post('menu',true);
				$sort 		= $this->input->post('sort',true);
				$title 		= $this->input->post('title',true);
				$picture 	= $this->session->flashdata('Image');
				$info 		= $this->input->post('info',true);
				if ($this->Menu_model->addMenu($menu,$sort,$title,$picture,$info)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Menu/add'));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Menu/add'));
				}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/menu_add',$data);
			$this->load->view('Admin/footer');
		}
		public function menuStatusUpdate($Id,$newInfo){
			if($this->Menu_model->menuStatusUpdate($Id,$newInfo)){
				redirect(admin_url('Menu'));
			}else{
				redirect(admin_url('Menu'));
			}
		}
		public function deleteMenu($Id){
			if($this->Menu_model->deleteMenu($Id)){
				redirect(admin_url('Menu'));
			}else{
				redirect(admin_url('Menu'));
			}
		}
		public function menuSort(){
			$sort = $this->input->post('sort',true);
			$this->Menu_model->menuSort($sort);
			redirect(admin_url('Menu'));
		}
		public function ImageUpload(){	
		$sonuc = $this->Menu_model->ImageUpload();
			if ($sonuc != false){
				$this->session->set_flashdata('Image', $sonuc);
			}
		}
	}
?>