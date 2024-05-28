<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A_usergroup extends Ci_Controller {

  	
	var $usergroup_list = 'a_usergroup/genajaxusergrouplist';
	var $usergroup_delete = 'a_usergroup/usergroup_delete';
	var $usergroup_update = 'a_usergroup/usergroup_update';	
	var $new_usergroup ='a_usergroup/new_usergroup';
	
	var $user_list = 'a_usergroup/genajaxuserlist';
	var $user_delete = 'a_usergroup/user_delete';
	var $new_user ='a_usergroup/new_user';
	var $user_status = 'a_usergroup/user_status';
	var $user_update = 'a_usergroup/user_update';	
	var $userlog_list = 'a_usergroup/genajaxuserloglist';
	function __construct(){  	
		parent::__construct();
		
		if($this->session->userdata('sht_ssndata')){			
			$this->lang->load('userGroup', $this->config->item('language'));
			$this->load->model('a_usergroup_m');
			
			$this->load->library('tags');
			$this->load->library('imagecrop');
			
			$this->load->library('forminput');			
			$this->load->library('form_validation');
			
			$this->load->library('datatables');
        	//$this->load->library('table');
			$this->load->library('Querylib');
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
        
		$this->a_usergroup_m->usergroup_delete($id);
        echo json_encode(array("status" => TRUE));
    }
	

	//function for adding new user group
	
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
		
		
		$data["listform"] = 'a_usergroup';
		$data["newform_database"] = 'a_usergroup/new_usergroup_data';
							
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
			$exists = $this->a_usergroup_m->check_usergroup($ugroup_name);			
			if( $exists==0 ){ 
				
				//Setting values for tabel columns
				$data = array(
					'Usergroup_Head' => $ugroup_name
				);
				//Transfering data to Model
				$id = $this->a_usergroup_m->usergroup_insert($ugroup_name);
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
		
		$data["edit_info"] = $this->a_usergroup_m->one_row($id);
		$data["id"] = $id;
		
		$data["listform"] = 'a_usergroup';
		$data["updateform_database"] = 'a_usergroup/update_usergroup_data';		
							
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
			$exists = $this->a_usergroup_m->check_usergroup($ugroup_name);				
			if( $exists==0 or $exists==$id){ 
				
				$postinfo = $this->a_usergroup_m->one_row($id);
				
				//Setting values for tabel columns
				$data = array(
					'Usergroup_Head' => $ugroup_name					
				);
				
				//Transfering data to Model
				$id = $this->a_usergroup_m->usergroup_update($id,$data);
				
				echo $errors_array.'Update Successfully';
				
			}else
				echo $errors_array.'User Group Exists';
			
		}
	}	
	
	public function user(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'User List',
			'description' => '',
			'keywords' => '',
			'heading' => 'User',
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
		
		$data["ajaxlist"] = $this->user_list;
		$data["data_delete"] = $this->user_delete;
		$data["data_edit"] = $this->user_update;
		$data["data_status"] = $this->user_status;
		$data["newform"] = $this->new_user;
				
		$data["field_name_as_header"] = array('User_Login','Usergroup_Head','Display_Name','User_Email','status','action');
							
		$this->load->view('userlist', $data);
		
	}
	//function to handle callbacks
    function genajaxuserlist()
    {
        $this->is_ajax();		
		
		$this->datatables->select('ch_admin_user_group.Usergroup_Head,ch_admin_user.Admin_Id,ch_admin_user.User_Login,ch_admin_user.Display_Name,ch_admin_user.User_Email,ch_admin_user.User_Status')
		->join(DB_PREFIX.'admin_user_group', DB_PREFIX.'admin_user_group.Usergroup_Id = '.DB_PREFIX.'admin_user.Usergroup_Id', 'left' )
		-> from(DB_PREFIX.'admin_user');
				
		$data = json_decode($this->datatables->generate("json"), true);
		foreach($data['data'] as $key => $ele){
			$ele['status'] = $this->user_status_link($ele['Admin_Id'],$ele['User_Status']);
			$ele['action'] = $this->user_action_link($ele['Admin_Id']); 
			$data['data'][$key] = $ele;
		}
    	echo json_encode($data);
		
    }
	
	//function for action link
	function user_action_link($id)
	{
		
		$html = '<span class="actions">';
		$html .= '<a class="btn btn-success" title="Edit" href="javascript:void(0)" onclick="edit_record('."'".$id."'".')"><i class="fa fa-edit"></i></a> ';
		$html .= '<a class="btn btn-success" title="Delete" href="javascript:void(0)" onclick="delete_record('."'".$id."'".')"><i class="fa fa-times"></i></a>';
		$html .= '</span>';
	 
		return $html;
	}
	//
	
	public function user_delete($id)
    {
        
		$this->a_usergroup_m->user_delete($id);
        echo json_encode(array("status" => TRUE));
    }
	
	function user_status_link($id,$User_Status)
	{
				
		if($User_Status==1)
			$html = '<div class="btn-group">
						<button type="button" data-toggle="dropdown" class="btn btn-success dropdown-toggle">'.$this->lang->line('Active').'
						&nbsp;<span class="caret"></span></button>
						<ul role="menu" class="dropdown-menu">
						  <li><a href="javascript:void()" title="Delete" onclick="action_status('."'".$id."','0'".')">'.$this->lang->line('Set_Iactive').'</a></li>
						</ul>
					 </div>';
		
		else
			$html = '<div class="btn-group">
						<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">'.$this->lang->line('Inactive').'
						&nbsp;<span class="caret"></span></button>
						<ul role="menu" class="dropdown-menu">
						  <li><a href="javascript:void()" title="Delete" onclick="action_status('."'".$id."','1'".')">'.$this->lang->line('Make_Active').'</a></li>
						</ul>
					 </div>';		
	 
		return $html;
	}
	
	public function user_status($id,$User_Status)
    {   
		$data = array(				
			'User_Status' => $User_Status
		);
		$this->a_usergroup_m->user_update($id,$data);
        echo json_encode(array("status" => TRUE));
    }
	
	
	
	
	
	
	public function new_user(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'New User',
			'description' => '',
			'keywords' => '',
			'heading' => 'User',
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
        
        /*-- get user group --*/
		$user_group = $this->a_usergroup_m->get_usergroup();
		$data["usergroup_h"] = array(
			'' => 'Select User Group'
		); 
		foreach($user_group as $row){
			$data['groupes'][$row->Usergroup_Id]=$row->Usergroup_Head;
		}
		$data["groupes"] =  $data["usergroup_h"] + $data['groupes'];
		
		/*-- get user Designation --*/
		$user_designation = $this->a_usergroup_m->get_desig();
		$data["designation_h"] = array(
			'' => 'Select Designation'
		); 
		foreach($user_designation as $desi){
			$data['designations'][$desi->Desiid]=$desi->DesignationTitle;
		}
		$data["designations"] =  $data["designation_h"] + $data['designations'];
		
		
		$data["listform"] = 'a_usergroup/user';
		$data["newform_database"] = 'a_usergroup/new_user_data';
							
		$this->load->view('usernew', $data);
		
	}
	public function new_user_data(){		
		//$this->is_ajax();
			
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'Usergroup_Id', 'label'   => 'User Group', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'User_Login', 'label'   => 'User Name', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'Display_Name', 'label'   => 'Display Name', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'User_Password', 'label'   => 'Password', 'rules'   => 'trim|xss_clean|required'),
				
        );
		
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
			
			if(!empty($_FILES["uploadfile"]["name"])){		
					$path=APPPATH.'../user/images/users';
					$userfile_name = $_FILES['uploadfile']['name'];
					$extension = substr($userfile_name, strrpos($userfile_name, '.')+1);
					
					$image_name = 'admin'. '-' . rand().'.'.$extension;
					$file = $path .'/'.$image_name; 								
					move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file) ;
				}
				
		  //Setting values for tabel columns
		  $data = array(
			
			'Usergroup_Id' => $this->input->post('Usergroup_Id'),
			'User_Login' => $this->input->post('User_Login'),
			'User_Password' => md5($this->input->post('User_Password')),
			'Display_Name' => $this->input->post('Display_Name'),			
			'Contact_No' => $this->input->post('Contact_No'),
			'User_Email' => $this->input->post('User_Email'),
			'User_Address' => $this->input->post('User_Address'),
			'User_Image' => $image_name,
			//$file
			//$this->config->item('CUR_D'),
			//$this->input->post('uploadfile')		  
		  );
		  //Transfering data to Model
		  $id = $this->a_usergroup_m->user_insert($data);
		  echo $errors_array.'Added Successfully';			
		}
		
	}
	
	public function user_update($id){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'Update User',
			'description' => '',
			'keywords' => '',
			'heading' => 'User',
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
		$user_group = $this->a_usergroup_m->get_usergroup();
		/*$data["usergroup_h"] = array(
			'' => 'Select User Group'
		);*/ 
		foreach($user_group as $row){
			$data['groupes'][$row->Usergroup_Id]=$row->Usergroup_Head;
		}
		$data["groupes"] = $data['groupes'];
		$data["edit_info"] = $this->a_usergroup_m->one_row_user($id);
		$data["id"] = $id;
		
		$data["listform"] = 'a_usergroup/user';
		$data["updateform_database"] = 'a_usergroup/update_user_data';		
							
		$this->load->view('userupdate', $data);
		
	}	
	
	public function update_user_data($id){		
		//$this->is_ajax();
			
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'Usergroup_Id', 'label'   => 'User Group', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'User_Login', 'label'   => 'User Name', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'Display_Name', 'label'   => 'Display Name', 'rules'   => 'trim|xss_clean|required'),
				
        );
		
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{	
		  //Setting values for tabel columns
		  $data = array(
			/*$this->input->post('Usergroup_Id'),
			$this->input->post('User_Login'),
			$this->input->post('User_Password'),
			$this->input->post('Display_Name'),			
			$this->input->post('Contact_No'),
			$this->input->post('User_Email'),
			$this->input->post('User_Address'),
			$image_name,*/
			//$file
			//$this->config->item('CUR_D'),
			//$this->input->post('uploadfile')
			'Usergroup_Id' => $this->input->post('Usergroup_Id'),
			'User_Login' => $this->input->post('User_Login'),
			'Display_Name' => $this->input->post('Display_Name'),
			'Contact_No' => $this->input->post('Contact_No'),
			'User_Email' => $this->input->post('User_Email'),
			'User_Address' => $this->input->post('User_Address'),
			//'User_Image' => $image_name,
					  
		  );
		  //Transfering data to Model
		  $this->a_usergroup_m->user_update($id,$data);
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
						$this->a_usergroup_m->user_update($id,$data);
				}
		  
		  echo $errors_array.'Update Successfully';			
		}
		
	}
	
	
	//user log data
	public function userlog(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'User Log List',
			'description' => '',
			'keywords' => '',
			'heading' => 'User Log',
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
		
		$data["ajaxlist"] = $this->userlog_list;
		
		$data["field_name_as_header"] = array('Id','User_Login','Login_Note');
							
		$this->load->view('userlog', $data);
		
	}	
	  	
    //function to handle callbacks
    function genajaxuserloglist()
    {
        $this->is_ajax();		
		
		$this->datatables->select('Id,User_Login,Login_Note')
		-> from(DB_PREFIX.'admin_users_log');
				
		$data = json_decode($this->datatables->generate("json"), true);
		
    	echo json_encode($data);
		
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