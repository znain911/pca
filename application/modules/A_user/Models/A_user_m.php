<?php
Class A_usergroup_m extends CI_Model{

	
	function check_usergroup($ugroup_name){
		
		$this -> db -> select('Usergroup_Head');
		$this -> db -> from(DB_PREFIX.'admin_user_group');
		$this -> db -> where('Usergroup_Head = ' . "'" . $ugroup_name . "'"); 
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {
			$row = $query->row();
        	return $row->Country_Id;
		}
		return 0;
	
	}// End function
	
	public function one_row($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'admin_user_group');
		$this -> db -> where('Usergroup_Id = ' . "'" . $id . "'");
		$query = $this->db->get();
		return $query->result();
    } // End of function	
	
	
	public function usergroup_insert($data) {        
		$query = $this->db->query("CALL inv_sp_admin_user_group()",$data);
   	} // End of function	
	
	public function usergroup_update($id,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('Usergroup_Id', $id);
		$this->db->update(DB_PREFIX.'admin_user_group', $data);		
		$this->db->trans_complete();					
   	} // End of function	
	
	public function usergroup_delete($id) {		
		//Setting values for tabel columns		
		$this->db->trans_start();
		$this->db->where('Usergroup_Id', $id);
		$this->db->delete(DB_PREFIX.'admin_user_group');	
		$this->db->trans_complete();			
   	} // End of function
	
	
	
	
								
	
}//end of Class 
?>