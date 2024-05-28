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
		<title>HbA1c Report – Changing Diabetes Barometer (CDB)</title>

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
				<!--Header submenu -->
				<div class="bg-white p-3 header-secondary header-submenu">
					<div class="container ">
						<div class="row">
							
						</div>
					</div>
				</div><!--End Header submenu -->

                <!-- app-content-->
				<div class="container content-area">
					<div class="side-app">

						<!-- page-header -->
						<div class="page-header">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>From Date:</label>							
										<input name="fromdate" id="fromdate" placeholder="Select Date" autocomplete="off" class="form-control fc-datepicker"/>
																	
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>To Date:</label>							
										<input name="todate" id="todate" placeholder="Select Date" autocomplete="off" class="form-control fc-datepicker"/>
																	
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Year:</label>							
										<select class="form-control" id="year" name="year" autocomplete="off">
											<option value="">All</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>					
										</select>						
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Month:</label>							
										<select class="form-control" id="monthyear" name="monthyear">
			                                    <option value="">All</option>       
												<option value="01">January</option>
												<option value="02">February</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06">June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
			                                </select>						
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Center:</label>							
										<select class="form-control select2-show-search" id="center" name="center" autocomplete="off">
											<option>All</option>
											<?php foreach ($cntr_list as $cntrlist ) {?>
											<option value="<?php echo $cntrlist->center_id;?>"><?php echo $cntrlist->center_name;?></option>
											<?php }?>
																
										</select>						
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>&nbsp;</label>							
										 <br>
											<a href="javascript:void(0)" class="btn btn-lg btn-primary" id="sss">Search</a>			
											<!-- <button type="button" class="btn btn-lg btn-primary" onclick="submitfilter()">Search</button> -->			
									</div>
								</div>
	                            
                            </div>
						</div>
						<!-- End page-header -->

						<!-- row -->
						<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">HbA1c Report</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive" id="hba1ctable">
										<table id="example" class="table table-striped table-bordered w-100">
											<thead>
												<tr>
													<th class="twd-23p">Center Name</th>
													<th class="twd-7p">No. Of Patient</th>
													<th class="twd-7p">Prescription <br>With HbA1c</th>
													<th class="twd-7p">Visit 1 <br>HbA1c</th>
													<th class="twd-7p">Visit 1 <br>HbA1c (Paid)</th>
													<th class="twd-7p">Visit 1 <br>HbA1c (Free)</th>

													<th class="twd-7p">Visit 2 <br>HbA1c</th>
													<th class="twd-7p">Visit 2 <br>HbA1c (Paid)</th>
													<th class="twd-7p">Visit 2 <br>HbA1c (Free)</th>

													<th class="twd-7p">OGLD</th>
													<th class="twd-7p">HI</th>
													<th class="twd-7p">MI</th>


												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>2</td>
													<td>3</td>
													<td>4</td>
													<td>5</td>
													<td>6</td>
													<td>7</td>
													<td>8</td>
													<td>9</td>
													<td>10</td>
													<td>11</td>
													<td>12</td>
												</tr>
												<tr>
													<td>1</td>
													<td>2</td>
													<td>3</td>
													<td>4</td>
													<td>5</td>
													<td>6</td>
													<td>7</td>
													<td>8</td>
													<td>9</td>
													<td>10</td>
													<td>11</td>
													<td>12</td>
												</tr>
												
												
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
			    $('#fromdate').datepicker({
		            changeMonth: true,
		            changeYear: true,
		            dateFormat: 'yy-mm-dd',		            	            
		        })
				$('#todate').datepicker({
		            changeMonth: true,
		            changeYear: true,
		            dateFormat: 'yy-mm-dd',		            	            
		        })
			});

			function submitfilter(){
			    var from_date = $('#fromdate').val();
			    var to_date = $('#todate').val();
			    var center = $('#center').val();	 
			    var onlyyear = $('#year').val();  
			    var monthyear = $('#monthyear').val(); 
			    /*alert(from_date + to_date + center)*/	    
			    /*var loader='<div style="text-align: center;"><i class="fa fa-refresh fa-spin fa-4x fa-fw"></i></div>';
			    $('#tabledata').html(loader);	
			    var route="<?php echo base_url("reports/hba1c_filter"); ?>";

			    $.post(route,
			        {
			            from_date:from_date, 
			            to_date:to_date,
			            center:center,
			            monthyear:monthyear,
			            onlyyear:onlyyear,	            
			        },
			        function(data, status)
			        {
			            $("#hba1ctable").html(data);
			        });*/
			  } 
			  document.getElementById("sss").addEventListener("click", function() {
				  var from_date = $('#fromdate').val();
				    var to_date = $('#todate').val();
				    var center = $('#center').val();	 
				    var onlyyear = $('#year').val();  
				    var monthyear = $('#monthyear').val(); 
				    /*alert(from_date + to_date + center)*/
				    var loader='<div style="text-align: center;"><i class="fa fa-refresh fa-spin fa-4x fa-fw"></i></div>';
				    $('#tabledata').html(loader);	
				    var route="<?php echo base_url("reports/hba1c_filter"); ?>";

				    $.post(route,
				        {
			            from_date:from_date, 
			            to_date:to_date,
			            center:center,
			            monthyear:monthyear,
			            onlyyear:onlyyear,	            
			        },
			        function(data, status)
			        {
			            $("#hba1ctable").html(data);
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