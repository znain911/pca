<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Notice | Distance Learning Programme (DLP)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="CT Health Ltd" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

       <!-- jquery.vectormap css -->
        <link href="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url();?>assets/css/app.css" id="app-style" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>

    </head>

    <body data-topbar="light" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?php $this->load->view('includes/topbarstudent');?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Exam Notice</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Exam Notice</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row justify-content-center">
                            <div class="col-xl-7">
                                <h2>Instructions<?php //echo $examinfo->schedule_name;?></h2>
                                <p><?php /*echo $examinfo->exam_notice;*/?></p>
                               <p class="justify-content-center">
                                <?php if ($examinfo->tma == 3) {?>
                                    <?php
                                    /*if(empty($eceexamstatus)){
                                        $theorybtn = 'enable';
                                        $oscebtn = 'disabled';
                                        $ospebtn = 'disabled';
                                    }else{
                                        if($eceexamstatus->qtype == 1){
                                            $theorybtn = 'disabled';
                                            $oscebtn = 'enable';
                                            $ospebtn = 'disabled';
                                        }elseif($eceexamstatus->qtype == 2){
                                            $theorybtn = 'disabled';
                                            $oscebtn = 'disabled';
                                            $ospebtn = 'enable';
                                        }else{
                                            $theorybtn = 'enable';
                                            $oscebtn = 'disabled';
                                            $ospebtn = 'disabled';
                                        }
                                    }*/
                                    $stid = $metadata['id'];
                                    $eid = $examinfo->schedule_id;
                                    $thry = 1;
                                    $sc = 2;
                                    $sp = 3;
                                    $examdatathry = $this->students_m->getExambyScheduleEce($stid,$eid,$thry);
                                     if (empty($examdatathry)) {?>

                                    
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalThry">
                                      Start Exam (Theory)
                                    </button>
                                    <?php }else{ ?>
<a href="javascript:void(0)" class="btn btn-warning waves-effect waves-light">Attended</a>
                                    <?php    $passedst = $this->students_m->getPassedExamEce($stid,$eid,$thry);

                                        if (empty($passedst)) {?>
                                        <!-- <a href="<?php echo base_url('students/makeexamece/').$examinfo->schedule_id;?>/1" class="btn btn-warning waves-effect waves-light" >Start Retake (Theory)</a> -->
                                        <?php }else{?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-warning waves-effect waves-light">Already Passed</a> -->


                                    <?php } ?> 
                                <?php } ?>

                                    <?php $examdatasc = $this->students_m->getExambyScheduleEce($stid,$eid,$sc);
                                     if (empty($examdatasc)) {?>
                                    <!-- <a href="<?php echo base_url('students/makeexamece/').$examinfo->schedule_id;?>/2" class="btn btn-info waves-effect waves-light" >Start Exam (OSCE)</a> -->
                                   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                      Start Exam (OSCE)
                                    </button>

                                    <?php }else{?>
                                        <a href="javascript:void(0)" class="btn btn-info waves-effect waves-light">Attended</a>


                                      <?php  $passedstsc = $this->students_m->getPassedExamEce($stid,$eid,$sc);

                                        if (empty($passedstsc)) {?>
                                        <!-- <a href="<?php echo base_url('students/makeexamece/').$examinfo->schedule_id;?>/2" class="btn btn-info waves-effect waves-light" >Start Retake (OSCE)</a> -->
                                        <?php }else{?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-info waves-effect waves-light">Already Passed</a> -->
                                      <?php } ?>  
                                    <?php } ?>

                                    <?php $examdatasp = $this->students_m->getExambyScheduleEce($stid,$eid,$sp);
                                     if (empty($examdatasp)) {?>
                                    
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalOspe">
                                      Start Exam (OSPE)
                                    </button>
                                    <?php }else{?>

                                        <a href="javascript:void(0)" class="btn btn-success waves-effect waves-light">Attended</a>
                                    <?php $passedstsp = $this->students_m->getPassedExamEce($stid,$eid,$sp);

                                        if (empty($passedstsp)) {?>
                                        <!-- <a href="<?php echo base_url('students/makeexamece/').$examinfo->schedule_id;?>/3" class="btn btn-success waves-effect waves-light" >Start Retake (OSPE)</a> -->
                                        <?php }else{?>
                                        <!-- <a href="javascript:void(0)" class="btn btn-success waves-effect waves-light">Already Passed</a> -->
                                       <?php } ?> 
                                    <?php } ?>
                                    <div class="clearfix"></div>
                                    <?php if (!empty($examdatathry) && !empty($examdatasc) && !empty($examdatasp)){?>
                                        <a style="width: 200px;" href="<?php echo base_url('students/examresult/').$examinfo->schedule_id; ?>" class="btn btn-lg btn-danger waves-effect waves-light">View Result</a>
                                    <?php } ?>


                                <?php }else{?>
                                    <p><?php echo $examinfo->exam_notice;?></p>

                                    <?php $pcaexam = $this->students_m->getExambySchedule($metadata['id'],$eid);
                                    if (empty($pcaexam)) {?>
                                        <!--<a href="<?php echo base_url('students/makeexampca/').$examinfo->schedule_id;?>" class="btn btn-warning waves-effect waves-light" >Start Exam</a>-->
										<a data-toggle="modal" data-target="#webcamnotice" class="btn btn-warning waves-effect waves-light" >Start Exam</a>
										<!--<a data-toggle="modal"  id="skip" class="btn btn-warning waves-effect waves-light" >Start Exam</a>-->
                                    <?php } else{ ?>
                                    <?php $passedstsp2 = $this->students_m->getPassedExam($metadata['id'],$eid);

                                        if (empty($passedstsp2)) {
                                        $examcount = count($this->students_m->getExamStd($metadata['id'],$eid));
                                            if ($examcount >= 3) {
                                                echo '<a href="javascript:void(0)" class="btn btn-success waves-effect waves-light">You Have finish 3 time chances</a>';
                                            }else{
                                        ?>

                                        <!--<a href="<?php echo base_url('students/makeexampca/').$examinfo->schedule_id;?>/3" class="btn btn-success waves-effect waves-light" >Start Retake <?php echo $examcount;?>/3</a>-->
										<a data-toggle="modal" data-target="#webcamnotice" class="btn btn-success waves-effect waves-light" >Start Retake <?php echo $examcount;?>/3 </a> 
										<!--<a data-toggle="modal" id="skip"  class="btn btn-success waves-effect waves-light" >Start Retake <?php echo $examcount;?>/3</a>-->
                                        <?php } }else{?>
                                        <a href="javascript:void(0)" class="btn btn-success waves-effect waves-light">Already Passed</a>
                                       <?php } ?>

                                    
                                <?php } }?>


                                    
                                </p>
                            </div>
                        </div>
                        <!-- end row -->
<div class="modal fade" id="webcamnotice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Webcam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <h6>To proceed to exam you will have to allow camera</h6>
<!--        <h6>"If your device does not camera then please select Skip" Button should say Skip</h6>-->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="cameraon">I will allow</button>
        <!-- <a href="<?php echo base_url('students/makeexampca/').$examinfo->schedule_id;?>" class="btn btn-warning waves-effect waves-light" id="skip" >Skip</a> -->

<!--        <button type="button" class="btn btn-warning waves-effect waves-light" id="skip" >Skip</button> -->
      </div>
    </div>
  </div>
</div> 
<div class="modal fade" id="exampleModalThry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Instructions Theory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <p><?php echo $examinfo->exam_notice;?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url('students/makeexamece/').$examinfo->schedule_id;?>/1" class="btn btn-warning waves-effect waves-light" >Start Exam (Theory)</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Instructions OSCE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <p><?php echo $examinfo->exam_notice_osce;?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url('students/makeexamece/').$examinfo->schedule_id;?>/2" class="btn btn-info waves-effect waves-light" >Start Exam (OSCE)</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalOspe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Instructions OSPE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <p><?php echo $examinfo->exam_notice_ospe;?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url('students/makeexamece/').$examinfo->schedule_id;?>/3" class="btn btn-success waves-effect waves-light" >Start Exam (OSPE)</a>
      </div>
    </div>
  </div>
</div>
                        
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php $this->load->view('includes/footer');?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
<script type="text/javascript">
        $(function(e) {
            $('#example').DataTable(
                {lengthMenu:[5,10,25,50,100],pageLength:10,language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}}
                );
        } );
		
		$(document).ready(function(){
            $("#skip").click(function(){
            var camevalue = 0;
            var sdlid = <?php echo $examinfo->schedule_id; ?>;
            var stid = <?php echo $metadata['id'];?>;
                    jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url('students/savedata_cam'); ?>",
                    dataType: 'html',
                    data: {camevalue: camevalue, sdlid: sdlid,stid:stid},
                    success: function(res) 
                    {
                        /*alert('data saved');*/ 
                        window.location.href = '<?php echo base_url('students/makeexampca/').$examinfo->schedule_id;?>';
                    },
                    error:function()
                    {
                        alert('data not saved');    
                    }
                    });                

            });






            $("#cameraon").click(function(){
            var camevalue = 1;
            var scheduleId = <?php echo $examinfo->schedule_id; ?>;
            var studentId = <?php echo $metadata['id'];?>;


                window.location.href = '<?php echo base_url('students/makeexampca/').$examinfo->schedule_id;?>';



                    //jQuery.ajax({
                    //type: "POST",
                    //url: "<?php //echo base_url('students/savedata_cam'); ?>//",
                    //dataType: 'html',
                    //data: {camevalue: camevalue, sdlid: sdlid,stid:stid},
                    //success: function(res)
                    //{
                    //    /*alert('data saved');*/
                    //    window.location.href = '<?php //echo base_url('students/cameraoption/').$examinfo->schedule_id;?>//';
                    //},
                    //error:function()
                    //{
                    //    alert('data not saved');
                    //}
                    //});

            });
        });
          
       </script>
       

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="<?php echo base_url();?>assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>


        <script src="<?php echo base_url();?>assets/js/app.js"></script>

    </body>
</html>
