<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends Kodakil_Controller 
{
	
	private $result;

	function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
		$this->result = new StdClass();
		$this->result->status = false;
		$this->load->model('Ajax_model','AM');
		require 'vendor/autoload.php';
		$this->load->library('mailler');
    }

    private function response()
    {
    	echo json_encode($this->result);
    }

	public function getCountiesByCities($CityID)
	{
		if ($responseCities = $this->AM->getCountiesByCities($CityID)) {
			$this->result->status = true;
			$this->result->array = $responseCities;
		} else {
			$this->result->array = 'Lütfen Seçiniz';
		}
		$this->response();
	}

	public function getCountiesByHumanResources($CityID)
	{
		if ($responseCounties = $this->AM->getCountiesByHumanResources($CityID)) {
			$this->result->status = true;
			$this->result->array = $responseCounties;
		} else {
			$this->result->array = 'Lütfen Seçiniz';
		}
		$this->response();
	}

	public function sendContactForm()
	{
		$this->form_validation->set_rules('contactNameSurname', 'Ad Soyad', 'required|min_length[4]|max_length[250]');
		$this->form_validation->set_rules('contactMail', 'E-Posta', 'required|min_length[4]|max_length[250]|valid_email');
		$this->form_validation->set_rules('contactPhone', 'Telefon', 'required|min_length[10]|max_length[12]|numeric');
		$this->form_validation->set_rules('contactSubject', 'Konu', 'required|min_length[4]|max_length[250]');
		$this->form_validation->set_rules('contactMessage', 'Mesajınız', 'required|min_length[5]');
		if ($this->form_validation->run() == FALSE){
			$this->result->error = validation_errors();
		} else {
			$getAllPosts = $this->GetAllPosts();
			$getAllPosts->name_surname = $getAllPosts->contactNameSurname;
			$getAllPosts->email = $getAllPosts->contactMail;
			$getAllPosts->phone = $getAllPosts->contactPhone;
			$getAllPosts->Subject = $getAllPosts->contactSubject;
			$getAllPosts->message = $getAllPosts->contactMessage;
			$getAllPosts->ip_address = $this->input->ip_address();
			unset($getAllPosts->contactNameSurname,
					$getAllPosts->contactMail,
						$getAllPosts->contactPhone,
							$getAllPosts->contactSubject,
								$getAllPosts->contactMessage);
			if ($this->AM->sendContactForm($getAllPosts)) {
				$this->result->status = true;
				$this->result->redirect_url = site_url('Corporate/contact');
			} else {
				$this->result->error = 'Şuanda İşlem Sağlayamıyoruz, Lütfen Daha Sonra Tekrar Deneyin.';
			}
		}
		$this->response();	
	}
}