<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=ece_result.xls");
?>
<table border="1">
	<thead>
	<tr>
       <th>SL</th>
       <th>ID</th>
       <th>Name</th>
       <th>Batch</th>
       <th>RTC</th>
       <th>SCHEDULE_DATE</th>
       <th>Theory Attend Date</th>
       <th>Theory Marks</th>
       <th>Theory Pass Marks</th>
       <th>Theory marks Obtained by right answer</th>
       <th>Theory mark Deducted from Wrong answer</th>
       <th>Theory Net Marks</th>
       <th>Theory Status</th>
       <th>OSCE Attend Date</th>
       <th>OSCE Marks</th>
       <th>OSCE marks Obtained by right answer</th>
       <th>OSCE marks Deducted from Wrong answer</th>
       <th>OSCE Net Marks</th>
       <th>OSPE Attend Date</th>
       <th>OSPE Marks</th>
       <th>OSPE marks Obtained by right answer</th>
       <th>OSPE marks Deducted from Wrong answer</th>
       <th>OSPE Net Marks</th>
       <th>OSCE & OSPE Pass Marks</th>
       <th>OSCE & OSPE Net Marks</th>
       <th>OSCE & OSPE Result</th>
       <th>Result Status</th>
    </tr>
    </thead>
	<tbody>

    <?php $i=1; foreach ($qsn_list as $lst) {?>   
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $lst->student_id; ?></td>
        <td><?php echo $lst->st_name; ?></td>
        <td><?php echo $lst->batch; ?></td>
        <td><?php echo $lst->rtc_number; ?></td>
        <td><?php echo date("d-m-Y",strtotime($lst->start_date)); ?></td>
<?php 
$theoryrslt = $this->a_exam_m->getEceTheoryReport($lst->st_id);
$oscerslt = $this->a_exam_m->getEceOsceReport($lst->st_id);
$osperslt = $this->a_exam_m->getEceOspeReport($lst->st_id);
?>
                                                     
        <td><?php echo date("d-M-Y g:i A",strtotime($theoryrslt->exam_attend_date)); ?></td>
        <td><?php echo $theoryrslt->total_mark_theory; ?></td>
        <td><?php echo $theoryrslt->pass_mark_theory; ?></td>
        <td><?php echo $theoryrslt->total_marks; ?></td>
        <td><?php echo $theoryrslt->negative_marks; ?></td>
        <td><?php echo $theoryrslt->geting_marks; ?></td>
        <td><?php echo $theoryrslt->result; ?></td>   

        <td><?php echo date("d-M-Y g:i A",strtotime($oscerslt->exam_attend_date)); ?></td>
        <td><?php echo $oscerslt->total_mark_osce; ?></td>
        <td><?php echo $oscerslt->total_marks; ?></td>
        <td><?php echo $oscerslt->negative_marks; ?></td>
        <td><?php echo $oscerslt->geting_marks; ?></td>

        <td><?php echo date("d-M-Y g:i A",strtotime($osperslt->exam_attend_date)); ?></td>
        <td><?php echo $osperslt->total_mark_ospe; ?></td>
        <td><?php echo $osperslt->total_marks; ?></td>
        <td><?php echo $osperslt->negative_marks; ?></td>
        <td><?php echo $osperslt->geting_marks; ?></td>
        <td><?php echo $osperslt->pass_mark_osce_ospe; ?></td>
        <td>
        	<?php $osce_ospemark = $oscerslt->geting_marks + $osperslt->geting_marks; 
        	echo $osce_ospemark;
        	?>
        	
        </td>

        <td>
          <?php
            if($osce_ospemark < $osperslt->pass_mark_osce_ospe){
            	$cp = 'Fail';
                echo '<div class="text-danger">Fail</div>';
            }else{
                echo '<div class="text-success">Passed</div>';
                $cp = 'Passed';
            }
          ?>
        </td>

        <td>
          <?php
            if($cp == 'Passed' && $theoryrslt->result == 'Passed'){                
                echo '<div class="text-success">Passed</div>';
            }else{
                echo '<div class="text-danger">Fail</div>';
            }
          ?>
        </td>

        
        </tr>
        <?php $i++; } ?>
                                                    
    </tbody>
</table>