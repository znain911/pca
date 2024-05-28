<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends Ci_Controller {
	function __construct(){  	
		parent::__construct();
		
		if($this->session->userdata('sht_ssndata')){			
			
			$this->load->model('a_settings_m');
			
			$this->load->library('tags');
			$this->load->library('imagecrop');
			
			$this->load->library('forminput');			
			$this->load->library('form_validation');
			
			$this->load->library('datatables');
        	//$this->load->library('table');
			$this->load->library('Querylib');
			$this->load->library('form_engine');
			$this->load->library('sendmaillib');
			$this->load->library('email');
					
		}else{
			//If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}		
  	}

  	

	public function registration_control(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'User Group List',
			'description' => '',
			'keywords' => '',
			'heading' => 'User Group',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],			
			'page' => 'postlist',				
			);
		$data["metadata"] = $metadata;	
		$data["sdl_data"] = $this->a_settings_m->get_registration_control(1);
							
		$this->load->view('registration_control', $data);
		
	}


	public function ediregi_control_data(){		
		
		$session_data = $this->session->userdata('sht_ssndata');

		$id = 1;	

		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'publish', 'label'   => 'Status', 'rules'   => 'trim|xss_clean|required'),
				);
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				$data = array(
					'status'=>$this->input->post('publish'),
				);
				/*print_r($data);exit;*/
				//Transfering data to Model
				$this->a_settings_m->registration_control_update($id,$data);

				
				echo $errors_array.'Update Successfully';
		}
	}
	
	public function studentotp(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'User Group List',
			'description' => '',
			'keywords' => '',
			'heading' => 'User Group',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],			
			'page' => 'postlist',				
			);
		$data["metadata"] = $metadata;	
		
		/*$data["sid"] = $id;	*/
		$data["otp_list"] = $this->a_settings_m->getotp();
							
		$this->load->view('stotp', $data);
		
	}
	public function studentotp2(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'User Group List',
			'description' => '',
			'keywords' => '',
			'heading' => 'User Group',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],			
			'page' => 'postlist',				
			);
		$data["metadata"] = $metadata;	
		
		/*$data["sid"] = $id;	*/
		$data["otp_list"] = $this->a_settings_m->getotp();
							
		$this->load->view('studentotp', $data);
		
	}
	
	
	public function emailtest(){
		$this->sendmaillib->from('info@cthealth-bd.com');
		$this->sendmaillib->to('md.sazedul.haque@cthealth-bd.com');
		$this->sendmaillib->subject('Email Test');
		$this->sendmaillib->content('Testing the email class');
		$this->sendmaillib->send();

		echo $this->sendmaillib->print_debugger();
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
	

	
} // End Class

?>