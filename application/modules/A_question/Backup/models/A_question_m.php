<?php
Class A_question_m extends CI_Model{

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

    public function question_insert($data) {
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'questions', $data);
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

    public function get_question() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'questions');
		$this -> db -> order_by('title','ASC');
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

   	public function queston_details($id)
	{
		$this -> db -> select('*');
		$this -> db -> join(DB_PREFIX.'tma t2', 't2.tma_id = t1.tma', 'LEFT');
		$this -> db -> from(DB_PREFIX.'questions t1');
		$this -> db -> where('t1.id', $id);
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

    public function question_update($id,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update(DB_PREFIX.'questions', $data);		
		$this->db->trans_complete();					
   	} // End of function
	
}//end of Class 
?>