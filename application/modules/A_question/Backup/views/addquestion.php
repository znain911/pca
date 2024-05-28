<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Add Question | Distance Learning Programme (DLP)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

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
                                    <h4 class="mb-0">Add Question</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('a_question');?>">Question</a></li>
                                            <li class="breadcrumb-item active">Add Question</li>
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
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Question</label>
                                                        <div>
                                                            <textarea required class="form-control" rows="5" name="question" id="question"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>TMA</label>
                                                        <div>
                                                            <select class="form-control" name="tma" id="tma" required>
                                                                <option value="">Select</option>
                                                                <?php foreach ($tmalist as $tmal) {?>
                                                                    <option value="<?php echo $tmal->tma_id;?>"><?php echo $tmal->tma_name;?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <div>
                                                        <select class="form-control" name="publish" id="publish" required>
                                                                <option value="1">Active</option>
                                                                <option value="0">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="border-left:1px solid #ced4da;">
                                                    <div class="form-group">
                                                        <label>Answer 1</label>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <input type="text" name="anstext[]" class="form-control" required placeholder="Answer 1"/>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="custom-control custom-checkbox mt-1">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="ans0" value="1">
                                                                <label class="custom-control-label" for="customCheck1">True</label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Answer 2</label>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <input type="text" name="anstext[]" class="form-control" required placeholder="Answer 2"/>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="custom-control custom-checkbox mt-1">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="ans1" value="1">
                                                                <label class="custom-control-label" for="customCheck2">True</label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Answer 3</label>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <input type="text" name="anstext[]" class="form-control" placeholder="Answer 3"/>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="custom-control custom-checkbox mt-1">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck3" name="ans2" value="1">
                                                                <label class="custom-control-label" for="customCheck3">True</label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Answer 4</label>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <input type="text" name="anstext[]" class="form-control" placeholder="Answer 4"/>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="custom-control custom-checkbox mt-1">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck4" name="ans3" value="1">
                                                                <label class="custom-control-label" for="customCheck4">True</label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            


                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Submit
                                                    </button>
                                                    <a href="<?php echo base_url('a_question');?>" class="btn btn-secondary waves-effect">
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

       <?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", 'a_question/question_data' ,'Added Successfully'  ); ?>
        <script type="text/javascript">
        function form_acction(msg){ 
            if(msg=='Added Successfully'){                                  
                /*var jmpurl='<?php echo base_url('admin');?>';
                window.location=jmpurl; */
                $("#form_post")[0].reset();
            }
        }           
        </script>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>

        <script src="<?php echo base_url();?>assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/pages/form-validation.init.js"></script>

        <script src="<?php echo base_url();?>assets/js/app.js"></script>

    </body>
</html>
