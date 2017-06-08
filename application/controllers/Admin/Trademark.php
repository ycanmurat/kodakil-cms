<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Trademark extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			//$this->load->model('Admin/Tradeark_model'); -> tredeark yazmışsın :D trademark olacak m harfini yazmayı unutmuşsun
			$this->load->model('Admin/Trademark_model');
		}

		public function index(){
			$data 			= new StdClass;
			$data->mainMenu = 'Trademark';
			$data->subMenu	= 'TradeList';
			$data->trademarks 	= $this->Trademark_model->getTrademark();
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/trademark_list',$data);
			$this->load->view('Admin/footer');
		}

		public function add(){
			$data 			= new StdClass;
			$data->mainMenu = 'Trademark';
			$data->subMenu	= 'Tradeadd';
			if ($this->input->post()) {
				$postData = $this->getAllPosts();
				$postData->image = $this->session->flashdata('content_photo');
				if ($this->Trademark_model->addTrademark($postData)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Trademark/add'));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Trademark/add'));
				}
			}
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/trademark_add',$data);
			$this->load->view('Admin/footer');
		}

		public function editTrademark($id=''){
			$data 				= new StdClass;
			$data->mainMenu 	= 'Trademark';
			$data->subMenu		= 'TradeList';
			$data->cacheInfo 	= $this->Trademark_model->trademarkInfo($id);
			if ($this->input->post()) {
				$trademarkData = $this->getAllPosts();
				if (empty($this->session->flashdata('content_photo'))) {
					$trademarkData->image 	= $data->cacheInfo->image;
				}else{
					$trademarkData->image 	= $this->session->flashdata('content_photo'); 
				}
				if ($this->Trademark_model->updateTrade($id,$trademarkData)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Trademark/editTrademark/'.$id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Trademark/editTrademark/'.$id));
				}
			}
			$data->trademarkInfo = $this->Trademark_model->trademarkInfo($id);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/trademark_edit',$data);
			$this->load->view('Admin/footer');
		}

		public function trademarkStatusUpdate($id,$newInfo){
			if($this->Trademark_model->trademarkStatusUpdate($id,$newInfo)){
				redirect(admin_url('Trademark'));
			}else{
				redirect(admin_url('Trademark'));
			}
		}

		public function deleteTrademark($id){
			if($this->Trademark_model->deleteTrademark($id)){
				redirect(admin_url('Trademark'));
			}else{
				redirect(admin_url('Trademark'));
			}
		}

		public function contentImageUpload(){	
			$contentImageUpload = $this->Trademark_model->ContentImageUpload();
			if ($contentImageUpload != false){
				$this->session->set_flashdata('content_photo', $contentImageUpload);
			}
		}

	}
?>