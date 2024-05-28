<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends Ci_Controller {
	
	
	var $prescription_list = 'Reports/genajaxprescriptionlist';
	var $bill_list = 'Reports/genajax_billlist';
	
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
			redirect('auth/login', 'refresh');
		}		
  	}

  	function index()
	{
		$post=$this->input->post();
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
		
		$data["cntr_list"] = $this->Reports_m->get_centerlist();
		$data["centers"] = $this->Reports_m->getAll('centers');
		
		if(empty($post)){
           $data['reports']='';
		}else{
          if(!empty($post['from_date']) && !empty($post['to_date']) && !empty($post['centerid']))
          {
               $s_date=date('Y-m-d',strtotime($post['from_date']));
               $e_date=date('Y-m-d',strtotime($post['to_date']));
               $data['reports']=$this->Reports_m->getHba1cReprot($s_date,$e_date,$post['centerid']);

          }else if(!empty($post['from_date']) && !empty($post['from_date']) && empty($post['centerid'])){
			   $s_date=date('Y-m-d',strtotime($post['from_date']));
               $e_date=date('Y-m-d',strtotime($post['to_date']));
               $data['reports']=$this->Reports_m->getHba1cReprot($s_date,$e_date);
          }else if(!empty($post['year']) && !empty($post['month']) && !empty($post['centerid'])){
          	   $s_date=$post['year'].'-'.$post['month'].'-01';
               $e_date=date('Y-m-t',strtotime($s_date));
               $data['reports']=$this->Reports_m->getHba1cReprot($s_date,$e_date,$post['centerid']);
               
          }else if(!empty($post['year']) && !empty($post['month']) && empty($post['centerid'])){
          	   $s_date=$post['year'].'-'.$post['month'].'-01';
               $e_date=date('Y-m-t',strtotime($s_date));
               $data['reports']=$this->Reports_m->getHba1cReprot($s_date,$e_date);
          }else{

          }
		}
		
		if(!empty($post) && $post['submit']=='csv')
	    {
	      $this->load->view('hba1c_csv',$data);
	    }else{
	      $this->load->view('hba1creport',$data);
	    }
	}

/*--------- HbA1c Report -------*/
  	public function hba1c(){
		
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
		
		$data["cntr_list"] = $this->Reports_m->get_centerlist();

		$this->load->view('hba1c', $data);
		
	}

	function hba1c_filter()
	{
		$from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $center = $this->input->post('center');
		$monthyear = $this->input->post('monthyear');
		$onlyyear = $this->input->post('onlyyear');

		$data["hba1c_byfilter"] = $this->Reports_m->hba1c_searchbyfilter($from_date,$to_date,$center,$monthyear,$onlyyear);		
        $this->load->view('hba1cfilter', $data);
	}
	
	/*---- V1 vs V2 report ----*/
	function v1vsv2report()
	{
		$post=$this->input->post();
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
		
		$data["cntr_list"] = $this->Reports_m->get_centerlist();
		$data["centers"] = $this->Reports_m->getAll('centers');
		
		if(empty($post)){
           $data['reports']='';
		}else{
          if(!empty($post['from_date']) && !empty($post['to_date']) && !empty($post['centerid']))
          {
               $s_date=date('Y-m-d',strtotime($post['from_date']));
               $e_date=date('Y-m-d',strtotime($post['to_date']));
               $data['reports']=$this->Reports_m->getHba1cReprot($s_date,$e_date,$post['centerid']);

          }else if(!empty($post['from_date']) && !empty($post['from_date']) && empty($post['centerid'])){
			   $s_date=date('Y-m-d',strtotime($post['from_date']));
               $e_date=date('Y-m-d',strtotime($post['to_date']));
               $data['reports']=$this->Reports_m->getHba1cReprot($s_date,$e_date);
          }else if(!empty($post['year']) && !empty($post['month']) && !empty($post['centerid'])){
          	   $s_date=$post['year'].'-'.$post['month'].'-01';
               $e_date=date('Y-m-t',strtotime($s_date));
               $data['reports']=$this->Reports_m->getHba1cReprot($s_date,$e_date,$post['centerid']);
               
          }else if(!empty($post['year']) && !empty($post['month']) && empty($post['centerid'])){
          	   $s_date=$post['year'].'-'.$post['month'].'-01';
               $e_date=date('Y-m-t',strtotime($s_date));
               $data['reports']=$this->Reports_m->getHba1cReprot($s_date,$e_date);
          }else{

          }
		}
		
		if(!empty($post) && $post['submit']=='csv')
	    {
	      $this->load->view('v1vsv2_csv',$data);
	    }else{
	      $this->load->view('v1vsv2report',$data);
	    }
	}


	public function missing_field_report()
	  {
	      ini_set('max_execution_time', 0);
	      $post=$this->input->post();
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

		$data["centers"] = $this->Reports_m->getAll('centers');
	    /*echo $post['offset'];exit;*/
	    /*echo $post;exit;*/
	    if(empty($post)){
	           $data['reports']='';
	    }else{

	    if(!empty($post['year']) && !empty($post['month']) && !empty($post['centerid'])){
          	   $s_date=$post['year'].'-'.$post['month'].'-01';
               $e_date=date('Y-m-t',strtotime($s_date));
               $data['patients']=$this->Reports_m->getprogressreport($s_date,$e_date,$post['centerid'],$post['offset']);
               
          }else if(!empty($post['year']) && !empty($post['month']) && empty($post['centerid'])){
          	   $s_date=$post['year'].'-'.$post['month'].'-01';
               $e_date=date('Y-m-t',strtotime($s_date));
               $data['patients']=$this->Reports_m->getprogressreport($s_date,$e_date,$post['offset']);
          }else{
          	$data['patients']=$this->Reports_m->getprogressreport($post['offset']);	   

          }
	             
	               
	    }
	    

	    //var_dump($data['doctors']);die;
	    if(!empty($post) && $post['submit']=='csv')
	    {
	      $this->load->view('missing_field_report_csv',$data);
	    }else{
	    	//print_r($data['patients']);exit;
	      $this->load->view('missing_field_report',$data);
	    }
	  }



	public function centerwisereport(){
		
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
			$data["cntr_list"] = $this->Reports_m->get_centerlist();
			$data['dashboard']=$this->Reports_m->getDeashboardData();
			
			$this->load->view('center-wise-report',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('auth/login', 'refresh');
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
	

	
} // End Class

?>