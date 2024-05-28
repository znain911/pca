<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="apple-touch-fullscreen" content="yes">
	    <meta name="description" content="">
	    <meta name="author" content="">
		
		<!-- Favicon -->
		<link rel="icon" href="assets/images/cdb-fav.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/cdb-fav.ico" />

		<!-- Title -->
		<title>Login - TMA</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Dashboard css -->
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />

		

		<!---Font icons css-->
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link  href="<?php echo base_url();?>assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script> 

	</head>
	<body class="bg-account">
	    <!-- page -->
		<div class="page">

			<!-- page-content -->
			<div class="page-content">
				<div class="container text-center text-dark">
					<div class="row">
						<div class="col-lg-4 d-block mx-auto">
							<div class="row">
								<div class="col-xl-12 col-md-12 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="text-center mb-6">
												<img src="<?php echo base_url();?>assets/images/cdb_logo.png" class="" alt="">
											</div>
											<h3>Login</h3>
											<p class="text-muted">Sign In to your account</p>
											<?php $attributes = array('id' => 'form_post', 'name'=>'form_post', 'class' => 'form-horizontal', 'style'=>'position:relative;', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
											<div class="errormessage"></div>
											<div class="input-group mb-3">
												<span class="input-group-addon bg-white"><i class="fa fa-user"></i></span>
												<input type="text" class="form-control" placeholder="Username" name="username">
												
												
											</div>
											<div class="form-error" id="error-username"></div>
											<div class="input-group mb-4">
												<span class="input-group-addon bg-white"><i class="fa fa-unlock-alt"></i></span>
												<input type="password" class="form-control" placeholder="Password" name="password">

											</div>											
												<div class="form-error" id="error-password"></div>
											<div class="row">
												<div class="col-12">
													<button type="submit" class="btn btn-primary btn-block">Login</button>
													
												</div>
												<div class="col-12">
													<a href="#" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
												</div>
											</div>
											<?php echo form_close(); ?>  
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- page-content end -->
		</div>
		<!-- page End-->
<?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", 'admin/verifylogin' ,'Login Successfully'  ); ?>
<script type="text/javascript">
function form_acction(msg){	
	if(msg=='Login Successfully'){									
		var jmpurl='<?php echo base_url('admin');?>';
		window.location=jmpurl;	
	}
}           
</script>
		<!-- Jquery js-->
		<script src="<?php echo base_url();?>assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!--Bootstrap.min js-->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		






	</body>
</html>