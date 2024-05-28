<div class="ogld_input_wrapper">
	<div class="left">
		<label for="name"><?= $count?>: </label>
		<input type="text"  name="ogld[]" id="ogldname<?= $count.$visit?>">
	</div>
	<div class="right">
		<input type="text" name="ogldiddosage[]" id="ogldiddosage<?= $count.$visit?>">
	</div>
</div>
<script type="text/javascript">
	$(function(){
		  var url='<?= site_url()?>';
		 $('#ogldname<?= $count.$visit?>').autoCompleteDestination({
                        source: function (term, response) {
                            $.getJSON(url+'/patient/getOgld', {q: term}, function (data) {
                                response(data);
                            });
                        },
                        minChars: 3

           });
	});
</script>