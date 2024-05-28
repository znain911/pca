<?php $attributes = array('id' => 'form_post4', 'name'=>'form_post4', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data' );echo form_open('javascript:void(0)',$attributes);?>
	
	<input type="hidden" class="form-control" id="pcode4" name="pcode4" value="<?php echo $patientinfo->patient_code;?>" autocomplete="off" readonly >
														
														
<div class="row border">
	<div class="col">
		<div class="form-group">
			<label>Visiting Date:</label>								
			<input name="vdate4" id="vdate4" placeholder="Select Date" autocomplete="off" class="form-control fc-datepicker"/>
			<div class="form-error" id="error-vdate4"></div>
			<div style="height: 5px; clear: both;"></div>
			<select id="doctorid4" name="doctorid4"  class="form-control select2-show-search" style="width: 100%">
				<option value="">Visiting Doctor:</option>
				<?php foreach ($doctorlist as $dctr2) {?>
					<option value="<?php echo $dctr2->doctor_id;?>"><?php echo $dctr2->doctor_name;?></option>
				<?php }?>
												
			</select>
			<div class="form-error" id="error-doctorid4"></div>
		</div>
		<div class="form-group">
			<!-- <label class="form-label" for="doctorid3">Visiting Doctor: </label> -->
											
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Physical Activity</label>
			<input type="text" name="dayp4" id="dayp4" class="form-control" placeholder="Day per Week">
			<div style="height: 5px; clear: both;"></div>
			<input type="text" name="physical4" id="physical4" class="form-control" placeholder="Minute per Day">
			
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Vegetables</label>
			<input type="text" name="dayv4" id="dayv4" class="form-control" placeholder="Day per Week">
			<div style="height: 5px; clear: both;"></div>
			<input type="text" name="vegetables4" id="vegetables4" class="form-control" placeholder="Times per Day">

		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Fruits</label>
			<input type="text" name="dayf4" id="dayf4" class="form-control" placeholder="Day per Week">
			<div style="height: 5px; clear: both;"></div>
			<input type="text" name="fruits4" id="fruits4" class="form-control" placeholder="Times per Day">
			
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
					<input type="text" class="form-control" data-visit="4" name="height4" id="height4" placeholder="CM">
				</div>
				<div class="form-group">
					<label>Waist</label>
					<input type="text" class="form-control" data-visit="4" name="waist4" id="waist4" placeholder="CM">
				</div>
				<div class="form-group">
					<label>SBP</label>
					<input type="text" class="form-control" name="sbp4" id="sbp4" placeholder="mmHg">
					<div class="form-error" id="error-sbp4"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Weight</label>
					<input type="text" class="form-control" data-visit="4" name="weight4" id="weight4" placeholder="KG">
				</div>
				<div class="form-group">
					<label>Hip</label>
					<input type="text" class="form-control" data-visit="4" name="hip4" id="hip4" placeholder="CM">
				</div>
				<div class="form-group">
					<label>DBP</label>
					<input type="text" class="form-control" name="dbp4" id="dbp4" placeholder="mmHg">
					<div class="form-error" id="error-dbp4"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>BMI</label>
					<input type="text" class="form-control" name="bmi4" id="bmi4" placeholder="kg/m2" readonly>
				</div>
				<div class="form-group">
					<label>Waist-hip-ratio</label>
					<input type="text" class="form-control" name="waist_hip_ratio4" id="waist_hip_ratio4" placeholder="" readonly>
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
					<input type="text" class="form-control" name="hba1c4" id="hba1c4" placeholder="%">
					<div class="form-error" id="error-hba1c4"></div>
				</div>
				<div class="form-group">
					<label>Acetone</label>
					<input type="text" class="form-control" name="aceton4" id="aceton4" placeholder="">
				</div>
				<div class="form-group">
					<label>LDL-C</label>
					<input type="text" class="form-control" name="ldl_c4" id="ldl_c4" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>FPG</label>
					<input type="text" class="form-control"  name="fpg4" id="fpg4" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>Urine Albumin</label>
					<select name="urine_albumin4" id="urine_albumin4" class="form-control">
						<option value="0">NO</option>
						<option value="1">Yes</option>
														
					</select>
				</div>
				<div class="form-group">
					<label>HDL-C</label>
					<input type="text" class="form-control"  name="hdl_c4" id="hdl_c4" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>2hPG/Post meal</label>
					<input type="text" class="form-control" name="tohpg4" id="tohpg4" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>S. Creatinine</label>
					<input type="text" class="form-control"name="s_creatinine4" id="s_creatinine4" placeholder="mg/dl">
				</div>
				<div class="form-group">
					<label>Triglycerides</label>
					<input type="text" class="form-control" name="triglycerides4" id="triglycerides4" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>RBS</label>
					<input type="text" class="form-control" name="rbs4" id="rbs4" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>CHOL</label>
					<input type="text" class="form-control" name="chol4" id="chol4" placeholder="mg/dl">
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
					<input type="checkbox" class="custom-control-input"name="heart_disease4" id="heart_disease4">
					<span class="custom-control-label">Heart Disease</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="hhns4" id="hhns4">
					<span class="custom-control-label">HHNS</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="stroke4" id="stroke4">
					<span class="custom-control-label">Stroke</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="foot_complication4" id="foot_complication4">
					<span class="custom-control-label">Foot Complication</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="neuopathy4" id="neuopathy4">
					<span class="custom-control-label">Neuropathy</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="pvd4" id="pvd4">
					<span class="custom-control-label">PVD</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="retinpathy4" id="retinpathy4">
					<span class="custom-control-label">Retinopathy</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="skin_disease4" id="skin_disease4">
					<span class="custom-control-label">Skin Disease</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input"  name="ckd4" id="ckd4">
					<span class="custom-control-label">CKD</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="gastro_complication4" id="gastro_complication4">
					<span class="custom-control-label">Gastro Complication</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="dka4" id="dka4">
					<span class="custom-control-label">DKA</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="hypoglycaemia4" id="hypoglycaemia4">
					<span class="custom-control-label">Hypoglycaemia</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="htn4" id="htn4">
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
					<select  name="prev_treatment4" id="prev_treatment4" class="form-control">
						<option value='0'>--Select Treatment--</option>
						<option value="Lifestyle (No medication)">Lifestyle (No medication)</option>
						<option value="Oral">Oral</option>
						<option value="Injection Insulin">Injection Insulin</option>
						<option value="Oral & Insulin">Oral & Insulin</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>OGLD Usage</label>
					<select  name="prev_ogld_status4" id="prev_ogld_status4" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>								
				</div>
			</div>
		</div>
		<div class="form-group">
			
			<div class="row gutters-xs">
				
				<div class="col-4">
					<div class="form-group">
						<label>OGLD</label><br>
						<input type="text" name="prev_ogld[]" id="prev_ogldname14" data-visit="3"  placeholder="OGLD" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					<label>Dosagess</label><br>
					<input type="text" class="form-control" data-visit="4" name="pre_og_bf4[]" id="pre_og_bf4" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="4" name="pre_og_lunch4[]" id="pre_og_lunch4" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="4" data-type="basal" name="pre_og_dinner4[]" id="pre_og_dinner4" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="4" data-type="basal" name="pre_og_bt4[]" id="pre_og_bt4" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
					<button type="button" name="add_pre_ogld4" id="add_pre_ogld4" class="btn btn-success" data-visit="3" title="Add another OGLD" style="float: left;width: 10%;">+</button>
				</div>
			</div>
			<div class="row gutters-xs" id="ogldmultipre4"></div>
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
					<select  name="prev_insulin4" id="prev_insulin4" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Insulin Type</label>
					<select  name="prev_insulintype4" id="prev_insulintype4" class="form-control">
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
						<label>Insulin</label><br>
						<input type="text" name="prev_basal4[]" id="prev_basal4" data-visit="4"  placeholder="Insulin" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					<label>Dosagess</label><br>
								<input type="text" class="form-control" data-visit="4" data-type="basal" name="prev_basaldm4[]" id="prev_basaldm4" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
								<input type="text" class="form-control" data-visit="4" data-type="basal" name="prev_basaldn4[]" id="prev_basaldn4" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
								<input type="text" class="form-control" data-visit="4" data-type="basal" name="prev_basaldt4[]" id="prev_basaldt4" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
								<input type="text" class="form-control" data-visit="4" data-type="basal" name="prev_basalbed4[]" id="prev_basalbed4" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
								<button type="button" name="prev_addbosal4" id="prev_addbosal4" class="btn btn-success" data-visit="4" style="float: left;width: 10%;">+</button>
				</div>
			</div>
			<div class="row gutters-xs" id="pre_insulin4"></div>
			<div class="row">
				<table class="table table-striped responsive-table">

                  <tbody id="insulin_tablepre">
                  </tbody>
                </table>
			</div>
		</div>




	</div> <!-- End PREVIOUS TREATMENT -->
	<div class="col-lg-6 col-sm-12 border"> <!-- CURRENT TREATMENT -->
		<h3 class="bg-primary">CURRENT TREATMENT</h4>

		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Type of Treatment</label>
					<select  name="treatment4" id="treatment4" class="form-control">
						<option value='0'>--Select Treatment--</option>
						<option value="Lifestyle (No medication)">Lifestyle (No medication)</option>
						<option value="Oral">Oral</option>
						<option value="Injection Insulin">Injection Insulin</option>
						<option value="Oral & Insulin">Oral & Insulin</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>OGLD Usage</label>
					<select  name="ogld_status4" id="ogld_status4" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>								
				</div>
			</div>
		</div>
		<div class="form-group">
			
			<div class="row gutters-xs">
				
				<div class="col-4">
					<div class="form-group">
						<label>OGLD</label><br>
						<input type="text" name="ogld4[]" id="ogldname14" data-visit="4"  placeholder="OGLD" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					<label>Dosagess</label><br>
					<input type="text" class="form-control" data-visit="4" name="crnt_og_bf4[]" id="crnt_og_bf4" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
					<input type="text" class="form-control" data-visit="4" name="crnt_og_lunch4[]" id="crnt_og_lunch4" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="4" data-type="basal" name="crnt_og_dinner4[]" id="crnt_og_dinner4" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
					<input type="text" class="form-control" data-visit="4" data-type="basal" name="crnt_og_bt4[]" id="crnt_og_bt4" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
					<button type="button" name="add_ogld" id="add_ogld4" class="btn btn-success" data-visit="3" title="Add another OGLD" style="float: left;width: 10%;">+</button>
				</div>
			</div>
			<div class="row gutters-xs" id="ogldmulti4"></div>
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
					<select  name="insulin4" id="insulin4" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Insulin Type</label>
					<select  name="cr_insulintype4" id="cr_insulintype4" class="form-control">
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
						<label>Insulin</label><br>
						<input type="text" name="basal4[]" id="basal4" data-visit="4"  placeholder="Insulin" autocomplete="off" class="form-control" />
					</div>
				</div>
				<div class="col-8">
					<label>Dosagess</label><br>
								<input type="text" class="form-control" data-visit="4" data-type="basal" name="basaldm4[]" id="basaldm4" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
								<input type="text" class="form-control" data-visit="4" data-type="basal" name="basaldn4[]" id="basaldn4" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
								<input type="text" class="form-control" data-visit="4" data-type="basal" name="basaldt4[]" id="basaldt4" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
								<input type="text" class="form-control" data-visit="4" data-type="basal" name="basalbed4[]" id="basalbed4" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
								<button type="button" name="addbosal4" id="addbosal4" class="btn btn-success" data-visit="4" style="float: left;width: 10%;">+</button>
				</div>
				
			</div>
			<div class="row gutters-xs" id="insulin_wrapper4"></div>

		</div>
	</div> <!-- End CURRENT TREATMENT -->
</div>

<div class="row">
	<div class="errormessage"></div>
	<div class="col-lg-12">
	<input type="submit" class="btn btn-primary float-right" value="Submit" id="submitbtn4" name="submitbtn4">															
	</div>
</div>
<?php echo form_close(); ?> 



