<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Distance Learning Programme (DLP)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="TMA Developed by CT Health Ltd" name="description" />
        <meta content="CTHealth" name="author" />
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
            <!--<a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>-->
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
                                                    <a href="index.html" class="logo"><img src="<?php echo base_url();?>assets/images/dlp.png" height="90" alt="logo"></a>
                                                </div>
    
                                                <h4 class="font-size-18 mt-4">Welcome</h4>
                                                <!-- <p class="text-muted">Sign in to continue to RTC Exam.</p> -->
                                            </div>

                                            <div class="p-2 mt-5">
                                                <!-- <form action="index.html" class="needs-validation" novalidate> -->
                                                <?php $attributes = array('id' => 'form_post', 'name'=>'form_post', 'class' => 'needs-validation', 'style'=>'position:relative;', 'enctype'=>'multipart/form-data', 'novalidate');echo form_open('javascript:void(0)',$attributes);?>
                                            <div class="errormessage"></div>
                    
                                                    <div class="form-group auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                                                        <div class="invalid-feedback">
                                                            Please provid a valid username
                                                        </div>
                                                    </div>
                            
                                                    <div class="form-group auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="userpassword">Password</label>
                                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" required>
                                                        <div class="invalid-feedback">
                                                            Password required
                                                        </div>
                                                    </div>
                            
                                                    <!-- <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                    </div> -->

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <!-- <a href="#" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a> -->
                                                    </div>
                                                <?php echo form_close(); ?>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <!-- <p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Register </a> </p> -->
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

        <?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", 'admin/verifylogin' ,'Login Successfully'  ); ?>
        <script type="text/javascript">
        function form_acction(msg){ 
            if(msg=='Login Successfully'){                                  
                var jmpurl='<?php echo base_url('admin');?>';
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
