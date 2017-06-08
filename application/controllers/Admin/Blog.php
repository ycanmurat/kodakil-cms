<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Blog extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Blog_model');
		}

		public function index(){
			$data 			= new StdClass;
			$data->mainMenu = 'Blog';
			$data->subMenu	= 'BlogList';
			$data->blogs 	= $this->Blog_model->getBlog();
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/blog_list',$data);
			$this->load->view('Admin/footer');
		}

		public function add(){
			$data 			= new StdClass;
			$data->mainMenu = 'Blog';
			$data->subMenu	= 'BlogAdd';
			if ($this->input->post()) {
				$blogData = $this->getAllPosts();
				$blogData->content_photo 	= $this->session->flashdata('content_photo');
				if ($this->Blog_model->addBlog($blogData)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Blog/add'));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Blog/add'));
				}
			}
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/blog_add',$data);
			$this->load->view('Admin/footer');
		}

		public function editBlog($id=''){
			$data 				= new StdClass;
			$data->mainMenu 	= 'Blog';
			$data->subMenu		= 'BlogList';
			$data->cacheInfo 	= $this->Blog_model->blogInfo($id);
			if ($this->input->post()) {
				$blogData = $this->getAllPosts();
				if (empty($this->session->flashdata($content_photo))) {
					$blogData->content_photo 	= $data->cacheInfo->content_photo;
				}else{
					$blogData->content_photo 	= $this->session->flashdata('content_photo'); 
				}
				if ($this->Blog_model->updateBlog($id,$blogData)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Blog/editBlog/'.$id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Blog/editBlog/'.$id));
				}
			}
			$data->blogInfo = $this->Blog_model->blogInfo($id);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/blog_edit',$data);
			$this->load->view('Admin/footer');
		}

		public function blogStatusUpdate($id,$newInfo){
			if($this->Blog_model->blogStatusUpdate($id,$newInfo)){
				redirect(admin_url('Blog'));
			}else{
				redirect(admin_url('Blog'));
			}
		}

		public function deleteBlog($id){
			if($this->Blog_model->deleteBlog($id)){
				redirect(admin_url('Blog'));
			}else{
				redirect(admin_url('Blog'));
			}
		}

		public function contentImageUpload(){	
			$contentImageUpload = $this->Blog_model->ContentImageUpload();
				if ($contentImageUpload != false){
					$this->session->set_flashdata('content_photo', $contentImageUpload);
				}
		}

	}
?>