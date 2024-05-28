<?php
class Students_m extends CI_Model{
		
	function login($username, $password){
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('phone = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . $password . "'"); 
		$this -> db -> where('st_status = ' . "'1'"); 
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}// end of function
	
	function login_email($username, $password){
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('st_email = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . $password . "'"); 
		$this -> db -> where('st_status = ' . "'1'"); 
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}// end of function

	function login_inactive($username, $password){
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('phone = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . $password . "'"); 
		$this -> db -> where('st_status = ' . "'0'"); 
		$this -> db -> limit(1);
		$query = $this->db->get();				
		return $query->first_row();
	}// end of function
	
	function login_inactive_email($username, $password){
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('st_email = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . $password . "'"); 
		$this -> db -> where('st_status = ' . "'0'"); 
		$this -> db -> limit(1);
		$query = $this->db->get();				
		return $query->first_row();
	}// end of function

	function login_id($username, $password){
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('phone = ' . "'" . $username . "'"); 
		$this -> db -> where('password != ' . "'" . $password . "'"); 
		//$this -> db -> where('st_status = ' . "'1'"); 
		$this -> db -> limit(1);
		$query = $this->db->get();				
		return $query->first_row();
	}// end of function
	
	function login_id_email($username, $password){
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('st_email = ' . "'" . $username . "'"); 
		$this -> db -> where('password != ' . "'" . $password . "'"); 
		//$this -> db -> where('st_status = ' . "'1'"); 
		$this -> db -> limit(1);
		$query = $this->db->get();				
		return $query->first_row();
	}// end of function

	function otplogin($user_id,$otp){
		$this -> db -> select('t1.*, t2.*');
		$this->db->join(DB_PREFIX.'student t2', 't2.st_id = t1.user_id', 'left');
		$this -> db -> from(DB_PREFIX.'login_data t1');
		$this -> db -> where('t1.user_id = ' . "'" . $user_id . "'"); 
		$this -> db -> where('t1.login_otp = ' . "'" . $otp . "'"); 
		//$this -> db -> where('st_status = ' . "'1'"); 
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}// end of function

	function otploginlimit($user_id,$otp){
		$this -> db -> select('t1.*, t2.*');
		$this->db->join(DB_PREFIX.'student t2', 't2.st_id = t1.user_id', 'left');
		$this -> db -> from(DB_PREFIX.'login_data t1');
		$this -> db -> where('t1.user_id = ' . "'" . $user_id . "'"); 
		$this -> db -> where('t1.login_otp = ' . "'" . $otp . "'"); 
		//$this -> db -> where('st_status = ' . "'1'"); 
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		return $query->first_row();
	}// end of function
	
	//for user login log
	function user_log($user_log_data){
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'student_users_log', $user_log_data);
		$insert_id = $this->db->insert_id();
		//echo  $this->db->last_query();exit;
		$this->db->trans_complete();
		return $insert_id;
	}
	
	function user_log_out($user_log_data){
		$this->db->trans_start();
		extract($user_log_data);
		$this->db->where('User_Login', $User_Login);
		$this->db->where('Login_Note', null);
		$this->db->order_by("id", "DESC");
		$this->db->limit(1); 
		$this->db->update(DB_PREFIX.'student_users_log', array('Login_Note' => $Login_Note));
		
		$this->db->trans_complete();
		
	}
	
	public function get_registration_control($id)
	{
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'settings');
		$this -> db -> where('id', $id);
		$query = $this->db->get();
		return $query->first_row();
	}
	
	function get_userprofile($userid){
		$this -> db -> select('*');
		$this->db->join(DB_PREFIX.'admin_user_group', DB_PREFIX.'admin_user_group.Usergroup_Id = '.DB_PREFIX.'admin_user.Usergroup_Id', 'left');
		$this -> db -> from(DB_PREFIX.'admin_user');
		$this -> db -> where('Admin_Id = ' . "'" . $userid . "'");
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}// end of function
	public function get_usergroup() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'admin_user_group');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	public function user_update($userid,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('Admin_Id', $userid);
		$this->db->update(DB_PREFIX.'admin_user', $data);		
		$this->db->trans_complete();					
   	} // End of function
	
	public function get_studentDashboard() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> order_by('st_id','DESC');
		$this -> db -> limit(20);
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function get_studentList() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> order_by('st_id','DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function get_studentinfo($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('st_id',$id);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function
	
	
	public function get_student($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('student_id',$id);
		$query = $this->db->get();
		return $query->first_row();
    }
	
	public function nid($nid) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'student t2', 't2.st_id = t1.stid', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_nid t1');
		$this -> db -> where('t1.nid', $nid);
		$this -> db -> where('t2.ece_status', 1);
		$this -> db -> where('t2.st_status', 1);
		//$this -> db -> where('t2.student_id', $id);
		$query = $this->db->get();
		return $query->first_row();
    }

    public function get_exam_schedule($cdate) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'tma t2', 't2.tma_id = t1.tma', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_schedule t1');
		$this -> db -> where('t1.end_date >', 'NOW()', FALSE);
		$this -> db -> where('t1.status', 1);
		$this -> db -> order_by('schedule_id','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	public function getExamDtl($id) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'tma t2', 't2.tma_id = t1.tma', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_schedule t1');
		$this -> db -> where('t1.schedule_id', $id);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

	public function getExamQuestions($tma,$noqsn) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions');
		$this -> db -> where('tma', $tma);
		$this -> db -> where('status', 1);
		$this -> db -> limit($noqsn);
		$this -> db -> order_by('rand()');
		$query = $this->db->get();
		return $query->result();
    } // End of function
    public function getEceExamQuestions($tma,$noqsn,$qt) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions');
		$this -> db -> where('tma', $tma);
		$this -> db -> where('question_type', $qt);
		$this -> db -> where('status', 1);
		$this -> db -> limit($noqsn);
		$this -> db -> order_by('rand()');
		$query = $this->db->get();
		return $query->result();
    } // End of function

	public function getPcaExamQuestions($tma,$noqsn) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions');
		$this -> db -> where('tma', $tma);
		$this -> db -> where('question_type', 3);
		$this -> db -> where('status', 1);
		$this -> db -> limit($noqsn);
		$this -> db -> order_by('rand()');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function querytest($tma,$noqsn) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions');
		$this -> db -> where('tma', $tma);
		//$this -> db -> where('tma', 1);
		$this -> db -> where('question_type', 3);
		$this -> db -> where('status', 1);
		$this -> db -> where('qa_module', 163);
		$this -> db -> limit(5);
		$this -> db -> order_by('rand()');
		$query1 = $this->db->get()->result();

		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions');
		$this -> db -> where('tma', $tma);
		//$this -> db -> where('tma', 2);
		$this -> db -> where('question_type', 3);
		$this -> db -> where('status', 1);
		$this -> db -> where('qa_module', 164);
		$this -> db -> limit(5);
		$this -> db -> order_by('rand()');
		$query2 = $this->db->get()->result();

		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions');
		$this -> db -> where('tma', $tma);
		$this -> db -> where('question_type', 3);
		$this -> db -> where('status', 1);
		$this -> db -> where('qa_module', 165);
		$this -> db -> limit(5);
		$this -> db -> order_by('rand()');
		$query3 = $this->db->get()->result();
		
		
		

		$query = array_merge($query1, $query2, $query3);

		return $query;
    } // End of function

	public function getExamQuestionsAns($qid) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions_answer');
		$this -> db -> where('question_id', $qid);
		$this -> db -> order_by('qa_id', 'ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function getExamQuestionsCorrectAns($qid) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions_answer');
		$this -> db -> where('question_id', $qid);
		$this -> db -> where('qa_ans', 1);
		$query = $this->db->get();
		return $query->result();
		/*return $query->first_row();*/
    } // End of function

    public function insert_exam($contactData)
    {
        $this->db->insert('sht_student_exam', $contactData);
        return $this->db->insert_id();
    }

    public function update_exam($id,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update(DB_PREFIX.'student_exam', $data);		
		$this->db->trans_complete();					
   	} // End of function



    /*function ans_sheet_insert($ansdata){
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'exam_answer_sheet', $ansdata);
		$insert_id = $this->db->insert_id();
		//echo  $this->db->last_query();exit;
		$this->db->trans_complete();
		return $insert_id;
	}*/
	public function ans_sheet_insert($ansdata) {
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'exam_answer_sheet', $ansdata);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    } // End of function

    public function getExamReport($id) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.id', $id);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

	public function getExamGivenAns($id) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		/*$this -> db -> group_by('t1.question_id');*/
		$query = $this->db->get();
		return $query->result();
    } // End of function

public function getExamGivenCorrectAns($id) {
        $this -> db -> select('DISTINCT(t1.question_id)');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		$this -> db -> where('t2.qa_ans', 1);
		/* $this -> db -> group_by('t1.question_id'); */
		$query = $this->db->get();
		return $query->result();
    } // End of function

public function getExamAttendAns($id) {
        $this -> db -> select('DISTINCT(question_id)');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet');
		$this -> db -> where('exam_id', $id);
		//$this -> db -> where('ans_status !=', 5);
		$this -> db -> where('ans_status is NOT NULL', NULL, FALSE);
		/* $this -> db -> group_by('question_id'); */
		$query = $this->db->get();
		return $query->result();
    } // End of function

public function getExamHistory($id) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
public function getExamHistoryNew($id) {
        $this -> db -> select('DISTINCT(exam_id)');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		/* $this -> db -> group_by('t1.exam_id'); */
		$this -> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
public function getExamHistoryEce($id,$sdlid) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sdlid);
		$this -> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
public function getExamResultThry($id,$sdlid) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sdlid);
		$this -> db -> where('t1.qtype', 1);
		$this -> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

public function getExamResultOsce($id,$sdlid) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sdlid);
		$this -> db -> where('t1.qtype', 2);
		$this -> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

public function getExamResultOspe($id,$sdlid) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sdlid);
		$this -> db -> where('t1.qtype', 3);
		$this -> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
public function getExamResultTotal($id,$sdlid) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sdlid);
		$this -> db -> where('t1.qtype != 1');
		/*$this -> db -> or_where('t1.qtype', 3);*/
		$this -> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

public function getExambySchedule($id,$sid) {
        $this -> db -> select('*');
		/*$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');*/
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sid);
		$query = $this->db->get();
		return $query->result();
    } // End of function
public function getExambyScheduleEce($id,$sid,$qt) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sid);
		$this -> db -> where('t1.qtype', $qt);
		$query = $this->db->get();
		return $query->result();
    } // End of function

public function getPassedExam($id,$sid) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sid);
		$this -> db -> where('t1.result', 'Passed');
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

public function getExamStd($id,$sid) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sid);
		$query = $this->db->get();
		return $query->result();
    } // End of function

public function getPassedExamEce($id,$sid,$qt) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sid);
		$this -> db -> where('t1.qtype', $qt);
		$this -> db -> where('t1.result', 'Passed');
		$query = $this->db->get();
		return $query->first_row();
    } // End of function
    public function getExamInfoEce($id,$sid) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.exam_id', $sid);
		$this -> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->first_row();
    } // End of function



    public function getCorrectAns($id) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		$this -> db -> where('t2.qa_ans', 1);
		$this -> db -> order_by('t1.exam_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    function check_email($email){		
		$this -> db -> select('st_id');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('st_email = ' . "'" . $email . "'"); 
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {
			$row = $query->row();
        	return $row->st_id;
		}
		return 0;
	
	}// End function

	function forgot_studentinfo($email){		
		$this -> db -> select('st_id');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('st_email = ' . "'" . $email . "'"); 
		$query = $this->db->get();				
		return $query->first_row();
	
	}// End function

	public function regi_update($userid,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('st_id', $userid);
		$this->db->update(DB_PREFIX.'student', $data);		
		$this->db->trans_complete();					
   	} // End of function

   	function can_login($username, $password)  
      {  
           $this->db->where('st_email', $username);  
           $this->db->where('password', $password);  
           $query = $this->db->get(DB_PREFIX.'student');  
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }  

      //for user login log
	function insert_otp($user_log_data){
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'login_data', $user_log_data);
		$insert_id = $this->db->insert_id();
		//echo  $this->db->last_query();exit;
		$this->db->trans_complete();
		return $insert_id;
	}


	public function getExamGivenCorrectAnsMarks($id) {
        $this -> db -> select('SUM(t1.ans_mark) getmarks');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		$this -> db -> where('t2.qa_ans', 1);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function
    
    public function getExamGivenCorrectAnsTf($id) {
        $this -> db -> select('DISTINCT(t1.question_id)');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		/*$this -> db -> where('t2.qa_ans', 1);*/
		$this -> db -> where('t1.ans_status = t2.qa_ans');
		/* $this -> db -> group_by('t1.question_id'); */
		$query = $this->db->get();
		return $query->result();
    } // End of function
    
    public function getExamGivenCorrectAnsMarksTf($id) {
        $this -> db -> select('SUM(t1.ans_mark) getmarks');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		/*$this -> db -> where('t2.qa_ans', 1);*/
		$this -> db -> where('t1.ans_status = t2.qa_ans');
		$query = $this->db->get();
		return $query->first_row();
    } // End of function
    
    public function getExamGivenWrongAnsTf($id) {
        $this -> db -> select('DISTINCT(t1.question_id)');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		/*$this -> db -> where('t2.qa_ans', 1);*/
		$this -> db -> where('t1.ans_status != t2.qa_ans');
		$this -> db -> where('t1.ans_status !=', 5);
		/* $this -> db -> group_by('t1.question_id'); */
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function getExamGivenNegetiveMark($id) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		/*$this -> db -> where('t2.qa_ans', 1);*/
		$this -> db -> where('t1.ans_status != t2.qa_ans');
		$this -> db -> where('t1.ans_status !=', 5);
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function insert_camerainfo($contactData)
    {
        $this->db->insert('sht_camerainfo', $contactData);
        return $this->db->insert_id();
    }



    public function getStudentIdByStId($stId) {
        $query = $this->db->get_where('sht_student', array('st_id' => $stId));
        if ($query->num_rows() > 0) {
            return $query->row()->student_id;
        } else {
            return null;
        }
    }


    public function insertExamVideoInfo($data) {
        // $data is an associative array containing the values to be inserted
        $this->db->insert('sht_exam_videos', $data);
        return $this->db->insert_id(); // Return the ID of the inserted record
    }




}//end of Class 
?>