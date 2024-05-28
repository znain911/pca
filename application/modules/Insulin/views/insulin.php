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
		<title>Changing Diabetes Barometer (CDB)</title>

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
				<!-- <div class="bg-white p-3 header-secondary header-submenu">
					<div class="container ">
						<div class="row">
							<div class="col">
								<div class="d-flex">
									<a class="btn btn-danger" href="#"><i class="fe fe-rotate-cw mr-1 mt-1"></i> Upgrade </a>
								</div>
							</div>
							<div class="col col-auto">
								<a class="btn btn-light mt-4 mt-sm-0" href="#"><i class="fe fe-help-circle mr-1 mt-1"></i>  Support</a>
								<a class="btn btn-success mt-4 mt-sm-0" href="#"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a>
							</div>
						</div>
					</div>
				</div> --><!--End Header submenu -->

                <!-- app-content-->
				<div class="container content-area">
					<div class="side-app">

						<!-- page-header -->
						<div class="page-header">
							<ol class="breadcrumb"><!-- breadcrumb -->
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Patient</li>
							</ol><!-- End breadcrumb -->
							<div class="ml-auto">
								
							</div>
						</div>
						<!-- End page-header -->

						<!-- row -->
						<div class="row">
							<div class="col-md-12">
								
								<div class="card">
									<div class="card-header">
										<h3 class="mb-0 card-title">ADD NEW PATIENT</h3>
										
									</div>
									<div class="card-body">
										<?php $attributes = array('id' => 'form_post', 'name'=>'form_post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
											<div class="errormessage"></div>
											<div class="row">
												<div class="col">
													<div class="form-group">
														<label class="form-label" for="name">Patient Code</label>
														<input type="text" class="form-control" id="pcode" name="pcode" value="<?php echo $metadata['center_id'].'-'.$countpatient->totalpatientbycenter.'-'.date('dmY');?>" autocomplete="off" readonly >
														<div class="form-error" id="error-pcode"></div>
													</div>
												</div>
												<div class="col">
													
													<div class="form-group">
														<label class="form-label">Date:</label>								
														<input name="paddeddate" id="paddeddate" autocomplete="off" class="form-control fc-datepicker"/>
														
													</div>
												</div>
											</div>
										<div class="row">
											
											<div class="col">
												<div class="form-group">
													<label class="form-label" for="name">Name</label>
													<input type="text" class="form-control" id="name" name="name" placeholder="Name" autocomplete="off">
													<div class="form-error" id="error-name"></div>
												</div>
												<div class="form-group ">
													<label class="form-label">Division</label>
													<select class="form-control select2" data-placeholder="Choose one" id="division" name="division">
														<option label="Choose one">
														</option>
														<?php foreach ($divisionlist as $dvsnlist) {?>
															<option value="<?php echo $dvsnlist->division_id;?>"><?php echo $dvsnlist->division_name;?></option>													
														<?php } ?>
														
													</select>
													<div class="form-error" id="error-division"></div>
												</div>
												<div class="form-group">
													<label for="phone" class="form-label">Phone</label>
													<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" autocomplete="off">
													<div class="form-error" id="error-phone"></div>
												</div>
												<div class="form-group">
													<label class="form-label"># of children</label>
													<input type="text" class="form-control" name="children" id="children" placeholder="# of children" autocomplete="off">
													<div class="form-error" id="error-children"></div>
												</div>
											</div>

											<div class="col">
												<div class="form-group">
													<label class="form-label"> Gender</label>
													<select class="form-control select2" id="gender" name="gender">
														<option value="male">Male</option>
														<option value="female">Female</option>
														<option value="others">Others</option>
													</select>
													<div class="form-error" id="error-gender"></div>
												</div>
												<div class="form-group">
													<label class="form-label"> District</label>
													<select class="form-control select2-show-search" data-placeholder="Choose one" id="district" name="district">
														<option>Select district</option>
													</select>
													<div class="form-error" id="error-district"></div>
												</div>
												<div class="form-group">
													<label class="form-label">Email</label>
													<input type="text" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
													<div class="form-error" id="error-email"></div>
												</div>
												<div class="form-group">
													<label class="form-label">Patient Book No</label>
													<input type="text" class="form-control" name="book_no" id="book_no" placeholder="Patient Book No" autocomplete="off">
												</div>

											</div>


											<div class="col">
												<div class="form-group">
													<label class="form-label" for="dob">Date of Birth:</label>								
													<input name="dob" id="dob" placeholder="Select Date" autocomplete="off" class="form-control fc-datepicker"/>
													
												</div>							
												
												<div class="form-group">
													<label class="form-label" for="thana">Thana:</label>
													<input type="text" name="thana" id="thana" class="form-control">
												</div>	
												
												<div class="form-group">
													<label class="form-label" for="expenditure">Expenditure:</label>
													<select id="expenditure" name="expenditure" class="form-control">
														<option value="0">--Select Expenditure--</option>
														<option value="< 10 thousand">< 10 thousand</option>
														<option value="10 to 20 thousand">10 to 20 thousand</option>
														<option value="20 to 30 thousand">20 to 30 thousand</option>
														<option value="30 to 40 thousand">30 to 40 thousand</option>
														<option value="40 to 50 thousand">40 to 50 thousand</option>
														<option value="Over 50 thousand">Over 50 thousand</option>
														
													</select>
												</div>
												
												<div class="form-group">
													<label class="form-label" for="nid">NID Number:</label>
													<input type="text" name="nid" id="nid" placeholder="NID" class="form-control">
												</div>
											</div>


											<div class="col">
												<div class="form-group">
													<label class="form-label" for="age">Age:</label>
													<input type="text" name="age" id="age" class="form-control">
													<div class="form-error" id="error-age"></div>
												</div>							
												<div class="form-group">
													<label class="form-label" for="address">Full Address</label>
													
													<textarea class="form-control" name="address" id="address" rows="4" placeholder="Full Address"></textarea>
												</div>
												

												<div class="form-group">
													<label class="form-label" for="profession">Profession:</label>
													<select id="profession" name="profession" class="form-control">
														<option value="0">--Select Profession--</option>
														<option value="Government employee">Government employee</option>
														<option value="Non-government employee">Non-government employee</option>
														<option value="Self-employed">Self-employed</option>
														<option value="Student">Student </option>
														<option value="House-wife">House-wife</option>
														<option value="Retired">Retired</option>
														<option value="Unemployed">Unemployed</option>
														<option value="Other">Other</option>
													</select>
													
													
												</div>
											</div>


											<div class="col">
												<div class="form-group">
													<label class="form-label" for="type_of_diabetes">Types of Diabetes: </label>
													<select id="type_of_diabetes" name="type_of_diabetes" class="form-control">
														<option value="0">--Select Types of Diabetes--</option>
														<option value="Type 1">Type 1</option>
														<option value="Type 2">Type 2</option>
														<option value="GDM">GDM</option>									
													</select>								
												</div>
												<div class="form-group">
													<label class="form-label" for="dm_status">DM Status: </label>
													<select id="dm_status" name="dm_status" class="form-control">
														<option value="0">--Select DM--</option>
														<option value="New Patient">New Patient</option>
														<option value="Diabetes < 1 Year">Diabetes < 1 Year</option>
														<option value="Diabetes 1-5 Year">Diabetes 1-5 Year </option>
														<option value="Diabetes 6-10 Year">Diabetes 6-10 Year </option>
														<option value="Diabetes 11-15 Year">Diabetes 11-15 Year </option>
														<option value="Diabetes 16-20 Year">Diabetes 16-20 Year </option>
														<option value="Diabetes >20 Year">Diabetes >20 Year </option>
																						
													</select>								
												</div>
												<div class="form-group">
													
													<label class="form-label" for="familyhistry">Family History: </label>
													<input type="radio" name="familyhistry" value="yes"> Yes
													<input type="radio" name="familyhistry" value="no"> No
												</div>
												<div class="form-group">
													<label class="form-label" for="smoking">Smoking: </label>
													<input type="radio" name="smoking" value="yes"> Yes
													<input type="radio" name="smoking" value="no"> No
												</div>
											</div>
											
											<div class="col-lg-12">
												<input type="submit" class="btn btn-primary float-right" value="Submit" id="submitbtn1" name="submitbtn1">

												<a href="javascript:void(0)" class="btn btn-danger float-right">Clear</a>
												
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
		<!-- Jquery js-->
		<script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!--Bootstrap.min js-->
		<script src="../assets/plugins/bootstrap/popper.min.js"></script>
		<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery Sparkline js-->
		<script src="../assets/js/vendors/jquery.sparkline.min.js"></script>

		<!-- Chart Circle js-->
		<script src="../assets/js/vendors/circle-progress.min.js"></script>

		<!-- Star Rating js-->
		<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Moment js-->
		<script src="../assets/plugins/moment/moment.min.js"></script>

		<!-- Daterangepicker js-->
		<script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!-- Horizontal-menu js -->
		<script src="../assets/plugins/horizontal-menu/horizontalmenu.js"></script>

		<!-- Sidebar Accordions js -->
		<script src="../assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>

		<!--Time Counter js-->
		<script src="../assets/plugins/counters/jquery.missofis-countdown.js"></script>
		<script src="../assets/plugins/counters/counter.js"></script>

		<!-- Custom scroll bar js-->
		<script src="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Rightsidebar js -->
		<script src="../assets/plugins/sidebar/sidebar.js"></script>

		<!-- Data tables js-->
		<script src="../assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="../assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
		<script src="../assets/plugins/datatable/datatable.js"></script>
		<script src="../assets/plugins/datatable/datatable-2.js"></script>
		<script src="../assets/plugins/datatable/dataTables.responsive.min.js"></script>

		<!-- Custom js-->
		<script src="../assets/js/custom.js"></script>
		

	</body>
</html>