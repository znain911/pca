 <div class="col-4">
          <div class="form-group">
           
            <input type="text" name="basal2[]" id="basal<?= $count.$visit?>" data-visit="2"  placeholder="Insulin" autocomplete="off" class="form-control" />
          </div>
        </div>
        <div class="col-8">
          
            <input type="text" class="form-control" data-visit="2" data-type="basal" name="basaldm2[]" id="basaldm2" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
		    <input type="text" class="form-control" data-visit="2" data-type="basal" name="basaldn2[]" id="basaldn2" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
			<input type="text" class="form-control" data-visit="2" data-type="basal" name="basaldt2[]" id="basaldt2" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
			<input type="text" class="form-control" data-visit="2" data-type="basal" name="basalbed2[]" id="basalbed2" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
        

<script type="text/javascript">
  $(function(){
      var url='<?= site_url()?>';
     $('#basal<?= $count.$visit?>').autoCompleteDestination({
                        source: function (term, response) {
                            $.getJSON(url+'/patient/getInsulinNew', {q: term}, function (data) {
                                response(data);
                            });
                        },
                        minChars: 1

           });
  });
</script>