<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Export extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Export_model');
		}
		public function excel(){
			$data 			= new StdClass;
			$data->excel 	= $this->Export_model->get();

			require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
			require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator("");
			$objPHPExcel->getProperties()->setLastModifiedBy("");
			$objPHPExcel->getProperties()->setTitle("");
			$objPHPExcel->getProperties()->setSubject("");
			$objPHPExcel->getProperties()->setDescription("");

			$objPHPExcel->setActiveSheetIndex(0);

			$objPHPExcel->getActiveSheet()->SetCellValue("A1",'E-Posta');
			$objPHPExcel->getActiveSheet()->SetCellValue("B1",'Ip Adresi');
			$objPHPExcel->getActiveSheet()->SetCellValue("C1",'Kayıt Tarihi');

			$row = 2;

			foreach ($data->excel as $key => $value) {
				
				$objPHPExcel->getActiveSheet()->SetCellValue("A".$row,$value->user_email);
				$objPHPExcel->getActiveSheet()->SetCellValue("B".$row,$value->user_ip);
				$objPHPExcel->getActiveSheet()->SetCellValue("C".$row,$value->added_time);

				$row++;
			}

			$filename = 'E-Posta-Bülten-Listesi-'.date('Y-m-d-H-i-s').'.xlsx';
			$objPHPExcel->getActiveSheet()->setTitle("Tasks-Overview");

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$writer->save('php://output');
			exit;
		}
	}
?>