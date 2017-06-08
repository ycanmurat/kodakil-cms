<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Human_resources extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Human_resources_model','HR');
	}
	
	public function index(){
		
		$data 				= new StdClass;
		$data->mainMenu 	= 'Human_resources';
		$data->Lang 		= $this->Constract_model->getLangStatics();
		$data->cities 		= $this->HR->getCities();
		$data->positions = $this->HR->getPositions();
		if ($this->input->post()) {
			$this->form_validation->set_rules('name_surname', 'Ad Soyad', 'required|min_length[4]|max_length[250]');
			$this->form_validation->set_rules('identification_number', 'T.C Kimlik No', 'required|min_length[11]|max_length[11]|numeric');
			$this->form_validation->set_rules('email', 'E-Posta', 'required|min_length[4]|max_length[250]|valid_email');
			$this->form_validation->set_rules('phone', 'Telefon', 'required|min_length[10]|max_length[11]|numeric');
			$this->form_validation->set_rules('gender', 'Cinsiyetiniz', 'required|min_length[1]|max_length[1]|numeric');
			$this->form_validation->set_rules('marital_status', 'Medeni Durumu', 'required|min_length[1]|max_length[1]|numeric');
			$this->form_validation->set_rules('military_status', 'Askerlik Durumu', 'required|min_length[1]|max_length[1]|numeric');
			$this->form_validation->set_rules('educational_status', 'Eğitim Durumu', 'required|min_length[1]|max_length[1]|numeric');
			$this->form_validation->set_rules('city_id', 'Yaşadığınız Şehir', 'required|min_length[1]|max_length[2]|numeric');
			//Doğum Tarihi ve Yeri
			$this->form_validation->set_rules('birth_date', 'Doğum Tarihi', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('town_id', 'Yaşadığınız İlçe', 'required|min_length[1]|max_length[3]|numeric');
			$this->form_validation->set_rules('address', 'Ev Adresiniz', 'required|min_length[5]|max_length[250]');	
			//Eğitim Geçmişi
			$this->form_validation->set_rules('education_school', 'Okul', 'required|min_length[3]|max_length[250]');	
			$this->form_validation->set_rules('education_department', 'Bölüm', 'required|min_length[3]|max_length[250]');	
			$this->form_validation->set_rules('education_start_date', 'Başlangıç', 'required|min_length[10]|max_length[10]');	
			$this->form_validation->set_rules('education_end_date', 'Bitiş', 'required|min_length[10]|max_length[10]');
			//İş Geçmişi
			$this->form_validation->set_rules('job_name', 'İş Yerinin Adı', 'required|min_length[3]|max_length[250]');
			$this->form_validation->set_rules('job_mission', 'Görev', 'required|min_length[3]|max_length[250]');
			$this->form_validation->set_rules('job_start_date', 'Başlangıç', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('job_end_date', 'Bitiş', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('job_reason', 'Ayrılma Sebebi', 'required|min_length[3]|max_length[250]');
			//Referans -> 1
			$this->form_validation->set_rules('r1_name_surname', 'Ad Soyad', 'min_length[3]|max_length[250]');
			$this->form_validation->set_rules('r1_job', 'İşyeri', 'min_length[3]|max_length[250]');
			$this->form_validation->set_rules('r1_mission', 'Görevi', 'min_length[3]|max_length[250]');
			$this->form_validation->set_rules('r1_phone', 'Telefonu', 'min_length[3]|max_length[250]');
			//Referans -> 2
			$this->form_validation->set_rules('r2_name_surname', 'Ad Soyad', 'min_length[3]|max_length[250]');
			$this->form_validation->set_rules('r2_job', 'İşyeri', 'min_length[3]|max_length[250]');
			$this->form_validation->set_rules('r2_mission', 'Görevi', 'min_length[3]|max_length[250]');
			$this->form_validation->set_rules('r2_phone', 'Telefonu', 'min_length[3]|max_length[250]');
			//Referans -> 3
			$this->form_validation->set_rules('r3_name_surname', 'Ad Soyad', 'min_length[3]|max_length[250]');
			$this->form_validation->set_rules('r3_job', 'İşyeri', 'min_length[3]|max_length[250]');
			$this->form_validation->set_rules('r3_mission', 'Görevi', 'min_length[3]|max_length[250]');
			$this->form_validation->set_rules('r3_phone', 'Telefonu', 'min_length[3]|max_length[250]');
			//Diğer Bilgiler
			$this->form_validation->set_rules('smoke', 'Sigara Kullanıyor musunuz ?', 'required|min_length[1]|max_length[1]|numeric');
			$this->form_validation->set_rules('driving_licence', 'Ehliyetiniz Var mı ?', 'required|min_length[1]|max_length[1]|numeric');
			$this->form_validation->set_rules('position', 'Çalışmak İstediğiniz Pozisyon', 'required|min_length[1]|max_length[1]|numeric');
			$this->form_validation->set_rules('fee', 'Beklenen Ücret (Net) ?', 'required|min_length[1]|max_length[6]|numeric');
			$this->form_validation->set_rules('message', 'Eklemek İstedikleriniz', 'min_length[5]');
			if (!$this->form_validation->run() == FALSE) {
				$postData = $this->getAllPosts();
				$postData->image = $this->session->userdata('image');
				if ($this->HR->formAdd($postData)) {
					$this->session->unset_userdata('image');
					$this->session->set_flashdata('success',1);
					redirect(site_url('insan-kaynaklari'));
				} else {
					$this->session->set_flashdata('danger',2);
					redirect(site_url('insan-kaynaklari'));
				}
			}
		}



		$this->load->view('header',$data);
		$this->load->view('ik',$data);
		$this->load->view('footer');
	}

	public function image()
	{
		$result = $this->HR->imageUpload();
		if ($result != false) {
			$this->session->set_userdata('image', $result);
		}
	}
}
?>