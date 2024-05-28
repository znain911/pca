<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=studentlist.xls");
?>

					<table>
						<tr>
							<th>SL</th>
                                                        <th>Code</th>
                                                        <th>Student ID</th>
                                                        <th>Student Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>RTC Number</th>
                                                        <th>Batch</th>
                                                        <th>Registration Date</th>
						</tr>
						<?php $i=1; foreach ($latest_st as $lst) {?>
                                                    
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $lst->st_code; ?></td>
                                                        <td><?php echo $lst->student_id; ?></td>
                                                        <td><?php echo $lst->st_name; ?></td>
                                                        <td><?php echo $lst->st_email; ?></td>
                                                        <td><?php echo $lst->phone; ?></td>
                                                        <td><?php echo $lst->rtc_number; ?></td>
                                                        <td><?php echo $lst->batch; ?></td>
                                                        <td><?php echo date("d-M-Y",strtotime($lst->register_date)); ?></td>
                                                        
                                                    </tr>
                                                    <?php $i++; } ?>
					</table>