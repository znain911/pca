<?php
Class A_member_m extends CI_Model{	
	var $records_per_page = 10;
	var $start_from = 0;
	var $current_page_number = 1;

	function make_query(){
	      if(isset($_POST["rowCount"]))
	      {
	       $this->records_per_page = $_POST["rowCount"];
	      }
	      else
	      {
	       $this->records_per_page = 10;
	      }
	      if(isset($_POST["current"]))
	      {
	       $this->current_page_number = $_POST["current"];
	      }
	      $this->start_from = ($this->current_page_number - 1) * $this->records_per_page;
	      $this->db->select("*");
	      $this->db->from("ch_member");
	      if(!empty($_POST["searchPhrase"]))
	      {
	       $this->db->like('employee_id', $_POST["searchPhrase"]);
           $this->db->or_like('member_name', $_POST["searchPhrase"]);
           $this->db->or_like('organization_name', $_POST["searchPhrase"]);
	      }
	      if(isset($_POST["sort"]) && is_array($_POST["sort"]))
	      {
	       foreach($_POST["sort"] as $key => $value)
	       {
	        $this->db->order_by($key, $value);
	       }
	      }
	      else
	      {
	       $this->db->order_by('employee_id', 'ASC');
	      }
	      if($this->records_per_page != -1)
	      {
	       $this->db->limit($this->records_per_page, $this->start_from);
	      }
	      $query = $this->db->get();
	      return $query->result_array();
	 }

	 function count_all_data(){
	      $this->db->select("*");
	      $this->db->from("ch_member");
	      $query = $this->db->get();
	      return $query->num_rows();
	 }


	 public function get_memberlist()
	{
		$this -> db -> select('ch_member.id,ch_member.member_id,ch_member.employee_id,ch_member.member_name,ch_member.gender,ch_member.age,ch_member.coverage_period,ch_member.start_date,ch_member.end_date,ch_member.status,ch_member.organization_name,ch_coverage.coverage_amount');
		$this -> db -> join(DB_PREFIX.'coverage', DB_PREFIX.'coverage.coverage_name = '.DB_PREFIX.'member.coverage_period', 'left' );
		$this -> db -> from(DB_PREFIX.'member');
		$query = $this->db->get();
		return $query->result();
	}






	/*----- option list ---*/
	function check_organization($organization_head){		
		$this -> db -> select('orgn_id');
		$this -> db -> from(DB_PREFIX.'organization');
		$this -> db -> where('organization_head = ' . "'" . $organization_head . "'");
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {
			$row = $query->row();
        	return $row->orgn_id;
		}
		return 0;
	
	}// End function
    public function member_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'member', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function
    
	public function one_row_member($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'member');
		$this -> db -> where('id = ' . "'" . $id . "'");
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function get_mbrbycat($organization) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'member');
		$this -> db -> where('organization_name = ' . "'" . $organization . "'");
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function member_info($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'member');
		$this -> db -> where('id = ' . "'" . $id . "'");
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

    public function get_billamount($mbrid,$csdate,$cenddate) {
        $this -> db -> select_sum('total');
		$this -> db -> from(DB_PREFIX.'bill');
		$this -> db -> where('member_id', $mbrid);
		/*$this -> db -> where('billing_date >= date("'.date("Y-m-d", strtotime($csdate)).'")');
	    $this -> db -> where( 'billing_date <= date("'.date("Y-m-d", strtotime($cenddate).'")');*/
	    $this->db->where('billing_date >=', $csdate);
		$this->db->where('billing_date <=', $cenddate);	
		$query = $this->db->get();
		return $query->first_row();
		/* return $query->result(); */
    } // End of function
	
	
	public function coveragebymember_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'coverage_history', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function
	
	
    
    public function get_category() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'organization');
		$this -> db -> where('status = 1');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function get_coverage() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'coverage');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function get_totalbillamount($employee_id) {
        /* $this -> db -> select_sum('total');
		$this -> db -> from(DB_PREFIX.'bill');
		$this -> db -> where('member_id',$employee_id)
		$query = $this->db->get();
		return $query->result(); */
		$this->db->select_sum('total');
		$result = $this->db->get('ch_bill')->row();  
		return $result->total;
		
		
		
    } // End of function
	
	
	
	
	
	
	
	public function member_delete($id) {		
		//Setting values for tabel columns		
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->delete(DB_PREFIX.'member');	
		$this->db->trans_complete();			
   	} // End of function
	public function member_update($id,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update(DB_PREFIX.'member', $data);		
		$this->db->trans_complete();					
   	} // End of function

   	public function member_coverage_renew($data) {
        //Transfering data to Model
		$this->db->trans_start();
		/*$this->db->where('id', $id);*/
		$this->db->insert(DB_PREFIX.'member_coverage', $data);		
		$this->db->trans_complete();					
   	} // End of function
	
	public function exclinsert($data) {        
		//Transfering data to Model
		$this->db->insert_batch(DB_PREFIX.'member', $data);			
   	} // End of function
	
	function count_member(){
	 	return $this->db->count_all('ch_member');
	 }
	

	
}//end of Class 
?>