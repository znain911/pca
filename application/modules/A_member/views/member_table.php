<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/includes/admin_header');?>

    <link type="text/css" href="<?php echo base_url();?>admin_dir/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
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
	                                

	                                
	                                <div class="col-md-12">	                                	
			                            <form id="form-filter" action="<?php echo site_url('a_member/member_eporttoxls')?>"  method="post" id="export_form" enctype="multipart/form-data">
			                            
										<div class="form-group col-md-1">
										  <label class="control-label" for="monthyear">Month:</label>
			                               
			                                <select class="form-control" id="monthyear" name="monthyear">
			                                    <option value="">All</option>       
												<option value="01">January</option>
												<option value="02">February</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06">June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
			                                </select>										
										</div>


										<div class="form-group col-md-1">
											<label class="control-label" for="onlyyear">Year:</label>
			                                
			                                <select class="form-control" id="onlyyear" name="onlyyear">
			                                    <option value="">All</option>      
												<?php foreach ($get_mbryear as $pyear) {?>
													<option value="<?php echo $pyear->start_date;?>"><?php echo $pyear->start_date;?></option>
												<?php }?>
			                                </select>
										</div>


										<div class="form-group col-md-1">
										  <label class="control-label" for="gender">Gender:</label>	
											<select class="form-control" id="gender" name="gender">
			                                    <option value="">All</option>
			                                    <option value="Male">Male</option>
												<option value="Female">Female</option>
			                                  </select>
			                               
										</div>
										<div class="form-group col-md-2">
										  <label class="control-label" for="factory">Factory:</label>	
											<select class="form-control" id="factory" name="factory">
			                                    <option value="">All</option>
			                                    <?php foreach ($factory_list as $flist) {?>
			                                    	<option value="<?php echo $flist->organization_head;?>"><?php echo $flist->organization_head;?></option>
			                                    <?php } ?>
			                                  </select>
										</div>
										<div class="form-group col-md-2">
										  <label class="control-label" for="">&nbsp;</label><br>
										  <button type="button" id="btn-reset" class="btn btn-lg btn-warning pull-right">Reset</button>
                            				<button type="button" id="btn-filter" class="btn btn-lg btn-primary pull-right">Search</button>
										</div>
										<div class="col-md-5">
											<div style="height: 25px; clear: both;"></div>
											<a class="btn btn-lg btn-info pull-right" href="<?php echo base_url('a_member/new_member');?>"><i class="fa fa-plus"></i> New Member</a>
											
											
			                                	<button type="submit" name="export" class="btn btn-lg btn-github pull-right" id="btn-export"><i class="fa fa-download"></i> Export</button></form>


											<form method="post" id="import_form" enctype="multipart/form-data" class="pull-right" style="">
			                                	<button type="submit" name="import" class="btn btn-lg btn-success pull-right"><i class="fa fa-upload"></i> Import</button><br>
			                                	<input type="file" name="file" id="file" required accept=".xls, .xlsx" align="" class="pull-right" style="margin-top: 10px" />
			                                 
			                            	</form>

										</div>

										

										

									
	                                </div>
                            	</div>	
					             
                            </div>
                            <div class="container-fluid">
                                
<div class="row" data-widget-group="group1">
	<div class="col-md-12">
		<?php 
		/*$datetime1 = new DateTime("2020-01-02");

$datetime2 = new DateTime("2021-01-02");

$difference = $datetime1->diff($datetime2);

echo 'Difference: '.$difference->y.' years, ' 
                   .$difference->m.' months, ' 
                   .$difference->d.' days, '
                   .$difference->days.' days';*/

                   /*$days = (strtotime("2020-01-02") - strtotime(date("Y-m-d"))) / (60 * 60 * 24);
                   echo $days;
                   if(date("Y-m-d") > "2019-01-01"){
                   	echo 'Renew';
                   }else{
                   	echo $days;
                   }*/
		?>
		<div class="panel panel-default" id="panel-tabletools" >
			<div class="panel-heading">
				<h2>Number of Member: <strong id="totalmbr"></strong> </h2>
				<div class="panel-ctrls"
				>
				</div>
			</div>
			<div class="panel-body panel-no-padding" >
				<div style="height: 20px; clear: both;"></div>
				

		        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
					            <thead>
					                <tr>
					                    <th>No</th>
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
										<th>Renewal</th>							
										<th>Action</th>
					                </tr>
					            </thead>
					            <tbody>
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
    
<script src="<?php echo base_url('admin_dir/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('admin_dir/datatables/js/dataTables.bootstrap.min.js')?>"></script>
<script type="text/javascript">
	var table;

	$(document).ready(function() {

	    //datatables
	    table = $('#table').DataTable({ 

	        "processing": true, //Feature control the processing indicator.
	        "serverSide": true, //Feature control DataTables' server-side processing mode.
	        "order": [], //Initial no order.

	        // Load data for the table's content from an Ajax source
	        "ajax": {
	            "url": "<?php echo site_url('a_member/memberajax_list')?>",
	            "type": "POST",
	            "data": function ( data ) {
	                data.gender = $('#gender').val();
	                data.factory = $('#factory').val();
	                data.onlyyear = $('#onlyyear').val();
	                data.monthyear = $('#monthyear').val();
	            }
	        },
	        drawCallback:function(settings)
		    {		     
		     $('#totalmbr').html(settings.json.recordsFiltered);
		    },
	        //Set column definition initialisation properties.
	        "columnDefs": [
	        { 
	            "targets": [ 0,1,2,3,4,5,6,7,8,9,10,11 ], //first column / numbering column
	            "orderable": false, //set not orderable
	        },
	        ],

	    });

	    $('#btn-filter').click(function(){ //button filter event click
	        table.ajax.reload();  //just reload table
	    });
	    $('#btn-reset').click(function(){ //button reset event click
	        $('#form-filter')[0].reset();
	        table.ajax.reload();  //just reload table
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
				 table.ajax.reload();
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
                    alert(data);
                    table.ajax.reload();
                }
            })
        });

	$('#export_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"<?php echo base_url(); ?>a_member/member_eporttoxls",
                method:"POST",
                data:new FormData(this),
                success:function(data){
                    /*$('#file').val('');                    
                    alert(data);
                    table.ajax.reload();*/
                     alert('Export Successful');
                }
            })
        });


    });


   
</script>

<script type="text/javascript">
    $(function () {
        $('#from_date').datepicker({
            /*format: 'yyyy-mm-dd'*/
            format: 'dd-mm-yyyy'
        });
        $('#to_date').datepicker({
            format: 'dd-mm-yyyy'
        });
        
    });
$('#btn-export33').click(function(){ //button reset event click        

        /*$.ajax({
            type: "POST",
            url: "<?php echo site_url('a_member/member_eporttoxls')?>",
            "data": function ( data ) {
	                data.gender = $('#gender').val();
	                data.factory = $('#factory').val();
	                data.onlyyear = $('#onlyyear').val();
	                data.monthyear = $('#monthyear').val();
	            }
            success: function(data){
                alert('Successful!');
                
            }

        });*/
        
        /*var gender = $('#gender').val();
	    var factory = $('#factory').val();
	    var onlyyear = $('#onlyyear').val();
	    var monthyear = $('#monthyear').val();
	    var route="<?php echo base_url("a_member/member_eporttoxls"); ?>";

	    $.post(route,
	        {
	            gender:gender, 
	            factory:factory,
	            onlyyear:onlyyear,
	            monthyear:monthyear,           
	        },
	        function(data, status)
	        {
	            alert('Export Successful')
	        });*/
    });
	
</script>
    <!-- End loading page level scripts-->

    </body>
</html>