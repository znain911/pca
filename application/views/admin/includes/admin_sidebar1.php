<!--BEGIN SIDEBAR MENU-->
<?php $sht_ssndata = $this->session->userdata('sht_ssndata'); ?>

<div class="static-sidebar-wrapper sidebar-midnightblue">
  <div class="static-sidebar">
    <div class="sidebar">
      <div class="widget stay-on-collapse" id="widget-welcomebox">
        <div class="widget-body welcome-box tabular">
          <div class="tabular-row">
            <div class="tabular-cell welcome-avatar"> <a href="<?php echo base_url('');?>"><img src="<?php echo base_url('');?>user/images/users/admin-31989.jpg" class="avatar"></a> </div>
            <div class="tabular-cell welcome-options"> <span class="welcome-text">Welcome,</span> <a class="name"><?php echo $sht_ssndata['display_name'];?></a> </div>
          </div>
        </div>
      </div>
      <div class="widget stay-on-collapse" id="widget-sidebar">
        <nav role="navigation" class="widget-body">
          <ul class="acc-menu">
            <li class="nav-separator">Explore</li>
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
              
            
			
			
			<li><a href="javascript:;"><i class="fa fa-user-md"></i><span>Doctor</span></a>
              <ul class="acc-menu">
                <li><a href="<?php echo base_url('a_doctorcat');?>">Doctor Category</a></li>
                <li><a href="<?php echo base_url('a_doctor');?>">Doctor</a></li>
              </ul>
            </li>
             <li><a href="javascript:;"><i class="fa fa-hospital-o"></i><span>Organization</span></a>
              <ul class="acc-menu">
                <li><a href="<?php echo base_url('a_organization/organizationtype');?>">Organization Type</a></li>
                <li><a href="<?php echo base_url('a_organization/organizationlist');?>">Organization</a></li>
              </ul>
            </li>  
			
			<li><a href="javascript:;"><i class="fa fa-user"></i><span>Member</span></a>
              <ul class="acc-menu">
                <li><a href="<?php echo base_url('a_member');?>">Members</a></li>
              </ul>
            </li>
			
			
			<li><a href="javascript:;"><i class="fa fa-filter"></i><span>Medicine</span></a>
              <ul class="acc-menu">
                <li><a href="<?php echo base_url('manufacturer');?>">Manufacturer</a></li>
                <!--<li><a href="<?php echo base_url('a_option/optionlist');?>">Medicine</a></li>-->
              </ul>
            </li>
              
             
			
            <li><a href="javascript:;"><i class="fa fa-user"></i><span>User</span></a>
              <ul class="acc-menu">
                <li><a href="<?php echo base_url('a_usergroup');?>">User Group</a></li>
                <li><a href="<?php echo base_url('a_usergroup/user');?>">Users</a></li>
                <li><a href="<?php echo base_url('a_designation');?>">Designation</a></li>
                
              </ul>
            </li>
            <!--<i class="fas fa-clinic-medical"></i>-->
            <li><a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-check"></i><span>Log Out</span></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<!--END SIDEBAR MENU-->