<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Exam | Distance Learning Programme (DLP)</title>
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
        <script src="<?php echo base_url();?>assets/js/html2canvas.js"></script>


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
                                    <h4 class="mb-0">Exam Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('students/examhistory');?>">Exam</a></li>

                                            <li class="breadcrumb-item active">Exam Report</li>
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
                                                <h6 class="my-0 text-info float-left">Exam Name: <?php echo $examinfo->schedule_name;?></h6>
                                                <!-- <div id="countdown"></div> -->
                                                <h6 class="my-0 text-info float-right">Total Marks: <?php echo $examinfo->total_mark;?></h6>
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
                                                                    <th>Correct Answer</th>
                                                                    <th>Wrong Answer</th>
                                                                    <th>Marks Obtained</th>
                                                                    <th>Attempt</th>
                                                                    <th>Status</th>                                                      
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $examinfo->no_of_question;?></td>
                                                                    <td><?php echo $examinfo->total_mark;?></td>
                                                                    <td><?php echo $examinfo->pass_mark;?></td>
                                                                    
                                                                    
                                                                    <td><?php echo $examinfo->question_ans;?></td>
                                                                    <td><?php echo $examinfo->correct_ans;?></td>
                                                                    <td><?php echo $examinfo->wrong_ans;?></td>
                                                                    <td><?php //echo count($examanswer);?><?php echo $examinfo->geting_marks;?></td>
                                                                    <td>
                                                                        <?php echo $this->querylib->attemp_no($examinfo->student_id,$examinfo->exam_id,$examinfo->id);
                                                                        ?>
                                                                    </td>
                                                                    <td>

                                                                      <?php 
                                                                      $gmark = $examinfo->geting_marks;
                                                                      $tmark = $examinfo->total_mark;

                                                                      $per = round(is_numeric($gmark) / (is_numeric($tmark) / 100),2);
                                                                      
                                                                      if($gmark < $examinfo->pass_mark){
                                                                        echo 'Fail';
                                                                      }else{
                                                                        echo 'Passed';
                                                                      }
                                                                      ?>
                                                                      
                                                                    </td>
                                                                </tr>
                                                              
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Certificate
  </button> -->

<a href="<?php echo base_url('students');?>" class="btn btn-primary" >
    Back to Dashboard
  </a>






                                            
                                                    </div>
                                                </div>
                                                    
                                                </div>




                                            </div>

                                            <div class="card-body border-top py-3">
                                                <!-- <a href="#" class="btn btn-primary waves-effect waves-light">Start Exam</a> -->
                                                
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                      

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php $this->load->view('includes/footer');?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

 <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Certificate</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div style="width:700px; height:580px; padding:20px; text-align:center; border: 10px solid #787878; margin: 0px auto;" id="patientdata">
        <div style="width:650px; height:530px; padding:20px; text-align:center; border: 5px solid #787878">
               <span style="font-size:40px; font-weight:bold">Certificate of Completion</span>
               <br>
               <span style="font-size:22px"><i>This is to certify that</i></span>
               <br><br>
               <span style="font-size:30px"><b><?php echo $metadata['display_name'];?></b></span><br/><br/>
               <span style="font-size:22px"><i>has completed the course</i></span> <br/><br/>
               <span style="font-size:25px"> <?php echo $examinfo->schedule_name;?></span> <br/><br/>
               <span style="font-size:20px">with score of <b><?php echo $per.'%';?></b></span> <br/>
               <span style="font-size:22px"> <?php if($gmark < $examinfo->pass_mark){
                                                                                echo 'Fail';
                                                                              }else{
                                                                                echo 'Passed';
                                                                              }?></span> <br/><br/>
               <span style="font-size:22px"><i>Date</i></span><br>
               
              <span style="font-size:25px"><?php echo date("d-M-Y",strtotime($examinfo->exam_attend_date));?></span>
        </div>
</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="download" onclick="myFunction()"><i class="fa fa-download"></i> Download</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
      

<script>
function myFunction() {
        /*document.getElementById("demo").innerHTML = "Hello World";*/
        /*alert('sdsfs');*/
         var container = document.getElementById("patientdata"); //specific element on page
        /*var container = document.body;*/ // full page 
        html2canvas(container).then(function(canvas) {
                var link = document.createElement("a");
                document.body.appendChild(link);
                link.download = "patients.png";
                link.href = canvas.toDataURL("image/png");
                link.target = '_blank';
                link.click();
            });
      }
</script>
       

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>

        

        <!-- Required datatable js -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- <script src="<?php echo base_url();?>assets/js/pages/dashboard.init.js"></script> -->

        <!-- <script src="<?php echo base_url();?>assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/pages/form-validation.init.js"></script> -->

        <script src="<?php echo base_url();?>assets/js/app.js"></script>

    </body>
</html>
