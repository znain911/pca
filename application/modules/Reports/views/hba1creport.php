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
				<div class="container-fluid content-area">
					<div class="side-app">

						<!-- page-header -->
						<div class="page-header">
							
							<form action="<?= site_url('reports')?>" method="post" class="row">
								<div class="col">
									<div class="form-group">
										<label>From Date:</label>
										<input type="text" name="from_date" value="<?= (!empty($post))?$post['from_date']:''?>" id="fromdate" autocomplete="off">
									</div>
								</div>
								<div class="col">
									<div class="form-group">	
										<label>To Date:</label>
										<input type="text" name="to_date" value="<?= (!empty($post))?$post['to_date']:''?>" id="todate" autocomplete="off">
									</div>
								</div>
								<div class="col">
									<div class="form-group">	
										<label>Year:</label>
										<select name="year" id="year" class="form-control">
										  <option value="0">--Select Year--</option>
										  <?php for($i=2014;$i<=date('Y');$i++){?>
											<option <?= (!empty($post) && $post['year']==$i)?'selected="selected"':''?> value="<?= $i?>"><?= $i?></option>
											<?php }?>
										</select>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Month:</label>
										<select name="month" id="month" class="form-control">
											<option  value="0">--Select Month--</option>
											<option <?= (!empty($post) && $post['month']=='01')?'selected="selected"':''?> value="01">January</option>
											<option <?= (!empty($post) && $post['month']=='02')?'selected="selected"':''?> value="02">February</option>
											<option <?= (!empty($post) && $post['month']=='03')?'selected="selected"':''?> value="03">March</option>
											<option <?= (!empty($post) && $post['month']=='04')?'selected="selected"':''?> value="04">April</option>
											<option <?= (!empty($post) && $post['month']=='05')?'selected="selected"':''?> value="05">May</option>
											<option <?= (!empty($post) && $post['month']=='06')?'selected="selected"':''?> value="06">June</option>
											<option <?= (!empty($post) && $post['month']=='07')?'selected="selected"':''?> value="07">July</option>
											<option <?= (!empty($post) && $post['month']=='08')?'selected="selected"':''?> value="08">August</option>
											<option <?= (!empty($post) && $post['month']=='09')?'selected="selected"':''?> value="09">September</option>
											<option <?= (!empty($post) && $post['month']=='10')?'selected="selected"':''?> value="10">Octorber</option>
											<option <?= (!empty($post) && $post['month']=='11')?'selected="selected"':''?> value="11">November</option>
											<option <?= (!empty($post) && $post['month']=='12')?'selected="selected"':''?> value="12">December</option>
										</select>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Center Name</label>
										<select class="form-control select2-show-search" id="centerid" name="centerid" autocomplete="off">
											<option value="0">--All Center--</option>
											<?php foreach($centers as $center):?>
											  <option <?= (!empty($post) && $post['centerid']==$center->center_id)?'selected="selected"':''?> value="<?= $center->center_id?>"><?= $center->center_name?></option>
										    <?php endforeach;?>
											
										</select>
									</div>
									
								</div>
								<div class="col">
									<div style="height: 30px; clear: both;"></div>
									<div class="button" style="float: left;">
											<button type="submit" name="submit" value="search">Search</button>
										</div>
										<div class="button" style="float: left;">
											<button type="submit" name="submit" value="csv">CSV Downlad</button>
										</div>
								</div>
								</form>
							
								
	                            
                            
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
                                	<style type="text/css">
					.table thead tr th.col{
						width: calc( (100% - 200px) / 11 );
					}
					.table thead tr th.col1{
						width: 200px;
					}
				</style>
				<div class="table">
					<table cellpadding="0" cellspacing="0" border="0">
						<thead class="bg-blue text-white">
							
							<tr class="main">
								<th class="col col1">Center Name</th>
								<!-- <th class="col col2">Number Of Patient</th>
								<th class="col col3">ATD Patient HbA1c</th> -->
								<th class="col col4">Prescription With HbA1c</th>
								<th class="col col5">Visit 1 HbA1c</th>
								<th class="col col6">Visit 1 HbA1c (Paid)</th>
								<th class="col col7">Visit 1 HbA1c (Free)</th>
								<th class="col col8">Visit 2 HbA1c</th>
								<th class="col col9">Visit 2 HbA1c (Paid)</th>
								<th class="col col10">Visit 2 HbA1c (Free)</th>
								<!-- <th class="col col11">OGLD</th>
								<th class="col col12">HI</th>
								<th class="col col13">MI</th> -->
							</tr>
						</thead>
						<tbody>
							<?php if(isset($reports['centers'])){
							
                               foreach($reports['centers'] as $report):
                               	 if($report['name']!='CThealth LTD'){ 
									?>
							<tr>
								<td style="font-weight: bold"><?= $report['name']?></td>
								<!-- <td><?= $report['p']['count']?></td>
								<td><?= $report['ph']['count']?></td> -->
								<td><?= $report['prh']['count']?></td>
								<td><?= $report['visit1']['count']?></td>

								<td><?= $report['visit1p']['count']?></td>
								<td><?= $report['visit1f']['count']?></td>
								<td><?= $report['visit2']['count']?></td>
								<td><?= $report['visit2p']['count']?></td>
								<td><?= $report['visit2f']['count']?></td>

								<!-- <td><?= $report['og']['count']?></td>
								<td><?= $report['hi']['count']?></td>
								<td><?= $report['mi']['count']?></td> -->
							</tr>
							<?php 

                           if(isset($report['doctor'])){
							foreach($report['doctor'] as $doctor):


							?>
							<tr>
								<td ><?= $doctor['name']?></td>
								<!-- <td><?= $doctor['p']['count']?></td>
								<td><?= $doctor['ph']['count']?></td> -->
								<td><?= $doctor['prh']['count']?></td>
								<td><?= $doctor['visit1']['count']?></td>

								<td><?= $doctor['visit1p']['count']?></td>
								<td><?= $doctor['visit1f']['count']?></td>
								<td><?= $doctor['visit2']['count']?></td>
								<td><?= $doctor['visit2p']['count']?></td>
								<td><?= $doctor['visit2f']['count']?></td>

								<!-- <td><?= $doctor['og']['count']?></td>
								<td><?= $doctor['hi']['count']?></td>
								<td><?= $doctor['mi']['count']?></td> -->
							</tr>
							<?php endforeach;} } endforeach; }?>
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