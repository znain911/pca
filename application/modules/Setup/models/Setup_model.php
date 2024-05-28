<?php
Class Setup_model extends CI_Model{	
	
	public function hba1c_searchbyfilter($from_date,$to_date,$center,$monthyear,$onlyyear)
	{
		$this -> db -> select('COUNT(prescriptions.hba1c) totalhba1c, COUNT(prescriptions.pt_id) totalpt, centers.center_name');
		$this -> db -> join('centers', 'centers.center_id = prescriptions.center_id', 'right');

		if(!empty($to_date) && !empty($from_date)){
			$this -> db -> where('prescriptions.chk_date >= date("'.$from_date.'")');
	        $this -> db -> where( 'prescriptions.chk_date <= date("'.$to_date.'")');	
		}
		if(empty($to_date) && !empty($from_date)){
			$this -> db -> where('prescriptions.chk_date', $from_date);
		}
		if(empty($from_date) && !empty($to_date)){
			$this -> db -> where('prescriptions.chk_date', $to_date);
		}
		if(!empty($monthyear)){
			$this->db->where('MONTH(prescriptions.chk_date)', $monthyear, FALSE);
		}
		if(!empty($onlyyear)){
			$this->db->where('YEAR(prescriptions.chk_date)', $onlyyear, FALSE);
		}
		
		if (!empty($center)) {
			$this -> db -> where( 'centers.center_id', $center);
		}		
		$this -> db -> where('prescriptions.hba1c != ');
		$this -> db -> order_by('prescriptions.chk_date','DESC');
		$this -> db -> from('prescriptions');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_centerlist()
	{
		$this -> db -> select('center_id,center_name');		
		$this -> db -> order_by('center_name','ASC');
		$this -> db -> from('centers');
		$query = $this->db->get();
		return $query->result();
	}

/*--- insulin ---*/
 public function get_insuln() { /*get Insulin list*/
        $this -> db -> select('*');
		$this -> db -> from('insulins');
		$this->db->order_by('insulin_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function insulin_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('insulins', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function insulin_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('insulin_id', $id);
		$this->db->update('insulins', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_insulinforeid($cid) { /*get total patient by center*/
        $this -> db -> select('*');
		$this -> db -> from('insulins');
		$this->db->where('insulin_id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

/*--- End insulin ---*/

/*--- OGLD ---*/
 public function get_ogld() { /*get Insulin list*/
        $this -> db -> select('*');
		$this -> db -> from('ogld');
		$this->db->order_by('brand','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function ogld_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('ogld', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function ogld_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('ogld', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_ogldforeid($cid) { /*get total patient by center*/
        $this -> db -> select('*');
		$this -> db -> from('ogld');
		$this->db->where('id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

/*--- End OGLD ---*/

/*--- Division ---*/
 public function get_division() { /*get Insulin list*/
        $this -> db -> select('*');
		$this -> db -> from('division');
		$this->db->order_by('division_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function division_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('division', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function division_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('division_id', $id);
		$this->db->update('division', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_divisionforeid($cid) { /*get total patient by center*/
        $this -> db -> select('*');
		$this -> db -> from('division');
		$this->db->where('division_id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

/*--- End division ---*/

/*--- district ---*/
 public function get_district() { /*get Insulin list*/
        $this -> db -> select('district.*, division.division_name');
		$this -> db -> from('district');
		$this -> db -> join('division', 'division.division_id = district.division_id', 'left');
		$this->db->order_by('district.district_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function district_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('district', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function district_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('district_id', $id);
		$this->db->update('district', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_districtforeid($cid) { /*get total patient by center*/
        $this -> db -> select('*');
		$this -> db -> from('district');
		$this->db->where('district_id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

/*--- End district ---*/

/*--- profession ---*/
 public function get_profession() { /*get Insulin list*/
        $this -> db -> select('*');
		$this -> db -> from('profession');
		$this->db->order_by('profession_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function profession_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('profession', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function profession_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('profession', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_professionforeid($cid) { /*get total patient by center*/
        $this -> db -> select('*');
		$this -> db -> from('profession');
		$this->db->where('id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

/*--- End profession ---*/

/*--- expenditure ---*/
 public function get_expenditure() { /*get expenditure list*/
        $this -> db -> select('*');
		$this -> db -> from('expenditure');
		$this->db->order_by('expenditure_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function expenditure_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('expenditure', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function expenditure_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('expenditure', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_expenditureforeid($cid) { /*get total patient by center*/
        $this -> db -> select('*');
		$this -> db -> from('expenditure');
		$this->db->where('id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

/*--- End expenditure ---*/

/*--- diabetes_type ---*/
 public function get_diabetes_type() { /*get expenditure list*/
        $this -> db -> select('*');
		$this -> db -> from('diabetes_type');
		$this->db->order_by('type_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function diabetes_type_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('diabetes_type', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function diabetes_type_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('diabetes_type', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_diabetes_typeforeid($cid) { /*get total patient by center*/
        $this -> db -> select('*');
		$this -> db -> from('diabetes_type');
		$this->db->where('id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

/*--- End diabetes_type ---*/

/*--- dm_duration ---*/
 public function get_dm_duration() { /*get expenditure list*/
        $this -> db -> select('*');
		$this -> db -> from('dm_duration');
		$this->db->order_by('duration_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function dm_duration_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('dm_duration', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function dm_duration_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('dm_duration', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_dm_durationforeid($cid) { /*get total patient by center*/
        $this -> db -> select('*');
		$this -> db -> from('dm_duration');
		$this->db->where('id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

/*--- End dm_duration ---*/

/*--- center ---*/
 public function get_center() { /*get expenditure list*/
        $this -> db -> select('*');
		$this -> db -> from('centers');
		$this->db->order_by('center_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function center_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('centers', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function center_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('center_id', $id);
		$this->db->update('centers', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_centerforeid($cid) { /*get total patient by center*/
        $this -> db -> select('*');
		$this -> db -> from('centers');
		$this->db->where('center_id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

/*--- End center ---*/

/*--- Doctor ---*/
 public function get_doctor($cid) { /*get list*/
        $this -> db -> select('doctors.*,centers.center_name');
		$this -> db -> from('doctors');
		$this -> db -> join('centers', 'doctors.center_id = centers.center_id', 'left');
		$this->db->where('doctors.center_id',$cid);
		$this->db->order_by('doctors.doctor_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function get_alldoctor() { /*get list*/
        $this -> db -> select('doctors.*,centers.center_name');
		$this -> db -> from('doctors');
		$this -> db -> join('centers', 'doctors.center_id = centers.center_id', 'left');
		$this->db->order_by('doctors.doctor_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

 public function doctor_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('doctors', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

 public function doctor_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('doctor_id', $id);
		$this->db->update('doctors', $data);				
		$this->db->trans_complete();					
   	} // End of function 

 public function get_doctorforeid($cid) { /*get info*/
        $this -> db -> select('*');
		$this -> db -> from('doctors');
		$this->db->where('doctor_id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 
 public function get_centerfordoctoradd($cid) { /*get list*/
        $this -> db -> select('*');
		$this -> db -> from('centers');
		$this->db->order_by('center_id',$cid);
		$this->db->order_by('center_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

/*--- End Doctor ---*/

/*--- operator ---*/
 public function get_operator($cid) { /*get list*/
        $this -> db -> select('users.*,centers.center_name, groups.description');
		$this -> db -> from('users');
		$this -> db -> join('centers', 'users.center_id = centers.center_id', 'left');
		$this -> db -> join('groups', 'users.user_group = groups.id', 'left');
		$this->db->where('users.center_id',$cid);
		$this->db->order_by('users.doctor_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function 

 public function get_alloperator() { /*get list*/
        $this -> db -> select('users.*,centers.center_name, groups.description');
		$this -> db -> from('users');
		$this -> db -> join('centers', 'users.center_id = centers.center_id', 'left');
		$this -> db -> join('groups', 'users.user_group = groups.id', 'left');
		$this->db->order_by('users.first_name','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

 public function operator_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('users', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function
public function get_operatorforeid($cid) { /*get info*/
        $this -> db -> select('*');
		$this -> db -> from('users');
		$this->db->where('id', $cid);
		$query = $this->db->get();
		return $query->first_row();
    } // End of function 

 public function operator_update($data, $id) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('users', $data);				
		$this->db->trans_complete();					
   	} // End of function 

public function get_usergroup() { /*get list*/
        $this -> db -> select('*');
		$this -> db -> from('groups');
		$this->db->order_by('description','ASC');
		$query = $this->db->get();
		return $query->result();
    } // End of function

/*--- End operator ---*/

	
}//end of Class 
?>