<h4 style="color:green;" id="msg"></h4>
<?php
if(!empty($reqdetails)){ ?>
<h4 style="color:#006699;"><i class="fa fa-user"></i><?php echo $this->lang->line('contact_info_title'); ?></h4>
<table class="table table-hover table-bordered table-condensed table-striped">
	<tr>
		<th><?php echo $this->lang->line('contact_person'); ?></th>
		<td><?php echo $reqdetails[0]->Request_Name;?></td>
	</tr>
	<tr>
		<th><?php echo $this->lang->line('contact_no'); ?></th>
		<td><?php echo $reqdetails[0]->Request_Contact_No;?></td>
	</tr>
	<tr>
		<th><?php echo $this->lang->line('contact_address'); ?></th>
		<td><?php echo $reqdetails[0]->Request_Address;?></td>
	</tr>
	<tr>
		<th><?php echo $this->lang->line('inspection_date'); ?></th>
		<td><?php echo $reqdetails[0]->Inspection_Date;?></td>
	</tr>
	<tr>
		<th><?php echo $this->lang->line('inspection_time'); ?></th>
		<td><?php echo $reqdetails[0]->Inspection_Time;?></td>
	</tr>
	<tr>
		<th><?php echo $this->lang->line('Request_Status'); ?></th>
		<td><?php 
		if($reqdetails[0]->Request_Status==0){echo "<span style='color:blue; font-weight:bold;'>Pending</span>";}
		else if($reqdetails[0]->Request_Status==1){echo "<span style='color:blue; font-weight:green;'>Inspecting</span>";}
		else if($reqdetails[0]->Request_Status==4){echo "<span style='color:blue; font-weight:green;'>Assigned</span>";}
		else if($reqdetails[0]->Request_Status==3){echo "<span style='color:blue; font-weight:green;'>Outbound Call</span>";}
		else if($reqdetails[0]->Request_Status==5){echo "<span style='color:blue; font-weight:green;'>Outbound Revised</span>";}
		else{echo "<span style='color:blue; font-weight:red;'>Denied</span>";}
		?>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->lang->line('Insert_Date'); ?></th>
		<td><?php echo $reqdetails[0]->Added_Date;?></td>
	</tr>
	<tr>
		<th><?php echo $this->lang->line('Verification'); ?></th>
		<td><?php if($reqdetails[0]->Valid_Query==0){echo "<span style='color:red; font-weight:bold;'>Non verified</span>";}else if($reqdetails[0]->Valid_Query==1){echo "Verified";}else{echo "Denied";}?></td>
	</tr>
	
	<tr>
		<th><?php echo $this->lang->line('Short_Note'); ?></th>
		<td><?php echo $reqdetails[0]->Sort_Note;?></td>
	</tr>
</table>

<h4 style="color:#006699;"><i class="fa fa-car"></i><?php echo $this->lang->line('Car_Info'); ?>ff</h4>

<table class="table table-hover table-bordered table-condensed table-striped">
			  <!--table table-hover table-bordered table-condensed table-striped-->
	
    
    <?php
	
	$i=1;
	if(!empty($carlist)){
	foreach($carlist as $cars)
	{
	?>
    
    <tbody>
    <tr bgcolor="#333333">		
        <td colspan="2" align="center"><strong><?php echo $this->lang->line('SL'); ?> <?php echo $i;?></strong></td>
    </tr>
    <tr>
		<th><?php echo $this->lang->line('Brand_Name'); ?></th>
        <td><?php echo $cars->Car_Company; ?></td>
     </tr>
     <tr>
		<th><?php echo $this->lang->line('Model_NO'); ?></th>
        <td><?php echo $cars->Car_Model_No; ?></td>
     </tr>
     <tr>
		<th><?php echo $this->lang->line('Number_Plate'); ?></th>
        <td><?php echo $cars->Car_Number_Plate; ?></td>
     </tr>
     <tr>
		<th><?php echo $this->lang->line('Engine_No'); ?></th>
        <td><?php echo $cars->Engine_Number; ?></td>
     </tr>
     <tr>
		<th><?php echo $this->lang->line('Chassis_No'); ?></th>
        <td><?php echo $cars->Chassis_Number; ?></td>
	</tr>
    <tr>
        <th><?php echo $this->lang->line('CC'); ?></th>
        <td><?php echo $cars->Cc; ?></td>
	</tr>
     <tr>
        <th><?php echo $this->lang->line('mileage'); ?></th>
        <td><?php echo $cars->Mileage; ?></td>
	</tr>
    <tr>
        <th><?php echo $this->lang->line('expected_Price'); ?></th>
        <td><?php echo $cars->Expected_Price; ?></td>
	</tr>
    <tr>
        <th><?php echo $this->lang->line('car_Color'); ?></th>
        <td><?php echo $cars->Car_Color; ?></td>
	</tr>
    <tr>
        <th><?php echo $this->lang->line('car_Transmission'); ?></th>
        <td><?php echo $cars->Car_Transmission; ?></td>
	</tr>
    <tr>
        <th><?php echo $this->lang->line('car_Fueltypes'); ?></th>
        <td><?php echo $cars->Car_Fueltypes; ?></td>
	</tr>
    <tr>
        <th><?php echo $this->lang->line('car_Registration'); ?></th>
        <td><?php echo $cars->Car_Registration; ?></td>
	</tr>
    
    </tbody>
	<?php
	$i++;
	}
}
	?>
	<!--<tr>
		
		
		
		
		
		
		
	</tr>-->
	<?php
	//}
	?>
</table>

<h4 style="color:#006699;"><i class="fa fa-user"></i><?php echo $this->lang->line('inspect_title'); ?> </h4>

	<table class="table table-hover table-bordered table-condensed table-striped">
	<tr>
		<th><?php echo $this->lang->line('SL'); ?></th>
		<th><?php echo $this->lang->line('inspect_name'); ?></th>
		<th><?php echo $this->lang->line('inspect_date_time'); ?></th>
		<th><?php echo $this->lang->line('inspect_type'); ?></th>
		<th><?php echo $this->lang->line('inspect_status'); ?></th>
		
	</tr>
	<?php
	if(!empty($inspector)){
	$i=1;
	foreach($inspector as $ins)
	{
	?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo $ins->Display_Name; ?></td>
		<td><?php echo $ins->ins_date; ?> <?php echo $ins->ins_time; ?></td>
		<td><?php //echo $ins->Car_Number_Plate; ?></td>
		<td><?php //echo $ins->Engine_Number; ?></td>
		
	</tr>
	<?php
	}
	}
	?>
	</table>

	

			<div class="row" id="removepnl">
            
			<?php
			if($reqdetails[0]->Request_Status==0)
			{
			?>
                
				<?php $sht_ssndata = $this->session->userdata('sht_ssndata');
				if($sht_ssndata['user_type']==6){?>
                <div class="col-lg-2 text-center" style="float:right;" id="approve">
                	<a href="javascript:;" style="display:block;width:100%; padding:10px 0px;" tid="<?php echo $reqdetails[0]->Request_Id;?>" id="1" data-dismiss="modal"  data-status= "0"  data-class="tab3_content" data-title3="All Resources" class="btn status_update btn-primary forwardopsn" type="button"> <i class="fa fa-check"></i> Forward </a>                 
                </div>
				
				
				<?php } else{?>
                <div class="col-lg-2 text-center" style="float:right;" id="approve">
                	<a href="javascript:;" style="display:block;width:100%; padding:10px 0px;" tid="<?php echo $reqdetails[0]->Request_Id;?>" id="1" data-dismiss="modal"  data-status= "1"  data-class="tab3_content" data-title3="All Resources" class="btn status_update btn-primary approvedny" type="button"> <i class="fa fa-check"></i> Approve </a>                 
                </div>
				
				<div class="col-lg-2 text-center" style="float:right;">
                	<a href="javascript:;" style="display:block;width:100%; padding:10px 0px;" id="<?php echo $reqdetails[0]->Request_Id;?>" data-class="tab3_content" title="Send Mail" class="btn sendmail btn-success" type="button"><i class="fa fa-send"></i>  Send Mail</a>
                </div>
                
                <?php }?>
                <div class="col-lg-2 text-center" style="float:right;">
                	<a href="javascript:;" style="display:block;width:100%; padding:10px 0px;" tid="<?php echo $reqdetails[0]->Request_Id;?>" id="2" data-dismiss="modal"  data-status= "2" data-class="tab3_content" data-title3="Assigned" class="btn status_update btn-danger approvedny" type="button"><i class="fa fa-remove"></i> Deny</a>
                </div>
                
				
			<?php }
				else if($reqdetails[0]->Request_Status==1)
				{
				?>
				<div class="col-lg-2 text-center" style="float:right;" style="float:right;">
                	<a href="javascript:;" style="display:block;width:100%; padding:10px 0px;" data-id="<?php echo $reqdetails[0]->Request_Id;?>" id="4" data-dismiss="modal"  data-status= "4" data-title="Assign Inspector" data-route="<?=$assignform;?>" class="btn status_update btn-info btn-lg assignbox" type="button">Assign</a>
                </div>
				
				
				<?php
				}					?>
            </div>
         
    <?php }?>        
      
            