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
													<label class="form-label">Patient Guide Book No</label>
													<input type="text" class="form-control" name="book_no" id="book_no" placeholder="Patient Guide Book No" autocomplete="off">
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
														<option value="">--Select Expenditure--</option>
														<?php foreach ($explist as $exlist) {?>
															<option value="<?php echo $exlist->expenditure_name;?>"><?php echo $exlist->expenditure_name;?></option>
														<?php }?>
														<!-- <option value="< 10 thousand">< 10 thousand</option>
														<option value="10 to 20 thousand">10 to 20 thousand</option>
														<option value="20 to 30 thousand">20 to 30 thousand</option>
														<option value="30 to 40 thousand">30 to 40 thousand</option>
														<option value="40 to 50 thousand">40 to 50 thousand</option>
														<option value="Over 50 thousand">Over 50 thousand</option> -->
														
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
														<?php foreach ($profesionlist as $plist) {?>
															<option value="<?php echo $plist->profession_name;?>"><?php echo $plist->profession_name;?></option>
														<?php }?>
														<!-- <option value="Government employee">Government employee</option>
														<option value="Non-government employee">Non-government employee</option>
														<option value="Self-employed">Self-employed</option>
														<option value="Student">Student </option>
														<option value="House-wife">House-wife</option>
														<option value="Retired">Retired</option>
														<option value="Unemployed">Unemployed</option>
														<option value="Other">Other</option> -->
													</select>
													
													
												</div>
											</div>


											<div class="col">
												<div class="form-group">
													<label class="form-label" for="type_of_diabetes">Types of Diabetes: </label>
													<select id="type_of_diabetes" name="type_of_diabetes" class="form-control">
														<option value="">--Select Types of Diabetes--</option>
														<?php foreach ($diabetestypelist as $dtype) {?>
															<option value="<?php echo $dtype->type_name;?>"><?php echo $dtype->type_name;?></option>
														<?php }?>
														<!-- <option value="Type 1">Type 1</option>
														<option value="Type 2">Type 2</option>
														<option value="GDM">GDM</option> -->									
													</select>								
												</div>
												<div class="form-group">
													<label class="form-label" for="dm_status">DM Status: </label>
													<select id="dm_status" name="dm_status" class="form-control">
														<option value="">--Select DM--</option>
														<?php foreach ($dmstatuslist as $dmdlist) {?>
															<option value="<?php echo $dmdlist->duration_name;?>" ><?php echo $dmdlist->duration_name;?></option>
														<?php }?>
														<!-- <option value="New Patient">New Patient</option>
														<option value="Diabetes < 1 Year">Diabetes < 1 Year</option>
														<option value="Diabetes 1-5 Year">Diabetes 1-5 Year </option>
														<option value="Diabetes 6-10 Year">Diabetes 6-10 Year </option>
														<option value="Diabetes 11-15 Year">Diabetes 11-15 Year </option>
														<option value="Diabetes 16-20 Year">Diabetes 16-20 Year </option>
														<option value="Diabetes >20 Year">Diabetes >20 Year </option> -->
																						
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
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Add Prescription</h3>
									</div>
									<div class="card-body">
										<div id="smartwizard-3">
											<ul>
												
												<li><a href="#step-10">AT TIME OF DIAGNOSIS</a></li>
												<li><a href="#step-11">5 YEARS AFTER DIAGNOSIS</a></li>
												<li><a href="#step-12">Recruitment</a></li>
												<li><a href="#step-13">Follow-Up Visit</a></li>
												
											</ul>
											<div>
												<div id="step-10" class="">
													<?php $attributes = array('id' => 'form_post2', 'name'=>'form_post2', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
														<input type="hidden" name="visit_id"  value="1" />
														<?php $this->load->view('prescriptionform1st2');?>
														
													<?php echo form_close(); ?> 
													<?php $this->forminput->formpost('form_post2',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn2","form_acction", $save_atd ,'Added Successfully'  ); ?>
												</div>
												<div id="step-11" class="">
													<form class="">
														<input type="hidden" name="visit_id"  value="2" />
														<?php $this->load->view('prescriptionform1st2');?>
													</form>
												</div>
												<div id="step-12" class="">
													<form class="">
														<input type="hidden" name="visit_id"  value="3" />
														<?php $this->load->view('prescriptionform');?>
													</form>
												</div>
												<div id="step-13" class="">
													<form class="">
														<input type="hidden" name="visit_id"  value="4" />
														<?php $this->load->view('prescriptionform');?>
													</form>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
		<?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", $newpatient_database ,'Added Successfully'  ); ?>
		<script type="text/javascript">
		function form_acction(msg){
			var idr = parseInt(msg.match(/\d+/));	
			if(msg=='Patient Added Successfully '+idr){									
				var jmpurl='<?php echo base_url('patient/prescriptions/');?>'+idr;
				window.location=jmpurl;
				$("#form_post")[0].reset();
				$('#age').val(idr);
			}
		}           
		</script>

		
	

		<script type="text/javascript">
		    $(document).ready(function() {
		        var age = "";
		        $('#dob').datepicker({
		        	
		            onSelect: function(value, ui) {
		                var today = new Date();
		                age = today.getFullYear() - ui.selectedYear;
		                $('#age').val(age);
		            },
		            changeMonth: true,
		            changeYear: true,
		            yearRange: '1920:2022',
		            dateFormat: 'yy-mm-dd',		            	            
		        })
		        $('#vdate').datepicker({		        	
		            changeMonth: true,
		            changeYear: true,
		            dateFormat: 'dd-mm-yy'
		        })
		        $('#vdate2').datepicker({		        	
		            changeMonth: true,
		            changeYear: true,
		            yearRange: '1950:2020',
		            dateFormat: 'dd-mm-yy'
		        })
		        var currentDate = new Date();  
				/*$("#paddeddate").datepicker("setDate",currentDate);	*/

				$(function() {    
				    $('#paddeddate').datepicker(/*{
				    	changeMonth: true,
		            	changeYear: true, 
				    	yearRange: '1950:2020',
				    	setDate: new Date()
				    }*/);
				    $( "#paddeddate" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
				    $('#paddeddate').datepicker('setDate', new Date());
				});	        
		    })


		    $(document).ready(function(){
			 $('#division').change(function(){
			  var division_id = $('#division').val();
			  if(division_id != '')
			  {
			   $.ajax({
			    url:"<?php echo base_url(); ?>patient/fetch_district",
			    method:"POST",
			    data:{division_id:division_id},
			    success:function(data)
			    {
			     $('#district').html(data);
			     
			    }
			   });
			  }
			  else
			  {
			   $('#district').html('<option value="">Select District</option>');
			  }
			 });
			 
			});


			$(document).ready(function(){
			 $('#insulin_usag12').change(function(){
			  var inslndusag = $('#insulin_usag12').val();
			  /*alert(inslndusag)*/
			  if(inslndusag == 0)
			  {
			   document.getElementById("old_insln12").disabled=true;
			   document.getElementById("prev_insulin12_dgs").disabled=true;			  
			  }
			  if(inslndusag == 1){
			  	document.getElementById("old_insln12").disabled=false;
			   	document.getElementById("prev_insulin12_dgs").disabled=false;
			  }

			  
			 });
			 
			});


		</script>

		<script type="text/javascript">
			$(document).ready(function(){
			    
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