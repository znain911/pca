<?php
Class A_settings_m extends CI_Model{

	public function get_registration_control($id)
	{
		$this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'settings');
		$this -> db -> where('id', $id);
		$query = $this->db->get();
		return $query->first_row();
	}

   
    public function registration_control_update($id,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update(DB_PREFIX.'settings', $data);		
		$this->db->trans_complete();					
   	} // End of function
	
	public function getotp() {
        $this -> db -> select('t1.*,t2.*');
		$this -> db -> join(DB_PREFIX.'student t2', 't2.st_id = t1.user_id', 'LEFT');
		$this -> db -> from(DB_PREFIX.'login_data t1');
		$this -> db -> limit('500');
		$this-> db -> order_by('t1.login_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
	
	


}//end of Class 
?>