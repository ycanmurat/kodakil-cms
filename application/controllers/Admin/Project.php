<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Project extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->load->model('Admin/Project_model');
	}

	public function index(){
		$data 					= new StdClass;
		$data->mainMenu 	= 'Proje';
		$data->subMenu		= 'ProjeList';

		$data->list = $this->Project_model->getAllProject();

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/project_list');
		$this->load->view('Admin/footer');
	}

	public function add(){
		$data 					= new StdClass;
		$data->mainMenu 	= 'Proje';
		$data->subMenu		= 'ProjeAdd';

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/project_add');
		$this->load->view('Admin/footer');
	}

	public function setAdd(){
		$data = new StdClass;
		$data->posts = $this->GetAllPosts();
		$data->files = $_FILES;
		if ($this->Project_model->addProject($data)) {
			$this->session->set_flashdata('onay',1);
		}else{
			$this->session->set_flashdata('hata',1);
		}

		redirect(admin_url('Project/add'));
	}

	public function update($id){
		$data 					= new StdClass;
		$data->mainMenu 	= 'Proje';
		$data->subMenu		= 'ProjeList';

		$data->project = $this->Project_model->getProjectById($id);
		if ($data->project == false) {
			redirect(admin_url('Project'));
		}


		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/project_update');
		$this->load->view('Admin/footer');
	}

	public function setUpdate($id)
	{
		$data = new StdClass;
		$data->posts = $this->GetAllPosts();
		$data->files = $_FILES;
		
		if ($this->Project_model->UpdateProject($data,$id)) {
			$this->session->set_flashdata('onay',1);
		}else{
			$this->session->set_flashdata('hata',1);
		}

		redirect(admin_url('Project/update/'.$id));
	}

	public function UpdateStatus($id,$status)
	{
		$this->Project_model->UpdateStatus($id,$status);
		redirect(admin_url('Project'));
	}

	public function delete($id){
		$this->Project_model->delete($id);
		redirect(admin_url('Project'));
	}

	public function imgsil($id)
	{
		$this->Project_model->galeriImageDeleteById($id);
		echo 1;
	}
}
?>