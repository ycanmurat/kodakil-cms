<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Categorys extends Kodakil_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Categorys_model');
		}
		public function index(){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Categorys';
			$header_data->subMenu 	= 'CategorysList';
			$data->categoryInfo 	= $this->Categorys_model->getCategory();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/categorys',$data);
			$this->load->view('Admin/footer');
		}
		public function add(){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Categorys';
			$header_data->subMenu 	= 'CategorysAdd';
			$data->languages = $this->Categorys_model->getLanguages();
			if($this->input->post()){
				$category_title = $this->input->post('category_title',true);
				$description 	= $this->input->post('description',true);
				$keywords 		= $this->input->post('keywords',true);
				$sort 			= $this->input->post('sort',true);
				$menu 			= $this->input->post('menu',true);
				if($menu=='on'){$menu=1;}else{$menu=0;}
				$default_image  = $this->session->flashdata('categoryImage'); 
				$lang 			= $this->input->post('lang',true);
				$category_slug 	= $this->input->post('category_slug',true);
			if($this->Categorys_model->addCategory($category_title,$description,$keywords,$sort,$menu,$lang,$category_slug,$default_image)){
				$this->session->set_flashdata('onay','1');
				redirect(admin_url('Categorys/Add'));
			}else{
				$this->session->set_flashdata('hata','1');
				redirect(admin_url('Categorys/Add'));
			}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/categorys_add',$data);
			$this->load->view('Admin/footer');
		}
		public function editStatus($Id,$st){
			if($this->Categorys_model->editStatus($Id,$st)){
				redirect(admin_url('Categorys'));
			}else{
				redirect(admin_url('Categorys'));
			}
		}
		public function deleteCategory($Id){
			if($this->Categorys_model->deleteCategory($Id)){
				redirect(admin_url('Categorys'));
			}else{
				redirect(admin_url('Categorys'));
			}
		}
		public function editCategory($Id){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Categorys';
			$header_data->subMenu 	= 'CategorysList';
			if($this->input->post()){
				$category_title 	= $this->input->post('category_title', true);
				$description 		= $this->input->post('description', true);
				$keywords 			= $this->input->post('keywords', true);
				$sort 				= $this->input->post('sort', true);
				$menu 				= $this->input->post('menu', true);
				if($menu=='on'){$menu=1;}else{$menu=0;}
				$default_image		= $this->session->flashdata('categoryImage');
				$lang 				= $this->input->post('lang', true);
				$newlang 			= $this->input->post('newlang', true);
				$category_slug 		= $this->input->post('category_slug', true);
				$img 				= $this->input->post('img', true);
				//unlink($img);
				if($this->Categorys_model->updateCategory($Id,$category_title,$description,$keywords,$sort,$menu,$lang,$newlang,$category_slug,$default_image)){
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Categorys/editCategory/'.$Id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Categorys/editCategory/'.$Id));
				}
			}
			$data->categoryInfo	= $this->Categorys_model->categoryInfo($Id);
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/categorys_edit',$data);
			$this->load->view('Admin/footer');
		}
		public function ImageUpload(){	
		$sonuc = $this->Categorys_model->CategoryImageUpload();
			if ($sonuc != false){
				$this->session->set_flashdata('categoryImage', $sonuc);
			}
		}
	}
?>