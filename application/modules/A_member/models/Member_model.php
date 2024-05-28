<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	var $table = 'ch_member';
	var $column_order = array(null, 'employee_id','member_name','gender','age','organization_name','coverage_period','start_date','end_date','coverage_amount'); //set column field database for datatable orderable
	var $column_search = array('employee_id','member_name','gender','age','organization_name','coverage_period','start_date','end_date','coverage_amount'); //set column field database for datatable searchable 
	var $order = array('id' => 'DESC'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		//add custom filter here
		
		if(!empty($this->input->post('monthyear'))){
			$this->db->where('MONTH(ch_member.start_date)', $this->input->post('monthyear'), FALSE);
		}
		if(!empty($this->input->post('onlyyear'))){
			$this->db->where('YEAR(ch_member.start_date)', $this->input->post('onlyyear'), FALSE);
		}

		if (!empty($this->input->post('gender'))) {
			$this -> db -> where( 'ch_member.gender', $this->input->post('gender'));
		}
		if (!empty($this->input->post('factory'))) {
			$this -> db -> where( 'ch_member.organization_name', $this->input->post('factory'));
		}

		$this -> db -> select('ch_member.id,ch_member.member_id,ch_member.employee_id,ch_member.member_name,ch_member.gender,ch_member.age,ch_member.coverage_period,ch_member.start_date, ch_member.end_date,ch_member.status,ch_member.organization_name,ch_coverage.coverage_amount');
		$this -> db -> join(DB_PREFIX.'coverage', DB_PREFIX.'coverage.coverage_name = '.DB_PREFIX.'member.coverage_period', 'left' );
		$this -> db -> from(DB_PREFIX.'member');
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	

	function get_avl_balance($bcid,$camnt,$start_date,$end_date){ 
			
			$this->db->select('sum(total) as totalbill');
			$this->db->from('ch_bill');
			$this->db->where('member_id',$bcid);
			$this->db->where('billing_date >=', $start_date);
			$this->db->where('billing_date <=', $end_date);		
			$query = $this->db->get();
			$result = $query->result();

			$ablblnc = array();
			foreach ($result as $row) 
			{
				$ablblnc[] = $camnt - $row->totalbill;
			}
			return $ablblnc;
				 
		}
	public function get_MemberYearList()
	{
		$this -> db -> select('YEAR(start_date) start_date');	
		$this -> db -> from(DB_PREFIX.'member');
		$this -> db -> group_by('YEAR(start_date)');
		$query = $this->db->get();
		return $query->result();		
	}

	public function get_member_export($monthyear,$onlyyear,$factory,$gender)
	{
		
		//add custom filter here
		
		if(!empty($monthyear)){
			$this->db->where('MONTH(ch_member.start_date)', $monthyear, FALSE);
		}
		if(!empty($onlyyear)){
			$this->db->where('YEAR(ch_member.start_date)', $onlyyear, FALSE);
		}

		if (!empty($gender)) {
			$this -> db -> where( 'ch_member.gender', $gender);
		}
		if (!empty($factory)) {
			$this -> db -> where( 'ch_member.organization_name', $factory);
		}

		$this -> db -> select('ch_member.id,ch_member.member_id,ch_member.employee_id,ch_member.member_name,ch_member.gender,ch_member.age,ch_member.department,ch_member.contact_no,ch_member.designation,ch_member.coverage_period,DATE_FORMAT(ch_member.start_date,"%d %b %Y") as start_date, DATE_FORMAT(ch_member.end_date,"%d %b %Y") as end_date,ch_member.status,ch_member.organization_name,ch_coverage.coverage_amount');
		$this -> db -> join(DB_PREFIX.'coverage', DB_PREFIX.'coverage.coverage_name = '.DB_PREFIX.'member.coverage_period', 'left' );
		$this -> db -> from(DB_PREFIX.'member');
		$query = $this->db->get();
		return $query->result();
		
	}
	

}
