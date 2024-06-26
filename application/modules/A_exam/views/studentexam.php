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

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?php $this->load->view('includes/topbar');?>

            <!-- ========== Left Sidebar Start ========== -->
            
            <?php $this->load->view('includes/sidebar');?>
            <!-- Left Sidebar End -->

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
                                    <h4 class="mb-0">Attended students</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin');?>">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('a_exam');?>">Exam Schedule</a></li>
                                            <li class="breadcrumb-item active">Attended students</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                       <div>
                                            <a href="<?php echo base_url('a_exam/examstudentsExl/').$sid;?>" class="btn btn-success mb-2"><i class="ri ri-download-cloud-2-line mr-2"></i> Export</a>
                                        </div>
                                        <div class="table-responsive mt-3">

                                            <table id="example" class="table table-centered" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Student ID</th>
                                                        <th>Student Name</th>
                                                        <th>Phone</th>
                                                        <th>RTC</th>
                                                        <th>Batch</th>
                                                         <th>Reg. Date & Time</th>
                                                        <th>Attend Date</th>
                                                        <th>Total Marks</th>
                                                        <th>Pass Marks</th>
                                                        <th>Marks Obtained</th>
                                                        <th>Attempt</th>
                                                        <th>Status</th>
														<th>Camera</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php $i=1; foreach ($qsn_list as $lst) {?>
                                                    
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $lst->student_id; ?></td>
                                                        <td><?php echo $lst->st_name; ?></td>
                                                        <td><?php echo $lst->phone; ?></td>
                                                        <td><?php echo $lst->rtc_number; ?></td>
                                                        <td><?php echo $lst->batch; ?></td>
                                                        <td><?php echo date("d-M-Y g:i A",strtotime($lst->register_date)); ?></td>
                                                        <td>
														<?php /* echo date("d-M-Y g:i A",strtotime($lst->exam_attend_date)); */ ?>
														<?php
                                                            $current = new DateTime($lst->exam_attend_date);
                                                            //The number of hours to add.
                                                            $hoursToAdd = 6;
                                                            //Add the hours b
                                                            $current->add(new DateInterval("PT{$hoursToAdd}H"));
                                                            $newTime = $current->format('d-M-Y g:i A');
                                                            echo $newTime;
                                                             ?>
														</td>
                                                        <td><?php echo $lst->total_mark; ?></td>
                                                        <td><?php echo $lst->pass_mark; ?></td>
                                                        <?php //$correctans = $this->a_exam_m->getExamGivenCorrectAns($lst->id);?>
                                                        <td><?php echo $lst->geting_marks; ?></td>
                                                        <td><?php echo $this->querylib->attemp_no($lst->st_id,$lst->exam_id,$lst->id);
                                                                        ?></td>

                                                        <td>
                                                             <?php 
                                                                $gmark = $lst->geting_marks;
                                                                      $tmark = $lst->total_mark;

                                                                      $per = round(is_numeric($gmark) / (is_numeric($tmark) / 100),2);
                                                                      
                                                                      if($gmark < $lst->pass_mark){
                                                                        echo '<div class="text-danger">Fail</div>';
                                                                      }else{
                                                                         echo '<div class="text-success">Passed</div>';
                                                                      }
                                                                      
                                                            ?>                                                                      
                                                     </td>
													<td>
                                                        <?php $cam = $this->a_exam_m->exam_camera($lst->st_id,$lst->exam_id);
                                                            if(!empty($cam)){
                                                            if ($cam->camera_status == 1) {
                                                                echo 'On';
                                                            }else{
                                                                echo 'Off';
                                                            } }else{
                                                                echo 'N/A';
                                                            }
                                                        ?> 
                                                     </td>

                                                        <td>
                                                            <a href="javascript:void(0);" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Result"><i class="mdi mdi-eye font-size-18" data-toggle="modal" data-target="#myModal" onclick="data_view('<?php echo $lst->id; ?>')"></i></a>
                                                            
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php $i++; } ?>
                                                    
                                                </tbody>
                                            </table>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Result Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="qsndata">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





       <script type="text/javascript">
        $(document).ready(function () {
            datalist = $('#example').DataTable({
               lengthMenu:[5,10,25,50,100],pageLength:10,language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")} 
            });
        });
       
        function reload_table(){
              datalist.ajax.reload(null,false); //reload datatable ajax
          }

        function delete_record(id){ 
            
            if (confirm('Are you sure you want to delete this?')) {
                $.ajax({
                     url:"<?php echo base_url(); ?>a_question/delete_single_user",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data)  
                     {  
                          alert(data);  
                          //datalist.ajax.reload();  
                          var jmpurl='<?php echo base_url('a_question');?>';
                            window.location=jmpurl;
                     }  
                
                });
            }else{
                return false;
            }
          }

function data_view(id){ 
   var loader='<div style="text-align: center;"><i class="fa fa-refresh fa-spin fa-4x fa-fw"></i></div>';

 $('#qsndata').html(loader);         
            
    $.ajax({
        url:"<?php echo base_url(); ?>a_exam/examresult_dtl",  
        method:"POST",  
        data:{id:id},  
        success:function(data)  
            {  
                
                $("#qsndata").html(data);
            }  
                
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


        <!-- Buttons examples -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

        <script src="<?php echo base_url();?>assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/app.js"></script>

    </body>
</html>
