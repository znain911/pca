<!DOCTYPE html>
<html lang="en" class="coming-soon">
<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
    <link type="text/css" href="<?php echo base_url();?>admin_dir/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url();?>admin_dir/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url();?>admin_dir/css/styles.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url();?>admin_dir/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="<?php echo base_url();?>admin_dir/plugins/pines-notify/pnotify.css" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="<?php echo base_url();?>admin_dir/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->
    <script type="text/javascript" src="<?php echo base_url();?>admin_dir/js/jquery-1.10.2.min.js"></script>	<!-- Load jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/js/jqueryui-1.9.2.min.js"></script> 	<!-- Load jQueryUI -->
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/js/bootstrap.min.js"></script> 							<!-- Load jQuery -->
    </head>

    <body class="focused-form">
        
        
<div class="container" id="login-form">
	<a href="#" class="login-logo"><img src="<?php echo base_url();?>admin_dir/img/logo.png" width="100"></a>
    <!--<a href="#" class="login-logo"><img src="<?php echo base_url();?>user/images/saif-powertec-logo.png"></a>-->
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Find Your Account</h2></div>
				<div class="panel-body">
					
                    <?php $attributes = array('id' => 'form_post', 'name'=>'form_post', 'class' => 'form-horizontal', 'style'=>'position:relative;', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
                    	
                        <div class="errormessage"></div>

                        <div class="form-group">
	                        <div class="col-xs-12">
	                        	<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select class="form-control" id="req_type" name="req_type">
										<option value="">Select Request Type</option>
									  	<option value="1">Password Recovery</option>
									  	<option value="2">New Computer Access</option>
									  
									</select>
								</div>
                                <div class="form-error" id="error-req_type"></div>
	                        </div>
						</div>	
                        <div class="form-group">
	                        <div class="col-xs-12">
	                        	<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input type="text" placeholder="User Id" id="username" name="username" class="form-control">
								</div>
                                <div class="form-error" id="error-username"></div>
	                        </div>
						</div>	

                        <div class="form-group new_pass" data-active="unactive">
	                        <div class="col-xs-12">
	                        	<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" placeholder="New Password" id="New_Password" name="New_Password" class="form-control" >
								</div>
                                <div class="form-error" id="error-New_Password"></div>
	                        </div>
						</div>										

						<div class="panel-footer" style="padding-top: 0px; padding-bottom: 0px;">
							<div class="clearfix">
                           			<a href="<?php echo base_url('admin');?>" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> &nbsp; Back </a>
								<button type="button" class="btn btn-success req">Send &nbsp;<i class="fa fa-chevron-circle-right"></i></button>						
							</div>
						</div>
					<?php echo form_close(); ?>   
				</div>
			</div>
		</div>
	</div>
</div>


<script>
$('.new_pass').hide();
$(document).on('change','#req_type',function(){
	
if($(this).val()==1){
	$('.new_pass').fadeIn();
	$('.new_pass').attr('data-active','active');
}else{
	$('.new_pass').fadeOut();
	$('.new_pass').attr('data-active','unactive');
}

});
$(document).on("click",".req",function(event)
		{//process_note			
			//alert();
			var usernamereqrd=$("#username").val();
			var req_type=$('#req_type').val();
			var New_Password=$('#New_Password').val();
			var pass_active=$('.new_pass').attr('data-active');	
			if(pass_active=='unactive'){
				if(usernamereqrd != ''){	
					
					bootbox.prompt({
	        			title: "Please enter your Pin Code!",
	        			inputType: 'password',
						className:'named',
	        			callback: function (result) {
	        			
						var username=$("#username").val();
						var routechk = "<?php echo base_url('admin/chkpin');?>";
						$.post(routechk,
							{
								userpin:result,
								req_type:req_type,
								username:username,
								New_Password:New_Password

							},
							 function(chkdata)
							{
								//alert(chkdata);
							
								if(chkdata == 'Added Successfully'){			
									$('#myModal').modal('hide');				
									$(".bootbox").modal("hide");
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Success',
												text: 'Sending Successfully !',
												type: 'success',
												styling: 'fontawesome'
											});	
											$('#username').val('');
											setInterval(function(){ 
												window.location = '<?php echo base_url('admin');?>';
												//alert("Hello"); 
											}, 5000);
								}
								else if(chkdata == 'empty'){
									
									//$('#myModal').modal('hide');							
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Cancel',
												text: 'Cancel Your Request !',
												type: 'success',
												styling: 'fontawesome'
											});
											$('#username').val('');
									
								}
								else if(chkdata == 'Reqest Type Wrong'){
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Reqest Type is not New Computer Access !',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
									
								}
								else if(chkdata == 'Request exist'){
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Your Reqest For New Computer Access are in Processing stage !',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
									
								}
								else if(chkdata == 'Your Mac Address Already Activated'){
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Your Mac Address Already Activated vai Admin!',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
									
								}
								else if(chkdata == 'Your Paswoord Already Activated'){
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Your Paswoord Already Activated by Admin!',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
									
								}
								
								else{
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Your Pin code or User Id is Wrong !',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
									}
									});	
									}
								});
				}else{
					alert('User Id Is Empty !'); $( "#username" ).focus();
				}
			}else{
				
				if(usernamereqrd != '' && New_Password!=''){	
					
					bootbox.prompt({
	        			title: "Please enter your Pin Code!",
	        			inputType: 'password',
						className:'named',
	        			callback: function (result) {
	        			
						var username=$("#username").val();
						var routechk = "<?php echo base_url('admin/chkpin');?>";
						$.post(routechk,
							{
								userpin:result,
								req_type:req_type,
								username:username,
								New_Password:New_Password

							},
							 function(chkdata)
							{
								//alert(chkdata);
							
								if(chkdata == 'Added Successfully'){			
									$('#myModal').modal('hide');				
									$(".bootbox").modal("hide");
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Success',
												text: 'Sending Successfully !',
												type: 'success',
												styling: 'fontawesome'
											});	
											$('#username').val('');
											setInterval(function(){ 
												window.location = '<?php echo base_url('admin');?>';
												//alert("Hello"); 
											}, 5000);
								}
								else if(chkdata == 'empty'){
									
									//$('#myModal').modal('hide');							
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Cancel',
												text: 'Cancel Your Request !',
												type: 'success',
												styling: 'fontawesome'
											});
											$('#username').val('');
									
								}
								else if(chkdata == 'Reqest Type Wrong'){
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Reqest Type is not New Computer Access !',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
									
								}
								else if(chkdata == 'Request exist'){
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Your Reqest For New Password in Processing stage !',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
											$('#New_Password').val('');
											
									
								}
								else if(chkdata == 'Your Mac Address Already Activated'){
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Your Mac Address Already Activated vai Admin!',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
									
								}
								else if(chkdata == 'Your Paswoord Already Activated'){
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Your Paswoord Already Activated by Admin!',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
											$('#New_Password').val('');
									
								}
								
								else{
									
									$('#myModal').modal('hide');				
									new PNotify({
												delay: 5000,
												hide: true,
												title: 'Wrong',
												text: 'Sorry, Your Pin code or User Id is Wrong !',
												type: 'error',
												styling: 'fontawesome'
											});
											$('#username').val('');
									}
									});	
									}
								});
				}else{
					alert('User Id/Password Is Empty !'); $( "#username" ).focus();
				}
			}

			

			
		});




</script>



<?php //$this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", 'admin/verifylogin' ,'Login Successfully'  ); ?>
<script type="text/javascript">
function form_acction(msg){	
	if(msg=='Login Successfully'){									
		var jmpurl='<?php echo base_url('admin');?>';
		window.location=jmpurl;	
	}
}           
</script>  
    
    
<!-- Load site level scripts -->


<script type="text/javascript" src="<?php echo base_url();?>admin_dir/js/jqueryui-1.9.2.min.js"></script>	<!-- Load jQueryUI -->

<script type="text/javascript" src="<?php echo base_url();?>admin_dir/js/bootstrap.min.js"></script>        <!-- Load Bootstrap -->
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/bootbox/bootbox.js"></script>							<!-- Bootbox -->
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/js/application.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/pines-notify/pnotify.min.js"></script> 

<script>    	
	window.setTimeoutOrig = window.setTimeout;
	window.setTimeout     = function(f,del) 
	{ 
		var l_stack = Error().stack.toString();
		if (l_stack.indexOf('kis.scr.kaspersky-labs.com') > 0){ return 0; }	
		window.setTimeoutOrig(f,del); 
	}
</script>

    </body>
</html>
