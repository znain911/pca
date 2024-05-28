<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Edit Students | Distance Learning Programme (DLP)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

        <link href="<?php echo base_url();?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

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
                                    <h4 class="mb-0">Edit Students</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/students');?>">Students</a></li>
                                            <li class="breadcrumb-item active">Edit Students</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php $attributes = array('id' => 'form_post', 'name'=>'form_post', 'class' => 'custom-validation', 'style'=>'position:relative;', 'enctype'=>'multipart/form-data');echo form_open('javascript:void(0)',$attributes);?>
                                            <div class="errormessage"></div>
                                        
                                            
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <div>
                                                            <input type="text" name="title" id="title" class="form-control" placeholder="Name" value="<?php echo $st_data->st_name;?>" />
                                                            <div class="form-error" id="error-name"></div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <div>
                                                            <input type="text" name="st_email" id="st_email" class="form-control" placeholder="Email" value="<?php echo $st_data->st_email;?>" />
                                                            <!-- <div class="form-error" id="error-name"></div> -->
                                                        </div>
                                                    </div>

                                                    

                                                    
                                                    <div class="form-group">
                                                        <label>Student ID</label>
                                                        <div>
                                                            <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Student ID" required value="<?php echo $st_data->student_id; ?>" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Mobile Number</label>
                                                        <div>
                                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Mobile Number" value="<?php echo $st_data->phone; ?>" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>RTC Number</label>
                                                        <div>
                                                            <input type="text" name="rtc_number" id="rtc_number" class="form-control" placeholder="RTC Number" required value="<?php echo $st_data->rtc_number; ?>" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Batch Number</label>
                                                        <div>
                                                            <input type="text" name="batch" id="batch" class="form-control" placeholder="Batch Number" required value="<?php echo $st_data->batch; ?>" />
                                                        </div>
                                                    </div>
                                                    

                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Submit
                                                    </button>
                                                    <a href="<?php echo base_url('admin/students');?>"  class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
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

       <?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", 'admin/editstudent_data/'.$stid ,'Update Successfully'  ); ?>
        <script type="text/javascript">
        function form_acction(msg){ 
            if(msg=='Update Successfully'){                                  
                var jmpurl='<?php echo base_url('admin/students');?>';
                window.location=jmpurl; 
                $("#form_post")[0].reset();
            }
        }

        $(document).ready(function() {
                
                            
            });           
        </script>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>

        <script src="<?php echo base_url();?>assets/libs/select2/js/select2.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/pages/form-advanced.init.js"></script>
        <script src="<?php echo base_url();?>assets/libs/parsleyjs/parsley.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/pages/form-validation.init.js"></script>

        <script src="<?php echo base_url();?>assets/js/app.js"></script>

    </body>
</html>
