<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Js{
	private $CI;
	 function __construct()
    {
 		$this->CI =& get_instance();
        $this->CI->load->database();       
    }
	

		function autocomplete($textbid, $url, $textvaluarr, $dbfeildname, $datalist ) {
			$total = count($textvaluarr);
			?>
       <script>
	   $(document).ready(function() {     
            //Auto Complete
	$(document).on('focus','#<?php echo $textbid;?>',function(){
		
		<?php 
		if(!empty($textvaluarr)){
		for($x=0;$x<$total;$x++) { ?>
		var <?php echo $textvaluarr[$x]; ?>=$("#<?php echo $textvaluarr[$x]; ?>").val();
		
		<?php }} ?>
		
		$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : '<?php echo base_url($url);?>',
				dataType: "json",
				method: 'post',
				data: {
				   <?php echo $textbid;?>: request.term,
				   <?php 
				   if(!empty($textvaluarr)){
				   for($x=0;$x<$total;$x++) { ?>
				   <?php echo $textvaluarr[$x]; ?>:<?php echo $textvaluarr[$x].','; ?>
				   <?php }} ?>
				},
				 success: function( data ) {
					 //alert(data);
					 response( $.map( data, function(item) {
					 	return {
							value : item.<?php echo $dbfeildname; ?>
						}
					}));
				}
			});
			},
			autoFocus: true,	      	
			minLength: 0,
			appendTo: ".<?php echo $datalist; ?>"
		});
	
		$(".ui-helper-hidden-accessible").hide();
		});
	});
	
   </script>         
            <?php
		}
		
			function autocompletearr($textbid, $url, $textvaluarr, $dbfeildname, $datalist) {
			$total = count($textvaluarr);
			?>
       <script>
	   $(document).ready(function() {     
            //Auto Complete
	$(document).on('focus','#<?php echo $textbid;?>',function(){
		<?php 
		if(!empty($textvaluarr)){
		for($j=0;$j<$total;$j++) { ?>
		var <?php echo preg_replace("/[^A-Za-z]/", "",$textvaluarr[$j]); ?>=$("#<?php echo $textvaluarr[$j]; ?>").val();
		
		<?php }} ?>
		
		$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : '<?php echo base_url($url);?>',
				dataType: "json",
				method: 'post',
				data: {
				   <?php echo preg_replace("/[^A-Za-z]/", "",$textbid);?>: request.term,
				   <?php 
				   if(!empty($textvaluarr)){
				   for($x=0;$x<$total;$x++) { ?>
				   <?php echo preg_replace("/[^A-Za-z]/", "",$textvaluarr[$x]); ?>:<?php echo preg_replace("/[^A-Za-z]/", "",$textvaluarr[$x]).','; ?>
				   <?php }} ?>
				},
				 success: function( data ) {
					 //alert(data);
					 response( $.map( data, function(item) {
					 	return {
							value : item.<?php echo $dbfeildname; ?>
						}
					}));
				}
			});
			},
			autoFocus: true,	      	
			minLength: 0,
			appendTo: ".<?php echo $datalist; ?>"
		});
	
		$(".ui-helper-hidden-accessible").hide();
		});		
	});
	
   </script>         
            <?php
		}
		
 }// end of class
?>