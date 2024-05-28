<div class="col-4">
	<div class="form-group">
		<input type="text" name="ogld2[]" id="ogldname<?= $count.$visit?>" data-visit="2"  placeholder="OGLD" autocomplete="off" class="form-control" />
	</div>
</div>
<div class="col-8">
	<input type="text" class="form-control" data-visit="2" name="crnt_og_bf2[]" id="crnt_og_bf2" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
	<input type="text" class="form-control" data-visit="2" name="crnt_og_lunch2[]" id="crnt_og_lunch2" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="2" data-type="basal" name="crnt_og_dinner2[]" id="crnt_og_dinner2" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="2" data-type="basal" name="crnt_og_bt2[]" id="crnt_og_bt2" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">

<script type="text/javascript">
	$(function(){
		  var url='<?= site_url()?>';
		 $('#ogldname<?= $count.$visit?>').autoCompleteDestination({
                        source: function (term, response) {
                            $.getJSON(url+'/patient/getOgld', {q: term}, function (data) {
                                response(data);
                            });
                        },
                        minChars: 1

           });
	});
</script>