<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Iletisim extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Iletisim_model');
		$this->load->library('Mailler');
	}
	
	public function index($slug = '')
	{
		if (empty($slug)) {
			$data 				= new StdClass;
			$data->Lang 		= $this->Constract_model->getLangStatics();
			$data->titles 		= $this->Iletisim_model->getTitles();
			$data->page 		= $this->Iletisim_model->getMinPage();
			$data->lower_title 	= $data->page->title_slug;
			$data->mainMenu 	= 'İletişim';
			$this->load->view('header',$data);
			$this->load->view('contact',$data);
			$this->load->view('footer');
		} else {
			$data 				= new StdClass;
			$data->Lang 		= $this->Constract_model->getLangStatics();
			$data->titles 		= $this->Iletisim_model->getTitles();
			$data->mainMenu 	= 'İletişim';
			if ($data->page = $this->Iletisim_model->getPage($slug)) {
				$data->lower_title = $data->page->title_slug;
				$this->load->view('header',$data);
				$this->load->view('contact',$data);
				$this->load->view('footer');
			} else {
				redirect(site_url());
			}
		}
		
	}

	public function contact()
	{
		$data = new StdClass;
		$this->form_validation->set_rules('name', 'Adınız', 'required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('email','E-Posta Adresi','required|min_length[5]|valid_email|max_length[255]');
		$this->form_validation->set_rules('phone', 'Telefon', 'required|min_length[10]|max_length[13]|numeric');
		$this->form_validation->set_rules('message', 'Mesaj', 'required|min_length[3]');
		if (!$this->form_validation->run() == FALSE) {
			$getAllPosts = $this->getAllPosts();
			if ($this->Iletisim_model->setContact($getAllPosts)) {
				$data->kimdenName = 'Kurumsal Web Sayfanızdan Bir İletişim Talebi Var !';
                $data->kime = array(array('email' => 'seyfettinsesli@otosesli.com', 'name' => 'Süslü AYY\'dan Talep Var'),array('email'=> 'emresesli@otosesli.com', 'name' => 'otosesli.com'),array('email'=>'demo@example.com','name'=>'dede'));
                $data->yanitEmail = $getAllPosts->email;
                $data->konu =  'Web Sitenizden, İletişim Talebi Var';
                $data->icerik = 'Ad Soyad : '.$getAllPosts->name.'<br>E-Posta : '.$getAllPosts->email.'<br>Telefon : '.'<a href="tel://'.$getAllPosts->phone.'">'.$getAllPosts->phone.'</a><br>İçerik : '.$getAllPosts->message.'<br>Tarih : '.date('d.m.Y H:i:s').'<br>IP : '.$this->input->ip_address();
                if ($this->mailler->Send($data)) {
                	print "success";	
                } else {
                	print "error";
                }
			} else {
				print "error";
			}
		} else{
			print validation_errors();
		}
	}
}
?>