<?php
class Prescription_model extends CI_Model
{
 var $records_per_page = 10;
 var $start_from = 0;
 var $current_page_number = 1;

 function make_query(){
      
      $this->start_from = ($this->current_page_number - 1) * $this->records_per_page;
      $this->db->select("*");
      $this->db->from("tmp_prescription_mdcn");     
      $this->db->order_by('mdcn_name', 'ASC');      
      $query = $this->db->get();
      return $query->result_array();
 }

 function count_all_data(){
      $this->db->select("*");
      $this->db->from("ch_symptoms");
      $query = $this->db->get();
      return $query->num_rows();
 }

 function insert($data){
    $this->db->insert('ch_symptoms', $data);
 }
 function tmp_mdcninsert($data){
    $this->db->insert('tmp_prescription_mdcn', $data);
 }
    
public function exclinsert($data) {        
		//Transfering data to Model
		$this->db->insert_batch(DB_PREFIX.'symptoms', $data);			
   	} // End of function
    
 public function manufecturelist_exl() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'symptoms');
        $this -> db -> order_by('symptoms_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function   

 function fetch_single_data($id)
 {
      $this->db->where('symptoms_id', $id);
      $query = $this->db->get('ch_symptoms');
      return $query->result_array();
 }

 function update($data, $id)
 {
  $this->db->where('symptoms_id', $id);
  $this->db->update('ch_symptoms', $data);
 }

 function delete($id)
 {
  $this->db->where('symptoms_id', $id);
  $this->db->delete('ch_symptoms');
 }
 
 
 //auto
 function fetch_data($query)
 {
  $this->db->like('employee_id', $query);
  $query = $this->db->get('ch_member');
  if($query->num_rows() > 0)
  {
   foreach($query->result_array() as $row)
   {
    $output[] = array(
     'employee_id'  => $row["employee_id"],
     'member_name'  => $row["member_name"]
    );
   }
   echo json_encode($output);
  }
 }
 
 
 function member_single_data($id)
 {
      $this->db->where('employee_id', $id);
      $query = $this->db->get('ch_member');
      return $query->result_array();
 }
 
 
 
 
 public function get_items() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'departmentdata');
		$this->db->order_by('item_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 
	public function get_memberlist() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'member');
		$this -> db -> order_by('employee_id','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	public function get_mdcnlist() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'medicine');
		$this -> db -> order_by('brand_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	public function get_hospitallist() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'hospital');
		$this -> db -> order_by('hospital_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function get_organizationlist() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'organization');
		$this -> db -> order_by('organization_head','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function get_doctorlist() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'doctor');
		$this -> db -> order_by('post_title','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	public function get_doctorcategory() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'doctorcategory');
		$this -> db -> order_by('dcategory_title','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	
	
	
	public function get_symptomslist() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'symptoms');
		$this -> db -> order_by('symptoms_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function mbr_details($mbrid)
	{
		$this -> db -> select('t1.employee_id,t1.member_name,t1.contact_no,t1.age,t1.gender,t2.coverage_amount');
		$this -> db -> join(DB_PREFIX.'coverage t2', 't2.coverage_name = t1.coverage_period', 'LEFT');
		$this -> db -> from(DB_PREFIX.'member t1');
		$this -> db -> where('t1.employee_id', $mbrid);
		$query = $this->db->get();
		return $query->first_row();
		
	}
	
	
	public function get_billamount($mbrid) {
        $this -> db -> select_sum('total');
		$this -> db -> from(DB_PREFIX.'bill');
		$this -> db -> where('member_id', $mbrid);
		$query = $this->db->get();
		return $query->first_row();
		/* return $query->result(); */
    } // End of function
	
	
	
	
	
	
	
	
	function fetch_datamdcn($query){
	  $this->db->like('brand_name', $query, 'after');
	  $query = $this->db->get('ch_medicine');
	  if($query->num_rows() > 0)
	  {
	   foreach($query->result_array() as $row2)
	   {
		$output[] = array(
		 'brand_name'  => $row2["brand_name"],
		 'generic_name'  => $row2["generic_name"]
		);
	   }
	   echo json_encode($output);
	  }
	}
	
	public function prescription_insert($prescriptiondata) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'prescription', $prescriptiondata);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function
	
	
	public function insert_mdcn($mdcndata)
	{
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'prescription_mdcn', $mdcndata);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
	public function insert_symtm($symdata)
	{
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'prescription_symptoms', $symdata);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	public function insert_test($testdata)
	{
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'prescription_test', $testdata);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
	public function get_prescriptiondetails($id)
	{
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'prescription');
		$this -> db -> where('prescription_id', $id);
		$query = $this->db->get();
		return $query->first_row();
	}
	public function get_prescriptionmember($mbrid)
	{
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'member');
		$this -> db -> where('employee_id', $mbrid);
		$query = $this->db->get();
		return $query->first_row();
	}

	
	public function get_prescriptionsymptoms($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'prescription_symptoms');
		$this -> db -> where('prescription_id', $id);
		$this -> db -> order_by('symtom_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function get_prescriptiontest($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'prescription_test');
		$this -> db -> where('prescription_id', $id);
		$this -> db -> order_by('test_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function get_prescriptionmdcn($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'prescription_mdcn');
		$this -> db -> where('prescription_id', $id);
		$this -> db -> order_by('mdcn_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	public function get_pdfdetails($id)
	{
		$this -> db -> select('*');		
		$this -> db -> where('prescription_id', $id);
		$data = $this -> db -> get(DB_PREFIX.'prescription');
		
		$output = '<table width="100%">';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td width="33%">
					<p><b>Member ID : </b>'.$row->member_id.'</p>
					<p><b>Member Name : </b>'.$row->member_name.'</p>
					<p><b>Mobile : </b>'.$row->contact_no.'</p>
				</td>
				<td width="33%">
					<p><b>Age : </b>'.$row->age.'</p>
					<p><b>Gender : </b>'.$row->gender.'</p>
					<p><b>Doctor : </b>'.$row->doctor_name.'</p>
				</td>
				<td width="33%">
					<p><b>Date : </b>'.$row->prescription_date.'</p>
					<p><b>Hospital : </b>'.$row->hospital_name.'</p>
					<p><b>Consultaion Site : </b>'.$row->consultaion_site.'</p>
				</td>
			</tr>
			';
		}
		$output .= '
		<tr>
			<td colspan="2" align="center"><a href="'.base_url().'htmltopdf" class="btn btn-primary">Back</a></td>
		</tr>
		';
		$output .= '</table>';
		return $output;
		
		
		
		
		/*$query = $this->db->get();
		return $query->result();*/
	}

	function symptom_insert($data){
	    $this->db->insert('ch_symptoms', $data);
	 }

	 function invstgsn_insert($data){
	    $this->db->insert('ch_departmentdata', $data);
	 }
	
	function fetch_prescription_report($member_id){
	  $this->db->where('member_id', $member_id);
	  $this->db->where('report_satus', 1);
	  $this->db->order_by('prescription_date', 'ASC');
	  $query = $this->db->get('ch_prescription');
	  $output = '<td colspan="3" style="text-align:center;">Select Member</td>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<tr><td>'.$row->prescription_id.'</td><td>'.date('d M Y', strtotime($row->prescription_date)).'</td><td><a class="btn btn-info btn-lg" href="'.base_url('prescription/prescriptionview').'/'.$row->prescription_id.'" target=”_blank”>View</a></td></tr>';	   
	  }
	  return $output;
	 }
 
 
 
 
 
}

?>