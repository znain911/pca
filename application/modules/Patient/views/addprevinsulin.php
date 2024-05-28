      <div class="col-4">
          <div class="form-group">
           
            <input type="text" name="prev_basal3[]" id="prev_basal<?= $count.$visit?>" placeholder="Insulin"  class="form-control" />
          </div>
        </div>
    
                

         <div class="col-8">
              
               <input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basaldm3[]" id="prev_basaldm3[]" placeholder="morn" style="float: left;width: 20%; margin-right:3px; ">
                <input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basaldn3[]" id="prev_basaldn3[]" placeholder="lun" style="float: left;width: 20%; margin-right:3px; ">
                <input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basaldt3[]" id="prev_basaldt3[]" placeholder="din" style="float: left;width: 20%; margin-right:3px; ">
                <input type="text" class="form-control" data-visit="3" data-type="basal" name="prev_basalbed3[]" id="prev_basalbed3" placeholder="bed" style="float: left;width: 20%; margin-right:3px; ">  
             
<script type="text/javascript">
  $(function(){
      var url='<?= site_url()?>';
     $('#prev_basal<?= $count.$visit?>').autoCompleteDestination({
                        source: function (term, response) {
                            $.getJSON(url+'/patient/getInsulinNew', {q: term}, function (data) {
                                response(data);
                            });
                        },
                        minChars: 1

           });
  });
</script>     