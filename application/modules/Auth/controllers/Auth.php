<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		
		$this->load->model('adminlogin');
		$this->load->library('forminput');	
		$this->load->library('form_validation');
		$this->load->library('form_engine');
		$this->load->library('Querylib');
		$this->load->library('datatables');
		//$this->load->module("users");
		
		//if(!$this->users->_is_admin()){
			//show_404();
		//}
		
	}
	
	function index(){
		
		if($this->session->userdata('sht_ssndata')){
    	
			$session_data = $this->session->userdata('sht_ssndata');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				'user_type' => $session_data['user_type'],
				'center_id' => $session_data['center_id'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			
			$utype = $session_data['user_type'];

			if($utype==1 || $utype==2){
				$data['patient_mean']=$this->adminlogin->get_meanPatientsForDashboard();
				$data['prescrip_mean']=$this->adminlogin->get_meanPrescripForDashboard();
				$data['patient_today']=$this->adminlogin->get_todayPatientsForDashboard();
				$data['patient_total']=$this->adminlogin->get_totalPatientsForDashboard();
				$data['prescrib_today']=$this->adminlogin->get_todayPrescripForDashboard();
				$data['prescrib_total']=$this->adminlogin->get_totalPrescripForDashboard();
				$data['patient_meanexp']=$this->adminlogin->getMeanExpens();

				//print_r($data['patient_meanexp']);exit();

			}else{
				$data['patient_mean']=$this->adminlogin->get_meanPatientsForDashboardCntr($session_data['center_id']);
				$data['prescrip_mean']=$this->adminlogin->get_meanPrescripForDashboardCntr($session_data['center_id']);
				$data['patient_today']=$this->adminlogin->get_todayPatientsForDashboardCntr($session_data['center_id']);
				$data['patient_total']=$this->adminlogin->get_totalPatientsForDashboardCntr($session_data['center_id']);
				$data['prescrib_today']=$this->adminlogin->get_todayPrescripForDashboardCntr($session_data['center_id']);
				$data['prescrib_total']=$this->adminlogin->get_totalPrescripForDashboardCntr($session_data['center_id']);
				$data['patient_meanexp']=$this->adminlogin->getMeanExpensCntr($session_data['center_id']);
			}
			

			$data['centerlist']=$this->adminlogin->get_centerForDashboard();
			$data["cntr_list"] = $this->adminlogin->get_centerlist();
			/*$data['dashboard']=$this->adminlogin->getDeashboardData();*/

			
			
			$this->load->view('dashboard',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('auth/login', 'refresh');
		}
		
	}

	public function meanByCenter(){  
     	$cid = $this->input->post('center');
     	if ($cid == 'all') {
     			$data['patient_mean']=$this->adminlogin->get_meanPatientsForDashboard();
				$data['prescrip_mean']=$this->adminlogin->get_meanPrescripForDashboard();
				$data['patient_meanexp']=$this->adminlogin->getMeanExpens();
     		}else{
     			$data['patient_mean']=$this->adminlogin->get_meanPatientsForDashboardCntr($cid);
				$data['prescrip_mean']=$this->adminlogin->get_meanPrescripForDashboardCntr($cid);
				$data['patient_meanexp']=$this->adminlogin->getMeanExpensCntr($cid);
     		}		
		
		$this->load->view('meanbycenter',$data);		
	}//end function
	
	function genajaxmemberlist()
    {
        //$this->is_ajax();	
        
        /* $this->datatables->select('t1.id,t1.member_id,t1.member_name,t1.coverage_period,t1.start_date,t1.end_date,t1.status,t2.organization_head')->join(DB_PREFIX.'organization as t2','t2.orgn_id = t1.organization', 'left')->from(DB_PREFIX.'member as t1'); */
		/* $this->datatables->select('id,member_id,employee_id,member_name,gender,age,coverage_period,start_date,end_date,status,organization_name')->from(DB_PREFIX.'member'); */
		
		
		$this->datatables->select('ch_member.id,ch_member.member_id,ch_member.employee_id,ch_member.member_name,ch_member.gender,ch_member.age,ch_member.coverage_period,ch_member.start_date,ch_member.end_date,ch_member.status,ch_member.organization_name,ch_coverage.coverage_amount')
		->join(DB_PREFIX.'coverage', DB_PREFIX.'coverage.coverage_name = '.DB_PREFIX.'member.coverage_period', 'left' )
		/* ->join(DB_PREFIX.'bill', DB_PREFIX.'bill.member_id = '.DB_PREFIX.'member.employee_id', 'left' ) */
		-> from(DB_PREFIX.'member');
		
		
		
				
		$data = json_decode($this->datatables->generate("json"), true);
		/* foreach($data['data'] as $key => $ele){
			$ele['action'] = $this->option_action_link($ele['id']);
			$ele['total'] = $this->balance_link($ele['employee_id'],$ele['coverage_amount']); 	
			$data['data'][$key] = $ele;
		} */
    	echo json_encode($data);
		
    }
	
	
	
	
	function login(){  
     	$this->load->view('login');		
	}//end function
	
	public function verifylogin(){  
    	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
				
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'username', 		'label'   => 'User Name',				'rules'   => 'trim|xss_clean|valid_email|required'),
				array('field'   => 'password', 		'label'   => 'Password',				'rules'   => 'trim|xss_clean|required'),
								  
        );
				
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{			
			
			/*$password= password_hash($password);*/
			$password= md5($password);
			$result = $this->adminlogin->login($username, $password);
			
			if($result){		
				$sess_array = array();
				foreach($result as $row){
					$sess_array = array(
						'id' => $row->id,
						'user_login' => $row->username,
						'display_name' => $row->first_name.' '.$row->last_name,
						'user_type' => $row->user_group,
						'center_id' => $row->center_id
						);
					$this->session->set_userdata('sht_ssndata', $sess_array);
				}
				echo $errors_array.'Login Successfully';
				//for user login log
				$user_note_date = $this->config->item('CUR_D_T');
				$user_note = 'In '.$user_note_date;
				$user_log_data = array(
					'User_Login' => $username,
					'Login_Note' => $user_note
				);
				$this->adminlogin->user_log($user_log_data);
				//end user login log
			}else{
				echo $errors_array.'Invalid username or password';
			}
												
		}
			
	}//end function
	
	
	function check_database($password){
  
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		$password= md5($password);
		
		// $type = $this->input->post('type');
		//query the database
		$result = $this->adminlogin->login($username, $password);
		
		if($result){		
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id' => $row->id,
					'user_login' => $row->username,
					'display_name' => $row->first_name.' '.$row->last_name,
					'user_type' => $row->user_group,
					'center_id' => $row->center_id
					);
				$this->session->set_userdata('sht_ssndata', $sess_array);
			}
			return TRUE;
		}else{
			$this->form_validation->set_message('check_database', 'Invalid username, password or Type');
			return false;
		}
		
  	}//end function
		
	
	function logout(){
		$this->session->unset_userdata('logged_in');
		//session_destroy();
		$session_data = $this->session->userdata('sht_ssndata');
		$username = $session_data['user_login'];
		$user_note_date = $this->config->item('CUR_D_T');
		$user_note = 'Out '.$user_note_date;
		$user_log_data = array(
			'User_Login' => $username,
			'Login_Note' => $user_note
		);
		$this->adminlogin->user_log($user_log_data);
		
		redirect( base_url('auth/login') , 'refresh');
	}

	function clearcache(){    	
		$this->output->clear_all_cache();
		redirect('auth', 'refresh');		
  	} //End of function

	
	
	function profile(){
		//print_r($this->session->userdata('sht_ssndata'));exit;
		if($this->session->userdata('sht_ssndata')){
    	
			$session_data = $this->session->userdata('sht_ssndata');			
			$metadata = array(
				'title' => 'Profile',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			
			$userid=$session_data['id'];
			$data["profile_data"] = $this->adminlogin->get_userprofile($userid);			
			$this->load->view('profile',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('auth/login', 'refresh');
		}
		
	}
	
	function profile_update(){
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'Profile',
			'heading' => 'Profile',
			'description' => 'Admin Home',
			'keywords' => 'Admin Home',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'page' => 'post',				
			);
		$data["metadata"] = $metadata;
		$user_group = $this->adminlogin->get_usergroup();
		foreach($user_group as $row){
			$data['groupes'][$row->Usergroup_Id]=$row->Usergroup_Head;
		}
		$data["groupes"] = $data['groupes'];
		$userid=$session_data['id'];
		$data["profile_data"] = $this->adminlogin->get_userprofile($userid);	
		$data["updateform_database"] = 'admin/update_user_data';					
		$this->load->view('userupdate', $data);
	}
	
	
	public function update_user_data($userid){		
		//$this->is_ajax();
		
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'Usergroup_Id', 'label'   => 'User Group', 'rules'   => 'trim|xss_clean|required'),
				//array('field'   => 'User_Login', 'label'   => 'User Name', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'Display_Name', 'label'   => 'Display Name', 'rules'   => 'trim|xss_clean|required'),
				
        );
		
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{	
		  //Setting values for tabel columns
		  $data = array(
			
			'Usergroup_Id' => $this->input->post('Usergroup_Id'),
			//'User_Login' => $this->input->post('User_Login'),
			'Display_Name' => $this->input->post('Display_Name'),
			'Contact_No' => $this->input->post('Contact_No'),
			'User_Email' => $this->input->post('User_Email'),
			'User_Address' => $this->input->post('User_Address'),
			//'User_Image' => $image_name,
					  
		  );
		  //Transfering data to Model
		  $this->adminlogin->user_update($userid,$data);
		  if(!empty($_FILES["uploadfile"]["name"])){		
					$path=APPPATH.'../user/images/users';
					$userfile_name = $_FILES['uploadfile']['name'];
					$extension = substr($userfile_name, strrpos($userfile_name, '.')+1);
					
					$image_name = 'admin'. '-' . rand().'.'.$extension;
					$file = $path .'/'.$image_name; 								
					move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file) ;
					
					$data = array(				
							'User_Image' => $image_name,
						);
						$this->adminlogin->user_update($userid,$data);
				}
		  if(!empty($this->input->post('User_Password'))){
			  $data = array(				
							'User_Password' => md5($this->input->post('User_Password')),
						);
						$this->adminlogin->user_update($userid,$data);
		  }
		  
		  echo $errors_array.'Update Successfully';			
		}
		
	}

	
	
	
	
	
		
}

?>