<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A_member extends Ci_Controller {
	
	
	/*---- members -----*/
	var $member_list = 'a_member/genajaxmemberlist';
	var $member_delete = 'a_member/member_delete';
	var $member_update = 'a_member/member_update';
	var $member_status = 'a_member/member_status';
	var $new_member ='a_member/new_member';
	
	function __construct(){  	
		parent::__construct();
		
		if($this->session->userdata('sht_ssndata')){			
			$this->lang->load('option', $this->config->item('language'));
			$this->load->model('a_member_m');
			$this->load->model('member_model');
			$this->load->library('tags');
			$this->load->library('imagecrop');
			
			$this->load->library('forminput');			
			$this->load->library('form_validation');
			
			$this->load->library('datatables');
			$this->load->library('Querylib');
        	//$this->load->library('table');
			$this->load->library('excel');
			
			$this->load->library('form_engine');
					
		}else{
			//If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}		
  	}

/*--------- member list -------*/
  	public function index(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'Member',
			'description' => '',
			'keywords' => '',
			'heading' => 'Member',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],			
			'page' => 'optionlist',				
			);
		$data["metadata"] = $metadata;
		
		$data["ajaxlist"] = $this->member_list;
		$data["data_delete"] = $this->member_delete;
		$data["data_edit"] = $this->member_update;
		$data["data_status"] = $this->member_status;
		$data["newform"] = $this->new_member;

		$data["totalmember"] = $this->a_member_m->count_member();
		$data["factory_list"] = $this->a_member_m->get_category();
		$data["get_mbryear"] = $this->member_model->get_MemberYearList();
				
		/*$data["field_name_as_header"] = array('employee_id','member_name','gender','age','organization_name','coverage_period','start_date','end_date','coverage_amount','total','action');*/

		$data["memberlist"] = $this->a_member_m->get_memberlist();
			
							
		$this->load->view('member_table', $data);
		
	}

	public function memberajax_list()
	{
		/*$smd['countriesl'] = $this->Member_model->get_list_countries();
		*/
		$opt = array();
		/* foreach ($countries as $country) {$country->country_name;} */
		
		$testvlu = 'dfdf';
		
		$list = $this->member_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $customers) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $customers->employee_id;
			$row[] = $customers->member_name;
			$row[] = $customers->gender;
			$row[] = $customers->age;
			$row[] = $customers->organization_name;
			$row[] = $customers->coverage_period;
			$row[] = $customers->start_date;
			$row[] = $customers->end_date;
			$row[] = $customers->coverage_amount;
			$row[] = $this->member_model->get_avl_balance($customers->employee_id,$customers->coverage_amount,$customers->start_date,$customers->end_date);
			//$row[] = (strtotime($customers->end_date) - strtotime(date("Y-m-d"))) / (60 * 60 * 24);						
			$row[] = $this->renew_action_link($customers->id, $customers->end_date);
			$row[] = $this->option_action_link($customers->id);

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->member_model->count_all(),
						"recordsFiltered" => $this->member_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	function renew_action_link($id, $enddate)
	{
		$dayleft = (strtotime($enddate) - strtotime(date("Y-m-d"))) / (60 * 60 * 24);

		$session_data = $this->session->userdata('sht_ssndata');
		if($session_data['user_type']==1){
			$dsbl = '';
		}else{
			$dsbl = 'disabled';
		}
		if($dayleft > 0){
			$html = '<span class="actions">'.$dayleft.' Days Left';			
			$html .= '</span>';
			return $html;
		}else{
			$html = '<span class="actions">';
			$html .= '<a class="btn btn-info '.$dsbl.'" title="Edit" href="'.base_url('a_member/renew_coveragebymember/').$id.'"><i class="fa fa-edit"></i> Renew</a> ';
			$html .= '</span>';
		 
			return $html;
		}
		
	}


	function fetch_data(){
          $data = $this->a_member_m->make_query();
          $array = array();
          foreach($data as $row){
           $array[] = $row;
          }
          $output = array(
           'current'  => intval($_POST["current"]),
           'rowCount'  => 10,
           'total'   => intval($this->a_member_m->count_all_data()),
           'rows'   => $array
          );
          echo json_encode($output);
     }
	
	public function new_member(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'New Member',
			'description' => '',
			'keywords' => '',
			'heading' => 'Member',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'page' => 'neworganization',				
			);
		$data["metadata"] = $metadata;
		
		$category = $this->a_member_m->get_category();
		$data["category_h"] = array(
			'' => 'Select Organization'
		); 
		foreach($category as $row){
			$data["categorylist2"][$row->organization_head]=$row->organization_head;
		}
		$data["categorylist"] =  $data["category_h"] + $data["categorylist2"];

		$coverage = $this->a_member_m->get_coverage();
		$data["coverage_h"] = array(
			'' => 'Select Coverage'
		); 
		foreach($coverage as $row2){
			$data["coveragedata"][$row2->coverage_name]=$row2->coverage_name;
		}
		$data["coveragelist"] =  $data["coverage_h"] + $data["coveragedata"]; 
        
        
		$data["optionlistform"] = 'a_member';
		$data["newform_database"] = 'a_member/new_member_data';
							
		$this->load->view('new', $data);
		
	}
	
	
	public function new_member_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'member_name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'age', 'label'   => 'Age', 'rules'   => 'trim|xss_clean|max_length[2]|required|numeric'),
				array('field'   => 'organization', 'label'   => 'Organization', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'coverage_period', 'label'   => 'coverage period', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'start_date', 'label'   => 'start date', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'employee_id', 'label'   => 'employee id', 'rules'   => 'trim|xss_clean|required|is_unique[ch_member.employee_id]'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				$startdate = $this->input->post('start_date');
				$cp = $this->input->post('coverage_period');
				
				$d = strtotime($cp,strtotime($startdate));
					//echo   date("Y-m-d",$d);
			 
				//Setting values for tabel columns
				$data = array(
					'member_name' => $this->input->post('member_name'),
					'head_slug' => $this->tags->setslug($this->input->post('member_name')),
					'organization_name' => $this->input->post('organization'),
					'employee_id' => $this->input->post('employee_id'),
					'age' => $this->input->post('age'),
					'gender' => $this->input->post('gender'),
					'department' => $this->input->post('department'),
					'contact_no' => $this->input->post('contact_no'),
					'designation' => $this->input->post('designation'),
					'coverage_period' => $this->input->post('coverage_period'),
					'start_date' => $this->input->post('start_date'),
					'end_date' => date("Y-m-d",$d),
					'descriptions' => $this->input->post('descriptions'),
					'added_by' => $session_data['id']
				);
				//Transfering data to Model
				$id = $this->a_member_m->member_insert($data);				
				
				$mbr_id = 'UHCP'.date('mY').$id;				
				$data2 = array(				
							'member_id' => $mbr_id,
						);
				$this->a_member_m->member_update($id,$data2);				
				
				echo $errors_array.'Added Successfully';				
			
		}
	}
	
	
	public function member_update($id){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'Member',
			'description' => '',
			'keywords' => '',
			'heading' => 'Member',
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
		
		$data["edit_info"] = $this->a_member_m->one_row_member($id);
		$data["id"] = $id;
        
        $category = $this->a_member_m->get_category();
		$data["category_h"] = array(
			'' => 'Select Type'
		); 
		foreach($category as $row){
			$data["categorylist2"][$row->organization_head]=$row->organization_head;
		}
		$data["categorylist"] =  $data["category_h"] + $data["categorylist2"];
		
		$coverage = $this->a_member_m->get_coverage();
		$data["coverage_h"] = array(
			'' => 'Select Coverage'
		); 
		foreach($coverage as $row2){
			$data["coveragedata"][$row2->coverage_name]=$row2->coverage_name;
		}
		$data["coveragelist"] =  $data["coverage_h"] + $data["coveragedata"]; 
		
		$data["mmbrlistform"] = 'a_member';
		$data["updateform_database"] = 'a_member/update_member_data';		
							
		$this->load->view('update', $data);
		
	}	

	public function update_member_data($id){		
		/*$this->is_ajax();*/
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'member_name', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'organization', 'label'   => 'Organization', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'age', 'label'   => 'Age', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'coverage_period', 'label'   => 'coverage period', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'start_date', 'label'   => 'start date', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'employee_id', 'label'   => 'employee id', 'rules'   => 'trim|xss_clean|required'),
        );
				
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{			
			
				$startdate = $this->input->post('start_date');
				$cp = $this->input->post('coverage_period');				
				$d = strtotime($cp,strtotime($startdate));
					//echo   date("Y-m-d",$d); 				
				
				//Setting values for tabel columns
				$data = array(
					'member_name' => $this->input->post('member_name'),
					'head_slug' => $this->tags->setslug($this->input->post('member_name')),
					'organization_name' => $this->input->post('organization'),
					'employee_id' => $this->input->post('employee_id'),
					'gender' => $this->input->post('gender'),
					'age' => $this->input->post('age'),
					'department' => $this->input->post('department'),
					'contact_no' => $this->input->post('contact_no'),
					'designation' => $this->input->post('designation'),
					'coverage_period' => $this->input->post('coverage_period'),
					'start_date' => $this->input->post('start_date'),
					'end_date' => date("Y-m-d",$d),
					'descriptions' => $this->input->post('descriptions'),
					'added_by' => $session_data['id']
				);
				
				//Transfering data to Model
				$this->a_member_m->member_update($id,$data);			
				
				echo $errors_array.'Update Successfully';
				
			
		}
	}
	
	//function for action link
	function option_action_link($id)
	{
		$session_data = $this->session->userdata('sht_ssndata');
		if($session_data['user_type']==1){
			$dsbl = '';
		}else{
			$dsbl = 'disabled';
		}
		$html = '<span class="actions">';
		$html .= '<a class="btn btn-success '.$dsbl.'" title="Edit" href="javascript:void(0)" onclick="edit_record('."'".$id."'".')"><i class="fa fa-edit"></i> Edit</a> ';
		$html .= '<a class="btn btn-danger '.$dsbl.'" title="Delete" href="javascript:void(0)" onclick="delete_record('."'".$id."'".')"><i class="fa fa-times"></i> Delete</a>';
		$html .= '</span>';
	 
		return $html;
	}
	
	
	
	//
	/* function option_status_link($id,$status)
	{
				
		if($status==1)
			$html = '<div class="btn-group">
						<button type="button" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Active
						&nbsp;<span class="caret"></span></button>
						<ul role="menu" class="dropdown-menu">
						  <li><a href="javascript:void()" title="Delete" onclick="action_status('."'".$id."','0'".')">Make Inactive</a></li>
						</ul>
					 </div>';
		
		else
			$html = '<div class="btn-group">
						<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Inactive
						&nbsp;<span class="caret"></span></button>
						<ul role="menu" class="dropdown-menu">
						  <li><a href="javascript:void()" title="Delete" onclick="action_status('."'".$id."','1'".')">Make Active</a></li>
						</ul>
					 </div>';		
	 
		return $html;
	} */
	
	public function member_delete($id)
    {        
		$this->a_member_m->member_delete($id);
        echo json_encode(array("status" => TRUE));
    }
	public function member_status($id,$status)
	{
		$data = array(				
			'status' => $status
		);
		$this->a_member_m->member_update($id,$data);
        echo json_encode(array("status" => TRUE));
	}
	
	function delete_data()
     {
      if($this->input->post('id'))
      {
       $this->a_member_m->member_delete($this->input->post('id'));
       echo 'Data Deleted';
      }
     }
	
	/*---------- import from excel ----------*/
    function importfromxls()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$employee_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$member_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $gender = $worksheet->getCellByColumnAndRow(2, $row)->getValue();                    
                    $age = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$organization_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $department = $worksheet->getCellByColumnAndRow(5, $row)->getValue();                    
                    $designation = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$contact_no = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					
					$data[] = array(
						'member_name'		=>	$member_name,
						'employee_id'		=>	$employee_id,
						'gender'		=>	$gender,
						'age'		=>	$age,
						'organization_name'		=>	$organization_name,
						'department'		=>	$department,
						'designation'		=>	$designation,
						'contact_no'		=>	$contact_no,
					);
				}
			}
			$this->a_member_m->exclinsert($data);
			echo 'Data Imported successfully';
		}	
	}
    
    
	
	
	/*--- member coverage by organization ---*/
	public function add_membercoverage(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'Add Member Coverage',
			'description' => '',
			'keywords' => '',
			'heading' => 'Member Coverage',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'page' => 'neworganization',				
			);
		$data["metadata"] = $metadata;
		
		$category = $this->a_member_m->get_category();
		$data["category_h"] = array(
			'' => 'Select Organization'
		); 
		foreach($category as $row){
			$data["categorylist2"][$row->organization_head]=$row->organization_head;
		}
		$data["categorylist"] =  $data["category_h"] + $data["categorylist2"];

		$coverage = $this->a_member_m->get_coverage();
		$data["coverage_h"] = array(
			'' => 'Select Coverage'
		); 
		foreach($coverage as $row2){
			$data["coveragedata"][$row2->coverage_name]=$row2->coverage_name;
		}
		$data["coveragelist"] =  $data["coverage_h"] + $data["coveragedata"]; 
        
        
		$data["optionlistform"] = 'a_member';
		$data["newform_database"] = 'a_member/save_member_coverage';
							
		$this->load->view('membercoverage', $data);
		
	}
	
	public function save_member_coverage(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(               	
				array('field'   => 'organization', 'label'   => 'Organization', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'coverage_period', 'label'   => 'coverage period', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'start_date', 'label'   => 'start date', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				$startdate = $this->input->post('start_date');
				$cp = $this->input->post('coverage_period');
				$organization = $this->input->post('organization');	
				
				$d = strtotime($cp,strtotime($startdate));
					//echo   date("Y-m-d",$d);			 
				
				$mbrbycate = $this->a_member_m->get_mbrbycat($organization);
				
				foreach($mbrbycate as $mbrdata){
					$data = array(					
						'coverage_period' => $this->input->post('coverage_period'),
						'start_date' => $this->input->post('start_date'),
						'end_date' => date("Y-m-d",$d),
					);
					$id = $mbrdata->id;
					//Transfering data to Model				
					$this->a_member_m->member_update($id,$data);
				}
				//Setting values for tabel columns
								
				
				echo $errors_array.'Added Successfully';				
			
		}
	}

	/*--- renew member coverage by organization ---*/
	public function renew_membercoverage(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'Renew Member Coverage',
			'description' => '',
			'keywords' => '',
			'heading' => 'Renew Member Coverage',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'page' => 'neworganization',				
			);
		$data["metadata"] = $metadata;
		
		$category = $this->a_member_m->get_category();
		$data["category_h"] = array(
			'' => 'Select Organization'
		); 
		foreach($category as $row){
			$data["categorylist2"][$row->organization_head]=$row->organization_head;
		}
		$data["categorylist"] =  $data["category_h"] + $data["categorylist2"];

		$coverage = $this->a_member_m->get_coverage();
		$data["coverage_h"] = array(
			'' => 'Select Coverage'
		); 
		foreach($coverage as $row2){
			$data["coveragedata"][$row2->coverage_name]=$row2->coverage_name;
		}
		$data["coveragelist"] =  $data["coverage_h"] + $data["coveragedata"]; 
        
        
		$data["optionlistform"] = 'a_member';
		$data["newform_database"] = 'a_member/save_renew_member_coverage';
							
		$this->load->view('renewcoverage', $data);
		
	}
	
	public function save_renew_member_coverage(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(               	
				array('field'   => 'organization', 'label'   => 'Organization', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'coverage_period', 'label'   => 'coverage period', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'start_date', 'label'   => 'start date', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				$startdate = $this->input->post('start_date');
				$cp = $this->input->post('coverage_period');
				$organization = $this->input->post('organization');	
				
				$d = strtotime($cp,strtotime($startdate));
					//echo   date("Y-m-d",$d);			 
				
				$mbrbycate = $this->a_member_m->get_mbrbycat($organization);
				
				foreach($mbrbycate as $mbrdata){
					$data = array(					
						'coverage_id' => $this->input->post('coverage_period'),
						'organization_name' => $organization,
						'start_date' => $this->input->post('start_date'),
						'end_date' => date("Y-m-d",$d),
						'member_empid' =>  $mbrdata->employee_id,
						'member_id' =>  $mbrdata->id,
					);
					/*$id = $mbrdata->id;*/
					//Transfering data to Model				
					$this->a_member_m->member_coverage_renew($data);
				}
				//Setting values for tabel columns
								
				
				echo $errors_array.'Added Successfully';				
			
		}
	}

	/*--- renew member coverage by member ---*/
	public function renew_coveragebymember($id){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'Renew Member Coverage',
			'description' => '',
			'keywords' => '',
			'heading' => 'Renew Member Coverage',
			'imageurl' => base_url('user/images/logo.png'),
			'siteurl' => base_url(''),
			'imageuploadurl' => base_url('a_imageupload'),				
			'id' => $session_data['id'],
			'user_login' => $session_data['user_login'],
			'display_name' => $session_data['display_name'],
			'user_type' => $session_data['user_type'],
			'page' => 'neworganization',				
			);
		$data["metadata"] = $metadata;
		
		$category = $this->a_member_m->get_category();
		$data["category_h"] = array(
			'' => 'Select Organization'
		); 
		foreach($category as $row){
			$data["categorylist2"][$row->organization_head]=$row->organization_head;
		}
		$data["categorylist"] =  $data["category_h"] + $data["categorylist2"];

		$coverage = $this->a_member_m->get_coverage();
		$data["coverage_h"] = array(
			'' => 'Select Coverage'
		); 
		foreach($coverage as $row2){
			$data["coveragedata"][$row2->coverage_name]=$row2->coverage_name;
		}
		$data["coveragelist"] =  $data["coverage_h"] + $data["coveragedata"]; 
        
        $data["get_mbrinfo"] = $this->a_member_m->member_info($id);
        $csdate = $data["get_mbrinfo"]->start_date;
        $cenddate = $data["get_mbrinfo"]->end_date;
        $mbrid = $data["get_mbrinfo"]->employee_id;
        $data["mbr_billamount"] = $this->a_member_m->get_billamount($mbrid,$csdate,$cenddate);
		$data["optionlistform"] = 'a_member';
		$data["newform_database"] = 'a_member/save_renewcoveragebymember/'.$id;
							
		$this->load->view('renewcoveragebymember', $data);
		
	}

	public function save_renewcoveragebymember($id){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
				array('field'   => 'coverage_period', 'label'   => 'coverage period', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'start_date', 'label'   => 'start date', 'rules'   => 'trim|xss_clean|required'),
        );
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				$startdate = $this->input->post('start_date');
				$cp = $this->input->post('coverage_period');
				$organization = $this->input->post('organization');	
				
				$d = strtotime($cp,strtotime($startdate));
					//echo   date("Y-m-d",$d);			 
				
				//$mbrbycate = $this->a_member_m->get_mbrbycat($organization);
				
				//foreach($mbrbycate as $mbrdata){
					$data = array(					
						'coverage_period' => $this->input->post('coverage_period'),
						'start_date' => $this->input->post('start_date'),
						'end_date' => date("Y-m-d",$d),
					);
					/*$id = $mbrdata->id;*/
					//Transfering data to Model				
					$this->a_member_m->member_update($id,$data);
				//}
				//Setting values for tabel columns

				$datahistory = array( 
					'member_id' => $id, 
					'member_empid' => $this->input->post('member_empid'),
					'coverage_name' => $this->input->post('coverage_name_old'),
					'total_expence' => $this->input->post('totalcost'),
					'start_date' => $this->input->post('startdate'),
					'end_date' => $this->input->post('enddate'),
				);

				$this->a_member_m->coveragebymember_insert($datahistory);
								
				
				echo $errors_array.'Added Successfully';				
			
		}
	}

	function member_eporttoxls()
	{	
		
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Member ID", "Member Name", "Contact No", "Gender", "Age", "Factory", "Department", "designation", "Coverage Period", "Start Date", "End Date", "Coverage Amount");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

       	$monthyear = $this->input->post('monthyear');
		$onlyyear = $this->input->post('onlyyear');
		$factory = $this->input->post('factory');
		$gender = $this->input->post('gender');
		
		$employee_data = $this->member_model->get_member_export($monthyear,$onlyyear,$factory,$gender);

		/*print_r($employee_data);exit;*/
		$excel_row = 2;

		foreach($employee_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->employee_id);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->member_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->contact_no);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->gender);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->age);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->organization_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->department);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->designation);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->coverage_period);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->start_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->end_date);
			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->coverage_amount);

			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="MemberList.xls"');
		$object_writer->save('php://output');
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