

<!--BEGIN SIDEBAR MENU-->
<?php $sht_ssndata = $this->session->userdata('sht_ssndata');
  $this->db->trans_start();
  $this->db->select('*');
  $this->db->from(DB_PREFIX.'admin_user_role as t1');   
  $this->db->join(DB_PREFIX.'admin_user_main_menu as t2','t1.Main_menu_id=t2.Main_menu_id');
  $this->db->where('t1.Admin_id',$sht_ssndata['id']);

  $query=$this->db->get();
  $menu_make=$query->result();
  $this->db->trans_complete();

 ?>

<div class="static-sidebar-wrapper sidebar-midnightblue">
  <div class="static-sidebar">
    <div class="sidebar">
      <div class="widget stay-on-collapse" id="widget-welcomebox">
        <div class="widget-body welcome-box tabular">
          <div class="tabular-row">
            <div class="tabular-cell welcome-avatar"> <a href="<?php echo base_url('');?>"><img src="<?php echo base_url('');?>user/images/adminuser/user1.jpg" class="avatar"></a> </div>
            <div class="tabular-cell welcome-options"> <span class="welcome-text">Welcome,</span> <a class="name"><?php echo $sht_ssndata['display_name'];?></a> </div>
          </div>
        </div>
      </div>
      <div class="widget stay-on-collapse" id="widget-sidebar">
        <nav role="navigation" class="widget-body">
          <ul class="acc-menu">
            <li class="nav-separator">Explore</li>
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
            <?php foreach ($menu_make as $value): 
                $this->db->select('*');
                $this->db->from(DB_PREFIX.'admin_user_sub_menu');
                $this->db->where('Main_menu_id',$value->Main_menu_id);
                $query=$this->db->get();
                $result=$query->num_rows();
                if($result==0){
                  ?>
                  <li><a href="<?php echo base_url($value->Main_menu_Link);?>"><i class="fa fa-home"></i><span><?php echo  $value->Main_menu_Title?></span></a></li>
                  <?php
                }else{
                  ?>
                  <li><a href="javascript:void(0);"><i class="fa fa-home"></i><span><?php echo  $value->Main_menu_Title?></span></a>
                    <ul class="acc-menu">
                      <?php 
                      $this->db->select('*');
                      $this->db->from(DB_PREFIX.'admin_user_sub_menu');
                      $this->db->where('Main_menu_id',$value->Main_menu_id);
                      $query=$this->db->get();
                      $results=$query->result();
                       ?>
                      <?php foreach ($results as $values) {
                      ?>
                       <li><a href="<?php echo base_url($values->Sub_menu_Link);?>"><i class="fa fa-home"></i><span><?php echo  $values->Sub_menu_Title?></span></a></li>
                      <?php
                      } ?>
                    </ul>

                  </li>
                  <?php
                }

            ?>
              
            <?php endforeach ?>
            
            
            <li><a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-check"></i><span>Log Out</span></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<!--END SIDEBAR MENU-->