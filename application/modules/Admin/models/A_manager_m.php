<?php
Class A_manager_m extends CI_Model{

	public function failed_inspections()
	{
		$this->db->select('t1.Request_Id,t1.Request_Name,t1.Request_Contact_No,(case when (t1.Request_Type = 0) THEN "Call Center" ELSE "Web Application" END) as Request_Type,t2.Display_Name,t3.Car_Company,t3.Car_Model_No,t3.Car_Year')
		-> from(TEM_PREFIX.'request_register t1')
		->join(DB_PREFIX."admin_user t2","t1.Admin_Id=t2.Admin_Id","INNER")
		->join(TEM_PREFIX."request_inspect_car t3","t1.Request_Id=t3.Req_Id")
		->where('t1.Mi_Status = 1')
		->where('t1.Request_Status = 2');
		$query=$this->db->get();
		
		$data=$query->result();
    	
		echo json_encode($data);
	}
	
	
	public function inspected_list()
	{
		$this->db->select('t1.Request_Id,t1.Request_Name,t1.Request_Contact_No,(case when (t1.Request_Type = 0) THEN "Call Center" ELSE "Web Application" END) as Request_Type,t2.Display_Name,t3.Car_Company,t3.Car_Model_No,t3.Car_Year')
		-> from(DB_PREFIX.'request_register t1')
		->join(DB_PREFIX."admin_user t2","t1.Admin_Id=t2.Admin_Id","LEFT")
		->join(DB_PREFIX."request_inspect_car t3","t1.Request_Id=t3.Req_Id")
		->where('t1.Mi_Status = 1')
		->where('t1.Request_Status = 1');
		$query=$this->db->get();
		
		$data=$query->result();
    	
		echo json_encode($data);
	}
	
	//Get request details
	public function request_details($id)
	{
		//$status=0;
		$this -> db -> select('*');
		$this -> db -> from(TEM_PREFIX.'request_register');
		$this -> db -> where('Request_Id = ' . "'" . $id . "'");
		//$this -> db -> where('Request_Status = ' . "'" . $status . "'");
		$query = $this->db->get();
		return $query->result();
	}
	
	//Inspection car list
	public function inspectioncarlist($id)
	{
		$this -> db -> select('Inscar_Id,Mileage,Car_Color,Car_Transmission,Car_Fueltypes,Car_Registration,Expected_Price,Car_Model_No,Car_Number_Plate,Car_Company,Cc,Engine_Number,Chassis_Number');
		$this -> db -> from(TEM_PREFIX.'request_inspect_car');
		$this -> db -> where("Req_Id ='".$id."'");
		$query = $this->db->get();
		
		$data=$query->result();
		
		if(count($data)>0)
		{
			return $data;
		}
		else
		{
			return array('');
		}
	}
	
	
	//inspectorlist list
	public function inspectorlist($id)
	{
		$this -> db -> select('DATE_FORMAT(t1.Inspection_Date, ("%D %M %Y")) As ins_date,DATE_FORMAT(t1.Inspection_Time, ("%h:%m:%s %p")) As ins_time,t2.Display_Name')
		-> from(DB_PREFIX.'request_inspector t1')
		->join(DB_PREFIX."admin_user t2","t1.Admin_Id=t2.Admin_Id","LEFT")
		-> where("Req_Id ='".$id."'");
		$query = $this->db->get();
		$data=$query->result();
		
		if(count($data)>0)
		{
			return $data;
		}
		
	}
	
	
	
	public function request_update($id,$data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('Request_Id', $id);
		$this->db->update(TEM_PREFIX.'request_register', $data);	
			
		$this->db->trans_complete();					
   	} // End of function	
	
	
	public function sendmail($data)
	{
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX."notification",$data);
		if($this->db->trans_complete())
		{
			return TRUE;
		}
		else{return FALSE;}
	}
	
	public function getadminid()
	{
		$this -> db -> select('Admin_Id,Display_Name');
		$this -> db -> from(DB_PREFIX.'admin_user');
		$this -> db -> where('User_Status =1');
		$this -> db -> where('Usergroup_Id =2');
		$query = $this->db->get();
		return $query->result();
	}
	
	
}//end of Class 
?>