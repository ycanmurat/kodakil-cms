<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Video extends Kodakil_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Video_model');
		}

		public function index(){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Galery';
			$header_data->subMenu 	= 'VideoList';
			$data->imageInfo 		= $this->Video_model->imageInfo();

			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/video',$data);
			$this->load->view('Admin/footer');
		}

		public function Add(){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Galery';
			$header_data->subMenu 	= 'VideoAdd';

			$data->category = $this->Video_model->getVideoCategoryAll();

			if($this->input->post()){
				$dataPost = new stdClass;
				$dataPost->url 			= $this->input->post('url',true);
				$dataPost->category_id 	= $this->input->post('category_id',TRUE);

				if ($this->session->flashdata('videoImage')) {
					$dataPost->image	= $this->session->flashdata('videoImage');
				}

				if (!trim(empty($dataPost->url))) {
					if($this->Video_model->addVideo($dataPost)){
						$this->session->set_flashdata('onay','1');
					}else{
						$this->session->set_flashdata('hata','1');
					}
				}else{
					$this->session->set_flashdata('hata','1');
				}
				redirect(admin_url('Video/add'));
			}else{
				$this->load->view('Admin/header',$header_data);
				$this->load->view('Admin/video_add',$data);
				$this->load->view('Admin/footer');	
			}
		}

		public function ImageUpload(){	
		$sonuc = $this->Video_model->VideoImageUpload();
			if ($sonuc != false){
				$this->session->set_flashdata('videoImage', $sonuc);
			}
		}

		public function VideoEditStatus($Id,$st){
			if($this->Video_model->VideoEditStatus($Id,$st)){
				redirect(admin_url('Video'));
			}else{
				redirect(admin_url('Video'));
			}
		}

		public function deleteVideo($Id){
			$info = $this->Video_model->delete($Id);

			redirect(admin_url('Video'));
		}

		public function Category()
		{
			$data 			= new stdClass;
			$data->mainMenu = 'Galery';
			$data->subMenu 	= 'Category';

			$data->list 	= $this->Video_model->getCategoryAll();

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/video_category');
			$this->load->view('Admin/footer');	
		}

		public function categoryDel($id)
		{
			$this->Video_model->categoryDel($id);
			redirect(admin_url('Video/Category'));
		}

		public function CategoryAdd()
		{
			$data 			= new stdClass;
			$data->mainMenu = 'Galery';
			$data->subMenu 	= 'Category';
			
			if ($this->input->post()) {
				$name = $this->input->post('name',TRUE);
				if (empty(trim($name))) {
					$this->session->set_flashdata('hata','1');
				}else{
					if ($this->Video_model->addCategory($name)) {
						$this->session->set_flashdata('onay','1');
					}else{
						$this->session->set_flashdata('hata','1');
					}
				}
				redirect(admin_url('Video/CategoryAdd'));
			}else{
				$this->load->view('Admin/header',$data);
				$this->load->view('Admin/video_category_add');
				$this->load->view('Admin/footer');
			}
		}
	}
?>