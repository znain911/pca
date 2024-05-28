<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/includes/admin_header');?>
<!--BEGIN Style-->

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
									  'id' => 'organization',
									  'label' => 'Organization',
									  'autocomplete' => '',
									  'type' => 'dropdown',
									  'options' => $categorylist,
									  'class' => '',
									  'value' => isset($organization) ? $organization : '',
									 ),
								
								array(
									  'id' => 'coverage_period',
									  'label' => 'Coverage period',
									  'autocomplete' => '',
									  'type' => 'dropdown',
									  'options' => $coveragelist,
									  'class' => '',
									  'value' => isset($coverage_period) ? $coverage_period : '',
									 ),
								array(
									'id' => 'start_date',
									'label' => 'Start date',
									'type' => 'input',
									'placeholder' => '',
									'class' => 'form-control',
									'autocomplete' => 'off',
									'value' => isset($start_date) ? $start_date : '',		
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
		var jmpurl='<?php echo base_url($optionlistform);?>';
		window.location=jmpurl;
		
    
		
        $("#form_option")[0].reset();
        reset_filename('');

		
	}
} 
function form_reset(){
	$("#form_option")[0].reset();
	reset_filename('');        
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


<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>      			<!-- Datepicker -->
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> 	<!-- DateTime Picker -->


<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/form-daterangepicker/moment.min.js"></script>              			<!-- Moment.js for Date Range Picker -->
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/form-daterangepicker/daterangepicker.js"></script>     				<!-- Date Range Picker -->

<script type="text/javascript" src="<?php echo base_url();?>admin_dir/demo/demo-pickers.js"></script>
 

<!-- End loading page level scripts-->
</body>
</html>