
<div class="col-4">
	<div class="form-group">
		<input type="text" name="prev_ogld4[]" id="prev_ogldname1<?= $count.$visit?>" data-visit="4"  placeholder="OGLD" autocomplete="off" class="form-control" />
	</div>
</div>
<div class="col-8">
	<input type="text" class="form-control" data-visit="4" name="pre_og_bf4[]" id="pre_og_bf4" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
	<input type="text" class="form-control" data-visit="3" name="pre_og_lunch4[]" id="pre_og_lunch4" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="3" name="pre_og_dinner4[]" id="pre_og_dinner4" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="3" name="pre_og_bt4[]" id="pre_og_bt4" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">

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