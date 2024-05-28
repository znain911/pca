<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {
 
     public function __construct(){
         parent::__construct();
         if($this->session->userdata('sht_ssndata')){			
			
			$this->load->model('Patient_model');
			
			$this->load->library('tags');
			$this->load->library('imagecrop');
			
			$this->load->library('forminput');			
			$this->load->library('form_validation');
			
			$this->load->library('datatables');
			$this->load->library('Querylib');
        	$this->load->library('table');
            $this->load->library('excel');
			
			
			$this->load->library('form_engine');
					
		}else{
			//If no session, redirect to login page
			redirect('auth/login', 'refresh');
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
			'center_id' => $session_data['center_id'],
			'page' => 'Prescription',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'patient/new_patient_data';
		$data["save_atd"] = 'patient/atd_save';
        $data["divisionlist"] = $this->Patient_model->get_division();
        $data["explist"] = $this->Patient_model->get_expnditure();
        $data["profesionlist"] = $this->Patient_model->get_profesion();
        $data["diabetestypelist"] = $this->Patient_model->get_typeofdiabetes();
        $data["dmstatuslist"] = $this->Patient_model->get_dm_duration();
		$data["doctorlist"] = $this->Patient_model->get_doctor();
		$data["ogldlist"] = $this->Patient_model->get_ogld();
		$data["insulinlist"] = $this->Patient_model->get_insuln();
		$data["countpatient"] = $this->Patient_model->get_countpatient($session_data['center_id']);

		$data["prscrpform"] = 'patient/prescriptions';

		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('addpatient', $data);
     }

     public function new_patient_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'pcode', 'label'   => 'Patient Code', 'rules'   => 'trim|xss_clean|is_unique[patients.patient_code]|required'),
				array('field'   => 'age', 'label'   => 'Age', 'rules'   => 'trim|xss_clean|min_length[1]|max_length[3]|required|numeric'),
				array('field'   => 'division', 'label'   => 'Division', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'phone', 'label'   => 'Phone', 'rules'   => 'trim|xss_clean|required|min_length[11]|max_length[11]|numeric|is_unique[patients.phone]'),
				array('field'   => 'gender', 'label'   => 'Gender', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'district', 'label'   => 'District', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'email', 'label'   => 'email id', 'rules'   => 'trim|xss_clean|valid_email'),
				array('field'   => 'paddeddate', 'label'   => 'Added Date', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				
				//Setting values for tabel columns
				$data = array(					
					'center_id'=>$session_data['center_id'],
					'created_by'=>$session_data['id'],
					'patient_code'=>$this->input->post('pcode'),
					'patient_name'=>$this->input->post('name'),
					'gender'=>$this->input->post('gender'),
					'dob'=>$this->input->post('dob'),
					'age'=>$this->input->post('age'),
					'dm_duration'=>$this->input->post('dm_status'),
					'division_id'=>$this->input->post('division'),
					'district_id'=>$this->input->post('district'),
					'thana'=>$this->input->post('thana'),
					'address'=>$this->input->post('address'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'expenditure'=>$this->input->post('expenditure'),
					'profession'=>$this->input->post('profession'),
					'number_of_child'=>$this->input->post('children'),
					'patient_book_number'=>$this->input->post('book_no'),
					'type_of_diabetes'=>$this->input->post('type_of_diabetes'),
					'nid'=>$this->input->post('nid'),
					'smoking'=>$this->input->post('smoking'),
					'family_history'=>$this->input->post('familyhistry'),
					'created_datetime'=>$this->input->post('paddeddate'),
				);
				//Transfering data to Model
				$id = $this->Patient_model->patient_insert($data);				
				
				/*$patient_code = $session_data['center_id'].'-'.$id.'-'.date('mY');				
				$data2 = array(				
							'patient_code' => $patient_code,
						);
				$this->Patient_model->patient_update($id,$data2);*/				
				
				echo $errors_array.'Patient Added Successfully '.$id;
				//echo $id;

				/*if(!empty($id)){
					redirect('auth');
				}*/
				/*echo $errors_array.$id;	*/			
			
		}
	}

	function patientedit($id){
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
			'center_id' => $session_data['center_id'],
			'page' => 'Prescription',				
			);
		$data["metadata"] = $metadata;
		$data["editpatient_database"] = 'patient/edit_patient_data/'.$id;
        $data["divisionlist"] = $this->Patient_model->get_division();
        $data["explist"] = $this->Patient_model->get_expnditure();
        $data["profesionlist"] = $this->Patient_model->get_profesion();
        $data["diabetestypelist"] = $this->Patient_model->get_typeofdiabetes();
        $data["dmstatuslist"] = $this->Patient_model->get_dm_duration();
		$data["doctorlist"] = $this->Patient_model->get_doctor();
		$data["ogldlist"] = $this->Patient_model->get_ogld();
		$data["insulinlist"] = $this->Patient_model->get_insuln();
		$data["countpatient"] = $this->Patient_model->get_countpatient($session_data['center_id']);
		$data["patientinfo"] = $this->Patient_model->get_patientDetail($id);
		/*print_r($data["patientinfo"] );exit;*/
		$data["prscrpform"] = 'patient/prescriptions';

		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('editpatient', $data);
     }

     public function edit_patient_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
               	
				array('field'   => 'age', 'label'   => 'Age', 'rules'   => 'trim|xss_clean|min_length[1]|max_length[3]|required|numeric'),
				array('field'   => 'division', 'label'   => 'Division', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'gender', 'label'   => 'Gender', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'district', 'label'   => 'District', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'email', 'label'   => 'email id', 'rules'   => 'trim|xss_clean|valid_email'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				
				//Setting values for tabel columns
				$data = array(					
					'patient_name'=>$this->input->post('name'),
					'gender'=>$this->input->post('gender'),
					'dob'=>$this->input->post('dob'),
					'age'=>$this->input->post('age'),
					'dm_duration'=>$this->input->post('dm_status'),
					'division_id'=>$this->input->post('division'),
					'district_id'=>$this->input->post('district'),
					'thana'=>$this->input->post('thana'),
					'address'=>$this->input->post('address'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'expenditure'=>$this->input->post('expenditure'),
					'profession'=>$this->input->post('profession'),
					'number_of_child'=>$this->input->post('children'),
					'patient_book_number'=>$this->input->post('book_no'),
					'type_of_diabetes'=>$this->input->post('type_of_diabetes'),
					'nid'=>$this->input->post('nid'),
					'smoking'=>$this->input->post('smoking'),
					'family_history'=>$this->input->post('familyhistry'),
				);
				//Transfering data to Model
				$this->Patient_model->patient_update($id,$data);			
				
				/*$patient_code = $session_data['center_id'].'-'.$id.'-'.date('mY');				
				$data2 = array(				
							'patient_code' => $patient_code,
						);
				$this->Patient_model->patient_update($id,$data2);*/				
				
				echo $errors_array.'Update Successfully';
				//echo $id;

				/*if(!empty($id)){
					redirect('auth');
				}*/
				/*echo $errors_array.$id;	*/			
			
		}
	}

	/*--- prescriptions ----*/
	function prescriptions($id){
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
			'center_id' => $session_data['center_id'],
			'page' => 'Prescription',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'patient/new_patient_data';
		$data["save_atd"] = 'patient/atd_save';
		$data["edit_atd"] = 'patient/atd_edit';
		$data["save_5yr"] = 'patient/fiveyr_save';
		$data["edit_5yr"] = 'patient/fiveyr_edit';
		$data["save_v1"] = 'patient/visit1_save';
		$data["edit_v1"] = 'patient/visit1_edite';
		$data["edit_v2"] = 'patient/visit2_edite';
        $data["divisionlist"] = $this->Patient_model->get_division();
		$data["doctorlist"] = $this->Patient_model->get_doctor();
		$data["ogldlist"] = $this->Patient_model->get_ogld();
		$data["insulinlist"] = $this->Patient_model->get_insuln();
		$data["countpatient"] = $this->Patient_model->get_countpatient($session_data['center_id']);

		$data["patientinfo"] = $this->Patient_model->get_patientDetail($id);
		$ptcode = $data["patientinfo"]->patient_code;
		$data["attime"] = $this->Patient_model->get_patientAtTime($ptcode);
		$data["fiveyrinfo"] = $this->Patient_model->get_patient5yr($ptcode);
		$data["visit1info"] = $this->Patient_model->get_patientVisit1($ptcode);
		$data["visit2info"] = $this->Patient_model->get_patientVisit2($ptcode);

		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('addprescription', $data);
     }




	/*==== Save AT TIME OF DIAGNOSIS ====*/
	public function atd_save(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'vdate', 'label'   => 'Visiting Date', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'pcode1', 'label'   => 'Patient Code', 'rules'   => 'trim|xss_clean|required'),				
				array('field'   => 'atd_height', 'label'   => 'Height', 'rules'   => 'trim|xss_clean|numeric'),
				array('field'   => 'atd_weight', 'label'   => 'Weight', 'rules'   => 'trim|xss_clean|numeric'),
				array('field'   => 'atd_sbp', 'label'   => 'SBP', 'rules'   => 'trim|xss_clean|numeric'),
				array('field'   => 'atd_dbp', 'label'   => 'DBP', 'rules'   => 'trim|xss_clean|numeric|less_than['.$this->input->post('atd_sbp').']'),
				array('field'   => 'atd_hip', 'label'   => 'HIP', 'rules'   => 'trim|xss_clean|numeric'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				//Setting values for tabel columns
				$data = array(					
					/*'pt_id'=>'79-38-19092019',*/
					'pt_id'=>$this->input->post('pcode1'),
			        'visit_id'=>1,
			        'center_id'=>$session_data['center_id'],
			        'doctor_id'=>$this->input->post('atd_doctorid'),
			        'chk_date'=> date("Y-m-d", strtotime($this->input->post('vdate'))),
			        'height'=>$this->input->post('atd_height'),
			        'weight'=>$this->input->post('atd_weight'),
			        'bmi'=>$this->input->post('atd_bmi'),
			        'waist'=>$this->input->post('atd_waist'),
			        'hip'=>$this->input->post('atd_hip'),
			        'waist_hip_ratio'=>$this->input->post('atd_waist_hip_ratio'),
			        'sbp'=>$this->input->post('atd_sbp'),
			        'dbp'=>$this->input->post('atd_dbp'),
			        'fpg'=>$this->input->post('atd_fpg'),
			        'tohpg_post'=>$this->input->post('atd_tohpg'),
			        'treatment'=>$this->input->post('treatment_atd'),
			        'aceton'=>$this->input->post('atd_aceton'),
			        'rbs'=>$this->input->post('atd_rbs'),
			        's_creatinine'=>$this->input->post('atd_s_creatinine'),
			        'hba1c'=>$this->input->post('atd_hba1c'),
			        'urine_albumin'=>$this->input->post('atd_urine_albumin'),			        
			        'hypoglycaemia'=>($this->input->post('atd_hypoglycaemia'))?1:'0',
			        'chol'=>$this->input->post('atd_chol'),
			        'ldl_c'=>$this->input->post('atd_ldl_c'),
			        'hdl_c'=>$this->input->post('atd_hdl_c'),
			        'triglycerides'=>$this->input->post('atd_triglycerides'),
			        'heat'=>($this->input->post('atd_heat'))?1:'0',
			        'htn'=>($this->input->post('atd_htn'))?1:'0',
			        'stroke'=>($this->input->post('atd_stroke'))?1:'0',
			        'neuropathy'=>($this->input->post('atd_neuopathy'))?1:'0',
			        'retinopathy'=>($this->input->post('atd_retinopathy'))?1:'0',
			        'hhns'=>($this->input->post('atd_hhns'))?1:'0',
			        'ckd'=>($this->input->post('atd_ckd'))?1:'0',
			        'dka'=>($this->input->post('atd_dka'))?1:'0',
			        'foot_complication'=>($this->input->post('atd_foot_complication'))?1:'0',
			        'pvd'=>($this->input->post('atd_pvd'))?1:'0',
			        'skin'=>($this->input->post('atd_skin'))?1:'0',
			        'gastro'=>($this->input->post('atd_gastro'))?1:'0',
			        'ogld_status'=>$this->input->post('prev_ogldusag'),
			        'insulin_status'=>$this->input->post('insulin_usag12'),			        
			        'payment_status'=>$this->input->post('payment_status'),
			        'created_by'=>$session_data['id'],
					'created_datetime'=>date('Y-m-d H:i:00')
				);
				//Transfering data to Model
				$id = $this->Patient_model->atd_insert($data);

				$number1 = count($_POST["basal1"]);
		        if($number1 > 0){

		        	for($i=0; $i<$number1; $i++){
		        		$insulinid=explode(':', $_POST['basal1'][$i]);
				        $basalvalue = $insulinid[1];
		        		if($basalvalue!='0')
				        {
				        	$insulin=array(
				                'patient_id'=>$this->input->post('pcode1'),
				        		'pc_id'=>$id,
				        		'center_id'=>$session_data['center_id'],
				        		'doctor_id'=>$this->input->post('atd_doctorid'),
				        		'visit_id'=>1,
				                'insulin_type'=>$this->input->post('insulintype1'),
				                'chk_date'=>date("Y-m-d", strtotime($this->input->post('vdate'))),
				                'insulin_id'=>$basalvalue,
				                'dose_morning'=>$_POST['basaldm1'][$i],
				                'dose_noon'=>$_POST['basaldn1'][$i],
				                'dose_night'=>$_POST['basaldt1'][$i],
				                'dose_bed'=>$_POST["basalbed1"][$i],
				        		'created_by'=>$session_data['id'],
					    		'created_datetime'=>date('Y-m-d H:i:00')
							);
				        	$this->Patient_model->atd_insulin_insert($insulin);
				        }
		        	}
		        }

		        $ci=1;
		        $co=0;
		        $ogldcount=count($_POST['ogld1']);
		        if($ogldcount>0){
			        foreach($_POST['ogld1'] as $ogld)
			        {
			        	$ogld=explode(':', $ogld);
			        	if(isset($ogld[2]) && $ogld[2]!='')
			        	{
			        		$pr_bf = $_POST['crnt_og_bf1'][$co];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['crnt_og_bf1'][$co];
			        		}
			        		$pr_lnc = $_POST['crnt_og_lunch1'][$co];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['crnt_og_lunch1'][$co];
			        		}
			        		$pr_dnr = $_POST['crnt_og_dinner1'][$co];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['crnt_og_dinner1'][$co];
			        		}
			        		$pr_bt = $_POST['crnt_og_bt1'][$co];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['crnt_og_bt1'][$co];
			        		}

			        		$ogld=array(
			        		'patient_id'=>$this->input->post('pcode1'),
			        		'pc_id'=>$id,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('atd_doctorid'),
			        		'visit_id'=>1,
			                'chk_date'=>date("Y-m-d", strtotime($this->input->post('vdate'))),
			                'ogld_id'=>(isset($ogld[2]))?$ogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	  $this->Patient_model->atd_ogld_insert($ogld);
			        	}
			        	
			        	$ci++;
			        	$co++;
			        }
		        }		

				/*for($count = 0; $count < count($_POST["insln12_name"]); $count++){
					$mdcndata = array(
						'patient_id'=>$this->input->post('pcode1'),
		        		'pc_id'=>$id,
		        		'center_id'=>$session_data['center_id'],
		        		'doctor_id'=>$this->input->post('atd_doctorid'),
		        		'visit_id'=>$this->input->post('visit_id'),
		                'insulin_type'=>'basal',
		                'chk_date'=>date('Y-m-d'),
		                'insulin_id'=>$_POST["insln12_name"][$count],
		                'dose_morning'=>$_POST["ins_bf12"][$count],
		                'dose_noon'=>$_POST["ins_lunch12"][$count],
		                'dose_night'=>$_POST["ins_dinner12"][$count],
		                'dose_bed'=>$_POST["ins_bt12"][$count],
		        		'created_by'=>$session_data['id'],
					    'created_datetime'=>date('Y-m-d H:i:00')
					);
					$this->Patient_model->atd_insulin_insert($mdcndata);
				}

				for($countogld = 0; $countogld < count($_POST["ogld12_name"]); $countogld++){
					$oglddata = array(
						'patient_id'=>$this->input->post('pcode1'),
		        		'pc_id'=>$id,
		        		'center_id'=>$session_data['center_id'],
		        		'doctor_id'=>$this->input->post('atd_doctorid'),
		        		'visit_id'=>$this->input->post('visit_id'),
		                'chk_date'=>date('Y-m-d'),		                
		                'ogld_id'=>$_POST["ogld12_name"][$countogld],
	                	'dosage'=>$_POST["og_dosage12"][$countogld],
		        		'created_by'=>$session_data['id'],
					    'created_datetime'=>date('Y-m-d H:i:00')
					);
					$this->Patient_model->atd_ogld_insert($oglddata);
				}*/			
							
				
				echo $errors_array.'Added Successfully';					
			
		}
	}

	/*==== Edit ATD visit ====*/
	public function atd_edit(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		$pcid = $this->input->post('pc_id1');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'vdate', 'label'   => 'Visiting Date', 'rules'   => 'trim|xss_clean|required'),
				
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				//Setting values for tabel columns
				$data = array(
			        'doctor_id'=>$this->input->post('atd_doctorid'),
			        'chk_date'=> date("Y-m-d", strtotime($this->input->post('vdate'))),
			        'height'=>$this->input->post('atd_height'),
			        'weight'=>$this->input->post('atd_weight'),
			        'bmi'=>$this->input->post('atd_bmi'),
			        'waist'=>$this->input->post('atd_waist'),
			        'hip'=>$this->input->post('atd_hip'),
			        'waist_hip_ratio'=>$this->input->post('atd_waist_hip_ratio'),
			        'sbp'=>$this->input->post('atd_sbp'),
			        'dbp'=>$this->input->post('atd_dbp'),
			        'fpg'=>$this->input->post('atd_fpg'),
			        'tohpg_post'=>$this->input->post('atd_tohpg'),
			        'treatment'=>$this->input->post('treatment_atd'),
			        'aceton'=>$this->input->post('atd_aceton'),
			        'rbs'=>$this->input->post('atd_rbs'),
			        's_creatinine'=>$this->input->post('atd_s_creatinine'),
			        'hba1c'=>$this->input->post('atd_hba1c'),
			        'urine_albumin'=>$this->input->post('atd_urine_albumin'),			        
			        'hypoglycaemia'=>($this->input->post('atd_hypoglycaemia'))?1:'0',
			        'chol'=>$this->input->post('atd_chol'),
			        'ldl_c'=>$this->input->post('atd_ldl_c'),
			        'hdl_c'=>$this->input->post('atd_hdl_c'),
			        'triglycerides'=>$this->input->post('atd_triglycerides'),
			        'heat'=>($this->input->post('atd_heat'))?1:'0',
			        'htn'=>($this->input->post('atd_htn'))?1:'0',
			        'stroke'=>($this->input->post('atd_stroke'))?1:'0',
			        'neuropathy'=>($this->input->post('atd_neuopathy'))?1:'0',
			        'retinopathy'=>($this->input->post('atd_retinopathy'))?1:'0',
			        'hhns'=>($this->input->post('atd_hhns'))?1:'0',
			        'ckd'=>($this->input->post('atd_ckd'))?1:'0',
			        'dka'=>($this->input->post('atd_dka'))?1:'0',
			        'foot_complication'=>($this->input->post('atd_foot_complication'))?1:'0',
			        'pvd'=>($this->input->post('atd_pvd'))?1:'0',
			        'skin'=>($this->input->post('atd_skin'))?1:'0',
			        'gastro'=>($this->input->post('atd_gastro'))?1:'0',
			        'ogld_status'=>$this->input->post('prev_ogldusag'),
			        'insulin_status'=>$this->input->post('insulin_usag12'),
				);
				//Transfering data to Model
				$this->Patient_model->prescriptions_update($pcid, $data);	

				
			    $this->Patient_model->deleteBycon('prescription_insulin',$pcid,'pc_id');
				$number1 = count($_POST["basal1"]);
		        if($number1 > 0){

		        	for($i=0; $i<$number1; $i++){
		        		$insulinid=explode(':', $_POST['basal1'][$i]);
				        $basalvalue = $insulinid[1];
		        		if($basalvalue!='0')
				        {
				        	$insulin=array(
				                'patient_id'=>$this->input->post('pcode1'),
				        		'pc_id'=> $pcid,
				        		'center_id'=>$session_data['center_id'],
				        		'doctor_id'=>$this->input->post('atd_doctorid'),
				        		'visit_id'=>1,
				                'insulin_type'=>$this->input->post('insulintype_atd'),
				                'chk_date'=>date("Y-m-d", strtotime($this->input->post('vdate'))),
				                'insulin_id'=>$basalvalue,
				                'dose_morning'=>$_POST['basaldm1'][$i],
				                'dose_noon'=>$_POST['basaldn1'][$i],
				                'dose_night'=>$_POST['basaldt1'][$i],
				                'dose_bed'=>$_POST["basalbed1"][$i],
				        		'created_by'=>$session_data['id'],
					    		'created_datetime'=>date('Y-m-d H:i:00')
							);
				        	$this->Patient_model->atd_insulin_insert($insulin);
				        }
		        	}
		        }

				$this->Patient_model->deleteBycon('prescription_ogld',$pcid,'pc_id');
				$ci=1;
		        $co=0;
		        $ogldcount=count($_POST['ogld1']);
		        if($ogldcount>0){
			        foreach($_POST['ogld1'] as $ogld)
			        {
			        	$ogld=explode(':', $ogld);
			        	if(isset($ogld[2]) && $ogld[2]!='')
			        	{
			        		$pr_bf = $_POST['crnt_og_bf1'][$co];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['crnt_og_bf1'][$co];
			        		}
			        		$pr_lnc = $_POST['crnt_og_lunch1'][$co];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['crnt_og_lunch1'][$co];
			        		}
			        		$pr_dnr = $_POST['crnt_og_dinner1'][$co];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['crnt_og_dinner1'][$co];
			        		}
			        		$pr_bt = $_POST['crnt_og_bt1'][$co];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['crnt_og_bt1'][$co];
			        		}

			        		$ogld=array(
			        		'patient_id'=>$this->input->post('pcode1'),
			        		'pc_id'=>$pcid,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid1'),
			        		'visit_id'=>1,
			                'chk_date'=>date("Y-m-d", strtotime($this->input->post('vdate'))),
			                'ogld_id'=>(isset($ogld[2]))?$ogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	  $this->Patient_model->atd_ogld_insert($ogld);
			        	}
			        	
			        	$ci++;
			        	$co++;
			        }
		        }	
							
				
				echo $errors_array.'ATD Update Successfully';					
			
		}
	}




	/*==== Save 5 years of diagonosis ====*/
	public function fiveyr_save(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'vdate2', 'label'   => 'Visiting Date', 'rules'   => 'trim|xss_clean|required'),
               	/*array('field'   => 'pcode2', 'label'   => 'Patient Code', 'rules'   => 'trim|xss_clean|required'),*/				
				array('field'   => 'atd_height2', 'label'   => 'Height', 'rules'   => 'trim|xss_clean|numeric|required'),
				array('field'   => 'atd_weight2', 'label'   => 'Weight', 'rules'   => 'trim|xss_clean|numeric|required'),
				array('field'   => 'atd_sbp2', 'label'   => 'SBP', 'rules'   => 'trim|xss_clean|numeric|required'),
				array('field'   => 'atd_dbp2', 'label'   => 'DBP', 'rules'   => 'trim|xss_clean|numeric|required|less_than['.$this->input->post('atd_sbp2').']'),
				array('field'   => 'atd_hip2', 'label'   => 'HIP', 'rules'   => 'trim|xss_clean|numeric|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				//Setting values for tabel columns
				$data = array(					
					/*'pt_id'=>'79-38-19092019',*/
					'pt_id'=>$this->input->post('pcode2'),
			        'visit_id'=>2,
			        'center_id'=>$session_data['center_id'],
			        'doctor_id'=>$this->input->post('atd_doctorid2'),
			        'chk_date'=> date("Y-m-d", strtotime($this->input->post('vdate2'))),
			        'height'=>$this->input->post('atd_height2'),
			        'weight'=>$this->input->post('atd_weight2'),
			        'bmi'=>$this->input->post('atd_bmi2'),
			        'waist'=>$this->input->post('atd_waist2'),
			        'hip'=>$this->input->post('atd_hip2'),
			        'waist_hip_ratio'=>$this->input->post('atd_waist_hip_ratio2'),
			        'sbp'=>$this->input->post('atd_sbp2'),
			        'dbp'=>$this->input->post('atd_dbp2'),
			        'fpg'=>$this->input->post('atd_fpg2'),
			        'tohpg_post'=>$this->input->post('atd_tohpg2'),
			        /*'insulintype'=>$post['insulintype'.$vid],*/
			        'treatment'=>$this->input->post('prev_treatment32'),
			        'aceton'=>$this->input->post('atd_aceton2'),
			        'rbs'=>$this->input->post('atd_rbs2'),
			        's_creatinine'=>$this->input->post('atd_s_creatinine2'),
			        'hba1c'=>$this->input->post('atd_hba1c2'),
			        'urine_albumin'=>$this->input->post('atd_urine_albumin2'),			        
			        'hypoglycaemia'=>($this->input->post('atd_hypoglycaemia2'))?1:'0',
			        'chol'=>$this->input->post('atd_chol2'),
			        'ldl_c'=>$this->input->post('atd_ldl_c2'),
			        'hdl_c'=>$this->input->post('atd_hdl_c2'),
			        'triglycerides'=>$this->input->post('atd_triglycerides2'),
			        'heat'=>($this->input->post('atd_heat2'))?1:'0',
			        'htn'=>($this->input->post('atd_htn2'))?1:'0',
			        'stroke'=>($this->input->post('atd_stroke2'))?1:'0',
			        'neuropathy'=>($this->input->post('atd_neuopathy2'))?1:'0',
			        'retinopathy'=>($this->input->post('atd_retinopathy2'))?1:'0',
			        'hhns'=>($this->input->post('atd_hhns2'))?1:'0',
			        'ckd'=>($this->input->post('atd_ckd2'))?1:'0',
			        'dka'=>($this->input->post('atd_dka2'))?1:'0',
			        'foot_complication'=>($this->input->post('atd_foot_complication2'))?1:'0',
			        'pvd'=>($this->input->post('atd_pvd2'))?1:'0',
			        'skin'=>($this->input->post('atd_skin2'))?1:'0',
			        'gastro'=>($this->input->post('atd_gastro2'))?1:'0',
			        'ogld_status'=>$this->input->post('prev_ogldusag2'),
			        'insulin_status'=>$this->input->post('insulin_usag122'),			        
			        'payment_status'=>$this->input->post('payment_status2'),
			        'created_by'=>$session_data['id'],
					'created_datetime'=>date('Y-m-d H:i:00')
				);
				//Transfering data to Model
				$id = $this->Patient_model->atd_insert($data);	

				$number1 = count($_POST["basal2"]);
		        if($number1 > 0){

		        	for($i=0; $i<$number1; $i++){
		        		$insulinid=explode(':', $_POST['basal2'][$i]);
				        $basalvalue = $insulinid[1];
		        		if($basalvalue!='0')
				        {
				        	$insulin=array(
				                'patient_id'=>$this->input->post('pcode2'),
				        		'pc_id'=>$id,
				        		'center_id'=>$session_data['center_id'],
				        		'doctor_id'=>$this->input->post('atd_doctorid2'),
				        		'visit_id'=>2,
				                'insulin_type'=>$this->input->post('prev_insulintype32'),
				                'chk_date'=>date("Y-m-d", strtotime($this->input->post('vdate2'))),
				                'insulin_id'=>$basalvalue,
				                'dose_morning'=>$_POST['basaldm2'][$i],
				                'dose_noon'=>$_POST['basaldn2'][$i],
				                'dose_night'=>$_POST['basaldt2'][$i],
				                'dose_bed'=>$_POST["basalbed2"][$i],
				        		'created_by'=>$session_data['id'],
					    		'created_datetime'=>date('Y-m-d H:i:00')
							);
				        	$this->Patient_model->atd_insulin_insert($insulin);
				        }
		        	}
		        }

		        $ci=1;
		        $co=0;
		        $ogldcount=count($_POST['ogld2']);
		        if($ogldcount>0){
			        foreach($_POST['ogld2'] as $ogld)
			        {
			        	$ogld=explode(':', $ogld);
			        	if(isset($ogld[2]) && $ogld[2]!='')
			        	{
			        		$pr_bf = $_POST['crnt_og_bf2'][$co];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['crnt_og_bf2'][$co];
			        		}
			        		$pr_lnc = $_POST['crnt_og_lunch2'][$co];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['crnt_og_lunch2'][$co];
			        		}
			        		$pr_dnr = $_POST['crnt_og_dinner2'][$co];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['crnt_og_dinner2'][$co];
			        		}
			        		$pr_bt = $_POST['crnt_og_bt2'][$co];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['crnt_og_bt2'][$co];
			        		}

			        		$ogld=array(
			        		'patient_id'=>$this->input->post('pcode2'),
			        		'pc_id'=>$id,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('atd_doctorid2'),
			        		'visit_id'=>2,
			                'chk_date'=>date("Y-m-d", strtotime($this->input->post('vdate2'))),
			                'ogld_id'=>(isset($ogld[2]))?$ogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	  $this->Patient_model->atd_ogld_insert($ogld);
			        	}
			        	
			        	$ci++;
			        	$co++;
			        }
		        }		

				/*for($count = 0; $count < count($_POST["insln122_name"]); $count++){
					$mdcndata = array(
						'patient_id'=>$this->input->post('pcode2'),
		        		'pc_id'=>$id,
		        		'center_id'=>$session_data['center_id'],
		        		'doctor_id'=>$this->input->post('atd_doctorid2'),
		        		'visit_id'=>2,
		                'insulin_type'=>'basal',
		                'chk_date'=>date('Y-m-d'),
		                'insulin_id'=>$_POST["insln122_name"][$count],
		                'dose_morning'=>$_POST["ins_bf122"][$count],
		                'dose_noon'=>$_POST["ins_lunch122"][$count],
		                'dose_night'=>$_POST["ins_dinner122"][$count],
		                'dose_bed'=>$_POST["ins_bt122"][$count],
		        		'created_by'=>$session_data['id'],
					    'created_datetime'=>date('Y-m-d H:i:00')
					);
					$this->Patient_model->atd_insulin_insert($mdcndata);
				}

				for($countogld = 0; $countogld < count($_POST["ogld122_name"]); $countogld++){
					$oglddata = array(
						'patient_id'=>$this->input->post('pcode2'),
		        		'pc_id'=>$id,
		        		'center_id'=>$session_data['center_id'],
		        		'doctor_id'=>$this->input->post('atd_doctorid2'),
		        		'visit_id'=>2,
		                'chk_date'=>date('Y-m-d'),		                
		                'ogld_id'=>$_POST["ogld122_name"][$countogld],
	                	'dosage'=>$_POST["og_dosage122"][$countogld],
		        		'created_by'=>$session_data['id'],
					    'created_datetime'=>date('Y-m-d H:i:00')
					);
					$this->Patient_model->atd_ogld_insert($oglddata);
				}*/			
							
				
				echo $errors_array.'Added Successfully';					
			
		}
	}

	/*==== Edit 5yr visit ====*/
	public function fiveyr_edit(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		$pcid = $this->input->post('pc_id2');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'vdate2', 'label'   => 'Visiting Date', 'rules'   => 'trim|xss_clean|required'),
				
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				//Setting values for tabel columns
				$data = array(
			        'doctor_id'=>$this->input->post('atd_doctorid2'),
			        'chk_date'=> date("Y-m-d", strtotime($this->input->post('vdate2'))),
			        'height'=>$this->input->post('atd_height2'),
			        'weight'=>$this->input->post('atd_weight2'),
			        'bmi'=>$this->input->post('atd_bmi2'),
			        'waist'=>$this->input->post('atd_waist2'),
			        'hip'=>$this->input->post('atd_hip2'),
			        'waist_hip_ratio'=>$this->input->post('atd_waist_hip_ratio2'),
			        'sbp'=>$this->input->post('atd_sbp2'),
			        'dbp'=>$this->input->post('atd_dbp2'),
			        'fpg'=>$this->input->post('atd_fpg2'),
			        'tohpg_post'=>$this->input->post('atd_tohpg2'),
			        'treatment'=>$this->input->post('treatment_atd2'),
			        'aceton'=>$this->input->post('atd_aceton2'),
			        'rbs'=>$this->input->post('atd_rbs2'),
			        's_creatinine'=>$this->input->post('atd_s_creatinine2'),
			        'hba1c'=>$this->input->post('atd_hba1c2'),
			        'urine_albumin'=>$this->input->post('atd_urine_albumin2'),			        
			        'hypoglycaemia'=>($this->input->post('atd_hypoglycaemia2'))?1:'0',
			        'chol'=>$this->input->post('atd_chol2'),
			        'ldl_c'=>$this->input->post('atd_ldl_c2'),
			        'hdl_c'=>$this->input->post('atd_hdl_c2'),
			        'triglycerides'=>$this->input->post('atd_triglycerides2'),
			        'heat'=>($this->input->post('atd_heat2'))?1:'0',
			        'htn'=>($this->input->post('atd_htn2'))?1:'0',
			        'stroke'=>($this->input->post('atd_stroke2'))?1:'0',
			        'neuropathy'=>($this->input->post('atd_neuopathy2'))?1:'0',
			        'retinopathy'=>($this->input->post('atd_retinopathy2'))?1:'0',
			        'hhns'=>($this->input->post('atd_hhns2'))?1:'0',
			        'ckd'=>($this->input->post('atd_ckd2'))?1:'0',
			        'dka'=>($this->input->post('atd_dka2'))?1:'0',
			        'foot_complication'=>($this->input->post('atd_foot_complication2'))?1:'0',
			        'pvd'=>($this->input->post('atd_pvd2'))?1:'0',
			        'skin'=>($this->input->post('atd_skin2'))?1:'0',
			        'gastro'=>($this->input->post('atd_gastro2'))?1:'0',
			        'ogld_status'=>$this->input->post('prev_ogldusag2'),
			        'insulin_status'=>$this->input->post('insulin_usag2'),
				);
				//Transfering data to Model
				$this->Patient_model->prescriptions_update($pcid, $data);	

				
			    $this->Patient_model->deleteBycon('prescription_insulin',$pcid,'pc_id');
				$number1 = count($_POST["basal2"]);
		        if($number1 > 0){

		        	for($i=0; $i<$number1; $i++){
		        		$insulinid=explode(':', $_POST['basal2'][$i]);
				        $basalvalue = $insulinid[1];
		        		if($basalvalue!='0')
				        {
				        	$insulin=array(
				                'patient_id'=>$this->input->post('pcode2'),
				        		'pc_id'=> $pcid,
				        		'center_id'=>$session_data['center_id'],
				        		'doctor_id'=>$this->input->post('atd_doctorid2'),
				        		'visit_id'=>2,
				                'insulin_type'=>$this->input->post('insulintype_atd2'),
				                'chk_date'=>date("Y-m-d", strtotime($this->input->post('vdate2'))),
				                'insulin_id'=>$basalvalue,
				                'dose_morning'=>$_POST['basaldm2'][$i],
				                'dose_noon'=>$_POST['basaldn2'][$i],
				                'dose_night'=>$_POST['basaldt2'][$i],
				                'dose_bed'=>$_POST["basalbed2"][$i],
				        		'created_by'=>$session_data['id'],
					    		'created_datetime'=>date('Y-m-d H:i:00')
							);
				        	$this->Patient_model->atd_insulin_insert($insulin);
				        }
		        	}
		        }

				$this->Patient_model->deleteBycon('prescription_ogld',$pcid,'pc_id');
				$ci=1;
		        $co=0;
		        $ogldcount=count($_POST['ogld2']);
		        if($ogldcount>0){
			        foreach($_POST['ogld2'] as $ogld)
			        {
			        	$ogld=explode(':', $ogld);
			        	if(isset($ogld[2]) && $ogld[2]!='')
			        	{
			        		$pr_bf = $_POST['crnt_og_bf2'][$co];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['crnt_og_bf2'][$co];
			        		}
			        		$pr_lnc = $_POST['crnt_og_lunch2'][$co];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['crnt_og_lunch2'][$co];
			        		}
			        		$pr_dnr = $_POST['crnt_og_dinner2'][$co];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['crnt_og_dinner2'][$co];
			        		}
			        		$pr_bt = $_POST['crnt_og_bt2'][$co];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['crnt_og_bt2'][$co];
			        		}

			        		$ogld=array(
			        		'patient_id'=>$this->input->post('pcode2'),
			        		'pc_id'=>$pcid,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid2'),
			        		'visit_id'=>2,
			                'chk_date'=>date("Y-m-d", strtotime($this->input->post('vdate2'))),
			                'ogld_id'=>(isset($ogld[2]))?$ogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	  $this->Patient_model->atd_ogld_insert($ogld);
			        	}
			        	
			        	$ci++;
			        	$co++;
			        }
		        }	
							
				
				echo $errors_array.'5y Update Successfully';					
			
		}
	}


	/*==== Save visit 1 or recrutment visit ====*/
	public function visit1_save(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'vdate3', 'label'   => 'Visiting Date', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'doctorid3', 'label'   => 'Doctor', 'rules'   => 'trim|xss_clean|required'),				
				array('field'   => 'hba1c3', 'label'   => 'HbA1c', 'rules'   => 'trim|xss_clean|numeric|required')
				
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				//Setting values for tabel columns
				$data = array(					
					/*'pt_id'=>'79-38-19092019',*/
					'pt_id'=>$this->input->post('pcode3'),
			        'visit_id'=>3,
			        'center_id'=>$session_data['center_id'],
			        'doctor_id'=>$this->input->post('doctorid3'),
			        'chk_date'=> date("Y-m-d", strtotime($this->input->post('vdate3'))),
			        'physical_minute'=>$this->input->post('physical3'),
					'physical_day'=>$this->input->post('dayp3'),
					'vegetable_minute'=>$this->input->post('vegetables3'),
					'vegetable_day'=>$this->input->post('dayv3'),
					'fruit_minute'=>$this->input->post('fruits3'),
					'fruit_day'=>$this->input->post('dayf3'),

			        'height'=>$this->input->post('height3'),
			        'weight'=>$this->input->post('weight3'),
			        'bmi'=>$this->input->post('bmi3'),
			        'waist'=>$this->input->post('waist3'),
			        'hip'=>$this->input->post('hip3'),
			        'waist_hip_ratio'=>$this->input->post('waist_hip_ratio3'),
			        'sbp'=>$this->input->post('sbp3'),
			        'dbp'=>$this->input->post('dbp3'),

			        'fpg'=>$this->input->post('fpg3'),
			        'tohpg_post'=>$this->input->post('tohpg3'),
			        /*'insulintype'=>$post['insulintype'.$vid],*/
			        'treatment'=>$this->input->post('treatment3'),
			        'treatment_pre'=>$this->input->post('prev_treatment'),
			        'aceton'=>$this->input->post('aceton3'),
			        'rbs'=>$this->input->post('rbs3'),
			        's_creatinine'=>$this->input->post('s_creatinine3'),
			        'hba1c'=>$this->input->post('hba1c3'),
			        'urine_albumin'=>$this->input->post('urine_albumin3'),			        
			        'hypoglycaemia'=>($this->input->post('hypoglycaemia3'))?1:'0',
			        'chol'=>$this->input->post('chol3'),
			        'ldl_c'=>$this->input->post('ldl_c3'),
			        'hdl_c'=>$this->input->post('hdl_c3'),
			        'triglycerides'=>$this->input->post('triglycerides3'),
			        'heat'=>($this->input->post('heart_disease3'))?1:'0',
			        'htn'=>($this->input->post('htn3'))?1:'0',
			        'stroke'=>($this->input->post('stroke3'))?1:'0',
			        'neuropathy'=>($this->input->post('neuopathy3'))?1:'0',
			        'retinopathy'=>($this->input->post('retinpathy3'))?1:'0',
			        'hhns'=>($this->input->post('hhns3'))?1:'0',
			        'ckd'=>($this->input->post('ckd3'))?1:'0',
			        'dka'=>($this->input->post('dka3'))?1:'0',
			        'foot_complication'=>($this->input->post('foot_complication3'))?1:'0',
			        'pvd'=>($this->input->post('pvd3'))?1:'0',
			        'skin'=>($this->input->post('skin_disease3'))?1:'0',
			        'gastro'=>($this->input->post('gastro_complication3'))?1:'0',
			        'ogld_status'=>$this->input->post('ogld3'),
			        'ogld_status_pre'=>$this->input->post('prev_ogld3'),
			        'insulin_status'=>$this->input->post('insulin3'),
			        'insulin_status_pre'=>$this->input->post('prev_insulin3'),			        
			        'payment_status'=>'free',
			        'created_by'=>$session_data['id'],
					'created_datetime'=>date('Y-m-d H:i:00')
				);
				//Transfering data to Model
				$id = $this->Patient_model->atd_insert($data);	

				/*for($count = 0; $count < count($_POST["insln_name_pre"]); $count++){
					$mdcndata = array(
						'patient_id'=>$this->input->post('pcode3'),
		        		'pc_id'=>$id,
		        		'center_id'=>$session_data['center_id'],
		        		'doctor_id'=>$this->input->post('doctorid3'),
		        		'visit_id'=>3,
		                'insulin_type'=>$this->input->post('prev_insulintype31'),
		                'chk_date'=>date('Y-m-d'),
		                'insulin_id'=>$_POST["insln_name_pre"][$count],
		                'dose_morning'=>$_POST["ins_bf_pre"][$count],
		                'dose_noon'=>$_POST["ins_lunch_pre"][$count],
		                'dose_night'=>$_POST["ins_dinner_pre"][$count],
		                'dose_bed'=>$_POST["ins_bt_pre"][$count],
		        		'created_by'=>$session_data['id'],
					    'created_datetime'=>date('Y-m-d H:i:00')
					);
					$this->Patient_model->pre_insulin_insert($mdcndata);
				}*/

				/*if($_POST['prev_basal3']!='0')
		        {
		        	$insulinidre=explode(':', $post['prev_basal3'][$i]);
		        	$basalvalueid = $insulinidre[1];
		        	if (isset($basalvalueid)) {
		        		$insulin_pre=array(
		                'patient_id'=>$this->input->post('pcode3'),
		        		'pc_id'=>$id,
		        		'center_id'=>$session_data['center_id'],
		        		'doctor_id'=>$this->input->post('doctorid3'),
		        		'visit_id'=>3,
		                'insulin_type'=>$this->input->post('prev_insulintype31'),
		                'chk_date'=>date('Y-m-d'),
		                'insulin_id'=>$basalvalueid,
		                'dose_morning'=>$_POST['prev_basaldm3'][$i],
		                'dose_noon'=>$_POST['prev_basaldn3'][$i],
		                'dose_night'=>$_POST['prev_basaldt3'][$i],
		                'dose_bed'=>$_POST['prev_basalbed3'][$i],
		        		'created_by'=>$session_data['id'],
					    'created_datetime'=>date('Y-m-d H:i:00')
					);
		        	$this->Patient_model->pre_insulin_insert($insulin_pre);
		        	}
		        	
		        }*/

		        $number2 = count($_POST["prev_basal3"]);
	        	if($number2 > 0){

	        	for($i=0; $i<$number2; $i++){

	        		$insulinidre=explode(':', $_POST['prev_basal3'][$i]);
			        $basalvalueid = $insulinidre[1];

			        if (isset($basalvalueid)) {
			        	$insulin_pre=array(
			               'patient_id'=>$this->input->post('pcode3'),
			        		'pc_id'=>$id,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid3'),
			        		'visit_id'=>3,
			                'insulin_type'=>$this->input->post('prev_insulintype31'),
			                'chk_date'=>date('Y-m-d'),
			                'insulin_id'=>$basalvalueid,
			                'dose_morning'=>$_POST['prev_basaldm3'][$i],
			                'dose_noon'=>$_POST['prev_basaldn3'][$i],
			                'dose_night'=>$_POST['prev_basaldt3'][$i],
			                'dose_bed'=>$_POST['prev_basalbed3'][$i],
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	$this->Patient_model->pre_insulin_insert($insulin_pre);
			        }
			        	

			        }
			    }

				/*for($countogld = 0; $countogld < count($_POST["ogld_name_pre"]); $countogld++){
					$oglddata = array(
						'patient_id'=>$this->input->post('pcode3'),
		        		'pc_id'=>$id,
		        		'center_id'=>$session_data['center_id'],
		        		'doctor_id'=>$this->input->post('doctorid3'),
		        		'visit_id'=>3,
		                'chk_date'=>date('Y-m-d'),		                
		                'ogld_id'=>$_POST["ogld_name_pre"][$countogld],
	                	'dosage'=>$_POST["og_dosage_pre"][$countogld],
		        		'created_by'=>$session_data['id'],
					    'created_datetime'=>date('Y-m-d H:i:00')
					);
					$this->Patient_model->pre_ogld_insert($oglddata);
				}	*/
				

				/*for($count = 0; $count < count($_POST["insln_name"]); $count++){
					$mdcndata = array(
						'patient_id'=>$this->input->post('pcode3'),
		        		'pc_id'=>$id,
		        		'center_id'=>$session_data['center_id'],
		        		'doctor_id'=>$this->input->post('doctorid3'),
		        		'visit_id'=>3,
		                'insulin_type'=>$this->input->post('cr_insulintype3'),
		                'chk_date'=>date('Y-m-d'),
		                'insulin_id'=>$_POST["insln_name"][$count],
		                'dose_morning'=>$_POST["ins_bf"][$count],
		                'dose_noon'=>$_POST["ins_bf"][$count],
		                'dose_night'=>$_POST["ins_lunch"][$count],
		                'dose_bed'=>$_POST["ins_dinner"][$count],
		        		'created_by'=>$session_data['id'],
					    'created_datetime'=>date('Y-m-d H:i:00')
					);
					$this->Patient_model->atd_insulin_insert($mdcndata);
				}*/

				$number1 = count($_POST["basal3"]);
		        if($number1 > 0){

		        	for($i=0; $i<$number1; $i++){
		        		$insulinid=explode(':', $_POST['basal3'][$i]);
				        $basalvalue = $insulinid[1];
		        		if($basalvalue!='0')
				        {
				        	$insulin=array(
				                'patient_id'=>$this->input->post('pcode3'),
				        		'pc_id'=>$id,
				        		'center_id'=>$session_data['center_id'],
				        		'doctor_id'=>$this->input->post('doctorid3'),
				        		'visit_id'=>3,
				                'insulin_type'=>$this->input->post('cr_insulintype3'),
				                'chk_date'=>date('Y-m-d'),
				                'insulin_id'=>$basalvalue,
				                'dose_morning'=>$_POST['basaldm3'][$i],
				                'dose_noon'=>$_POST['basaldn3'][$i],
				                'dose_night'=>$_POST['basaldt3'][$i],
				                'dose_bed'=>$_POST["basalbed3"][$i],
				        		'created_by'=>$session_data['id'],
					    		'created_datetime'=>date('Y-m-d H:i:00')
							);
				        	$this->Patient_model->atd_insulin_insert($insulin);
				        }
		        	}
		        }

				/*for($countogld = 0; $countogld < count($_POST["ogld_cr"]); $countogld++){
					$oglddata = array(
						'patient_id'=>$this->input->post('pcode3'),
		        		'pc_id'=>$id,
		        		'center_id'=>$session_data['center_id'],
		        		'doctor_id'=>$this->input->post('doctorid3'),
		        		'visit_id'=>3,
		                'chk_date'=>date('Y-m-d'),		                
		                'ogld_id'=>$_POST["ogld_cr"][$countogld],
	                	'dosage'=>$_POST["ogld_dosagecr"][$countogld],
		        		'created_by'=>$session_data['id'],
					    'created_datetime'=>date('Y-m-d H:i:00')
					);
					$this->Patient_model->atd_ogld_insert($oglddata);
				}*/	

				$ip=1;
	        	$op=0;   
	        	$preogldcount=count($_POST['prev_ogld']);

	        	if($preogldcount>0){
			        foreach($_POST['prev_ogld'] as $preogld)
			        {
			        	$preogld=explode(':', $preogld);
			        	if(isset($preogld[2]) && $preogld[2]!='')
			        	{
			        		$pr_bf = $_POST['pre_og_bf'][$co];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['pre_og_bf'][$co];
			        		}
			        		$pr_lnc = $_POST['pre_og_lunch'][$co];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['pre_og_lunch'][$co];
			        		}
			        		$pr_dnr = $_POST['pre_og_dinner'][$co];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['pre_og_dinner'][$co];
			        		}
			        		$pr_bt = $_POST['pre_og_bt'][$co];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['pre_og_bt'][$co];
			        		}

			        		$preogld=array(
			        		'patient_id'=>$this->input->post('pcode3'),
			        		'pc_id'=>$id,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid3'),
			        		'visit_id'=>3,
			                'chk_date'=>date('Y-m-d'),
			                'ogld_id'=>(isset($preogld[2]))?$preogld[2]:'0',
			                /*'dosage'=>(isset($_POST['pre_og_bf'][$op]))?$_POST['pre_og_bf'][$op]:'0'.'+'.(isset($_POST['pre_og_lunch'][$op]))?$_POST['pre_og_lunch'][$op]:'0'.'+'.(isset($_POST['pre_og_dinner'][$op]))?$_POST['pre_og_dinner'][$op]:'0'.'+'.(isset($_POST['pre_og_bt'][$op]))?$_POST['pre_og_bt'][$op]:'0',*/
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	 $this->Patient_model->pre_ogld_insert($preogld);
			        	}
			        	
			        	$ip++;
			        	$op++;
			        }
		        }




				$ci=1;
		        $co=0;
		        $ogldcount=count($_POST['ogld']);
		        if($ogldcount>0){
			        foreach($_POST['ogld'] as $ogld)
			        {
			        	$ogld=explode(':', $ogld);
			        	if(isset($ogld[2]) && $ogld[2]!='')
			        	{
			        		$pr_bf = $_POST['crnt_og_bf'][$co];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['crnt_og_bf'][$co];
			        		}
			        		$pr_lnc = $_POST['crnt_og_lunch'][$co];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['crnt_og_lunch'][$co];
			        		}
			        		$pr_dnr = $_POST['crnt_og_dinner'][$co];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['crnt_og_dinner'][$co];
			        		}
			        		$pr_bt = $_POST['crnt_og_bt'][$co];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['crnt_og_bt'][$co];
			        		}

			        		$ogld=array(
			        		'patient_id'=>$this->input->post('pcode3'),
			        		'pc_id'=>$id,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid3'),
			        		'visit_id'=>3,
			                'chk_date'=>date('Y-m-d'),
			                'ogld_id'=>(isset($ogld[2]))?$ogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	  $this->Patient_model->atd_ogld_insert($ogld);
			        	}
			        	
			        	$ci++;
			        	$co++;
			        }
		        }		
				
				echo $errors_array.'Visit 1 Added Successfully';					
			
		}
	}





/*==== Edit visit 1 or recrutment visit ====*/
	public function visit1_edite(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		$pcid = $this->input->post('pc_id');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'vdate3', 'label'   => 'Visiting Date', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'doctorid3', 'label'   => 'Doctor', 'rules'   => 'trim|xss_clean|required'),				
				array('field'   => 'hba1c3', 'label'   => 'HbA1c', 'rules'   => 'trim|xss_clean|numeric|required')
				
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				//Setting values for tabel columns
				$data = array(
			        'doctor_id'=>$this->input->post('doctorid3'),
			        'chk_date'=> date("Y-m-d", strtotime($this->input->post('vdate3'))),
			        'physical_minute'=>$this->input->post('physical3'),
					'physical_day'=>$this->input->post('dayp3'),
					'vegetable_minute'=>$this->input->post('vegetables3'),
					'vegetable_day'=>$this->input->post('dayv3'),
					'fruit_minute'=>$this->input->post('fruits3'),
					'fruit_day'=>$this->input->post('dayf3'),
			        'height'=>$this->input->post('height3'),
			        'weight'=>$this->input->post('weight3'),
			        'bmi'=>$this->input->post('bmi3'),
			        'waist'=>$this->input->post('waist3'),
			        'hip'=>$this->input->post('hip3'),
			        'waist_hip_ratio'=>$this->input->post('waist_hip_ratio3'),
			        'sbp'=>$this->input->post('sbp3'),
			        'dbp'=>$this->input->post('dbp3'),
			        'fpg'=>$this->input->post('fpg3'),
			        'tohpg_post'=>$this->input->post('tohpg3'),
			        /*'insulintype'=>$post['insulintype'.$vid],*/
			        'treatment'=>$this->input->post('treatment3'),
			        'treatment_pre'=>$this->input->post('prev_treatment'),
			        'aceton'=>$this->input->post('aceton3'),
			        'rbs'=>$this->input->post('rbs3'),
			        's_creatinine'=>$this->input->post('s_creatinine3'),
			        'hba1c'=>$this->input->post('hba1c3'),
			        'urine_albumin'=>$this->input->post('urine_albumin3'),			        
			        'hypoglycaemia'=>($this->input->post('hypoglycaemia3'))?1:'0',
			        'chol'=>$this->input->post('chol3'),
			        'ldl_c'=>$this->input->post('ldl_c3'),
			        'hdl_c'=>$this->input->post('hdl_c3'),
			        'triglycerides'=>$this->input->post('triglycerides3'),
			        'heat'=>($this->input->post('heart_disease3'))?1:'0',
			        'htn'=>($this->input->post('htn3'))?1:'0',
			        'stroke'=>($this->input->post('stroke3'))?1:'0',
			        'neuropathy'=>($this->input->post('neuopathy3'))?1:'0',
			        'retinopathy'=>($this->input->post('retinpathy3'))?1:'0',
			        'hhns'=>($this->input->post('hhns3'))?1:'0',
			        'ckd'=>($this->input->post('ckd3'))?1:'0',
			        'dka'=>($this->input->post('dka3'))?1:'0',
			        'foot_complication'=>($this->input->post('foot_complication3'))?1:'0',
			        'pvd'=>($this->input->post('pvd3'))?1:'0',
			        'skin'=>($this->input->post('skin_disease3'))?1:'0',
			        'gastro'=>($this->input->post('gastro_complication3'))?1:'0',
			        'ogld_status'=>$this->input->post('ogld3'),
			        'ogld_status_pre'=>$this->input->post('prev_ogld3'),
			        'insulin_status'=>$this->input->post('insulin3'),
			        'insulin_status_pre'=>$this->input->post('prev_insulin3')
				);
				//Transfering data to Model
				$this->Patient_model->prescriptions_update($pcid, $data);	

				$this->Patient_model->deleteBycon('prescription_insulin_pre',$pcid,'pc_id');

		        $number2 = count($_POST["prev_basal3"]);
	        	if($number2 > 0){

	        	for($i=0; $i<$number2; $i++){

	        		$insulinidre=explode(':', $_POST['prev_basal3'][$i]);
			        $basalvalueid = $insulinidre[1];

			        if (isset($basalvalueid)) {
			        	$insulin_pre=array(
			               'patient_id'=>$this->input->post('pcode3'),
			        		'pc_id'=>$pcid,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid3'),
			        		'visit_id'=>3,
			                'insulin_type'=>$this->input->post('prev_insulintype31'),
			                'chk_date'=>date('Y-m-d'),
			                'insulin_id'=>$basalvalueid,
			                'dose_morning'=>$_POST['prev_basaldm3'][$i],
			                'dose_noon'=>$_POST['prev_basaldn3'][$i],
			                'dose_night'=>$_POST['prev_basaldt3'][$i],
			                'dose_bed'=>$_POST['prev_basalbed3'][$i],
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	$this->Patient_model->pre_insulin_insert($insulin_pre);
			        }
			        	

			        }
			    }

			    $this->Patient_model->deleteBycon('prescription_insulin',$pcid,'pc_id');
				$number1 = count($_POST["basal3"]);
		        if($number1 > 0){

		        	for($i=0; $i<$number1; $i++){
		        		$insulinid=explode(':', $_POST['basal3'][$i]);
				        $basalvalue = $insulinid[1];
		        		if($basalvalue!='0')
				        {
				        	$insulin=array(
				                'patient_id'=>$this->input->post('pcode3'),
				        		'pc_id'=>$pcid,
				        		'center_id'=>$session_data['center_id'],
				        		'doctor_id'=>$this->input->post('doctorid3'),
				        		'visit_id'=>3,
				                'insulin_type'=>$this->input->post('cr_insulintype3'),
				                'chk_date'=>date('Y-m-d'),
				                'insulin_id'=>$basalvalue,
				                'dose_morning'=>$_POST['basaldm3'][$i],
				                'dose_noon'=>$_POST['basaldn3'][$i],
				                'dose_night'=>$_POST['basaldt3'][$i],
				                'dose_bed'=>$_POST["basalbed3"][$i],
				        		'created_by'=>$session_data['id'],
					    		'created_datetime'=>date('Y-m-d H:i:00')
							);
				        	$this->Patient_model->atd_insulin_insert($insulin);
				        }
		        	}
		        }

		        $this->Patient_model->deleteBycon('prescription_ogld_pre',$pcid,'pc_id');
				$ip=1;
	        	$op=0;   
	        	$preogldcount=count($_POST['prev_ogld']);

	        	if($preogldcount>0){
			        foreach($_POST['prev_ogld'] as $preogld)
			        {
			        	$preogld=explode(':', $preogld);
			        	if(isset($preogld[2]) && $preogld[2]!='')
			        	{
			        		$pr_bf = $_POST['pre_og_bf'][$op];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['pre_og_bf'][$op];
			        		}
			        		$pr_lnc = $_POST['pre_og_lunch'][$op];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['pre_og_lunch'][$op];
			        		}
			        		$pr_dnr = $_POST['pre_og_dinner'][$op];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['pre_og_dinner'][$op];
			        		}
			        		$pr_bt = $_POST['pre_og_bt'][$op];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['pre_og_bt'][$op];
			        		}

			        		$preogld=array(
			        		'patient_id'=>$this->input->post('pcode3'),
			        		'pc_id'=>$pcid,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid3'),
			        		'visit_id'=>3,
			                'chk_date'=>date('Y-m-d'),
			                'ogld_id'=>(isset($preogld[2]))?$preogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	 $this->Patient_model->pre_ogld_insert($preogld);
			        	}
			        	
			        	$ip++;
			        	$op++;
			        }
		        }
				$this->Patient_model->deleteBycon('prescription_ogld',$pcid,'pc_id');
				$ci2=1;
		        $co2=0;
		        $ogldcount=count($_POST['ogld']);
		        if($ogldcount>0){
			        foreach($_POST['ogld'] as $ogld)
			        {
			        	$ogld=explode(':', $ogld);
			        	if(isset($ogld[2]) && $ogld[2]!='')
			        	{
			        		$pr_bf = $_POST['crnt_og_bf'][$co2];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['crnt_og_bf'][$co2];
			        		}
			        		$pr_lnc = $_POST['crnt_og_lunch'][$co2];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['crnt_og_lunch'][$co2];
			        		}
			        		$pr_dnr = $_POST['crnt_og_dinner'][$co2];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['crnt_og_dinner'][$co2];
			        		}
			        		$pr_bt = $_POST['crnt_og_bt'][$co2];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['crnt_og_bt'][$co2];
			        		}

			        		$ogld=array(
			        		'patient_id'=>$this->input->post('pcode3'),
			        		'pc_id'=>$pcid,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid3'),
			        		'visit_id'=>3,
			                'chk_date'=>date('Y-m-d'),
			                'ogld_id'=>(isset($ogld[2]))?$ogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	  $this->Patient_model->atd_ogld_insert($ogld);
			        	}
			        	
			        	$ci2++;
			        	$co2++;
			        }
		        }	
							
				
				echo $errors_array.'Visit 1 Update Successfully';					
			
		}
	}



	/*==== Save visit 2 or Follow Up visit ====*/
	public function visit2_save(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'vdate4', 'label'   => 'Visiting Date', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'doctorid4', 'label'   => 'Doctor', 'rules'   => 'trim|xss_clean|required'),				
				array('field'   => 'hba1c4', 'label'   => 'HbA1c', 'rules'   => 'trim|xss_clean|numeric|required')
				
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				//Setting values for tabel columns
				$data = array(					
					/*'pt_id'=>'79-38-19092019',*/
					'pt_id'=>$this->input->post('pcode4'),
			        'visit_id'=>4,
			        'center_id'=>$session_data['center_id'],
			        'doctor_id'=>$this->input->post('doctorid4'),
			        'chk_date'=> date("Y-m-d", strtotime($this->input->post('vdate4'))),
			        'physical_minute'=>$this->input->post('physical4'),
					'physical_day'=>$this->input->post('dayp4'),
					'vegetable_minute'=>$this->input->post('vegetables4'),
					'vegetable_day'=>$this->input->post('dayv4'),
					'fruit_minute'=>$this->input->post('fruits4'),
					'fruit_day'=>$this->input->post('dayf4'),

			        'height'=>$this->input->post('height4'),
			        'weight'=>$this->input->post('weight4'),
			        'bmi'=>$this->input->post('bmi4'),
			        'waist'=>$this->input->post('waist4'),
			        'hip'=>$this->input->post('hip4'),
			        'waist_hip_ratio'=>$this->input->post('waist_hip_ratio4'),
			        'sbp'=>$this->input->post('sbp4'),
			        'dbp'=>$this->input->post('dbp4'),

			        'fpg'=>$this->input->post('fpg4'),
			        'tohpg_post'=>$this->input->post('tohpg4'),
			        /*'insulintype'=>$post['insulintype'.$vid],*/
			        'treatment'=>$this->input->post('treatment4'),
			        'treatment_pre'=>$this->input->post('prev_treatment4'),
			        'aceton'=>$this->input->post('aceton4'),
			        'rbs'=>$this->input->post('rbs4'),
			        's_creatinine'=>$this->input->post('s_creatinine4'),
			        'hba1c'=>$this->input->post('hba1c4'),
			        'urine_albumin'=>$this->input->post('urine_albumin4'),			        
			        'hypoglycaemia'=>($this->input->post('hypoglycaemia4'))?1:'0',
			        'chol'=>$this->input->post('chol4'),
			        'ldl_c'=>$this->input->post('ldl_c4'),
			        'hdl_c'=>$this->input->post('hdl_c4'),
			        'triglycerides'=>$this->input->post('triglycerides4'),
			        'heat'=>($this->input->post('heart_disease4'))?1:'0',
			        'htn'=>($this->input->post('htn4'))?1:'0',
			        'stroke'=>($this->input->post('stroke4'))?1:'0',
			        'neuropathy'=>($this->input->post('neuopathy4'))?1:'0',
			        'retinopathy'=>($this->input->post('retinpathy4'))?1:'0',
			        'hhns'=>($this->input->post('hhns4'))?1:'0',
			        'ckd'=>($this->input->post('ckd4'))?1:'0',
			        'dka'=>($this->input->post('dka4'))?1:'0',
			        'foot_complication'=>($this->input->post('foot_complication4'))?1:'0',
			        'pvd'=>($this->input->post('pvd4'))?1:'0',
			        'skin'=>($this->input->post('skin_disease4'))?1:'0',
			        'gastro'=>($this->input->post('gastro_complication4'))?1:'0',
			        'ogld_status'=>$this->input->post('ogld_status4'),
			        'ogld_status_pre'=>$this->input->post('prev_ogld_status4'),
			        'insulin_status'=>$this->input->post('insulin4'),
			        'insulin_status_pre'=>$this->input->post('prev_insulin4'),			        
			        'payment_status'=>'free',
			        'created_by'=>$session_data['id'],
					'created_datetime'=>date('Y-m-d H:i:00')
				);
				//Transfering data to Model
				$id = $this->Patient_model->atd_insert($data);	


		        $number2 = count($_POST["prev_basal4"]);
	        	if($number2 > 0){

	        	for($i=0; $i<$number2; $i++){

	        		$insulinidre=explode(':', $_POST['prev_basal4'][$i]);
			        $basalvalueid = $insulinidre[1];

			        if (isset($basalvalueid)) {
			        	$insulin_pre=array(
			               'patient_id'=>$this->input->post('pcode4'),
			        		'pc_id'=>$id,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid4'),
			        		'visit_id'=>4,
			                'insulin_type'=>$this->input->post('prev_insulintype4'),
			                'chk_date'=>date('Y-m-d'),
			                'insulin_id'=>$basalvalueid,
			                'dose_morning'=>$_POST['prev_basaldm4'][$i],
			                'dose_noon'=>$_POST['prev_basaldn4'][$i],
			                'dose_night'=>$_POST['prev_basaldt4'][$i],
			                'dose_bed'=>$_POST['prev_basalbed4'][$i],
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	$this->Patient_model->pre_insulin_insert($insulin_pre);
			        }
			        	

			        }
			    }

				

				$number1 = count($_POST["basal4"]);
		        if($number1 > 0){

		        	for($i=0; $i<$number1; $i++){
		        		$insulinid=explode(':', $_POST['basal4'][$i]);
				        $basalvalue = $insulinid[1];
		        		if($basalvalue!='0')
				        {
				        	$insulin=array(
				                'patient_id'=>$this->input->post('pcode4'),
				        		'pc_id'=>$id,
				        		'center_id'=>$session_data['center_id'],
				        		'doctor_id'=>$this->input->post('doctorid4'),
				        		'visit_id'=>4,
				                'insulin_type'=>$this->input->post('cr_insulintype4'),
				                'chk_date'=>date('Y-m-d'),
				                'insulin_id'=>$basalvalue,
				                'dose_morning'=>$_POST['basaldm4'][$i],
				                'dose_noon'=>$_POST['basaldn4'][$i],
				                'dose_night'=>$_POST['basaldt4'][$i],
				                'dose_bed'=>$_POST["basalbed4"][$i],
				        		'created_by'=>$session_data['id'],
					    		'created_datetime'=>date('Y-m-d H:i:00')
							);
				        	$this->Patient_model->atd_insulin_insert($insulin);
				        }
		        	}
		        }

				$ip=1;
	        	$op=0;   
	        	$preogldcount=count($_POST['prev_ogld']);

	        	if($preogldcount>0){
			        foreach($_POST['prev_ogld'] as $preogld)
			        {
			        	$preogld=explode(':', $preogld);
			        	if(isset($preogld[2]) && $preogld[2]!='')
			        	{
			        		$pr_bf = $_POST['pre_og_bf4'][$co];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['pre_og_bf4'][$co];
			        		}
			        		$pr_lnc = $_POST['pre_og_lunch4'][$co];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['pre_og_lunch4'][$co];
			        		}
			        		$pr_dnr = $_POST['pre_og_dinner4'][$co];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['pre_og_dinner4'][$co];
			        		}
			        		$pr_bt = $_POST['pre_og_bt4'][$co];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['pre_og_bt4'][$co];
			        		}

			        		$preogld=array(
			        		'patient_id'=>$this->input->post('pcode4'),
			        		'pc_id'=>$id,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid4'),
			        		'visit_id'=>4,
			                'chk_date'=>date('Y-m-d'),
			                'ogld_id'=>(isset($preogld[2]))?$preogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	 $this->Patient_model->pre_ogld_insert($preogld);
			        	}
			        	
			        	$ip++;
			        	$op++;
			        }
		        }




				$ci=1;
		        $co=0;
		        $ogldcount=count($_POST['ogld4']);
		        if($ogldcount>0){
			        foreach($_POST['ogld4'] as $ogld)
			        {
			        	$ogld=explode(':', $ogld);
			        	if(isset($ogld[2]) && $ogld[2]!='')
			        	{
			        		$pr_bf = $_POST['crnt_og_bf4'][$co];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['crnt_og_bf4'][$co];
			        		}
			        		$pr_lnc = $_POST['crnt_og_lunch4'][$co];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['crnt_og_lunch4'][$co];
			        		}
			        		$pr_dnr = $_POST['crnt_og_dinner4'][$co];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['crnt_og_dinner4'][$co];
			        		}
			        		$pr_bt = $_POST['crnt_og_bt4'][$co];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['crnt_og_bt4'][$co];
			        		}

			        		$ogld=array(
			        		'patient_id'=>$this->input->post('pcode4'),
			        		'pc_id'=>$id,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid4'),
			        		'visit_id'=>4,
			                'chk_date'=>date('Y-m-d'),
			                'ogld_id'=>(isset($ogld[2]))?$ogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	  $this->Patient_model->atd_ogld_insert($ogld);
			        	}
			        	
			        	$ci++;
			        	$co++;
			        }
		        }	
							
				
				echo $errors_array.'Visit 2 Added Successfully';					
			
		}
	}

	/*==== Edit visit 2 or recrutment visit ====*/
	public function visit2_edite(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		$pcid = $this->input->post('pc_id');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'vdate4', 'label'   => 'Visiting Date', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'doctorid4', 'label'   => 'Doctor', 'rules'   => 'trim|xss_clean|required'),				
				array('field'   => 'hba1c4', 'label'   => 'HbA1c', 'rules'   => 'trim|xss_clean|numeric|required')
				
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				//Setting values for tabel columns
				$data = array(
			        'doctor_id'=>$this->input->post('doctorid4'),
			        'chk_date'=> date("Y-m-d", strtotime($this->input->post('vdate4'))),
			        'physical_minute'=>$this->input->post('physical4'),
					'physical_day'=>$this->input->post('dayp4'),
					'vegetable_minute'=>$this->input->post('vegetables4'),
					'vegetable_day'=>$this->input->post('dayv4'),
					'fruit_minute'=>$this->input->post('fruits4'),
					'fruit_day'=>$this->input->post('dayf4'),

			        'height'=>$this->input->post('height4'),
			        'weight'=>$this->input->post('weight4'),
			        'bmi'=>$this->input->post('bmi4'),
			        'waist'=>$this->input->post('waist4'),
			        'hip'=>$this->input->post('hip4'),
			        'waist_hip_ratio'=>$this->input->post('waist_hip_ratio4'),
			        'sbp'=>$this->input->post('sbp4'),
			        'dbp'=>$this->input->post('dbp4'),

			        'fpg'=>$this->input->post('fpg4'),
			        'tohpg_post'=>$this->input->post('tohpg4'),
			        'treatment'=>$this->input->post('treatment4'),
			        'treatment_pre'=>$this->input->post('prev_treatment4'),
			        'aceton'=>$this->input->post('aceton4'),
			        'rbs'=>$this->input->post('rbs4'),
			        's_creatinine'=>$this->input->post('s_creatinine4'),
			        'hba1c'=>$this->input->post('hba1c4'),
			        'urine_albumin'=>$this->input->post('urine_albumin4'),			        
			        'hypoglycaemia'=>($this->input->post('hypoglycaemia4'))?1:'0',
			        'chol'=>$this->input->post('chol4'),
			        'ldl_c'=>$this->input->post('ldl_c4'),
			        'hdl_c'=>$this->input->post('hdl_c4'),
			        'triglycerides'=>$this->input->post('triglycerides4'),
			        'heat'=>($this->input->post('heart_disease4'))?1:'0',
			        'htn'=>($this->input->post('htn4'))?1:'0',
			        'stroke'=>($this->input->post('stroke4'))?1:'0',
			        'neuropathy'=>($this->input->post('neuopathy4'))?1:'0',
			        'retinopathy'=>($this->input->post('retinpathy4'))?1:'0',
			        'hhns'=>($this->input->post('hhns4'))?1:'0',
			        'ckd'=>($this->input->post('ckd4'))?1:'0',
			        'dka'=>($this->input->post('dka4'))?1:'0',
			        'foot_complication'=>($this->input->post('foot_complication4'))?1:'0',
			        'pvd'=>($this->input->post('pvd4'))?1:'0',
			        'skin'=>($this->input->post('skin_disease4'))?1:'0',
			        'gastro'=>($this->input->post('gastro_complication4'))?1:'0',
			        'ogld_status'=>$this->input->post('ogld_status4'),
			        'ogld_status_pre'=>$this->input->post('prev_ogld_status4'),
			        'insulin_status'=>$this->input->post('insulin4'),
			        'insulin_status_pre'=>$this->input->post('prev_insulin4'),			        
			        'payment_status'=>'free',
				);
				//Transfering data to Model
				$this->Patient_model->prescriptions_update($pcid, $data);	

				$this->Patient_model->deleteBycon('prescription_insulin_pre',$pcid,'pc_id');

		        $number2 = count($_POST["prev_basal4"]);
	        	if($number2 > 0){

	        	for($i=0; $i<$number2; $i++){

	        		$insulinidre=explode(':', $_POST['prev_basal4'][$i]);
			        $basalvalueid = $insulinidre[1];

			        if (isset($basalvalueid)) {
			        	$insulin_pre=array(
			               'patient_id'=>$this->input->post('pcode4'),
			        		'pc_id'=>$pcid,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid4'),
			        		'visit_id'=>4,
			                'insulin_type'=>$this->input->post('prev_insulintype4'),
			                'chk_date'=>date('Y-m-d'),
			                'insulin_id'=>$basalvalueid,
			                'dose_morning'=>$_POST['prev_basaldm4'][$i],
			                'dose_noon'=>$_POST['prev_basaldn4'][$i],
			                'dose_night'=>$_POST['prev_basaldt4'][$i],
			                'dose_bed'=>$_POST['prev_basalbed4'][$i],
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	$this->Patient_model->pre_insulin_insert($insulin_pre);
			        }
			        	

			        }
			    }

			    $this->Patient_model->deleteBycon('prescription_insulin',$pcid,'pc_id');
				$number1 = count($_POST["basal4"]);
		        if($number1 > 0){

		        	for($i=0; $i<$number1; $i++){
		        		$insulinid=explode(':', $_POST['basal4'][$i]);
				        $basalvalue = $insulinid[1];
		        		if($basalvalue!='0')
				        {
				        	$insulin=array(
				                'patient_id'=>$this->input->post('pcode4'),
				        		'pc_id'=>$pcid,
				        		'center_id'=>$session_data['center_id'],
				        		'doctor_id'=>$this->input->post('doctorid4'),
				        		'visit_id'=>4,
				                'insulin_type'=>$this->input->post('cr_insulintype4'),
				                'chk_date'=>date('Y-m-d'),
				                'insulin_id'=>$basalvalue,
				                'dose_morning'=>$_POST['basaldm4'][$i],
				                'dose_noon'=>$_POST['basaldn4'][$i],
				                'dose_night'=>$_POST['basaldt4'][$i],
				                'dose_bed'=>$_POST["basalbed4"][$i],
				        		'created_by'=>$session_data['id'],
					    		'created_datetime'=>date('Y-m-d H:i:00')
							);
				        	$this->Patient_model->atd_insulin_insert($insulin);
				        }
		        	}
		        }

		        $this->Patient_model->deleteBycon('prescription_ogld_pre',$pcid,'pc_id');
				$ip=1;
	        	$op=0;   
	        	$preogldcount=count($_POST['prev_ogldname14']);

	        	if($preogldcount>0){
			        foreach($_POST['prev_ogldname14'] as $preogld)
			        {
			        	$preogld=explode(':', $preogld);
			        	if(isset($preogld[2]) && $preogld[2]!='')
			        	{
			        		$pr_bf = $_POST['pre_og_bf4'][$op];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['pre_og_bf4'][$op];
			        		}
			        		$pr_lnc = $_POST['pre_og_lunch4'][$op];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['pre_og_lunch4'][$op];
			        		}
			        		$pr_dnr = $_POST['pre_og_dinner4'][$op];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['pre_og_dinner4'][$op];
			        		}
			        		$pr_bt = $_POST['pre_og_bt4'][$op];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['pre_og_bt4'][$op];
			        		}

			        		$preogld=array(
			        		'patient_id'=>$this->input->post('pcode4'),
			        		'pc_id'=>$pcid,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid4'),
			        		'visit_id'=>4,
			                'chk_date'=>date('Y-m-d'),
			                'ogld_id'=>(isset($preogld[2]))?$preogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	 $this->Patient_model->pre_ogld_insert($preogld);
			        	}
			        	
			        	$ip++;
			        	$op++;
			        }
		        }
				$this->Patient_model->deleteBycon('prescription_ogld',$pcid,'pc_id');
				$ci=1;
		        $co=0;
		        $ogldcount=count($_POST['ogld4']);
		        if($ogldcount>0){
			        foreach($_POST['ogld4'] as $ogld)
			        {
			        	$ogld=explode(':', $ogld);
			        	if(isset($ogld[2]) && $ogld[2]!='')
			        	{
			        		$pr_bf = $_POST['crnt_og_bf4'][$co];
			        		if(empty($pr_bf)){
			        			$pr_bf = '0';
			        		}else{
			        			$pr_bf = $_POST['crnt_og_bf4'][$co];
			        		}
			        		$pr_lnc = $_POST['crnt_og_lunch4'][$co];
			        		if(empty($pr_lnc)){
			        			$pr_lnc = '0';
			        		}else{
			        			$pr_lnc = $_POST['crnt_og_lunch4'][$co];
			        		}
			        		$pr_dnr = $_POST['crnt_og_dinner4'][$co];
			        		if(empty($pr_dnr)){
			        			$pr_dnr = '0';
			        		}else{
			        			$pr_dnr = $_POST['crnt_og_dinner4'][$co];
			        		}
			        		$pr_bt = $_POST['crnt_og_bt4'][$co];
			        		if(empty($pr_bt)){
			        			$pr_bt = '0';
			        		}else{
			        			$pr_bt = $_POST['crnt_og_bt4'][$co];
			        		}

			        		$ogld=array(
			        		'patient_id'=>$this->input->post('pcode4'),
			        		'pc_id'=>$pcid,
			        		'center_id'=>$session_data['center_id'],
			        		'doctor_id'=>$this->input->post('doctorid4'),
			        		'visit_id'=>4,
			                'chk_date'=>date('Y-m-d'),
			                'ogld_id'=>(isset($ogld[2]))?$ogld[2]:'0',
			                'dosage'=> $pr_bf.'+'.$pr_lnc.'+'.$pr_dnr.'+'.$pr_bt,
			        		'created_by'=>$session_data['id'],
					    	'created_datetime'=>date('Y-m-d H:i:00')
						);
			        	  $this->Patient_model->atd_ogld_insert($ogld);
			        	}
			        	
			        	$ci++;
			        	$co++;
			        }
		        }	
							
				
				echo $errors_array.'Visit 2 Update Successfully';					
			
		}
	}







	function patienthistorySearch()
	{
		$session_data = $this->session->userdata('sht_ssndata');	
        
		
        /*$data["divisionlist"] = $this->Patient_model->get_division();
 		$data["patients"] = $this->Patient_model->searchEmergencyPatient($post['search']);*/

		$post=$this->input->post();

		      $s_date='2010-01-01 00:00:01';
		      $e_date=date('Y-m-d 23:59:59');
		      /*$user=$this->ion_auth->user()->row();
			if($this->ion_auth->in_group('center_operator')){
                 $center=$this->patient_model->getUserCenter($user->center_id);
                 $group='Center Operator';
               }else{
                 $center='';
                 
               }
             if($this->ion_auth->in_group('masteradmin') ||  $this->ion_auth->in_group('admin')){  
                 $group='Administrator';
             }else if($this->ion_auth->in_group('Data_Analyst')){
                  $group='Data Analyst';
             }*/
			$data=array(
			'user'=>$session_data['id'],
			'patients'=>$this->Patient_model->searchEmergencyPatient($post['psearch']),
			's_date'=>$s_date,
			'search'=>$post['psearch'],
			'e_date'=>$e_date,
			'center'=>$session_data['center_id'],
			'group'=>$session_data['user_type'],
			);

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
			'center_id' => $session_data['center_id'],
			'page' => 'Prescription',				
			);

		$data["metadata"] = $metadata;

			/*$data['main_content'] ='patient_list';*/


        
			$this->load->view('patient_list_search',$data);
			
		
	}

	function patientlist()
	{
		$session_data = $this->session->userdata('sht_ssndata');	
        
		
		      $s_date='2010-01-01 00:00:01';
		      $e_date=date('Y-m-d 23:59:59');
		     
			$data=array(
			'user'=>$session_data['id'],
			'patients'=>$this->Patient_model->PatientList($session_data['center_id']),
			's_date'=>$s_date,
			'e_date'=>$e_date,
			'center'=>$session_data['center_id'],
			'group'=>$session_data['user_type'],
			);

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
			'center_id' => $session_data['center_id'],
			'page' => 'Prescription',				
			);

		$data["metadata"] = $metadata;

			/*$data['main_content'] ='patient_list';*/


        
			$this->load->view('patient_list',$data);
			
		
	}

	function getInsulinNew()
	{
		
		$post=$this->input->get();
		$data['ogld']=$this->Patient_model->getInsulinId($post['q']);
		$oglds=array();
		foreach($data['ogld'] as $ogld){
			$oglds[]=$ogld['insulin_name'].':'.$ogld['insulin_id'];
		}
		
		echo json_encode($oglds);		
	}

	function addInsulin()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$data['basals'] = $this->Patient_model->getAllInsulin();

		$this->load->view('addinsulin',$data);
	}

	function addInsulinPrev()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$data['pevinsulin3'] = $this->Patient_model->getAllInsulin();

		$this->load->view('addprevinsulin',$data);
	}

	function addInsulin2()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$data['basals'] = $this->Patient_model->getAllInsulin();

		$this->load->view('addinsulin2',$data);
	}

	function addInsulinPrev2()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$data['pevinsulin3'] = $this->Patient_model->getAllInsulin();

		$this->load->view('addprevinsulin2',$data);
	}

	function addInsulinAtd()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$data['basals'] = $this->Patient_model->getAllInsulin();

		$this->load->view('addinsulin_atd',$data);
	}

	function addInsulin5yr()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$data['basals'] = $this->Patient_model->getAllInsulin();

		$this->load->view('addinsulin_5yr',$data);
	}

	function getOgld()
	{
		$post=$this->input->get();
		$data['ogld']=$this->Patient_model->getOgld($post['q']);
		$oglds=array();
		foreach($data['ogld'] as $ogld){
			$oglds[]=$ogld['generic'].'('.$ogld['brand'].':'. $ogld['strength'] .') :'.$ogld['id'];
		}		
		echo json_encode($oglds);
	}

	function addOgld()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$this->load->view('addogld',$data);
	}

	function addOgldPre()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$this->load->view('addogld_pre',$data);
	}

	function addOgld2()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$this->load->view('addogld2',$data);
	}

	function addOgldPre2()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$this->load->view('addogld_pre2',$data);
	}

	function addOgldAtd()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$this->load->view('addogld_atd',$data);
	}
	function addOgld5yr()
	{
		$post=$this->input->post();
		$data['visit']=$post['number'];
		$data['count']=$post['count'];
		$this->load->view('addogld_5yr',$data);
	}

     function fetch_district(){ // get district by division
	  if($this->input->post('division_id'))
	  {
	   echo $this->Patient_model->get_district($this->input->post('division_id'));
	  }
	 }





	 
	 function autodata_medicine() {
	  
	  echo $this->Patient_model->fetch_datamdcn($this->uri->segment(3));
	 }

     function autodata_member() {
	  
	  echo $this->Patient_model->fetch_data($this->uri->segment(3));
	 }
	 
	 function member_data(){
          if($this->input->post('member_id'))
          {
           $data = $this->Patient_model->fetch_single_data($this->input->post('member_id'));
           foreach($data as $row)
           {
            $output['member_name'] = $row['member_name'];
           }
           echo json_encode($output);
          }
     }
	 
	 public function member_dtl(){  
     	$mbrid = $this->input->post('mbrid');		
		$data["mbr_data"] = $this->Patient_model->mbr_details($mbrid);
		$data["mbr_billamount"] = $this->Patient_model->get_billamount($mbrid);
		$this->load->view('mbr_dtl',$data);		
	}//end function
	
	public function save_prescription(){
        $session_data = $this->session->userdata('sht_ssndata');
        
		
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
		
		 
		$prescription_id = $this->Patient_model->prescription_insert($prescriptiondata);
		
			for($count = 0; $count < count($_POST["madicinename"]); $count++){
				$mdcndata = array(
					'prescription_id' 		=> $prescription_id,
					'mdcn_name' => $_POST["madicinename"][$count],
					'dosage' => $_POST['dosage'][$count],
					'numberof_days' => $_POST['days'][$count],
				);
				$this->Patient_model->insert_mdcn($mdcndata);
			}
		  for($symcount = 0; $symcount < count($_POST["symtm"]); $symcount++){
				$symdata = array(
					'prescription_id' 		=> $prescription_id,
					'symtom_name' => $_POST["symtm"][$symcount],
				);
				$this->Patient_model->insert_symtm($symdata);
			}
		 for($testcount = 0; $testcount < count($_POST["test_name"]); $testcount++){
				$testdata = array(
					'prescription_id' 		=> $prescription_id,
					'test_name' => $_POST["test_name"][$testcount],
				);
				$this->Patient_model->insert_test($testdata);
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
		$data["get_details"] = $this->Patient_model->get_prescriptiondetails($id);
		$data["get_symptoms"] = $this->Patient_model->get_prescriptionsymptoms($id);
		$data["get_test"] = $this->Patient_model->get_prescriptiontest($id);
		$data["get_mdcn"] = $this->Patient_model->get_prescriptionmdcn($id);

		$mbrid = $data["get_details"]->member_id;
		$data["get_memberdetail"] = $this->Patient_model->get_prescriptionmember($mbrid);
		
        //$this->load->view('prescription_view', $data);
        $this->load->view('view', $data);
     }
	
	public function pdfdetails($id)
	{
		/*if($this->uri->segment(3))
		{*/
			/*$customer_id = $this->uri->segment(3);*/
			$html_content = '<h3 align="center">UHCP Prescriptions</h3>';
			$html_content .= $this->Patient_model->get_pdfdetails($id);
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
        $this->Patient_model->symptom_insert($data);
        echo 'Symptoms Inserted';
     }

     function AddInvs()
     {
      
       $data = array(
        'item_name'   => $this->input->post('item_name'),
       );
        $this->Patient_model->invstgsn_insert($data);
        echo 'Investigation Inserted';
       
      
     }
	
	function get_memberprescription_report(){
	  if($this->input->post('member_id')){
	   echo $this->Patient_model->fetch_prescription_report($this->input->post('member_id'));
	  }
	 }





    
    
   
    function is_ajax(){
		if (!$this->input->is_ajax_request()) {
            if($this->session->userdata('sht_ssndata')){			
				redirect('auth', 'refresh');						
			}else{
				redirect('auth/login', 'refresh');
			}
		}
	}
    
}

?>
