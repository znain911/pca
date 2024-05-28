<?php $sht_ssndata = $this->session->userdata('sht_ssndata'); ?>
<header id="topnav" class="navbar navbar-midnightblue navbar-fixed-top clearfix" role="banner">

	<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a>
	</span>

	<a class="navbar-brand" href="#"><img class="msg-avatar" src="<?php echo base_url();?>admin_dir/img/logo.png" alt="logo" /></a>

	<span id="trigger-infobar" class="toolbar-trigger toolbar-icon-bg">
		<!--<a data-toggle="tooltips" data-placement="left" title="Toggle Infobar"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a>-->
	</span>
	
	
	<div class="yamm navbar-left navbar-collapse collapse in">
		<ul class="nav navbar-nav">
			
		</ul>
	</div>

	<ul class="nav navbar-nav toolbar pull-right">
		
		<!--<li class="dropdown">
			<a href="#"><?php echo $metadata['display_name'];?></a>
			
		</li>-->

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle='dropdown'><?php echo $sht_ssndata['display_name'];?><span class="icon-bg"><i class="fa fa-fw fa-user"></i></span></a>
			<ul class="dropdown-menu userinfo arrow">
				<li><a href="<?php echo base_url('admin/profile');?>"><span class="pull-left">Profile</span></a></li>
				<!--<li><a href="#"><span class="pull-left">Account</span> <i class="pull-right fa fa-user"></i></a></li>
				<li><a href="#"><span class="pull-left">Settings</span> <i class="pull-right fa fa-cog"></i></a></li>-->
				<li class="divider"></li>
				
				<li><a href="<?php echo base_url('admin/logout');?>"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li>
			</ul>
		</li>
        
        <li class="dropdown">
			<!--<a href="#">fhfhfghf</a>-->
			
		</li>

	</ul>

</header>
 <nav class="navbar sidebar-inverse" role="navigation" id="headernav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#horizontal-navbar">
                        <i class="fa fa-navicon"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse large-icons-nav" id="horizontal-navbar">
				
					<?php if($sht_ssndata['user_type']==1){ ?>
				
                    <ul class="nav navbar-nav smart-menu">
                        <li class="active"><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?php echo base_url('a_organization/organizationlist');?>"><i class="fa fa-hospital-o"></i> <span>Organization</span></a></li><!--<li><a href="#"><i class="fa fa-columns"></i> <span>Layout</span></a></li>-->
                        <!--<li><a href="<?php echo base_url('a_member');?>"><i class="fa fa-group"></i> <span>Members</span></a></li>-->
						
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'><i class="fa fa-group"></i> <span>Members <i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('coverage');?>">Coverage</a></li>
                                <li><a href="<?php echo base_url('a_member');?>">Members</a></li>
								<li><a href="<?php echo base_url('a_member/add_membercoverage');?>">Members Coverage</a></li>
                            </ul>
                        </li>
						
						
                        <!--<li><a href="#"><i class="fa fa-pencil"></i> <span>Components</span></a></li>-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'><i class="fa fa-stethoscope"></i> <span>Medicine <i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('manufacturer');?>">Manufacturer</a></li>
                                <li><a href="<?php echo base_url('medicine');?>">Medicine</a></li>
                            </ul>
                        </li>
						
						
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'><i class="fa fa-building"></i> <span>Investigations<i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('department');?>">Department</a></li>
                                <li><a href="<?php echo base_url('departmentdata');?>">Service Item</a></li>
								<li><a href="<?php echo base_url('Investigationsetup');?>">Investigation Setup</a></li>
								
								<!--<li><a href="<?php echo base_url('Testgroup');?>">Test Group</a></li>-->
								<li><a href="<?php echo base_url('Testreport');?>">Test Report Generate</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'><i class="fa fa-user-md"></i> <span>Doctor <i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('a_doctorcat');?>">Doctor Category</a></li>
                                <li><a href="<?php echo base_url('a_doctor');?>">Doctor</a></li>
                            </ul>
                        </li>
						<li><a href="<?php echo base_url('hospital');?>"><i class="fa fa-hospital-o"></i> <span>Hospital</span></a></li>
						<li><a href="<?php echo base_url('symptoms');?>"><i class="fa fa-pencil"></i> <span>Symptoms</span></a></li>
						<li><a href="<?php echo base_url('prescription');?>"><i class="fa fa-medkit"></i> <span>Prescription</span></a></li>
						
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'><i class="fa fa-file"></i> <span>Bill <i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('bill/uhcpbill/'.'opd');?>">OPD Bill</a></li>
                                <li><a href="<?php echo base_url('bill/uhcpbill/'.'ipd');?>">IPD Bill</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'><i class="fa fa-cog"></i> <span>Settings <i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('a_usergroup');?>">User Group</a></li>
                                <li><a href="<?php echo base_url('a_usergroup/user');?>">Users</a></li>
                                <li><a href="<?php echo base_url('a_designation');?>">Designation</a></li>
                            </ul>
                        </li>
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'><i class="fa fa-file"></i> <span>Report <i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('reports/prescriptions');?>">Prescription Report</a></li>
                                <li><a href="<?php echo base_url('reports/billlist');?>">Bill Report</a></li>
                            </ul>
                        </li>
						
                    </ul>
					<?php }?>
					<?php if($sht_ssndata['user_type']==2){ ?>					
					<ul class="nav navbar-nav smart-menu">
                        <li class="active"><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                       
						<li><a href="<?php echo base_url('symptoms');?>"><i class="fa fa-pencil"></i> <span>Symptoms</span></a></li>
						<li><a href="<?php echo base_url('prescription');?>"><i class="fa fa-medkit"></i> <span>Prescription</span></a></li>
						
                    </ul>
					
					<?php }?>
					<?php if($sht_ssndata['user_type']==3){ ?>					
					<ul class="nav navbar-nav smart-menu">
                        <li class="active"><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                       <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'><i class="fa fa-group"></i> <span>Members <i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('coverage');?>">Coverage</a></li>
                                <li><a href="<?php echo base_url('a_member');?>">Members</a></li>
								<li><a href="<?php echo base_url('a_member/add_membercoverage');?>">Members Coverage</a></li>
                            </ul>
                        </li>
						<li><a href="<?php echo base_url('symptoms');?>"><i class="fa fa-pencil"></i> <span>Symptoms</span></a></li>
						<li><a href="<?php echo base_url('prescription');?>"><i class="fa fa-medkit"></i> <span>Prescription</span></a></li>
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'><i class="fa fa-file"></i> <span>Bill <i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('bill/uhcpbill/'.'opd');?>">OPD Bill</a></li>
                                <li><a href="<?php echo base_url('bill/uhcpbill/'.'ipd');?>">IPD Bill</a></li>
                            </ul>
                        </li>
						
                    </ul>
					
					<?php }?>
                </div>
            </nav>

<hr style="border-top: 1px solid #ffffff;">