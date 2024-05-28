<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Changing Diabetes Barometer (CDB)" name="description">
		<meta content="CT Health Ltd" name="author">
		<meta name="keywords" content=""/>

		<!-- Favicon -->
		<link rel="icon" href="<?php echo base_url();?>assets/images/cdb-fav.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/cdb-fav.ico" />
		<!-- Title -->
		<title>Edit Operstor - Changing Diabetes Barometer (CDB)</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Dashboard css -->
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Horizontal-menu css -->
		<link href="<?php echo base_url();?>assets/plugins/horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/plugins/horizontal-menu/horizontalmenu.css" rel="stylesheet">

		<!--Daterangepicker css-->
		<link href="<?php echo base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

		<!-- Sidebar Accordions css -->
		<link href="<?php echo base_url();?>assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

		<!-- Rightsidebar css -->
		<link href="<?php echo base_url();?>assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!---Font icons css-->
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link  href="<?php echo base_url();?>assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

		<!--Select2 css -->
		<link href="<?php echo base_url();?>assets/plugins/select2/select2.min.css" rel="stylesheet" />

		<!-- Time picker css-->
		<link href="<?php echo base_url();?>assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" />

		<!-- Date Picker css-->
		<link href="<?php echo base_url();?>assets/plugins/date-picker/spectrum.css" rel="stylesheet" />

		<!-- File Uploads css-->
        <link href="<?php echo base_url();?>assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />

		<!--Mutipleselect css-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/multipleselect/multiple-select.css">

		<!-- Forn-wizard css-->
		<link href="<?php echo base_url();?>assets/plugins/forn-wizard/css/forn-wizard.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/formwizard/smart_wizard.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/plugins/formwizard/smart_wizard_theme_dots.css" rel="stylesheet">

		

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

	</head>

	<body class="app sidebar-mini rtl">

		<!--Global-Loader-->
		<div id="global-loader">
			<img src="<?php echo base_url();?>assets/images/icons/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">



				<?php $this->load->view('includes/headermenu');?>

				<!--Header submenu -->
				

                <!-- app-content-->
				<div class="container content-area">
					<div class="side-app">

						<!-- page-header -->
						<div class="page-header">
							<ol class="breadcrumb"><!-- breadcrumb -->
								<li class="breadcrumb-item"><a href="#">Setup</a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('setup/operator');?>">Doctor</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit operator</li>
							</ol><!-- End breadcrumb -->
							<div class="ml-auto">
								
									<a class="btn btn-success" href="<?php echo base_url('setup/operator');?>" ><i class="fe fe-list mr-1 mt-1"></i> operator List</a>
							</div>
						</div>
						<!-- End page-header -->

						<!-- row -->
						<div class="row">
							<div class="col-md-12">
								
								<div class="card">
									<div class="card-header">
										<h3 class="mb-0 card-title">Edit operator</h3>
										
									</div>
									<div class="card-body">
										<?php $attributes = array('id' => 'form_post', 'name'=>'form_post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
											<div class="errormessage"></div>
											
										<div class="row">
											
											<div class="col">
												<div class="row">
												<div class="form-group col-md-6">
													<label class="form-label" for="name">First Name</label>
													<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" autocomplete="off" value="<?php echo $info->first_name; ?>">
													<div class="form-error" id="error-first_name"></div>
												</div>
												<div class="form-group col-md-6">
													<label class="form-label" for="name">Last Name</label>
													<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" autocomplete="off" value="<?php echo $info->last_name; ?>">
													<div class="form-error" id="error-last_name"></div>
												</div>

												<div class="form-group col-md-6">
													<label class="form-label" for="name">Username</label>
													<input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" value="<?php echo $info->username; ?>">
													<div class="form-error" id="error-username"></div>
												</div>

												<div class="form-group col-md-6">
													<label class="form-label" for="code">Phone</label>
													<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off" value="<?php echo $info->phone; ?>">
													<div class="form-error" id="error-phone"></div>
												</div>

												<div class="form-group  col-md-6">
													<label class="form-label" for="address">Email</label>
													<input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="<?php echo $info->email; ?>">
													<div class="form-error" id="error-email"></div>
												</div>
												<div class="form-group col-md-6">
													<label class="form-label" for="address">Organization</label>
													<input type="text" class="form-control" id="organization" name="organization" placeholder="Organization" autocomplete="off" value="<?php echo $info->company; ?>">
													<div class="form-error" id="error-organization"></div>
												</div>
												<div class="form-group col-md-6">
													<label class="form-label">Role</label>
													<select name="role" id="role" class="form-control">
														<option value="">--- Select Role ---</option>
														<?php foreach ($grouplist as $glist) {?>
														<option value="<?php echo $glist->id; ?>" <?php if($info->user_group==$glist->id){echo 'selected'; } ?>><?php echo $glist->description; ?></option>
														<?php }?>					
													</select>
													<div class="form-error" id="error-role"></div>
												</div>
												<div class="form-group  col-md-6">
													<label class="form-label">Center</label>
													<select name="center" id="center" class="form-control">
														<option value="">--- Select Center ---</option>
														<?php foreach ($cntrlist as $clist) {?>
														<option value="<?php echo $clist->center_id; ?>" <?php if($info->center_id==$clist->center_id){echo 'selected'; } ?>><?php echo $clist->center_name; ?></option>
														<?php }?>					
													</select>
													<div class="form-error" id="error-center"></div>
												</div>

												<div class="form-group  col-md-6">
													<label class="form-label">Status</label>
													<select name="status" id="status" class="form-control">
														<option value="1" <?php if($info->active==1){echo 'selected'; } ?>>Active</option>
														<option value="0" <?php if($info->active==0){echo 'selected'; } ?>>Inactive</option>					
													</select>
													
													<div class="form-error" id="error-status"></div>
												</div>

												</div>
												
											</div>

											
											
											<div class="col-lg-12">
												<input type="submit" class="btn btn-primary float-right" value="Submit" id="submitbtn1" name="submitbtn1">												
											</div>
											
											
											
										</div>
										<?php echo form_close(); ?> 
									</div>
								</div>
							</div>
						</div>

						<!--row open-->
						
						<!--row closed-->


					</div>

					

					<!--footer-->
					
					<?php $this->load->view('includes/footer');?>
					<!-- End Footer-->

				</div>
				<!-- End app-content-->
			</div>
		</div>
		<!-- End Page -->

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
		<?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", $newpatient_database ,'Update Successfully'  ); ?>
		<script type="text/javascript">
		function form_acction(msg){
			if(msg=='Update Successfully'){									
				var jmpurl='<?php echo site_url('setup/operator/');?>';
				window.location=jmpurl;
				$("#form_post")[0].reset();
			}
		}           
		</script>

		
	

		<script type="text/javascript">
			$(document).ready(function(){
			    $('#reset').click(function(){ //button filter event click
			        $("#form_post")[0].reset();  //just reload table
			    });
			});
		</script>

		<!-- Jquery js-->
		<script src="<?php echo base_url();?>assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!--Bootstrap.min js-->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery Sparkline js-->
		<script src="<?php echo base_url();?>assets/js/vendors/jquery.sparkline.min.js"></script>

		<!-- Chart Circle js-->
		<script src="<?php echo base_url();?>assets/js/vendors/circle-progress.min.js"></script>

		<!-- Star Rating js-->
		<script src="<?php echo base_url();?>assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Moment js-->
		<script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>

		<!-- Daterangepicker js-->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!-- Horizontal-menu js -->
		<script src="<?php echo base_url();?>assets/plugins/horizontal-menu/horizontalmenu.js"></script>

		<!-- Sidebar Accordions js -->
		<script src="<?php echo base_url();?>assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>

		<!-- Custom scroll bar js-->
		<script src="<?php echo base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Rightsidebar js -->
		<script src="<?php echo base_url();?>assets/plugins/sidebar/sidebar.js"></script>

		<!-- File uploads js -->
		<script src="<?php echo base_url();?>assets/plugins/fileuploads/js/dropify.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/fileuploads/js/dropify-demo.js"></script>

		<!--Select2 js -->
		<script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/select2.js"></script>

		<!--Time Counter js-->
		<script src="<?php echo base_url();?>assets/plugins/counters/jquery.missofis-countdown.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/counters/counter.js"></script>

		<!-- Timepicker js -->
		<script src="<?php echo base_url();?>assets/plugins/time-picker/jquery.timepicker.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/time-picker/toggles.min.js"></script>

		<!-- Datepicker js -->
		<script src="<?php echo base_url();?>assets/plugins/date-picker/spectrum.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/date-picker/jquery-ui.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.maskedinput.js"></script>

		<!--MutipleSelect js-->
		<script src="<?php echo base_url();?>assets/plugins/multipleselect/multiple-select.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/multipleselect/multi-select.js"></script>

		<!-- Forn-wizard js-->
		<script src="<?php echo base_url();?>assets/plugins/formwizard/jquery.smartWizard.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/formwizard/fromwizard.js"></script>

		<!--Accordion-Wizard-Form js-->
		<script src="<?php echo base_url();?>assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js"></script>

		<!--Advanced Froms js-->
		<script src="<?php echo base_url();?>assets/js/advancedform.js"></script>

		<!-- Custom js-->
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>

		<!-- Prescription js-->
		<script src="<?php echo base_url();?>assets/js/prescription.js"></script>

		

	</body>
</html>