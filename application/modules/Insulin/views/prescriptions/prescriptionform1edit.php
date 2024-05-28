
											


<div class="row border">
	<!-- <input type="hidden" class="form-control" id="pcode2" name="pcode2" value="<?php echo $metadata['center_id'].'-'.$countpatient->totalpatientbycenter.'-'.date('dmY');?>" autocomplete="off" readonly > -->

	<div class="col">
		<div class="form-group">
			<label class="form-label" for="atd_doctorid">Visiting Doctor: </label>
			<select id="atd_doctorid" name="atd_doctorid" class="form-control select2-show-search" style="width: 100%">
				<option value="">--Select Doctor--</option>
				<?php foreach ($doctorlist as $dctr) {?>
					<option value="<?php echo $dctr->doctor_id;?>" <?php if ($dctr->doctor_id==$attime->doctor_id) {echo 'selected';} ?>><?php echo $dctr->doctor_name;?></option>
				<?php }?>
												
			</select>
			<div class="form-error" id="error-atd_doctorid"></div>			
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label class="form-label" for="vdate">Visiting Date:</label>	
			<input name="vdate" id="vdate" value="<?php echo date("d-m-Y", strtotime($attime->chk_date)) ?>" placeholder="e.g. 15th September 2019, 15-09-2019" autocomplete="off" class="form-control fc-datepicker"/>
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
					<input type="text" class="form-control" name="atd_height" id="atd_height" value="<?php echo $attime->height;?>" placeholder="CM">
					<div class="form-error" id="error-atd_height"></div>
				</div>
				<div class="form-group">
					<label>Waist</label>
					<input type="text" class="form-control" name="atd_waist" id="atd_waist" value="<?php echo $attime->waist;?>" placeholder="CM">
					<div class="form-error" id="error-atd_waist"></div>
				</div>
				<div class="form-group">
					<label>SBP</label>
					<input type="text" class="form-control" name="atd_sbp" id="atd_sbp" value="<?php echo $attime->sbp;?>" placeholder="mmHg">
					<div class="form-error" id="error-atd_sbp"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Weight</label>
					<input type="text" class="form-control" value="<?php echo $attime->weight;?>" name="atd_weight" id="atd_weight" placeholder="KG">
				</div>
				<div class="form-group">
					<label>Hip</label>
					<input type="text" class="form-control" data-visit="3" value="<?php echo $attime->hip;?>" name="atd_hip" id="atd_hip" placeholder="CM">
					<div class="form-error" id="error-atd_hip"></div>
				</div>
				<div class="form-group">
					<label>DBP</label>
					<input type="text" class="form-control" name="atd_dbp" value="<?php echo $attime->dbp;?>" id="atd_dbp" placeholder="mmHg">
					<div class="form-error" id="error-atd_dbp"></div>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>BMI</label>
					<input type="text" class="form-control" value="<?php echo $attime->bmi;?>" name="atd_bmi" id="atd_bmi" placeholder="kg/m2" readonly>
				</div>
				<div class="form-group">
					<label>Waist-hip-ratio</label>
					<input type="text" class="form-control" value="<?php echo $attime->waist_hip_ratio;?>" name="atd_waist_hip_ratio" id="atd_waist_hip_ratio" placeholder="" readonly>
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
					<input type="text" class="form-control" value="<?php echo $attime->hba1c;?>"  name="atd_hba1c" id="atd_hba1c" placeholder="%">
				</div>
				<div class="form-group">
					<label>Acetone</label>
					<input type="text" class="form-control" value="<?php echo $attime->aceton;?>" name="atd_aceton" id="atd_aceton" placeholder="">
				</div>
				<div class="form-group">
					<label>LDL-C</label>
					<input type="text" class="form-control" value="<?php echo $attime->ldl_c;?>" name="atd_ldl_c" id="atd_ldl_c" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>FPG</label>
					<input type="text" class="form-control" value="<?php echo $attime->fpg;?>"  name="atd_fpg" id="atd_fpg" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>Urine Albumin</label>
					<select name="atd_urine_albumin" id="atd_urine_albumin" class="form-control">
						<option value="0" <?php if($attime->urine_albumin==0) {echo 'selected';} ?> >NO</option>
						<option value="1" <?php if($attime->urine_albumin==1) {echo 'selected';} ?> >Yes</option>
														
					</select>
				</div>
				<div class="form-group">
					<label>HDL-C</label>
					<input type="text" class="form-control" value="<?php echo $attime->hdl_c;?>" name="atd_hdl_c" id="atd_hdl_c" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>2hPG/Post meal</label>
					<input type="text" class="form-control" value="<?php echo $attime->tohpg_post;?>" name="atd_tohpg" id="atd_tohpg" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>S. Creatinine</label>
					<input type="text" class="form-control" name="atd_s_creatinine" id="atd_s_creatinine" placeholder="mg/dl" value="<?php echo $attime->s_creatinine;?>">
				</div>
				<div class="form-group">
					<label>Triglycerides</label>
					<input type="text" class="form-control" name="atd_triglycerides" id="atd_triglycerides" placeholder="mg/dl" value="<?php echo $attime->triglycerides;?>">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>RBS</label>
					<input type="text" class="form-control" value="<?php echo $attime->rbs;?>" name="atd_rbs" id="atd_rbs" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>CHOL</label>
					<input type="text" class="form-control" value="<?php echo $attime->chol;?>" name="atd_chol" id="atd_chol" placeholder="mg/dl">
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
					<input type="checkbox" class="custom-control-input" name="atd_heat" id="atd_heat" <?php if($attime->heat==1){echo 'checked';} ?> >
					<span class="custom-control-label">Heart Disease</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_hhns" id="atd_hhns" <?php if($attime->hhns==1){echo 'checked';} ?>>
					<span class="custom-control-label">HHNS</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_stroke" id="atd_stroke" <?php if($attime->stroke==1){echo 'checked';} ?>>
					<span class="custom-control-label">Stroke</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_foot_complication" id="atd_foot_complication" <?php if($attime->foot_complication==1){echo 'checked';} ?>>
					<span class="custom-control-label">Foot Complication</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_neuopathy" id="atd_neuopathy" <?php if($attime->neuropathy==1){echo 'checked';} ?>>
					<span class="custom-control-label">Neuropathy</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_pvd" id="atd_pvd" <?php if($attime->pvd==1){echo 'checked';} ?>>
					<span class="custom-control-label">PVD</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_retinopathy" id="atd_retinopathy" <?php if($attime->retinopathy==1){echo 'checked';} ?>>
					<span class="custom-control-label">Retinopathy</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_skin" id="atd_skin" <?php if($attime->skin==1){echo 'checked';} ?>>
					<span class="custom-control-label">Skin Disease</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input"  name="atd_ckd" id="atd_ckd" <?php if($attime->ckd==1){echo 'checked';} ?>>
					<span class="custom-control-label">CKD</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_gastro" id="atd_gastro" <?php if($attime->gastro==1){echo 'checked';} ?>>
					<span class="custom-control-label">Gastro Complication</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_dka" id="atd_dka" <?php if($attime->dka==1){echo 'checked';} ?>>
					<span class="custom-control-label">DKA</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_hypoglycaemia" id="atd_hypoglycaemia" <?php if($attime->hypoglycaemia==1){echo 'checked';} ?>>
					<span class="custom-control-label">Hypoglycaemia</span>
				</label>
	    </div>
	    <div class="col-lg-6">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="atd_htn" id="atd_htn" <?php if($attime->htn==1){echo 'checked';} ?>>
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
						<option value="Lifestyle (No medication)" <?php if($attime->treatment=='Lifestyle (No medication)'){echo 'selected';} ?> >Lifestyle (No medication)</option>
						<option value="Oral" <?php if($attime->treatment=='Oral'){echo 'selected';} ?>>Oral</option>
						<option value="Injection Insulin" <?php if($attime->treatment=='Injection Insulin'){echo 'selected';} ?>>Injection Insulin</option>
						<option value="Oral & Insulin" <?php if($attime->treatment=='Oral & Insulin'){echo 'selected';} ?>>Oral & Insulin</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>OGLD Usage</label>
					<select  name="prev_ogldusag" id="prev_ogldusag" class="form-control">
						<option value="">Select</option>
						<option value="0" <?php if($attime->ogld_status==0){echo 'selected';}?>>No</option>
						<option value="1" <?php if($attime->ogld_status==1){echo 'selected';}?>>Yes</option>
														
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
                  	
                  	<?php $at_ogld = $this->Patient_model->get_all_ogld($attime->pc_id);
                  	print_r($at_ogld);
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
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Insulin Usage</label>
					<select  name="insulin_usag12" id="insulin_usag12" class="form-control">
						<option value="">Select</option>
						<option value="0" <?php if($attime->insulin_status==0){echo 'selected';}?>>No</option>
						<option value="1" <?php if($attime->insulin_status==1){echo 'selected';}?>>Yes</option>
														
					</select>								
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Insulin Type</label>
					<select  name="prev_insulintype3" id="prev_insulintype3" class="form-control">
						<option value="">--Select Insulin Type--</option>
						<option value="Bolus ( Meatime Insulin )" <?php if($attime->insulintype=='Bolus ( Meatime Insulin )'){echo 'selected';}?>>Bolus ( Meatime Insulin )</option>
						<option value="Premix" <?php if($attime->insulintype=='Premix'){echo 'selected';}?>>Premix</option>
						<option value="Split Mixed" <?php if($attime->insulintype=='Split Mixed'){echo 'selected';}?>>Split Mixed</option>
						<option value="Basal & Bolus" <?php if($attime->insulintype=='Basal & Bolus'){echo 'selected';}?>>Basal & Bolus</option>
						<option value="Basal Plus" <?php if($attime->insulintype=='Basal Plus'){echo 'selected';}?>>Basal Plus</option>
						<option value="Basal Only" <?php if($attime->insulintype=='Basal Only'){echo 'selected';}?>>Basal Only</option>
														
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

                  	<tr id="tr_1"><td data-title="#" id="11">1</td><td data-title="Medicine" id="12">Actrapid 100 IU Vial<input type="hidden" name="insln12_name[]" value="38" id="insln12_name[]"></td><td data-title="Dose" id="13">2+2+0+0<input type="hidden" name="ins_bf12[]" value="2" id="ins_bf12[]"><input type="hidden" name="ins_lunch12[]" value="2" id="ins_lunch12[]"><input type="hidden" name="ins_dinner12[]" value="0" id="ins_dinner12[]"><input type="hidden" name="ins_bt12[]" value="0" id="ins_bt12[]"></td><td data-title="Action" id="16"><div id="1" class="btn-group medicine_edit"><button class="btn btn-danger btn-sm" data-placement="bottom" data-original-title="Delete Insulin" data-toggle="tooltip"><i class="fa fa-close"></i></button></div></td></tr>
                  	
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

