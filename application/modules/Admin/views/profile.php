<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/includes/admin_header');?>
<!--BEGIN Style-->

<!--END Style-->
</head>
<body class="infobar-offcanvas">
<?php $this->load->view('admin/includes/admin_header_menu');?>
<div id="wrapper">
  <div id="layout-static">
    <?php $this->load->view('admin/includes/admin_sidebar'.$metadata['user_type']);?>
    <div class="static-content-wrapper">
      <div class="static-content">
        <div class="page-content">
          <div class="row" style="background: #f5f5f5 none repeat; margin-bottom:20px;">
            <div class="col-md-7">
              <ol class="breadcrumb">
                <li ><a href="<?php echo base_url('admin');?>">Home</a></li>
                <li class="active"><?php echo $metadata['title'];?></li>
              </ol>
              <div class="page-heading"><h1><?php echo $metadata['title'];?></h1></div>
            </div>
			<?php foreach($profile_data as $pdata){?>
            <div class="col-md-5">
            	<div style="padding:30px 10px; text-align:right;">
                
                	<!--<a class="btn btn-info" href="#"><i class="fa fa-pencil-square-o"></i> Edit Profile</a> <a class="btn btn-default" href="#">Default</a>-->
                    <a class="btn btn-label btn-social btn-github" href="<?php echo base_url().'admin/profile_update/'.$pdata->Admin_Id; ?>"><i class="fa fa-pencil-square-o"></i>Edit Profile</a>
                	
                </div>
             </div>
          </div>
          <div class="container-fluid">
            <div class="row">
              
              
              <div class="col-md-8">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h2>Details</h2>
                      </div>
                      <div class="panel-body">
                          <address>
                              <strong>Full Name</strong>     
                              <h1 class="mt0"><?php echo $pdata->Display_Name;?></h1>                         
                          </address>
                          <address>
                              <strong>User Name</strong>     
                              <h1 class="mt0"><?php echo $pdata->User_Login;?></h1>                         
                          </address>
                          <address>
                              <strong>User Group</strong>     
                              <h3><?php echo $pdata->Usergroup_Head;?></h3>                         
                          </address>
                          <address>
                              <strong>Contact No</strong>     
                              <h4><?php echo $pdata->Contact_No;?></h4>                         
                          </address>
                          <address>
                              <strong>Email</strong><br>
                              <a href="mailto:<?php echo $pdata->User_Email;?>"><?php echo $pdata->User_Email;?></a>
                          </address>
                          <address>
                              <strong>Address</strong><br>
                              <?php echo $pdata->User_Address;?>
                          </address>
                          
                      </div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h2>Profile Pictures</h2>
                          
                      </div>
                      <div class="panel-body">
                          <img src="<?php echo base_url();?>user/images/users/<?php echo $pdata->User_Image;?>" alt="..." class="img-rounded" width="100%">
                          
                      </div>
                  </div>
          
              </div>
              <?php }?>
</div>
          </div>
          <!-- .container-fluid --> 
        </div>
        <!-- #page-content --> 
      </div>
      <?php $this->load->view('admin/includes/admin_tinyfooter');?>
    </div>
  </div>
</div>
<?php $this->load->view('admin/includes/admin_rightsidebar');?>
<!-- Load site level scripts --> 












<!-- End loading page level scripts-->
</body>
</html>