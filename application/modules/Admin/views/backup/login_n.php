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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="<?php echo base_url();?>admin_dir/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->
    <script type="text/javascript" src="<?php echo base_url();?>admin_dir/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
    </head>

    <body class="focused-form">
        
        
<div class="container" id="login-form">
	<a href="#" class="login-logo"><img src="<?php echo base_url();?>admin_dir/img/logo-color.png" width="100"></a>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Login Form</h2></div>
				<div class="panel-body">
					
                    <?php $attributes = array('id' => 'form_post', 'name'=>'form_post', 'class' => 'form-horizontal', 'style'=>'position:relative;', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
                    	
                        <div class="errormessage"></div>
                        
                        <div class="form-group">
	                        <div class="col-xs-12">
	                        	<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input type="text" placeholder="Username" name="username" class="form-control">
								</div>
                                <div class="form-error" id="error-username"></div>
	                        </div>
						</div>

						<div class="form-group">
	                        <div class="col-xs-12">
	                        	<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" placeholder="Password" name="password" class="form-control">          							
								</div>
                                <div class="form-error" id="error-password"></div>
	                        </div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<a href="#" class="pull-left">Forgot password?</a>
								<div class="checkbox-inline icheck pull-right pt0">
									<label for="">
										<input type="checkbox"></input>
										Remember me
									</label>
								</div>
							</div>
						</div>
					

						<div class="panel-footer">
							<div class="clearfix">
								<button type="submit" class="btn btn-success">Login &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
							</div>
						</div>

					<?php echo form_close(); ?>   
				</div>
			</div>

			
		</div>
	</div>
</div>

<?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", 'admin/verifylogin' ,'Login Successfully'  ); ?>
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
