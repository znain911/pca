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
		<link rel="icon" href="assets/images/cdb-fav.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/cdb-fav.ico" />
		<!-- Title -->
		<title>Changing Diabetes Barometer (CDB)</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Dashboard css -->
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/custom.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Horizontal-menu css -->
		<link href="assets/plugins/horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet">
		<link href="assets/plugins/horizontal-menu/horizontalmenu.css" rel="stylesheet">

		<!--Daterangepicker css-->
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

		<!-- Rightsidebar css -->
		<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!-- Sidebar Accordions css -->
		<link href="assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

		<!-- Owl Theme css-->
		<link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

		<!-- Morris  Charts css-->
		<link href="assets/plugins/morris/morris.css" rel="stylesheet" />

		<!---Font icons css-->
		<link href="assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link  href="assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

	</head>

	<body class="app sidebar-mini rtl">

		<!--Global-Loader-->
		<div id="global-loader">
			<img src="assets/images/icons/loader.svg" alt="loader">
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
				</div> --> <!--End Header submenu-->

                <!-- app-content-->
				<div class="container content-area">
					<div class="side-app">

					    <!-- page-header -->
						<div class="page-header">
							<ol class="breadcrumb"><!-- breadcrumb -->
								<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								<!-- <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li> -->
							</ol><!-- End breadcrumb -->
							<!-- <div class="ml-auto">
								<div class="input-group">
									<a  class="btn btn-primary text-white mr-2"  id="daterange-btn">
										<span>
											<i class="fa fa-calendar"></i> Events Settings
										</span>
										<i class="fa fa-caret-down"></i>
									</a>
									<a href="#" class="btn btn-secondary text-white" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Rating">
										<span>
											<i class="fa fa-star"></i>
										</span>
									</a>
								</div>
							</div> -->
						</div>
						<!-- End page-header -->


						<div class="row">
							<div class="col-md-12">
								<div class="card card-bgimg br-7">
									

									<?php if($metadata['user_type']==1){?>
									<div class="row">
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">TODAYS PATIENT</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $patient_today->todaypatients;?></h2>
									             <!-- <div><i class="si si-people mr-1 text-danger"></i><span class="text-white">Patients</span></div> -->
									        </div>
										</div>
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">TODAYS PRESCRIPTION</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $prescrib_today->todayprescriptions;?></h2>
									             <!-- <div><i class="si si-people mr-1 text-danger"></i><span class="text-white">Patients</span></div> -->
									        </div>
										</div>
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">TOTAL PATIENT</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $patient_total->totalpatients;?></h2>
									             <!-- <div><i class="si si-people mr-1 text-danger"></i><span class="text-white">Patients</span></div> -->
									        </div>
										</div>
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">TOTAL PRESCRIPTION</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $prescrib_total->totalprescriptions;?></h2>
									             <!-- <div><i class="si si-people mr-1 text-danger"></i><span class="text-white">Patients</span></div> -->
									        </div>
										</div>
										
									</div>
								<?php }else{?>
									<div class="row">
										<div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">TODAYS PATIENT</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">863</h2>
									             <!-- <div><i class="si si-people mr-1 text-danger"></i><span class="text-white">Patients</span></div> -->
									        </div>
										</div>
										
										<div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">TOTAL PATIENT</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">3,876</h2>
									             <!-- <div><i class="si si-people mr-1 text-danger"></i><span class="text-white">Patients</span></div> -->
									        </div>
										</div>
										
										<div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">Today Visit 1</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">12,976</h2>
									             
									        </div>
										</div>
										<div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">Total Visit 1</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">24,844</h2>
									             
									        </div>
										</div>
										<div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">Today Visit 2</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">8,547</h2>
									             
									        </div>
										</div>
										<div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h5 class="text-white">Total Visit 2</h5>
									            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue">1,364</h2>
									             <!-- <div><i class="si si-people mr-1 text-danger"></i><span class="text-white">Patients</span></div> -->
									        </div>
										</div>
									</div>
								<?php }?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="card">
								<div class="card-header custom-header">
									<h3 class="card-title">Total Mean <?php echo $metadata['user_type'];?></h3>
									<?php if ($metadata['user_type']==1 || $metadata['user_type']==2) {?>
									<div class="form-group" style="margin-left: 20px;">
																
										<select class="form-control select2-show-search" id="center" name="center" autocomplete="off" >
												<option>-- Select Center --</option>
												<?php foreach ($cntr_list as $cntrlist ) {?>
												<option value="<?php echo $cntrlist->center_id;?>"><?php echo $cntrlist->center_name;?></option>
												<?php }?>
																	
										</select>						
									</div>
									<?php }?>
									
									<div class="card-options">
										
									</div>
								</div>
								<div class="card-body p-0" id="meandataarea">
									<div class="mean-con">
										<div class="meancolum">
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean Age</div>
											</div>
											<div class="mean-velue-area"><?php echo round($patient_mean->mean_age,2);?></div>
											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean Monthly Expenditure</div>
											</div>
											<div class="mean-velue-area"><?php echo round($patient_mean->mean_expenditure,2);?></div>
											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean Height</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_height,2);?></div>
											<div class="clr"></div>

											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean Weight</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_weight,2);?></div>
											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean Waist</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_waist,2);?></div>
											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean BMI</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_bmi,2);?></div>
											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean S.Creatinine</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_s_creatinine,2);?></div>

										</div>
										<div class="meancolum">
											
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean Blood Presure</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_sbp,2);?> / <?php echo round($prescrip_mean->mean_dbp,2);?></div>
											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean Waist-Hip Ratio</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_waist_hip_ratio,2);?></div>

											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean Physical Activity Duration</div>
											</div>
											<div class="mean-velue-area">xxxx</div>

											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean HbA1c</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_hba1c,2);?></div>
											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean FBS</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_fpg,2);?></div>

											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean 2hPG/Post Meal BG</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_tohpg_post,2);?></div>

										</div>
										<div class="meancolum">
											

											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean T.Chol</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_chol,2);?></div>

											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean LDL-C</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_ldl_c,2);?></div>

											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean HDL-C</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_hdl_c,2);?></div>

											<div class="clr"></div>
											<div class="mean-ttl-area">
												<div class="circl"></div>
												<div class="mean-ttl">Mean TG</div>
											</div>
											<div class="mean-velue-area"><?php echo round($prescrip_mean->mean_triglycerides,2);?></div>
										</div>
										<div class="clr"></div>
									</div>
								</div>
							</div>
						</div>


						<!-- <div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header ">
										<h3 class="card-title ">CENTER-WISE REPORT</h3>
										<div class="card-options">
											<button id="add__new__list" type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> CENTER-WISE REPORT</button>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table card-table table-striped table-vcenter table-outline table-bordered ">
											<thead>
												<tr>
													<th scope="col" class="border-top-0">Center Name</th>
													<th scope="col" class="border-top-0" width="100px">Today Total Patient	</th>
													<th scope="col" class="border-top-0" width="100px">Today Total Prescription</th>
													<th scope="col" class="border-top-0" width="100px">This Week Total Patient</th>
													<th scope="col" class="border-top-0">This Week Total Prescription</th>
													<th scope="col" class="border-top-0">This Month Total Patient</th>
													<th scope="col" class="border-top-0">This Month Total Prescription</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($centerlist as $cntrlist) {?>
												<tr>
													<td scope="row"><?php echo $cntrlist->center_name;?></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div> -->


					</div><!--End side app-->

					<!-- Right-sidebar-->
				

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
<script src="assets/js/vendors/jquery-3.2.1.min.js"></script>
<script type="text/javascript">


$( document ).ready(function() {
        $("#center").change(function() {     
	 var select = $("#center option:selected").val();
	 var loader='<div style="text-align: center;"><i class="fa fa-refresh fa-spin fa-4x fa-fw"></i></div>';
	 $('#meandataarea').html(loader);
			
			var route="<?php echo site_url("auth/meanByCenter"); ?>";
			
				$.post(route,
				{
					center:select
				},
				 function(data, status)
				{
					$("#meandataarea").html(data);
				});


	 });
    });
</script>


		

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery Sparkline js-->
		<script src="assets/js/vendors/jquery.sparkline.min.js"></script>

		<!-- Chart Circle js-->
		<script src="assets/js/vendors/circle-progress.min.js"></script>

		<!-- Star Rating js-->
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Moment js-->
		<script src="assets/plugins/moment/moment.min.js"></script>

		<!-- Daterangepicker js-->
		<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!-- Horizontal-menu js -->
		<script src="assets/plugins/horizontal-menu/horizontalmenu.js"></script>

		<!-- Sidebar Accordions js -->
		<script src="assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>

		<!-- Custom scroll bar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Owl Carousel js -->
		<script src="assets/plugins/owl-carousel/owl.carousel.js"></script>
		<script src="assets/plugins/owl-carousel/owl-main.js"></script>

		<!-- Rightsidebar js -->
		<script src="assets/plugins/sidebar/sidebar.js"></script>

		<!-- Charts js-->
		<!-- <script src="assets/plugins/chart/chart.bundle.js"></script>
		<script src="assets/plugins/chart/utils.js"></script> -->

		<!--Time Counter js-->
		<script src="assets/plugins/counters/jquery.missofis-countdown.js"></script>
		<script src="assets/plugins/counters/counter.js"></script>

		<!--Morris  Charts js-->
		<script src="assets/plugins/morris/raphael-min.js"></script>
		<script src="assets/plugins/morris/morris.js"></script>

		<!-- Custom-charts js-->
		<script src="assets/js/index1.js"></script>

		<!-- Custom js-->
		<script src="assets/js/custom.js"></script>
	</body>
</html>