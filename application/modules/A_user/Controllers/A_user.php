<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A_user extends Ci_Controller {

  	
	var $usergroup_list = 'a_user/genajaxusergrouplist';
	var $usergroup_delete = 'a_user/usergroup_delete';
	var $usergroup_update = 'a_user/usergroup_update';
	var $country_status = 'a_user/country_status';
	var $new_usergroup ='a_user/new_usergroup';
	
	
	function __construct(){  	
		parent::__construct();
		
		if($this->session->userdata('sht_ssndata')){			
			
			$this->load->model('a_user_m');
			
			$this->load->library('tags');
			$this->load->library('imagecrop');
			
			$this->load->library('forminput');			
			$this->load->library('form_validation');
			$this->load->library('Querylib');
			$this->load->library('datatables');
        	//$this->load->library('table');
			
			$this->load->library('form_engine');
					
		}else{
			//If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}		
  	}

  		
	
	public function index(){
		
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
		
		$data["ajaxlist"] = $this->usergroup_list;
		$data["data_delete"] = $this->usergroup_delete;
		$data["data_edit"] = $this->usergroup_update;
		$data["data_status"] = $this->country_status;
		$data["newform"] = $this->new_usergroup;
				
		$data["field_name_as_header"] = array('Usergroup_Head','action');
							
		$this->load->view('list', $data);
		
	}	
	  	
    //function to handle callbacks
    function genajaxusergrouplist()
    {
        $this->is_ajax();		
		
		$this->datatables->select('Usergroup_Id,Usergroup_Head')
		-> from(DB_PREFIX.'admin_user_group');
				
		$data = json_decode($this->datatables->generate("json"), true);
		foreach($data['data'] as $key => $ele){
			//$ele['status'] = $this->country_status_link($ele['id'],$ele['post_status']);
			$ele['action'] = $this->usergroup_action_link($ele['Usergroup_Id']); 
			$data['data'][$key] = $ele;
		}
    	echo json_encode($data);
		
    }
	
	//function for action link
	function usergroup_action_link($id)
	{
		
		$html = '<span class="actions">';
		$html .= '<a class="btn btn-success" title="Edit" href="javascript:void(0)" onclick="edit_record('."'".$id."'".')"><i class="fa fa-edit"></i></a> ';
		$html .= '<a class="btn btn-success" title="Delete" href="javascript:void(0)" onclick="delete_record('."'".$id."'".')"><i class="fa fa-times"></i></a>';
		$html .= '</span>';
	 
		return $html;
	}
	//
	
	public function usergroup_delete($id)
    {
        
		$this->a_user_m->usergroup_delete($id);
        echo json_encode(array("status" => TRUE));
    }
	

	//function for adding new country
	
	public function new_usergroup(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'New User Group',
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
			'page' => 'post',				
			);
		$data["metadata"] = $metadata;
		
		
		$data["listform"] = 'a_user';
		$data["newform_database"] = 'a_user/new_usergroup_data';
							
		$this->load->view('new', $data);
		
	}
	
	
	public function new_usergroup_data(){		
		//$this->is_ajax();
			
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'Usergroup_Head', 'label'   => 'User Group Name', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{			
			$ugroup_name = $this->input->post('Usergroup_Head');			
			$exists = $this->a_user_m->check_usergroup($ugroup_name);			
			if( $exists==0 ){ 
				
				//Setting values for tabel columns
				$data = array(
					'Usergroup_Head' => $ugroup_name
				);
				//Transfering data to Model
				$id = $this->a_user_m->usergroup_insert($data);
				echo $errors_array.'Added Successfully';
			}else
				echo $errors_array.'User Group Exists';
			
		}
	}
	
	
	public function usergroup_update($id){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'Update User Group',
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
			'page' => 'post',				
			);
		$data["metadata"] = $metadata;
		
		$data["edit_info"] = $this->a_user_m->one_row($id);
		$data["id"] = $id;
		
		$data["listform"] = 'a_user';
		$data["updateform_database"] = 'a_user/update_usergroup_data';		
							
		$this->load->view('update', $data);
		
	}	

	public function update_usergroup_data($id){		
		$this->is_ajax();
		
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'Usergroup_Head', 'label'   => 'User Group Name', 'rules'   => 'trim|xss_clean|required')
        );
				
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{			
			
			$ugroup_name = $this->input->post('Usergroup_Head');			
			$exists = $this->a_user_m->check_usergroup($ugroup_name);				
			if( $exists==0 or $exists==$id){ 
				
				$postinfo = $this->a_user_m->one_row($id);
				
				//Setting values for tabel columns
				$data = array(
					'Usergroup_Head' => $ugroup_name					
				);
				
				//Transfering data to Model
				$id = $this->a_user_m->usergroup_update($id,$data);
				
				echo $errors_array.'Update Successfully';
				
			}else
				echo $errors_array.'User Group Exists';
			
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
	

	
} // End Class

?>