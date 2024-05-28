<?php
Class Reports_m extends CI_Model{	
	
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

	public function getAll($table)
	{
		if($table=='centers'){
              
              return $this->db->order_by('center_name','asc')->get($table)->result();
		}else{
			return $this->db->get($table)->result();
		}
		
	}

	function getHba1cReprot($from_date,$to_date,$center='0')
    {

        $report=array();
    	if($center=='0')
    	{
            $report['centers']=$this->db->order_by('center_name','asc')->get('centers')->result_array();
            $i=0;
            foreach($report['centers'] as $center)
            {
                $report['centers'][$i]=array();
                $report['centers'][$i]['name']=$center['center_name'];
                $report['centers'][$i]['p']=$this->db->select('count(id) as count')->where('created_datetime <=',$to_date.' 23:59:59')->where('created_datetime >=',$from_date.' 00:00:01')->where('center_id',$center['center_id'])->get('patients')->row_array();

                 $report['centers'][$i]['visit1']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                 $report['centers'][$i]['visit1p']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','paid')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                 $report['centers'][$i]['visit1f']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','free')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['visit2']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['visit2p']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','paid')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['visit2f']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','free')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['ph']=$this->db->select('count(pc_id) as count')->join('prescriptions','prescriptions.pt_id=patients.patient_code')->where('hba1c is NOT NULL', '', FALSE)->where('prescriptions.chk_date <=',$to_date)->where('prescriptions.chk_date >=',$from_date)->where('visit_id','1')->where('patients.center_id',$center['center_id'])->group_by('patients.id')->get('patients')->row_array();

                $report['centers'][$i]['prh']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL', '', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where_in('visit_id',array('3','4'))->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['og']=$this->db->select('count(id) as count')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('center_id',$center['center_id'])->get('prescription_ogld')->row_array();

                $report['centers'][$i]['hi']=$this->getColumnCountinsulin('insulin_category','Human Insulin',$from_date,$to_date,$center['center_id']);

                $report['centers'][$i]['mi']=$this->getColumnCountinsulin('insulin_category','Modern Insulin',$from_date,$to_date,$center['center_id']);

                $doctors=$this->db->where('center_id',$center['center_id'])->get('doctors')->result_array();
                $j=0;
                foreach($doctors as $doctor)
                {
                    $report['centers'][$i]['doctor'][$j]=array();

                    $report['centers'][$i]['doctor'][$j]['name']=$doctor['doctor_name'];
                    $report['centers'][$i]['doctor'][$j]['p']['count']=count($this->db->select('count(id) as count')->join('prescriptions','prescriptions.pt_id=patients.patient_code')->where('patients.created_datetime <=',$to_date.' 23:59:59')->where('patients.created_datetime >=',$from_date.' 00:00:01')->where('doctor_id',$doctor['doctor_id'])->group_by('pt_id')->get('patients')->result_array());
                    $report['centers'][$i]['doctor'][$j]['prh']=$this->db->select('count(pc_id) as count')->where_in('visit_id',array('3','4'))->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                    $report['centers'][$i]['doctor'][$j]['visit1']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                 $report['centers'][$i]['doctor'][$j]['visit1p']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','paid')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                 $report['centers'][$i]['doctor'][$j]['visit1f']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','free')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['visit2']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['visit2p']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','paid')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['visit2f']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','free')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['ph']=$this->db->select('count(pc_id) as count')->join('prescriptions','prescriptions.pt_id=patients.patient_code')->where('hba1c is NOT NULL', '', FALSE)->where('prescriptions.chk_date <=',$to_date)->where('prescriptions.chk_date >=',$from_date)->where('visit_id','1')->where('doctor_id',$doctor['doctor_id'])->group_by('patients.id')->get('patients')->row_array();

                $report['centers'][$i]['doctor'][$j]['prh']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL', '', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where_in('visit_id',array('3','4'))->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['og']=$this->db->select('count(id) as count')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('doctor_id',$doctor['doctor_id'])->get('prescription_ogld')->row_array();

                $report['centers'][$i]['doctor'][$j]['hi']=$this->getColumnCountinsulin('insulin_category','Human Insulin',$from_date,$to_date,$doctor['doctor_id'],'doctor');

                $report['centers'][$i]['doctor'][$j]['mi']=$this->getColumnCountinsulin('insulin_category','Modern Insulin',$from_date,$to_date,$doctor['doctor_id'],'doctor');
                    $j++;
                }
                $i++;
            }
            
    	}else if($center!='0')
    	{
    		$report['centers']=$this->db->where('center_id',$center)->get('centers')->result_array();
            $i=0;
            foreach($report['centers'] as $center)
            {
                $report['centers'][$i]=array();
                $report['centers'][$i]['name']=$center['center_name'];
                $report['centers'][$i]['p']=$this->db->select('count(id) as count')->where('created_datetime <=',$to_date.' 23:59:59')->where('created_datetime >=',$from_date.' 00:00:01')->where('center_id',$center['center_id'])->get('patients')->row_array();

                 $report['centers'][$i]['visit1']=$this->db->select('count(pc_id) as count')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                 $report['centers'][$i]['visit1p']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','paid')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                 $report['centers'][$i]['visit1f']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','free')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['visit2']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['visit2p']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','paid')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['visit2f']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','free')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['ph']=$this->db->select('count(pc_id) as count')->join('prescriptions','prescriptions.pt_id=patients.patient_code')->where('hba1c is NOT NULL', '', FALSE)->where('prescriptions.chk_date <=',$to_date)->where('prescriptions.chk_date >=',$from_date)->where('visit_id','1')->where('patients.center_id',$center['center_id'])->group_by('patients.id')->get('patients')->row_array();

                $report['centers'][$i]['prh']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL', '', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where_in('visit_id',array('3','4'))->where('center_id',$center['center_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['og']=$this->db->select('count(id) as count')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('center_id',$center['center_id'])->get('prescription_ogld')->row_array();

                $report['centers'][$i]['hi']=$this->getColumnCountinsulin('insulin_category','Human Insulin',$from_date,$to_date,$center['center_id']);

                $report['centers'][$i]['mi']=$this->getColumnCountinsulin('insulin_category','Modern Insulin',$from_date,$to_date,$center['center_id']);
                $doctors=$this->db->where('center_id',$center['center_id'])->get('doctors')->result_array();
                $j=0;
                foreach($doctors as $doctor)
                {
                    $report['centers'][$i]['doctor'][$j]=array();
                    $report['centers'][$i]['doctor'][$j]['name']=$doctor['doctor_name'];
                    $report['centers'][$i]['doctor'][$j]['p']['count']=count($this->db->select('count(id) as count')->join('prescriptions','prescriptions.pt_id=patients.patient_code')->where('patients.created_datetime <=',$to_date.' 23:59:59')->where('patients.created_datetime >=',$from_date.' 00:00:01')->where('doctor_id',$doctor['doctor_id'])->group_by('pt_id')->get('patients')->result_array());
                    $report['centers'][$i]['doctor'][$j]['prh']=$this->db->select('count(pc_id) as count')->where_in('visit_id',array('3','4'))->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                    $report['centers'][$i]['doctor'][$j]['visit1']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                 $report['centers'][$i]['doctor'][$j]['visit1p']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','paid')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                 $report['centers'][$i]['doctor'][$j]['visit1f']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','free')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','3')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['visit2']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['visit2p']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','paid')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['visit2f']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL','', FALSE)->where('payment_status','free')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('visit_id','4')->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['ph']=$this->db->select('count(pc_id) as count')->join('prescriptions','prescriptions.pt_id=patients.patient_code')->where('hba1c is NOT NULL', '', FALSE)->where('prescriptions.chk_date <=',$to_date)->where('prescriptions.chk_date >=',$from_date)->where('visit_id','1')->where('doctor_id',$doctor['doctor_id'])->group_by('patients.id')->get('patients')->row_array();

                $report['centers'][$i]['doctor'][$j]['prh']=$this->db->select('count(pc_id) as count')->where('hba1c is NOT NULL', '', FALSE)->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where_in('visit_id',array('3','4'))->where('doctor_id',$doctor['doctor_id'])->get('prescriptions')->row_array();

                $report['centers'][$i]['doctor'][$j]['og']=$this->db->select('count(id) as count')->where('chk_date <=',$to_date)->where('chk_date >=',$from_date)->where('doctor_id',$doctor['doctor_id'])->get('prescription_ogld')->row_array();

                $report['centers'][$i]['doctor'][$j]['hi']=$this->getColumnCountinsulin('insulin_category','Human Insulin',$from_date,$to_date,$doctor['doctor_id'],'doctor');

                $report['centers'][$i]['doctor'][$j]['mi']=$this->getColumnCountinsulin('insulin_category','Modern Insulin',$from_date,$to_date,$doctor['doctor_id'],'doctor');

                    $j++;
                }
                $i++;
            }
    	}
        
        return $report;
    }

    function getColumnCountinsulin($column,$c_value,$from_date,$to_date,$center,$type='none')
    {
        if($type=='doctor'){
            return $this->db->select('count(pci_id) as count')->join('insulins','insulins.insulin_id=prescription_insulin.insulin_id')->like($column, $c_value)->where('prescription_insulin.chk_date <=',$to_date)->where('prescription_insulin.chk_date >=',$from_date)->where('doctor_id',$center)->where_in('visit_id',array('3','4'))->get('prescription_insulin')->row_array();
        }else{
            return $this->db->select('count(pci_id) as count')->join('insulins','insulins.insulin_id=prescription_insulin.insulin_id')->like($column, $c_value)->where('prescription_insulin.chk_date <=',$to_date)->where('prescription_insulin.chk_date >=',$from_date)->where('center_id',$center)->where_in('visit_id',array('3','4'))->get('prescription_insulin')->row_array();
        }
        
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
        $query = "SELECT prescription_ogld.dosage as dosage_cur,ogld.brand FROM prescription_ogld LEFT JOIN ogld ON prescription_ogld.ogld_id=ogld.id ";
        $query .= "WHERE prescription_ogld.pc_id='$pid' ";
        $query .= "ORDER BY prescription_ogld.id DESC ";
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function get_pre_ogld($pid)
    {
        $query = "SELECT prescription_ogld_pre.dosage as dosage_pre,ogld.brand FROM prescription_ogld_pre LEFT JOIN ogld ON prescription_ogld_pre.ogld_id=ogld.id ";
        $query .= "WHERE prescription_ogld_pre.pc_id='$pid' ";
        $query .= "ORDER BY prescription_ogld_pre.id DESC ";
        $query = $this->db->query($query);
        return $query->result_array();
    }

    function getprogressreport($from_date,$to_date,$center,$offset){

        $report['patients']=$this->db->select('patients.*, centers.center_name, division.division_name, district.district_name')->join('centers','centers.center_id=patients.center_id', 'left')->join('division','division.division_id=patients.division_id', 'left')->join('district','district.district_id=patients.district_id', 'left')->where('patients.phone IS NOT NULL')->where('patients.created_datetime <=',$to_date.' 23:59:59')->where('patients.created_datetime >=',$from_date.' 00:00:01')->where('patients.center_id',$center)->order_by('patients.id','DESC')->get('patients',100,$offset)->result_array();

        /*$report['patients']=$this->db->get('patients',500,$offset)->result_array();*/

        $i=0;
        foreach ($report['patients'] as $pt) {
            $report['patients'][$i]=array();

            //At Time of Diagnosis
            $report['patients'][$i]['sl']=$offset;
            $report['patients'][$i]['pt_regno']=$pt['patient_code'];
            $report['patients'][$i]['created_datetime']=$pt['created_datetime'];
            $report['patients'][$i]['name']=$pt['patient_name'];            
            $report['patients'][$i]['pt_id']=$pt['id'];
            $report['patients'][$i]['center_name']=$pt['center_name'];
            $report['patients'][$i]['division_name']=$pt['division_name'];
            $report['patients'][$i]['district_name']=$pt['district_name'];
            $report['patients'][$i]['thana']=$pt['thana'];
            $report['patients'][$i]['address']=$pt['address'];
            $report['patients'][$i]['dm_duration']=$pt['dm_duration'];
            $report['patients'][$i]['type_of_diabetes']=$pt['type_of_diabetes'];
            $report['patients'][$i]['phone']=$pt['phone'];
            $report['patients'][$i]['email']=$pt['email'];
            $report['patients'][$i]['expenditure']=$pt['expenditure'];
            $report['patients'][$i]['profession']=$pt['profession'];
            $report['patients'][$i]['number_of_child']=$pt['number_of_child'];
            $report['patients'][$i]['family_history']=$pt['family_history'];
            $report['patients'][$i]['dob']=$pt['dob'];
            $report['patients'][$i]['gender']=$pt['gender'];
            $report['patients'][$i]['age']=$pt['age'];
            $report['patients'][$i]['patient_book_number']=$pt['patient_book_number'];
            $report['patients'][$i]['nid']=$pt['nid'];  
            $report['patients'][$i]['smoking']=$pt['smoking']; 

            $report['patients'][$i]['p1']=$this->db->select('prescriptions.*, doctors.doctor_name')
                        ->join('doctors','doctors.doctor_id=prescriptions.doctor_id', 'left')
                        ->where('prescriptions.pt_id', $pt['patient_code'])
                        ->where('prescriptions.visit_id', 1)
                        ->get('prescriptions')
                        ->row_array();

                        //Prescription after 5 years
            $report['patients'][$i]['p2']=$this->db->select('prescriptions.*, doctors.doctor_name')
                        ->join('doctors','doctors.doctor_id=prescriptions.doctor_id', 'left')
                        ->where('prescriptions.pt_id', $pt['patient_code'])
                        ->where('prescriptions.visit_id', 2)
                        ->get('prescriptions')
                        ->row_array();

            //visit 1
            $report['patients'][$i]['p3']=$this->db->select('prescriptions.*, doctors.doctor_name')
                        ->join('doctors','doctors.doctor_id=prescriptions.doctor_id', 'left')
                        ->where('prescriptions.pt_id', $pt['patient_code'])
                        ->where('prescriptions.visit_id', 3)
                        ->get('prescriptions')
                        ->row_array();



            //visit 2
            $report['patients'][$i]['p4']=$this->db->select('prescriptions.*, doctors.doctor_name')
                        ->join('doctors','doctors.doctor_id=prescriptions.doctor_id', 'left')
                        ->where('prescriptions.pt_id', $pt['patient_code'])
                        ->where('prescriptions.visit_id', 4)
                        ->get('prescriptions')
                        ->row_array();


            $i++;
            $offset++;
        }

        return $report;

    }


	public function get_centerlist()
	{
		$this -> db -> select('center_id,center_name');		
		$this -> db -> order_by('center_name','ASC');
		$this -> db -> from('centers');
		$query = $this->db->get();
		return $query->result();
	}

   public function getDeashboardData(){
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