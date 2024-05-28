
											
<!-- <form method="Post" name="form_post2" action="<?php echo base_url('patient/atd_save');?>"> -->

<div class="row border">
	<!-- <input type="hidden" class="form-control" id="pcode2" name="pcode2" value="<?php echo $metadata['center_id'].'-'.$countpatient->totalpatientbycenter.'-'.date('dmY');?>" autocomplete="off" readonly > -->

	<div class="col">
		<div class="form-group">
			<label class="form-label" for="atd_doctorid2">Visiting Doctor: </label>
			<select id="atd_doctorid2" name="atd_doctorid2" class="form-control select2-show-search" style="width: 100%">
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
			<input name="vdate2" id="vdate2" placeholder="e.g. 15th September 2019, 15-09-2019" autocomplete="off" class="form-control fc-datepicker"/>
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
					<input type="text" class="form-control" data-visit="3" name="atd_height2" id="atd_height2" placeholder="CM">
					<div class="form-error" id="error-atd_height2"></div>
				</div>
				<div class="form-group">
					<label>Waist</label>
					<input type="text" class="form-control" data-visit="3" name="atd_waist2" id="atd_waist2" placeholder="CM">
					<div class="form-error" id="error-atd_waist2"></div>
				</div>
				<div class="form-group">
					<label>SBP</label>
					<input type="text" class="form-control" name="atd_sbp2" id="atd_sbp2" placeholder="mmHg">
					<div class="form-error" id="error-atd_sbp2"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Weight</label>
					<input type="text" class="form-control" data-visit="3" name="atd_weight2" id="atd_weight2" placeholder="KG">
				</div>
				<div class="form-group">
					<label>Hip</label>
					<input type="text" class="form-control" data-visit="3" name="atd_hip2" id="atd_hip2" placeholder="CM">
					<div class="form-error" id="error-atd_hip2"></div>
				</div>
				<div class="form-group">
					<label>DBP</label>
					<input type="text" class="form-control" name="atd_dbp2" id="atd_dbp2" placeholder="mmHg">
					<div class="form-error" id="error-atd_dbp2"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>BMI</label>
					<input type="text" class="form-control" name="atd_bmi2" id="atd_bmi2" placeholder="kg/m2">
				</div>
				<div class="form-group">
					<label>Waist-hip-ratio</label>
					<input type="text" class="form-control" name="atd_waist_hip_ratio2" id="atd_waist_hip_ratio2" placeholder="">
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
					<input type="text" class="form-control" name="atd_hba1c2" id="atd_hba1c2" placeholder="%">
				</div>
				<div class="form-group">
					<label>Acetone</label>
					<input type="text" class="form-control" name="atd_aceton2" id="atd_aceton2" placeholder="">
				</div>
				<div class="form-group">
					<label>LDL-C</label>
					<input type="text" class="form-control" name="atd_ldl_c2" id="atd_ldl_c2" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>FPG</label>
					<input type="text" class="form-control"  name="atd_fpg2" id="atd_fpg2" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>Urine Albumin</label>
					<select name="atd_urine_albumin2" id="atd_urine_albumin2" class="form-control">
						<option value="0">NO</option>
						<option value="1">Yes</option>
														
					</select>
				</div>
				<div class="form-group">
					<label>HDL-C</label>
					<input type="text" class="form-control"  name="atd_hdl_c2" id="atd_hdl_c2" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>2hPG/Post meal</label>
					<input type="text" class="form-control" name="atd_tohpg2" id="atd_tohpg2" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>S. Creatinine</label>
					<input type="text" class="form-control"name="atd_s_creatinine2" id="atd_s_creatinine2" placeholder="mg/dl">
				</div>
				<div class="form-group">
					<label>Triglycerides</label>
					<input type="text" class="form-control" name="atd_triglycerides2" id="atd_triglycerides2" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>RBS</label>
					<input type="text" class="form-control" name="atd_rbs2" id="atd_rbs2" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>CHOL</label>
					<input type="text" class="form-control" name="atd_chol2" id="atd_chol2" placeholder="mg/dl">
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
					<input type="checkbox" class="custom-control-input"name="atd_heat2" id="atd_heat2">
					<span class="custom-control-label">Heart Disease</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_hhns2" id="atd_hhns2">
					<span class="custom-control-label">HHNS</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_stroke2" id="atd_stroke2">
					<span class="custom-control-label">Stroke</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_foot_complication2" id="atd_foot_complication2">
					<span class="custom-control-label">Foot Complication</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_neuopathy2" id="atd_neuopathy2">
					<span class="custom-control-label">Neuropathy</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_pvd2" id="atd_pvd2">
					<span class="custom-control-label">PVD</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_retinopathy2" id="atd_retinopathy2">
					<span class="custom-control-label">Retinopathy</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_skin2" id="atd_skin2">
					<span class="custom-control-label">Skin Disease</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input"  name="atd_ckd2" id="atd_ckd2">
					<span class="custom-control-label">CKD</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_gastro2" id="atd_gastro2">
					<span class="custom-control-label">Gastro Complication</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_dka2" id="atd_dka2">
					<span class="custom-control-label">DKA</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_hypoglycaemia2" id="atd_hypoglycaemia2">
					<span class="custom-control-label">Hypoglycaemia</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_htn2" id="atd_htn2">
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
					<select  name="prev_treatment32" id="prev_treatment32" class="form-control">
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
					<select  name="prev_ogldusag2" id="prev_ogldusag2" class="form-control">
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
						<select id="ogld_pre2" name="ogld_pre2" class="form-control select2-show-search" style="width: 100%">
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
						<input type="text" class="form-control" name="ogld_bf122" id="ogld_bf122"  value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Lunch</label>
						<input type="text" class="form-control" name="ogld_lunch122" id="ogld_lunch122" placeholder="lunch" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Dinner</label>
						<input type="text" class="form-control" name="ogld_dinner122" id="ogld_dinner122" placeholder="Din" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Bed Time</label>
						<input type="text" class="form-control" name="ogld_bt122" id="ogld_bt122" placeholder="Bed" value="0">
					</div>
				</div>

				<span class="col-auto">
					
					<label><br/></label>
					<br/>
					<label></label>
					<button class="btn btn-primary" type="button" id="ogld_sub_pre2"><i class="fa fa-plus-square"></i></button>
				</span>
			</div>
			<div class="row">
				<table class="table table-striped responsive-table">

                  <tbody id="ogld122_table">
                  </tbody>
                </table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Insulin Usage</label>
					<select  name="insulin_usag122" id="insulin_usag122" class="form-control">
						<option value="">Select</option>
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Insulin Type</label>
					<select  name="prev_insulintype32" id="prev_insulintype32" class="form-control">
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
					<select  name="old_insln122" id="old_insln122" class="form-control select2-show-search">
						<option value="">--Select--</option>
	<?php foreach ($insulinlist as $insln) {?>
		<option value="<?php echo $insln->insulin_id; ?>"><?php echo $insln->insulin_name; ?></option>
	<?php } ?>
														
					</select>
				</div>
				
				<div class="col">
					<div class="form-group">
						<label>Morning</label>
						<input type="text" class="form-control" name="bf122" id="bf122"  value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Lunch</label>
						<input type="text" class="form-control" name="lunch122" id="lunch122" placeholder="lunch" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Dinner</label>
						<input type="text" class="form-control" name="dinner122" id="dinner122" placeholder="Din" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Bed Time</label>
						<input type="text" class="form-control" name="bt122" id="bt122" placeholder="Bed" value="0">
					</div>
				</div>
				<span class="col-auto">
					
					<label><br/></label>
					<br/>
					<label></label>
					<button class="btn btn-primary" type="button" id="btn_insln_old2"><i class="fa fa-plus-square"></i></button>
				</span>
			</div>
			<div class="row">
				<table class="table table-striped responsive-table">

                  <tbody id="old_insln122_name">
                  </tbody>
                </table>
			</div>
		</div>




	</div> <!-- End PREVIOUS TREATMENT -->
	
</div>
<div class="row">
	<div class="errormessage"></div>
	<div class="col-lg-12">
	<input type="submit" class="btn btn-primary float-right" value="Submit" id="submitbtn2" name="submitbtn2">															
	</div>
</div>
<!-- </form> -->

