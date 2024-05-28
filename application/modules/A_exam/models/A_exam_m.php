<?php
Class A_exam_m extends CI_Model{

    public function get_studentList() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> order_by('st_id','DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function get_tma() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'tma');
		$this -> db -> order_by('tma_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function exam_schedule_insert($data) {
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'exam_schedule', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    } // End of function
	 public function ans_insert($ansdata) {
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'questions_answer', $ansdata);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    } // End of function

    public function get_exam_schedule() {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'tma t2', 't2.tma_id = t1.tma', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_schedule t1');
		$this -> db -> where('exam_type',1);
		$this -> db -> order_by('start_date','DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function get_pcaexam_schedule() {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'tma t2', 't2.tma_id = t1.tma', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_schedule t1');
		$this -> db -> where('exam_type',2);
		$this -> db -> order_by('start_date','DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function



    public function question_delete($id) {		
		//Setting values for tabel columns		
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->delete(DB_PREFIX.'questions');	
		$this->db->trans_complete();			
   	} // End of function
	public function questionAns_delete($id) {		
		//Setting values for tabel columns		
		$this->db->trans_start();
		$this->db->where('question_id', $id);
		$this->db->delete(DB_PREFIX.'questions_answer');	
		$this->db->trans_complete();			
   	} // End of function

   	public function exam_details($id)
	{
		$this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'tma t2', 't2.tma_id = t1.tma', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_schedule t1');
		$this -> db -> where('t1.schedule_id', $id);
		$query = $this->db->get();
		return $query->first_row();
	}

	public function get_question_ans($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions_answer');
		$this-> db -> where('question_id', $id);
		$this-> db -> order_by('qa_id', 'ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function examschedule_update($id,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('schedule_id', $id);
		$this->db->update(DB_PREFIX.'exam_schedule', $data);		
		$this->db->trans_complete();					
   	} // End of function
	
	public function getExamListbySchedule($id) {
        $this -> db -> select('t1.*,t2.schedule_name,t2.total_mark,t2.pass_mark,t2.marks_per_question,t2.no_of_question,t3.*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> join(DB_PREFIX.'student t3', 't3.st_id = t1.student_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.exam_id', $id);
		$this-> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function getEceResultSchedule($id) {
        $this -> db -> select('t1.*,t2.schedule_name,t2.total_mark,t2.pass_mark,t2.marks_per_question,t2.no_of_question,t2.start_date,t3.*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> join(DB_PREFIX.'student t3', 't3.st_id = t1.student_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.exam_id', $id);
		$this -> db -> group_by('t1.student_id');
		$this-> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function getEceTheoryReport($id) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.qtype', 1);
		$this -> db -> limit(1);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

    public function getEceOsceReport($id) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.qtype', 2);
		$this -> db -> limit(1);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

    public function getEceOspeReport($id) {
        $this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.qtype', 3);
		$this -> db -> limit(1);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

    public function getResultAll() {
        $this -> db -> select('t1.*,t2.schedule_name,t2.total_mark,t2.pass_mark,t2.marks_per_question,t2.no_of_question,t3.*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> join(DB_PREFIX.'student t3', 't3.st_id = t1.student_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		/*$this -> db -> where('t1.exam_id', $id);*/
		$this-> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function getResultAllNew() {
        $this -> db -> select('t1.*,t2.schedule_name,t2.total_mark,t2.pass_mark,t2.marks_per_question,t2.no_of_question,t3.*');
		$this -> db -> join(DB_PREFIX.'exam_schedule t2', 't2.schedule_id = t1.exam_id', 'LEFT');
		$this -> db -> join(DB_PREFIX.'student t3', 't3.st_id = t1.student_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'student_exam t1');
		$this -> db -> where('t2.tma != 3');
		$this-> db -> order_by('t1.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function getExamGivenCorrectAns($id) {
        /* $this -> db -> select('DISTINCT(t1.question_id)'); */
		$this -> db -> select('t1.question_id');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		$this -> db -> where('t2.qa_ans', 1);
		/* $this -> db -> group_by('t1.question_id'); */
		$query = $this->db->get();
		return $query->result();
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
        /* $this -> db -> select('DISTINCT(t1.question_id)'); */
		$this -> db -> select('t1.question_id');
		$this -> db -> join(DB_PREFIX.'questions_answer t2', 't2.qa_id = t1.ans_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet t1');
		$this -> db -> where('t1.exam_id', $id);
		/* $this -> db -> group_by('t1.question_id'); */
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function getExamAttendAns($id) {
       /*  $this -> db -> select('DISTINCT(question_id)'); */
		$this -> db -> select('question_id');
		$this -> db -> from(DB_PREFIX.'exam_answer_sheet');
		$this -> db -> where('exam_id', $id);
		$this -> db -> where('ans_id is NOT NULL', NULL, FALSE);
		/* $this -> db -> group_by('question_id'); */
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function exam_camera($id, $sdl)
	{
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'camerainfo t1');
		$this -> db -> where('t1.student_id', $id);
		$this -> db -> where('t1.schedule_id', $sdl);
		$query = $this->db->get();
		return $query->first_row();
	}


}//end of Class 
?>