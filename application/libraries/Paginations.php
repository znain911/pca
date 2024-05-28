<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginations{
	
	
	
	function pagination($nrow,$perpa,$path,$page){			
			$links='';
			$path= $path.'/';
			$t=ceil( $nrow/$perpa);
			if($t>1){
					if($t<=10){
					   $start=1;
					   $end=$t;
					}elseif($page<=5){
					   $start=1;
					   $end=10;
					}elseif($t-$page>=5 and $page>5){
					   $end=$page+5;
					   $start=$end-9;
					}elseif($t-$page<5){
					   $end=$t;
					   $start=$end-9;
					}
					$links .= '<div id="paginations"><ul>';
					
					if($page>1)
						$links .='<li><a class="pdeact" href="'.$path.($page-1).'" ><<</a></li>';
					else
						$links .='<li><a class="pdeact" ><<</a></li>';
					
					
					if($t<10){
						for($i=$start;$i<=$end;$i++)
							if($i==$page) 
								$links .='<li class="pact">'.$i.'</li>';
							else 
								$links .='<li><a class="pdeact" href="'.$path.$i.'">'.$i.'</a></li>';
					}else{
						if($page<7){							
							for($i=$start;$i<=$end;$i++){
								if($i==$page) 
									$links .='<li class="pact">'.$i.'</li>';
								else 
									$links .='<li><a class="pdeact" href="'.$path.$i.'">'.$i.'</a></li>';
							}
							$links .='<li>...</li>';
							$links .='<li><a class="pdeact" href="'.$path.($t-1).'" >'.($t-1).'</a></li>';
							$links .='<li><a class="pdeact" href="'.$path.$t.'" >'.$t.'</a></li>';
						}elseif($page>($t-7)){
							$links .='<li><a class="pdeact" href="'.$path.'1'.'" >1</a></li>';
							$links .='<li><a class="pdeact" href="'.$path.'2'.'" >2</a></li>';
							$links .='<li>...</li>';
							for($i=$start;$i<=$end;$i++)
								if($i==$page) $links .='<li class="pact">'.$i.'</li>';
									else $links .='<li><a class="pdeact" href="'.$path.$i.'">'.$i.'</a></li>';						
						}else{
							$links .='<li><a class="pdeact" href="'.$path.'1'.'" >1</a></li>';
							$links .='<li><a class="pdeact" href="'.$path.'2'.'" >2</a></li>';
							$links .='<li>...</li>';
							for($i=$start;$i<=$end;$i++)
								if($i==$page) $links .='<li class="pact">'.$i.'</li>';
									else $links .='<li><a class="pdeact" href="'.$path.$i.'">'.$i.'</a></li>';
							$links .='<li>...</li>';
							$links .='<li><a class="pdeact" href="'.$path.($t-1).'" >'.($t-1).'</a></li>';
							$links .='<li><a class="pdeact" href="'.$path.$t.'" >'.$t.'</a></li>';						
						}
					}
					
					if($page==$t)
						$links .='<li><a class="pdeact" >>></a></li>';
					else
						$links .='<li><a class="pdeact" href="'.$path.($page+1).'" >>></a></li>';
					
					$links .= '</ul><div class="clr"></div></div>';
					
			}else{  
				$links .='&nbsp;';
			}	
			
			return 	$links;
		
	}// End Function
	

	
}	//End Class
?>