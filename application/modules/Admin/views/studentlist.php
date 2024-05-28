<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Students | Distance Learning Programme (DLP)</title>
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
                                    <h4 class="mb-0">Students</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin');?>">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Students</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                                            <a href="<?php echo base_url('admin/studentsExl');?>" class="btn btn-success">
                                                <i class=" ri-file-excel-fill align-middle mr-2"></i> Export
                                            </a>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-centered dt-responsive" data-page-length="10" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>SL</th>           
                                                        <th>Student ID</th>
                                                       <!--  <th>Code</th> -->
                                                        <th>Student Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>RTC</th>
                                                        <th>Batch</th>
                                                        <th>Reg. Date</th>
                                                        <th>PCA Status</th>
                                                        <th>Status</th>
                                                        <th style="width: 100px;">Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php $i=1; foreach ($latest_st as $lst) {?>
                                                    
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <!-- <td><?php echo $lst->st_code; ?></td> -->
                                                        <td><?php echo $lst->student_id; ?></td>
                                                        <td><?php echo $lst->st_name; ?></td>
                                                        <td><?php echo $lst->st_email; ?></td>
                                                        <td><?php echo $lst->phone; ?></td>
                                                        <td><?php echo $lst->rtc_number; ?></td>
                                                        <td><?php echo $lst->batch; ?></td>
                                                        <td><?php echo date("d-m-Y",strtotime($lst->register_date)); ?></td>
                                                        <td>
                                                           <?php if($lst->ece_status == 1){?>
                                                                <!-- <a href="javascript:void(0);" class="mr-3 text-danger" id="dlt" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="delete_record('<?php echo $lst->st_id; ?>')">Allow ECE</a> -->
                                                                
                                                                <div class="btn-group mr-1 mt-2">
                                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Allowed <i class="mdi mdi-chevron-down"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" style="">
                                                                        <a class="dropdown-item" href="javascript:void(0);" onclick="delete_record('<?php echo $lst->st_id; ?>','0')">Disallow</a>
                                                                    </div>
                                                                </div>
                                                           <?php }elseif ($lst->ece_status == 0) {?>
                                                               
                                                               <div class="btn-group mr-1 mt-2">
                                                                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Disallowed <i class="mdi mdi-chevron-down"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" style="">
                                                                        <a class="dropdown-item" href="javascript:void(0);" onclick="delete_record('<?php echo $lst->st_id; ?>','1')">Allow</a>
                                                                    </div>
                                                                </div>
                                                           <?php } ?> 
                                                        </td>
                                                        <td>
                                                            <?php if($lst->st_status == 1){?>
<label class="text-success">Active</label>
                                                            <?php }else{?>
<label class="text-danger">Blocked</label>
                                                            <?php }?>
                                                        </td>
                                                        <!-- <a href="javascript:void(0);" class="mr-3 text-danger" id="dlt" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="delete_record('<?php echo $lst->id; ?>')"><i class=" ri-delete-bin-fill font-size-18"></i></a> -->
                                                        <td>
                                                            <a href="<?php echo base_url('admin/editstudents/').$lst->st_id; ?>" class="mr-3 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-fill font-size-18"></i></a>
                                                            <a href="<?php echo base_url('admin/resetstudents/').$lst->st_id; ?>" class="text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reset" style="float: left;">Reset</a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; } ?>
                                                    
                                                </tbody>
                                            </table>
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

       <script type="text/javascript">
        $(function(e) {
            $('#example').DataTable(
                {lengthMenu:[5,10,25,50,100],pageLength:10,language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}}
                );
        } );

        function delete_record(id, status){ 
            
            if (confirm('Are you sure you want to delete this?')) {
                $.ajax({                      
                     url:"<?php echo base_url(); ?>admin/ece_allow/"+id+"/"+status,  
                     method:"POST",  
                     data:{id:id, status:status},  
                     success:function(data)  
                     {  
                          alert(data);  
                          //datalist.ajax.reload();  
                          var jmpurl='<?php echo base_url('admin/students');?>';
                            window.location=jmpurl;
                     }  
                
                });
            }else{
                return false;
            }
          }
          
       </script>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <!-- <script src="<?php echo base_url();?>assets/libs/apexcharts/apexcharts.min.js"></script> -->

        <!-- jquery.vectormap map -->
        <script src="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- <script src="<?php echo base_url();?>assets/js/pages/dashboard.init.js"></script> -->

        <!-- Buttons examples -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>"assets/libs/jszip/jszip.min.js"></script>
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
