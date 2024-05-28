<?php $attributes = array('id' => 'form_post2e', 'name'=>'form_post2e', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
<div class="row border">
	<input type="hidden" name="pc_id2"  value="<?php echo $fiveyrinfo->pc_id;?>" />
	<input type="hidden" class="form-control" id="pcode2" name="pcode2" value="<?php echo $patientinfo->patient_code;?>" autocomplete="off" readonly >
	<div class="col">
		<div class="form-group">
			<label class="form-label" for="atd_doctorid2">Visiting Doctor: </label>
			<select id="atd_doctorid" name="atd_doctorid2" class="form-control select2-show-search" style="width: 100%">
				<option value="">--Select Doctor--</option>
				<?php foreach ($doctorlist as $dctr) {?>
					<option value="<?php echo $dctr->doctor_id;?>" <?php if ($dctr->doctor_id==$fiveyrinfo->doctor_id) {echo 'selected';} ?>><?php echo $dctr->doctor_name;?></option>
				<?php }?>
												
			</select>
			<div class="form-error" id="error-atd_doctorid2"></div>			
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label class="form-label" for="vdate2">Visiting Date:</label>	
			<input name="vdate2" id="vdate2" value="<?php echo date("d-m-Y", strtotime($fiveyrinfo->chk_date)) ?>" placeholder="e.g. 15th September 2019, 15-09-2019" autocomplete="off" class="form-control fc-datepicker"/>
			<div class="form-error" id="error-vdate2"></div>
		</div>
	</div>

</div>



<div class="row">			
	<div class="col-lg-6 col-sm-6 border"> <!-- clinical -->
		<h4 class="text-secondary">CLINICAL</h4>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Height</label>
					<input type="text" class="form-control" name="atd_height2" id="atd_height2" value="<?php echo $fiveyrinfo->height;?>" placeholder="CM">
					<div class="form-error" id="error-atd_height2"></div>
				</div>
				<div class="form-group">
					<label>Waist</label>
					<input type="text" class="form-control" name="atd_waist2" id="atd_waist2" value="<?php echo $fiveyrinfo->waist;?>" placeholder="CM">
					<div class="form-error" id="error-atd_waist2"></div>
				</div>
				<div class="form-group">
					<label>SBP</label>
					<input type="text" class="form-control" name="atd_sbp2" id="atd_sbp2" value="<?php echo $fiveyrinfo->sbp;?>" placeholder="mmHg">
					<div class="form-error" id="error-atd_sbp2"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Weight</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->weight;?>" name="atd_weight2" id="atd_weight2" placeholder="KG">
				</div>
				<div class="form-group">
					<label>Hip</label>
					<input type="text" class="form-control" data-visit="2" value="<?php echo $fiveyrinfo->hip;?>" name="atd_hip2" id="atd_hip2" placeholder="CM">
					<div class="form-error" id="error-atd_hip2"></div>
				</div>
				<div class="form-group">
					<label>DBP</label>
					<input type="text" class="form-control" name="atd_dbp2" value="<?php echo $fiveyrinfo->dbp;?>" id="atd_dbp2" placeholder="mmHg">
					<div class="form-error" id="error-atd_dbp2"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>BMI</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->bmi;?>" name="atd_bmi2" id="atd_bmi2" placeholder="kg/m2" readonly>
				</div>
				<div class="form-group">
					<label>Waist-hip-ratio</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->waist_hip_ratio;?>" name="atd_waist_hip_ratio2" id="atd_waist_hip_ratio2" placeholder="" readonly>
				</div>

			</div>
		</div>
		
	</div> <!-- End clinical -->


	<div class="col-lg-6 col-sm-6 border"> <!-- Labarotory -->
		<h4 class="text-secondary">LABORATORY</h4>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>HbA1c</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->hba1c;?>"  name="atd_hba1c2" id="atd_hba1c2" placeholder="%">
				</div>
				<div class="form-group">
					<label>Acetone</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->aceton;?>" name="atd_aceton2" id="atd_aceton2" placeholder="">
				</div>
				<div class="form-group">
					<label>LDL-C</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->ldl_c;?>" name="atd_ldl_c2" id="atd_ldl_c2" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>FPG</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->fpg;?>"  name="atd_fpg2" id="atd_fpg2" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>Urine Albumin</label>
					<select name="atd_urine_albumin2" id="atd_urine_albumin2" class="form-control">
						<option value="0" <?php if($fiveyrinfo->urine_albumin==0) {echo 'selected';} ?> >NO</option>
						<option value="1" <?php if($fiveyrinfo->urine_albumin==1) {echo 'selected';} ?> >Yes</option>
														
					</select>
				</div>
				<div class="form-group">
					<label>HDL-C</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->hdl_c;?>" name="atd_hdl_c2" id="atd_hdl_c2" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>2hPG/Post meal</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->tohpg_post;?>" name="atd_tohpg2" id="atd_tohpg2" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>S. Creatinine</label>
					<input type="text" class="form-control" name="atd_s_creatinine2" id="atd_s_creatinine2" placeholder="mg/dl" value="<?php echo $fiveyrinfo->s_creatinine;?>">
				</div>
				<div class="form-group">
					<label>Triglycerides</label>
					<input type="text" class="form-control" name="atd_triglycerides2" id="atd_triglycerides2" placeholder="mg/dl" value="<?php echo $fiveyrinfo->triglycerides;?>">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>RBS</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->rbs;?>" name="atd_rbs2" id="atd_rbs2" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>CHOL</label>
					<input type="text" class="form-control" value="<?php echo $fiveyrinfo->chol;?>" name="atd_chol2" id="atd_chol2" placeholder="mg/dl">
				</div>
			</div>
		</div>
	</div> <!-- end LABORATORY -->
</div>

<div class="row">
<div class="col-lg-6 col-sm-12 border">
	
 <div class="form-group form-elements m-0">
		<div class="form-label text-secondary">COMPLICATIONS</div>
	<div class="row">
		<div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_heat2" id="atd_heat2" <?php if($fiveyrinfo->heat==1){echo 'checked';} ?> >
					<span class="custom-control-label">Heart Disease</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_hhns2" id="atd_hhns2" <?php if($fiveyrinfo->hhns==1){echo 'checked';} ?>>
					<span class="custom-control-label">HHNS</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_stroke2" id="atd_stroke2" <?php if($fiveyrinfo->stroke==1){echo 'checked';} ?>>
					<span class="custom-control-label">Stroke</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_foot_complication2" id="atd_foot_complication2" <?php if($fiveyrinfo->foot_complication==1){echo 'checked';} ?>>
					<span class="custom-control-label">Foot Complication</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_neuopathy2" id="atd_neuopathy2" <?php if($fiveyrinfo->neuropathy==1){echo 'checked';} ?>>
					<span class="custom-control-label">Neuropathy</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_pvd2" id="atd_pvd2" <?php if($fiveyrinfo->pvd==1){echo 'checked';} ?>>
					<span class="custom-control-label">PVD</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_retinopathy2" id="atd_retinopathy2" <?php if($fiveyrinfo->retinopathy==1){echo 'checked';} ?>>
					<span class="custom-control-label">Retinopathy</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_skin2" id="atd_skin2" <?php if($fiveyrinfo->skin==1){echo 'checked';} ?>>
					<span class="custom-control-label">Skin Disease</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input"  name="atd_ckd2" id="atd_ckd2" <?php if($fiveyrinfo->ckd==1){echo 'checked';} ?>>
					<span class="custom-control-label">CKD</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_gastro2" id="atd_gastro2" <?php if($fiveyrinfo->gastro==1){echo 'checked';} ?>>
					<span class="custom-control-label">Gastro Complication</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_dka2" id="atd_dka2" <?php if($fiveyrinfo->dka==1){echo 'checked';} ?>>
					<span class="custom-control-label">DKA</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_hypoglycaemia2" id="atd_hypoglycaemia2" <?php if($fiveyrinfo->hypoglycaemia==1){echo 'checked';} ?>>
					<span class="custom-control-label">Hypoglycaemia</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_htn2" id="atd_htn2" <?php if($fiveyrinfo->htn==1){echo 'checked';} ?>>
					<span class="custom-control-label">HTN (Hypertension)</span>
				</label>
	    </div>
	</div>
		

	</div>
	

</div>

	<div class="col-lg-6 col-sm-12 border"> <!-- PREVIOUS TREATMENT -->
		<h3 class="bg-primary">PREVIOUS TREATMENT</h4>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Type of Treatment</label>
					<select  name="treatment_atd2" id="treatment_atd2" class="form-control">
						<option value='0'>--Select Treatment--</option>
						<option value="Lifestyle (No medication)" <?php if($fiveyrinfo->treatment=='Lifestyle (No medication)'){echo 'selected';} ?> >Lifestyle (No medication)</option>
						<option value="Oral" <?php if($fiveyrinfo->treatment=='Oral'){echo 'selected';} ?>>Oral</option>
						<option value="Injection Insulin" <?php if($fiveyrinfo->treatment=='Injection Insulin'){echo 'selected';} ?>>Injection Insulin</option>
						<option value="Oral & Insulin" <?php if($fiveyrinfo->treatment=='Oral & Insulin'){echo 'selected';} ?>>Oral & Insulin</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>OGLD Usage</label>
					<select  name="prev_ogldusag2" id="prev_ogldusag2" class="form-control">
						<option value="">Select</option>
						<option value="0" <?php if($fiveyrinfo->ogld_status==0){echo 'selected';}?>>No</option>
						<option value="1" <?php if($fiveyrinfo->ogld_status==1){echo 'selected';}?>>Yes</option>
														
					</select>								
				</div>
			</div>
		</div>
		<div class="form-group">
			
			<!-- <div class="row gutters-xs">
				<div class="col">
					
					<div class="form-group">
						<label>OGLD</label>
						<select id="ogld_pre" name="ogld_pre" class="form-control select2-show-search" style="width: 100%">
							<option value="">--Select OGLD--</option>
							<?php foreach ($ogldlist as $ogld1) {?>
								<option value="<?php echo $ogld1->id;?>"><?php echo $ogld1->brand;?></option>
							<?php }?>
															
						</select>								
					</div>
				</div>
				
				<div class="col">
					<div class="form-group">
						<label>Morning</label>
						<input type="text" class="form-control" name="ogld_bf12" id="ogld_bf12"  value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Lunch</label>
						<input type="text" class="form-control" name="ogld_lunch12" id="ogld_lunch12" placeholder="lunch" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Dinner</label>
						<input type="text" class="form-control" name="ogld_dinner12" id="ogld_dinner12" placeholder="Din" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Bed Time</label>
						<input type="text" class="form-control" name="ogld_bt12" id="ogld_bt12" placeholder="Bed" value="0">
					</div>
				</div>

				<span class="col-auto">
					
					<label><br/></label>
					<br/>
					<label></label>
					<button class="btn btn-primary" type="button" id="ogld_sub_pre"><i class="fa fa-plus-square"></i></button>
				</span>
			</div> -->
			<!-- <div class="row">
				<table class="table table-striped responsive-table">

                  <tbody id="ogld12_table">
                  	
                  	<?php $at_ogld = $this->Patient_model->get_all_ogld($fiveyrinfo->pc_id);
                  		foreach ($at_ogld as $atogld) { 
                  	?>
                  	<tr id="tr_1">
                  		<td data-title="#" id="11">1</td>
                  		<td data-title="Medicine" id="12"><?php echo $atogld->brand;?><input type="hidden" name="ogld12_name[]" value="<?php echo $atogld->id;?>" id="ogld12_name[]"></td>
                  		<td data-title="Dose" id="13"><?php echo $atogld->dosage_cur;?><input type="hidden" name="og_dosage12[]" value="<?php echo $atogld->dosage_cur;?>" id="og_dosage12[]"></td>
                  		<td data-title="Action" id="16">
                  			<div id="1" class="btn-group medicine_edit"><button class="btn btn-danger btn-sm" data-placement="bottom" data-original-title="Delete Insulin" data-toggle="tooltip"><i class="fa fa-close"></i></button></div>
                  		</td>
                  	</tr>
                  <?php }?>
                  </tbody>
                </table>
			</div> -->

			<div class="row gutters-xs">
				<div class="col-4">
					<div class="form-group">
						<label>OGLD</label>
						
					</div>
				</div>
				<div class="col-8">
					<div class="form-group">
						<label>Dosagess</label>
						
					</div>
				</div>
				<?php 
					$crogld5yr = $this->Patient_model->get_ptcrt_ogld($fiveyrinfo->pc_id);
					if (!empty($crogld5yr)) {
						foreach ($crogld5yr as $ogldcr2) { $dsgcr2=explode('+', $ogldcr2->dosage);?>

				<div class="col-4">
					<div class="form-group">
						
						<input type="text" name="ogld2[]" id="ogldname2" data-visit="2"  placeholder="OGLD" value="<?php echo $ogldcr2->brand.'('.$ogldcr2->generic.':'.$ogldcr2->strength.'):'.$ogldcr2->ogld_id;?>" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					
					<input type="text" class="form-control" data-visit="2" name="crnt_og_bf2[]" id="crnt_og_bf2" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " value="<?php echo $dsgcr2[0];?>" >
					<input type="text" class="form-control" data-visit="2" name="crnt_og_lunch2[]" id="crnt_og_lunch2" placeholder="lun" style="float: left;width: 20%; margin-right:3px;" value="<?php echo $dsgcr2[1];?>">
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="crnt_og_dinner2[]" id="crnt_og_dinner2" placeholder="din" style="float: left;width: 20%; margin-right:3px;" value="<?php echo $dsgcr2[2];?>">
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="crnt_og_bt2[]" id="crnt_og_bt2" placeholder="bed" style="float: left;width: 20%; margin-right:3px;" value="<?php if(empty($dsgcr2[3])){echo '0';}else{ echo $dsgcr2[3];}?>">
					
				</div>
			<?php }?>
			<button type="button" name="add_ogld2" id="add_ogld2" class="btn btn-sm btn-success" data-visit="2" title="Add another OGLD">+ Add Another</button>
			<?php }else{?>
			
				<div class="col-4">
					<div class="form-group">
						<input type="text" name="ogld2[]" id="ogldname2" data-visit="2"  placeholder="OGLD" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					<input type="text" class="form-control" data-visit="2" name="crnt_og_bf2[]" id="crnt_og_bf2" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="2" name="crnt_og_lunch2[]" id="crnt_og_lunch2" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="crnt_og_dinner2[]" id="crnt_og_dinner2" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="crnt_og_bt2[]" id="crnt_og_bt2" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
					<button type="button" name="add_ogld2" id="add_ogld2" class="btn btn-success" data-visit="2" title="Add another OGLD" style="float: left;width: 10%;">+</button>
				</div>

			<?php }?>


			</div>
			<div class="row gutters-xs" id="ogldmulti2"></div>
		</div>
		<hr>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Insulin Usage</label>
					<select  name="insulin_usag2" id="insulin_usag2" class="form-control">
						<option value="">Select</option>
						<option value="0" <?php if($fiveyrinfo->insulin_status==0){echo 'selected';}?>>No</option>
						<option value="1" <?php if($fiveyrinfo->insulin_status==1){echo 'selected';}?>>Yes</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Insulin Type</label>
					<select  name="insulintype_atd2" id="insulintype_atd2" class="form-control">
						<option value="">--Select Insulin Type--</option>
						<option value="Bolus ( Meatime Insulin )" <?php if($fiveyrinfo->insulintype=='Bolus ( Meatime Insulin )'){echo 'selected';}?>>Bolus ( Meatime Insulin )</option>
						<option value="Premix" <?php if($fiveyrinfo->insulintype=='Premix'){echo 'selected';}?>>Premix</option>
						<option value="Split Mixed" <?php if($fiveyrinfo->insulintype=='Split Mixed'){echo 'selected';}?>>Split Mixed</option>
						<option value="Basal & Bolus" <?php if($fiveyrinfo->insulintype=='Basal & Bolus'){echo 'selected';}?>>Basal & Bolus</option>
						<option value="Basal Plus" <?php if($fiveyrinfo->insulintype=='Basal Plus'){echo 'selected';}?>>Basal Plus</option>
						<option value="Basal Only" <?php if($fiveyrinfo->insulintype=='Basal Only'){echo 'selected';}?>>Basal Only</option>
														
					</select>								
				</div>
			</div>
		</div>
		<div class="form-group">
			
			

			<div class="row gutters-xs">
				<div class="col-4">
					<div class="form-group">
						<label>Insulin</label>
					</div>
				</div>
				<div class="col-8">
					<div class="form-group">
						<label>Dosagess</label>
					</div>
				</div>

				<?php
					$crinslnall5yr = $this->Patient_model->get_pc_insulin($fiveyrinfo->pc_id);
					/*print_r($crinslnall);*/
					if (!empty($crinslnall5yr)) {
						foreach ($crinslnall5yr as $insln2) {?>

				<div class="col-4">
					<div class="form-group">
						
						<input type="text" name="basal2[]" id="basal2" data-visit="2"  placeholder="Insulin" autocomplete="off" class="form-control" value="<?php echo $insln2->insulin_name.':'.$insln2->insulin_id;?>" />
					</div>
				</div>
				<div class="col-8">
					
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="basaldm2[]" id="basaldm2" value="<?php echo $insln2->dose_morning; ?>" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="basaldn2[]" id="basaldn2" value="<?php echo $insln2->dose_noon; ?>" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="basaldt2[]" id="basaldt2" value="<?php echo $insln2->dose_night; ?>" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="basalbed2[]" id="basalbed2" value="<?php echo $insln2->dose_bed; ?>" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
								
				</div>
				<?php }?> 
				<button type="button" name="addbosal2" id="addbosal2" class="btn btn-sm btn-success" data-visit="2">+ Add Another Insulin</button>
				<?php }else{?>

				<div class="col-4">
					<div class="form-group">
						<input type="text" name="basal2[]" id="basal2" data-visit="2"  placeholder="Insulin" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="basaldm2[]" id="basaldm2" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="basaldn2[]" id="basaldn2" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="basaldt2[]" id="basaldt2" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="2" data-type="basal" name="basalbed2[]" id="basalbed2" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
					<button type="button" name="addbosal2" id="addbosal2" class="btn btn-success" data-visit="1" style="float: left;width: 10%;">+</button>
				</div>
				<?php }?>
			</div>
			<div class="row gutters-xs" id="insulin_wrapper2"></div>

		</div>




	</div> <!-- End PREVIOUS TREATMENT -->
	
</div>
<div class="row">
	<div class="errormessage"></div>
	<div class="col-lg-12">
	<input type="submit" class="btn btn-primary float-right" value="Submit" id="submitbtn2edit" name="submitbtn2edit">															
	</div>
</div>
<?php echo form_close(); ?>

