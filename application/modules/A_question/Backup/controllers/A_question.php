<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A_question extends Ci_Controller {
	function __construct(){  	
		parent::__construct();
		
		if($this->session->userdata('sht_ssndata')){			
			
			$this->load->model('a_question_m');
			
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
				
		$data["qsn_list"] = $this->a_question_m->get_question();
							
		$this->load->view('list', $data);
		
	}

	public function addquestion(){
		
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
				
		$data["latest_st"] = $this->a_question_m->get_studentList();
		$data["tmalist"] = $this->a_question_m->get_tma();
							
		$this->load->view('addquestion', $data);
		
	}	

	public function question_data(){		
		//$this->is_ajax();
		/*$number2 = count($_POST["ans"]);
		echo "There are ".$number2." checkboxe(s) are checked";
		
		exit;*/

		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'question', 'label'   => 'Question Title', 'rules'   => 'trim|xss_clean|required'));
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'title'=>$this->input->post('question'),
					'tma'=>$this->input->post('tma'),
					'status'=>$this->input->post('publish'),
					'added_by'=>$session_data['id'],
				);
				//Transfering data to Model
				$id = $this->a_question_m->question_insert($data);

				$number1 = count($_POST["anstext"]);
				/*$number2 = count($_POST["ans"]);*/
		        if($number1 > 0){
		        	
		        	for($i=0; $i<$number1; $i++){
		        		if(!empty($_POST['anstext'][$i])){
		        			$ansdata = array(
								'question_id'=>$id,
								'qa_title'=>$_POST['anstext'][$i],
								'qa_ans'=>isset($_POST["ans".$i])?1:0,
							);
							$this->a_question_m->ans_insert($ansdata);
		        		}
		        	}
		        }
				echo $errors_array.'Added Successfully';
		}
	}

	public function question_delete($id)
    {
        
		$this->a_question_m->question_delete($id);
        echo json_encode(array("status" => TRUE));
    }

    function delete_single_user()  
      {
           $this->a_question_m->question_delete($_POST["id"]);
           $this->a_question_m->questionAns_delete($_POST["id"]);  
           echo 'Data Deleted';  
      } 
	
     public function question_dtl(){  
     	$mbrid = $this->input->post('id');		
		$data["qsn_data"] = $this->a_question_m->queston_details($mbrid);
		$data["tmalist"] = $this->a_question_m->get_tma();
		$data["qsn_ans"] = $this->a_question_m->get_question_ans($mbrid);
		$data["qid"] = $mbrid;
		$this->load->view('viewquestion',$data);		
	}//end function


	public function question_edit($id){		
		
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'question', 'label'   => 'Question Title', 'rules'   => 'trim|xss_clean|required'));
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'title'=>$this->input->post('question'),
					'tma'=>$this->input->post('tma'),
					'status'=>$this->input->post('publish'),
				);
				//Transfering data to Model
				$this->a_question_m->question_update($id,$data);

				$number1 = count($_POST["anstext"]);
				/*$number2 = count($_POST["ans"]);*/
		        if($number1 > 0){
		        	$this->a_question_m->questionAns_delete($id);  
		        	for($i=0; $i<$number1; $i++){
		        		if(!empty($_POST['anstext'][$i])){
		        			$ansdata = array(
								'question_id'=>$id,
								'qa_title'=>$_POST['anstext'][$i],
								'qa_ans'=>isset($_POST["ans".$i])?1:0,
							);
							$this->a_question_m->ans_insert($ansdata);
		        		}
		        	}
		        }
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