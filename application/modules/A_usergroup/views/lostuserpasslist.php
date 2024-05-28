<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/includes/admin_header');?>
<!--BEGIN Style-->

<link type="text/css" href="<?php echo base_url();?>admin_dir/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url();?>admin_dir/plugins/datatables/dataTables.fontAwesome.css" rel="stylesheet">


<!--END Style-->
</head>
<body class="infobar-offcanvas">
<?php $this->load->view('admin/includes/admin_header_menu');?>
<div id="wrapper">
  <div id="layout-static">
    <?php $this->load->view('admin/includes/admin_sidebar');?>
    <div class="static-content-wrapper">
      <div class="static-content">
        <div class="page-content">
          <div class="row" style="background: #f5f5f5 none repeat; margin-bottom:20px;">
            <div class="col-md-7">
              <ol class="breadcrumb">
                <li ><a href="<?php echo base_url('admin');?>">Home</a></li>
                <li class="active"><?php echo $metadata['heading'].' '.$this->lang->line('List');?></li>
              </ol>
              <div class="page-heading"><h1><?php echo $metadata['heading'];?></h1></div>
            </div>
            <div class="col-md-5">
            	<div style="padding:30px 10px; text-align:right;">
                    <a class="btn btn-label btn-social btn-github" href="javascript:void(0)"><i class="fa fa-plus"></i><?php echo $this->lang->line('New').' '.$metadata['heading'];?></a>
                </div>
             </div>
          </div>
          <div class="container-fluid">
            <div data-widget-group="group1"> 
            
            
            
            
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <h2><?php echo $metadata['heading'].' '.$this->lang->line('List');?></h2>
                    </div>
                    <div class="panel-editbox" data-widget-controls=""></div>
                    <div class="panel-body">
                    
                    
<script type="text/javascript">
var table;
$(document).ready(function() {			
	datalist = $('#datalist').DataTable({
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "<?php echo base_url($ajaxlist);?>",				
		"sAjaxDataProp": "data",
		"aLengthMenu": [[10, 25, 50, 100, 200], [10, 25, 50, 100, 200]],
		"aaSorting": [ [0, "asc" ]],
		// set the initial value
		"iDisplayLength": 10,
		"oLanguage": {
			"sProcessing": "",
			"sLengthMenu": "<span class='lengthLabel'>Records per page :</span> _MENU_",
		},                
		"columns": [                    
			<?php
			for($i=0;$i<sizeof($field_name_as_header);$i++)
				echo '{"data": "'.$field_name_as_header[$i].'"}, ';
			?>			
		],            
		"fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
			var csrf = {"name": "token", "value": CFG.token };
                  aoData.push(csrf);
			oSettings.jqXHR = $.ajax( { 
				"dataType": 'json',
				"type": "POST",
				"url": sSource,
				"data": aoData,
				"success": fnCallback,
				"error": function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest);
					console.log(textStatus);
					console.log(errorThrown);
				}
			} );
		},				
		//Set column definition initialisation properties.
		"columnDefs": [
			{
			  "targets": [ -1 ], //last column
			  "orderable": false, //set not orderable
			},
		],			
						   
	});
				
});		
</script>		

<script type="text/javascript">
  var save_method; //for save method string
  function reload_table(){
	  datalist.ajax.reload(null,false); //reload datatable ajax
  }
  function edit_record(id){	
	<?php if($this->config->item('one_click_edit')!=1){?>
	if(confirm('Are you sure edit this data?')){
	<?php }?>
	  	// ajax delete data to database
		var jmpurl="<?php echo base_url($data_edit);?>/"+id;
		window.location=jmpurl;
	<?php if($this->config->item('one_click_edit')!=1){?>
	}
	<?php }?>
  }
  function assign_level(id)
  {
	
	$.ajax({
			  url : "<?php //echo base_url($data_assign)?>/"+id,
			  type: "POST",
			  dataType: "JSON",
			  success: function(data){
				 //if success reload ajax table
				 //reload_table();
				 alert(data);
			  },
			  error: function (jqXHR, textStatus, errorThrown){
				 alert('Error adding / update data');
			  }
		});
  }
  
  
  function delete_record(id){	
	<?php if($this->config->item('one_click_delete')!=1){?>
	if(confirm('Are you sure delete this data?')){
	<?php }?>
	  	// ajax delete data to database
		$.ajax({
			  url : "<?php echo base_url($data_delete)?>/"+id,
			  type: "POST",
			  dataType: "JSON",
			  success: function(data){
				 //if success reload ajax table
				 reload_table();
			  },
			  error: function (jqXHR, textStatus, errorThrown){
				 alert('Error adding / update data');
			  }
		});
	<?php if($this->config->item('one_click_delete')!=1){?>
	}
	<?php }?>
  }
  
  function action_status(id,status,reid){
	<?php if($this->config->item('one_click_status_change')!=1){?>
	if(confirm('Are you sure change this status?')){
	<?php }?>    
		// ajax delete data to database
		$.ajax({
			  url : "<?php echo base_url($data_status)?>/"+id+"/"+status+"/"+reid,
			  type: "POST",
			  dataType: "JSON",
			  success: function(data){
				 //if success reload ajax table
				 reload_table();
			  },
			  error: function (jqXHR, textStatus, errorThrown){
				  alert('Error adding / update data');
			  }
		});
	<?php if($this->config->item('one_click_status_change')!=1){?>
	}
	<?php }?>
  }
  
  function action_security(id,status){
	<?php if($this->config->item('one_click_status_change')!=1){?>
	if(confirm('Are you sure change this status?')){
	<?php }?>    
		// ajax delete data to database
		$.ajax({
			  url : "<?php echo base_url($data_security)?>/"+id+"/"+status,
			  type: "POST",
			  dataType: "JSON",
			  success: function(data){
				 //if success reload ajax table
				 reload_table();
			  },
			  error: function (jqXHR, textStatus, errorThrown){
				  alert('Error adding / update data');
			  }
		});
	<?php if($this->config->item('one_click_status_change')!=1){?>
	}
	<?php }?>
  }
  
  
  
  
  
  
</script>

                  
                      <table id="datalist" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                        <thead>
                          <tr>
                            <th><?php echo $this->lang->line('User_Group_Name'); ?></th>
                            <th><?php echo $this->lang->line('User_Name'); ?></th>
                            <th><?php echo $this->lang->line('Display_Name'); ?></th>
                            <th><?php echo $this->lang->line('Email'); ?></th>  
                                               
                            <th width="80px"><?php echo $this->lang->line('Status'); ?></th>                           
                          </tr>
                        </thead>
                      </table> 
                                              
                    </div>
                </div>            
            
            
            
            
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

<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/datatables/dataTables.bootstrap.js"></script>

<!-- End loading page level scripts-->
</body>
</html>