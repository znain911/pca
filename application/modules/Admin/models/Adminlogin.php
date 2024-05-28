<?php
class Adminlogin extends CI_Model{
		
	function login($username, $password){
		$this -> db -> select('Admin_Id, User_Login, User_Password, Display_Name, Usergroup_Id, User_Image');
		$this -> db -> from(DB_PREFIX.'admin_user');
		$this -> db -> where('User_Login = ' . "'" . $username . "'"); 
		$this -> db -> where('User_Password = ' . "'" . $password . "'"); 
		$this -> db -> where('User_Status = ' . "'1'"); 
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}// end of function
	
	//for user login log
	function user_log($user_log_data){
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'admin_users_log', $user_log_data);
		$insert_id = $this->db->insert_id();
		//echo  $this->db->last_query();exit;
		$this->db->trans_complete();
		return $insert_id;
	}
	
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
	
	public function get_studentDashboard() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> order_by('st_id','DESC');
		$this -> db -> limit(20);
		$query = $this->db->get();
		return $query->result();
    } // End of function

    public function get_studentList() {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> order_by('st_id','DESC');
		$query = $this->db->get();
		return $query->result();
    } // End of function
    
    public function get_studentdata($id) {
        $this -> db -> select('*');
		$this -> db -> from(DB_PREFIX.'student');
		$this -> db -> where('st_id',$id);
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
    } // End of function
    
    public function regi_update($userid,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('st_id', $userid);
		$this->db->update(DB_PREFIX.'student', $data);		
		$this->db->trans_complete();					
   	} // End of function
	
											
	
}//end of Class 
?>