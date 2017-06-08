<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Referances extends Kodakil_Controller
	{	
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Referances_model');
		}
		public function index(){
			$data 						= new StdClass;
			$header_data				= new StdClass;
			$header_data->mainMenu		= 'Referances';
			$header_data->subMenu		= 'ReferancesList';
			$data->getReferances 		= $this->Referances_model->getReferances();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/referances',$data);
			$this->load->view('Admin/footer');
		}
		public function add(){
			$data 						= new StdClass;
			$header_data				= new StdClass;
			$header_data->mainMenu		= 'Referances';
			$header_data->subMenu		= 'ReferancesAdd';

			if($this->input->post()){
				$referances_title 		= $this->input->post('referances_title',true);
				$referances_image 		= $this->session->flashdata('referancesImage');
				$referancesInfo 		= array('referances_title'=>$referances_title,'referances_image' =>$referances_image);
				if($this->Referances_model->addReferances($referancesInfo)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/referances_add',$data);
			$this->load->view('Admin/footer');
		}
		public function ImageUpload(){	
			$sonuc = $this->Referances_model->ReferancesImageUpload();
				if ($sonuc != false){
					$this->session->set_flashdata('referancesImage', $sonuc);
				}
		}
		public function deleteReferances($Id){
			if($this->Referances_model->deleteReferances($Id)){
				redirect(admin_url('Referances'));
			}else{
				redirect(admin_url('Referances'));
			}
		}
		public function referacesStatusUpdate($Id,$newInfo){
			if($this->Referances_model->referacesStatusUpdate($Id,$newInfo)){
				redirect(admin_url('Referances'));
			}else{
				redirect(admin_url('Referances'));
			}
		}

		public function referancesSort()
		{
			$sort = $this->input->post('sort',true);
			$this->Referances_model->SetSort($sort);
			redirect(admin_url('Referances'));
		}
		
	}
?>