<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Exam Schedule | Distance Learning Programme (DLP)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
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
                                    <h4 class="mb-0">Exam History</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Distance Learning Programme (DLP)</a></li>
                                            <li class="breadcrumb-item active">Exam History</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <?php foreach ($exam_list as $exm) {?>
                                    <div class="col-md-4">
                                        <div class="card border border-primary">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body overflow-hidden">
                                                        <p class="text-truncate font-size-14 mb-2"><?php 
                                                        if ($exm->tma == 3) {
                                                            echo 'ECE';
                                                        }else{
                                                         echo 'TMA '.$exm->tma; 
                                                        }

                                                        ?></p>
                                                        <h5 class="mb-1"><?php echo $exm->schedule_name; ?></h5>
                                                        <p class="card-text float-left">Attend Date: <br><?php echo date("d-M-Y",strtotime($exm->exam_attend_date)); ?></p>
                                                        <!-- <p class="card-text float-right">
                                                            <?php echo $this->querylib->attemp_no_history($exm->student_id,$exm->exam_id,$exm->id);
                                                                        ?>
                                                        </p> -->
                                                    </div>
                                                    <div class="text-primary">
                                                        <i class="ri-clipboard-line font-size-24"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body border-top py-3">
                                            <?php if ($exm->tma == 3) {
$stid = $metadata['id'];
$eid = $exm->schedule_id;
$thry = 1;
$sc = 2;
$sp = 3;
$examdatathry = $this->students_m->getExambyScheduleEce($stid,$eid,$thry);
$examdatasc = $this->students_m->getExambyScheduleEce($stid,$eid,$sc);
$examdatasp = $this->students_m->getExambyScheduleEce($stid,$eid,$sp);
if (!empty($examdatathry) && !empty($examdatasc) && !empty($examdatasp)){?>
    <a href="<?php echo base_url('students/examresult/').$exm->exam_id; ?>" class="btn btn-primary waves-effect waves-light">View Result</a>
<?php }else{
    echo 'Please complete all part of this exam';
} 
}else{?>
<a href="<?php echo base_url('students/examresult/').$exm->exam_id; ?>" class="btn btn-primary waves-effect waves-light">View Result</a>

<?php } ?>

                                    </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    
                                    
                                </div>
                                <!-- end row -->
                                
                                
                            </div>

                            
                        </div>
                        <!-- end row -->


                        
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

        <script src="<?php echo base_url();?>assets/js/pages/dashboard.init.js"></script>

        <!-- <script src="<?php echo base_url();?>assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/pages/form-validation.init.js"></script> -->

        <script src="<?php echo base_url();?>assets/js/app.js"></script>

    </body>
</html>
