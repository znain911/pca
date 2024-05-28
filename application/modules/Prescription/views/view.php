<!DOCTYPE html>
<html lang="en">
 <head>
 <?php $this->load->view('admin/includes/admin_header');?>
 <!--BEGIN Style-->

 
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
    <div class="col-md-12">
        <div class="panel panel-transparent">
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-primary" style="font-weight: normal;">
                            <?php echo $get_details->doctor_name;?>
                            <small style="display: block;"><?php echo $get_details->doctor_category;?></small>
                        </h4>                        
                    </div>
                    <div class="pull-right">

                        <address class="mt-md mb-md text-right">
                            <strong>UHCP</strong><br>
                            Hospital: <?php echo $get_details->hospital_name;?><br>
                            Consultaion site: <?php echo $get_details->consultaion_site;?><br>
                            Prescription Date: <?php echo date("d-M-Y", strtotime($get_details->prescription_date)); ?>
                        </address>
                    </div>
                </div>
                <hr>
                <div class="row mb-xl">
                    <div class="col-md-12">
                        <div class="pull-left">                            
                            <h3><?php echo $get_details->member_name;?></h3>
							<ul class="text-left list-unstyled">
                                <li><strong>Member Id:</strong> <?php echo $get_details->member_id;?></li>
                                <li><strong>Mobile:</strong> <?php echo $get_details->contact_no;?></li>
                                <li><strong>Age:</strong> <?php echo $get_details->age;?></li>
                            </ul>
							
                        </div>
                        <div class="pull-right">
                            
                            <ul class="text-left list-unstyled" style="margin-top: 20px;">
                                <li><strong>Factory:</strong> <?php echo $get_memberdetail->organization_name;?></li>
                                <li><strong>Department:</strong>  <?php echo $get_memberdetail->department;?></li>
                                <li><strong>Designation:</strong>  <?php echo $get_memberdetail->designation;?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <!-- <div class="col-sm-5 col-md-5 col-lg-5">
                    	<p class="text-left"><strong>Chief Complain</strong><br>
                    		<?php foreach($get_symptoms as $pslist){?>
                                <?php echo $pslist->symtom_name;?><br>
                            <?php }?></p>
						<hr>
                        <p class="text-left"><strong>Investigations</strong><br>
                    		<?php foreach($get_test as $ptlist){?>
                                <?php echo $ptlist->test_name;?><br>
                            <?php }?></p>
						<hr>
                        <p class="text-left"><strong>Advices</strong><br>
                    		<?php echo $get_details->advice;?></p>
						<hr>
                        <p class="text-left"><strong>Next Appointment Date</strong><br>
                    		<?php echo $get_details->next_appointment_date;?></p>
                    </div> -->
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="panel" style="border: none;">
                        	

                            <div class="panel-body no-padding">
                            	<div class="col-sm-4 col-md-4 col-lg-4">
			                    	<p class="text-left"><strong>Chief Complain</strong><br>
			                    		<?php foreach($get_symptoms as $pslist){?>
			                                <?php echo $pslist->symtom_name;?><br>
			                            <?php }?></p>
									<hr>
			                        <p class="text-left"><strong>Investigations</strong><br>
			                    		<?php foreach($get_test as $ptlist){?>
			                                <?php echo $ptlist->test_name;?><br>
			                            <?php }?></p>
									<hr>
			                        <p class="text-left"><strong>Advices</strong><br>
			                    		<?php echo $get_details->advice;?></p>
									<hr>
			                        <p class="text-left"><strong>Next Appointment Date</strong><br>
			                    		<?php echo $get_details->next_appointment_date;?></p>
			                    	<hr>
			                        <p class="text-left"><strong>Refer To Hospital</strong><br>
			                    		<?php 
			                    			if(empty($get_details->referral_doctor)){
			                    				echo 'None';
			                    			}else{
			                    				echo $get_details->referral_doctor;
			                    			}
			                    		?></p>
			                    </div>

                            	<div class="col-sm-8 col-md-8 col-lg-8">
                            	<div class="pull-left">
			                        <h1 class="text-primary" style="font-weight: normal;">
			                            R<small>X</small>
			                        </h1>                        
			                    </div>
			                    <div class="clearfix"></div>
                                <div class="table-responsive">
                                    <table class="table table-hover m-n">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Madicine</th>
												<th>Dosage</th>                                                
                                                <th>Number of Days</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($get_mdcn as $pmlist){?>
											<tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $pmlist->mdcn_name;?></td>
                                                <td><?php echo $pmlist->dosage;?></td>
                                                <td><?php echo $pmlist->numberof_days;?></td>                                                
                                            </tr>
                                            <?php $i++; }?>
                                        </tbody>
                                    </table>


                                </div>
                                <div class="pull-right">
		                            <h5 style="border-top: 1px solid #000; padding: 5px 10px; margin-top: 60px;">Signature</h5>
		                        </div>
                            </div>
                                

                            </div>
                        </div>
                    </div>
                   
                </div>

            </div>


        </div>
        <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <a href="javascript:window.print()" class="btn btn-inverse"><i class="fa fa-print"></i> Print</a>
                            <a href="#" class="btn btn-primary">Save as PDF</a>
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

</body>
</html>
