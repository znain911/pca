

        <div class="col-4">
          <div class="form-group">
           
            <input type="text" name="basal4[]" id="basal<?= $count.$visit?>" data-visit="4"  placeholder="Insulin" autocomplete="off" class="form-control" />
          </div>
        </div>
        <div class="col-8">
          
                <input type="text" class="form-control" data-visit="4" data-type="basal" name="basaldm4[]" id="basaldm4" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
                <input type="text" class="form-control" data-visit="4" data-type="basal" name="basaldn4[]" id="basaldn4" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
                <input type="text" class="form-control" data-visit="4" data-type="basal" name="basaldt4[]" id="basaldt4" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
                <input type="text" class="form-control" data-visit="4" data-type="basal" name="basalbed4[]" id="basalbed4" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
        

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
             