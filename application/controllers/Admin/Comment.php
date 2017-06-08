<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Comment extends Kodakil_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->checkLogin();
		$this->load->model('Admin/Comment_model');
	}

	public function index(){
		$data 			= new stdClass;
		$data->mainMenu = 'Comment';
		$data->subMenu 	= 'CommentList';

		$data->list = $this->Comment_model->getAllComment();

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/comment_list');
		$this->load->view('Admin/footer');
	}

	public function editStatus($id,$status)
	{
		$this->Comment_model->editStatus($id,$status);
		redirect(admin_url('Comment'));
	}


	public function editMainPage($id,$status)
	{
		$this->Comment_model->editMainPage($id,$status);
		redirect(admin_url('Comment'));
	}


	public function add(){
		$data 			= new stdClass;
		$data->mainMenu = 'Comment';
		$data->subMenu 	= 'CommentAdd';


		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/comment_add');
		$this->load->view('Admin/footer');
	}

	public function setAdd()
	{	
		$data = $this->GetAllPosts();

		$data->img = $this->session->userdata('Comment_img');
		$this->session->unset_userdata('Comment_img');

		if (isset($data->main_page)) {
			$data->main_page = 1;
		}else{
			$data->main_page = 0;
		}

		if ($this->Comment_model->setAdd($data)) {
			$this->session->set_flashdata('onay',1);
		}else{
			$this->session->set_flashdata('hata',1);
		}

		redirect(admin_url('Comment/Add'));
	}

	public function delete($id)
	{
		$this->Comment_model->delete($id);
		redirect(admin_url('Comment'));
	}

	public function ImageUpload(){	
		$sonuc = $this->Comment_model->ImageUpload();
		if ($sonuc != false){
			$this->session->set_userdata('Comment_img', $sonuc);
		}
	}
}
?>