<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/includes/admin_header');?>
<!--BEGIN Style-->
 <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" /> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
 <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
 <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
 <style>
 .margin1 {
    margin: 10px;
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
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-3 control-label">Member ID</label>
							<div class="col-sm-7" id="prefetch">
								<input type="text" id="member_id" name="member_id" class="form-control typeahead22" placeholder="Member ID">
							</div>
							<br><br>
							<div class="row" id="mbrdata">
								<div class="col-sm-6"><h5>Name:</h5></div>
								<div class="col-sm-6"><h5>Age:</h5></div>
								<div class="col-sm-6"><h5>Mobile:</h5></div>
								<div class="col-sm-6"><h5>Available Balance:</h5></div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-3 control-label">Hospital Name</label>
								<div class="col-sm-7" >	
									<select id="hospital_name" name="hospital_name" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
										<option value="">--</option>
										<?php foreach($hospitallist as $hlist){?>
										<option value="<?php echo $hlist->hospital_name;?>" ><?php echo $hlist->hospital_name;?></option>
										<?php }?>
										
									</select>
									<span class="form-error" id="error-hospital_name"></span>										
								</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="col-sm-3 control-label">Date</label>
								<div class="col-sm-7" >	
									<input type="text" id="billing_date" name="billing_date" class="form-control" value="" placeholder="Prescription Date">	
									<span class="form-error" id="error-billing_date"></span>									
								</div>
							</div>
					</div>
				   </div>
				   
				   
				   <div style="border: 1px solid #ccc;" class="content-box margin1">
                                                            <div class="row margin1">
                                                                <div class="col-lg-12">

                                                                    <div class="col-md-4">
                                                                        <form class="form-horizontal">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_name">Name</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_name" name="patients_name" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_mobile">Mobile</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_mobile" name="patients_mobile" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <form class="form-horizontal">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_age">Age</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_age" name="patients_age" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_gender">Gender</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_gender" name="patients_gender" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <form class="form-horizontal">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_date">Date</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_date" name="patients_date" class="form-control" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_pid">Patient's ID</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_pid" name="patients_pid" class="form-control" type="text" readonly="">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>  
                                                        </div>


						<div style="border: 1px solid #ccc;" class="content-box margin1">
                                                            <div class="row margin1">
                                                                <div class="col-lg-12">

                                                                    <div class="col-md-4">
                                                                        <form class="form-horizontal">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_height">Height</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_height" name="patients_height" class="form-control" placeholder="e.g 5.6 inc" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_weight">Weight</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_weight" name="patients_weight" class="form-control" placeholder="e.g 50 kg/other" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_bp">B. Pressure</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_bp" name="patients_bp" class="form-control" type="text" placeholder="e.g 80-120">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_pte">Problem To Eat</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_pte" name="patients_pte" class="form-control" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_nexta">Next Appointment</label>
                                                                                <div class="col-lg-8">
                                                                                    <input id="patients_nexta" name="patients_nexta" class="form-control" type="text">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_disease_name">Disease Name</label>
                                                                                <div class="col-lg-8">
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="patients_disease_name" name="patients_disease_name" class="form-control">
                                                                                        <span class="input-group-btn">
                                                                                            <button id="patients_disease_name_add" class="btn btn-info" type="button">Add</button>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="control-label col-lg-4" for="patients_tests">Tests</label>
                                                                                <div class="col-lg-8">
                                                                                    <div class="input-group">
                                                                                        <input id="patients_tests" name="patients_tests" type="text" class="form-control">
                                                                                        <span class="input-group-btn">
                                                                                            <button id="patients_tests_add" class="btn btn-info" type="button">Add</button>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="box">
                                                                                <header>
                                                                                    <div class="icons">
                                                                                        <i class="fa fa-table"></i>
                                                                                    </div>
                                                                                    <h5>Disease</h5>
                                                                                    <div class="toolbar">
                                                                                        <div class="btn-group">
                                                                                            <a href="#stripedTable1" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                                                                                                <i class="fa fa-angle-up"></i>
                                                                                            </a> 
                                                                                        </div>
                                                                                    </div>
                                                                                </header>
                                                                                <section id="no-more-tables">
                                                                                    <div id="stripedTable1" class="body collapse in">
                                                                                        <table class="table table-striped responsive-table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Disease</th>
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="disease_table">

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </section>
                                                                            </div>

                                                                            <div class="box">
                                                                                <header>
                                                                                    <div class="icons">
                                                                                        <i class="fa fa-table"></i>
                                                                                    </div>
                                                                                    <h5>Tests</h5>
                                                                                    <div class="toolbar">
                                                                                        <div class="btn-group">
                                                                                            <a href="#stripedTable2" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                                                                                                <i class="fa fa-angle-up"></i>
                                                                                            </a> 
                                                                                        </div>
                                                                                    </div>
                                                                                </header>
                                                                                <section id="no-more-tables">
                                                                                    <div id="stripedTable2" class="body collapse in">
                                                                                        <table class="table table-striped responsive-table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Tests</th>
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="tests_table">

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </section>
                                                                            </div>

                                                                        </form>
                                                                    </div>

                                                                    <div class="col-md-8">
                                                                        <div class="col-lg-12">
                                                                            <form class="form-horizontal">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-lg-2" for="patients_medicine">Medicine</label>
                                                                                    <div class="col-lg-5">
                                                                                        <input id="patients_medicine_category" name="patients_medicine_category" class="form-control" type="text" placeholder="Category">
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <input id="patients_medicine_generic_name" name="patients_medicine_generic_name" class="form-control" type="text" placeholder="Medicine Name">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-8">
                                                                        <div class="col-lg-12">
                                                                            <form class="form-horizontal">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-lg-2" for="patients_dose">Dose</label>
                                                                                    <div class="col-lg-3">
                                                                                        <select class="form-control" id="patients_dtime" name="patients_dtime">
                                                                                            <option value="0">--Select--</option>
                                                                                            <option value="1+1+1">1+1+1</option>
                                                                                            <option value="1+1+0">1+1+0</option>
                                                                                            <option value="1+0+1">1+0+1</option>
                                                                                            <option value="0+1+1">0+1+1</option>
                                                                                            <option value="1+0+0">1+0+0</option>
                                                                                            <option value="0+1+0">0+1+0</option>
                                                                                            <option value="0+0+1">0+0+1</option>
                                                                                            <option value="Other">Other</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-lg-3">
                                                                                        <select class="form-control" id="patients_dlevel" name="patients_dlevel">
                                                                                            <option value="0">--Select--</option>
                                                                                            <option value="Before">Before</option>
                                                                                            <option value="After">After</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-lg-4">
                                                                                        <input id="patients_dmunite" name="patients_dmunite" class="form-control" type="text" placeholder="Minutes">
                                                                                    </div>

                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-8">

                                                                        <div class="col-lg-12">
                                                                            <center><a id="add_medicine" class="btn col-lg-4 col-lg-offset-4 btn-primary" href="#" data-original-title="" title="">Add Medicine</a></center>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-8">
                                                                        <div class="col-lg-12">

                                                                            <div class="box">
                                                                                <header>
                                                                                    <div class="icons">
                                                                                        <i class="fa fa-table"></i>
                                                                                    </div>
                                                                                    <h5>Medicine</h5>
                                                                                    <div class="toolbar">
                                                                                        <div class="btn-group">
                                                                                            <a href="#stripedTable3" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                                                                                                <i class="fa fa-angle-up"></i>
                                                                                            </a> 
                                                                                        </div>
                                                                                    </div>
                                                                                </header>
                                                                                <section id="no-more-tables">
                                                                                    <div id="stripedTable3" class="body collapse in">
                                                                                        <table class="table table-striped responsive-table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>#</th>
                                                                                                    <th>Medicine Name</th>
                                                                                                    <th>Dose</th>
                                                                                                    <th>Note</th>
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="medicne_table">

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </section>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-8">
                                                                        <div class="col-lg-12">

                                                                            <div class="col-lg-3 col-lg-offset-3">
                                                                                <center><a id="add_prescription_submit" class="btn btn-primary btn-defaultg" href="#" data-original-title="" title="">Add prescription</a></center>
                                                                            </div>

                                                                            <div class="col-lg-3">
                                                                                <center><a id="reset_prescription_submit" class="btn btn-primary btn-defaultg" href="#" data-original-title="" title="">Reset Prescription</a></center>
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
   prefetch:'<?php echo base_url(); ?>prescription/autodata_member',
   remote:{
    url:'<?php echo base_url(); ?>prescription/autodata_member/%QUERY',
    wildcard:'%QUERY'
   }
  });
  

  $('#prefetch .typeahead22').typeahead(null, {
   employee_id: 'sample_data',
   display: 'employee_id',
   source:sample_data,
   limit:10,
   templates:{
    suggestion:Handlebars.compile('<div class="row rdata"><div class="col-md-3 rdata2" style="padding-right:5px; padding-left:5px;">{{employee_id}}</div><div class="col-md-9" style="padding-right:5px; padding-left:5px;">{{member_name}}</div></div>')
   }
  });
});

$(document).ready(function(){
  

$('.typeahead22').change(function(){
	//var result = $(this).val()
    var member_id = $(this).val()
	$.ajax({
                url:"<?php echo base_url(); ?>prescription/member_data",
                method:"POST",
                data:{member_id:member_id},
                dataType:"json",
                success:function(data)
                {
                    
                    $('#member_name').val(data.member_name);
					alert('hi bob, you typed: '+ data.member_name);
                    
                }
            });
	
	
	
	
    //call your function here
    alert('hi bob, you typed: '+ member_id);
});	
function bob(result) {
    alert('hi bob, you typed: '+ result);
} 



$("#option_type").change(function() {
     
 var select = $("#option_type option:selected").val();
 if(select != 0){
 var html_content = '';

     $.ajax({

            type: "POST",

            url: "<?php echo base_url('a_product/get_optionbycat')?>",

            data: {
                option_type: select
            },

            dataType: "json",

            success: function (data) {

					console.log(data);

					html_content += '<option value="">Select a Option</option>';

						$.each(data, function (key,value) {							

							html_content += '<option value="'+value['option_id']+'" >'+value['option_head']+'</option>';							

						});
				$("#option_id").html(html_content);
            }

        });

  }else{	 

	html_content = '<option value="0" >Select Option</option>';							

	$("#option_id").html(html_content);

  }

 });






     
});


</script>

<!-- End loading page level scripts-->
</body>
</html>

