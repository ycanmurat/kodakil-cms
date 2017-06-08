<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Team extends Kodakil_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Team_model','TM');
		}

		public function index()
		{
			$data 			= new StdClass;
			$data->mainMenu = 'Team';
			$data->subMenu	= 'teamList';
			$data->teams 	= $this->TM->getTeam();
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/team_list',$data);
			$this->load->view('Admin/footer');
		}

		public function add(){
			$data 			= new StdClass;
			$data->mainMenu = 'Team';
			$data->subMenu	= 'teamAdd';
			if ($this->input->post()) {
				$teamData = $this->getAllPosts();
				$teamData->image = $this->session->flashdata('image');
				if ($this->TM->addTam($teamData)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Team/add'));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Team/add'));
				}
			}
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/team_add',$data);
			$this->load->view('Admin/footer');
		}

		public function editTeam($id=''){
			$data 				= new StdClass;
			$data->mainMenu 	= 'Team';
			$data->subMenu		= 'teamList';
			$data->teamInfo = $this->TM->teamInfo($id);
			if ($this->input->post()) {
				$teamData = $this->getAllPosts();
				if (empty($this->session->flashdata('image'))) {
					$teamData->image = $data->teamInfo->image;
				}else{
					$teamData->image = $this->session->flashdata('image'); 
				}
				if ($this->TM->updateTeam($id,$teamData)) {
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Team/editTeam/'.$id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Team/editTeam/'.$id));
				}
			}
			$data->teamInfo = $this->TM->teamInfo($id);
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/team_edit',$data);
			$this->load->view('Admin/footer');
		}

		public function teamStatusUpdate($id,$newInfo){
			if($this->TM->teamStatusUpdate($id,$newInfo)){
				redirect(admin_url('Team'));
			}else{
				redirect(admin_url('Team'));
			}
		}

		public function deleteTeam($id){
			if($this->TM->deleteTeam($id)){
				redirect(admin_url('Team'));
			}else{
				redirect(admin_url('Team'));
			}
		}

		public function contentImageUpload(){	
			$contentImageUpload = $this->TM->ContentImageUpload();
				if ($contentImageUpload != false){
					$this->session->set_flashdata('image', $contentImageUpload);
				}
		}

	}
?>