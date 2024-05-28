<div class="col-4">
	<div class="form-group">
		<input type="text" name="ogld1[]" id="ogldname<?= $count.$visit?>" data-visit="1"  placeholder="OGLD" autocomplete="off" class="form-control" />
	</div>
</div>
<div class="col-8">
	<input type="text" class="form-control" data-visit="1" name="crnt_og_bf1[]" id="crnt_og_bf1" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
	<input type="text" class="form-control" data-visit="1" name="crnt_og_lunch1[]" id="crnt_og_lunch1" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="1" data-type="basal" name="crnt_og_dinner1[]" id="crnt_og_dinner1" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
	<input type="text" class="form-control" data-visit="1" data-type="basal" name="crnt_og_bt1[]" id="crnt_og_bt1" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">

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