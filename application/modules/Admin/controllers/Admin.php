<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
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
		//$data['main_content'] = 'dashboard';
		//$this->load->view('dashboard', $data);
		
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
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			
			
			
			$data["latest_st"] = $this->adminlogin->get_studentDashboard();
			$this->load->view('dashboard',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('admin/login', 'refresh');
		}
		
	}
	
	
	
	function login(){  
     	$this->load->view('auth-login');
     	/*$this->load->view('maintenance');	*/
	}//end function
	
	public function verifylogin(){  
    	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
				
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'username', 		'label'   => 'User Name',				'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'password', 		'label'   => 'Password',				'rules'   => 'trim|xss_clean|required'),
								  
        );
				
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{			
			
			$password= md5($password);
			$result = $this->adminlogin->login($username, $password);
			
			if($result){		
				$sess_array = array();
				foreach($result as $row){
					$sess_array = array(
						'id' => $row->Admin_Id,
						'user_login' => $row->User_Login,
						'display_name' => $row->Display_Name,
						'user_image' => $row->User_Image,
						'user_type' => $row->Usergroup_Id
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
					'id' => $row->user_id,
					'user_login' => $row->user_login,
					'display_name' => $row->display_name,
					'user_image' => $row->User_Image,
					'user_type' => $row->user_type
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
		
		$session_data = $this->session->userdata('sht_ssndata');
		$username = $session_data['user_login'];
		$user_note_date = $this->config->item('CUR_D_T');
		$user_note = 'Out '.$user_note_date;
		$user_log_data = array(
			'User_Login' => $username,
			'Login_Note' => $user_note
		);
		$this->adminlogin->user_log($user_log_data);
		session_destroy();
		redirect( base_url('admin/login') , 'refresh');
	}

	function clearcache(){    	
		$this->output->clear_all_cache();
		redirect('admin', 'refresh');		
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
      		redirect('admin/login', 'refresh');
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

	/*---- student list ----*/
	function students(){
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
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			$data["latest_st"] = $this->adminlogin->get_studentList();
			$this->load->view('studentlist',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('admin/login', 'refresh');
		}
		
	}

	function studentsExl(){
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
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			$data["latest_st"] = $this->adminlogin->get_studentList();
			$this->load->view('students_exl',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('admin/login', 'refresh');
		}
		
	}
	
	function editstudents($id){
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
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			$data["stid"] = $id;	
			/*$data["latest_st"] = $this->adminlogin->get_studentList();*/
			$data["st_data"] = $this->adminlogin->get_studentdata($id);
			$this->load->view('student_edit',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('admin/login', 'refresh');
		}
		
	}



	public function editstudent_data($id){		
		
		$session_data = $this->session->userdata('sht_ssndata');	

		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'title', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'));
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
        		
				$data = array(
					'st_name'=>$this->input->post('title'),
					'st_email'=>$this->input->post('st_email'),
					'student_id'=>$this->input->post('student_id'),
					'rtc_number'=>$this->input->post('rtc_number'),
					'phone'=>$this->input->post('phone'),
					'batch'=>$this->input->post('batch'),
				);
				/*print_r($data);exit;*/
				//Transfering data to Model
				$this->adminlogin->regi_update($id,$data);

				
				echo $errors_array.'Update Successfully';
		}
	}
	
	function resetstudents($id){
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
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			$data["stid"] = $id;	
			/*$data["latest_st"] = $this->adminlogin->get_studentList();*/
			$data["st_data"] = $this->adminlogin->get_studentdata($id);
			$this->load->view('reset',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('admin/login', 'refresh');
		}
		
	}

	public function resetstudent_data($id){		
		
		$session_data = $this->session->userdata('sht_ssndata');	

		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'stpassword', 'label'   => 'Password', 'rules'   => 'trim|xss_clean|required'));
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
        		
				$data = array(
					'password'=>sha1($this->input->post('stpassword')),					
					'st_status'=>$this->input->post('publish'),
					'login_attempt'=>0,
				);
				/*print_r($data);exit;*/
				//Transfering data to Model
				$this->adminlogin->regi_update($id,$data);

				
				echo $errors_array.'Update Successfully';
		}
	}

	function ece_allow($id,$status)  
      {
      	$data = array(
					'ece_status'=>$status,
				);

      	/*print_r($stid);exit;*/
           $this->adminlogin->regi_update($id,$data);  
          /* echo json_encode(array("status" => TRUE));*/
           echo 'Data Updated';  
      }
		
}

?>