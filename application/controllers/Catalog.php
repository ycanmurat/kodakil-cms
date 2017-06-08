<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Catalog extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Catalog_model','CM');
	}
	
	public function index(){
		
		$data 				= new StdClass;
		$data->mainMenu 	= 'Catalog';

		$data->catalog   = $this->CM->getCatalog();
		$data->Lang 		= $this->Constract_model->getLangStatics();
		

		$this->load->view('header',$data);
		$this->load->view('katalog',$data);
		$this->load->view('footer');
	}

}
?>