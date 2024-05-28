<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/includes/admin_header');?>
<!--BEGIN Style-->
<link rel="stylesheet" href="<?php echo base_url();?>admin_dir/bill/bootstrap-select.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>admin_dir/bill/examples.css" />
<script src="<?php echo base_url();?>admin_dir/bill/bootstrap3-typeahead.min.js"></script>
<script src="<?php echo base_url();?>admin_dir/bill/handlebars.js"></script>
<script src="<?php echo base_url();?>admin_dir/bill/typeahead.bundle.js"></script>
<style>
.margin1 {
	margin: 10px;
}
.box {
	margin: 10px auto;
	display: block;
	position: relative;
	border: 1px solid #efefef;
}
.box header {
	background-image: -webkit-linear-gradient(top, #ffffff 0%, #f2f2f2 100%);
	background-image: linear-gradient(to bottom, #ffffff 0%, #f2f2f2 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0);
	border-bottom: 1px solid #d4d4d4;
	-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	z-index: 0;
}
.box header:before, .box header:after {
	content: " ";
	display: table;
}
.box header:after {
	clear: both;
}
.box header .icons, .box header h5, .box header .toolbar {
	position: relative;
	min-height: 1px;
	float: left;
	padding: 0;
	margin: 0;
	display: block;
}
.box header .icons {
	padding: 10px 15px;
	border-right: 1px solid #ddd;
	-webkit-box-shadow: 1px 0px 0px #ffffff;
	box-shadow: 1px 0px 0px #ffffff;
}
.box header h5 {
	padding: 12px;
	font-weight: bold;
	z-index: 0;
}
.box.inverse header {
	background-image: -webkit-linear-gradient(top, #333333 0%, #222222 100%);
	background-image: linear-gradient(to bottom, #333333 0%, #222222 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff333333', endColorstr='#ff222222', GradientType=0);
	border-bottom: 1px solid #4d4d4d;
	color: #f5f5f5;
	z-index: 0;
}
.box.inverse header .icons {
	border-right: 1px solid #222;
	-webkit-box-shadow: 1px 0px 0px #3c3c3c;
	box-shadow: 1px 0px 0px #3c3c3c;
}
.box.primary header {
	background-image: -webkit-linear-gradient(top, #428bca 0%, #3071a9 100%);
	background-image: linear-gradient(to bottom, #428bca 0%, #3071a9 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff428bca', endColorstr='#ff3071a9', GradientType=0);
	border-bottom: 1px solid #428bca;
	color: #fff;
}
.box.primary header .icons {
	border-right: 1px solid #245682;
	-webkit-box-shadow: 1px 0px 0px #6aa3d5;
	box-shadow: 1px 0px 0px #6aa3d5;
}
.box.success header {
	background-image: -webkit-linear-gradient(top, #5cb85c 0%, #449d44 100%);
	background-image: linear-gradient(to bottom, #5cb85c 0%, #449d44 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5cb85c', endColorstr='#ff449d44', GradientType=0);
	border-bottom: 1px solid #5cb85c;
	color: #fff;
}
.box.success header .icons {
	border-right: 1px solid #357935;
	-webkit-box-shadow: 1px 0px 0px #80c780;
	box-shadow: 1px 0px 0px #80c780;
}
.box.warning header {
	background-image: -webkit-linear-gradient(top, #f0ad4e 0%, #ec971f 100%);
	background-image: linear-gradient(to bottom, #f0ad4e 0%, #ec971f 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff0ad4e', endColorstr='#ffec971f', GradientType=0);
	border-bottom: 1px solid #f0ad4e;
	color: #fff;
}
.box.warning header .icons {
	border-right: 1px solid #c77c11;
	-webkit-box-shadow: 1px 0px 0px #f4c37d;
	box-shadow: 1px 0px 0px #f4c37d;
}
.box.danger header {
	background-image: -webkit-linear-gradient(top, #d9534f 0%, #c9302c 100%);
	background-image: linear-gradient(to bottom, #d9534f 0%, #c9302c 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffd9534f', endColorstr='#ffc9302c', GradientType=0);
	border-bottom: 1px solid #d9534f;
	color: #fff;
}
.box.danger header .icons {
	border-right: 1px solid #a02622;
	-webkit-box-shadow: 1px 0px 0px #e27c79;
	box-shadow: 1px 0px 0px #e27c79;
}
.box.info header {
	background-image: -webkit-linear-gradient(top, #5bc0de 0%, #31b0d5 100%);
	background-image: linear-gradient(to bottom, #5bc0de 0%, #31b0d5 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de', endColorstr='#ff31b0d5', GradientType=0);
	border-bottom: 1px solid #5bc0de;
	color: #fff;
}
.box.info header .icons {
	border-right: 1px solid #2390b0;
	-webkit-box-shadow: 1px 0px 0px #85d0e7;
	box-shadow: 1px 0px 0px #85d0e7;
}
.box header .toolbar {
	float: right;
	display: inline-table;
}
.box header .toolbar .btn-toolbar {
	margin: 6px 3px;
}
.box header .toolbar .label, .box header .toolbar .badge {
	display: inline-block;
	margin: 10px;
}
.box header .toolbar .nav {
	margin: 1px 1px 0 0;
}
.box header .toolbar .nav > li {
	display: inline-block;
}
.box header .toolbar .nav > li > a {
	padding-top: 9px;
}
.box header .toolbar > .btn {
	margin-right: 4px;
}
.box header .toolbar > .btn-sm, .box header .toolbar > .btn-group {
	margin: 4px;
}
.box header .toolbar > .btn-xs {
	margin: 6px;
}
.box header .toolbar .input-sm {
	margin: 4px -4px;
}
.box header .toolbar .progress {
	min-width: 120px;
	margin: 10px 4px;
}
.box header .toolbar .progress.middle {
	height: 12px;
	margin: 13px 4px;
}
.box header .toolbar .progress.mini {
	height: 6px;
	margin: 16px 4px;
}
.box.danger .dropdown-menu > li > a:hover, .box.danger .dropdown-menu > li > a:focus {
	background-image: -webkit-linear-gradient(top, #d9534f 0%, #c9302c 100%);
	background-image: linear-gradient(to bottom, #d9534f 0%, #c9302c 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffd9534f', endColorstr='#ffc9302c', GradientType=0);
}
.box.info .dropdown-menu > li > a:hover, .box.info .dropdown-menu > li > a:focus {
	background-image: -webkit-linear-gradient(top, #5bc0de 0%, #31b0d5 100%);
	background-image: linear-gradient(to bottom, #5bc0de 0%, #31b0d5 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de', endColorstr='#ff31b0d5', GradientType=0);
}
.box.success .dropdown-menu > li > a:hover, .box.success .dropdown-menu > li > a:focus {
	background-image: -webkit-linear-gradient(top, #5cb85c 0%, #449d44 100%);
	background-image: linear-gradient(to bottom, #5cb85c 0%, #449d44 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5cb85c', endColorstr='#ff449d44', GradientType=0);
}
.box.warning .dropdown-menu > li > a:hover, .box.warning .dropdown-menu > li > a:focus {
	background-image: -webkit-linear-gradient(top, #f0ad4e 0%, #ec971f 100%);
	background-image: linear-gradient(to bottom, #f0ad4e 0%, #ec971f 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff0ad4e', endColorstr='#ffec971f', GradientType=0);
}
.box.inverse .dropdown-menu > li > a:hover, .box.inverse .dropdown-menu > li > a:focus {
	background-image: -webkit-linear-gradient(top, #333333 0%, #222222 100%);
	background-image: linear-gradient(to bottom, #333333 0%, #222222 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff333333', endColorstr='#ff222222', GradientType=0);
}
.box .body {
	padding: 10px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
}
.box .body hr {
	margin-left: -10px;
	margin-right: -10px;
}
.body.collapse:not(.in) {
	padding: 0;
}
.box > .block {
	padding: 0;
}
.row.ui-sortable .box header {
	cursor: move;
}
.btn-metis-1 {
	color: #ffffff;
	background-color: #ee465a;
	border-color: #c11a39;
}
.btn-metis-1:hover, .btn-metis-1:focus, .btn-metis-1:active, .btn-metis-1.active, .open .dropdown-toggle.btn-metis-1 {
	color: #ffffff;
	background-color: #eb2139;
	border-color: #8b1329;
}
.btn-metis-1:active, .btn-metis-1.active, .open .dropdown-toggle.btn-metis-1 {
	background-image: none;
}
.btn-metis-1.disabled, .btn-metis-1[disabled], fieldset[disabled] .btn-metis-1, .btn-metis-1.disabled:hover, .btn-metis-1[disabled]:hover, fieldset[disabled] .btn-metis-1:hover, .btn-metis-1.disabled:focus, .btn-metis-1[disabled]:focus, fieldset[disabled] .btn-metis-1:focus, .btn-metis-1.disabled:active, .btn-metis-1[disabled]:active, fieldset[disabled] .btn-metis-1:active, .btn-metis-1.disabled.active, .btn-metis-1[disabled].active, fieldset[disabled] .btn-metis-1.active {
	background-color: #ee465a;
	border-color: #c11a39;
}
.btn-metis-1 .badge {
	color: #ee465a;
	background-color: #fff;
}
</style>
<!--END Style-->
</head>
<body class="infobar-overlay horizontal-nav">
<?php $this->load->view('admin/includes/admin_header_menutop');?>
<div id="wrapper">
  <div id="layout-static">
    <div class="static-content-wrapper">
      <div class="static-content">
        <div class="page-content">
          <div class="container-fluid">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                <form method="post" action="<?php echo base_url('prescription/save_prescription');?>" id="delev_signup_form" name="delev_signup_form" enctype="multipart/form-data">
                  <div class="col-lg-3">
                    <div class="content-box">
                      <div class="box" style="z-index:0;">
                       
                        <a id="symptom_list" class="btn btn-label btn-social btn-github" href="#" data-original-title="" title="">Chief Complain</a>
                        <section id="no-more-tables" style="min-height:270px">
                          <div id="stripedTable1" class="body collapse in">
                            <table class="table table-striped responsive-table">
                              
                              <tbody id="disease_table">
                              </tbody>
                            </table>
                          </div>
                        </section>
                      </div>
                    </div>
                    <div class="content-box">
                      <div class="box">
                        
                        <a id="invstgsns_list" class="btn btn-label btn-social btn-github" href="#" data-original-title="" title="">Investigations</a>
                        <section id="no-more-tables" style="min-height:270px">
                          <div id="stripedTable2" class="body collapse in">
                            <table class="table table-striped responsive-table">
                              
                              <tbody id="tests_table">
                              </tbody>
                            </table>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-9"> 
                    
                    <!-- Start Add prescriptionn -->
                    <div style="border: 1px solid #ccc;" class="content-box margin1">
                      <div class="row margin1">
                        <div class="col-lg-12">
                          <div class="col-md-6">
                            <div class="form-horizontal">
                              <div class="form-group">
                                <label class="control-label col-lg-4" for="member_id">Member ID</label>
                                <div class="col-lg-8"> 
                                 
                                  <select class="selectpicker form-control" id="member_id" name="member_id" data-show-subtext="true" data-live-search="true">
                                    <option value="">--</option>
                                    <?php foreach($memberlist as $mlist){?>
                                    <option data-subtext="<?php echo $mlist->member_name;?>" value="<?php echo $mlist->employee_id;?>" ><?php echo $mlist->employee_id;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                              <div class="row" id="mbrdata">
								<div class="col-sm-6"><h5>Name:</h5></div>
                                <div class="col-sm-6"><h5>Mobile:</h5></div>
								<div class="col-sm-4"><h5>Age:</h5></div>
                                <div class="col-sm-4"><h5>Gender:</h5></div>
								<div class="col-sm-4"><h5>Av. Balance:</h5></div>
							</div>
                            
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-horizontal">
                               <div class="form-group">
                                <label class="control-label col-lg-4" for="doctor_name">Doctor</label>
                                <div class="col-lg-8">
                                  <select class="selectpicker form-control" id="doctor_name" name="doctor_name" data-show-subtext="true" data-live-search="true">
                                    <option value="" selected="selected">--Select--</option>
                                    <?php foreach($doctorlist as $dlist){?>
                                    <option value="<?php echo $dlist->post_title;?>" ><?php echo $dlist->post_title;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_date">Date</label>
                                <div class="col-lg-8">
                                  <input id="patients_date" name="patients_date" class="form-control" type="text">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_pid">Hospital</label>
                                <div class="col-lg-8">
                                  <select class="selectpicker form-control" id="hospital_name" name="hospital_name" data-show-subtext="true" data-live-search="true">
                                    <option value="" selected="selected">--Select--</option>
                                    <?php foreach($hospitallist as $hlist){?>
                                    <option value="<?php echo $hlist->hospital_name;?>" ><?php echo $hlist->hospital_name;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_pid">Consultaion site</label>
                                <div class="col-lg-8">
                                  <select class="selectpicker form-control" id="consultaion_site" name="consultaion_site" data-show-subtext="true" data-live-search="true">
                                    <option value="" selected="selected">--Select--</option>
                                    <?php foreach($hospitallist as $hlist){?>
                                    <option value="<?php echo $hlist->hospital_name;?>" ><?php echo $hlist->hospital_name;?></option>
                                    <?php }?>
                                    <?php foreach($orgnslist as $olist){?>
                                    <option value="<?php echo $olist->organization_head;?>" ><?php echo $olist->organization_head;?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Close Add Prescription -->
                   
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="box">
                                <a id="mdcn_list" class="btn btn-label btn-social btn-github" href="#" data-original-title="" title="">Treatment</a>
                                <section id="no-more-tables" style="min-height:250px;">
                                  <div id="stripedTable3" class="body collapse in">
                                    <table class="table table-striped responsive-table">
                                     
                                      <tbody id="medicne_table">
                                      </tbody>
                                    </table>
                                  </div>
                                </section>
                              </div>
                              
                              <div class="box">
                                
                                <section id="no-more-tables" style="min-height:60px;">
                                   <div class="form-group">
                                      <label for="patients_pte" class="btn btn-label btn-social btn-github">Advice:</label>
                                      <textarea class="form-control" rows="3" id="patients_pte" name="patients_pte" style="height:100px"></textarea>
                                    </div> 
                                </section>
                              </div>
                      </div>
                      <div class="col-lg-6">
                      	<div class="box">
                                <!--<center>-->
                                  <a id="mdcn_list" class="btn btn-info" href="#" data-original-title="" title="">List</a>
                                  <a id="mdcn_list" class="btn btn-info" href="#" data-original-title="" title="">History</a>
                                <!--</center>-->
                                
                                <section id="no-more-tables" style="min-height:250px;">
                                  <div class="form-group" id="testlistbox">
                                    <!--<label class="control-label col-lg-4" for="patients_tests">Tests</label>-->
                                    <div class="col-lg-12">
                                      <div class="input-group">
                                        <select id="patients_tests" name="patients_tests" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                          <option value="">Select Test</option>
                                          <?php foreach($itemlist as $ilist){?>
                                          <option  value="<?php echo $ilist->item_name;?>" ><?php echo $ilist->item_name;?></option>
                                          <?php }?>
                                        </select>
                                        <span class="input-group-btn">
                                        <button id="patients_tests_add" class="btn btn-info" type="button">Add</button>
                                        </span> 
                                       </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                  </div>
                                  
                                  <div class="form-group" id="symlistbox">
                                    <label class="control-label col-lg-4" for="patients_disease_name">Symptoms</label>
                                    <div class="col-lg-8">
                                       <div class="input-group">
                                       
                                        <select class="form-control" id="patients_disease_name" name="patients_disease_name">
                                           <option value="" selected="selected">--Select--</option>
                                           <?php foreach($symptomslist as $symlist){?>
                                           <option value="<?php echo $symlist->symptoms_name;?>"><?php echo $symlist->symptoms_name;?></option>
                                           <option value="Tab">Tablet</option>
                                           <?php } ?>
                                           
                                         </select>
                                        <span class="input-group-btn">
                                         <button id="patients_disease_name_add" class="btn btn-info" type="button">Add</button>
                                         </span> </div>
                                     </div>
                                     
                                     
                                     <table id="employee_data" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                        <thead>
                                            <tr>
                                                <th data-column-id="symptoms_name">Symptoms Name</th>
                                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                     
                                     
                                  </div>
                                  
                                  <div id="mdcnboxlist" style="margin-top:30px;">
                                  	<div class="col-lg-12">
                                     <form class="form-horizontal">
                                      <div class="form-group">
                                       
                                         <div class="col-lg-12" id="prefetch">
                                          <input id="patients_medicine_generic_name" name="patients_medicine_generic_name" class="form-control typeahead22" type="text" placeholder="Medicine Name">
                                          
                                        </div>
                                       </div>
                                    </form>
                                   </div>
                                   <div class="col-lg-12">
                                     <form class="form-horizontal">
                                      <div class="form-group">
                                        
                                         <div class="col-lg-12">
                                          <select class="form-control" id="patients_dtime" name="patients_dtime">
                                             <option value="0" selected="selected">--Select Dosage--</option>
                                             <option value="1+1+1">1+1+1</option>
                                             <option value="1+1+0">1+1+0</option>
                                             <option value="1+0+1">1+0+1</option>
                                             <option value="0+1+1">0+1+1</option>
                                             <option value="1+0+0">1+0+0</option>
                                             <option value="0+1+0">0+1+0</option>
                                             <option value="0+0+1">0+0+1</option>
                                             <option value="0.5+0.5+0.5">0.5+0.5+0.5</option>
                                             <option value="0.5+0+0">0.5+0+0</option>
                                             <option value="0.5+0.5+0">0.5+0.5+0</option>
                                             <option value="0.5+0.5+0">0.5+0.5+0</option>
                                             <option value="0+0.5+0">0+0.5+0</option>
                                             
                                             <option value="Other">Other</option>
                                           </select>
                                        </div>
                                         
                                       </div>
                                    </form>
                                   </div>
                                   <div class="col-lg-12">
                                       <center>
                                        <a id="add_medicine" class="btn col-lg-4 col-lg-offset-4 btn-primary" href="#" data-original-title="" title="">Add Medicine</a>
                                      </center>
                                     </div>
                                   
                                   
                                  </div>
                                  
                                  
                                  
                                  
                                </section>
                                
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label class="control-label col-lg-12" for="patients_nexta">Next Appointment Date</label>
                                    <div class="col-lg-12">
                                       <input id="patients_nexta" name="patients_nexta" class="form-control" type="text">
                                     </div>
                                  </div>
                                  
                                  
                                   <div class="col-lg-3 col-lg-offset-3">
                                    <center>
                                       <!--<a id="add_prescription_submit" class="btn btn-primary btn-defaultg" href="#" data-original-title="" title="">Add prescription</a>-->
                                       <button type="submit" name="save_bill" class="btn btn-primary btn-defaultg"  />Add prescription</button>
                                     </center>
                                  </div>
                                   <div class="col-lg-3">
                                    <center>
                                       <a id="reset_prescription_submit" class="btn btn-primary btn-defaultg" href="#" data-original-title="" title="">Reset Prescription</a>
                                     </center>
                                  </div>
                                 </div>
                                
                              </div>
                         
                         
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- .container-fluid --> 
        </div>
        <!-- #page-content --> 
      </div>
      <?php $this->load->view('admin/includes/admin_tinyfooter');?>
    </div>
  </div>
</div>
<?php $this->load->view('admin/includes/admin_rightsidebar');?>
<!-- Load site level scripts --> 

<script type="text/javascript" language="javascript" >


$(document).ready(function(){
 var sample_data = new Bloodhound({
   datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
   queryTokenizer: Bloodhound.tokenizers.whitespace,
   prefetch:'<?php echo base_url(); ?>bill/autodata_medicine',
   remote:{
    url:'<?php echo base_url(); ?>bill/autodata_medicine/%QUERY',
    wildcard:'%QUERY'
   }
  });
  

   $('#prefetch .typeahead22').typeahead(null, {
   brand_name: 'sample_data',
   display: 'brand_name',
   source:sample_data,
   limit:10,
   templates:{
    suggestion:Handlebars.compile('<div class="row"><div class="col-md-6" style="padding-right:5px; padding-left:5px;">{{brand_name}}</div><div class="col-md-6" style="padding-right:5px; padding-left:5px;">{{generic_name}}</div></div>')
   }
  });
});

$(document).ready(function(){

$(function () {
        $('#patients_nexta').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
	
	$(function () {
        $('#patients_date').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
     
});


$(document).ready(function(){
 $("#testlistbox").hide();
 $("#symlistbox").hide();
 $("#mdcnboxlist").hide();
 
  $("#invstgsns_list").click(function(){
    $("#testlistbox").show();
	$("#symlistbox").hide();
	$("#mdcnboxlist").hide();
  });
  $("#symptom_list").click(function(){
    $("#symlistbox").show();
	$("#testlistbox").hide();
	$("#mdcnboxlist").hide();
  });
  $("#mdcn_list").click(function(){
    $("#symlistbox").hide();
	$("#testlistbox").hide();
	$("#mdcnboxlist").show();
  });
  
  var employeeTable = $('#employee_data').bootgrid({
        ajax:true,
        rowSelect: true,
        post:function()
        {
            return{
                symptoms_id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
            }
        },
        url:"<?php echo base_url(); ?>symptoms/fetch_data",
        formatters:{
            "commands":function(column, row)
            {
                return "<button type='button' class='btn btn-danger delete' data-row-id='"+row.symptoms_id+"' data-row-name='"+row.symptoms_name+"'>Add</button>";
            }
        }
    });
	
	
	
   $(document).on("loaded.rs.jquery.bootgrid", function(){
        
		var diseaseTrId = 1;
        employeeTable.find('.delete').on('click', function(event){
            
                var id = $(this).data('row-id');
				var name = $(this).data('row-name');
				
				
				var tr;
				tr += "<tr id='diseasetr_" + diseaseTrId + "'>";
	
	
				tr += "<td data-title='Disease' id='" + diseaseTrId + 1 + "'>";
				tr += name + "<input type='hidden' name='symtm[]' value='" + name + "' id='symtm[]'>";
				tr += "</td>";
	
				tr += "<td data-title='Action' id='" + diseaseTrId + 2 + "'>";
				tr += "<div id='" + diseaseTrId + "' class='btn-group disease_delete'><button class='btn btn-metis-1 btn-sm' data-placement='bottom' data-original-title='Delete Doctor' data-toggle='tooltip' ><i class='glyphicon glyphicon-trash'></i></button></div>";
				tr += "</td>";
	
				tr += "</tr>";
	
				$("#disease_table").append(tr);
				diseaseTrId++;
               
           
        });
    });
  
  
  
});

$(document).ready(function(){
$("#member_id").change(function() {     
 var select = $("#member_id option:selected").val();
 var loader='<div style="text-align: center;"><i class="fa fa-refresh fa-spin fa-4x fa-fw"></i></div>';
 $('#mbrdata').html(loader);
		
		var route="<?php echo base_url("prescription/member_dtl"); ?>";
		
			$.post(route,
			{
				mbrid:select
			},
			 function(data, status)
			{
				$("#mbrdata").html(data);
			});


 });

     
});

</script> 
<script src="<?php echo base_url();?>admin_dir/bill/bootstrap-select.min.js"></script> 
<script src="<?php echo base_url();?>admin_dir/bill/doctor.js"></script> 
<!-- End loading page level scripts--> 
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script> <!-- Datepicker --> 
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> <!-- DateTime Picker -->
</body>
</html>
