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
                    
	



                  
                      <!-- <table id="datalist" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
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
                      </table> --> 
                      <table id="employee_data" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                            <thead>
                                <tr>
                                    
                                    
                                    <th data-column-id="employee_id">Member ID</th>
									<th data-column-id="member_name">Name</th>
									<th data-column-id="gender">Gender</th>
									<th data-column-id="age">Age</th>
									<th data-column-id="organization_name">Factory</th>							
		                            <th data-column-id="coverage">Coverage</th>
									<th data-column-id="start_date">Start Date</th>
									<th data-column-id="end_date">End Date</th>
									<th data-column-id="coverage_amount">Coverage Amount</th>
									<th data-column-id="av_blance">Av. Blance</th>
									<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
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

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    var employeeTable = $('#employee_data').bootgrid({
        ajax:true,
        rowSelect: true,
        post:function()
        {
            return{
                id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
            }
        },
        url:"<?php echo base_url(); ?>a_member/fetch_data",
        formatters:{
            "commands":function(column, row)
            {
                return "<button type='button' class='btn btn-warning update' data-row-id='"+row.id+"'>Edit</button>" + "&nbsp; <button type='button' class='btn btn-danger delete' data-row-id='"+row.id+"'>Delete</button>";
            }
        }
    });

    $('#add_button').click(function(){
        $('#employee_form')[0].reset();
        //$('.modal-title').text("Add Employee");
        $('#action').val("Add");
        $('#operation').val("Add");
    });



    $(document).on("loaded.rs.jquery.bootgrid", function(){        

        employeeTable.find('.delete').on('click', function(event){
            if(confirm("Are you sure you want to delete this?"))
            {
                var id = $(this).data('row-id');
                $.ajax({
                    url:"<?php echo base_url(); ?>symptoms/delete_data",
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                        alert(data);
                        $('#employee_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                return false;
            }
        });
    });
    
});
</script>




<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/datatables/dataTables.bootstrap.js"></script>

<!-- End loading page level scripts-->
</body>
</html>