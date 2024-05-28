<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A_exam extends Ci_Controller {
	function __construct(){  	
		parent::__construct();
		
		if($this->session->userdata('sht_ssndata')){			
			
			$this->load->model('a_exam_m');
			
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
				
		$data["qsn_list"] = $this->a_exam_m->get_exam_schedule();
							
		$this->load->view('list', $data);
		
	}

	public function addexam(){
		
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
				
		$data["latest_st"] = $this->a_exam_m->get_exam_schedule();
		$data["tmalist"] = $this->a_exam_m->get_tma();
							
		$this->load->view('addexam', $data);
		
	}

	public function exam_data(){		
		
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'title', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'tma', 'label'   => 'TMA', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'start_date', 'label'   => 'Start Date', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'end_date', 'label'   => 'End Date', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'no_of_question_theory', 'label'   => 'No Of Question Theory', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'no_of_question_osce', 'label'   => 'No Of Question OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'no_of_question_ospe', 'label'   => 'No Of Question OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'total_mark_theory', 'label'   => 'Total mark theory', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'total_mark_osce', 'label'   => 'Total mark OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'total_mark_ospe', 'label'   => 'Total mark OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'pass_mark_theory', 'label'   => 'Pass Mark Theory', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'pass_mark_osce_ospe', 'label'   => 'Pass Mark OSCE and OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),
				/*array('field'   => 'pass_mark_ospe', 'label'   => 'Pass Mark OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),*/
				array('field'   => 'marks_per_question', 'label'   => 'marks per question', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'marks_per_question_osce', 'label'   => 'marks per question OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'marks_per_question_ospe', 'label'   => 'marks per question OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'exam_time', 'label'   => 'Exam Time Theory', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'exam_time_osce', 'label'   => 'Exam Time OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'exam_time_ospe', 'label'   => 'Exam Time OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),				
				array('field'   => 'exam_notice', 'label'   => 'Notice', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'negative_mark', 'label'   => 'Negative Mark', 'rules'   => 'trim|xss_clean|required|decimal'),
				);
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
        		/*$statdatetime = $this->input->post('start_date').'T'.$this->input->post('start_time');
        		$enddatetime = $this->input->post('end_date').'T'.$this->input->post('end_time');*/

        		/*echo $statdatetime.'<br>'.$enddatetime;
        		exit;*/
        		$totalmark = $this->input->post('total_mark_theory') + $this->input->post('total_mark_osce') + $this->input->post('total_mark_ospe');
        		/*$totalpassmark = $this->input->post('pass_mark_theory')+$this->input->post('pass_mark_osce')+$this->input->post('pass_mark_ospe');*/
        		$totalpassmark = $this->input->post('pass_mark_theory')+$this->input->post('pass_mark_osce_ospe');
        		$totalq = $this->input->post('no_of_question_theory')+$this->input->post('no_of_question_osce')+$this->input->post('no_of_question_ospe');
				//Setting values for tabel columns
				$data = array(
					'schedule_name'=>$this->input->post('title'),
					'start_date'=>date("Y-m-d H:i:s", strtotime($this->input->post('start_date'))),
					'end_date'=>date("Y-m-d H:i:s", strtotime($this->input->post('end_date'))),
					'tma'=>$this->input->post('tma'),
					'no_of_question'=>$totalq,
					'no_of_question_theory'=>$this->input->post('no_of_question_theory'),
					'no_of_question_osce'=>$this->input->post('no_of_question_osce'),
					'no_of_question_ospe'=>$this->input->post('no_of_question_ospe'),			
					'total_mark' => $totalmark,
					'total_mark_theory'=>$this->input->post('total_mark_theory'),
					'total_mark_osce'=>$this->input->post('total_mark_osce'),
					'total_mark_ospe'=>$this->input->post('total_mark_ospe'),	
					'pass_mark'=>$totalpassmark,
					'pass_mark_theory'=>$this->input->post('pass_mark_theory'),
					/*'pass_mark_osce'=>$this->input->post('pass_mark_osce'),
					'pass_mark_ospe'=>$this->input->post('pass_mark_ospe'),*/
					'pass_mark_osce_ospe'=>$this->input->post('pass_mark_osce_ospe'),
					'exam_time'=>$this->input->post('exam_time'),
					'exam_time_osce'=>$this->input->post('exam_time_osce'),
					'exam_time_ospe'=>$this->input->post('exam_time_ospe'),
					/*'marks_per_question'=>$this->input->post('total_mark') / $this->input->post('no_ofquestion'),*/
					'marks_per_question'=>$this->input->post('marks_per_question'),
					'marks_per_question_osce'=>$this->input->post('marks_per_question_osce'),
					'marks_per_question_ospe'=>$this->input->post('marks_per_question_ospe'),
					'status'=>$this->input->post('publish'),
					'exam_notice'=>$this->input->post('exam_notice'),
					'exam_notice_osce'=>$this->input->post('exam_notice_osce'),
					'exam_notice_ospe'=>$this->input->post('exam_notice_ospe'),					
					'negative_mark'=>$this->input->post('negative_mark'),
					'added_by'=>$session_data['id'],
				);
				//Transfering data to Model
				$id = $this->a_exam_m->exam_schedule_insert($data);

				echo $errors_array.'Added Successfully';
		}
	}

	

	public function question_delete($id)
    {
        
		$this->a_exam_m->question_delete($id);
        echo json_encode(array("status" => TRUE));
    }

    function delete_single_user()  
      {
           $this->a_exam_m->question_delete($_POST["id"]);
           $this->a_exam_m->questionAns_delete($_POST["id"]);  
           echo 'Data Deleted';  
      } 
	
     public function exam_dtl(){  
     	$mbrid = $this->input->post('id');		
		$data["qsn_data"] = $this->a_exam_m->exam_details($mbrid);
		$data["qid"] = $mbrid;
		$this->load->view('viewexamdtl',$data);		
	}//end function

	public function editexam_schedule($id){
		
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
		$data["examid"] = $id;		
		$data["qsn_list"] = $this->a_exam_m->get_exam_schedule();
		$data["sdl_data"] = $this->a_exam_m->exam_details($id);
		$data["tmalist"] = $this->a_exam_m->get_tma();
							
		$this->load->view('editexam', $data);
		
	}


	public function editexam_data($id){		
		
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'title', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'tma', 'label'   => 'TMA', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'start_date', 'label'   => 'Start Date', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'end_date', 'label'   => 'End Date', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'no_of_question_theory', 'label'   => 'No Of Question Theory', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'no_of_question_osce', 'label'   => 'No Of Question OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'no_of_question_ospe', 'label'   => 'No Of Question OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'total_mark_theory', 'label'   => 'Total mark theory', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'total_mark_osce', 'label'   => 'Total mark OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'total_mark_ospe', 'label'   => 'Total mark OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'pass_mark_theory', 'label'   => 'Pass Mark Theory', 'rules'   => 'trim|xss_clean|required|numeric'),
				/*array('field'   => 'pass_mark_osce', 'label'   => 'Pass Mark OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),*/
				array('field'   => 'pass_mark_osce_ospe', 'label'   => 'Pass Mark OSCE OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'marks_per_question', 'label'   => 'marks per question', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'marks_per_question_osce', 'label'   => 'marks per question OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'marks_per_question_ospe', 'label'   => 'marks per question OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'exam_time', 'label'   => 'Exam Time Theory', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'exam_time_osce', 'label'   => 'Exam Time OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'exam_time_ospe', 'label'   => 'Exam Time OSPE', 'rules'   => 'trim|xss_clean|required|numeric'),				
				array('field'   => 'exam_notice', 'label'   => 'Notice', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'negative_mark', 'label'   => 'Negative Mark', 'rules'   => 'trim|xss_clean|required|decimal'),
				);
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
        		$totalmark = $this->input->post('total_mark_theory') + $this->input->post('total_mark_osce') + $this->input->post('total_mark_ospe');
        		/*$totalpassmark = $this->input->post('pass_mark_theory')+$this->input->post('pass_mark_osce')+$this->input->post('pass_mark_ospe');*/
        		$totalpassmark = $this->input->post('pass_mark_theory')+$this->input->post('pass_mark_osce_ospe');
        		$totalq = $this->input->post('no_of_question_theory')+$this->input->post('no_of_question_osce')+$this->input->post('no_of_question_ospe');
        		
				$data = array(
					'schedule_name'=>$this->input->post('title'),
					'start_date'=>date("Y-m-d H:i:s", strtotime($this->input->post('start_date'))),
					'end_date'=>date("Y-m-d H:i:s", strtotime($this->input->post('end_date'))),
					'tma'=>$this->input->post('tma'),
					'no_of_question'=>$totalq,
					'no_of_question_theory'=>$this->input->post('no_of_question_theory'),
					'no_of_question_osce'=>$this->input->post('no_of_question_osce'),
					'no_of_question_ospe'=>$this->input->post('no_of_question_ospe'),			
					'total_mark' => $totalmark,
					'total_mark_theory'=>$this->input->post('total_mark_theory'),
					'total_mark_osce'=>$this->input->post('total_mark_osce'),
					'total_mark_ospe'=>$this->input->post('total_mark_ospe'),	
					'pass_mark'=>$totalpassmark,
					'pass_mark_theory'=>$this->input->post('pass_mark_theory'),
					/*'pass_mark_osce'=>$this->input->post('pass_mark_osce'),
					'pass_mark_ospe'=>$this->input->post('pass_mark_ospe'),*/
					'pass_mark_osce_ospe'=>$this->input->post('pass_mark_osce_ospe'),
					'exam_time'=>$this->input->post('exam_time'),
					'exam_time_osce'=>$this->input->post('exam_time_osce'),
					'exam_time_ospe'=>$this->input->post('exam_time_ospe'),
					'marks_per_question'=>$this->input->post('marks_per_question'),
					'marks_per_question_osce'=>$this->input->post('marks_per_question_osce'),
					'marks_per_question_ospe'=>$this->input->post('marks_per_question_ospe'),
					'status'=>$this->input->post('publish'),
					'exam_notice'=>$this->input->post('exam_notice'),
					'exam_notice_osce'=>$this->input->post('exam_notice_osce'),
					'exam_notice_ospe'=>$this->input->post('exam_notice_ospe'),
					'negative_mark'=>$this->input->post('negative_mark'),
				);
				//Transfering data to Model
				$this->a_exam_m->examschedule_update($id,$data);

				
				echo $errors_array.'Update Successfully';
		}
	}

	public function examstudents($id){
		
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
		
		$data["sid"] = $id;	
		$data["qsn_list"] = $this->a_exam_m->getExamListbySchedule($id);
							
		$this->load->view('studentexam', $data);
		
	}

	public function eceexamresult($id){
		
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
		
		$data["sid"] = $id;	
		$data["qsn_list"] = $this->a_exam_m->getEceResultSchedule($id);
							
		$this->load->view('eceresult', $data);
		
	}

	public function eceresultExl($id){
		
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
				
		$data["qsn_list"] = $this->a_exam_m->getEceResultSchedule($id);
		$data["scheduledtl"] = $this->a_exam_m->exam_details($id);
							
		$this->load->view('eceresultexport', $data);
		
	}

	public function examresult_dtl(){  
     	$id = $this->input->post('id');		
		$data["examinfo"] = $this->a_exam_m->getExamReport($id);
		$data["examanswer"] = $this->a_exam_m->getExamGivenAns($id);
		$data["correctans"] = $this->a_exam_m->getExamGivenCorrectAns($id);
		$data["attendans"] = $this->a_exam_m->getExamAttendAns($id);
		$this->load->view('viewexamresult',$data);		
	}//end function


	public function examstudentsExl($id){
		
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
				
		$data["qsn_list"] = $this->a_exam_m->getExamListbySchedule($id);
		$data["scheduledtl"] = $this->a_exam_m->exam_details($id);
							
		$this->load->view('resultexport', $data);
		
	}


	public function examresult(){
		
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
		
		
		$data["qsn_list"] = $this->a_exam_m->getResultAllNew();
							
		$this->load->view('result-all', $data);
		
	}

	public function exportresult(){
		
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
				
		$data["qsn_list"] = $this->a_exam_m->getResultAll();
							
		$this->load->view('exportresultall', $data);
		
	}

	/* PCA Schudule */

	public function pcaexam(){
		
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
				
		$data["qsn_list"] = $this->a_exam_m->get_pcaexam_schedule();
							
		$this->load->view('listpca', $data);
		
	}

	public function addpcaexam(){
		
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
				
		$data["latest_st"] = $this->a_exam_m->get_exam_schedule();
		$data["tmalist"] = $this->a_exam_m->get_tma();
							
		$this->load->view('addexampca', $data);
		
	}

	public function pcaexam_data(){		
		
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'title', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'tma', 'label'   => 'TMA', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'start_date', 'label'   => 'Start Date', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'end_date', 'label'   => 'End Date', 'rules'   => 'trim|xss_clean|required'),				
				array('field'   => 'no_of_question_osce', 'label'   => 'No Of Question', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'total_mark_osce', 'label'   => 'Total mark', 'rules'   => 'trim|xss_clean|required|numeric'),				
				array('field'   => 'pass_mark_osce', 'label'   => 'Pass Mark', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'marks_per_question_osce', 'label'   => 'marks per question OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'exam_time_osce', 'label'   => 'Exam Time OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),			
				array('field'   => 'exam_notice', 'label'   => 'Notice', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'negative_mark', 'label'   => 'Negative Mark', 'rules'   => 'trim|xss_clean|required|decimal'),
				);
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{        		
        		$totalmark = $this->input->post('total_mark_osce');
        		$totalpassmark = $this->input->post('pass_mark_osce');
        		$totalq = $this->input->post('no_of_question_osce');
				//Setting values for tabel columns
				$data = array(
					'schedule_name'=>$this->input->post('title'),
					'start_date'=>date("Y-m-d H:i:s", strtotime($this->input->post('start_date'))),
					'end_date'=>date("Y-m-d H:i:s", strtotime($this->input->post('end_date'))),
					'tma'=>$this->input->post('tma'),
					'no_of_question'=>$totalq,					
					'no_of_question_osce'=>$this->input->post('no_of_question_osce'),			
					'total_mark' => $totalmark,
					'total_mark_osce'=>$this->input->post('total_mark_osce'),	
					'pass_mark'=>$totalpassmark,
					'pass_mark_osce'=>$this->input->post('pass_mark_osce'),
					/*'pass_mark_ospe'=>$this->input->post('pass_mark_ospe'),*/
					'exam_time_osce'=>$this->input->post('exam_time_osce'),
					/*'marks_per_question'=>$this->input->post('total_mark') / $this->input->post('no_ofquestion'),*/
					'marks_per_question_osce'=>$this->input->post('marks_per_question_osce'),
					'status'=>$this->input->post('publish'),
					'exam_notice'=>$this->input->post('exam_notice'),		
					'negative_mark'=>$this->input->post('negative_mark'),
					'exam_type'=>2,
					'added_by'=>$session_data['id'],
				);
				//Transfering data to Model
				$id = $this->a_exam_m->exam_schedule_insert($data);

				echo $errors_array.'Added Successfully';
		}
	}

	public function editpcaexam_schedule($id){
		
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
		$data["examid"] = $id;		
		$data["qsn_list"] = $this->a_exam_m->get_exam_schedule();
		$data["sdl_data"] = $this->a_exam_m->exam_details($id);
		$data["tmalist"] = $this->a_exam_m->get_tma();
							
		$this->load->view('editpcaexam', $data);
		
	}

	public function editpcaexam_data($id){		
		
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'title', 'label'   => 'Name', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'tma', 'label'   => 'TMA', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'start_date', 'label'   => 'Start Date', 'rules'   => 'trim|xss_clean|required'),
               	array('field'   => 'end_date', 'label'   => 'End Date', 'rules'   => 'trim|xss_clean|required'),				
				array('field'   => 'no_of_question_osce', 'label'   => 'No Of Question', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'total_mark_osce', 'label'   => 'Total mark', 'rules'   => 'trim|xss_clean|required|numeric'),				
				array('field'   => 'pass_mark_osce', 'label'   => 'Pass Mark', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'marks_per_question_osce', 'label'   => 'marks per question OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),
				array('field'   => 'exam_time_osce', 'label'   => 'Exam Time OSCE', 'rules'   => 'trim|xss_clean|required|numeric'),			
				array('field'   => 'exam_notice', 'label'   => 'Notice', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'negative_mark', 'label'   => 'Negative Mark', 'rules'   => 'trim|xss_clean|required|decimal'),
				);
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
        		$totalmark = $this->input->post('total_mark_osce');
        		$totalpassmark = $this->input->post('pass_mark_osce');
        		$totalq = $this->input->post('no_of_question_osce');
        		
				$data = array(
					'schedule_name'=>$this->input->post('title'),
					'start_date'=>date("Y-m-d H:i:s", strtotime($this->input->post('start_date'))),
					'end_date'=>date("Y-m-d H:i:s", strtotime($this->input->post('end_date'))),
					'tma'=>$this->input->post('tma'),
					'no_of_question'=>$totalq,					
					'no_of_question_osce'=>$this->input->post('no_of_question_osce'),			
					'total_mark' => $totalmark,
					'total_mark_osce'=>$this->input->post('total_mark_osce'),	
					'pass_mark'=>$totalpassmark,
					'pass_mark_osce'=>$this->input->post('pass_mark_osce'),
					'exam_time_osce'=>$this->input->post('exam_time_osce'),
					'marks_per_question_osce'=>$this->input->post('marks_per_question_osce'),
					'status'=>$this->input->post('publish'),
					'exam_notice'=>$this->input->post('exam_notice'),		
					'negative_mark'=>$this->input->post('negative_mark'),
					'added_by'=>$session_data['id'],
				);
				//Transfering data to Model
				$this->a_exam_m->examschedule_update($id,$data);

				
				echo $errors_array.'Update Successfully';
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