
											
<!-- <form method="Post" name="form_post2" action="<?php echo base_url('patient/atd_save');?>"> -->

<div class="row border">
	<!-- <input type="hidden" class="form-control" id="pcode2" name="pcode2" value="<?php echo $metadata['center_id'].'-'.$countpatient->totalpatientbycenter.'-'.date('dmY');?>" autocomplete="off" readonly > -->

	<div class="col">
		<div class="form-group">
			<label class="form-label" for="atd_doctorid">Visiting Doctor: </label>
			<select id="atd_doctorid" name="atd_doctorid" class="form-control select2-show-search" style="width: 100%">
				<option>--Select Doctor--</option>
				<?php foreach ($doctorlist as $dctr) {?>
					<option value="<?php echo $dctr->doctor_id;?>"><?php echo $dctr->doctor_name;?></option>
				<?php }?>
												
			</select>
			<div class="form-error" id="error-atd_doctorid"></div>			
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label class="form-label" for="vdate">Visiting Date:</label>	
			<input name="vdate" id="vdate" placeholder="e.g. 15th September 2019, 15-09-2019" autocomplete="off" class="form-control fc-datepicker"/>
			<div class="form-error" id="error-vdate"></div>
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
					<input type="text" class="form-control" name="atd_height" id="atd_height" placeholder="CM">
					<div class="form-error" id="error-atd_height"></div>
				</div>
				<div class="form-group">
					<label>Waist</label>
					<input type="text" class="form-control" name="atd_waist" id="atd_waist" placeholder="CM">
					<div class="form-error" id="error-atd_waist"></div>
				</div>
				<div class="form-group">
					<label>SBP</label>
					<input type="text" class="form-control" name="atd_sbp" id="atd_sbp" placeholder="mmHg">
					<div class="form-error" id="error-atd_sbp"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Weight</label>
					<input type="text" class="form-control" name="atd_weight" id="atd_weight" placeholder="KG">
				</div>
				<div class="form-group">
					<label>Hip</label>
					<input type="text" class="form-control" data-visit="3" name="atd_hip" id="atd_hip" placeholder="CM">
					<div class="form-error" id="error-atd_hip"></div>
				</div>
				<div class="form-group">
					<label>DBP</label>
					<input type="text" class="form-control" name="atd_dbp" id="atd_dbp" placeholder="mmHg">
					<div class="form-error" id="error-atd_dbp"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>BMI</label>
					<input type="text" class="form-control" name="atd_bmi" id="atd_bmi" placeholder="kg/m2" readonly>
				</div>
				<div class="form-group">
					<label>Waist-hip-ratio</label>
					<input type="text" class="form-control" name="atd_waist_hip_ratio" id="atd_waist_hip_ratio" placeholder="" readonly>
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
					<input type="text" class="form-control" name="atd_hba1c" id="atd_hba1c" placeholder="%">
				</div>
				<div class="form-group">
					<label>Acetone</label>
					<input type="text" class="form-control" name="atd_aceton" id="atd_aceton" placeholder="">
				</div>
				<div class="form-group">
					<label>LDL-C</label>
					<input type="text" class="form-control" name="atd_ldl_c" id="atd_ldl_c" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>FPG</label>
					<input type="text" class="form-control"  name="atd_fpg" id="atd_fpg" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>Urine Albumin</label>
					<select name="atd_urine_albumin" id="atd_urine_albumin" class="form-control">
						<option value="0">NO</option>
						<option value="1">Yes</option>
														
					</select>
				</div>
				<div class="form-group">
					<label>HDL-C</label>
					<input type="text" class="form-control"  name="atd_hdl_c" id="atd_hdl_c" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>2hPG/Post meal</label>
					<input type="text" class="form-control" name="atd_tohpg" id="atd_tohpg" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>S. Creatinine</label>
					<input type="text" class="form-control"name="atd_s_creatinine" id="atd_s_creatinine" placeholder="mg/dl">
				</div>
				<div class="form-group">
					<label>Triglycerides</label>
					<input type="text" class="form-control" name="atd_triglycerides" id="atd_triglycerides" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>RBS</label>
					<input type="text" class="form-control" name="atd_rbs" id="atd_rbs" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>CHOL</label>
					<input type="text" class="form-control" name="atd_chol" id="atd_chol" placeholder="mg/dl">
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
					<input type="checkbox" class="custom-control-input"name="atd_heat" id="atd_heat">
					<span class="custom-control-label">Heart Disease</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_hhns" id="atd_hhns">
					<span class="custom-control-label">HHNS</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_stroke" id="atd_stroke">
					<span class="custom-control-label">Stroke</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_foot_complication" id="atd_foot_complication">
					<span class="custom-control-label">Foot Complication</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_neuopathy" id="atd_neuopathy">
					<span class="custom-control-label">Neuropathy</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_pvd" id="atd_pvd">
					<span class="custom-control-label">PVD</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_retinopathy" id="atd_retinopathy">
					<span class="custom-control-label">Retinopathy</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_skin" id="atd_skin">
					<span class="custom-control-label">Skin Disease</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input"  name="atd_ckd" id="atd_ckd">
					<span class="custom-control-label">CKD</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_gastro" id="atd_gastro">
					<span class="custom-control-label">Gastro Complication</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_dka" id="atd_dka">
					<span class="custom-control-label">DKA</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_hypoglycaemia" id="atd_hypoglycaemia">
					<span class="custom-control-label">Hypoglycaemia</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_htn" id="atd_htn">
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
					<select  name="prev_treatment3" id="prev_treatment3" class="form-control">
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
					<select  name="prev_ogldusag" id="prev_ogldusag" class="form-control">
						<option value="">Select</option>
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>								
				</div>
			</div>
		</div>
		<div class="form-group">
			
			<div class="row gutters-xs">
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
			</div>
			<div class="row">
				<table class="table table-striped responsive-table">

                  <tbody id="ogld12_table">
                  </tbody>
                </table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Insulin Usage</label>
					<select  name="insulin_usag12" id="insulin_usag12" class="form-control">
						<option value="">Select</option>
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Insulin Type</label>
					<select  name="prev_insulintype3" id="prev_insulintype3" class="form-control">
						<option value="">--Select Insulin Type--</option>
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
				<div class="col-3">
					<label>Insulin</label>
					<select  name="old_insln12" id="old_insln12" class="form-control select2-show-search">
						<option value="">--Select--</option>
	<?php foreach ($insulinlist as $insln) {?>
		<option value="<?php echo $insln->insulin_id; ?>"><?php echo $insln->insulin_name; ?></option>
	<?php } ?>
														
					</select>
				</div>
				
				<div class="col">
					<div class="form-group">
						<label>Morning</label>
						<input type="text" class="form-control" name="bf12" id="bf12"  value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Lunch</label>
						<input type="text" class="form-control" name="lunch12" id="lunch12" placeholder="lunch" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Dinner</label>
						<input type="text" class="form-control" name="dinner12" id="dinner12" placeholder="Din" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Bed Time</label>
						<input type="text" class="form-control" name="bt12" id="bt12" placeholder="Bed" value="0">
					</div>
				</div>
				<span class="col-auto">
					
					<label><br/></label>
					<br/>
					<label></label>
					<button class="btn btn-primary" type="button" id="btn_insln_old"><i class="fa fa-plus-square"></i></button>
				</span>
			</div>
			<div class="row">
				<table class="table table-striped responsive-table">

                  <tbody id="insulin12_table">
                  </tbody>
                </table>
			</div>
		</div>




	</div> <!-- End PREVIOUS TREATMENT -->
	
</div>
<div class="row">
	<div class="errormessage"></div>
	<div class="col-lg-12">
	<input type="submit" class="btn btn-primary float-right" value="Submit" id="submitbtn1" name="submitbtn2">															
	</div>
</div>
<!-- </form> -->

