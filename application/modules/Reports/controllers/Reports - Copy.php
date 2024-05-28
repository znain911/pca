<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends Ci_Controller {
	
	
	/*---- members -----*/
	var $member_list = 'Reports/genajaxmemberlist';
	
	
	function __construct(){  	
		parent::__construct();
		
		if($this->session->userdata('sht_ssndata')){			
			$this->lang->load('option', $this->config->item('language'));
			$this->load->model('Reports_m');
			
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
			redirect('admin/login', 'refresh');
		}		
  	}

/*--------- member list -------*/
  	public function index(){
		
		$session_data = $this->session->userdata('sht_ssndata');			
		$metadata = array(
			'title' => 'Prescriptions Reports',
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
			'page' => 'optionlist',				
			);
		$data["metadata"] = $metadata;
		$data["ajaxlist"] = $this->member_list;
			
		$data["field_name_as_header"] = array('prescription_date','member_id','prescription_id','member_name','gender','age','organization_name','department','consultaion_site','doctor_name','symptom','drug','investigation','referral_doctor','advice');
							
		$this->load->view('memberlist', $data);
		
	}
	
	
	
		
	
	function genajaxmemberlist()
    {
        $this->is_ajax();	
        $this->datatables->select('ch_prescription.prescription_id,ch_prescription.member_id,ch_prescription.member_name,ch_prescription.gender,ch_prescription.age,ch_prescription.doctor_name,ch_prescription.consultaion_site,ch_prescription.referral_doctor,ch_prescription.advice,DATE_FORMAT(ch_prescription.prescription_date,"%d %b %Y") as prescription_date,ch_member.organization_name,ch_member.department')		
		->join(DB_PREFIX.'member', DB_PREFIX.'member.employee_id = '.DB_PREFIX.'prescription.member_id', 'left' )		
		-> from(DB_PREFIX.'prescription');
		
				
		$data = json_decode($this->datatables->generate("json"), true);
		foreach($data['data'] as $key => $ele){
			$ele['symptom'] = $this->symptom_action_link($ele['prescription_id']);
			$ele['drug'] = $this->drug_action_link($ele['prescription_id']);
			$ele['investigation'] = $this->investigation_action_link($ele['prescription_id']);
			
			$data['data'][$key] = $ele;
		}
    	echo json_encode($data);
		
    }
	
	
	//function for action link
	function symptom_action_link($id)
	{
		$this->load->library('Querylib');
		//$html = '<span class="actions">'.$this-Querylib-symptom_list($id).'</span>';
		/* $dataff = $this->Querylib->symptom_list($id); */
		$dataff = 'symptom';
	 
		return $dataff;
	}
	
	//function for action link
	function drug_action_link($id)
	{
		
		$dataff = 'Drugs';
	 
		return $dataff;
	}
	
	//function for action link
	function investigation_action_link($id)
	{
		
		$dataff = 'investigation';
	 
		return $dataff;
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