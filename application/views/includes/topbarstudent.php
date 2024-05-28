<header id="page-topbar">
                <div class="navbar-header">
                    <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url();?>assets/images/logo-sm-dark.png" alt="" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url();?>assets/images/logo-dark.png" alt="" height="60">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url();?>assets/images/logo-sm-light.png" alt="" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url();?>assets/images/logo-light.png" alt="" height="60">
                                </span>
                            </a>
                        </div>

                    </div>
                    
                    

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>

                        <!-- <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-notification-3-line"></i>
                                <span class="noti-dot"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                </div>
                                <div class="p-2 border-top">
                                    <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle mr-1"></i> View More..
                                    </a>
                                </div>
                            </div>
                        </div> -->

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php echo base_url();?>assets/images/users/avatar-2.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1"><?php echo $metadata['display_name'];?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <!--<a class="dropdown-item" href="#"><i class="ri-user-line align-middle mr-1"></i> Profile</a>
                                
                                <div class="dropdown-divider"></div>-->
                                <a class="dropdown-item text-danger" href="<?php echo base_url('students/logout') ?>"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>


            <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
    
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">

                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('students');?>">
                                            <i class="ri-dashboard-line mr-2"></i> Dashboard
                                        </a>
                                    </li>
    
    
                                    <!--<li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-pencil-ruler-2-line mr-2"></i>Exam <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-apps">

                                            <a href="<?php echo base_url('students');?>" class="dropdown-item">Exam Schedule</a>
                                            <a href="<?php echo base_url('students/examhistory');?>" class="dropdown-item">Exam History</a>
                                           
                                        </div>
                                    </li>-->
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('students/examhistory');?>">
                                            <i class="ri-stack-line mr-2"></i> Certificates
                                        </a>
                                    </li> -->
                                    
    
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <?php
date_default_timezone_set("Asia/Dhaka");
/*echo "The time is " . date("Y-m-d h:i:sa");*/
?>