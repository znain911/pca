<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();
		// load model
        $this->load->model('Export_model', 'export');
         $this->load->library('excel');
        
        $this->load->library('tags');
			$this->load->library('imagecrop');
			
			$this->load->library('forminput');			
			$this->load->library('form_validation');
			
			$this->load->library('datatables');
			$this->load->library('Querylib');
        	$this->load->library('table');
			
			$this->load->library('form_engine');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data | TechArise';
        $data['employeeInfo'] = $this->export->employeeList();
		// load view file for output
        /*$this->load->view('export/index', $data);*/
        
		$this->load->view('welcome_message', $data);
	}
    
    // create xlsx
    public function createXLS() {
		// create file name
        $fileName = 'data-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $empInfo = $this->export->employeeList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'First Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Last Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'DOB');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');       
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['first_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['last_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['dob']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['contact_no']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(ROOT_UPLOAD_IMPORT_PATH.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);        
    }
}
