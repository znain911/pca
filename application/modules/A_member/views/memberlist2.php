<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('admin/includes/admin_header');?>
<!--BEGIN Style-->

<!--END Style-->
</head>
<body class="infobar-overlay horizontal-nav">
<?php $this->load->view('admin/includes/admin_header_menutop');?>
<div id="wrapper">
  <div id="layout-static">
    <?php //$this->load->view('admin/includes/admin_sidebar1');?>
    <div class="static-content-wrapper">
      <div class="static-content">
        <div class="page-content">
          
          <div class="container-fluid">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-5">
                            <h3 class="panel-title"><?php echo $metadata['heading'];?> List</h3>
                        </div>
                        <div class="col-md-5">
                            <form method="post" id="import_form" enctype="multipart/form-data" style="float:left;">
                                <input type="file" name="file" id="file" required accept=".xls, .xlsx" align="" style="float:left;" />
                                <button type="submit" name="import" class="btn btn-label btn-social btn-github"><i class="fa fa-upload"></i> Import</button> 
                            </form>
                            <form method="post" action="<?php echo base_url(); ?>symptoms/eporttoxls">                               
                                <button type="submit" name="import" class="btn btn-label btn-success btn-github"><i class="fa fa-download"></i> Export</button>
                            </form>
                        </div>
                        <div class="col-md-2" align="right">
                            <button type="button" id="add_button" data-toggle="modal" data-target="#employeeModal" class="btn btn-label btn-social btn-github"><i class="fa fa-plus"></i> Add <?php echo $metadata['heading'];?></button>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <!--<div class="table-responsive">-->
                        <table id="employee_data" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                            <thead>
                                <tr>
                                    <th data-column-id="symptoms_name">Symptoms Name</th>
                                    <th data-column-id="symptoms_code">Symptoms Code</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
                                </tr>
                            </thead>
                        </table>
                    <!--</div>-->
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
                symptoms_id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
            }
        },
        url:"<?php echo base_url(); ?>symptoms/fetch_data",
        formatters:{
            "commands":function(column, row)
            {
                return "<button type='button' class='btn btn-warning update' data-row-id='"+row.symptoms_id+"'>Edit</button>" + "&nbsp; <button type='button' class='btn btn-danger delete' data-row-id='"+row.symptoms_id+"'>Delete</button>";
            }
        }
    });

    $('#add_button').click(function(){
        $('#employee_form')[0].reset();
        //$('.modal-title').text("Add Employee");
        $('#action').val("Add");
        $('#operation').val("Add");
    });

    $(document).on('submit', '#employee_form', function(event){
        event.preventDefault();
        var symptoms_name = $('#symptoms_name').val();
        var form_data = $(this).serialize();
        if(symptoms_name != '')
        {
            $.ajax({
                url:"<?php echo base_url(); ?>symptoms/action",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    alert(data);
                    $('#employee_form')[0].reset();
                    $('#employeeModal').modal('hide');
                    $('#employee_data').bootgrid('reload');
                }
            });
        }
        else
        {
            alert("All Fields are Required");
        }
    });

    $(document).on("loaded.rs.jquery.bootgrid", function(){
        employeeTable.find('.update').on('click', function(event){
            var id = $(this).data('row-id');
            $.ajax({
                url:"<?php echo base_url(); ?>symptoms/fetch_single_data",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data)
                {
                    $('#employeeModal').modal('show');
                    $('#symptoms_name').val(data.symptoms_name);
                    $('#symptoms_code').val(data.symptoms_code);
                    $('.modal-title').text("Edit Symptoms Details");
                    $('#employee_id').val(id);
                    $('#action').val('Edit');
                    $('#operation').val('Edit');
                }
            });
        });

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
    
    
    
    $('#import_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"<?php echo base_url(); ?>symptoms/importfromxls",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    $('#file').val('');
                    $('#employee_data').bootgrid('reload');
                    alert(data);
                }
            })
        });
    
    
    
    
    
    
});
</script>

<!-- End loading page level scripts-->
</body>
</html>

 <div id="employeeModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="employee_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add <?php echo $metadata['heading'];?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Symptoms Name</label>
                        <input type="text" name="symptoms_name" id="symptoms_name" class="form-control" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <label>Symptoms Code</label>
                        <input type="text" name="symptoms_code" id="symptoms_code" class="form-control" autocomplete="off" />
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="employee_id" id="employee_id" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>