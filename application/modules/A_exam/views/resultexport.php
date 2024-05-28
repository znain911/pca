<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=result.xls");
?>

					<table border="1">
						<tr>
                                                        <th>SL</th>
                                                        <th>Student ID</th>
                                                        <th>Student Name</th>
                                                        <th>Mobile</th>
                                                        <th>RTC Number</th>
                                                        <th>Batch</th>
                                                        <th>Reg. Date & Time</th>
                                                        <th>Schedule Name</th>
                                                        <th>Exam Attend Date</th>
                                                        <th>Total Marks</th>
                                                        <th>Pass Marks</th>
                                                        <th>Geting Marks</th>
                                                        <th>Total Quetions</th>
														<th>Total Stamp</th>
                                                        <th>Attend to Answer</th>
                                                        <th>Correct Answer</th>
                                                        <th>Wrong Answer</th>
                                                        <th>Attempt</th>
                                                        <th>Status</th>
														<th>Camera</th>
                                                    </tr>
						<?php $i=1; foreach ($qsn_list as $lst) {?>
                                    <?php $rightans = (int)$lst->total_marks / (int)1;
                                    $wrongans = (float)$lst->negative_marks / (float)0.5;?>                
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $lst->student_id; ?></td>
                                                        <td><?php echo $lst->st_name; ?></td>
                                                        <td><?php echo $lst->phone; ?></td>
                                                        <td><?php echo $lst->rtc_number; ?></td>
                                                        <td><?php echo $lst->batch; ?></td>
                                                        <td><?php echo date("d-M-Y g:i A",strtotime($lst->register_date)); ?></td>
                                                        <td><?php echo $lst->schedule_name; ?></td>
                                                        <td>
														<?php
                                                            $current = new DateTime($lst->exam_attend_date);
                                                            //The number of hours to add.
                                                            $hoursToAdd = 6;
                                                            //Add the hours b
                                                            $current->add(new DateInterval("PT{$hoursToAdd}H"));
                                                            $newTime = $current->format('d-M-Y g:i A');
                                                            echo $newTime;
                                                             ?>
														</td>
                                                        <td><?php echo $lst->total_mark; ?></td>
                                                        <td><?php echo $lst->pass_mark; ?></td>
                                                        <?php //$correctans = $this->a_exam_m->getExamGivenCorrectAns($lst->id);?>
                                                        <td><?php echo $lst->geting_marks; ?></td>
														<td><?php echo $lst->no_of_question; ?></td>
														<td><?php echo (int)$lst->no_of_question * (int)4; ?></td>
														<?php //$attendans = $this->a_exam_m->getExamGivenAns($lst->id);?>
														<td><?php echo /*$lst->question_ans*/$rightans + $wrongans; ?></td>
                                                        <td><?php echo /*$lst->correct_ans*/$rightans; ?></td>
                                                        <td><?php echo /*$lst->wrong_ans*/$wrongans; ?></td>
                                                        <td><?php echo $this->querylib->attemp_no($lst->st_id,$lst->exam_id,$lst->id);
                                                                        ?></td>
                                                        <td>
                                                             <?php 
                                                                echo $lst->result;
                                                            ?>
                                                     </td>
													<td>
                                                        <?php $cam = $this->a_exam_m->exam_camera($lst->st_id,$lst->exam_id);
                                                            if(!empty($cam)){
                                                            if ($cam->camera_status == 1) {
                                                                echo 'On';
                                                            }else{
                                                                echo 'Off';
                                                            } }else{
                                                                echo 'N/A';
                                                            }
                                                        ?> 
                                                     </td>
                                                    </tr>
                                                    <?php $i++; } ?>
					</table>