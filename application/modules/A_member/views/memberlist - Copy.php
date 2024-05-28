<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/includes/admin_header');?>
<!--BEGIN Style-->

<link type="text/css" href="<?php echo base_url();?>admin_dir/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url();?>admin_dir/plugins/datatables/dataTables.fontAwesome.css" rel="stylesheet">


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
            <div class="col-md-4">
              <ol class="breadcrumb">
                <li ><a href="<?php echo base_url('admin');?>">Home</a></li>
                <li class="active"><?php echo $metadata['heading'].' '.$this->lang->line('List');?> </li>
              </ol>
              <div class="page-heading"><h1><?php echo $metadata['heading'];?> <small>Total Members: <?php echo $totalmember; ?></small></h1></div>
            </div>
			<div class="col-md-5">
				<div style="padding:30px 0px; text-align:right;">
                            <form method="post" id="import_form" enctype="multipart/form-data" style="float:left;">
                                <input type="file" name="file" id="file" required accept=".xls, .xlsx" align="" style="float:left;" />
                                <button type="submit" name="import" class="btn btn-label btn-social btn-github"><i class="fa fa-upload"></i> Import</button> 
                            </form>
                            <!--<form method="post" action="<?php echo base_url(); ?>symptoms/eporttoxls">                               
                                <button type="submit" name="import" class="btn btn-label btn-success btn-github"><i class="fa fa-download"></i> Export</button>
                            </form>-->
					</div>
            </div>
            <div class="col-md-3">
            	<div style="padding:30px 10px; text-align:right;">
                    <a class="btn btn-label btn-social btn-github" href="<?php echo base_url($newform);?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line('New').' '.$metadata['heading'];?></a>
                </div>
             </div>
          </div>
          <div class="container-fluid">
            <div data-widget-group="group1"> 
            
            
            
            
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <h2><?php echo $metadata['heading'].' '.$this->lang->line('List');?> </h2>
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
		"aaSorting": [ [0, "DESC" ]],
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
			  "targets": [ -2 ], //last column
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
  
  $(document).ready(function(){
        $('#import_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"<?php echo base_url(); ?>a_member/importfromxls",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    $('#file').val('');
                    reload_table();
                    alert(data);
                }
            })
        });

    });
  
  
  
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
  
  function action_status(id,status){
	<?php if($this->config->item('one_click_status_change')!=1){?>
	if(confirm('Are you sure change this status?')){
	<?php }?>    
		// ajax delete data to database
		$.ajax({
			  url : "<?php echo base_url($data_status)?>/"+id+"/"+status,
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
                            <th>Member ID</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Factory</th>							
                            <th>Coverage</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Coverage Amount</th>
							<th>Av. Blance</th>
                            <th width="150px">Action</th>
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