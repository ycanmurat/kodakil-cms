<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Galeri extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Galeri_model');
	}
	
	public function index(){
		
		$data 				= new StdClass;
		$data->mainMenu 	= 'Galeri';
		/*
		$data->menu 		= $this->Constract_model->menu();
		$data->footerMenu 	= $this->Constract_model->getFooterEducation();
		$data->category 	= $this->Galeri_model->getCategory();
		$data->Lang 		= $this->Constract_model->getLangStatics();
		$data->pictures 	= $this->Galeri_model->getPictures();
		$data->header 		= 'Biz Kimiz';
		*/
		$data->images = $this->Galeri_model->getImages();
		$data->Lang 		= $this->Constract_model->getLangStatics();
		//prex($data->images);
		
		$this->load->view('header',$data);
		$this->load->view('galeri',$data);
		$this->load->view('footer');
	}
}
?>