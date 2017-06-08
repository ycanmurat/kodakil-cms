<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Program extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->load->model('Admin/Program_model');
	}

	public function index(){
		$data 			= new StdClass;
		$data->mainMenu = 'Program';
		$data->subMenu 	= 'ProgramList';

		$data->programs = $this->Program_model->getAllPrograms();
		
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/program');
		$this->load->view('Admin/footer');
	}

	public function add(){
		$data 			= new StdClass;
		$data->mainMenu = 'Program';
		$data->subMenu 	= 'ProgramAdd';
		$data->instructor = $this->Program_model->getInstructor();
		$data->menus = $this->Program_model->getProgramMenu();

		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'İsim', 'required');
			$this->form_validation->set_rules('price', 'Fiyat', 'required|numeric');
			$this->form_validation->set_rules('period', 'Süre', 'required');
			$this->form_validation->set_rules('start_date', 'başlangıç tarihi', 'required');
			$this->form_validation->set_rules('finish_date', 'bitiş tarihi', 'required');
			$this->form_validation->set_rules('start_time', 'başlangıç saati', 'required');
			$this->form_validation->set_rules('finish_time', 'bitiş saati', 'required');
			$this->form_validation->set_rules('location', 'Konum', 'required');
			$this->form_validation->set_rules('level', 'seviye', 'required');
			$this->form_validation->set_rules('city', 'şehir', 'required');
			$this->form_validation->set_rules('content', 'içerik', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('Admin/header',$data);
				$this->load->view('Admin/programadd');
				$this->load->view('Admin/footer');
			}else{
				$data = $this->getAllPosts();
				$data->slug = url_seo($data->name.$start_date);

				if (null !== $this->session->flashdata('banner')) {
					$data->banner = $this->session->flashdata('banner');
				}

				if ($this->Program_model->addProgram($data)) {
					$this->session->set_flashdata('onay',1);
				}else{
					$this->session->set_flashdata('hata',1);
				}

				redirect(admin_url('Program/add'));
			}
		}else{
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/programadd');
			$this->load->view('Admin/footer');
		}
	}

	public function edit($id)
	{
		$data 				= new StdClass;
		$data->mainMenu 	= 'Program';
		$data->subMenu 		= 'ProgramList';
		$data->instructor 	= $this->Program_model->getInstructor();
		$data->menus 		= $this->Program_model->getProgramMenu();
		$data->program  	= $this->Program_model->getProgramById($id);

		if ($data->program == false) {
			redirect(admin_url('Program'));
		}

		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'İsim', 'required');
			$this->form_validation->set_rules('price', 'Fiyat', 'required|numeric');
			$this->form_validation->set_rules('period', 'Süre', 'required');
			$this->form_validation->set_rules('start_date', 'başlangıç tarihi', 'required');
			$this->form_validation->set_rules('finish_date', 'bitiş tarihi', 'required');
			$this->form_validation->set_rules('start_time', 'başlangıç saati', 'required');
			$this->form_validation->set_rules('finish_time', 'bitiş saati', 'required');
			$this->form_validation->set_rules('location', 'Konum', 'required');
			$this->form_validation->set_rules('level', 'seviye', 'required');
			$this->form_validation->set_rules('city', 'şehir', 'required');
			$this->form_validation->set_rules('content', 'içerik', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('Admin/header',$data);
				$this->load->view('Admin/programedit');
				$this->load->view('Admin/footer');
			}else{
				$data = $this->getAllPosts();
				$data->slug = url_seo($data->name.$data->start_date);

				if (null !== $this->session->flashdata('banner')) {
					$data->banner = $this->session->flashdata('banner');
				}

				if ($this->Program_model->editProgram($data,$id)) {
					$this->session->set_flashdata('onay',1);
				}else{
					$this->session->set_flashdata('hata',1);
				}

				redirect(admin_url('Program/edit/'.$id));
			}
		}else{
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/programedit');
			$this->load->view('Admin/footer');
		}
	}

	public function curriculumAdd($id)
	{
		$data 				= new StdClass;
		$data->mainMenu 	= 'Program';
		$data->subMenu 		= 'ProgramList';
		$data->day  		= $this->Program_model->getDayById($id);
		$data->programId 	= $id;

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/programday');
		$this->load->view('Admin/footer');
	}

	public function editStatus($id,$st){
		if($this->Program_model->editStatus($id,$st)){
			redirect(admin_url('Program'));
		}else{
			redirect(admin_url('Program'));
		}
	}

	public function instructorAdd($id)
	{
		$data 			= new StdClass;
		$data->mainMenu = 'Program';
		$data->subMenu 	= 'ProgramList';

		if ($this->input->post()) {
			$instructor_id = $this->input->post('instructor_id',TRUE);
			if (empty(trim($instructor_id)) OR $instructor_id == 0) {
				$this->session->set_flashdata('hata','1');
			}else{
				if ($this->Program_model->addInstructor($instructor_id,$id)) {
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			redirect(admin_url('Program/instructor/'.$id));
		}else{
			$data->instructor = $this->Program_model->getNotUsedInstructor($id);
			if ($data->instructor == false) {
				redirect(admin_url('Program/instructor/'.$id));
			}
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/instructoradd');
			$this->load->view('Admin/footer');
		}
	}

	public function instructordelete($ins_id,$program_id)
	{
		$this->Program_model->deleteInstructor($ins_id);
		redirect(admin_url('Program/instructor/'.$program_id));
	}

	public function instructor($id)
	{
		$data 				= new StdClass;
		$data->mainMenu 	= 'Program';
		$data->subMenu 		= 'ProgramList';
		$data->instructor  	= $this->Program_model->GetProgramInstructor($id);
		$data->programId 	= $id;

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/programinstructor');
		$this->load->view('Admin/footer');
	}

	public function dayAdd($id)
	{
		$data 			= new StdClass;
		$data->mainMenu = 'Program';
		$data->subMenu 	= 'ProgramList';

		if ($this->input->post()) {
			$name = $this->input->post('menu',TRUE);
			$sort = $this->input->post('sort',TRUE);
			if (empty(trim($name))) {
				$this->session->set_flashdata('hata','1');
			}else{
				if ($this->Program_model->addDay($name,$sort,$id)) {
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			redirect(admin_url('Program/curriculumAdd/'.$id));
		}else{
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/programdayadd');
			$this->load->view('Admin/footer');
		}
	}

	public function dayDetailAdd($day_id,$program_id)
	{
		$data 			= new StdClass;
		$data->mainMenu = 'Program';
		$data->subMenu 	= 'ProgramList';

		$data->menu = $this->Program_model->getProgramMenu();

		if ($this->input->post()) {
			$name = $this->input->post('menu',TRUE);
			$time = $this->input->post('time',TRUE);
			$sort = $this->input->post('sort',TRUE);
			if (empty(trim($name)) OR empty(trim($time))) {
				$this->session->set_flashdata('hata','1');
			}else{
				if ($this->Program_model->addDayDetail($name,$time,$sort,$day_id,$program_id)) {
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			redirect(admin_url('Program/dayDetail/'.$day_id.'/'.$program_id));
		}else{
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/programdaydetailadd');
			$this->load->view('Admin/footer');
		}
	}

	public function dayDelete($day_id,$program_id)
	{
		$this->Program_model->deleteDay($day_id);
		redirect(admin_url('Program/curriculumAdd/'.$program_id));
	}


	public function dayDetailDelete($day_detail,$day_id,$program_id)
	{
		$this->Program_model->deleteDayDetail($day_detail);
		redirect(admin_url('Program/dayDetail/'.$day_id.'/'.$program_id));
	}

	public function dayDetail($day_id,$program_id)
	{
		$data 				= new StdClass;
		$data->mainMenu 	= 'Program';
		$data->subMenu 		= 'ProgramList';
		$data->dayDetail	= $this->Program_model->getDayDetailById($day_id);
		$data->dayId 		= $day_id;
		$data->programId 	= $program_id;

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/programdaydetail');
		$this->load->view('Admin/footer');
	}

	public function deleteProgram($id){
		$this->Program_model->deleteProgram($id);
		redirect(admin_url('Program'));
	}

	public function MenuList(){
		$data 			= new StdClass;
		$data->mainMenu = 'Program';
		$data->subMenu 	= 'ProgrammenuAdd';

		$data->menu = $this->Program_model->getProgramMenu();
		
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/menulist');
		$this->load->view('Admin/footer');
	}

	public function MenuAdd(){
		$data 			= new StdClass;
		$data->mainMenu = 'Program';
		$data->subMenu 	= 'ProgrammenuAdd';

		$data->menu = $this->Program_model->getProgramMenu();

		if ($this->input->post()) {
			$name = $this->input->post('menu',TRUE);
			if (empty(trim($name))) {
				$this->session->set_flashdata('hata','1');
			}else{
				if ($this->Program_model->addMenu($name)) {
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			redirect(admin_url('Program/MenuList'));
		}else{
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/menuadd');
			$this->load->view('Admin/footer');
		}
	}

	public function menudel($id)
	{
		$this->Program_model->menudelete($id);
		redirect(admin_url('Program/MenuList'));
	}

	public function ImageUpload()
	{
		if ($this->Program_model->ImageUpload() == false) {
			echo 0;
		}else{
			echo 1;
		}
	}

	public function preRegistration($id)
	{
		$data 			= new StdClass;
		$data->mainMenu = 'Program';
		$data->subMenu 	= 'ProgramList';

		$data->list = $this->Program_model->getRegistrationByProgramId($id);

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/programregistration');
		$this->load->view('Admin/footer');
	}
}
?>