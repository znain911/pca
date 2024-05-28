<!DOCTYPE html>

<html lang="en">

<head>

<?php $this->load->view('admin/includes/admin_header');?>

<!--BEGIN Style-->


<!--END Style-->

</head>

<body class="infobar-offcanvas">

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

                <li class="active"><?php echo $metadata['heading'].' '.$this->lang->line('List');?> </li>

              </ol>

              <div class="page-heading">

                <h1></h1>

              </div>

            </div>

            <div class="col-md-5">

              <div style="padding:30px 10px; text-align:right;"> </div>

            </div>

          </div>

          <div class="container-fluid">

            <div data-widget-group="group1">

              <div class="panel panel-default" data-widget='{"draggable": "false"}'>

                <div class="panel-heading">

                  <h2>Product Option</h2>

                </div>

                <div class="panel-editbox" data-widget-controls=""></div>

                <div class="panel-body">

                  <form method="post" id="frm_assign2" action="<?php  echo base_url($newform) ; ?>" enctype="multipart/form-data">

                    <div class="row">

                      <div class="form-group">

                        <div class="col-md-3">

                          <label for="option_type" class="control-label">Option Type</label>

                          <select id="option_type" name="option_type" class="form-control">

                            <option value="">== Select Option Type ==</option>

                            

                          </select>

                          <span class="form-error" id="error-option_type"></span>

                          <input type="hidden" value="<?php echo $p_info->Product_Id; ?>" name="product_id" id="product_id" />

                          <div class="optionlist" style="width:100%;"></div>

                        </div>

                        <div class="col-md-3">

                          <label for="option_id" class="control-label">Option</label>

                          <select id="option_id" name="option_id" class="form-control">

                            <option value=""> Select Option </option>

                          </select>

                          <span class="form-error" id="error-option_id"></span>

                          

                         

                        </div>

                        <div class="col-md-1 text-left">

                          <label for="price" class="control-label">Prefix</label>

                          <select id="price_prefix" name="price_prefix" class="form-control">

                            <option value="+">+</option>

                            <option value="-">-</option>

                          </select>

                          <span class="form-error" id="error-price"></span> </div>

                        <div class="col-md-2 text-left">

                          <label for="optionprice" class="control-label">Price</label>

                          <input type="text" class="form-control" value="" name="optionprice" id="optionprice" />

                          <span class="form-error" id="error-optionprice"></span> </div>

                        <div class="col-md-2 text-right">

                          <button class="btn btn-success btn-lg" id="submitbtn2">Save</button>

                        </div>

                        <div class="col-md-4">

                          <div class="errormessage"></div>

                        </div>

                      </div>

                    </div>

                  </form>

                  <?php $this->forminput->formpost('frm_assign2',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn2","form_acction",$newform,'Added Successfully'  ); ?>

                  <script type="text/javascript">

					function form_acction(msg){	

						if(msg=='Added Successfully'){

							/* var jmpurl='<?php echo base_url($ajaxlist);?>';

							window.location=jmpurl; */

							reload_table();

							$("#frm_assign2")[0].reset();

							reset_filename('');

						}

					} 

					function form_reset(){

						$("#frm_assign2")[0].reset();

						reset_filename('');        

					}

							

					</script> 

                </div>

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

                        <th>Option Type</th>

                        <th>Option</th>

                        <th>Prefix</th>

                        <th>Price</th>

                        <th>Added Date</th>

                        <th>status</th>

                        <th width="80px">Action</th>

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

<script type="text/javascript" src="<?php echo base_url();?>admin_dir/demo/demo-formcomponents.js"></script> 

<!-- End loading page level scripts--> 



<script>

 $("#option_type").change(function() {
     
 var select = $("#option_type option:selected").val();
 if(select != 0){
 var html_content = '';

     $.ajax({

            type: "POST",

            url: "<?php echo base_url('a_product/get_optionbycat')?>",

            data: {
                option_type: select
            },

            dataType: "json",

            success: function (data) {

					console.log(data);

					html_content += '<option value="">Select a Option</option>';

						$.each(data, function (key,value) {							

							html_content += '<option value="'+value['option_id']+'" >'+value['option_head']+'</option>';							

						});
				$("#option_id").html(html_content);
            }

        });

  }else{	 

	html_content = '<option value="0" >Select Option</option>';							

	$("#option_id").html(html_content);

  }

 });

 

 $( document ).ready(function() { 

  var select = $( "#option_type option:selected" ).val(); 

  if(select != 0){

	 var html_content = ''; 

     $.ajax({

            type: "POST",

            url: "<?php echo base_url('a_product/get_optionbycat')?>",

            data: {

                option_type: select

            },

            dataType: "json",

            success: function (data) {

					console.log(data);

						$.each(data, function (key,value) {

							html_content += '<option value="'+value['option_id']+'"';

							<?php if(isset($option_data)){?>

								if(value['option_id'] == '<?php echo $option_data->option_id;?>'){									

									html_content += ' selected';

								}							    

							<?php } ?>

							html_content += '>'+value['option_head']+'</option>';							

						});

				$("#option_id").html(html_content);

            }

        });

 }  

 });

 
</script>

</body>

</html>