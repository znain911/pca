<!-- <div class="ogld_input_wrapper">
	<div class="left">
		<label for="name"><?= $count?>: </label>
		<input type="text"  name="prev_ogld[]" id="prev_ogldname1<?= $count.$visit?>">
	</div>
	<div class="right">
		<input type="text" name="prev_ogldiddosage[]" id="prev_ogldiddosage1<?= $count.$visit?>">
	</div>
</div> -->
<div class="col-4">
	<div class="form-group">
		<input type="text" name="prev_ogld[]" id="prev_ogldname1<?= $count.$visit?>" data-visit="3"  placeholder="OGLD" autocomplete="off" class="form-control" />
	</div>
</div>
<div class="col-8">
	<input type="text" class="form-control" data-visit="3" name="pre_og_bf[]" id="pre_og_bf" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
	<input type="text" class="form-control" data-visit="3" name="pre_og_lunch[]" id="pre_og_lunch" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="3" name="pre_og_dinner[]" id="pre_og_dinner" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="3" name="pre_og_bt[]" id="pre_og_bt" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">

<script type="text/javascript">
	$(function(){
		  var url='<?= site_url()?>';
		 $('#prev_ogldname1<?= $count.$visit?>').autoCompleteDestination({
                        source: function (term, response) {
                            $.getJSON(url+'/patient/getOgld', {q: term}, function (data) {
                                response(data);
                            });
                        },
                        minChars: 1

           });
	});
</script>