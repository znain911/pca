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
	z-index:0;
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
	z-index:0;
}
.box.inverse header {
	background-image: -webkit-linear-gradient(top, #333333 0%, #222222 100%);
	background-image: linear-gradient(to bottom, #333333 0%, #222222 100%);
	background-repeat: repeat-x;
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff333333', endColorstr='#ff222222', GradientType=0);
	border-bottom: 1px solid #4d4d4d;
	color: #f5f5f5;
	z-index:0;
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
                   <div class="col-lg-12"> 
                    
                    <!-- Start Add prescriptionn -->
                    <div style="border: 1px solid #ccc;" class="content-box margin1">
                       <div class="row margin1">
                        <div class="col-lg-12">
                           <div class="col-md-4">
                            <form class="form-horizontal">
                               <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_pid">Member ID</label>
                                <div class="col-lg-8">
                                   <input id="patients_pid" name="patients_pid" class="form-control" type="text" value="<?php echo $get_details->member_id;?>" readonly>
                                   
                                 </div>
                              </div>
                               <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_name">Name</label>
                                <div class="col-lg-8">
                                   <input id="patients_name" name="patients_name" class="form-control" value="<?php echo $get_details->member_name;?>" type="text" readonly>
                                 </div>
                              </div>
                               <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_mobile">Mobile</label>
                                <div class="col-lg-8">
                                   <input id="patients_name" name="patients_name" class="form-control" value="<?php echo $get_details->contact_no;?>" type="text" readonly>
                                 </div>
                              </div>
                             </form>
                          </div>
                           <div class="col-md-4">
                            <form class="form-horizontal">
                               <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_age">Age</label>
                                <div class="col-lg-8">
                                   <input id="patients_age" name="patients_age" class="form-control" value="<?php echo $get_details->age;?>" type="text" readonly>
                                 </div>
                              </div>
                               <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_gender">Gender</label>
                                <div class="col-lg-8">
                                   <input id="patients_gender" name="patients_gender" class="form-control" value="<?php echo $get_details->gender;?>" type="text" readonly>
                                 </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_pid">Doctor</label>
                                <div class="col-lg-8">
                                   <input id="patients_gender" name="patients_gender" class="form-control" value="<?php echo $get_details->doctor_name;?>" type="text" readonly>
                                 </div>
                              </div>
                              
                             </form>
                          </div>
                           <div class="col-md-4">
                            <form class="form-horizontal">
                               <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_date">Prescription Date</label>
                                <div class="col-lg-8">
                                   <input id="patients_date" name="patients_date" class="form-control" type="text" value="<?php echo $get_details->prescription_date;?>" type="text" readonly>
                                 </div>
                              </div>
                              
                               <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_pid">Hospital</label>
                                <div class="col-lg-8">
                                   <input id="patients_date" name="patients_date" class="form-control" type="text" value="<?php echo $get_details->hospital_name;?>" type="text" readonly>
                                 </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-lg-4" for="patients_pid">Consultaion site</label>
                                <div class="col-lg-8">
                                   <input id="patients_date" name="patients_date" class="form-control" type="text" value="<?php echo $get_details->consultaion_site;?>" type="text" readonly>
                                 </div>
                              </div>
                             </form>
                          </div>
                         </div>
                      </div>
                     </div>
                    <!-- Close Add Prescription -->
                    
                    <div style="border: 1px solid #ccc;" class="content-box margin1">
                       <div class="row margin1">
                        <div class="col-lg-12">
                           <div class="col-md-4">
                             <div class="list-group">
                              <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">Chief Complain</h4>
                                <?php foreach($get_symptoms as $pslist){?>
                                <p class="list-group-item-text"><?php echo $pslist->symtom_name;?></p>
                                <?php }?>
                              </a>
                              <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">Investigations</h4>
                                <?php foreach($get_test as $ptlist){?>
                                <p class="list-group-item-text"><?php echo $ptlist->test_name;?></p>
                                <?php }?>
                              </a>
                              <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">Advices</h4>
                                <p class="list-group-item-text"><?php echo $get_details->advice;?></p>
                              </a>
                              <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">Next Appointment Date</h4>
                                <p class="list-group-item-text"><?php echo $get_details->next_appointment_date;?></p>
                              </a>
                            </div> 
                          </div>
                           <div class="col-md-8">
                             <h3>Medicine</h3>
                             <table class="table table-striped responsive-table">
                                       <thead>
                                        <tr>
                                          
                                           <th>Medicine Name</th>
                                           <th>Dose</th>
                                           
                                         </tr>
                                      </thead>
                                       <tbody>
                                       <?php foreach($get_mdcn as $pmlist){?>
                                       <tr>
                                          <td><?php echo $pmlist->mdcn_name;?></td>
                                          <td><?php echo $pmlist->dosage;?></td>
                                       </tr>
                                       <?php }?>
                                      </tbody>
                                     </table>
                             
                              
                          </div>
                           
                           
                           
                           <div class="col-lg-8">
                            <div class="col-lg-12">
                               <div class="col-lg-3 col-lg-offset-3">
                                <center>
                                   <a id="add_prescription_submit" class="btn btn-primary btn-defaultg" href="#" data-original-title="" title="">Print</a>
                                 </center>
                              </div>
                               <div class="col-lg-3">
                                <center>
                                   <a id="reset_prescription_submit" class="btn btn-primary btn-defaultg" href="<?php echo base_url('prescription/pdfdetails'.'/'.$pid); ?>" data-original-title="" title="">Save as PDF</a>
                                 </center>
                              </div>
                             </div>
                          </div>
                         </div>
                      </div>
                     </div>
                  </div>
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
            format: 'yyyy-mm-dd'
        });
    });
	
	$(function () {
        $('#patients_date').datepicker({
            format: 'yyyy-mm-dd'
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
