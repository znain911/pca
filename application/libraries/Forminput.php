<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forminput{

	function formpost($form_name,$loading_div,$loading_image,$submit_button,$form_redirect_js_function,$form_post_url,$msg_successfully ){			
		?>
		<style type="text/css">	.loading{position:absolute; left:0px; top:0px; height:100%; width:100%; text-align:center !important; visibility:hidden; background-color:#f5f5f5; opacity:0.2;}.errorbdr{border:#F00 1px solid;}</style>
		<script type="text/javascript">	
		$(function(){
			$("#<?php echo $form_name;?>").append('<div id="<?php echo $loading_div;?>" class="loading"><?php if(!empty($loading_image)){?><img src="<?php echo $loading_image;?>" alt="loader" class="loadingimg" /><?php }?></div>');
						          
			$('#<?php echo $form_name;?>').submit(function(e){
				e.preventDefault();	
				var form = $(this);
				var post_url = '<?php echo base_url($form_post_url);?>';
				var formData = new FormData($(this)[0]);
						
				$.ajax({
					type: 'POST',
					url: post_url, 
					data: formData,
					async: true,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend:function(){             
						device_width =   (($(window).width())/2);
						device_height =  (($(window).height())/2);
						<?php if(!empty($loading_image)){?>$("#<?php echo $form_name;?> .loadingimg").css({'position':'fixed', 'left':  device_width +'px', 'top': device_height+'px', 'width':'24px'});<?php }?>
						
						$("#<?php echo $form_name;?>").parent().find('input').removeClass("errorbdr");
						$("#<?php echo $form_name;?>").parent().find('select').removeClass("errorbdr");
						$("#<?php echo $form_name;?>").parent().find('textarea').removeClass("errorbdr");
													
						$("#<?php echo $form_name;?> #<?php echo $submit_button;?>").attr("disabled", 'false');
						$("#<?php echo $form_name;?> #<?php echo $loading_div;?>").css({visibility:'visible'});
						$("#<?php echo $form_name;?> .errormessage").html('');
					},
					success: function(msg){                            
						var msga = msg.split("#");
						var i;
						$("#<?php echo $form_name;?> .form-error").text('');
						setTimeout(function(){
							for (i = 0; i < msga.length-1; ++i) {
								var msgaf = msga[i].split("|");																
								$("#<?php echo $form_name;?> #error-"+ msgaf[0]).html(msgaf[1]);
							}					
						},1500);
													
						var message = msga[msga.length-1];							
						var msg = msga[msga.length-1];						
						setTimeout(function(){
							<?php echo $form_redirect_js_function.'(msg)';?>						
						},1500);
						
						if(message=='<?php echo $msg_successfully;?>'){
							var messages = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check"></i>  <strong>'+ message +'</strong></div>';
							$("#<?php echo $form_name;?> .errormessage").html(messages);
						}else if(message!=''){
							var messaged = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-exclamation-circle"></i>  <strong>'+ message +'</strong></div>';
							$("#<?php echo $form_name;?> .errormessage").html(messaged);							
						}
						
						                                               
					},
					error: function(){
						
					},
					complete: function(){
						setTimeout(function(){
							$("#<?php echo $form_name;?> #<?php echo $submit_button;?>").attr("disabled", false);
							$("#<?php echo $form_name;?> #<?php echo $loading_div;?>").css({visibility:'hidden'});
						},1600);		
					}
				});
			});
		});
		</script>
	<?php	
	}


	/*==================================================================================
		Uploades Folder Create
	==================================================================================*/	  
	
	function chk_folder(){
		$uploadfolder = './user/uploads/';
		$year = date("Y");
		$month = date("m");
		$path = $uploadfolder.$year.'/'.$month;
		if (!file_exists($path)) 
			mkdir($path, 0755, true);
					
		return $path.'/';	
	}
	
	function upload_folder($path){
		$uploadfolder = './user/uploads/';
		$path = str_replace($uploadfolder,'',$path);
		return $path;	
	}
	
	
}// end of class
?>