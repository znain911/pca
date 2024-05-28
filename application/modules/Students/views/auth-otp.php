<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>OTP | Distance Learning Programme (DLP)</title>
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
        <link href="<?php echo base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>

    </head>

    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <!-- <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a> -->
        </div>
        <div>
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div style="">
                                                    <a href="javascript:void(0)" class="logo"><img src="<?php echo base_url();?>assets/images/dlp.png" height="90" alt="logo"></a>
                                                </div>
    
                                                <!-- <h4 class="font-size-18 mt-4">Welcome</h4>
                                                <p class="text-muted">Sign in to continue to TMA</p> -->
                                            </div>

                                            <div class="p-2 mt-5">
                                                <div class="alert alert-success mb-4" role="alert">
                                                    Please check your Phone/Email OTP sent to you!
                                                </div>
                                                <!-- <form action="index.html" class="needs-validation" novalidate> -->
                                                <?php $attributes = array('id' => 'form_post', 'name'=>'form_post', 'class' => 'needs-validation', 'style'=>'position:relative;', 'enctype'=>'multipart/form-data', 'novalidate');echo form_open('javascript:void(0)',$attributes);?>
                                                <!-- <form method="post" action="<?php echo base_url(); ?>students/login_validation">  -->
                                            <div class="errormessage"></div>
                                            <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';?>
                                                    <div class="form-group auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">OTP</label>
                                                        <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP" required>
                                                        <div class="invalid-feedback">
                                                            Please provid a valid OTP
                                                        </div>
                                                        
                                                    </div>
                            <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $userid;?>">

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                    </div>

                                                    <!-- <div class="mt-4 text-center">
                                                        <a href="<?php echo base_url('students/forgotpassword') ?>" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                                    </div> -->
                                                     
                                                <?php echo form_close(); ?>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <!-- <p>Don't have an account ? <a href="<?php echo base_url('registration');?>" class="btn btn-outline-primary btn-sm"> Register </a> </p> -->
                                                <p>© 2020 Bangladesh Diabetic Association. Developed by <a href="https://cthealth-bd.com/" target="_blank">CT Health Ltd.</a></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", 'students/verifyotp' ,'Login Successfully'  ); ?>
        <script type="text/javascript">
        function form_acction(msg){ 
            if(msg=='Login Successfully'){                                  
                var jmpurl='<?php echo base_url('students');?>';
                window.location=jmpurl; 
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
