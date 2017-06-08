<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Catalog extends Kodakil_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Catalog_model');
	}

	public function index(){
		$data 			= new StdClass;
		$data->mainMenu = 'Catalog';
		$data->subMenu	= 'CatalogList';
		$data->catalog 	= $this->Catalog_model->getCatalog();
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/catalog_list',$data);
		$this->load->view('Admin/footer');
	}

		public function add(){
			$data 			= new StdClass;
			$data->mainMenu = 'Catalog';
			$data->subMenu	= 'Catalogadd';
			if ($this->input->post()) {
				$catalogData = $this->getAllPosts();
				unset($catalogData->title,$catalogData->content);
				$catalogData->title = $this->input->post('title');
				$catalogData->content = $this->input->post('content');
				$catalogData->image = $this->session->userdata('catalog_image');
				$catalogData->pdf = $this->session->userdata('catalog_pdf');
				if ($this->Catalog_model->addCatalog($catalogData)) {
					$this->session->unset_userdata('catalog_image');
					$this->session->unset_userdata('catalog_pdf');
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Catalog/add'));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Catalog/add'));
				}
			}
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/catalog_add',$data);
			$this->load->view('Admin/footer');
		}

		public function addLink(){
			$data 			= new StdClass;
			$data->mainMenu = 'Catalog';
			$data->subMenu	= 'Catalogadd';
			if ($this->input->post()) {
				$catalogLinkData = $this->getAllPosts();
				$catalogLinkData->link = $this->session->flashdata('link');
				if ($this->Catalog_model->addCatalog($catalogLinkData)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Catalog/add'));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Catalog/add'));
				}
			}
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/catalog_add',$data);
			$this->load->view('Admin/footer');
		}



		public function editCatalog($id=''){
			$data 				= new StdClass;
			$data->mainMenu 	= 'Catalog';
			$data->subMenu		= 'CatalogList';
			$data->cacheInfo 	= $this->Catalog_model->CatalogInfo($id);
			if ($this->input->post()) {
				$catalogData = $this->getAllPosts();
				unset($catalogData->title,$catalogData->content);
				$catalogData->title = $this->input->post('title');
				$catalogData->content = $this->input->post('content');
				if (empty($this->session->userdata('catalog_image'))) {
					$catalogData->image 	= $data->cacheInfo->image;
				}else{
					$catalogData->image 	= $this->session->userdata('catalog_image'); 
				}
				if (empty($this->session->userdata('catalog_pdf'))) {
					$catalogData->pdf 	= $data->cacheInfo->pdf;
				}else{
					$catalogData->pdf 	= $this->session->userdata('catalog_pdf'); 
				}
				if ($this->Catalog_model->updateCatalog($id,$catalogData)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Catalog/editCatalog/'.$id));
					$this->session->unset_userdata('catalog_pdf');
					$this->session->unset_userdata('catalog_image');
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Catalog/editCatalog/'.$id));
				}
			}
			$data->CatalogInfo = $this->Catalog_model->CatalogInfo($id);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/catalog_edit',$data);
			$this->load->view('Admin/footer');
		}

		public function CatalogStatusUpdate($id,$newInfo){
			if($this->Catalog_model->CatalogStatusUpdate($id,$newInfo)){
				redirect(admin_url('Catalog'));
			}else{
				redirect(admin_url('Catalog'));
			}
		}

		public function deleteCatalog($id){
			if($this->Catalog_model->deleteCatalog($id)){
				redirect(admin_url('Catalog'));
			}else{
				redirect(admin_url('Catalog'));
			}
		}

		public function catalogImageUpload(){	
			$catalogImageUpload = $this->Catalog_model->ContentImageUpload();
			if ($catalogImageUpload != false){
				$this->session->set_userdata('catalog_image', $catalogImageUpload);
			}
		}

		public function catalogPdfUpload()
		{
			$catalogPdfUpload = $this->Catalog_model->ContentImageUpload();
			if ($catalogPdfUpload != false){
				$this->session->set_userdata('catalog_pdf', $catalogPdfUpload);
			}
		}
}
?>