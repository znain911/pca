<?php
class Adminlogin extends CI_Model{
		
	function login($username, $password){
		$this -> db -> select('id, username, password, user_group, first_name, last_name, center_id');
		$this -> db -> from('users');
		$this -> db -> where('username = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . $password . "'"); 
		$this -> db -> where('active = ' . "'1'"); 
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
	
	public function get_meanPatientsForDashboard()
	{
		$this -> db -> select('AVG(age) mean_age, AVG(expenditure) mean_expenditure');	
		$this -> db -> from('patients');
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function get_meanPrescripForDashboard()
	{
		$this -> db -> select('AVG(height) mean_height, AVG(weight) mean_weight, AVG(waist) mean_waist, AVG(bmi) mean_bmi, AVG(s_creatinine) mean_s_creatinine, AVG(sbp) mean_sbp, AVG(dbp) mean_dbp, AVG(waist_hip_ratio) mean_waist_hip_ratio, AVG(hba1c) mean_hba1c, AVG(tohpg_post) mean_tohpg_post, AVG(chol) mean_chol, AVG(ldl_c) mean_ldl_c, AVG(hdl_c) mean_hdl_c, AVG(fpg) mean_fpg, AVG(triglycerides) mean_triglycerides');	
		$this -> db -> from('prescriptions');
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function get_todayPatientsForDashboard()
	{
		$this -> db -> select('COUNT(id) todaypatients');	
		$this -> db -> from('patients');
		$this -> db -> where('DATE(created_datetime)', date('Y-m-d'));
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function get_totalPatientsForDashboard()
	{
		$this -> db -> select('COUNT(id) totalpatients');	
		$this -> db -> from('patients');
		//$this -> db -> where('DATE(created_datetime)', date('Y-m-d'));
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function get_todayPatientsForDashboardCntr($cid)
	{
		$this -> db -> select('COUNT(id) todaypatients');	
		$this -> db -> from('patients');
		$this -> db -> where('DATE(created_datetime)', date('Y-m-d'));
		$this -> db -> where('center_id',$cid);
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function get_totalPatientsForDashboardCntr($cid)
	{
		$this -> db -> select('COUNT(id) totalpatients');	
		$this -> db -> from('patients');
		$this -> db -> where('center_id',$cid);
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}


	public function get_meanPatientsForDashboardCntr($cid)
	{
		$this -> db -> select('AVG(age) mean_age, AVG(expenditure) mean_expenditure');	
		$this -> db -> from('patients');
		$this -> db -> where('center_id',$cid);
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function get_meanPrescripForDashboardCntr($cid)
	{
		$this -> db -> select('AVG(height) mean_height, AVG(weight) mean_weight, AVG(waist) mean_waist, AVG(bmi) mean_bmi, AVG(s_creatinine) mean_s_creatinine, AVG(sbp) mean_sbp, AVG(dbp) mean_dbp, AVG(waist_hip_ratio) mean_waist_hip_ratio, AVG(hba1c) mean_hba1c, AVG(tohpg_post) mean_tohpg_post, AVG(chol) mean_chol, AVG(ldl_c) mean_ldl_c, AVG(hdl_c) mean_hdl_c, AVG(fpg) mean_fpg, AVG(triglycerides) mean_triglycerides');	
		$this -> db -> from('prescriptions');
		$this -> db -> where('center_id',$cid);
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function getMeanExpens(){
		$this -> db -> select('count(id) AS expcount, expenditure');
		/* $this -> db -> where('expenditure !=', '');	 */
		$this -> db -> where('expenditure is NOT NULL', NULL, FALSE);
		$this -> db -> from('patients');
		$this -> db -> group_by('expenditure');
		$this -> db -> order_by('expcount','desc');
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function getMeanExpensCntr($cid){
		$this -> db -> select('count(expenditure) AS expcount, expenditure');
		$this -> db -> where('center_id', $cid);	
		$this -> db -> where('expenditure is NOT NULL', NULL, FALSE);
		$this -> db -> from('patients');
		$this -> db -> group_by('expenditure');
		$this -> db -> order_by('expcount','desc');
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function get_todayPrescripForDashboard()
	{
		$this -> db -> select('COUNT(pc_id) todayprescriptions');	
		$this -> db -> from('prescriptions');
		$this -> db -> where('DATE(created_datetime)', date('Y-m-d'));
		$query = $this->db->get();		
		return $query->first_row();
	}

	public function get_todayPrescripForDashboardCntr($cid)
	{
		$this -> db -> select('COUNT(pc_id) todayprescriptions');	
		$this -> db -> from('prescriptions');
		$this -> db -> where('DATE(created_datetime)', date('Y-m-d'));
		$this -> db -> where('center_id',$cid);
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}

	public function get_totalPrescripForDashboard()
	{
		$this -> db -> select('COUNT(pc_id) totalprescriptions');	
		$this -> db -> from('prescriptions');
		$query = $this->db->get();		
		return $query->first_row();
	}

	public function get_totalPrescripForDashboardCntr($cid)
	{
		$this -> db -> select('COUNT(pc_id) totalprescriptions');	
		$this -> db -> from('prescriptions');
		$this -> db -> where('center_id',$cid);
		$query = $this->db->get();
		/*return $query->result();*/
		return $query->first_row();
	}






	public function get_centerForDashboard()
	{
		$this -> db -> select('center_name');	
		$this -> db -> from('centers');
		$this -> db -> where('status',1);
		$this -> db -> order_by('center_name', 'ASC');
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

	 function getDeashboardData()
    {
        $report['centers']=$this->db->where('status',1)->order_by('center_name','asc')->get('centers')->result_array();
            $i=0;
            $report['center']=array();
            foreach($report['centers'] as $center)
            {
                $report['center'][$i]=array();
                $report['center'][$i]['name']=$center['center_name'];
                $report['center'][$i]['tp']=$this->db->select('count(id) as count')->where('created_datetime <=',date('Y-m-d 23:59:59'))->where('created_datetime >=',date('Y-m-d 00:00:00'))->where('center_id',$center['center_id'])->get('patients')->row_array();
                $report['center'][$i]['tph']=$this->db->select('count(pc_id) as count')->where('chk_date <=',date('Y-m-d 23:59:59'))->where('chk_date >=',date('Y-m-d 00:00:00'))->where('center_id',$center['center_id'])->get('prescriptions')->row_array();
               
                $from_date=date('Y-m-d 00:00:00', strtotime("last Saturday"));
                $to_date=date('Y-m-d 23:59:59');
                $report['center'][$i]['wp']=$this->db->select('count(id) as count')->where('created_datetime <=',$to_date)->where('created_datetime >=',$from_date)->where('center_id',$center['center_id'])->get('patients')->row_array();
                $report['center'][$i]['wph']=$this->db->select('count(pc_id) as count')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('center_id',$center['center_id'])->get('prescriptions')->row_array();
                $from_date=date('Y-m-01 00:00:00');
                $to_date=date('Y-m-d 23:59:59', strtotime(date('Y-m-t')));
                $report['center'][$i]['mp']=$this->db->select('count(id) as count')->where('created_datetime <=',$to_date)->where('created_datetime >=',$from_date)->where('center_id',$center['center_id'])->get('patients')->row_array();
                $report['center'][$i]['mph']=$this->db->select('count(pc_id) as count')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('center_id',$center['center_id'])->get('prescriptions')->row_array();
                $i++;
             }
             return $report;
    }
	
											
	
}//end of Class 
?>