<!--BEGIN TOPBAR-->
<!--<div id="headerbar">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-6 col-sm-2"> <a href="#" class="shortcut-tile tile-brown">
        <div class="tile-body">
          <div class="pull-left"><i class="fa fa-pencil"></i></div>
        </div>
        <div class="tile-footer"> Create Post </div>
        </a> </div>
      <div class="col-xs-6 col-sm-2"> <a href="#" class="shortcut-tile tile-grape">
        <div class="tile-body">
          <div class="pull-left"><i class="fa fa-group"></i></div>
          <div class="pull-right"><span class="badge">2</span></div>
        </div>
        <div class="tile-footer"> Contacts </div>
        </a> </div>
      <div class="col-xs-6 col-sm-2"> <a href="#" class="shortcut-tile tile-primary">
        <div class="tile-body">
          <div class="pull-left"><i class="fa fa-envelope-o"></i></div>
          <div class="pull-right"><span class="badge">10</span></div>
        </div>
        <div class="tile-footer"> Messages </div>
        </a> </div>
      <div class="col-xs-6 col-sm-2"> <a href="#" class="shortcut-tile tile-inverse">
        <div class="tile-body">
          <div class="pull-left"><i class="fa fa-camera"></i></div>
          <div class="pull-right"><span class="badge">3</span></div>
        </div>
        <div class="tile-footer"> Gallery </div>
        </a> </div>
      <div class="col-xs-6 col-sm-2"> <a href="#" class="shortcut-tile tile-midnightblue">
        <div class="tile-body">
          <div class="pull-left"><i class="fa fa-cog"></i></div>
        </div>
        <div class="tile-footer"> Settings </div>
        </a> </div>
      <div class="col-xs-6 col-sm-2"> <a href="#" class="shortcut-tile tile-orange">
        <div class="tile-body">
          <div class="pull-left"><i class="fa fa-wrench"></i></div>
        </div>
        <div class="tile-footer"> Plugins </div>
        </a> </div>
    </div>
  </div>
</div>-->
<header id="topnav" class="navbar navbar-midnightblue navbar-fixed-top clearfix" role="banner"> 



<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg"><a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a> </span>
<a class="navbar-brand" href="<?php echo base_url();?>"><img class="msg-avatar" src="<?php echo base_url();?>admin_dir/img/headerlogo.png" alt="logo" /></a> 

<!-- <span id="trigger-infobar" class="toolbar-trigger toolbar-icon-bg"> <a data-toggle="tooltips" data-placement="left" title="Toggle Infobar"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a> </span>-->
  
  
  <ul class="nav navbar-nav toolbar pull-right">
    <!--<li class="dropdown toolbar-icon-bg"> <a href="#" id="navbar-links-toggle" data-toggle="collapse" data-target="header>.navbar-collapse"> <span class="icon-bg"> <i class="fa fa-fw fa-ellipsis-h"></i> </span> </a> </li>
    <li class="dropdown toolbar-icon-bg demo-search-hidden"> <a href="#" class="dropdown-toggle tooltips" data-toggle="dropdown"><span class="icon-bg"><i class="fa fa-fw fa-search"></i></span></a>
      <div class="dropdown-menu dropdown-alternate arrow search dropdown-menu-form">
        <div class="dd-header"> <span>Search</span> <span><a href="#">Advanced search</a></span> </div>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="">
          <span class="input-group-btn"> <a class="btn btn-primary" href="#">Search</a> </span> </div>
      </div>
    </li>-->
    <!--<li class="toolbar-icon-bg demo-headerdrop-hidden"> <a href="#" id="headerbardropdown"><span class="icon-bg"><i class="fa fa-fw fa-level-down"></i></span></i></a> </li>
    <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen"> <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="fa fa-fw fa-arrows-alt"></i></span></i></a> </li>-->
    <li class="dropdown toolbar-icon-bg"> <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-bell"></i></span><span class="badge badge-info">5</span></a>
      <div class="dropdown-menu dropdown-alternate notifications arrow">
        <div class="dd-header"> <span>Notifications</span> <span><a href="#">Settings</a></span> </div>
        <div class="scrollthis scroll-pane">
          <ul class="scroll-content">
            <li class=""> <a href="#" class="notification-info">
              <div class="notification-icon"><i class="fa fa-user fa-fw"></i></div>
              <div class="notification-content">Profile Page has been updated</div>
              <div class="notification-time">2m</div>
              </a> </li>
            <li class=""> <a href="#" class="notification-success">
              <div class="notification-icon"><i class="fa fa-check fa-fw"></i></div>
              <div class="notification-content">Updates pushed successfully</div>
              <div class="notification-time">12m</div>
              </a> </li>
            <li class=""> <a href="#" class="notification-primary">
              <div class="notification-icon"><i class="fa fa-users fa-fw"></i></div>
              <div class="notification-content">New users request to join</div>
              <div class="notification-time">35m</div>
              </a> </li>
            <li class=""> <a href="#" class="notification-danger">
              <div class="notification-icon"><i class="fa fa-shopping-cart fa-fw"></i></div>
              <div class="notification-content">More orders are pending</div>
              <div class="notification-time">11h</div>
              </a> </li>
            <li class=""> <a href="#" class="notification-primary">
              <div class="notification-icon"><i class="fa fa-arrow-up fa-fw"></i></div>
              <div class="notification-content">Pending Membership approval</div>
              <div class="notification-time">2d</div>
              </a> </li>
            <li class=""> <a href="#" class="notification-info">
              <div class="notification-icon"><i class="fa fa-check fa-fw"></i></div>
              <div class="notification-content">Succesfully updated to version 1.0.1</div>
              <div class="notification-time">40m</div>
              </a> </li>
          </ul>
        </div>
        <div class="dd-footer"> <a href="#">View all notifications</a> </div>
      </div>
    </li>
    <!--<li class="dropdown toolbar-icon-bg hidden-xs"> <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-envelope"></i></span></a>
      <div class="dropdown-menu dropdown-alternate messages arrow">
        <div class="dd-header"> <span>Messages</span> <span><a href="#">Settings</a></span> </div>
        <div class="scrollthis scroll-pane">
          <ul class="scroll-content">
            <li class=""> <a href="#"> <img class="msg-avatar" src="<?php echo base_url();?>admin_dir/demo/avatar/avatar_09.png" alt="avatar" />
              <div class="msg-content"> <span class="name">Steven Shipe</span> <span class="msg">Nonummy nibh epismod lorem ipsum</span> </div>
              <span class="msg-time">30s</span> </a> </li>
            <li> <a href="#"> <img class="msg-avatar" src="<?php echo base_url();?>admin_dir/demo/avatar/avatar_01.png" alt="avatar" />
              <div class="msg-content"> <span class="name">Roxann Hollingworth <i class="fa fa-paperclip attachment"></i></span> <span class="msg">Lorem ipsum dolor sit amet consectetur adipisicing elit</span> </div>
              <span class="msg-time">5m</span> </a> </li>
            <li> <a href="#"> <img class="msg-avatar" src="<?php echo base_url();?>admin_dir/demo/avatar/avatar_05.png" alt="avatar" />
              <div class="msg-content"> <span class="name">Diamond Harlands</span> <span class="msg">:)</span> </div>
              <span class="msg-time">3h</span> </a> </li>
            <li> <a href="#"> <img class="msg-avatar" src="<?php echo base_url();?>admin_dir/demo/avatar/avatar_02.png" alt="avatar" />
              <div class="msg-content"> <span class="name">Michael Serio <i class="fa fa-paperclip attachment"></i></span> <span class="msg">Sed distinctio dolores fuga molestiae modi?</span> </div>
              <span class="msg-time">12h</span> </a> </li>
            <li> <a href="#"> <img class="msg-avatar" src="<?php echo base_url();?>admin_dir/demo/avatar/avatar_03.png" alt="avatar" />
              <div class="msg-content"> <span class="name">Matt Jones</span> <span class="msg">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et mole</span> </div>
              <span class="msg-time">2d</span> </a> </li>
            <li> <a href="#"> <img class="msg-avatar" src="<?php echo base_url();?>admin_dir/demo/avatar/avatar_07.png" alt="avatar" />
              <div class="msg-content"> <span class="name">John Doe</span> <span class="msg">Neque porro quisquam est qui dolorem</span> </div>
              <span class="msg-time">7d</span> </a> </li>
          </ul>
        </div>
        <div class="dd-footer"><a href="#">View all messages</a></div>
      </div>
    </li>-->
    <li class="dropdown toolbar-icon-bg"> <a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-user"></i></span></a>
      <ul class="dropdown-menu userinfo arrow">
        <li><a href="<?php echo base_url('admin/profile');?>"><span class="pull-left">Profile</span> <span class="badge badge-info">80%</span></a></li>
        <!--<li><a href="#"><span class="pull-left">Account</span> <i class="pull-right fa fa-user"></i></a></li>
        <li><a href="#"><span class="pull-left">Settings</span> <i class="pull-right fa fa-cog"></i></a></li>
        <li class="divider"></li>
        <li><a href="#"><span class="pull-left">Earnings</span> <i class="pull-right fa fa-line-chart"></i></a></li>
        <li><a href="#"><span class="pull-left">Statement</span> <i class="pull-right fa fa-list-alt"></i></a></li>
        <li><a href="#"><span class="pull-left">Withdrawals</span> <i class="pull-right fa fa-dollar"></i></a></li>
        <li class="divider"></li>-->
        <li><a href="<?php echo base_url('admin/logout');?>"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li>
      </ul>
    </li>
  </ul>
</header>
<!--END TOPBAR-->