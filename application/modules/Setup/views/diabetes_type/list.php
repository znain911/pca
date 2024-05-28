<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Changing Diabetes Barometer (CDB)" name="description">
		<meta content="CT Health Ltd." name="author">
		<meta name="keywords" content="Changing Diabetes Barometer (CDB)"/>

		<!-- Favicon -->
		<link rel="icon" href="<?php echo base_url();?>assets/images/cdb-fav.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/cdb-fav.ico" />

		<!-- Title -->
		<title>Expenditure – Changing Diabetes Barometer (CDB)</title>

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

		<!-- Data table css -->
		<link href="<?php echo base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />

		<!--Select2 css -->
		<link href="<?php echo base_url();?>assets/plugins/select2/select2.min.css" rel="stylesheet" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

	</head>

	<body class="app sidebar-mini rtl">

		<!--Global-Loader-->
		<div id="global-loader">
			<img src="<?php echo base_url();?>assets/images/icons/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				<!--app-header-->
				<?php $this->load->view('includes/headermenu');?>
				<!--app-header end-->
				

                <!-- app-content-->
				<div class="container content-area">
					<div class="side-app">

						<!-- page-header -->
						<div class="page-header">
							<ol class="breadcrumb"><!-- breadcrumb -->
								<li class="breadcrumb-item"><a href="#">Setup</a></li>
								<li class="breadcrumb-item active" aria-current="page">Diabetes type</li>
							</ol><!-- End breadcrumb -->
							<div class="ml-auto">
								
									<a class="btn btn-success" href="<?php echo base_url('setup/adddiabetes_type');?>" ><i class="fe fe-plus mr-1 mt-1"></i> Add New</a>
							</div>
						</div>
						<!-- End page-header -->

						<!-- row -->
						<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Diabetes type</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive" id="hba1ctable">
										<table id="example" class="table table-striped table-bordered w-100">
											<thead class="bg-blue text-white">
												<tr>
													<th>Type Name</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($diabetes_typelist as $list){?>
												<tr>
													<td><?php echo $list->type_name;?></td>
													<td><?php if($list->status==1){echo 'Active'; }else{echo 'Inactive';} ?></td>
													<td>
														<a href="<?php echo base_url('setup/editdiabetes_type/').$list->id;?>" class="btn btn-app btn-primary btn-sm"><i class="fa fa-edit"></i>Edit</a>
													</td>
												</tr>
												<?php }?>
												
												
												
											</tbody>
										</table>
									</div>
                                </div>
								<!-- table-wrapper -->
							</div>
							<!-- section-wrapper -->
							</div>
						</div>
						<!-- row end -->
						
						
					</div>
					<!-- Right-sidebar-->
					<!-- End Rightsidebar-->

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

		<script type="text/javascript">
			$(document).ready(function(){
			    /*var table = $('#example').DataTable();
			    $('#test').click(function(){ //button filter event click
			        table.ajax.reload();  //just reload table
			    });*/
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

		<!--Time Counter js-->
		<script src="<?php echo base_url();?>assets/plugins/counters/jquery.missofis-countdown.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/counters/counter.js"></script>

		<!-- Custom scroll bar js-->
		<script src="<?php echo base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Rightsidebar js -->
		<script src="<?php echo base_url();?>assets/plugins/sidebar/sidebar.js"></script>

		<!-- Data tables js-->
		<script src="<?php echo base_url();?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/datatable/datatable.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/datatable/datatable-2.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/datatable/dataTables.responsive.min.js"></script>

		<!-- Datepicker js -->
		<script src="<?php echo base_url();?>assets/plugins/date-picker/spectrum.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/date-picker/jquery-ui.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.maskedinput.js"></script>

		<!--Select2 js -->
		<script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/select2.js"></script>

		<!-- Custom js-->
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>

	</body>
</html>