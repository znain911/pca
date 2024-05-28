<?php
if(!empty($linklist)){
	$total = 0;
	foreach($linklist as $link){ 

$addr=explode(", ",$link->Url_History);
$total = count($addr);

?>


<table id="datalist" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                        <thead>
                          <tr>
                            <th width="50px"><?php echo $this->lang->line('SL'); ?></th>                           
                            <th><?php echo $this->lang->line('visitedpage'); ?></th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
							for($x = 0; $x <= $total; $x++){
							if(!empty($addr[$x])){	
						 ?>
                        <tr>
                        <td><?php echo $x; ?></td>
                        <td><a href="<?php echo$addr[$x];?>" target="_blank"><?php echo$addr[$x];?></a></td>
                        </tr>
                        <?php 
							}
							}
						?>
                        </tbody>
                      </table>

<?php	

}
}
?>





























