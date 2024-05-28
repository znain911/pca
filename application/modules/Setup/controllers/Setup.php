<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends Ci_Controller {
	
	
	var $prescription_list = 'Reports/genajaxprescriptionlist';
	var $bill_list = 'Reports/genajax_billlist';
	
	function __construct(){  	
		parent::__construct();
		
		if($this->session->userdata('sht_ssndata')){			
			$this->lang->load('option', $this->config->item('language'));
			$this->load->model('Setup_model');
			
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

/*--------- Insulin -------*/
  	public function insulin(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'HbA1c Reports',
			'description' => '',
			'keywords' => '',
			'heading' => 'HbA1c',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'optionlist',				
			);
		$data["metadata"] = $metadata;
		
		$data["cntr_list"] = $this->Setup_model->get_centerlist();
		$data["insulinlist"] = $this->Setup_model->get_insuln();

		$this->load->view('insulin/insulin', $data);
		
	}

	function addinsulin(){
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
		$data["newpatient_database"] = 'setup/new_insulin_data';

		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('insulin/add', $data);
     }

     public function new_insulin_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),               	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'created_by'=>$session_data['id'],
					'insulin_name'=>$this->input->post('name'),
					'insulin_clinical_type'=>$this->input->post('type'),
					'insulin_class'=>$this->input->post('class'),
					'insulin_category'=>$this->input->post('category'),
					'is_active'=>$this->input->post('status'),
				);
				//Transfering data to Model
				$id = $this->Setup_model->insulin_insert($data);
				echo $errors_array.'Insulin Added Successfully';
						
			
		}
	}

	function editinsulin($id){
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
		$data["newpatient_database"] = 'setup/edit_insulin_data/'.$id;
		$data["insulininfo"] = $this->Setup_model->get_insulinforeid($id);
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('insulin/edit', $data);
     }

     public function edit_insulin_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				
				//Setting values for tabel columns
				$data = array(
					'created_by'=>$session_data['id'],
					'insulin_name'=>$this->input->post('inslname'),
					'insulin_clinical_type'=>$this->input->post('type'),
					'insulin_class'=>$this->input->post('class'),
					'insulin_category'=>$this->input->post('category'),
					'is_active'=>$this->input->post('status'),
				);

				//Transfering data to Model
				$this->Setup_model->insulin_update($data, $id);

				/*print_r($this->db->last_query());    
				exit;*/				
								
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*--------- End Insulin -------*/



/*--------- OGLD -------*/
  	public function ogld(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'HbA1c Reports',
			'description' => '',
			'keywords' => '',
			'heading' => 'HbA1c',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'optionlist',				
			);
		$data["metadata"] = $metadata;
		$data["ogldlist"] = $this->Setup_model->get_ogld();

		$this->load->view('ogld/list', $data);
		
	}

	function addogld(){
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
		$data["newpatient_database"] = 'setup/new_ogld_data';

		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('ogld/add', $data);
     }

     public function new_ogld_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),               	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'brand'=>$this->input->post('name'),
					'generic'=>$this->input->post('type'),
					'strength'=>$this->input->post('strength'),
					'dosages'=>$this->input->post('dosages'),
					'OGLD'=>$this->input->post('status'),
				);
				//Transfering data to Model
				$id = $this->Setup_model->ogld_insert($data);
				echo $errors_array.'Added Successfully';
						
			
		}
	}

	function editogld($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'OGLD',
			'description' => '',
			'keywords' => '',
			'heading' => 'OGLD',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'Ogld',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_ogld_data/'.$id;
		$data["info"] = $this->Setup_model->get_ogldforeid($id);
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('ogld/edit', $data);
     }

     public function edit_ogld_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				
				//Setting values for tabel columns
				$data = array(
					'brand'=>$this->input->post('inslname'),
					'generic'=>$this->input->post('type'),
					'strength'=>$this->input->post('strength'),
					'dosages'=>$this->input->post('dosages'),
					'OGLD'=>$this->input->post('status'),
				);

				//Transfering data to Model
				$this->Setup_model->ogld_update($data, $id);

				/*print_r($this->db->last_query());    
				exit;*/				
								
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*----- end OGLD -----*/


/*--------- division -------*/
  	public function division(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'division',
			'description' => '',
			'keywords' => '',
			'heading' => 'division',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'optionlist',				
			);
		$data["metadata"] = $metadata;
		$data["divisionlist"] = $this->Setup_model->get_division();

		$this->load->view('division/list', $data);
		
	}

	function adddivision(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'division',
			'description' => '',
			'keywords' => '',
			'heading' => 'division',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'division',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/new_division_data';

		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('division/add', $data);
     }

     public function new_division_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),               	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'division_name'=>$this->input->post('name'),
				);
				//Transfering data to Model
				$id = $this->Setup_model->division_insert($data);
				echo $errors_array.'Added Successfully';						
			
		}
	}

	function editdivision($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'division',
			'description' => '',
			'keywords' => '',
			'heading' => 'division',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'Ogld',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_division_data/'.$id;
		$data["info"] = $this->Setup_model->get_divisionforeid($id);
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('division/edit', $data);
     }

     public function edit_division_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				
				//Setting values for tabel columns
				$data = array(
					'division_name'=>$this->input->post('inslname'),
				);

				//Transfering data to Model
				$this->Setup_model->division_update($data, $id);

				/*print_r($this->db->last_query());    
				exit;*/				
								
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}


	/*--------- district -------*/
  	public function district(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'district',
			'description' => '',
			'keywords' => '',
			'heading' => 'district',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'optionlist',				
			);
		$data["metadata"] = $metadata;
		$data["districtlist"] = $this->Setup_model->get_district();

		$this->load->view('district/list', $data);
		
	}

	function adddistrict(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'district',
			'description' => '',
			'keywords' => '',
			'heading' => 'district',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'district',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/new_district_data';
		$data["dvsnlist"] = $this->Setup_model->get_division();
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('district/add', $data);
     }

     public function new_district_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'District Name', 'rules'   => 'trim|xss_clean|required'), 
               	array('field'   => 'division', 'label'   => 'division Name', 'rules'   => 'trim|xss_clean|required'),               	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'district_name'=>$this->input->post('name'),
					'division_id'=>$this->input->post('division'),
				);
				//Transfering data to Model
				$id = $this->Setup_model->district_insert($data);
				echo $errors_array.'Added Successfully';						
			
		}
	}

	function editdistrict($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'district',
			'description' => '',
			'keywords' => '',
			'heading' => 'district',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'Ogld',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_district_data/'.$id;
		$data["info"] = $this->Setup_model->get_districtforeid($id);
		$data["dvsnlist"] = $this->Setup_model->get_division();
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('district/edit', $data);
     }

     public function edit_district_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				
				//Setting values for tabel columns
				$data = array(
					'district_name'=>$this->input->post('inslname'),
					'division_id'=>$this->input->post('division'),
				);

				//Transfering data to Model
				$this->Setup_model->district_update($data, $id);
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*---- end district ----*/

/*--------- profession -------*/
  	public function profession(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'profession',
			'description' => '',
			'keywords' => '',
			'heading' => 'profession',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'profession',				
			);
		$data["metadata"] = $metadata;
		$data["professionlist"] = $this->Setup_model->get_profession();

		$this->load->view('profession/list', $data);
		
	}

	function addprofession(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'profession',
			'description' => '',
			'keywords' => '',
			'heading' => 'profession',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'profession',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/new_profession_data';
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('profession/add', $data);
     }

     public function new_profession_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'profession_name'=>$this->input->post('name'),
					'status'=>$this->input->post('status'),
				);
				//Transfering data to Model
				$id = $this->Setup_model->profession_insert($data);
				echo $errors_array.'Added Successfully';						
			
		}
	}

	function editprofession($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'profession',
			'description' => '',
			'keywords' => '',
			'heading' => 'profession',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'profession',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_profession_data/'.$id;
		$data["info"] = $this->Setup_model->get_professionforeid($id);
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('profession/edit', $data);
     }

     public function edit_profession_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				
				
				//Setting values for tabel columns
				$data = array(
					'profession_name'=>$this->input->post('inslname'),
					'status'=>$this->input->post('status'),
				);

				//Transfering data to Model
				$this->Setup_model->profession_update($data, $id);
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*---- end profession ----*/

/*--------- expenditure -------*/
  	public function expenditure(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'expenditure',
			'description' => '',
			'keywords' => '',
			'heading' => 'expenditure',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'expenditure',				
			);
		$data["metadata"] = $metadata;
		$data["expenditurelist"] = $this->Setup_model->get_expenditure();

		$this->load->view('expenditure/list', $data);
		
	}

	function addexpenditure(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'expenditure',
			'description' => '',
			'keywords' => '',
			'heading' => 'expenditure',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'expenditure',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/new_expenditure_data';
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('expenditure/add', $data);
     }

     public function new_expenditure_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'expenditure_name'=>$this->input->post('name'),
					'status'=>$this->input->post('status'),
				);
				//Transfering data to Model
				$id = $this->Setup_model->expenditure_insert($data);
				echo $errors_array.'Added Successfully';						
			
		}
	}

	function editexpenditure($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'expenditure',
			'description' => '',
			'keywords' => '',
			'heading' => 'expenditure',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'expenditure',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_expenditure_data/'.$id;
		$data["info"] = $this->Setup_model->get_expenditureforeid($id);
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('expenditure/edit', $data);
     }

     public function edit_expenditure_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'expenditure_name'=>$this->input->post('inslname'),
					'status'=>$this->input->post('status'),
				);

				//Transfering data to Model
				$this->Setup_model->expenditure_update($data, $id);
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*---- end expenditure ----*/

/*--------- diabetes_type -------*/
  	public function diabetes_type(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'diabetes_type',
			'description' => '',
			'keywords' => '',
			'heading' => 'diabetes_type',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'diabetes_type',				
			);
		$data["metadata"] = $metadata;
		$data["diabetes_typelist"] = $this->Setup_model->get_diabetes_type();

		$this->load->view('diabetes_type/list', $data);
		
	}

	function adddiabetes_type(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'diabetes_type',
			'description' => '',
			'keywords' => '',
			'heading' => 'diabetes_type',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'diabetes_type',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/new_diabetes_type_data';
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('diabetes_type/add', $data);
     }

     public function new_diabetes_type_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'type_name'=>$this->input->post('name'),
					'status'=>$this->input->post('status'),
				);
				//Transfering data to Model
				$id = $this->Setup_model->diabetes_type_insert($data);
				echo $errors_array.'Added Successfully';						
			
		}
	}

	function editdiabetes_type($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'diabetes_type',
			'description' => '',
			'keywords' => '',
			'heading' => 'diabetes_type',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'diabetes_type',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_diabetes_type_data/'.$id;
		$data["info"] = $this->Setup_model->get_diabetes_typeforeid($id);
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('diabetes_type/edit', $data);
     }

     public function edit_diabetes_type_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'type_name'=>$this->input->post('inslname'),
					'status'=>$this->input->post('status'),
				);

				//Transfering data to Model
				$this->Setup_model->diabetes_type_update($data, $id);
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*---- end diabetes_type ----*/

/*--------- dm_duration -------*/
  	public function dm_duration(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'dm_duration',
			'description' => '',
			'keywords' => '',
			'heading' => 'dm_duration',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'dm_duration',				
			);
		$data["metadata"] = $metadata;
		$data["dm_durationlist"] = $this->Setup_model->get_dm_duration();

		$this->load->view('dm_duration/list', $data);
		
	}

	function adddm_duration(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'dm_duration',
			'description' => '',
			'keywords' => '',
			'heading' => 'dm_duration',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'dm_duration',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/new_dm_duration_data';
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('dm_duration/add', $data);
     }

     public function new_dm_duration_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'duration_name'=>$this->input->post('name'),
					'status'=>$this->input->post('status'),
				);
				//Transfering data to Model
				$id = $this->Setup_model->dm_duration_insert($data);
				echo $errors_array.'Added Successfully';						
			
		}
	}

	function editdm_duration($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'dm_duration',
			'description' => '',
			'keywords' => '',
			'heading' => 'dm_duration',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'dm_duration',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_dm_duration_data/'.$id;
		$data["info"] = $this->Setup_model->get_dm_durationforeid($id);
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('dm_duration/edit', $data);
     }

     public function edit_dm_duration_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'duration_name'=>$this->input->post('inslname'),
					'status'=>$this->input->post('status'),
				);

				//Transfering data to Model
				$this->Setup_model->dm_duration_update($data, $id);
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*---- end dm_duration ----*/

/*--------- center -------*/
  	public function center(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'center',
			'description' => '',
			'keywords' => '',
			'heading' => 'center',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'center',				
			);
		$data["metadata"] = $metadata;
		$data["centerlist"] = $this->Setup_model->get_center();

		$this->load->view('center/list', $data);
		
	}

	function addcenter(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'center',
			'description' => '',
			'keywords' => '',
			'heading' => 'center',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'center',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/new_center_data';
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('center/add', $data);
     }

     public function new_center_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'center_name'=>$this->input->post('name'),
					'center_code'=>$this->input->post('code'),
					'address'=>$this->input->post('address'),
					'status'=>$this->input->post('status'),
				);
				//Transfering data to Model
				$id = $this->Setup_model->center_insert($data);
				echo $errors_array.'Added Successfully';						
			
		}
	}

	function editcenter($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'center',
			'description' => '',
			'keywords' => '',
			'heading' => 'center',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'center',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_center_data/'.$id;
		$data["info"] = $this->Setup_model->get_centerforeid($id);
		/*print_r($data['countpatient']);exit;*/
		
         $this->load->view('center/edit', $data);
     }

     public function edit_center_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'center_name'=>$this->input->post('inslname'),
					'center_code'=>$this->input->post('code'),
					'address'=>$this->input->post('address'),
					'status'=>$this->input->post('status'),
				);

				//Transfering data to Model
				$this->Setup_model->center_update($data, $id);
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*---- end center ----*/


/*--------- doctors -------*/
  	public function doctor(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'center',
			'description' => '',
			'keywords' => '',
			'heading' => 'center',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'center',				
			);
		$data["metadata"] = $metadata;
		if ($session_data['user_type']==1 || $session_data['user_type']==2) {
			$data["doctorlist"] = $this->Setup_model->get_alldoctor();
		}else{
			$data["doctorlist"] = $this->Setup_model->get_doctor($session_data['center_id']);
		}

		

		$this->load->view('doctor/list', $data);
		
	}

	function adddoctor(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'center',
			'description' => '',
			'keywords' => '',
			'heading' => 'center',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'center',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/new_doctor_data';
		/*print_r($data['countpatient']);exit;*/

		if ($session_data['user_type']==1 || $session_data['user_type']==2) {
			$data["cntrlist"] = $this->Setup_model->get_center();
		}else{
			$data["cntrlist"] = $this->Setup_model->get_centerfordoctoradd($session_data['center_id']);
		}

		
		
         $this->load->view('doctor/add', $data);
     }

     public function new_doctor_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'center', 'label'   => 'Center', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'email', 'label'   => 'email id', 'rules'   => 'trim|xss_clean|valid_email'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'doctor_name'=>$this->input->post('name'),
					'center_id'=>$this->input->post('center'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'is_active'=>$this->input->post('status'),
					'created_by'=>$session_data['id'],
				);
				//Transfering data to Model
				$id = $this->Setup_model->doctor_insert($data);
				echo $errors_array.'Added Successfully';						
			
		}
	}

	function editdoctor($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'center',
			'description' => '',
			'keywords' => '',
			'heading' => 'center',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'center',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_doctor_data/'.$id;
		$data["info"] = $this->Setup_model->get_doctorforeid($id);
		/*print_r($data['countpatient']);exit;*/

		if ($session_data['user_type']==1 || $session_data['user_type']==2) {
			$data["cntrlist"] = $this->Setup_model->get_center();
		}else{
			$data["cntrlist"] = $this->Setup_model->get_centerfordoctoradd($session_data['center_id']);
		}
		
         $this->load->view('doctor/edit', $data);
     }

     public function edit_doctor_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'doctor_name'=>$this->input->post('inslname'),
					'center_id'=>$this->input->post('center'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'is_active'=>$this->input->post('status'),
					'created_by'=>$session_data['id'],
				);

				//Transfering data to Model
				$this->Setup_model->doctor_update($data, $id);
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*---- end Doctor ----*/



/*--------- operator -------*/
  	public function operator(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'operator',
			'description' => '',
			'keywords' => '',
			'heading' => 'operator',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],		
			'page' => 'operator',				
			);
		$data["metadata"] = $metadata;
		if ($session_data['user_type']==1 || $session_data['user_type']==2) {
			$data["operatorlist"] = $this->Setup_model->get_alloperator();
		}else{
			$data["operatorlist"] = $this->Setup_model->get_operator($session_data['center_id']);
		}

		

		$this->load->view('operator/list', $data);
		
	}

	function addoperator(){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'operator',
			'description' => '',
			'keywords' => '',
			'heading' => 'operator',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'operator',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/new_operator_data';
		/*print_r($data['countpatient']);exit;*/

		if ($session_data['user_type']==1 || $session_data['user_type']==2) {
			$data["cntrlist"] = $this->Setup_model->get_center();
		}else{
			$data["cntrlist"] = $this->Setup_model->get_centerfordoctoradd($session_data['center_id']);
		}
		$data["grouplist"] = $this->Setup_model->get_usergroup();
		
		
         $this->load->view('operator/add', $data);
     }

     public function new_operator_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'first_name', 'label'   => 'First Name', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'last_name', 'label'   => 'Last Name', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'username', 'label'   => 'Username', 'rules'   => 'trim|xss_clean|required|is_unique[users.username]'),
               	array('field'   => 'role', 'label'   => 'Role', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'password', 'label'   => 'Password', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'center', 'label'   => 'Center', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'email', 'label'   => 'email id', 'rules'   => 'trim|xss_clean|valid_email|is_unique[users.email]|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'center_id'=>$this->input->post('center'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'username'=>$this->input->post('username'),
					'password'=>md5($this->input->post('password')),
					'user_group'=>$this->input->post('role'),
					'company'=>$this->input->post('organization'),
					'active'=>$this->input->post('status'),
					'created_by'=>$session_data['id'],
				);
				//Transfering data to Model
				$id = $this->Setup_model->operator_insert($data);
				echo $errors_array.'Added Successfully';						
			
		}
	}

	function editoperator($id){
         $session_data = $this->session->userdata('sht_ssndata');	
        $metadata = array(
			'title' => 'operator',
			'description' => '',
			'keywords' => '',
			'heading' => 'operator',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'center_id' => $session_data['center_id'],
			'page' => 'operator',				
			);
		$data["metadata"] = $metadata;
		$data["newpatient_database"] = 'setup/edit_operator_data/'.$id;
		$data["info"] = $this->Setup_model->get_operatorforeid($id);
		/*print_r($data['countpatient']);exit;*/

		if ($session_data['user_type']==1 || $session_data['user_type']==2) {
			$data["cntrlist"] = $this->Setup_model->get_center();
		}else{
			$data["cntrlist"] = $this->Setup_model->get_centerfordoctoradd($session_data['center_id']);
		}

		$data["grouplist"] = $this->Setup_model->get_usergroup();
		
         $this->load->view('operator/edit', $data);
     }

     public function edit_operator_data($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');
		//This method will have the credentials validation
		$validation_rules = array(
               	/*array('field'   => 'inslname', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'), */              	
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'center_id'=>$this->input->post('center'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'username'=>$this->input->post('username'),
					'user_group'=>$this->input->post('role'),
					'company'=>$this->input->post('organization'),
					'active'=>$this->input->post('status'),
					'created_by'=>$session_data['id'],
				);

				//Transfering data to Model
				$this->Setup_model->operator_update($data, $id);
				
				echo $errors_array.'Update Successfully';
						
			
		}
	}
/*---- end operator ----*/


	function is_ajax(){
		if (!$this->input->is_ajax_request()) {
            if($this->session->userdata('sht_ssndata')){			
				redirect('auth', 'refresh');						
			}else{
				redirect('auth/login', 'refresh');
			}
		}
	}
	

	
} // End Class

?>