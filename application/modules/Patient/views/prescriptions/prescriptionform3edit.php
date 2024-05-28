<?php $attributes = array('id' => 'form_post3e', 'name'=>'form_post3e', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
<input type="hidden" name="pc_id"  value="<?php echo $visit1info->pc_id;?>" />
<input type="hidden" class="form-control" id="pcode3" name="pcode3" value="<?php echo $patientinfo->patient_code;?>" autocomplete="off" readonly >
<div class="row border">
	<div class="col">
		<div class="form-group">
			<label>Visiting Date:</label>								
			<input name="vdate3" id="vdate3" placeholder="Select Date" autocomplete="off" class="form-control fc-datepicker" value="<?php echo date("d-m-Y", strtotime($visit1info->chk_date)) ?>" />
			<div class="form-error" id="error-vdate3"></div>
			<div style="height: 5px; clear: both;"></div>
			<select id="doctorid3" name="doctorid3"  class="form-control select2-show-search" style="width: 100%">
				<option value="">Visiting Doctor:</option>
				<?php foreach ($doctorlist as $dctr2) {?>
					<option value="<?php echo $dctr2->doctor_id;?>" <?php if ($dctr2->doctor_id==$visit1info->doctor_id) {echo 'selected';} ?> ><?php echo $dctr2->doctor_name;?></option>
				<?php }?>
												
			</select>
			<div class="form-error" id="error-doctorid3"></div>
		</div>
		<div class="form-group">
			<!-- <label class="form-label" for="doctorid3">Visiting Doctor: </label> -->
											
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Physical Activity</label>
			<input type="text" name="dayp3" id="dayp3" class="form-control" placeholder="Day per Week" value="<?php echo $visit1info->physical_day;?>">
			<div style="height: 5px; clear: both;"></div>
			<input type="text" name="physical3" id="physical3" class="form-control" placeholder="Minute per Day" value="<?php echo $visit1info->physical_minute;?>">
			
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Vegetables</label>
			<input type="text" name="dayv3" id="dayv3" class="form-control" placeholder="Day per Week" value="<?php echo $visit1info->vegetable_day;?>" >
			<div style="height: 5px; clear: both;"></div>
			<input type="text" name="vegetables3" id="vegetables3" class="form-control" placeholder="Times per Day" value="<?php echo $visit1info->vegetable_minute;?>" >

		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Fruits</label>
			<input type="text" name="dayf3" id="dayf3" class="form-control" placeholder="Day per Week" value="<?php echo $visit1info->fruit_day;?>">
			<div style="height: 5px; clear: both;"></div>
			<input type="text" name="fruits3" id="fruits3" class="form-control" placeholder="Times per Day" value="<?php echo $visit1info->fruit_minute;?>">
			
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
					<input type="text" class="form-control" data-visit="3" name="height3" id="height3" placeholder="CM" value="<?php echo $visit1info->height;?>">
				</div>
				<div class="form-group">
					<label>Waist</label>
					<input type="text" class="form-control" data-visit="3" name="waist3" id="waist3" placeholder="CM" value="<?php echo $visit1info->waist;?>">
				</div>
				<div class="form-group">
					<label>SBP</label>
					<input type="text" class="form-control" name="sbp3" id="sbp3" placeholder="mmHg" value="<?php echo $visit1info->sbp;?>">
					<div class="form-error" id="error-sbp3"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Weight</label>
					<input type="text" class="form-control" data-visit="3" name="weight3" id="weight3" placeholder="KG" value="<?php echo $visit1info->weight;?>">
				</div>
				<div class="form-group">
					<label>Hip</label>
					<input type="text" class="form-control" data-visit="3" name="hip3" id="hip3" placeholder="CM" value="<?php echo $visit1info->hip;?>">
				</div>
				<div class="form-group">
					<label>DBP</label>
					<input type="text" class="form-control" name="dbp3" id="dbp3" placeholder="mmHg" value="<?php echo $visit1info->dbp;?>">
					<div class="form-error" id="error-dbp3"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>BMI</label>
					<input type="text" class="form-control" name="bmi3" id="bmi3" value="<?php echo $visit1info->bmi;?>" placeholder="kg/m2" readonly>
				</div>
				<div class="form-group">
					<label>Waist-hip-ratio</label>
					<input type="text" value="<?php echo $visit1info->waist_hip_ratio;?>" class="form-control" name="waist_hip_ratio3" id="waist_hip_ratio3" placeholder="" readonly>
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
					<input type="text" class="form-control" name="hba1c3" id="hba1c3" placeholder="%" value="<?php echo $visit1info->hba1c;?>">
					<div class="form-error" id="error-hba1c3"></div>
				</div>
				<div class="form-group">
					<label>Acetone</label>
					<input type="text" class="form-control" name="aceton3" id="aceton3" placeholder="" value="<?php echo $visit1info->aceton;?>">
				</div>
				<div class="form-group">
					<label>LDL-C</label>
					<input type="text" class="form-control" name="ldl_c3" id="ldl_c3" placeholder="mg/dl" value="<?php echo $visit1info->ldl_c;?>">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>FPG</label>
					<input type="text" class="form-control"  name="fpg3" id="fpg3" placeholder="mmol/L" value="<?php echo $visit1info->fpg;?>">
				</div>
				<div class="form-group">
					<label>Urine Albumin</label>
					<select name="urine_albumin3" id="urine_albumin3" class="form-control">
						<option value="0" <?php if($visit1info->urine_albumin==0) {echo 'selected';} ?> >NO</option>
						<option value="1" <?php if($visit1info->urine_albumin==1) {echo 'selected';} ?> >Yes</option>
														
					</select>
				</div>
				<div class="form-group">
					<label>HDL-C</label>
					<input type="text" class="form-control" value="<?php echo $visit1info->hdl_c;?>"  name="hdl_c3" id="hdl_c3" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>2hPG/Post meal</label>
					<input type="text" class="form-control" name="tohpg3" id="tohpg3" value="<?php echo $visit1info->tohpg_post;?>" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>S. Creatinine</label>
					<input type="text" class="form-control"name="s_creatinine3" id="s_creatinine3" placeholder="mg/dl" value="<?php echo $visit1info->s_creatinine;?>">
				</div>
				<div class="form-group">
					<label>Triglycerides</label>
					<input type="text" class="form-control" name="triglycerides3" id="triglycerides3" placeholder="mg/dl" value="<?php echo $visit1info->triglycerides;?>">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>RBS</label>
					<input type="text" class="form-control" name="rbs3" id="rbs3" value="<?php echo $visit1info->rbs;?>" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>CHOL</label>
					<input type="text" class="form-control" name="chol3" id="chol3" value="<?php echo $visit1info->chol;?>" placeholder="mg/dl">
				</div>
			</div>
		</div>
	</div> <!-- end LABORATORY -->
</div>
<div class="row border"> <!-- COMPLICATIONS -->
	
	<div class="col-12">
		<div class="form-group form-elements m-0">
		<div class="form-label text-secondary">COMPLICATIONS</div>
		
		<div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input"name="heart_disease3" id="heart_disease3" <?php if($visit1info->heat==1){echo 'checked';} ?>>
					<span class="custom-control-label">Heart Disease</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="hhns3" id="hhns3" <?php if($visit1info->hhns==1){echo 'checked';} ?>>
					<span class="custom-control-label">HHNS</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="stroke3" id="stroke3" <?php if($visit1info->stroke==1){echo 'checked';} ?> >
					<span class="custom-control-label">Stroke</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="foot_complication3" id="foot_complication3" <?php if($visit1info->foot_complication==1){echo 'checked';} ?>>
					<span class="custom-control-label">Foot Complication</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="neuopathy3" id="neuopathy3" <?php if($visit1info->neuropathy==1){echo 'checked';} ?> >
					<span class="custom-control-label">Neuropathy</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="pvd3" id="pvd3" <?php if($visit1info->pvd==1){echo 'checked';} ?>>
					<span class="custom-control-label">PVD</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="retinpathy3" id="retinpathy3" <?php if($visit1info->retinopathy==1){echo 'checked';} ?> >
					<span class="custom-control-label">Retinopathy</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="skin_disease3" id="skin_disease3" <?php if($visit1info->skin==1){echo 'checked';} ?>>
					<span class="custom-control-label">Skin Disease</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input"  name="ckd3" id="ckd3" <?php if($visit1info->ckd==1){echo 'checked';} ?> >
					<span class="custom-control-label">CKD</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="gastro_complication3" id="gastro_complication3" <?php if($visit1info->gastro==1){echo 'checked';} ?>>
					<span class="custom-control-label">Gastro Complication</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="dka3" id="dka3" <?php if($visit1info->dka==1){echo 'checked';} ?>>
					<span class="custom-control-label">DKA</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="hypoglycaemia3" id="hypoglycaemia3" <?php if($visit1info->hypoglycaemia==1){echo 'checked';} ?>>
					<span class="custom-control-label">Hypoglycaemia</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="htn3" id="htn3" <?php if($visit1info->htn==1){echo 'checked';} ?>>
					<span class="custom-control-label">HTN (Hypertension)</span>
				</label>
	    </div>

	</div>
	
</div>
</div>
<div class="row">
	<div class="col-lg-6 col-sm-12 border"> <!-- PREVIOUS TREATMENT -->
		<h3 class="bg-primary">PREVIOUS TREATMENT</h4>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Type of Treatment</label>
					<select  name="prev_treatment" id="prev_treatment" class="form-control">
						<option value="">--Select Treatment--</option>
						<option value="Lifestyle (No medication)" <?php if($visit1info->treatment_pre=='Lifestyle (No medication)'){echo 'selected';} ?> >Lifestyle (No medication)</option>
						<option value="Oral" <?php if($visit1info->treatment_pre=='Oral'){echo 'selected';} ?>>Oral</option>
						<option value="Injection Insulin" <?php if($visit1info->treatment_pre=='Injection Insulin'){echo 'selected';} ?>>Injection Insulin</option>
						<option value="Oral & Insulin" <?php if($visit1info->treatment_pre=='Oral & Insulin'){echo 'selected';} ?>>Oral & Insulin</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>OGLD Usage</label>
					<select  name="prev_ogld3" id="prev_ogld3" class="form-control">
						<option value="0" <?php if($visit1info->ogld_status_pre==0){echo 'selected';}?>>No</option>
						<option value="1" <?php if($visit1info->ogld_status_pre==1){echo 'selected';}?>>Yes</option>
														
					</select>								
				</div>
			</div>
		</div>
		<div class="form-group">
			
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
					$preinsln = $this->Patient_model->get_ptpre_ogld($visit1info->pc_id);
					if (!empty($preinsln)) {
						foreach ($preinsln as $preinl) { $dsgpre=explode('+', $preinl->dosage);?>
				<div class="col-4">
					<div class="form-group">
						
						<input type="text" name="prev_ogld[]" id="prev_ogldname13" data-visit="3"  placeholder="OGLD" value="<?php echo $preinl->brand.':'.$preinl->ogld_id;?>" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					
					<input type="text" class="form-control" data-visit="3" name="pre_og_bf[]" id="pre_og_bf" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " value="<?php echo $dsgpre[0]; ?>" >
					<input type="text" class="form-control" data-visit="3" name="pre_og_lunch[]" id="pre_og_lunch" placeholder="lun" style="float: left;width: 20%; margin-right:3px;" value="<?php echo $dsgpre[1];?>">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="pre_og_dinner[]" id="pre_og_dinner" placeholder="din" style="float: left;width: 20%; margin-right:3px;" value="<?php echo $dsgpre[2];?>">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="pre_og_bt[]" id="pre_og_bt" placeholder="bed" style="float: left;width: 20%; margin-right:3px;" value="<?php echo $dsgpre[3];?>">
					
				</div>
			<?php } }else{ ?>
			<div class="col-4">
					<div class="form-group">
						
						<input type="text" name="prev_ogld[]" id="prev_ogldname13" data-visit="3"  placeholder="OGLD" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					
					<input type="text" class="form-control" data-visit="3" name="pre_og_bf[]" id="pre_og_bf" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="3" name="pre_og_lunch[]" id="pre_og_lunch" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="pre_og_dinner[]" id="pre_og_dinner" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="pre_og_bt[]" id="pre_og_bt" placeholder="bed" style="float: left;width: 20%; margin-right:3px;" >
					<button type="button" name="add_pre_ogld" id="add_pre_ogld" class="btn btn-success" data-visit="3" title="Add another OGLD" style="float: left;width: 10%;">+</button>
				</div>
			<?php } ?>
			</div>
			<div class="row">
				<table class="table table-striped responsive-table">

                  <tbody id="medicne_table">
                  </tbody>
                </table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Insulin Usage</label>
					<select  name="prev_insulin3" id="prev_insulin3" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Insulin Type</label>
					<select  name="prev_insulintype31" id="prev_insulintype31" class="form-control">
						<option value='0'>--Select Insulin Type--</option>
						<option value="Bolus ( Meatime Insulin )">Bolus ( Meatime Insulin )</option>
						<option value="Premix">Premix</option>
						<option value="Split Mixed">Split Mixed</option>
						<option value="Basal & Bolus">Basal & Bolus</option>
						<option value="Basal Plus">Basal Plus</option>
						<option value="Basal Only">Basal Only</option>
														
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
					$preinslnall = $this->Patient_model->get_pc_insulin_pre($visit1info->pc_id);
					/*print_r($crinslnall);*/
					if (!empty($preinslnall)) {
						foreach ($preinslnall as $inslnpre) {?>
				<div class="col-4">
					<div class="form-group">
						<input type="text" name="prev_basal3[]" id="prev_basal3" data-visit="3"  placeholder="Insulin" value="<?php echo $inslnpre->insulin_name.':'.$inslnpre->insulin_id; ?>" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basaldm3[]" id="prev_basaldm3" value="<?php echo $inslnpre->dose_morning; ?>" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basaldn3[]" id="prev_basaldn3" value="<?php echo $inslnpre->dose_noon; ?>" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basaldt3[]" id="prev_basaldt3" value="<?php echo $inslnpre->dose_night; ?>" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basalbed3[]" id="prev_basalbed3" value="<?php echo $inslnpre->dose_bed; ?>" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
								
				</div>
			<?php }?>
			<!-- <button type="button" name="prev_addbosal3" id="prev_addbosal3" class="btn btn-success" data-visit="3">Add another</button> -->
			<?php }else{?>
				<div class="col-4">
					<div class="form-group">
						<input type="text" name="prev_basal3[]" id="prev_basal3" data-visit="3"  placeholder="Insulin" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basaldm3[]" id="prev_basaldm3" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basaldn3[]" id="prev_basaldn3" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basaldt3[]" id="prev_basaldt3" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basalbed3[]" id="prev_basalbed3" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
					<button type="button" name="prev_addbosal3" id="prev_addbosal3" class="btn btn-success" data-visit="3" style="float: left;width: 10%;">+</button>
				</div>
			<?php }?>
			</div>

			<div class="row gutters-xs" id="pre_insulin3"></div>
			
</div>
	</div> <!-- End PREVIOUS TREATMENT -->
	

	<div class="col-lg-6 col-sm-12 border"> <!-- CURRENT TREATMENT -->
		<h3 class="bg-primary">CURRENT TREATMENT</h4>

		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Type of Treatment</label>
					<select  name="treatment3" id="treatment3" class="form-control">
						<option value="">--Select Treatment--</option>
						<option value="Lifestyle (No medication)" <?php if($visit1info->treatment=='Lifestyle (No medication)'){echo 'selected';} ?> >Lifestyle (No medication)</option>
						<option value="Oral" <?php if($visit1info->treatment=='Oral'){echo 'selected';} ?>>Oral</option>
						<option value="Injection Insulin" <?php if($visit1info->treatment=='Injection Insulin'){echo 'selected';} ?>>Injection Insulin</option>
						<option value="Oral & Insulin" <?php if($visit1info->treatment=='Oral & Insulin'){echo 'selected';} ?>>Oral & Insulin</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>OGLD Usage</label>
					<select  name="ogld3" id="ogld3" class="form-control">
						<option value="0" <?php if($visit1info->ogld_status==0){echo 'selected';}?>>No</option>
						<option value="1" <?php if($visit1info->ogld_status==1){echo 'selected';}?>>Yes</option>
														
					</select>								
				</div>
			</div>
		</div>
		<div class="form-group">
			
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
					$crogld = $this->Patient_model->get_ptcrt_ogld($visit1info->pc_id);
					if (!empty($crogld)) {
						foreach ($crogld as $ogldcr) { $dsgcr=explode('+', $ogldcr->dosage);?>

				<div class="col-4">
					<div class="form-group">
						
						<input type="text" name="ogld[]" id="ogldname13" data-visit="3"  placeholder="OGLD" value="<?php echo $ogldcr->brand.':'.$ogldcr->ogld_id; ?>" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					
					<input type="text" class="form-control" data-visit="3" name="crnt_og_bf[]" id="crnt_og_bf" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " value="<?php echo $dsgcr[0];?>" >
					<input type="text" class="form-control" data-visit="3" name="crnt_og_lunch[]" id="crnt_og_lunch" placeholder="lun" style="float: left;width: 20%; margin-right:3px;" value="<?php echo $dsgcr[1];?>">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="crnt_og_dinner[]" id="crnt_og_dinner" placeholder="din" style="float: left;width: 20%; margin-right:3px;" value="<?php echo $dsgcr[2];?>">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="crnt_og_bt[]" id="crnt_og_bt" placeholder="bed" style="float: left;width: 20%; margin-right:3px;" value="<?php if(empty($dsgcr[3])){echo '0';}else{ echo $dsgcr[3];}?>">
					
				</div>
			<?php } }else{?>
			
				<div class="col-4">
					<div class="form-group">
						
						<input type="text" name="ogld[]" id="ogldname13" data-visit="3"  placeholder="OGLD" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					
					<input type="text" class="form-control" data-visit="3" name="crnt_og_bf[]" id="crnt_og_bf" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="3" name="crnt_og_lunch[]" id="crnt_og_lunch" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="crnt_og_dinner[]" id="crnt_og_dinner" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="crnt_og_bt[]" id="crnt_og_bt" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
					<button type="button" name="add_ogld" id="add_ogld" class="btn btn-success" data-visit="3" title="Add another OGLD" style="float: left;width: 10%;">+</button>
				</div>

			<?php }?>


			</div>
			<div class="row gutters-xs" id="ogldmulti"></div>
			<div class="row">
				<table class="table table-striped responsive-table">

                  <tbody id="ogld_tablecur">
                  </tbody>
                </table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Insulin Usage</label>
					<select  name="insulin3" id="insulin3" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Insulin Type</label>
					<select  name="cr_insulintype3" id="cr_insulintype3" class="form-control">
						<option value='0'>--Select Insulin Type--</option>
						<option value="Bolus ( Meatime Insulin )">Bolus ( Meatime Insulin )</option>
						<option value="Premix">Premix</option>
						<option value="Split Mixed">Split Mixed</option>
						<option value="Basal & Bolus">Basal & Bolus</option>
						<option value="Basal Plus">Basal Plus</option>
						<option value="Basal Only">Basal Only</option>
														
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
					$crinslnall = $this->Patient_model->get_pc_insulin($visit1info->pc_id);
					/*print_r($crinslnall);*/
					if (!empty($crinslnall)) {
						foreach ($crinslnall as $insln) {?>

				<div class="col-4">
					<div class="form-group">
						
						<input type="text" name="basal3[]" id="basal3" data-visit="3"  placeholder="Insulin" autocomplete="off" class="form-control" value="<?php echo $insln->insulin_name.':'.$insln->insulin_id;?>" />
					</div>
				</div>
				<div class="col-8">
					
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="basaldm3[]" id="basaldm3" value="<?php echo $insln->dose_morning; ?>" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="basaldn3[]" id="basaldn3" value="<?php echo $insln->dose_noon; ?>" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="basaldt3[]" id="basaldt3" value="<?php echo $insln->dose_night; ?>" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="basalbed3[]" id="basalbed3" value="<?php echo $insln->dose_bed; ?>" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
								
				</div>
				<?php } }else{?>

				<div class="col-4">
					<div class="form-group">
						
						<input type="text" name="basal3[]" id="basal3" data-visit="3"  placeholder="Insulin" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="basaldm3[]" id="basaldm3" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="basaldn3[]" id="basaldn3" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="basaldt3[]" id="basaldt3" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="3" data-type="basal" name="basalbed3[]" id="basalbed3" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
					<button type="button" name="addbosal3" id="addbosal3" class="btn btn-success" data-visit="3" style="float: left;width: 10%;">+</button>
				</div>
				<?php }?>
			</div>
			<div class="row gutters-xs" id="insulin_wrapper3"></div>
			

		</div>
	</div> <!-- End CURRENT TREATMENT -->
	
</div>

<div class="row">
	<div class="errormessage"></div>
	<div class="col-lg-12">
	<input type="submit" class="btn btn-primary float-right" value="Submit" id="submitbtn3" name="submitbtn3">															
	</div>
</div>

<?php echo form_close(); ?>


