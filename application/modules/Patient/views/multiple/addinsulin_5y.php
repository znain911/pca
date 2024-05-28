
                <input type="text" name="basal3[]" id="basal<?= $count.$visit?>" data-visit="3"  placeholder="Insulin" />
              </div>
              <div class="insulinright">
                <input type="text" class="dosagess" data-visit="3" data-type="basal" name="basaldm3[]" id="basaldm3" placeholder="morn" >
                <input type="text" class="dosagess" data-visit="3" data-type="basal" name="basaldn3[]" id="basaldn3" placeholder="lun">
                <input type="text" class="dosagess" data-visit="3" data-type="basal" name="basaldt3[]" id="basaldt3" placeholder="din">
                <input type="text" class="dosagess" data-visit="3" data-type="basal" name="basalbed3[]" id="basalbed3" placeholder="bed">   

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
             