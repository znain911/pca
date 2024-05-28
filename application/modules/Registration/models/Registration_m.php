<?php
class Registration_m extends CI_Model{
		
	public function regi_insert($data) {        
		//Transfering data to Model
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'student', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;			
   	} // End of function

   	public function regi_update($userid,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('st_id', $userid);
		$this->db->update(DB_PREFIX.'student', $data);		
		$this->db->trans_complete();					
   	} // End of function
	
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
	
	
	public function get_registration_control($id)
	{
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'settings');
		$this -> db -> where('id', $id);
		$query = $this->db->get();
		return $query->first_row();
	}
											
	
}//end of Class 
?>