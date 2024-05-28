<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API_model extends CI_Model{
    
	public function keyverify($key)
	{
		$this -> db -> select('Api_Method');
		$this -> db -> from(DB_PREFIX.'api');
		$this -> db -> where('Api_Key = ' . "'" . $key . "'");
		$this -> db -> where("Api_Status = '1'");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function userlogin($username,$password)
	{
		$this -> db -> select('Admin_Id,Display_Name,Contact_No,User_Email,User_Image');
		$this -> db -> from(DB_PREFIX.'admin_user');
		$this -> db -> where('User_Login = ' . "'" . $username . "'");
		$this -> db -> where("User_Password = '".md5($password)."'");
		$this -> db -> where("User_Status = '1'");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function forgotpassword($email)
	{
		$this -> db -> select('User_Login,Admin_Id');
		$this -> db -> from(DB_PREFIX.'admin_user');
		$this -> db -> where('User_Email = ' . "'" . $email . "'");
		$query = $this->db->get();
		$result=$query->result();
		if(count($result)>0)
		{
		$userid=$result[0]->Admin_Id;
		$username=$result[0]->User_Login;
		$pass=crypt($email);
		$password=md5($pass);
		
		$data=array('User_Password'=>$password);
		
		$this->db->trans_start();
		$this->db->where('Admin_Id', $userid);
		$this->db->update(DB_PREFIX.'admin_user', $data);		
		$this->db->trans_complete();
		
		$datas=array('username'=>$username,'password'=>$pass);
		}
		else{
			$datas=array();
		}
		
		return $datas;
	}
	
	
	public function saveleagalpaper($data)
	{
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'request_leaglepaper', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
	public function saveimage($data)
	{
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'request_images', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
	public function physicalins($data)
	{
		$datavalue=implode("','",$data);
		$query = $this->db->query("CALL inv_sp_request_carchecklist('".$datavalue."')");
	}
	
	public function mycars($uid)
	{
		$this -> db -> select('t1.Req_Id,t1.Inspection_Date,t2.Car_Model_No,t2.Car_Number_Plate,t2.Car_Company,t3.Request_Name,t3.Request_Address,t3.Request_Contact_No');
		$this -> db -> from(DB_PREFIX.'request_inspector t1');
		$this->db ->join(DB_PREFIX."request_inspect_car t2","t1.Req_Id=t2.Req_Id");
		$this->db ->join(DB_PREFIX."request_register t3","t1.Req_Id=t3.Request_Id");
		$this -> db -> where('t1.Admin_Id = ' . "'" . $uid . "'");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function cartypes()
	{
		$this->db->select("Car_Types_Id,Type_Head");
		$this -> db -> from(DB_PREFIX."car_types");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function carcategory()
	{
		$this->db->select("id,name");
		$this->db->from(DB_PREFIX."category");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	public function checklist()
	{
		$this->db->select("Checklist_Id,Checklist_Head");
		$this->db->from(DB_PREFIX."checklist");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function checklisttype()
	{
		$this->db->select("Checktype_Id,Checktype_Head");
		$this->db->from(DB_PREFIX."checklist_type");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function enginelist()
	{
		$this->db->select("Engine_Id,Engine_Title");
		$this->db->from(DB_PREFIX."engine");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	public function featurelist()
	{
		$this->db->select("Feature_Id,Feature_Head");
		$this->db->from(DB_PREFIX."feature");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function functionallist()
	{
		$this->db->select("Functional_Id,Functional_Title");
		$this->db->from(DB_PREFIX."functional");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	public function performancehead()
	{
		$this->db->select("Head_Id,Head_Title");
		$this->db->from(DB_PREFIX."performance_head");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	
	public function requestleaglepaper()
	{
		$this->db->select("t1.Leaglepaper_Id,t1.Document_Title,t1.File_Name,t1.Leaglepaper_Note,t1.Added_Date,t1.Assign_Date,t1.Leaglepaper_Verify,t2.Car_Model_No,t2.Car_Number_Plate,t2.Car_Company as brand");
		$this->db->from(DB_PREFIX."request_leaglepaper t1");
		$this->db->join(DB_PREFIX."request_inspect_car t2","t1.Inscar_Id=t2.Inscar_Id");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function productlist()
	{
		$this->db->select("Product_Id,Product_Name,Products_Year,Product_Tagline,Product_Details,Inspection_Point,addeddate,vin,Product_Status,producttype,productcat,Products_Brands,Products_Model");
		$this->db->from(DB_PREFIX."view_products");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function read($id){
        if($id===NULL){
           $replace = "" ;
        }
        else{
            $replace = "=$id";
        }
        $query = $this->db->query("select * from books where id".$replace);
        return $query->result_array();
    }
    public function insert($data){
        $this->db->insert('books', $data);
        return TRUE;
    }
    public function delete($id){
        $query = $this->db->query("delete from books where id=$id");
        return TRUE;
        }
    public function update($data){
       $id= $data['id'];
       $this->db->where('id',$id);
       $this->db->update('books',$data);        
    }
}