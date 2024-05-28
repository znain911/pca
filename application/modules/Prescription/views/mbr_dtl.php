<div class="col-sm-6"><h5>Name: <?php echo $mbr_data->member_name;?><input type="hidden" id="member_name" name="member_name"  value="<?php echo $mbr_data->member_name;?>"></h5></div>
<div class="col-sm-6"><h5>Mobile: <?php echo $mbr_data->contact_no;?><input type="hidden" id="contact_no" name="contact_no"  value="<?php echo $mbr_data->contact_no;?>"></h5></div>
<div class="col-sm-4"><h5>Age: <?php echo $mbr_data->age;?><input type="hidden" id="age" name="age"  value="<?php echo $mbr_data->age;?>"></h5></div>
<div class="col-sm-4"><h5>Gender: <?php echo $mbr_data->gender;?> <input type="hidden" id="gender" name="gender"  value="<?php echo $mbr_data->gender;?>"></h5></div>
<div class="col-sm-4"><h5>Av. Balance: <?php echo $mbr_data->coverage_amount - $mbr_billamount->total;?></h5></div>