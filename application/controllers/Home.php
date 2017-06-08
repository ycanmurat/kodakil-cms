<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Home extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index(){
		$data 			= new StdClass;
		$data->images 		= $this->Home_model->getGalery(6);
		$data->sliders 		= $this->Home_model->getSliders();
		$data->referances   = $this->Home_model->getReferances();
		$data->Lang 		= $this->Constract_model->getLangStatics();
		$data->mobileSlider = $this->Home_model->getMobileSlider();
		$data->sliderTwoBlog = $this->Home_model->getSliderTwoBlogContent();
		$data->blogContent = $this->Home_model->getBlogContent();
		$data->services = $this->Home_model->getServices();
		$data->trademark = $this->Home_model->getTrademarkContent();
		$data->teams = $this->Home_model->getTeams();
		$data->trademarks = $this->Home_model->getTrademarks();
		$data->imagesGallery = $this->Home_model->getImages();
		//prex($data->trademarks);

		$data->mainMenu 	= 'Anasayfa';
		$this->load->view('header',$data);
		$this->load->view('index');
		$this->load->view('footer');
	}
}
?>