

        <div class="col-4">
          <div class="form-group">
           
            <input type="text" name="basal3[]" id="basal<?= $count.$visit?>" data-visit="3"  placeholder="Insulin" autocomplete="off" class="form-control" />
          </div>
        </div>
        <div class="col-8">
          
                <input type="text" class="form-control" data-visit="3" data-type="basal" name="basaldm3[]" id="basaldm3" placeholder="morn" style="float: left;width: 20%; margin-right:3px; " >
                <input type="text" class="form-control" data-visit="3" data-type="basal" name="basaldn3[]" id="basaldn3" placeholder="lun" style="float: left;width: 20%; margin-right:3px;">
                <input type="text" class="form-control" data-visit="3" data-type="basal" name="basaldt3[]" id="basaldt3" placeholder="din" style="float: left;width: 20%; margin-right:3px;">
                <input type="text" class="form-control" data-visit="3" data-type="basal" name="basalbed3[]" id="basalbed3" placeholder="bed" style="float: left;width: 20%; margin-right:3px;">
        

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
             