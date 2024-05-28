<?php 
class MY_Form_validation extends CI_Form_validation {
 
    public function __construct(){
        parent::__construct();
    }	
	
	function validation($validation_rules){			
		$this->set_rules($validation_rules);		
		$errors_array = ''; //initialized		
		if($this->run() == FALSE){
			//$row as each individual field array 
            foreach($validation_rules as $row){ 
                $field = $row['field'];          //getting field name
                $error = form_error($field);    //getting error for field name
                                                //form_error() is inbuilt function
 				//if($error)
                $errors_array  .= $field.'|'.$error.'#';             
            } 
            return $errors_array;			 
		}
		else
			return '';			 			
	}
	
} // End Class
?>