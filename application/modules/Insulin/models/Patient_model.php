<?php
class Patient_model extends CI_Model
{
 
 
 
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

public function get_patientVisit2($id) { /*get Patient Visit 2 information*/ 
        $this -> db -> select('prescriptions.*, doctors.doctor_name');
        $this -> db -> join('doctors','doctors.doctor_id=prescriptions.doctor_id', 'left');
		$this -> db -> from('prescriptions');
		$this -> db -> where('prescriptions.pt_id', $id);
		$this -> db -> where('prescriptions.visit_id', 3);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function
/*public function get_currentInsulin($pid){
	$this -> db -> select('insulin_id,insulin_name');
	$this -> db -> from('insulins');
	$this->db->order_by('insulin_name','ASC');
	$query = $this->db->get();
	return $query->result();
}*/   

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
 
 
}

?>