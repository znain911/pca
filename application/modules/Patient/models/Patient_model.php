<?php
class Patient_model extends CI_Model
{

  public function deleteBycon($table,$id,$con)
	{
		return $this->db->where($con,$id)->delete($table);
	}
 
  public function get_expnditure() { /*get expenditure list*/
        $this -> db -> select('*');
		$this -> db -> from('expenditure');
		$this -> db -> where('status',1);
		$this->db->order_by('expenditure_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

  public function get_profesion() { /*get profesion list*/
        $this -> db -> select('*');
		$this -> db -> from('profession');
		$this -> db -> where('status',1);
		$this->db->order_by('profession_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 
 public function get_typeofdiabetes() { /*get type of diabetes list*/
        $this -> db -> select('*');
		$this -> db -> from('diabetes_type');
		$this -> db -> where('status',1);
		$this->db->order_by('type_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 
public function get_dm_duration() { /*get dm_duration list*/
        $this -> db -> select('*');
		$this -> db -> from('dm_duration');
		$this -> db -> where('status',1);
		$this->db->order_by('duration_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function get_division() { /*get division list*/
        $this -> db -> select('*');
		$this -> db -> from('division');
		$this->db->order_by('division_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 
 public function get_district($divisionid) { /*get district list*/
        $this->db->where('division_id', $divisionid);
		  $this->db->order_by('district_name', 'ASC');
		  $query = $this->db->get('district');
		  $output = '<option value="">Select District</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->district_id.'">'.$row->district_name.'</option>';
		  }
		  return $output;
    } // End of function 

 public function patient_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('patients', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function 
public function atd_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('prescriptions', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function 

public function atd_insulin_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('prescription_insulin', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function
public function atd_ogld_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('prescription_ogld', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

public function pre_insulin_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('prescription_insulin_pre', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function
public function pre_ogld_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('prescription_ogld_pre', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

public function prescriptions_update($id,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('pc_id', $id);
		$this->db->update('prescriptions', $data);		
		$this->db->trans_complete();					
   	} // End of function

  public function patient_update($id,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('patients', $data);		
		$this->db->trans_complete();					
   	} // End of function

  public function get_countpatient($cid) { /*get total patient by center*/
        $this -> db -> select('count(id) totalpatientbycenter');
		$this -> db -> from('patients');
		$this->db->where('center_id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function  	

  public function get_doctor() { /*get division list*/
        $this -> db -> select('doctor_id,doctor_name');
		$this -> db -> from('doctors');
		$this->db->where('is_active', 1);
		$this->db->order_by('doctor_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

  public function get_ogld() { /*get OGLD list*/
        $this -> db -> select('id,brand');
		$this -> db -> from('ogld');
		$this->db->order_by('brand','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 
  public function get_insuln() { /*get Insulin list*/
        $this -> db -> select('insulin_id,insulin_name');
		$this -> db -> from('insulins');
		$this->db->order_by('insulin_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

public function get_patientDetail($id) { /*get Patient personal information*/
        $this -> db -> select('patients.*, centers.center_name, division.division_name, district.district_name');
        $this -> db -> join('centers','centers.center_id=patients.center_id', 'left');
        $this -> db -> join('division','division.division_id=patients.division_id', 'left');
        $this -> db -> join('district','district.district_id=patients.district_id', 'left');
		$this -> db -> from('patients');
		$this -> db -> where('patients.id', $id);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

public function get_patientAtTime($id) { /*get Patient At time information*/ 
        $this -> db -> select('prescriptions.*, doctors.doctor_name');
        $this -> db -> join('doctors','doctors.doctor_id=prescriptions.doctor_id', 'left');
		$this -> db -> from('prescriptions');
		$this -> db -> where('prescriptions.pt_id', $id);
		$this -> db -> where('prescriptions.visit_id', 1);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

public function get_patient5yr($id) { /*get Patient 5 Years information*/ 
        $this -> db -> select('prescriptions.*, doctors.doctor_name');
        $this -> db -> join('doctors','doctors.doctor_id=prescriptions.doctor_id', 'left');
		$this -> db -> from('prescriptions');
		$this -> db -> where('prescriptions.pt_id', $id);
		$this -> db -> where('prescriptions.visit_id', 2);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

public function get_patientVisit1($id) { /*get Patient Visit 1 information*/ 
        $this -> db -> select('prescriptions.*, doctors.doctor_name');
        $this -> db -> join('doctors','doctors.doctor_id=prescriptions.doctor_id', 'left');
		$this -> db -> from('prescriptions');
		$this -> db -> where('prescriptions.pt_id', $id);
		$this -> db -> where('prescriptions.visit_id', 3);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function
public function get_ptpre_ogld($pcode){
	$this -> db -> select('t1.id,t1.dosage, t1.ogld_id, t2.brand, t2.generic, t2.strength');
    $this -> db -> join('ogld t2','t1.ogld_id=t2.id', 'left');
	$this -> db -> from('prescription_ogld_pre t1');
	$this -> db -> where('t1.pc_id', $pcode);
	$query = $this->db->get();
	return $query->result();
}

public function get_ptcrt_ogld($pcode){
	$this -> db -> select('t1.id,t1.dosage, t1.ogld_id, t2.brand, t2.generic, t2.strength');
    $this -> db -> join('ogld t2','t1.ogld_id=t2.id', 'left');
	$this -> db -> from('prescription_ogld t1');
	$this -> db -> where('t1.pc_id', $pcode);
	$query = $this->db->get();
	return $query->result();
}

public function get_pc_insulin($pcode)
    {
    	$this -> db -> select('t1.pci_id, t1.dose_morning, t1.dose_noon, t1.dose_night, t1.dose_bed, t1.insulin_id, t2.insulin_name');
	    $this -> db -> join('insulins t2','t1.insulin_id=t2.insulin_id', 'left');
		$this -> db -> from('prescription_insulin t1');
		$this -> db -> where('t1.pc_id', $pcode);
		$query = $this->db->get();
		return $query->result();
       
    }
public function get_pc_insulin_pre($pcode)
    {
    	$this -> db -> select('t1.pci_id, t1.dose_morning, t1.dose_noon, t1.dose_night, t1.dose_bed, t1.insulin_id, t2.insulin_name');
	    $this -> db -> join('insulins t2','t1.insulin_id=t2.insulin_id', 'left');
		$this -> db -> from('prescription_insulin_pre t1');
		$this -> db -> where('t1.pc_id', $pcode);
		$query = $this->db->get();
		return $query->result();
       
    }


public function get_patientVisit2($id) { /*get Patient Visit 2 information*/ 
        $this -> db -> select('prescriptions.*, doctors.doctor_name');
        $this -> db -> join('doctors','doctors.doctor_id=prescriptions.doctor_id', 'left');
		$this -> db -> from('prescriptions');
		$this -> db -> where('prescriptions.pt_id', $id);
		$this -> db -> where('prescriptions.visit_id', 4);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function

public function get_currentInsulin($pid){
	$this -> db -> select('insulin_id,insulin_name');
	$this -> db -> from('insulins');
	$this->db->order_by('insulin_name','ASC');
	$query = $this->db->get();
	return $query->result();
}   

public function get_all_insulin($pid)
    {
        $query = "SELECT * FROM prescription_insulin LEFT JOIN insulins ON prescription_insulin.insulin_id=insulins.insulin_id ";
        $query .= "WHERE prescription_insulin.pc_id='$pid' ";
        $query .= "ORDER BY prescription_insulin.pci_id DESC ";
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function get_pre_insulin($pid)
    {
        $query = "SELECT prescription_insulin_pre.*, insulins.insulin_name FROM prescription_insulin_pre LEFT JOIN insulins ON prescription_insulin_pre.insulin_id=insulins.insulin_id ";
        $query .= "WHERE prescription_insulin_pre.pc_id='$pid' ";
        $query .= "ORDER BY prescription_insulin_pre.pci_id DESC ";
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function get_all_ogld($pid)
    {
        $query = "SELECT prescription_ogld.id,prescription_ogld.dosage as dosage_cur,ogld.brand FROM prescription_ogld LEFT JOIN ogld ON prescription_ogld.ogld_id=ogld.id ";
        $query .= "WHERE prescription_ogld.pc_id='$pid' ";
        $query .= "ORDER BY prescription_ogld.id DESC ";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function get_pre_ogld($pid)
    {
        $query = "SELECT prescription_ogld_pre.dosage as dosage_pre,ogld.brand FROM prescription_ogld_pre LEFT JOIN ogld ON prescription_ogld_pre.ogld_id=ogld.id ";
        $query .= "WHERE prescription_ogld_pre.pc_id='$pid' ";
        $query .= "ORDER BY prescription_ogld_pre.id DESC ";
        $query = $this->db->query($query);
        return $query->result_array();
    }


    public function searchEmergencyPatient($option)
	{
		$patient=array();
		if(substr($option,0,1)=='0'){
			
            $patients=$this->db->select('patients.*,centers.center_name')->join('centers','centers.center_id=patients.center_id')->like('phone',$option)->get('patients')->result_array();
            
		}/*else if(substr($option,0,1)>='0' && substr($option,0,1)<='9'){
			
			$patients=$this->db->select('patients.*,centers.center_name')->join('centers','centers.center_id=patients.center_id')->like('patient_code',$option)->get('patients')->result_array();
           
		}*/else if(substr($option,0,1)>='0' && substr($option,0,1)<='9'){
			$patients=$this->db->select('patients.*,centers.center_name')->join('centers','centers.center_id=patients.center_id')->like('patient_book_number',$option)->get('patients')->result_array();
		}else{			
			$patients=$this->db->select('patients.*,centers.center_name')->join('centers','centers.center_id=patients.center_id')->like('patient_name',$option)->get('patients')->result_array();
			
		}
		$i=0;
		foreach($patients as $patient)
		{
			    $patients[$i]['first']=$this->db->where('pt_id',$patient['patient_code'])->where('visit_id','1')->get('prescriptions')->num_rows();
				$patients[$i]['five']= $this->db->where('pt_id',$patient['patient_code'])->where('visit_id','2')->get('prescriptions')->num_rows();
				$patients[$i]['first1']=$this->db->where('pt_id',$patient['patient_code'])->where('visit_id','3')->get('prescriptions')->num_rows();
				$patients[$i]['follow1']=$this->db->where('pt_id',$patient['patient_code'])->where('visit_id','4')->get('prescriptions')->num_rows();
				$i++;
		}
		return $patients;
	}

	function getUserCenter($center_id)
    {
         return $this->db->where('center_id',$center_id)->get('centers')->row_array();
    }

    public function PatientList($option)
	{
		$patient=array();

		$patients=$this->db->select('patients.*,centers.center_name')->join('centers','centers.center_id=patients.center_id')->where('patients.center_id',$option)->get('patients')->result_array();

		$i=0;
		foreach($patients as $patient)
		{
			    $patients[$i]['first']=$this->db->where('pt_id',$patient['patient_code'])->where('visit_id','1')->get('prescriptions')->num_rows();
				$patients[$i]['five']= $this->db->where('pt_id',$patient['patient_code'])->where('visit_id','2')->get('prescriptions')->num_rows();
				$patients[$i]['first1']=$this->db->where('pt_id',$patient['patient_code'])->where('visit_id','3')->get('prescriptions')->num_rows();
				$patients[$i]['follow1']=$this->db->where('pt_id',$patient['patient_code'])->where('visit_id','4')->get('prescriptions')->num_rows();
				$i++;
		}
		return $patients;
	}

	public function getInsulinId($query)
	{
		$data1= $this->db->like('insulin_name',$query)->get('insulins')->result_array();
		return array_merge($data1);
	}
	public function getAllInsulin()
	{
		return $this->db->get('insulins')->result();
	}
	public function getOgld($query)
	{

		$data1= $this->db->like('generic',$query)->get('ogld')->result_array();
		$data2= $this->db->like('brand',$query)->get('ogld')->result_array();
		return array_merge($data1,$data2);
	}
 
 
}

?>