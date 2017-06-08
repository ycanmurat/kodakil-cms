<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Dealership_application extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Dealership_model','DM');
		$this->load->library('mailler');
	}
	
	public function index(){
		
		$data 				= new StdClass;
		$data->mainMenu 	= 'Dealership_application';
		$data->cities 		= $this->DM->getCities();
		$data->Lang 		= $this->Constract_model->getLangStatics();
		if ($this->input->post()) {
			//Firma Bilgileri
			$this->form_validation->set_rules('firma_adi', 'Firma Adı', 'required|min_length[4]|max_length[250]');
			$this->form_validation->set_rules('yetkili_adi', 'Yetkili Adı / Ünvanı', 'required|min_length[4]|max_length[250]');
			$this->form_validation->set_rules('ortaklar', 'Firma Ortakları', 'min_length[4]|max_length[250]');
			$this->form_validation->set_rules('adres', 'Adres', 'required|min_length[5]|max_length[250]');
			$this->form_validation->set_rules('il', 'İl', 'required|min_length[1]|max_length[3]|numeric');
			$this->form_validation->set_rules('ilce', 'İlçe', 'required|min_length[1]|max_length[3]|numeric');
			$this->form_validation->set_rules('telefon', 'Telefon No', 'required|min_length[10]|max_length[13]|numeric');
			$this->form_validation->set_rules('faks', 'Faks No', 'min_length[10]|max_length[13]|numeric');
			$this->form_validation->set_rules('eposta', 'E-Posta Adresi', 'required|min_length[5]|max_length[250]|valid_email');
			$this->form_validation->set_rules('kurulus_yili', 'Kuruluş Yılı', 'required|min_length[10]|max_length[10]');
			//Fatura Bilgileri
			$this->form_validation->set_rules('vergi_dairesi', 'Vergi Dairesi', 'required|min_length[4]|max_length[250]');
			$this->form_validation->set_rules('vergi_numarasi', 'Vergi Numarası', 'required|min_length[4]|max_length[250]|numeric');
			$this->form_validation->set_rules('tc', 'TC Kimlik No', 'required|min_length[11]|max_length[11]|numeric');
			$this->form_validation->set_rules('unvan', 'Unvan', 'required|min_length[4]|max_length[250]');
			//Banka Bilgileri
			$this->form_validation->set_rules('banka_adi', 'Banka Adı', 'required|min_length[4]|max_length[250]');	
			$this->form_validation->set_rules('iban', 'İban Numarası', 'required|min_length[4]|max_length[250]');	
			$this->form_validation->set_rules('banka_adi_iki', 'Banka Adı', 'min_length[4]|max_length[250]');	
			$this->form_validation->set_rules('iban_iki', 'İban Numarası', 'min_length[4]|max_length[250]');	
			//Referans Bilgileri
			$this->form_validation->set_rules('referans_bir', '1. Referans', 'required|min_length[5]|max_length[250]');	
			$this->form_validation->set_rules('referans_iki', '2. Referans', 'min_length[5]|max_length[250]');	
			$this->form_validation->set_rules('referans_uc', '3. Referans', 'min_length[5]|max_length[250]');	
			$this->form_validation->set_rules('mesaj', 'Eklemek İstedikleriniz', 'min_length[5]');	
			if (!$this->form_validation->run() == FALSE) {
				$postData = $this->getAllPosts();
				if ($this->DM->formAdd($postData)) {
					$data->kimdenName = 'Bayiliğinizi Almak İsteyen Bir Talep Var !';
	                $data->kime = array(array('email' => 'seyfettinsesli@otosesli.com', 'name' => 'Süslü AYY\'dan Talep Var'),array('email'=> 'emresesli@otosesli.com', 'name' => 'otosesli.com'),array('email'=>'demo@example.com','name'=>'dede'));
	                $data->yanitEmail = $postData->eposta;
	                $data->konu =  'Bir Bayilik Talebi Var';
	                $data->icerik = 'Firma Adı : '.$postData->firma_adi.'<br>E-Posta : '.$postData->eposta.'<br>Telefon : '.'<a href="tel://'.$postData->telefon.'">'.$postData->telefon.'</a><br>Tarih : '.date('d.m.Y H:i:s').'<br> Daha Fazla Bilgi İçin <a href="'.site_url('Admin').'"></a>';
	                if ($this->mailler->Send($data)) {
	                	$this->session->set_flashdata('success',1);
						redirect(site_url('Dealership_application'));
	                } else {
	                	$this->session->set_flashdata('danger',2);
						redirect(site_url('Dealership_application'));
	                }
				} else {
					$this->session->set_flashdata('danger',2);
					redirect(site_url('Dealership_application'));
				}
			}
		}
		$this->load->view('header',$data);
		$this->load->view('signbayi',$data);
		$this->load->view('footer');
	}
}