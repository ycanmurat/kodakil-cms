<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Statics extends Kodakil_Controller{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Statics_model');
		}
		public function index(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Statics';
			$header_data->subMenu 	= 'StaticsList';
			$data->staticsInfo      = $this->Statics_model->getStaticsInfo();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/statics',$data);
			$this->load->view('Admin/footer');
		}
		public function add(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Statics';
			$header_data->subMenu 	= 'StaticsAdd';
			$data->languages_list 	= $this->Statics_model->languageList();
			if($this->input->post()){
				$statics_title 		= $this->input->post('statics_title',true);
				$description 		= $this->input->post('description',true);
				$keywords 			= $this->input->post('keywords',true);
				$statics_name		= $this->input->post('statics_name',true);
				$statics_link 		= url_seo($this->input->post('statics_link',true));
				$statics_content 	= $this->input->post('statics_content',true);
				$lang_id 			= $this->input->post('lang_id',true);
				if ($this->Statics_model->addStatics($statics_title,$description,$keywords,$statics_name,$statics_link,$statics_content,$lang_id)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/statics_add',$data);
			$this->load->view('Admin/footer');
		}
		public function deleteStatics($Id){
			if($this->Statics_model->deleteStatics($Id)){
				redirect(admin_url('Statics'));
			}else{
				redirect(admin_url('Home'));
			}
		}
		public function editStatics($Id){
			$header_data	 		= new StdClass;
			$data 		 			= new StdClass;
			$header_data->mainMenu 	= 'Statics';
			$header_data->subMenu 	= 'StaticsList';
			if($this->input->post()){
				$statics_title 		= $this->input->post('statics_title',true);
				$description 		= $this->input->post('description',true);
				$keywords 			= $this->input->post('keywords',true);
				$statics_name		= $this->input->post('statics_name',true);
				$statics_link 		= url_seo($this->input->post('statics_link',true));
				$statics_content 	= $this->input->post('statics_content',true);
				$lang_id 			= $this->input->post('lang_id',true);
				if ($this->Statics_model->updateStatics($statics_title,$description,$keywords,$statics_name,$statics_link,$statics_content,$lang_id,$Id)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			$data->languages_list 	= $this->Statics_model->languageList();
			$data->getStatics  		= $this->Statics_model->getStatics($Id); 
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/statics_edit',$data);
			$this->load->view('Admin/footer');
		}
		public function editStatus($Id,$newInfo){
			if($this->Statics_model->editStatus($Id,$newInfo)){
				redirect(admin_url('Statics'));
			}else{
				redirect(admin_url('Home'));
			}
		}
	}
?>