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
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Horizontal-menu css -->
		<link href="<?php echo base_url();?>assets/plugins/horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/plugins/horizontal-menu/horizontalmenu.css" rel="stylesheet">

		<!--Daterangepicker css-->
		<link href="<?php echo base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

		<!-- Rightsidebar css -->
		<link href="<?php echo base_url();?>assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!-- Sidebar Accordions css -->
		<link href="<?php echo base_url();?>assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

		<!-- Owl Theme css-->
		<link href="<?php echo base_url();?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

		<!-- Morris  Charts css-->
		<link href="<?php echo base_url();?>assets/plugins/morris/morris.css" rel="stylesheet" />

		<!---Font icons css-->
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link  href="<?php echo base_url();?>assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">
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
				</div> --> <!--End Header submenu-->

                <!-- app-content-->
				<div class="container content-area">
					<div class="side-app">

					    <!-- page-header -->
						<div class="page-header">
							<ol class="breadcrumb"><!-- breadcrumb -->
								<li class="breadcrumb-item"><a href="#">CENTER-WISE REPORT</a></li>
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
												<?php foreach($dashboard['center'] as $center):
	                    	if($center['name']!='CThealth LTD'){
						?>
							<tr>
		                       <td><?= $center['name']?></td>
		                       <td><?= $center['tp']['count']?></td>
		                       <td><?= $center['tph']['count']?></td>
		                       <td><?= $center['wp']['count']?></td>
		                       <td><?= $center['wph']['count']?></td>
		                       <td><?= $center['mp']['count']?></td>
		                       <td><?= $center['mph']['count']?></td>
							</tr>
							<?php }?>
						<?php endforeach;?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>


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

		<!--Owl Carousel js -->
		<script src="<?php echo base_url();?>assets/plugins/owl-carousel/owl.carousel.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/owl-carousel/owl-main.js"></script>

		<!-- Rightsidebar js -->
		<script src="<?php echo base_url();?>assets/plugins/sidebar/sidebar.js"></script>

		<!-- Charts js-->
		<!-- <script src="assets/plugins/chart/chart.bundle.js"></script>
		<script src="assets/plugins/chart/utils.js"></script> -->

		<!--Time Counter js-->
		<script src="<?php echo base_url();?>assets/plugins/counters/jquery.missofis-countdown.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/counters/counter.js"></script>

		<!--Morris  Charts js-->
		<script src="<?php echo base_url();?>assets/plugins/morris/raphael-min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/morris/morris.js"></script>

		<!-- Custom-charts js-->
		<script src="<?php echo base_url();?>assets/js/index1.js"></script>

		<!-- Custom js-->
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>
	</body>
</html>
