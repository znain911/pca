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
		<title>Add Prescription - Changing Diabetes Barometer (CDB)</title>

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
		<link rel="stylesheet" href="<?php echo base_url();?>assets/autocom/jquery.auto-complete.css">

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		 <style type="text/css">
		 	.table td {
			    padding: 0.25rem;
			    vertical-align: top;
			}
		 </style> 

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
								<li class="breadcrumb-item active" aria-current="page">Add Prescription</li>
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
										<h3 class="mb-0 card-title float-right">Patient Informations</h3>										
									</div>
									
									
									<div class="card-body pl-0 pr-0 pt-0">
										<div class="table-responsive mb-3">
														<table class="table row table-borderless w-100 m-0 border">
															<tbody class="col-lg-3 p-0">
																<tr>
																	<td><strong>Patient ID :</strong> <?php echo $patientinfo->patient_code; ?></td>
																</tr>
																<tr>
																	<td><strong>Name :</strong><?php echo $patientinfo->patient_name; ?></td>
																</tr>
																
																<tr>
																	<td><strong>Gender :</strong><?php echo $patientinfo->gender; ?> </td>
																</tr>
																<tr>
																	<td><strong>DOB :</strong> <?php echo date("d-m-Y", strtotime($patientinfo->dob)); ?> </td>
																</tr>
																<tr>
																	<td><strong>Age :</strong> <?php echo $patientinfo->age; ?> </td>
																</tr>
																<tr>
																	<td><strong>Patient Book No :</strong> <?php echo $patientinfo->patient_book_number; ?> </td>
																</tr>
															</tbody>
															<tbody class="col-lg-3 p-0">
																<tr>
																	<td><strong>Phone :</strong><?php echo $patientinfo->phone; ?></td>
																</tr>
																<tr>
																	<td><strong>Full Address :</strong> <?php echo $patientinfo->address; ?></td>
																</tr>
																<tr>
																	<td><strong>Thana :</strong> <?php echo $patientinfo->thana; ?></td>
																</tr>
																<tr>
																	<td><strong>District :</strong> <?php echo $patientinfo->district_name; ?></td>
																</tr>
																<tr>
																	<td><strong>Division:</strong> <?php echo $patientinfo->division_name; ?></td>
																</tr>
																<tr>
																	<td><strong>Email:</strong> <?php echo $patientinfo->email; ?></td>
																</tr>

															</tbody>
															<tbody class="col-lg-3 p-0">
																<tr>
																	<td><strong>Types of Diabetes :</strong><?php echo $patientinfo->type_of_diabetes; ?></td>
																</tr>
																<tr>
																	<td><strong>DM Status :</strong> <?php echo $patientinfo->dm_duration; ?></td>
																</tr>
																<tr>
																	<td><strong>Expenditure :</strong> <?php echo $patientinfo->expenditure; ?></td>
																</tr>
																<tr>
																	<td><strong># of children :</strong> <?php echo $patientinfo->number_of_child; ?></td>
																</tr>
																<tr>
																	<td><strong>Family History:</strong> <?php echo $patientinfo->family_history; ?></td>
																</tr>
																<tr>
																	<td><strong>Smoking:</strong> <?php echo $patientinfo->smoking; ?></td>
																</tr>
															</tbody>
															<tbody class="col-lg-3 p-0">
																<tr>
																	<td><strong>Report Date :</strong><?php echo date("d-m-Y", strtotime($patientinfo->created_datetime)); ?></td>
																</tr>
																<tr>
																	<td><strong>Center :</strong> <?php echo $patientinfo->center_name; ?></td>
																</tr>
																<tr>
																	<td><strong>Profession :</strong> <?php echo $patientinfo->profession; ?></td>
																</tr>
																<tr>
																	<td><strong>NID :</strong> <?php echo $patientinfo->nid; ?></td>
																</tr>
																
															</tbody>

														</table>

													</div>
										<div class="col-lg-12">
											
											<a href="<?php echo site_url('patient/patientedit/').$patientinfo->id; ?>" class="btn btn-primary float-right">Edit</a>
												
										</div>			
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
												<input type="hidden" id="url" value="<?= site_url()?>">
												<div id="step-10" class="">
													<?php if (!empty($attime)) {?>
														<?php $this->load->view('prescriptions/prescriptionform1edit');?>
													<?php }else{?>
														<?php $attributes = array('id' => 'form_post1', 'name'=>'form_post1', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
														<input type="hidden" name="visit_id"  value="1" />
														<input type="hidden" class="form-control" id="pcode1" name="pcode1" value="<?php echo $patientinfo->patient_code;?>" autocomplete="off" readonly >
														<?php $this->load->view('prescriptions/prescriptionform1');?>
														
													<?php echo form_close(); ?> 
													<?php $this->forminput->formpost('form_post1',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", $save_atd ,'Added Successfully'  ); ?>

													<?php } ?>

													


												</div>
												<div id="step-11" class="">
													<?php if (!empty($fiveyrinfo)) {?>
														<?php $this->load->view('prescriptions/prescriptionform2edit');?>
													<?php }else{?>
													<?php $attributes = array('id' => 'form_post2', 'name'=>'form_post2', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
														<input type="hidden" name="visit_id2"  value="2" />
														<input type="hidden" class="form-control" id="pcode2" name="pcode2" value="<?php echo $patientinfo->patient_code;?>" autocomplete="off" readonly >
														<?php $this->load->view('prescriptions/prescriptionform2');?>
													<?php echo form_close(); ?> 
													<?php $this->forminput->formpost('form_post2',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn2","form_acction", $save_5yr ,'Added Successfully'  ); ?>
													<?php } ?>
												</div>
												<div id="step-12" class="">
													<?php if (!empty($visit1info)) {?>
														<?php $this->load->view('prescriptions/prescriptionform3edit');?>
													<?php }else{?>
													<?php $attributes = array('id' => 'form_post3', 'name'=>'form_post3', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
														<input type="hidden" name="visit_id3"  value="3" />
														<input type="hidden" class="form-control" id="pcode3" name="pcode3" value="<?php echo $patientinfo->patient_code;?>" autocomplete="off" readonly >
														<?php $this->load->view('prescriptions/prescriptionform3');?>
														<?php echo form_close(); ?> 
													
													<?php } ?>
												</div>
												<div id="step-13" class="">
													<?php if (!empty($visit2info)) {?>
														<?php $this->load->view('prescriptions/prescriptionform4edit');?>
													<?php }else{?>
														<input type="hidden" name="visit_id"  value="4" />
														<?php $this->load->view('prescriptions/prescriptionform4');?>
													<?php } ?>
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
		

		<?php $this->forminput->formpost('form_post3',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn3","form_acction", $save_v1 ,'Visit 1 Added Successfully'  ); ?>
													<script type="text/javascript">
													function form_acction(msg){
															
														if(msg=='Visit 1 Added Successfully'){									
															var jmpurl='<?php echo site_url('patient/prescriptions/').$patientinfo->id;?>#step-13';
															window.location=jmpurl;
															$("#form_post3")[0].reset();
														}
													}           
													</script>
	<?php $this->forminput->formpost('form_post4',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn4","form_acction", 'patient/visit2_save' ,'Visit 2 Added Successfully'  ); ?>
	<script type="text/javascript">
		function form_acction(msg){
															
			if(msg=='Visit 2 Added Successfully'){									
			var jmpurl='<?php echo site_url('patient/prescriptions/').$patientinfo->id;?>#step-13';
				window.location=jmpurl;
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
		            dateFormat: 'dd-mm-yy'
		        })

				$('#vdate3').datepicker({		        	
		            changeMonth: true,
		            changeYear: true,
		            dateFormat: 'dd-mm-yy'
		        })
		        $('#vdate4').datepicker({		        	
		            changeMonth: true,
		            changeYear: true,
		            dateFormat: 'dd-mm-yy'
		        })

		        var currentDate = new Date();  
				/*$("#paddeddate").datepicker("setDate",currentDate);	*/

				$(function() {    
				    $('#paddeddate').datepicker();
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
			    url:"<?php echo site_url(); ?>patient/fetch_district",
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

<?php $this->forminput->formpost('form_post3e',"loadingdiv",site_url('user/images/loading2.gif'),"submitbtn3","form_acction", $edit_v1,'Visit 1 Update Successfully'  ); ?>
	<script type="text/javascript">
		function form_acction(msg){						
			if(msg=='Visit 1 Update Successfully'){									
				var jmpurl='<?php echo site_url('patient/prescriptions/').$patientinfo->id;?>#step-13';
				window.location=jmpurl;
			}
		}           
	</script>

	<?php $this->forminput->formpost('form_post4e',"loadingdiv",site_url('user/images/loading2.gif'),"submitbtn4","form_acction", $edit_v2,'Visit 2 Update Successfully'  ); ?>
	<script type="text/javascript">
		function form_acction(msg){						
			if(msg=='Visit 2 Update Successfully'){									
				var jmpurl='<?php echo site_url('patient/prescriptions/').$patientinfo->id;?>#step-13';
				window.location=jmpurl;
			}
		}           
	</script>
	<?php $this->forminput->formpost('form_post1e',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1e","form_acction", $edit_atd,'ATD Update Successfully'  ); ?>
	<script type="text/javascript">
		function form_acction(msg){						
			if(msg=='ATD Update Successfully'){									
				var jmpurl='<?php echo site_url('patient/prescriptions/').$patientinfo->id;?>#step-13';
				window.location=jmpurl;
			}
		}           
	</script>
	<?php $this->forminput->formpost('form_post2e',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn2e","form_acction", $edit_5yr,'5y Update Successfully'  ); ?>
	<script type="text/javascript">
		function form_acction(msg){						
			if(msg=='5y Update Successfully'){									
				var jmpurl='<?php echo site_url('patient/prescriptions/').$patientinfo->id;?>#step-13';
				window.location=jmpurl;
			}
		}           
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

		<script src="<?php echo base_url();?>assets/autocom/jquery.auto-complete_destination.js"></script>
		<!-- <script src="<?php echo base_url();?>assets/autocom/jquery.auto-complete_pickuplocation.js"></script> -->

		

	</body>
</html>