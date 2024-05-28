<?php
class Inspectionstatus extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	public function all(){		
		$status = array(
			"0" => "Cross",
			"1" => "Bad",
			"2" => "Normal",
			"3" => "Very Good",
		);		
		return $status;
	}

}
?>