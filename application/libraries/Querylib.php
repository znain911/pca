<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Querylib{
	private $CI;
	 function __construct()
    {
 		$this->CI =& get_instance();
        $this->CI->load->database();       
    }
	
    
        function prescrip_symptom_list($bcid){ 
			$smanu = $this->CI->db->query("SELECT * FROM ch_prescription_symptoms WHERE prescription_id = '".$bcid."' order by symtom_name ASC");									
					if(!empty($smanu)){
					foreach ($smanu->result() as $smname)
					{	
                        echo $smname->symtom_name.'| ';                        
                        
					}
			}				 
		}

		function prescrip_drug_list($bcid){ 
			$smanu = $this->CI->db->query("SELECT * FROM ch_prescription_mdcn WHERE prescription_id = '".$bcid."' order by mdcn_name ASC");
					if(!empty($smanu)){
					foreach ($smanu->result() as $smname)
					{	
                        echo $smname->mdcn_name.'| ';                        
                        
					}
			}				 
		}

		function prescrip_invstgsn_list($bcid){ 
			$smanu = $this->CI->db->query("SELECT * FROM ch_prescription_test WHERE prescription_id = '".$bcid."' order by test_name ASC");
					if(!empty($smanu)){
					foreach ($smanu->result() as $smname)
					{	
                        echo $smname->test_name.'| ';                        
                        
					}
			}				 
		}

		
		function avl_balance($bcid,$camnt){ 
			$billamnt = $this->CI->db->query("SELECT sum(total) as totalbill FROM ch_bill WHERE member_id = '".$bcid."'");									
					if(!empty($billamnt)){
					foreach ($billamnt->result() as $smname)
					{	
                        echo $camnt - $smname->totalbill;                        
                        
					}
			}
				 
		}
		
		function attemp_no($stid,$eid,$atid){ 
			$smanu = $this->CI->db->query("SELECT * FROM sht_student_exam WHERE student_id = '".$stid."' and exam_id = '".$eid."' ORDER BY id ASC ");									
					if(!empty($smanu)){
						$i = 1;
					foreach ($smanu->result() as $smname)
					{	
                        if($smname->id == $atid){
                        	/*if($i == 1){
                        		echo 'Attempt '.$i;
                        	}else{	
                        		$atm = $i - 1;
                        		echo 'Retake Attempt '.$atm;
                        	}  */
                        	echo 'Attempt '.$i;
                        } 
                     $i++;   
					}
			}				 
		}

		function attemp_no_ece($stid,$eid,$atid,$qt){ 
			$smanu = $this->CI->db->query("SELECT * FROM sht_student_exam WHERE student_id = '".$stid."' and exam_id = '".$eid."' and qtype = '".$qt."' ");									
					if(!empty($smanu)){
						$i = 1;
					foreach ($smanu->result() as $smname)
					{	
                        if($smname->id == $atid){
                        	/*if($i == 1){
                        		echo 'Attempt '.$i;
                        	}else{	
                        		$atm = $i - 1;
                        		echo 'Retake Attempt '.$atm;
                        	}  */
                        	echo 'Attempt '.$i;
                        } 
                     $i++;   
					}
			}				 
		}
		
		function attemp_no_history($stid,$eid,$atid){ 
			$smanu = $this->CI->db->query("SELECT * FROM sht_student_exam WHERE student_id = '".$stid."' and exam_id = '".$eid."' ");									
					if(!empty($smanu)){
						$i = 1;
					foreach ($smanu->result() as $smname)
					{	
                        if($smname->id == $atid){
                        	if($i == 1){
                        		echo 'Attempt '.$i;
                        	}else{	
                        		$atm = $i - 1;
                        		echo 'Retake Attempt '.$atm;
                        	}                        	
                        } 
                     $i++;   
					}
			}				 
		}
		

		function test(){
			echo "string";
		}
		
		
	   
   

}// end of class
?>