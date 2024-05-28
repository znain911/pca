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
                <li class="active"> <?php echo $this->lang->line('New').' '.$metadata['heading'];?></li>
              </ol>
              <div class="page-heading">
                <h1><?php echo $metadata['heading'];?></h1>
              </div>
            </div>
            <div class="col-md-5">
              <div style="padding:30px 10px; text-align:right;"> <a class="btn btn-label btn-social btn-github" href="<?php echo base_url($listform);?>"><i class="fa fa-bars"></i><?php echo $metadata['heading'].' '.$this->lang->line('List');?> </a> </div>
            </div>
          </div>
          <div class="container-fluid">
            <div data-widget-group="group1">
              <?php $attributes = array('id' => 'form_usergroup', 'name'=>'form_usergroup', 'class' => 'form-horizontal', 'style'=>'position:relative;', 'enctype'=>'multipart/form-data' );echo form_open('',$attributes);?>
              <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                  <h2> <?php echo $this->lang->line('New').' '.$metadata['heading'];?></h2>
                </div>
                <div class="panel-editbox" data-widget-controls=""></div>
                <div class="panel-body">
                  <?php
							$this->form_engine->init(array(
								'default_input_container_class' => 'form-group',
								'bootstrap_required_input_class' => 'form-control',
								'default_control_label_class' => 'col-md-2 control-label',
								'default_form_control_class' => 'col-md-8',    
							));
							
							$form_options = array(
								array(
									  'id' => 'Usergroup_Id',
									  'label' => $this->lang->line('User_Group_Name'),
									  'autocomplete' => '',
									  'type' => 'dropdown',
									  'options' => $groupes,
									  'class' => '',
									  'value' => isset($Usergroup_Id) ? $Usergroup_Id : '',
									 ),
                                array(
									  'id' => 'Designation_Id',
									  'label' => $this->lang->line('User_Designation'),
									  'autocomplete' => '',
									  'type' => 'dropdown',
									  'options' => $designations,
									  'class' => '',
									  'value' => isset($Designation_Id) ? $Designation_Id : '',
									 ),
								array(
									'id' => 'User_Login',
									'label' => $this->lang->line('User_Name'),
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($User_Login) ? $User_Login : '',		
								),
								array(
									'id' => 'Display_Name',
									'label' => $this->lang->line('Display_Name'),
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($Display_Name) ? $Display_Name : '',		
								),
								array(
									'id' => 'User_Password',
									'label' => $this->lang->line('User_Password'),
									'type' => 'password',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($User_Password) ? $User_Password : '',		
								),
								array(
									'id' => 'Contact_No',
									'label' => $this->lang->line('Contact_No'),
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($Contact_No) ? $Contact_No : '',		
								),
								array(
									'id' => 'User_Email',
									'label' => $this->lang->line('Email'),
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($User_Email) ? $User_Email : '',		
								),
								array(
									'id' => 'User_Address',
									'label' => $this->lang->line('Address'),
									'type' => 'textarea',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($User_Address) ? $User_Address : '',
									'rows' => '3',		
								),
								array(
									'id' => 'uploadfile',
									'label' => $this->lang->line('Image'),
									'type' => 'file',
									'class' => 'inputfile inputfile-1',
									'onchange' => 'uploadfile_fn(this);',
									'data-multiple-caption' => '{count} files selected',
									'style' => 'border:none !important; padding: 0px 0px !important;',
									'input_addons' => array(
											'pre_html' =>  '<div class="inputfilebox">',
											'post_html' => '<label for="uploadfile"><i class="fa fa-upload"></i> <span>Choose a file&hellip;</span></label><img id="uploadfile_img"  class="inputimg" src="'.base_url('user/images/dot.png').'" alt="" />',
											'pre' => ''
									),
								),
									
								
							);
							
							echo $this->form_engine->build_form_horizontal($form_options);
							?>
                  <div class="panel-footer">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="errormessage"></div>
                      </div>
                      <div class="col-md-8">
                        <button type="submit" class="btn-primary btn btn-lg"><?php echo $this->lang->line('Save'); ?></button>
                        <button onClick="form_reset();" type="button" class="btn-default btn btn-lg"><?php echo $this->lang->line('Cancel'); ?></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
              <?php $this->forminput->formpost('form_usergroup',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction",$newform_database, "Added Successfully" ); ?>
              <script type="text/javascript">
function form_acction(msg){	
	if(msg=='Added Successfully'){									
		//var jmpurl='<?php echo base_url($listform);?>';
		//window.location=jmpurl;
		$("#form_usergroup")[0].reset();
        reset_filename('');
	}
} 
function form_reset(){
	$("#form_usergroup")[0].reset();
	reset_filename('');        
}           
</script> 

<script>
	function uploadfile_fn(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();                      
			reader.onload = function (e) {
				$('#uploadfile_img').attr('src', e.target.result).width(70);
			};                      
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

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