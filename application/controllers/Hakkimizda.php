<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Hakkimizda extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Hakkimizda_model','HM');
	}
	
	public function index(){
		
		$data 				= new StdClass;
		$data->mainMenu 	= 'Hakkimizda';

		$data->hakkimizda   = $this->HM->getHakkimizda();
		$data->Lang 		= $this->Constract_model->getLangStatics();
		

		$this->load->view('header',$data);
		$this->load->view('about',$data);
		$this->load->view('footer');
	}

	public function vizyon_ve_misyon(){
		
		$data 				= new StdClass;
		$data->mainMenu 	= 'Hakkimizda';

		$data->hakkimizda   = $this->HM->getHakkimizda();
		$data->Lang 		= $this->Constract_model->getLangStatics();
		

		$this->load->view('header',$data);
		$this->load->view('vizyon',$data);
		$this->load->view('footer');
	}

	public function galeri()
	{
		$data 				= new StdClass;
		$data->mainMenu 	= 'Hakkimizda';
		$data->contents 	= $this->HM->getContents();
		$data->Lang 		= $this->Constract_model->getLangStatics();
		

		$this->load->view('header',$data);
		$this->load->view('galery',$data);
		$this->load->view('footer');
	}
}
?>