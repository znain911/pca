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
		<title>Missing Field Report – Changing Diabetes Barometer (CDB)</title>

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
							
							<form action="<?= site_url('reports/missing_field_report')?>" method="post" class="row">
								<div class="col">
									<div class="form-group">
										<label>Number Of Row:</label>
						<input type="number" name="offset" value="<?= (!empty($post))?$post['offset']:''?>" >
									</div>
								</div>
								<!-- <div class="col">
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
								</div> -->
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
										<!-- <div class="button">
						<button type="submit" name="submit" value="search">Search</button>
					</div>
					<div class="button">
						<button type="submit" name="submit" value="csv">CSV Downlad</button>
					</div> -->
								</div>
								</form>
                            
						</div>
						<!-- End page-header -->

						<!-- row -->
						<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Missing Field Report</div>
								</div>
								<div class="card-body">
                                	
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead class="bg-blue text-white">
							
							<tr class="main">
								<th class="col col1">SL</th>
								<th class="col col1">Center</th>
								<th class="col col1">Patient ID</th>
								<th class="col col1">Report Date</th>
								<th class="col col1">Name</th>
								<th class="col col9">Gender</th>
								<th class="col col1">Date of Birth</th>
								<th class="col col11">Age</th>
								<th class="col col1">Types of Diabetes</th>
								<th class="col col1">Division</th>
								<th class="col col1">Distirct</th>
								<th class="col col1">Thana</th>
								<th class="col col1">Full Address</th>
								<th class="col col1">DM Status</th>								
								<th class="col col1">Phone</th>
								<th class="col col1">Email</th>
								<th class="col col1">Expenditure</th>
								<th class="col col1">Family History</th>
								<th class="col col1"># of children</th>
								<th class="col col1">Patient Book No</th>
								<th class="col col1">NID Number</th>
								<th class="col col1">Profession</th>
								<th class="col col1">Smoking</th>								
								


								<th class="col col11">At Time Visit Date</th>
								<th class="col col11">At Time Visiting Doctor</th>

								<th class="col col11">At Time Height</th>
								<th class="col col11">At Time Weight</th>
								<th class="col col11">At Time BMI</th>
								<th class="col col11">At Time Waist</th>
								<th class="col col11">At Time Hip</th>
								<th class="col col11">At Time Waist-Hip ratio</th>
								<th class="col col11">At Time SBP</th>
								<th class="col col11">At Time DBP</th>
								<th class="col col11">At Time HbA1c</th>
								<th class="col col11">At Time FPG</th>
								<th class="col col11">At Time 2hPG/Post meal</th>
								<th class="col col11">At Time RBS</th>
								<th class="col col11">At Time Aceton</th>
								<th class="col col11">At Time Urine Albumin</th>
								<th class="col col11">At Time S.creatinine</th>
								<th class="col col11">At Time CHOL</th>
								<th class="col col11">At Time LDL-C</th>
								<th class="col col11">At Time HDL-C</th>
								<th class="col col11">At Time Triglycerides</th>
								<th class="col col11">At Time HHNS</th>		
								<th class="col col11">At Time Stroke</th>
								<th class="col col11">At Time Foot Complication</th>
								<th class="col col11">At Time Neuropathy</th>
								<th class="col col11">At Time PVD</th>
								<th class="col col11">At Time Retinopathy</th>
								<th class="col col11">At Time Skin Disease</th>
								<th class="col col11">At Time CKD</th>
								<th class="col col11">At Time Gastro Complication</th>
								<th class="col col11">At Time Hypoglycaemia</th>
								<th class="col col11">At Time HTN (Hypertension)</th>
								<th class="col col11">At Time DKA</th>							
								<th class="col col11">At Time Heart Disease</th>
								<th class="col col11">At Time Previous Type of Treatment</th>
								<th class="col col11">At Time Previous OGLD Usage</th>
								<th class="col col11">At Time Previous OGLD Name</th>
								<th class="col col11">At Time Previous OGLD Dosage</th>
								<th class="col col11">At Time Previous Insulin Usage</th>
								<th class="col col11">At Time Previous Insulin Name</th>
								<th class="col col11">At Time Previous Insulin morn</th>
								<th class="col col11">At Time Previous Insulin lun</th>
								<th class="col col11">At Time Previous Insulin din</th>
								<th class="col col11">At Time Previous Insulin bed</th>
								<th class="col col11">At Time Previous Insulin Total Dosage</th>
								

								<th class="col col11">5 Years Visit Date</th>
								<th class="col col11">5 Years Visiting Doctor</th>
								<th class="col col11">5 Years Height</th>
								<th class="col col11">5 Years Weight</th>
								<th class="col col11">5 Years BMI</th>
								<th class="col col11">5 Years Waist</th>
								<th class="col col11">5 Years Hip</th>
								<th class="col col11">5 Years Waist-Hip ratio</th>
								<th class="col col11">5 Years SBP</th>
								<th class="col col11">5 Years DBP</th>
								<th class="col col11">5 Years HbA1c</th>
								<th class="col col11">5 Years FPG</th>
								<th class="col col11">5 Years 2hPG/Post meal</th>
								<th class="col col11">5 Years RBS</th>
								<th class="col col11">5 Years Aceton</th>
								<th class="col col11">5 Years Urine Albumin</th>
								<th class="col col11">5 Years S.creatinine</th>
								<th class="col col11">5 Years CHOL</th>
								<th class="col col11">5 Years LDL-C</th>
								<th class="col col11">5 Years HDL-C</th>
								<th class="col col11">5 Years Triglycerides</th>
								<th class="col col11">5 Years HHNS</th>		
								<th class="col col11">5 Years Stroke</th>
								<th class="col col11">5 Years Foot Complication</th>
								<th class="col col11">5 Years Neuropathy</th>
								<th class="col col11">5 Years PVD</th>
								<th class="col col11">5 Years Retinopathy</th>
								<th class="col col11">5 Years Skin Disease</th>
								<th class="col col11">5 Years CKD</th>
								<th class="col col11">5 Years Gastro Complication</th>
								<th class="col col11">5 Years Hypoglycaemia</th>
								<th class="col col11">5 Years HTN (Hypertension)</th>
								<th class="col col11">5 Years DKA</th>							
								<th class="col col11">5 Years Heart Disease</th>
								<th class="col col11">5 Years Previous Type of Treatment</th>
								<th class="col col11">5 Years Previous OGLD Usage</th>
								<th class="col col11">5 Years Previous OGLD Name</th>
								<th class="col col11">5 Years Previous OGLD Dosage</th>
								<th class="col col11">5 Years Previous Insulin Usage</th>
								<th class="col col11">5 Years Previous Insulin Name</th>
								<th class="col col11">5 Years Previous Insulin morn</th>
								<th class="col col11">5 Years Previous Insulin lun</th>
								<th class="col col11">5 Years Previous Insulin din</th>
								<th class="col col11">5 Years Previous Insulin bed</th>
								<th class="col col11">5 Years Previous Insulin Total Dosage</th>


								<th class="col col11">V1 Visit Date</th>
								<th class="col col11">V1 Visiting Doctor</th>

								<th class="col col11">V1 Physical Activity Minutes/Day</th>
								<th class="col col11">V1 Physical Activity Day/Week</th>
								<th class="col col11">V1 Vegetables Times/Day</th>
								<th class="col col11">V1 Vegetables Day/Week</th>
								<th class="col col11">V1 Fruits Times/Day</th>
								<th class="col col11">V1 Fruits Day/Week</th>

								<th class="col col11">V1 Height</th>
								<th class="col col11">V1 Weight</th>
								<th class="col col11">V1 BMI</th>
								<th class="col col11">V1 Waist</th>
								<th class="col col11">V1 Hip</th>
								<th class="col col11">V1 Waist-Hip ratio</th>
								<th class="col col11">V1 SBP</th>
								<th class="col col11">V1 DBP</th>
								<th class="col col11">V1 HbA1c</th>
								<th class="col col11">V1 FPG</th>
								<th class="col col11">V1 2hPG/Post meal</th>
								<th class="col col11">V1 RBS</th>
								<th class="col col11">V1 Aceton</th>
								<th class="col col11">V1 Urine Albumin</th>
								<th class="col col11">V1 S.creatinine</th>
								<th class="col col11">V1 CHOL</th>
								<th class="col col11">V1 LDL-C</th>
								<th class="col col11">V1 HDL-C</th>
								<th class="col col11">V1 Triglycerides</th>
								<th class="col col11">V1 HHNS</th>		
								<th class="col col11">V1 Stroke</th>
								<th class="col col11">V1 Foot Complication</th>
								<th class="col col11">V1 Neuropathy</th>
								<th class="col col11">V1 PVD</th>
								<th class="col col11">V1 Retinopathy</th>
								<th class="col col11">V1 Skin Disease</th>
								<th class="col col11">V1 CKD</th>
								<th class="col col11">V1 Gastro Complication</th>
								<th class="col col11">V1 Hypoglycaemia</th>
								<th class="col col11">V1 HTN (Hypertension)</th>
								<th class="col col11">V1 DKA</th>							
								<th class="col col11">V1 Heart Disease</th>
								<th class="col col11">V1 Previous Type of Treatment</th>
								<th class="col col11">V1 Previous OGLD Usage</th>
								<th class="col col11">V1 Previous OGLD Name</th>
								<th class="col col11">V1 Previous OGLD Dosage</th>
								<th class="col col11">V1 Previous Insulin Usage</th>
								<th class="col col11">V1 Previous Insulin Name</th>
								<th class="col col11">V1 Previous Insulin morn</th>
								<th class="col col11">V1 Previous Insulin lun</th>
								<th class="col col11">V1 Previous Insulin din</th>
								<th class="col col11">V1 Previous Insulin bed</th>
								<th class="col col11">V1 Previous Insulin Total Dosage</th>
								<th class="col col11">V1 Current Type of Treatment</th>
								<th class="col col11">V1 Current OGLD Usage</th>
								<th class="col col11">V1 Current OGLD Name</th>
								<th class="col col11">V1 Current OGLD Dosage</th>
								<th class="col col11">V1 Current Insulin Usage</th>
								<th class="col col11">V1 Current Insulin Name</th>
								<th class="col col11">V1 Current Insulin morn</th>
								<th class="col col11">V1 Current Insulin lun</th>
								<th class="col col11">V1 Current Insulin din</th>
								<th class="col col11">V1 Current Insulin bed</th>
								<th class="col col11">V1 Current Insulin Total Dosage</th>


								<th class="col col11">V2 Visit Date</th>
								<th class="col col11">V2 Visiting Doctor</th>
								<th class="col col11">V2 Physical Activity Minutes/Day</th>
								<th class="col col11">V2 Physical Activity Day/Week</th>
								<th class="col col11">V2 Vegetables Times/Day</th>
								<th class="col col11">V2 Vegetables Day/Week</th>
								<th class="col col11">V2 Fruits Times/Day</th>
								<th class="col col11">V2 Fruits Day/Week</th>
								<th class="col col11">V2 Height</th>
								<th class="col col11">V2 Weight</th>
								<th class="col col11">V2 BMI</th>
								<th class="col col11">V2 Waist</th>
								<th class="col col11">V2 Hip</th>
								<th class="col col11">V2 Waist-Hip ratio</th>
								<th class="col col11">V2 SBP</th>
								<th class="col col11">V2 DBP</th>
								<th class="col col11">V2 HbA1c</th>
								<th class="col col11">V2 FPG</th>
								<th class="col col11">V2 2hPG/Post meal</th>
								<th class="col col11">V2 RBS</th>
								<th class="col col11">V2 Aceton</th>
								<th class="col col11">V2 Urine Albumin</th>
								<th class="col col11">V2 S.creatinine</th>
								<th class="col col11">V2 CHOL</th>
								<th class="col col11">V2 LDL-C</th>
								<th class="col col11">V2 HDL-C</th>
								<th class="col col11">V2 Triglycerides</th>
								<th class="col col11">V2 HHNS</th>		
								<th class="col col11">V2 Stroke</th>
								<th class="col col11">V2 Foot Complication</th>
								<th class="col col11">V2 Neuropathy</th>
								<th class="col col11">V2 PVD</th>
								<th class="col col11">V2 Retinopathy</th>
								<th class="col col11">V2 Skin Disease</th>
								<th class="col col11">V2 CKD</th>
								<th class="col col11">V2 Gastro Complication</th>
								<th class="col col11">V2 Hypoglycaemia</th>
								<th class="col col11">V2 HTN (Hypertension)</th>
								<th class="col col11">V2 DKA</th>							
								<th class="col col11">V2 Heart Disease</th>

								<th class="col col11">V2 Previous Type of Treatment</th>
								<th class="col col11">V2 Previous OGLD Usage</th>
								<th class="col col11">V2 Previous OGLD Name</th>
								<th class="col col11">V2 Previous OGLD Dosage</th>
								<th class="col col11">V2 Previous Insulin Usage</th>
								<th class="col col11">V2 Previous Insulin Name</th>
								<th class="col col11">V2 Previous Insulin morn</th>
								<th class="col col11">V2 Previous Insulin lun</th>
								<th class="col col11">V2 Previous Insulin din</th>
								<th class="col col11">V2 Previous Insulin bed</th>
								<th class="col col11">V2 Previous Insulin Total Dosage</th>
								<th class="col col11">V2 Current Type of Treatment</th>
								<th class="col col11">V2 Current OGLD Usage</th>
								<th class="col col11">V2 Current OGLD Name</th>
								<th class="col col11">V2 Current OGLD Dosage</th>
								<th class="col col11">V2 Current Insulin Usage</th>
								<th class="col col11">V2 Current Insulin Name</th>
								<th class="col col11">V2 Current Insulin morn</th>
								<th class="col col11">V2 Current Insulin lun</th>
								<th class="col col11">V2 Current Insulin din</th>
								<th class="col col11">V2 Current Insulin bed</th>
								<th class="col col11">V2 Current Insulin Total Dosage</th>

							</tr>
						</thead>
						<tbody>
							<?php if(isset($patients)){ foreach($patients['patients'] as $patient){
                                
								?>
							 <tr>
 								<td><?= $patient['sl']?></td>
 								<td><?= $patient['center_name']?></td>
 								<td><?= $patient['pt_regno']?></td>
 								<td><?= date("d-m-Y", strtotime($patient['created_datetime']));?></td>
 								<td><?= $patient['name']?></td> 
 								<td><?= $patient['gender']?></td>
 								<td><?= date("d-m-Y", strtotime($patient['dob']));?></td>
 								<td><?=  date_diff(date_create($patient['dob']), date_create('today'))->y;?></td>								
 								<td><?= $patient['type_of_diabetes']?></td>
 								<td><?= $patient['division_name']?></td>
 								<td><?= $patient['district_name']?></td>
 								<td><?= $patient['thana']?></td>
 								<td><?= $patient['address']?></td>
 								<td><?= $patient['dm_duration']?></td> 								
 								<td><?= $patient['phone']?></td>
 								<td><?= $patient['email']?></td>
 								<td><?= $patient['expenditure']?></td>
 								<td><?= $patient['family_history']?></td>
								<td><?= $patient['number_of_child']?></td>
								<td><?= $patient['patient_book_number']?></td>
								<td><?= $patient['nid']?></td>
 								<td><?= $patient['profession']?></td>
 								<td><?= $patient['smoking']?></td> 								
 								
 								
                               <?php //if(!empty($patient['p1'])){
                                 
                               	?>
 								<td><?= $patient['p1']['chk_date']?></td>
 								<td><?= $patient['p1']['doctor_name']?></td>
 								<td><?= $patient['p1']['height']?></td>
 								<td><?= $patient['p1']['weight']?></td>
 								<td><?= $patient['p1']['bmi']?></td>
 								<td><?= $patient['p1']['waist']?></td>
 								<td><?= $patient['p1']['hip']?></td>
 								<td><?= $patient['p1']['waist_hip_ratio']?></td>
 								<td><?= $patient['p1']['sbp']?></td>
 								<td><?= $patient['p1']['dbp']?></td>
 								<td><?= $patient['p1']['hba1c']?></td>
 								<td><?= $patient['p1']['fpg']?></td>
 								<td><?= $patient['p1']['tohpg_post']?></td>
 								<td><?= $patient['p1']['rbs']?></td>
 								<td><?= $patient['p1']['aceton']?></td>
 								<td><?= $patient['p1']['urine_albumin']?></td>
 								<td><?= $patient['p1']['s_creatinine']?></td>
 								<td><?= $patient['p1']['chol']?></td>
 								<td><?= $patient['p1']['ldl_c']?></td>
 								<td><?= $patient['p1']['hdl_c']?></td>
 								<td><?= $patient['p1']['triglycerides']?></td>
 								<td><?= $patient['p1']['hhns']?></td>
 								<td><?= $patient['p1']['stroke']?></td>
 								<td><?= $patient['p1']['foot_complication']?></td>
 								<td><?= $patient['p1']['neuropathy']?></td>
 								<td><?= $patient['p1']['pvd']?></td>
 								<td><?= $patient['p1']['retinopathy']?></td>
 								<td><?= $patient['p1']['skin']?></td>
 								<td><?= $patient['p1']['ckd']?></td>
 								<td><?= $patient['p1']['gastro']?></td>
 								<td><?= $patient['p1']['hypoglycaemia']?></td>
 								<td><?= $patient['p1']['htn']?></td>
 								<td><?= $patient['p1']['dka']?></td>
 								<td><?= $patient['p1']['heat']?></td>
 								<td><?= $patient['p1']['treatment']?></td>



								<td><?= $patient['p1']['ogld_status']?></td>
								<td><?php $at_ogld = $this->Reports_m->get_all_ogld($patient['p1']['pc_id']);
 								$oi=0;
 								foreach ($at_ogld as $cogldat) {
 									if ($oi==0) {
 										echo $cogldat['brand'];
 									}else{
 										echo '<br>'.$cogldat['brand'];
 									}
 									$oi++;
 								} ?></td>
								<td><?php 
 								$oi=0;
 								foreach ($at_ogld as $coglddosageat) {
 									if ($oi==0) {
 										echo $coglddosageat['dosage_cur'];
 									}else{
 										echo '<br>'.$coglddosageat['dosage_cur'];
 									} 									
 									$oi++;
 								} ?></td>
 								<td><?= $patient['p1']['insulin_status']?></td>

<td> <?php $c_inslnat = $this->Reports_m->get_all_insulin($patient['p1']['pc_id']);
 								$vi=0;
 								foreach ($c_inslnat as $cinslnat) {
 									if ($vi==0) {
 										echo $cinslnat['insulin_name'];
 									}else{
 										echo '<br>'.$cinslnat['insulin_name'];
 									} 									
 									$vi++;
 								} ?></td>
								<td> <?php 
 								$vi=0;
 								foreach ($c_inslnat as $cinsln1at) {
 									if ($vi==0) {
 										echo $cinsln1at['dose_morning'];
 									}else{
 										echo '<br>'.$cinsln1at['dose_morning'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($c_inslnat as $cinsln2at) {
 									if ($vi==0) {
 										echo $cinsln2at['dose_noon'];
 									}else{
 										echo '<br>'.$cinsln2at['dose_noon'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($c_inslnat as $cinsln3at) {
 									if ($vi==0) {
 										echo $cinsln3at['dose_night'];
 									}else{
 										echo '<br>'.$cinsln3at['dose_night'];
 									} 									
 									$vi++;
 								} ?></td>
								<td><?php 
 								$vi=0;
 								foreach ($c_inslnat as $cinsln4at) {
 									if ($vi==0) {
 										echo $cinsln4at['dose_bed'];
 									}else{
 										echo '<br>'.$cinsln4at['dose_bed'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php $tc = 0; 								
 								foreach ($c_inslnat as $totalinslat) {
 									$ctdos = $totalinslat['dose_bed']+$totalinslat['dose_night']+$totalinslat['dose_noon']+$totalinslat['dose_morning'];
 									if($tc==0){
 										echo $ctdos;
 									}else{
 										echo '<br>'.$ctdos;
 									}
 									 $tc++;									
 								}?></td>


 								
 								<?php //}?>
                               <?php //if(!empty($patient['p2'])){?>
                               	<td><?= $patient['p2']['chk_date']?></td>
 								<td><?= $patient['p2']['doctor_name']?></td>
 								<td><?= $patient['p2']['height']?></td>
 								<td><?= $patient['p2']['weight']?></td>
 								<td><?= $patient['p2']['bmi']?></td>
 								<td><?= $patient['p2']['waist']?></td>
 								<td><?= $patient['p2']['hip']?></td>
 								<td><?= $patient['p2']['waist_hip_ratio']?></td>
 								<td><?= $patient['p2']['sbp']?></td>
 								<td><?= $patient['p2']['dbp']?></td>
 								<td><?= $patient['p2']['hba1c']?></td>
 								<td><?= $patient['p2']['fpg']?></td>
 								<td><?= $patient['p2']['tohpg_post']?></td>
 								<td><?= $patient['p2']['rbs']?></td>
 								<td><?= $patient['p2']['aceton']?></td>
 								<td><?= $patient['p2']['urine_albumin']?></td>
 								<td><?= $patient['p2']['s_creatinine']?></td>
 								<td><?= $patient['p2']['chol']?></td>
 								<td><?= $patient['p2']['ldl_c']?></td>
 								<td><?= $patient['p2']['hdl_c']?></td>
 								<td><?= $patient['p2']['triglycerides']?></td>
 								<td><?= $patient['p2']['hhns']?></td>
 								<td><?= $patient['p2']['stroke']?></td>
 								<td><?= $patient['p2']['foot_complication']?></td>
 								<td><?= $patient['p2']['neuropathy']?></td>
 								<td><?= $patient['p2']['pvd']?></td>
 								<td><?= $patient['p2']['retinopathy']?></td>
 								<td><?= $patient['p2']['skin']?></td>
 								<td><?= $patient['p2']['ckd']?></td>
 								<td><?= $patient['p2']['gastro']?></td>
 								<td><?= $patient['p2']['hypoglycaemia']?></td>
 								<td><?= $patient['p2']['htn']?></td>
 								<td><?= $patient['p2']['dka']?></td>
 								<td><?= $patient['p2']['heat']?></td>
 								<td><?= $patient['p2']['treatment']?></td>
 		<td><?= $patient['p2']['ogld_status']?></td>
								<td><?php $c_ogld5y = $this->Reports_m->get_all_ogld($patient['p2']['pc_id']);
 								$oi=0;
 								foreach ($c_ogld5y as $cogld5y) {
 									if ($oi==0) {
 										echo $cogld5y['brand'];
 									}else{
 										echo '<br>'.$cogld5y['brand'];
 									}
 									$oi++;
 								} ?></td>
								<td><?php 
 								$oi=0;
 								foreach ($c_ogld5y as $coglddosage5y) {
 									if ($oi==0) {
 										echo $coglddosage5y['dosage_cur'];
 									}else{
 										echo '<br>'.$coglddosage5y['dosage_cur'];
 									} 									
 									$oi++;
 								} ?></td>
 								<td><?= $patient['p2']['insulin_status']?></td>

<td> <?php $c_insln5y = $this->Reports_m->get_all_insulin($patient['p2']['pc_id']);
 								$vi=0;
 								foreach ($c_insln5y as $cinsln5y) {
 									if ($vi==0) {
 										echo $cinsln5y['insulin_name'];
 									}else{
 										echo '<br>'.$cinsln5y['insulin_name'];
 									} 									
 									$vi++;
 								} ?></td>
								<td> <?php 
 								$vi=0;
 								foreach ($c_insln5y as $cinsln15y) {
 									if ($vi==0) {
 										echo $cinsln15y['dose_morning'];
 									}else{
 										echo '<br>'.$cinsln15y['dose_morning'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($c_insln5y as $cinsln25y) {
 									if ($vi==0) {
 										echo $cinsln25y['dose_noon'];
 									}else{
 										echo '<br>'.$cinsln25y['dose_noon'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($c_insln5y as $cinsln35y) {
 									if ($vi==0) {
 										echo $cinsln35y['dose_night'];
 									}else{
 										echo '<br>'.$cinsln35y['dose_night'];
 									} 									
 									$vi++;
 								} ?></td>
								<td><?php 
 								$vi=0;
 								foreach ($c_insln5y as $cinsln45y) {
 									if ($vi==0) {
 										echo $cinsln45y['dose_bed'];
 									}else{
 										echo '<br>'.$cinsln45y['dose_bed'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php $tc = 0; 								
 								foreach ($c_insln5y as $totalinsl5y) {
 									$ctdos = $totalinsl5y['dose_bed']+$totalinsl5y['dose_night']+$totalinsl5y['dose_noon']+$totalinsl5y['dose_morning'];
 									if($tc==0){
 										echo $ctdos;
 									}else{
 										echo '<br>'.$ctdos;
 									}
 									 $tc++;									
 								}?></td>
 								
 								<?php //}?>
                               <?php //if(!empty($patient['p3'])){?>
                               	<td><?= $patient['p3']['chk_date']?></td>
 								<td><?= $patient['p3']['doctor_name']?></td>
								<td><?= $patient['p3']['physical_minute']?></td>
								<td><?= $patient['p3']['physical_day']?></td>
								<td><?= $patient['p3']['vegetable_minute']?></td>
								<td><?= $patient['p3']['vegetable_day']?></td>
								<td><?= $patient['p3']['fruit_minute']?></td>
								<td><?= $patient['p3']['fruit_day']?></td>
								
 								<td><?= $patient['p3']['height']?></td>
 								<td><?= $patient['p3']['weight']?></td>
 								<td><?= $patient['p3']['bmi']?></td>
 								<td><?= $patient['p3']['waist']?></td>
 								<td><?= $patient['p3']['hip']?></td>
 								<td><?= $patient['p3']['waist_hip_ratio']?></td>
 								<td><?= $patient['p3']['sbp']?></td>
 								<td><?= $patient['p3']['dbp']?></td>
 								<td><?= $patient['p3']['hba1c']?></td>
 								<td><?= $patient['p3']['fpg']?></td>
 								<td><?= $patient['p3']['tohpg_post']?></td>
 								<td><?= $patient['p3']['rbs']?></td>
 								<td><?= $patient['p3']['aceton']?></td>
 								<td><?= $patient['p3']['urine_albumin']?></td>
 								<td><?= $patient['p3']['s_creatinine']?></td>
 								<td><?= $patient['p3']['chol']?></td>
 								<td><?= $patient['p3']['ldl_c']?></td>
 								<td><?= $patient['p3']['hdl_c']?></td>
 								<td><?= $patient['p3']['triglycerides']?></td>
 								<td><?= $patient['p3']['hhns']?></td>
 								<td><?= $patient['p3']['stroke']?></td>
 								<td><?= $patient['p3']['foot_complication']?></td>
 								<td><?= $patient['p3']['neuropathy']?></td>
 								<td><?= $patient['p3']['pvd']?></td>
 								<td><?= $patient['p3']['retinopathy']?></td>
 								<td><?= $patient['p3']['skin']?></td>
 								<td><?= $patient['p3']['ckd']?></td>
 								<td><?= $patient['p3']['gastro']?></td>
 								<td><?= $patient['p3']['hypoglycaemia']?></td>
 								<td><?= $patient['p3']['htn']?></td>
 								<td><?= $patient['p3']['dka']?></td>
 								<td><?= $patient['p3']['heat']?></td>
								<td><?= $patient['p3']['treatment_pre']?></td>
								<td><?= $patient['p3']['ogld_status_pre']?></td>
								<td><?php $pre_ogld = $this->Reports_m->get_pre_ogld($patient['p3']['pc_id']);
 								$oi=0;
 								foreach ($pre_ogld as $preogld) {
 									if ($oi==0) {
 										echo $preogld['brand'];
 									}else{
 										echo '<br>'.$preogld['brand'];
 									}
 									$oi++;
 								} ?></td>
								<td><?php 
 								$oi=0;
 								foreach ($pre_ogld as $preoglddosage) {
 									if ($oi==0) {
 										echo $preoglddosage['dosage_pre'];
 									}else{
 										echo '<br>'.$preoglddosage['dosage_pre'];
 									} 									
 									$oi++;
 								} ?></td>
								<td><?= $patient['p3']['insulin_status_pre']?></td>
								<td> <?php $pre_insln = $this->Reports_m->get_pre_insulin($patient['p3']['pc_id']);
 								$vi=0;
 								foreach ($pre_insln as $pinsln) {
 									if ($vi==0) {
 										echo $pinsln['insulin_name'];
 									}else{
 										echo '<br>'.$pinsln['insulin_name'];
 									} 									
 									$vi++;
 								} ?></td>
								<td> <?php 
 								$vi=0;
 								foreach ($pre_insln as $pinsln2) {
 									if ($vi==0) {
 										echo $pinsln2['dose_morning'];
 									}else{
 										echo '<br>'.$pinsln2['dose_morning'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($pre_insln as $pinsln3) {
 									if ($vi==0) {
 										echo $pinsln3['dose_noon'];
 									}else{
 										echo '<br>'.$pinsln3['dose_noon'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($pre_insln as $pinsln4) {
 									if ($vi==0) {
 										echo $pinsln4['dose_night'];
 									}else{
 										echo '<br>'.$pinsln4['dose_night'];
 									} 									
 									$vi++;
 								} ?></td>
								<td><?php 
 								$vi=0;
 								foreach ($pre_insln as $pinsln5) {
 									if ($vi==0) {
 										echo $pinsln5['dose_bed'];
 									}else{
 										echo '<br>'.$pinsln5['dose_bed'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php  								
 								foreach ($pre_insln as $pinsln6) {
 									$tdos = $pinsln6['dose_bed']+$pinsln6['dose_night']+$pinsln6['dose_noon']+$pinsln6['dose_morning'];
 									echo $tdos; 									
 								}?></td>

 								<td><?= $patient['p3']['treatment']?></td>
								<td><?= $patient['p3']['ogld_status']?></td>
								<td><?php $c_ogld = $this->Reports_m->get_all_ogld($patient['p3']['pc_id']);
 								$oi=0;
 								foreach ($c_ogld as $cogld) {
 									if ($oi==0) {
 										echo $cogld['brand'];
 									}else{
 										echo '<br>'.$cogld['brand'];
 									}
 									$oi++;
 								} ?></td>
								<td><?php 
 								$oi=0;
 								foreach ($c_ogld as $coglddosage) {
 									if ($oi==0) {
 										echo $coglddosage['dosage_cur'];
 									}else{
 										echo '<br>'.$coglddosage['dosage_cur'];
 									} 									
 									$oi++;
 								} ?></td>
 								<td><?= $patient['p3']['insulin_status']?></td>

<td> <?php $c_insln = $this->Reports_m->get_all_insulin($patient['p3']['pc_id']);
 								$vi=0;
 								foreach ($c_insln as $cinsln) {
 									if ($vi==0) {
 										echo $cinsln['insulin_name'];
 									}else{
 										echo '<br>'.$cinsln['insulin_name'];
 									} 									
 									$vi++;
 								} ?></td>
								<td> <?php $c_insln1 = $this->Reports_m->get_all_insulin($patient['p3']['pc_id']);
 								$vi=0;
 								foreach ($c_insln1 as $cinsln1) {
 									if ($vi==0) {
 										echo $cinsln1['dose_morning'];
 									}else{
 										echo '<br>'.$cinsln1['dose_morning'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($c_insln1 as $cinsln2) {
 									if ($vi==0) {
 										echo $cinsln2['dose_noon'];
 									}else{
 										echo '<br>'.$cinsln2['dose_noon'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($c_insln1 as $cinsln3) {
 									if ($vi==0) {
 										echo $cinsln3['dose_night'];
 									}else{
 										echo '<br>'.$cinsln3['dose_night'];
 									} 									
 									$vi++;
 								} ?></td>
								<td><?php 
 								$vi=0;
 								foreach ($c_insln1 as $cinsln4) {
 									if ($vi==0) {
 										echo $cinsln4['dose_bed'];
 									}else{
 										echo '<br>'.$cinsln4['dose_bed'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php $tc = 0; 								
 								foreach ($c_insln1 as $totalinsl) {
 									$ctdos = $totalinsl['dose_bed']+$totalinsl['dose_night']+$totalinsl['dose_noon']+$totalinsl['dose_morning'];
 									if($tc==0){
 										echo $ctdos;
 									}else{
 										echo '<br>'.$ctdos;
 									}
 									 $tc++;									
 								}?></td>
 								
 								
 								<?php //}?>
                               <?php if(!empty($patient['p4'])){?>
                               	<td><?= $patient['p4']['chk_date']?></td>
 								<td><?= $patient['p4']['doctor_name']?></td>
 								<td><?= $patient['p4']['height']?></td>
 								<td><?= $patient['p4']['weight']?></td>
 								<td><?= $patient['p4']['bmi']?></td>
 								<td><?= $patient['p4']['waist']?></td>
 								<td><?= $patient['p4']['hip']?></td>
 								<td><?= $patient['p4']['waist_hip_ratio']?></td>
 								<td><?= $patient['p4']['sbp']?></td>
 								<td><?= $patient['p4']['dbp']?></td>
 								<td><?= $patient['p4']['hba1c']?></td>
 								<td><?= $patient['p4']['fpg']?></td>
 								<td><?= $patient['p4']['tohpg_post']?></td>
 								<td><?= $patient['p4']['rbs']?></td>
 								<td><?= $patient['p4']['aceton']?></td>
 								<td><?= $patient['p4']['urine_albumin']?></td>
 								<td><?= $patient['p4']['s_creatinine']?></td>
 								<td><?= $patient['p4']['chol']?></td>
 								<td><?= $patient['p4']['ldl_c']?></td>
 								<td><?= $patient['p4']['hdl_c']?></td>
 								<td><?= $patient['p4']['triglycerides']?></td>
 								<td><?= $patient['p4']['hhns']?></td>
 								<td><?= $patient['p4']['stroke']?></td>
 								<td><?= $patient['p4']['foot_complication']?></td>
 								<td><?= $patient['p4']['neuropathy']?></td>
 								<td><?= $patient['p4']['pvd']?></td>
 								<td><?= $patient['p4']['retinopathy']?></td>
 								<td><?= $patient['p4']['skin']?></td>
 								<td><?= $patient['p4']['ckd']?></td>
 								<td><?= $patient['p4']['gastro']?></td>
 								<td><?= $patient['p4']['hypoglycaemia']?></td>
 								<td><?= $patient['p4']['htn']?></td>
 								<td><?= $patient['p4']['dka']?></td>
 								<td><?= $patient['p4']['heat']?></td>
 								<td><?= $patient['p4']['treatment_pre']?></td>
								<td><?= $patient['p4']['ogld_status_pre']?></td>
								<td><?php $pre_ogldv2 = $this->Reports_m->get_pre_ogld($patient['p4']['pc_id']);
 								$oi=0;
 								foreach ($pre_ogldv2 as $preogldv2) {
 									if ($oi==0) {
 										echo $preogldv2['brand'];
 									}else{
 										echo '<br>'.$preogldv2['brand'];
 									}
 									$oi++;
 								} ?></td>
								<td><?php 
 								$oi=0;
 								foreach ($pre_ogldv2 as $preoglddosagev2) {
 									if ($oi==0) {
 										echo $preoglddosagev2['dosage_pre'];
 									}else{
 										echo '<br>'.$preoglddosagev2['dosage_pre'];
 									} 									
 									$oi++;
 								} ?></td>
								<td><?= $patient['p4']['insulin_status_pre']?></td>
								<td> <?php $pre_inslnv2 = $this->Reports_m->get_pre_insulin($patient['p4']['pc_id']);
 								$vi=0;
 								foreach ($pre_inslnv2 as $pinslnv2) {
 									if ($vi==0) {
 										echo $pinslnv2['insulin_name'];
 									}else{
 										echo '<br>'.$pinslnv2['insulin_name'];
 									} 									
 									$vi++;
 								} ?></td>
								<td> <?php 
 								$vi=0;
 								foreach ($pre_inslnv2 as $pinsln2v2) {
 									if ($vi==0) {
 										echo $pinsln2v2['dose_morning'];
 									}else{
 										echo '<br>'.$pinsln2v2['dose_morning'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($pre_inslnv2 as $pinsln3v2) {
 									if ($vi==0) {
 										echo $pinsln3v2['dose_noon'];
 									}else{
 										echo '<br>'.$pinsln3v2['dose_noon'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($pre_inslnv2 as $pinsln4v2) {
 									if ($vi==0) {
 										echo $pinsln4v2['dose_night'];
 									}else{
 										echo '<br>'.$pinsln4v2['dose_night'];
 									} 									
 									$vi++;
 								} ?></td>
								<td><?php 
 								$vi=0;
 								foreach ($pre_inslnv2 as $pinsln5v2) {
 									if ($vi==0) {
 										echo $pinsln5v2['dose_bed'];
 									}else{
 										echo '<br>'.$pinsln5v2['dose_bed'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php  								
 								foreach ($pre_inslnv2 as $pinsln6v2) {
 									$tdos = $pinsln6v2['dose_bed']+$pinsln6v2['dose_night']+$pinsln6v2['dose_noon']+$pinsln6v2['dose_morning'];
 									echo $tdos; 									
 								}?></td>

 								<td><?= $patient['p4']['treatment']?></td>
								<td><?= $patient['p4']['ogld_status']?></td>
								<td><?php $c_ogldv2 = $this->Reports_m->get_all_ogld($patient['p4']['pc_id']);
 								$oi=0;
 								foreach ($c_ogldv2 as $cogldv2) {
 									if ($oi==0) {
 										echo $cogldv2['brand'];
 									}else{
 										echo '<br>'.$cogldv2['brand'];
 									}
 									$oi++;
 								} ?></td>
								<td><?php 
 								$oi=0;
 								foreach ($c_ogldv2 as $coglddosagev2) {
 									if ($oi==0) {
 										echo $coglddosagev2['dosage_cur'];
 									}else{
 										echo '<br>'.$coglddosagev2['dosage_cur'];
 									} 									
 									$oi++;
 								} ?></td>
 								<td><?= $patient['p4']['insulin_status']?></td>

					<td> <?php $c_inslnv2 = $this->Reports_m->get_all_insulin($patient['p4']['pc_id']);
 								$vi=0;
 								foreach ($c_inslnv2 as $cinslnv2) {
 									if ($vi==0) {
 										echo $cinslnv2['insulin_name'];
 									}else{
 										echo '<br>'.$cinslnv2['insulin_name'];
 									} 									
 									$vi++;
 								} ?></td>
								<td> <?php 
 								$vi=0;
 								foreach ($c_inslnv2 as $cinsln1v2) {
 									if ($vi==0) {
 										echo $cinsln1v2['dose_morning'];
 									}else{
 										echo '<br>'.$cinsln1v2['dose_morning'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($c_inslnv2 as $cinsln2v2) {
 									if ($vi==0) {
 										echo $cinsln2v2['dose_noon'];
 									}else{
 										echo '<br>'.$cinsln2v2['dose_noon'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php 
 								$vi=0;
 								foreach ($c_inslnv2 as $cinsln3v2) {
 									if ($vi==0) {
 										echo $cinsln3v2['dose_night'];
 									}else{
 										echo '<br>'.$cinsln3v2['dose_night'];
 									} 									
 									$vi++;
 								} ?></td>
								<td><?php 
 								$vi=0;
 								foreach ($c_inslnv2 as $cinsln3v2) {
 									if ($vi==0) {
 										echo $cinsln3v2['dose_bed'];
 									}else{
 										echo '<br>'.$cinsln3v2['dose_bed'];
 									} 									
 									$vi++;
 								} ?></td>

								<td><?php $tc = 0; 								
 								foreach ($c_inslnv2 as $totalinslv2) {
 									$ctdos = $totalinslv2['dose_bed']+$totalinslv2['dose_night']+$totalinslv2['dose_noon']+$totalinslv2['dose_morning'];
 									if($tc==0){
 										echo $ctdos;
 									}else{
 										echo '<br>'.$ctdos;
 									}
 									 $tc++;									
 								}?></td>
 								
 								<?php }?>
							 </tr>

							<?php } }?>
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