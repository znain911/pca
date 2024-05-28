<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prescription extends CI_Controller {
 
     public function __construct(){
         parent::__construct();
         if($this->session->userdata('sht_ssndata')){			
			
			$this->load->model('Prescription_model');
			
			$this->load->library('tags');
			$this->load->library('imagecrop');
			
			$this->load->library('forminput');			
			$this->load->library('form_validation');
			
			$this->load->library('datatables');
			$this->load->library('Querylib');
        	$this->load->library('table');
            $this->load->library('excel');
			$this->load->library('pdf');
			
			$this->load->library('form_engine');
					
		}else{
			//If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}
         
        
     }
     
     function index(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'Prescription',
			'description' => '',
			'keywords' => '',
			'heading' => 'Prescription',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'page' => 'Designation',				
			);
		$data["metadata"] = $metadata;
        $data["itemlist"] = $this->Prescription_model->get_items();
		$data["memberlist"] = $this->Prescription_model->get_memberlist();
		$data["mdcnlist"] = $this->Prescription_model->get_mdcnlist();
		$data["hospitallist"] = $this->Prescription_model->get_hospitallist();
		$data["orgnslist"] = $this->Prescription_model->get_organizationlist();
		$data["doctorlist"] = $this->Prescription_model->get_doctorlist();
		$data["doctorcategorylist"] = $this->Prescription_model->get_doctorcategory();
		$data["symptomslist"] = $this->Prescription_model->get_symptomslist();
		
         $this->load->view('new', $data);
     }
	 
	 function autodata_medicine() {
	  
	  echo $this->Prescription_model->fetch_datamdcn($this->uri->segment(3));
	 }

     function autodata_member() {
	  
	  echo $this->Prescription_model->fetch_data($this->uri->segment(3));
	 }
	 
	 function member_data(){
          if($this->input->post('member_id'))
          {
           $data = $this->Prescription_model->fetch_single_data($this->input->post('member_id'));
           foreach($data as $row)
           {
            $output['member_name'] = $row['member_name'];
           }
           echo json_encode($output);
          }
     }
	 
	 public function member_dtl(){  
     	$mbrid = $this->input->post('mbrid');		
		$data["mbr_data"] = $this->Prescription_model->mbr_details($mbrid);
		$data["mbr_billamount"] = $this->Prescription_model->get_billamount($mbrid);
		$this->load->view('mbr_dtl',$data);		
	}//end function
	
	public function save_prescription(){
        $session_data = $this->session->userdata('sht_ssndata');
        // This will store all values which inserted  from user.
		/* print_r($this->input->post('member_id'));exit; */
		/* $validation_rules = array(
               	array('field'   => 'member_id', 'label'   => 'member id', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'hospital_name', 'label'   => 'hospital name', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'billing_date', 'label'   => 'billing date', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{ */
		
		$prescriptiondata = array(            
            'member_id' => $this->input->post('member_id'),
            'member_name' => $this->input->post('member_name'),
            'age' => $this->input->post('age'),
			'gender' => $this->input->post('gender'),
			'hospital_name' => $this->input->post('hospital_name'),
			'contact_no' => $this->input->post('contact_no'),
            'consultaion_site' => $this->input->post('consultaion_site'),
			'doctor_name' => $this->input->post('doctor_name'),
			'doctor_category' => $this->input->post('designation'),
            'prescription_date' => $this->input->post('patients_date'),
			'next_appointment_date' => $this->input->post('patients_nexta'),
			'advice' => $this->input->post('patients_pte'),
            'added_by' => $session_data['id'],		
		);
		
		
		/*print_r($this->input->post('symtm'));
		echo count($_POST["test_name"]);
		exit;*/
		
                
		$prescription_id = $this->Prescription_model->prescription_insert($prescriptiondata);
		
			for($count = 0; $count < count($_POST["madicinename"]); $count++){
				$mdcndata = array(
					'prescription_id' 		=> $prescription_id,
					'mdcn_name' => $_POST["madicinename"][$count],
					'dosage' => $_POST['dosage'][$count],
					'numberof_days' => $_POST['days'][$count],
				);
				$this->Prescription_model->insert_mdcn($mdcndata);
			}
		  for($symcount = 0; $symcount < count($_POST["symtm"]); $symcount++){
				$symdata = array(
					'prescription_id' 		=> $prescription_id,
					'symtom_name' => $_POST["symtm"][$symcount],
				);
				$this->Prescription_model->insert_symtm($symdata);
			}
		 for($testcount = 0; $testcount < count($_POST["test_name"]); $testcount++){
				$testdata = array(
					'prescription_id' 		=> $prescription_id,
					'test_name' => $_POST["test_name"][$testcount],
				);
				$this->Prescription_model->insert_test($testdata);
			}

		
		
		
			redirect('prescription/prescriptionview'.'/'.$prescription_id );
			/*echo 'Succesfully added '.$prescription_id;*/
		
		//}
	}
	
	function prescriptionview($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'Prescription',
			'description' => '',
			'keywords' => '',
			'heading' => 'Prescription',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'page' => 'Designation',				
			);
		$data["metadata"] = $metadata;		
		
		$data["pid"] = $id;
		$data["get_details"] = $this->Prescription_model->get_prescriptiondetails($id);
		$data["get_symptoms"] = $this->Prescription_model->get_prescriptionsymptoms($id);
		$data["get_test"] = $this->Prescription_model->get_prescriptiontest($id);
		$data["get_mdcn"] = $this->Prescription_model->get_prescriptionmdcn($id);

		$mbrid = $data["get_details"]->member_id;
		$data["get_memberdetail"] = $this->Prescription_model->get_prescriptionmember($mbrid);
		
        //$this->load->view('prescription_view', $data);
        $this->load->view('view', $data);
     }
	
	public function pdfdetails($id)
	{
		/*if($this->uri->segment(3))
		{*/
			/*$customer_id = $this->uri->segment(3);*/
			$html_content = '<h3 align="center">UHCP Prescriptions</h3>';
			$html_content .= $this->Prescription_model->get_pdfdetails($id);
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream("".$id.".pdf", array("Attachment"=>0));
		/*}*/
	}


	function AddSymptom()
     {
      
       $data = array(
        'symptoms_name'   => $this->input->post('symptoms_name'),
       );       
        $this->Prescription_model->symptom_insert($data);
        echo 'Symptoms Inserted';
     }

     function AddInvs()
     {
      
       $data = array(
        'item_name'   => $this->input->post('item_name'),
       );
        $this->Prescription_model->invstgsn_insert($data);
        echo 'Investigation Inserted';
       
      
     }
	
	function get_memberprescription_report(){
	  if($this->input->post('member_id')){
	   echo $this->Prescription_model->fetch_prescription_report($this->input->post('member_id'));
	  }
	 }
    
    
   
    function is_ajax(){
		if (!$this->input->is_ajax_request()) {
            if($this->session->userdata('sht_ssndata')){			
				redirect('admin', 'refresh');						
			}else{
				redirect('admin/login', 'refresh');
			}
		}
	}
    
}

?>
