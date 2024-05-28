<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/includes/admin_header');?>

    <link type="text/css" href="<?php echo base_url();?>admin_dir/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url();?>admin_dir/plugins/datatables/dataTables.fontAwesome.css" rel="stylesheet"> 					<!-- FontAwesome Support for Datatables -->
<script> 
	var rootpath='<?php echo base_url('');?>';
	var imageuploadurl='<?php echo $metadata['imageuploadurl'];?>';
</script>

    </head>

    <body class="infobar-offcanvas horizontal-nav">
        <?php $this->load->view('admin/includes/admin_header_menutop');?>


        <div id="wrapper">
            <div id="layout-static">
                
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            <ol class="breadcrumb">

<li class="active"><a href="#">Member List</a></li>

                            </ol>
                            <div class="page-heading">            
                                <div class="row">
                                	
                                	<h1 class="col-md-6">Member List <small>Total Members: <?php echo $totalmember; ?></small></h1>
                                	<div class="col-md-6">
					            	<div style="float: right;">
					                    <a class="btn btn-label btn-social btn-github" href="<?php echo base_url('a_member/new_member');?>"><i class="fa fa-plus"></i> New Member</a>
					                </div>

					                <div style="float: left;">
			                            <form method="post" id="import_form" enctype="multipart/form-data" style="float:left;">
			                                <input type="file" name="file" id="file" required accept=".xls, .xlsx" align="" style="float:left;" />
			                                <button type="submit" name="import" class="btn btn-label btn-social btn-github"><i class="fa fa-upload"></i> Import</button> 
			                            </form>
			                            
									</div>
								</div>
                                </div>
                                	
					             
                            </div>
                            <div class="container-fluid">
                                
<div class="row" data-widget-group="group1">
	<div class="col-md-12">
		
		<div class="panel panel-default" id="panel-tabletools" data-widget='{"draggable":"false"}'>
			<div class="panel-heading">
				<h2>Members</h2>
				<div class="panel-ctrls"
				>
				</div>
			</div>
			
			<div class="panel-body panel-no-padding">

				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
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
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						
						<?php foreach($memberlist as $mlist){?>
						<tr class="gradeU">
							<td><?php echo $mlist->employee_id;?></td>
							<td><?php echo $mlist->member_name;?></td>
							<td><?php echo $mlist->gender;?></td>
							<td><?php echo $mlist->age;?></td>
							<td><?php echo $mlist->organization_name;?></td>
							<td><?php echo $mlist->coverage_period;?></td>
							<td><?php echo $mlist->start_date;?></td>
							<td><?php echo $mlist->end_date;?></td>
							<td><?php echo $mlist->coverage_amount;?></td>
							<td class="center"><?php $this->querylib->avl_balance($mlist->employee_id,$mlist->coverage_amount);?> </td>
							<!-- <td>dd</td> -->

							<td><span class="actions"><a class="btn btn-success " title="Edit" href="<?php echo base_url('a_member/member_update').'/'.$mlist->id; ?>"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-danger " title="Delete" href="javascript:void(0)" onclick="delete_record('1055')"><i class="fa fa-times"></i> Delete</a></span></td>
						</tr>
						<?php }?>
						
						
					</tbody>
				</table>

				<div class="panel-footer"></div>
			</div>
		</div>
	</div>


</div>

                            </div> <!-- .container-fluid -->
                        </div> <!-- #page-content -->
                    </div>
                    <?php $this->load->view('admin/includes/admin_tinyfooter');?>
                </div>
            </div>
        </div>



    
    <!-- Load page level scripts-->
    
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_dir/demo/demo-datatables.js"></script>
<script type="text/javascript">
	 function delete_record(id){	
	<?php if($this->config->item('one_click_delete')!=1){?>
	if(confirm('Are you sure delete this data?')){
	<?php }?>
	  	// ajax delete data to database
		$.ajax({
			  url : "<?php echo base_url('a_member/member_delete')?>/"+id,
			  type: "POST",
			  dataType: "JSON",
			  success: function(data){
				 //if success reload ajax table
				 //reload_table();
				 alert('Delete successful')
				 $('#example').DataTable().ajax.reload();
			  },
			  error: function (jqXHR, textStatus, errorThrown){
				 alert('Error adding / update data');
			  }
		});
	<?php if($this->config->item('one_click_delete')!=1){?>
	}
	<?php }?>
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
                    //reload_table();
                    alert(data);
                }
            })
        });

    });
</script>

    <!-- End loading page level scripts-->

    </body>
</html>