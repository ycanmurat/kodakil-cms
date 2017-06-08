<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Products extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Products_model');
		}
		public function index(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Products';
			$header_data->subMenu 	= 'ProductsList';
			$data->productInfo 		= $this->Products_model->productInfo();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/products',$data);
			$this->load->view('Admin/footer');
		}
		public function add(){
			$data 					= new StdClass;
			$header_data 			= new StdClass;
			$header_data->mainMenu 	= 'Products';
			$header_data->subMenu 	= 'ProductsAdd';
			$data->languages_list 	= $this->Products_model->languageList();
			$data->category_list	= $this->Products_model->category_list();
			if($this->input->post()){
				$product_title_seo 	= $this->input->post('product_title_seo',true);
				$description 		= $this->input->post('description',true);
				$keywords 			= $this->input->post('keywords',true);
				$product_name 		= $this->input->post('product_name',true);
				$product_alt_name 	= $this->input->post('product_alt_name',true);
				$product_info 		= $this->input->post('product_info',true);
				$lang_id 			= $this->input->post('lang_id',true);
				$category_id		= $this->input->post('category_id',true);
				$product_image 		= $this->session->flashdata('productImage');
				$productInfo 		= array('product_title_seo' => $product_title_seo,
											'description' 		=> $description,
											'keywords' 			=> $keywords,
											'product_name' 		=> $product_name,
											'product_alt_name' 	=> $product_alt_name,
											'product_info' 		=> $product_info,
											'lang_id' 			=> $lang_id,
											'category_id' 		=> $category_id,
											'product_image' 	=> $product_image);
				if($this->Products_model->addProduct($productInfo)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/products_add',$data);
			$this->load->view('Admin/footer');
		}
		public function ImageUpload(){	
			$sonuc = $this->Products_model->ProductImageUpload();
			if ($sonuc != false){
				$this->session->set_flashdata('productImage', $sonuc);
			}
		}
		public function editStatus($Id,$st){
			if($this->Products_model->editStatus($Id,$st)){
				redirect(admin_url('Products'));
			}else{
				redirect(admin_url('Products'));
			}
		}
		public function deleteProduct($Id){
			if($this->Products_model->deleteProduct($Id)){
				redirect(admin_url('Products'));
			}else{
				redirect(admin_url('Products'));
			}
		}
		public function editProduct($Id){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Products';
			$header_data->subMenu 	= 'ProductsList';
			$data->pInfo 			= $this->Products_model->product($Id);
			$data->languages_list 	= $this->Products_model->languageList();
			$data->category_list	= $this->Products_model->category_list();
			if($data->pInfo==false){
				redirect(admin_url('Products'));
			}
			if($this->input->post()){
				$product_title_seo 	= $this->input->post('product_title_seo',true);
				$description 		= $this->input->post('description',true);
				$keywords 			= $this->input->post('keywords',true);
				$product_name 		= $this->input->post('product_name',true);
				$product_alt_name 	= $this->input->post('product_alt_name',true);
				$product_info 		= $this->input->post('product_info',true);
				$lang_id 			= $this->input->post('lang_id',true);
				$category_id		= $this->input->post('category_id',true);
				$product_image 		= $this->session->flashdata('productImage');
				$productInfo 		= array('product_title_seo' => $product_title_seo,
											'description' 		=> $description,
											'keywords' 			=> $keywords,
											'product_name' 		=> $product_name,
											'product_alt_name' 	=> $product_alt_name,
											'product_info' 		=> $product_info,
											'lang_id' 			=> $lang_id,
											'category_id' 		=> $category_id,
											'product_image' 	=> $product_image);
				unlink($data->pInfo->product_image);
				if($this->Products_model->eProduct($productInfo,$data->pInfo->Id)){
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Products/editProduct/'.$data->pInfo->Id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Products/editProduct/'.$data->pInfo->Id));
				}

			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/products_edit',$data);
			$this->load->view('Admin/footer');
		}
		public function NewsProductAdd(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Products';
			$header_data->subMenu 	= 'NewsProductAdd';
			$data->products 		= $this->Products_model->newProductInfo();
			if($this->input->post()){
				$product_id = $this->input->post('product_id',true);
				if($this->Products_model->ProductIsThere($product_id)){
					$this->session->set_flashdata('urun_var','1');
					redirect(admin_url('Products/NewsProductAdd'));
				}else{
					if($this->Products_model->addNewProduct($product_id)){
						$this->session->set_flashdata('onay','1');
						redirect(admin_url('Products/NewsProductAdd'));
					}else{
						$this->session->set_flashdata('hata','1');
						redirect(admin_url('Products/NewsProductAdd'));	
					}
				}
			}
			$data->getNewsProduct = $this->Products_model->getNewsProduct();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/new_product',$data);
			$this->load->view('Admin/footer');
		}
		public function deleteNewProduct($Id){
			if($this->Products_model->deleteNewProduct($Id)){
				redirect(admin_url('Products/NewsProductAdd'));
			}else{
				redirect(admin_url('Products/NewsProductAdd'));
			}
		}
	}
?>