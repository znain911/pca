<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Exam Schedule | Distance Learning Programme (DLP)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Distance Learning Programme" name="description" />
        <meta content="CTHealth" name="author" />
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
                                    
                                    <div class="col-md-12">
                                        <div class="card border border-primary">
                                            <div class="card-body border-bottom py-3">
                                                <h6 class="my-0 text-info float-left">Theory</h6>
                                                <!-- <div id="countdown"></div> -->
                                                <h6 class="my-0 text-info float-right"><?php echo $sdlinfo->schedule_name;?></h6>
                                            </div>
                                            <div class="card-body">
                     
                                                <div class="media">
                                                    <div class="media-body overflow-hidden">
                                                       <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Total Question</th>
                                                                    <th>Total Marks</th>
                                                                    <th>Pass Marks</th>
                                                                    <th>Questions Attempted</th>
                                                                    <!-- <th>Correct Answer</th>
                                                                    <th>Wrong Answer</th> -->
                                                                    <th>Marks Obtained</th>
                                                                    <th>Attempt</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                         <?php foreach ($exam_thry as $examinfo) {?>
                                                                <tr>
                                                                    <td><?php echo $examinfo->no_of_question_theory;?></td>
                                                                    <td><?php echo $examinfo->total_mark_theory;?></td>
                                                                    <td><?php echo $examinfo->pass_mark_theory;?></td>
                                                                    <td><?php echo $examinfo->question_ans;?></td>
                                                                    <!-- <td><?php echo $examinfo->correct_ans;?></td>
                                                                    <td><?php echo $examinfo->wrong_ans;?></td> -->
                                                                    <td>
                                                                    	<?php echo $examinfo->geting_marks;?></td>
                                                                    <td>
                                                                        <?php echo $this->querylib->attemp_no_ece($examinfo->student_id,$examinfo->exam_id,$examinfo->id,$examinfo->qtype);
                                                                        ?>
                                                                    </td>
                                                                    <td>

                                                                      <?php 
                                                                      echo $examinfo->result;
                                                                      ?>
                                                                      
                                                                    </td>
                                                                </tr>
                                                              <?php }?>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                                    
                                                </div>

                                            </div>

                                            </div>
                                        </div>

<div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="card border border-primary">
                                            <div class="card-body border-bottom py-3">
                                                <h6 class="my-0 text-info float-left">OSCE & OSPE</h6>
                                                <!-- <div id="countdown"></div> -->
                                                <h6 class="my-0 text-info float-right"><?php echo $sdlinfo->schedule_name;?></h6>
                                            </div>
                                            <div class="card-body">
                     
                                                <div class="media">
                                                    <div class="media-body overflow-hidden">
                                                       <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Type</th>
                                                                    <th>Total Question</th>
                                                                    <th>Total Marks</th>
                                                                    <th>Questions Attempted</th>
                                                                    <!-- <th>Correct Answer</th>
                                                                    <th>Wrong Answer</th> -->
                                                                    <th>Marks Obtained</th>
                                                                    <th>Attempt</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                         <?php foreach ($exam_osce as $osce) {?>
                                                                <tr>
                                                                    <td>OSCE</td>
                                                                    <td><?php echo $osce->no_of_question_osce;?></td>
                                                                    <td><?php echo $osce->total_mark_osce;?></td>
                                                                    <td><?php echo $osce->question_ans;?></td>
                                                                    <!-- <td><?php echo $osce->correct_ans;?></td>
                                                                    <td><?php echo $osce->wrong_ans;?></td> -->
                                                                    <td>
                                                                    	<?php echo $osce->geting_marks;?></td>
                                                                    <td>
                                                                        <?php echo $this->querylib->attemp_no_ece($osce->student_id,$osce->exam_id,$osce->id,$osce->qtype);
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                   <?php /*echo $osce->result;*/ ?>
                                                                   <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick="data_view('<?php echo $osce->id; ?>')" >Details</button> -->
                                                                    </td>
                                                                </tr>
                                                              <?php }?>
                                                              <?php foreach ($exam_ospe as $ospe) {?>
                                                                <tr>
                                                                    <td>OSPE</td>
                                                                    <td><?php echo $ospe->no_of_question_ospe;?></td>
                                                                    <td><?php echo $ospe->total_mark_ospe;?></td>
                                                                    <!-- <td><?php echo $ospe->pass_mark_ospe;?></td> -->
                                                                    <td><?php echo $ospe->question_ans;?></td>
                                                                    <!-- <td><?php echo $ospe->correct_ans;?></td>
                                                                    <td><?php echo $ospe->wrong_ans;?></td> -->
                                                                    <td>
                                                                        <?php echo $ospe->geting_marks;?></td>
                                                                    <td>
                                                                        <?php echo $this->querylib->attemp_no_ece($ospe->student_id,$ospe->exam_id,$ospe->id,$ospe->qtype);
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                   <?php /*echo $ospe->result;echo $ospe->id;*/ ?>
                                                                   <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick="data_view('<?php echo $ospe->id; ?>')" >Details</button> -->
                                                                    
                                                                    </td>
                                                                </tr>
                                                              <?php }?>
                                                              <?php 
                                                                $ttmark = 0; 
                                                                foreach ($exam_osce_ospe as $cepe) {
                                                                    $ttmark = $ttmark + $cepe->geting_marks;
                                                                } ?>
                                                              <tr style="font-size: 18px; border-top:2px #000 solid; ">
                                                                    <!-- <td></td>
                                                                    <td></td> -->
                                                                    <td colspan="2">Pass Marks: <?php echo $sdlinfo->pass_mark_osce_ospe;?></td>
                                                                    <td colspan="2">Total Marks Obtained</td>
                                                                    <td><?php echo $ttmark;?></td>
                                                                    <td></td>
                                                                    <td><?php if($ttmark < $sdlinfo->pass_mark_osce_ospe){
                                                                        echo '<p class="text-danger">Fail</p>';
                                                                      }else{
                                                                        echo '<p class="text-success">Passed</p>';
                                                                      }?></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                                    
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Result Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="qsndata">
        
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>
       

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>

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
