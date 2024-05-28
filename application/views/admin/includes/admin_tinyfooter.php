<!--BEGIN FOOTER-->
<footer role="contentinfo">
  <div class="clearfix">
    <ul class="list-unstyled list-inline pull-left">
      <li>
        <h6 style="margin: 0;"> &copy; <?php echo date('Y');?> <a href="https://www.cthealth-bd.com/" target="_blank" title=""><img src="<?php echo base_url();?>admin_dir/img/footerlogo.png" alt="logo" /></a></h6>
      </li>
    </ul>
    <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
  </div>
</footer>
<!--END FOOTER-->

<script>    	
	window.setTimeoutOrig = window.setTimeout;
	window.setTimeout     = function(f,del) 
	{ 
		var l_stack = Error().stack.toString();
		if (l_stack.indexOf('kis.scr.kaspersky-labs.com') > 0){ return 0; }	
		window.setTimeoutOrig(f,del); 
	}
</script>
<!-- Modal -->
    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-sky" style="padding-top:5px !important; padding-bottom:5px !important;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff;margin-top:9px;"><i class="fa fa-close"></i></button>
                <h4 class="modal-title" style="color:#ffffff; font-weight:bold;"><strong>Modal title</strong></h4>
                <!--<h4 style="color:#ffffff;">Modal title</h4>-->
            </div>
            <div class="modal-body">
                <!--<h2>Text in a modal</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>-->
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
            <!--<div class="panel-footer">Panel Footer</div>-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
    <!-- Modal -->
