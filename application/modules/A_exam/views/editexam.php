<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Edit Exam Schedule | Distance Learning Programme (DLP)</title>
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
        
        <!-- Summernote css -->
        <link href="<?php echo base_url();?>assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
        
        <style type="text/css">
            .form-error {
                color: red;
            }
        </style>

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
                                    <h4 class="mb-0">Edit Exam Schedule</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('a_exam');?>">Exam Schedule</a></li>
                                            <li class="breadcrumb-item active">Edit Exam Schedule</li>
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
                                                        <label>Exam Title</label>
                                                        <div>
                                                            <input type="text" name="title" id="title" class="form-control" placeholder="Exam Title" value="<?php echo $sdl_data->schedule_name;?>" />
                                                            <div class="form-error" id="error-title"></div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label>TMA</label>
                                                        <div>
                                                            <select class="form-control" name="tma" id="tma">
                                                                <option value="">Select</option>
                                                                <?php foreach ($tmalist as $tmal) {?>
                                                                    <option value="<?php echo $tmal->tma_id;?>" <?php if($sdl_data->tma == $tmal->tma_id){ echo 'selected'; } ?> ><?php echo $tmal->tma_name;?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                        <div class="form-error" id="error-tma"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Start Date</label>
                                                        <div class="input-group">
                                                                <?php $startdatetm = date('Y-m-d', strtotime($sdl_data->start_date)).'T'.date('H:i:s', strtotime($sdl_data->start_date));?>
                                                            <input class="form-control" type="datetime-local" value="<?php echo $startdatetm;?>" id="example-datetime-local-input" name="start_date" required>
                                                        </div>
                                                        <div class="form-error" id="error-start_date"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>End Date <?php $enddatetm = date('Y-m-d', strtotime($sdl_data->end_date)).'T'.date('H:i:s', strtotime($sdl_data->end_date));?></label>
                                                        <div class="input-group">
                                                                <!-- <input class="form-control" type="datetime-local" value="2020-03-14T13:45:00" id="example-datetime-local-input" name="end_date"> -->
                                                            <input class="form-control" type="datetime-local" value="<?php echo $enddatetm;?>" id="example-datetime-local-input" name="end_date">
                                                        </div>
                                                        <div class="form-error" id="error-end_date"></div>
                                                    </div>

                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class=" col-xl-3">
                                                        <label>Number of Questions (Theory)</label>
                                                        <div>
                                                            <input type="text" name="no_of_question_theory" id="no_of_question_theory" class="form-control" value="<?php echo $sdl_data->no_of_question_theory; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-no_of_question_theory"></div>
                                                        </div>
                                                        <div class=" col-xl-3">
                                                        <label>Mark per Question (Theory)</label>
                                                        <div>
                                                            <input type="text" name="marks_per_question" id="marks_per_question" class="form-control" value="<?php echo $sdl_data->marks_per_question; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-marks_per_question"></div>
                                                        </div>
                                                        <div class="col-xl-3">
                                                        <label>Total Marks (Theory)</label>
                                                        <div>
                                                            <input type="text" name="total_mark_theory" id="total_mark_theory" class="form-control" value="<?php echo $sdl_data->total_mark_theory; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-total_mark_theory"></div>
                                                        </div>
                                                        <div class=" col-xl-3">
                                                        <label>Pass Marks (Theory)</label>
                                                        <div>
                                                            <input type="text" name="pass_mark_theory" id="pass_mark_theory" class="form-control" value="<?php echo $sdl_data->pass_mark_theory; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-pass_mark_theory"></div>
                                                        </div>



                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class=" col-xl-3">
                                                        <label>Number of Questions (OSCE)</label>
                                                        <div>
                                                            <input type="text" name="no_of_question_osce" id="no_of_question_osce" class="form-control" value="<?php echo $sdl_data->no_of_question_osce; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-no_of_question_osce"></div>
                                                        </div>
                                                        <div class=" col-xl-3">
                                                        <label>Mark per Question (OSCE)</label>
                                                        <div>
                                                            <input type="text" name="marks_per_question_osce" id="marks_per_question_osce" class="form-control" value="<?php echo $sdl_data->marks_per_question_osce; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-marks_per_question_osce"></div>
                                                        </div>
                                                        <div class=" col-xl-3">
                                                        <label>Total Marks (OSCE)</label>
                                                        <div>
                                                            <input type="text" name="total_mark_osce" id="total_mark_osce" class="form-control" value="<?php echo $sdl_data->total_mark_osce; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-total_mark_osce"></div>
                                                        </div>
                                                        <div class=" col-xl-3">
                                                        <!-- <label>Pass Marks (OSCE)</label>
                                                        <div>
                                                            <input type="text" name="pass_mark_osce" id="pass_mark_osce" class="form-control"  value="<?php echo $sdl_data->pass_mark_osce; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-pass_mark_osce"></div> -->
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                        <div class=" col-xl-3">
                                                        <label>Number of Questions (OSPE)</label>
                                                        <div>
                                                            <input type="text" name="no_of_question_ospe" id="no_of_question_ospe" class="form-control" value="<?php echo $sdl_data->no_of_question_ospe; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-no_of_question_ospe"></div>
                                                        </div>
                                                        <div class=" col-xl-3">
                                                        <label>Mark per Question (OSPE)</label>
                                                        <div>
                                                            <input type="text" name="marks_per_question_ospe" id="marks_per_question_ospe" class="form-control" value="<?php echo $sdl_data->marks_per_question_ospe; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-marks_per_question_ospe"></div>
                                                        </div>
                                                        <div class=" col-xl-3">
                                                        <label>Total Marks (OSPE)</label>
                                                        <div>
                                                            <input type="text" name="total_mark_ospe" id="total_mark_ospe" class="form-control" value="<?php echo $sdl_data->total_mark_ospe;?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-total_mark_ospe"></div>
                                                        </div>
                                                        <div class=" col-xl-3">
                                                        <!-- <label>Pass Marks (OSPE)</label>
                                                        <div>
                                                            <input type="text" name="pass_mark_ospe" id="pass_mark_ospe" class="form-control" value="<?php echo $sdl_data->pass_mark_ospe;?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-pass_mark_ospe"></div> -->
                                                        </div>
                                                        </div>
                                                    </div>
                                                   

                                                    <div class="form-group">
                                                        <label>Pass Marks (OSCE and OSPE)</label>
                                                        <div>
                                                            <input type="text" name="pass_mark_osce_ospe" id="pass_mark_osce_ospe" class="form-control"  value="<?php echo $sdl_data->pass_mark_osce_ospe; ?>" />
                                                        </div>
                                                        <div class="form-error" id="error-pass_mark"></div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Negative Marks (Per Stamp)</label>
                                                        <div>
                                                            <input type="text" name="negative_mark" id="negative_mark" class="form-control" placeholder="Negative Marks" value="<?php echo $sdl_data->negative_mark; ?>" />
                                                        </div>
                                                        <div class="form-error" id="error-negative_mark"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Exam Time Theory (Minute)</label>
                                                        <div>
                                                            <input type="text" name="exam_time" id="exam_time" class="form-control" placeholder="Exam Time"  value="<?php echo $sdl_data->exam_time; ?>" />
                                                        </div>
                                                        <div class="form-error" id="error-exam_time"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Exam Time OSCE (Minute)</label>
                                                        <div>
                                                            <input type="text" name="exam_time_osce" id="exam_time_osce" class="form-control" placeholder="Exam Time OSCE" value="<?php echo $sdl_data->exam_time_osce; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-exam_time_osce"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Exam Time OSPE (Minute)</label>
                                                        <div>
                                                            <input type="text" name="exam_time_ospe" id="exam_time_ospe" class="form-control" placeholder="Exam Time OSPE" value="<?php echo $sdl_data->exam_time_ospe; ?>"  />
                                                        </div>
                                                        <div class="form-error" id="error-exam_time_ospe"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Notice Theory</label>
                                                        <div>
                                                            <textarea id="summernote" name="exam_notice" class="form-control"><?php echo $sdl_data->exam_notice; ?></textarea>
                                                        </div>
                                                        <div class="form-error" id="error-exam_notice"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Notice OSCE</label>
                                                        <div>
                                                            <textarea id="summernote2" name="exam_notice_osce" class="form-control"><?php echo $sdl_data->exam_notice_osce; ?></textarea>
                                                        </div>
                                                        <div class="form-error" id="error-exam_notice_osce"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Notice OSPE</label>
                                                        <div>
                                                            <textarea id="summernote3" name="exam_notice_ospe" class="form-control"><?php echo $sdl_data->exam_notice_ospe; ?></textarea>
                                                        </div>
                                                        <div class="form-error" id="error-exam_notice_ospe"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <div>
                                                        <select class="form-control" name="publish" id="publish" required>
                                                                <option value="1" <?php if($sdl_data->status==1){ echo 'selected'; } ?>>Active</option>
                                                                <option value="0" <?php if($sdl_data->status==0){ echo 'selected'; } ?>>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Submit
                                                    </button>
                                                    <a href="<?php echo base_url('a_exam');?>"  class="btn btn-secondary waves-effect">
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

       <?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", 'a_exam/editexam_data/'.$examid ,'Update Successfully'  ); ?>
        <script type="text/javascript">
        function form_acction(msg){ 
            if(msg=='Update Successfully'){                                  
                var jmpurl='<?php echo base_url('a_exam');?>';
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
        <script src="<?php echo base_url();?>assets/libs/summernote/summernote-bs4.min.js"></script>
       
        <script>         
          $(document).ready(function() {
              $('#summernote').summernote({
                placeholder: 'Notice',
                tabsize: 2,
                height: 150
              });
              $('#summernote2').summernote({
                placeholder: 'Notice',
                tabsize: 2,
                height: 150
              });
              $('#summernote3').summernote({
                placeholder: 'Notice',
                tabsize: 2,
                height: 150
              });



            });
        </script>

    </body>
</html>
