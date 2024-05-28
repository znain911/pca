 <div class="col-4">
          <div class="form-group">
           
            <input type="text" name="basal1[]" id="basal<?= $count.$visit?>" data-visit="1"  placeholder="Insulin" autocomplete="off" class="form-control" />
          </div>
        </div>
        <div class="col-8">
          
            <input type="text" class="form-control" data-visit="1" data-type="basal" name="basaldm1[]" id="basaldm1" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
		    <input type="text" class="form-control" data-visit="1" data-type="basal" name="basaldn1[]" id="basaldn1" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
			<input type="text" class="form-control" data-visit="1" data-type="basal" name="basaldt1[]" id="basaldt1" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
			<input type="text" class="form-control" data-visit="1" data-type="basal" name="basalbed1[]" id="basalbed1" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
        

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