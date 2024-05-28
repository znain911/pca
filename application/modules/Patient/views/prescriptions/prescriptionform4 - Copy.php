
<div class="row border">
	<div class="col">
		<div class="form-group">
			<label>Visiting Date:</label>								
			<input name="vdate4" id="vdate4" placeholder="Select Date" autocomplete="off" class="form-control fc-datepicker"/>
			
		</div>
		<div class="form-group">
			<!-- <label class="form-label" for="doctorid_v">Visiting Doctor: </label> -->
			<select id="doctorid4" name="doctorid4"  class="form-control select2-show-search" style="width: 100%">
				<option>--Select Doctor--</option>
				<?php foreach ($doctorlist as $dctr2) {?>
					<option value="<?php echo $dctr2->doctor_id;?>"><?php echo $dctr2->doctor_name;?></option>
				<?php }?>
												
			</select>								
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Physical Activity</label>
			<input type="text" name="dayp" id="dayp" class="form-control" placeholder="Day per Week">
			<div style="height: 5px; clear: both;"></div>
			<input type="text" name="physical" id="physical" class="form-control" placeholder="Minute per Day">
			
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Vegetables</label>
			<input type="text" name="dayv" id="dayv" class="form-control" placeholder="Day per Week">
			<div style="height: 5px; clear: both;"></div>
			<input type="text" name="vegetables" id="vegetables" class="form-control" placeholder="Times per Day">

		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Fruits</label>
			<input type="text" name="dayf" id="dayf" class="form-control" placeholder="Day per Week">
			<div style="height: 5px; clear: both;"></div>
			<input type="text" name="fruits" id="fruits" class="form-control" placeholder="Times per Day">
			
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
					<input type="text" class="form-control" data-visit="3" name="height3" id="height3" placeholder="CM">
				</div>
				<div class="form-group">
					<label>Waist</label>
					<input type="text" class="form-control" data-visit="3" name="waist3" id="waist3" placeholder="CM">
				</div>
				<div class="form-group">
					<label>SBP</label>
					<input type="text" class="form-control" name="sbp3" id="sbp3" placeholder="mmHg">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Weight</label>
					<input type="text" class="form-control" data-visit="3" name="weight3" id="weight3" placeholder="KG">
				</div>
				<div class="form-group">
					<label>Hip</label>
					<input type="text" class="form-control" data-visit="3" name="hip3" id="hip3" placeholder="CM">
				</div>
				<div class="form-group">
					<label>DBP</label>
					<input type="text" class="form-control" name="dbp3" id="dbp3" placeholder="mmHg">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>BMI</label>
					<input type="text" class="form-control" name="bmi3" id="bmi3" placeholder="kg/m2">
				</div>
				<div class="form-group">
					<label>Waist-hip-ratio</label>
					<input type="text" class="form-control" name="waist_hip_ratio3" id="waist_hip_ratio3" placeholder="">
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
					<input type="text" class="form-control" name="hba1c3" id="hba1c3" placeholder="%">
				</div>
				<div class="form-group">
					<label>Acetone</label>
					<input type="text" class="form-control" name="aceton3" id="aceton3" placeholder="">
				</div>
				<div class="form-group">
					<label>LDL-C</label>
					<input type="text" class="form-control" name="ldl_c3" id="ldl_c3" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>FPG</label>
					<input type="text" class="form-control"  name="fpg3" id="fpg3" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>Urine Albumin</label>
					<select name="urine_albumin3" id="urine_albumin3" class="form-control">
						<option value="0">NO</option>
						<option value="1">Yes</option>
														
					</select>
				</div>
				<div class="form-group">
					<label>HDL-C</label>
					<input type="text" class="form-control"  name="hdl_c3" id="hdl_c3" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>2hPG/Post meal</label>
					<input type="text" class="form-control" name="tohpg3" id="tohpg3" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>S. Creatinine</label>
					<input type="text" class="form-control"name="s_creatinine3" id="s_creatinine3" placeholder="mg/dl">
				</div>
				<div class="form-group">
					<label>Triglycerides</label>
					<input type="text" class="form-control" name="triglycerides3" id="triglycerides3" placeholder="mg/dl">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>RBS</label>
					<input type="text" class="form-control" name="rbs3" id="rbs3" placeholder="mmol/L">
				</div>
				<div class="form-group">
					<label>CHOL</label>
					<input type="text" class="form-control" name="chol3" id="chol3" placeholder="mg/dl">
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
					<input type="checkbox" class="custom-control-input"name="heart_disease3" id="heart_disease3">
					<span class="custom-control-label">Heart Disease</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="hhns3" id="hhns3">
					<span class="custom-control-label">HHNS</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="stroke3" id="stroke3">
					<span class="custom-control-label">Stroke</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="foot_complication3" id="foot_complication3">
					<span class="custom-control-label">Foot Complication</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="neuopathy3" id="neuopathy3">
					<span class="custom-control-label">Neuropathy</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="pvd3" id="pvd3">
					<span class="custom-control-label">PVD</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="retinpathy3" id="retinpathy3">
					<span class="custom-control-label">Retinopathy</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="skin_disease3" id="skin_disease3">
					<span class="custom-control-label">Skin Disease</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input"  name="ckd3" id="ckd3">
					<span class="custom-control-label">CKD</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="gastro_complication3" id="gastro_complication3">
					<span class="custom-control-label">Gastro Complication</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="dka3" id="dka3">
					<span class="custom-control-label">DKA</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="hypoglycaemia3" id="hypoglycaemia3">
					<span class="custom-control-label">Hypoglycaemia</span>
				</label>
	    </div>
	    <div class="form-check-inline">
	      <label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="htn3" id="htn3">
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
					<select  name="prev_ogld3" id="prev_ogld3" class="form-control">
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
						<select id="ogld_pre3" name="ogld_pre3" class="form-control select2-show-search" style="width: 100%">
							<option>--Select OGLD--</option>
							<?php foreach ($ogldlist as $ogld2) {?>
								<option value="<?php echo $ogld2->id;?>"><?php echo $ogld2->brand;?></option>
							<?php }?>
															
						</select>				
					</div>
				</div>
				<!-- <div class="col">
					<label>Dosage</label>
					<select  name="ogld_dosv" id="ogld_dosv" class="form-control">
						<option value="1+1+1">1+1+1</option>
                         <option value="1+1+0">1+1+0</option>
                         <option value="1+0+1">1+0+1</option>
                         <option value="0+1+1">0+1+1</option>
                         <option value="1+0+0">1+0+0</option>
                         <option value="0+1+0">0+1+0</option>
                         <option value="0+0+1">0+0+1</option>
                         <option value="0.5+0.5+0.5">0.5+0.5+0.5</option>
                         <option value="0.5+0+0">0.5+0+0</option>
                         <option value="0.5+0.5+0">0.5+0.5+0</option>
                         <option value="0.5+0.5+0">0.5+0.5+0</option>
                         <option value="0+0.5+0">0+0.5+0</option>
														
					</select>
				</div> -->
				<div class="col">
					<div class="form-group">
						<label>Morning</label>
						<input type="text" class="form-control" name="pre_og_bf" id="pre_og_bf"  value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Lunch</label>
						<input type="text" class="form-control" name="pre_og_lunch" id="pre_og_lunch" placeholder="lunch" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Dinner</label>
						<input type="text" class="form-control" name="pre_og_dinner" id="pre_og_dinner" placeholder="Din" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Bed Time</label>
						<input type="text" class="form-control" name="pre_og_bt" id="pre_og_bt" placeholder="Bed" value="0">
					</div>
				</div>

				<span class="col-auto">
					
					<label><br/></label>
					<br/>
					<label></label>
					<button class="btn btn-primary" type="button" id="add_medicine"><i class="fa fa-plus-square"></i></button>
				</span>
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
					<select  name="prev_insulintype3" id="prev_insulintype3" class="form-control">
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
				<div class="col">
					<label>Insulin</label>
					<select  name="prev_insln" id="prev_insln" class="form-control select2-show-search">
						<?php foreach ($insulinlist as $insln1) {?>
		<option value="<?php echo $insln1->insulin_id; ?>"><?php echo $insln1->insulin_name; ?></option>
	<?php } ?>
														
					</select>
				</div>
				<!-- <div class="col">
					<label>Dosage</label>
					<select  name="prev_ogld" id="prev_ogldname13" class="form-control">
						<option value="1+1+1">1+1+1</option>
                         <option value="1+1+0">1+1+0</option>
                         <option value="1+0+1">1+0+1</option>
                         <option value="0+1+1">0+1+1</option>
                         <option value="1+0+0">1+0+0</option>
                         <option value="0+1+0">0+1+0</option>
                         <option value="0+0+1">0+0+1</option>
                         <option value="0.5+0.5+0.5">0.5+0.5+0.5</option>
                         <option value="0.5+0+0">0.5+0+0</option>
                         <option value="0.5+0.5+0">0.5+0.5+0</option>
                         <option value="0.5+0.5+0">0.5+0.5+0</option>
                         <option value="0+0.5+0">0+0.5+0</option>
														
					</select>
				</div> -->
				<div class="col">
					<div class="form-group">
						<label>Morning</label>
						<input type="text" class="form-control" name="pre_insln_bf" id="pre_insln_bf"  value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Lunch</label>
						<input type="text" class="form-control" name="pre_insln_lunch" id="pre_insln_lunch" placeholder="lunch" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Dinner</label>
						<input type="text" class="form-control" name="pre_insln_dinner" id="pre_insln_dinner" placeholder="Din" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Bed Time</label>
						<input type="text" class="form-control" name="pre_insln_bt" id="pre_insln_bt" placeholder="Bed" value="0">
					</div>
				</div>

				<span class="col-auto">
					
					<label><br/></label>
					<br/>
					<label></label>
					<button class="btn btn-primary" type="button"><i class="fa fa-plus-square"></i></button>
				</span>
			</div>
		</div>




	</div> <!-- End PREVIOUS TREATMENT -->
	<div class="col-lg-6 col-sm-12 border"> <!-- CURRENT TREATMENT -->
		<h3 class="bg-primary">CURRENT TREATMENT</h4>

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
					<select  name="prev_ogld3" id="prev_ogld3" class="form-control">
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
						<select id="ogld_vc" name="ogld_vc" class="form-control select2-show-search" style="width: 100%">
							<option>--Select OGLD--</option>
							<?php foreach ($ogldlist as $ogld3) {?>
								<option value="<?php echo $ogld3->id;?>"><?php echo $ogld3->brand;?></option>
							<?php }?>
															
						</select>								
					</div>
				</div>
				<!-- <div class="col">
					<label>Dosage</label>
					<select  name="prev_ogld" id="prev_ogldname13" class="form-control">
						<option value="1+1+1">1+1+1</option>
                         <option value="1+1+0">1+1+0</option>
                         <option value="1+0+1">1+0+1</option>
                         <option value="0+1+1">0+1+1</option>
                         <option value="1+0+0">1+0+0</option>
                         <option value="0+1+0">0+1+0</option>
                         <option value="0+0+1">0+0+1</option>
                         <option value="0.5+0.5+0.5">0.5+0.5+0.5</option>
                         <option value="0.5+0+0">0.5+0+0</option>
                         <option value="0.5+0.5+0">0.5+0.5+0</option>
                         <option value="0.5+0.5+0">0.5+0.5+0</option>
                         <option value="0+0.5+0">0+0.5+0</option>
														
					</select>
				</div> -->
				<div class="col">
					<div class="form-group">
						<label>Morning</label>
						<input type="text" class="form-control" name="crnt_og_bf" id="crnt_og_bf"  value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Lunch</label>
						<input type="text" class="form-control" name="crnt_og_lunch" id="crnt_og_lunch" placeholder="lunch" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Dinner</label>
						<input type="text" class="form-control" name="crnt_og_dinner" id="crnt_og_dinner" placeholder="Din" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Bed Time</label>
						<input type="text" class="form-control" name="crnt_og_bt" id="crnt_og_bt" placeholder="Bed" value="0">
					</div>
				</div>
				<span class="col-auto">
					
					<label><br/></label>
					<br/>
					<label></label>
					<button class="btn btn-primary" type="button"><i class="fa fa-plus-square"></i></button>
				</span>
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
				<div class="col">
					<label>Insulin</label>
					<select  name="prev_ogld" id="prev_ogldname13" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
														
					</select>
				</div>
				<!-- <div class="col">
					<label>Dosage</label>
					<select  name="prev_ogld" id="prev_ogldname13" class="form-control">
						<option value="1+1+1">1+1+1</option>
                         <option value="1+1+0">1+1+0</option>
                         <option value="1+0+1">1+0+1</option>
                         <option value="0+1+1">0+1+1</option>
                         <option value="1+0+0">1+0+0</option>
                         <option value="0+1+0">0+1+0</option>
                         <option value="0+0+1">0+0+1</option>
                         <option value="0.5+0.5+0.5">0.5+0.5+0.5</option>
                         <option value="0.5+0+0">0.5+0+0</option>
                         <option value="0.5+0.5+0">0.5+0.5+0</option>
                         <option value="0.5+0.5+0">0.5+0.5+0</option>
                         <option value="0+0.5+0">0+0.5+0</option>
														
					</select>
				</div> -->
				<div class="col">
					<div class="form-group">
						<label>Morning</label>
						<input type="text" class="form-control" name="crnt_insln_bf" id="crnt_insln_bf"  value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Lunch</label>
						<input type="text" class="form-control" name="crnt_insln_lunch" id="crnt_insln_lunch" placeholder="lunch" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Dinner</label>
						<input type="text" class="form-control" name="crnt_insln_dinner" id="crnt_insln_dinner" placeholder="Din" value="0">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Bed Time</label>
						<input type="text" class="form-control" name="crnt_insln_bt" id="crnt_insln_bt" placeholder="Bed" value="0">
					</div>
				</div>

				<span class="col-auto">
					
					<label><br/></label>
					<br/>
					<label></label>
					<button class="btn btn-primary" type="button"><i class="fa fa-plus-square"></i></button>
				</span>
			</div>
		</div>
	</div> <!-- End CURRENT TREATMENT -->
</div>

<div class="row">
	<div class="col-lg-12">
	<input type="submit" class="btn btn-primary float-right" value="Submit" id="" name="">															
	</div>
</div>