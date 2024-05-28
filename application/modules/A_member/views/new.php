<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/includes/admin_header');?>
<!--BEGIN Style-->
<style type="text/css">
	label span{color: red}
</style>
<!--END Style-->
</head>
<body class="infobar-offcanvas horizontal-nav">
<?php $this->load->view('admin/includes/admin_header_menutop');?>
<div id="wrapper">
  <div id="layout-static">
    <?php //$this->load->view('admin/includes/admin_sidebar'.$metadata['user_type']);?>
    <div class="static-content-wrapper">
      <div class="static-content">
        <div class="page-content">
          <div class="row" style="background: #f5f5f5 none repeat; margin-bottom:20px;">
            <div class="col-md-7">
              <ol class="breadcrumb">
                <li ><a href="<?php echo base_url('admin');?>">Home</a></li>
                <li class="active">New <?php echo $metadata['heading'];?></li>
              </ol>
              <div class="page-heading">
                <h1><?php echo $metadata['heading'];?></h1>
              </div>
            </div>
            <div class="col-md-5">
              <div style="padding:30px 10px; text-align:right;"> <a class="btn btn-label btn-social btn-github" href="<?php echo base_url($optionlistform);?>"><i class="fa fa-bars"></i><?php echo $metadata['heading'].' '.$this->lang->line('List');?></a> </div>
            </div>
          </div>
          <div class="container-fluid">
            <div data-widget-group="group1">
              <?php $attributes = array('id' => 'form_option', 'name'=>'form_option', 'class' => 'form-horizontal', 'style'=>'position:relative;', 'enctype'=>'multipart/form-data' );echo form_open('',$attributes);?>
              <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                  <h2><?php echo $this->lang->line('New').' '.$metadata['heading'];?></h2>
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
									'id' => 'member_name',
									'label' => 'Member Name <span>*</span>',
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($member_name) ? $member_name : '',		
								),
                                
								array(
									'id' => 'employee_id',
									'label' => 'Employee id <span>*</span>',
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($employee_id) ? $employee_id : '',		
								),
								
                                array(
									  'id' => 'organization',
									  'label' => 'Organization <span>*</span>',
									  'autocomplete' => '',
									  'type' => 'dropdown',
									  'options' => $categorylist,
									  'class' => '',
									  'value' => isset($organization) ? $organization : '',
									 ),
								array(
									  'id' => 'gender',
									  'label' => 'Gender',
									  'autocomplete' => '',
									  'type' => 'dropdown',
									  'options' => array('Male' => 'Male','Female' => 'Female'),
									  'class' => '',
									  'value' => isset($gender) ? $gender : '',
									 ),
								array(
									'id' => 'age',
									'label' => 'Age <span>*</span>',
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($age) ? $age : '',		
								),
								
								array(
									'id' => 'contact_no',
									'label' => 'Contact no',
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($contact_no) ? $contact_no : '',		
								),	 
                                
                                array(
									'id' => 'department',
									'label' => 'Department',
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($department) ? $department : '',		
								),
								array(
									'id' => 'designation',
									'label' => 'Designation',
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($designation) ? $designation : '',		
								),
								
								
								array(
									  'id' => 'coverage_period',
									  'label' => 'Coverage period <span>*</span>',
									  'autocomplete' => '',
									  'type' => 'dropdown',
									  'options' => $coveragelist,
									  /* 'options' => array('1 Months' => '1 Months','6 Months' => '6 Months','1 Years' => '1 Years','90 Days' => '90 Days'), */
									  'class' => '',
									  'value' => isset($coverage_period) ? $coverage_period : '',
									 ),
								array(
									'id' => 'start_date',
									'label' => 'Start date <span>*</span>',
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($start_date) ? $start_date : '',		
								),
								
								array(
								  'id' => 'descriptions',
								  'label' => 'Details',
								  'type' => 'input',
								  'placeholder' => '',
								  'class' => 'form-control',
								  'autocomplete' => 'off',
								  'value' => isset($descriptions) ? $descriptions : '',
								  'rows' => '3',
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
              <?php $this->forminput->formpost('form_option',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction",$newform_database, "Added Successfully" ); ?>
              <script type="text/javascript">
function form_acction(msg){	
	if(msg=='Added Successfully'){									
		//var jmpurl='<?php echo base_url($optionlistform);?>';
		//window.location=jmpurl;
		$('#uploadfile_img').attr('src', '<?php echo base_url('user/images/dot.png');?>').width(70);
    
		
        $("#form_option")[0].reset();
        reset_filename('');

        $('#descriptions').next().next().next().remove();
        $('#descriptions').next().next().remove();
        $('#descriptions').next().remove();
        generate_wysiwyg('descriptions');
		
	}
} 
function form_reset(){
	$("#form_option")[0].reset();
	reset_filename('');        
}
function uploadfile_fn(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();                      
    reader.onload = function (e) {
      $('#uploadfile_img').attr('src', e.target.result).width(70);
    };                      
    reader.readAsDataURL(input.files[0]);
  }
}

    $(function () {
        $('#start_date').datepicker({
            format: 'yyyy-mm-dd'
        });
    });

           
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
 <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>admin_dir/plugins/fileupload/custom-file-input.css">
<script src="<?php echo base_url();?>admin_dir/plugins/fileupload/custom-file-input.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/wysiwyg/wysiwyg.js"></script> 
<script>generate_wysiwyg('descriptions');</script> 

<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>      			<!-- Datepicker -->
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> 	<!-- DateTime Picker -->


<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/form-daterangepicker/moment.min.js"></script>              			<!-- Moment.js for Date Range Picker -->
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/form-daterangepicker/daterangepicker.js"></script>     				<!-- Date Range Picker -->

<script type="text/javascript" src="<?php echo base_url();?>admin_dir/demo/demo-pickers.js"></script>
 

<!-- End loading page level scripts-->
</body>
</html>