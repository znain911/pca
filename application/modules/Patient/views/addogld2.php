<div class="col-4">
	<div class="form-group">
		<input type="text" name="ogld4[]" id="ogldname<?= $count.$visit?>" data-visit="4"  placeholder="OGLD" autocomplete="off" class="form-control" />
	</div>
</div>
<div class="col-8">
	<input type="text" class="form-control" data-visit="4" name="crnt_og_bf4[]" id="crnt_og_bf4" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
	<input type="text" class="form-control" data-visit="4" name="crnt_og_lunch4[]" id="crnt_og_lunch4" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="4" name="crnt_og_dinner4[]" id="crnt_og_dinner4" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="4" name="crnt_og_bt4[]" id="crnt_og_bt4" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">

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