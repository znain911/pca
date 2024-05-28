<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tags {
	
	
	function setslug($slug){
			$slug=strtolower($slug);
			$slug=preg_replace("![^a-z0-9]+!i", "-", $slug);
						
			$slug = str_replace('--','-',$slug);
			return $slug;
	} // End of Function

	function settag($slug){
			//$slug=$_POST['title'];
			//$slug = str_replace(',','',$slug);
			$slug = str_replace('।','',$slug);
			$slug = str_replace("'",'',$slug);
			$slug = str_replace('  ',' ',$slug);			
			$slug=strtolower($slug);
			
			$fwords='';
			$wordChunks = explode(" ", $slug);
			for($i = 0; $i < count($wordChunks); $i++){
				$fwords .="$wordChunks[$i]-";
			}			
			$slug = substr($fwords,0,strlen($fwords)-1);
			$slug = str_replace('--','-',$slug);
			$slug = str_replace(',-',',',$slug);
			return $slug;
	} // End of Function
	
	function word_display($string, $word_limit) {
		$string = strip_tags($string);
		$string = str_replace('  ', ' ',$string);
		$words = explode(' ', $string, ($word_limit + 1));
		if(count($words) > $word_limit)
			array_pop($words);
		return implode(' ', $words);
	}
	
	function setbanglaslug($slug){
			
			$slug = str_replace( array( '@', '"', ',' , ';', '<', '>', '(', ')', '{', '}', '[', ']','?','|','!' ), '', $slug);
			$slug = str_replace('  ',' ',$slug);			
			
			$slug = str_replace('--','-',$slug);
			$fwords='';
			$wordChunks = explode(" ", $slug);
			for($i = 0; $i < count($wordChunks); $i++){
				$fwords .="$wordChunks[$i]-";
			}			
			$slug = substr($fwords,0,strlen($fwords)-1);
			$slug = str_replace( array( '--' ), '-', $slug);
			
			return $slug;
	}
	
	function setkeys($slug){
			$slug=strtolower($slug);
			$slug=preg_replace("![^a-z0-9]_+!i", "", $slug);
			
			$slug = str_replace('--','-',$slug);
			return $slug;
	} // End of Function
		
											
	
}// End of Class 
?>