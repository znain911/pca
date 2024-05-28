<div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="<?php echo base_url('admin');?>" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/students');?>" class=" waves-effect">
                                    <i class="ri-team-line"></i><span>Student</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('a_question');?>" class=" waves-effect">
                                    <i class="ri-questionnaire-line"></i>
                                    <span>Questions</span>
                                </a>
                            </li>
                            <!--<li>
                                <a href="<?php echo base_url('a_exam');?>" class=" waves-effect">
                                    <i class="ri-timer-line"></i>
                                    <span>Exam Schedule</span>
                                </a>
                            </li>-->
                            <li>
                                <a href="<?php echo base_url('a_exam/pcaexam');?>" class=" waves-effect">
                                    <i class="ri-timer-line"></i>
                                    <span>PCA Exam Schedule</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('a_exam/examresult');?>" class=" waves-effect">
                                    <i class="ri-bookmark-3-line"></i>
                                    <span>Result</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-store-2-line"></i>
                                    <span>Ecommerce</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="ecommerce-products.html">Products</a></li>
                                    <li><a href="ecommerce-product-detail.html">Product Detail</a></li>
                                    <li><a href="ecommerce-orders.html">Orders</a></li>
                                    <li><a href="ecommerce-customers.html">Customers</a></li>
                                    <li><a href="ecommerce-cart.html">Cart</a></li>
                                    <li><a href="ecommerce-checkout.html">Checkout</a></li>
                                    <li><a href="ecommerce-shops.html">Shops</a></li>
                                    <li><a href="ecommerce-add-product.html">Add Product</a></li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-settings-2-line"></i>
                                    <span>Settings</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url('settings/registration_control');?>">Registration Control</a></li>
									<li><a href="<?php echo base_url('settings/studentotp');?>">OTP</a></li>
                                </ul>
                            </li>
                           <li>
                                <a href="<?php echo base_url('admin/logout') ?>" class=" waves-effect">
                                    <i class="ri-shut-down-line align-middle mr-1 text-danger"></i> 
                                    <span>Logout</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>