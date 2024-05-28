<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=result-all.xls");
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
                                                        <th>Marks Obtained</th>
                                                        <th>Total Quetions</th>
                                                        <th>Attend to Answer</th>
                                                        <th>Correct Answer</th>
                                                        <th>Wrong Answer</th>
                                                        
                                                        <th>Attempt</th>
                                                        <th>Status</th>
                                                    </tr>
						<?php $i=1; foreach ($qsn_list as $lst) {?>
                                                    
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $lst->student_id; ?></td>
                                                        <td><?php echo $lst->st_name; ?></td>
                                                        <td><?php echo $lst->phone; ?></td>
                                                        <td><?php echo $lst->rtc_number; ?></td>
                                                        <td><?php echo $lst->batch; ?></td>
                                                        <td><?php echo date("d-M-Y g:i A",strtotime($lst->register_date)); ?></td>
                                                        <td><?php echo $lst->schedule_name; ?></td>
                                                        <td><?php echo date("d-M-Y g:i A",strtotime($lst->exam_attend_date)); ?></td>
                                                        <td><?php echo $lst->total_mark; ?></td>
                                                        <td><?php echo $lst->pass_mark; ?></td>
                                                        <?php //$correctans = $this->a_exam_m->getExamGivenCorrectAns($lst->id);?>
                                                        <td><?php echo $lst->geting_marks; ?></td>
														<td><?php echo $lst->no_of_question; ?></td>
														<?php //$attendans = $this->a_exam_m->getExamGivenAns($lst->id);?>
														<td><?php echo $lst->question_ans; ?></td>
														<td><?php echo $lst->correct_ans; ?></td>
														<td><?php echo $lst->wrong_ans; ?></td>
														<td><?php echo $this->querylib->attemp_no($lst->st_id,$lst->exam_id,$lst->id);
                                                                        ?></td>
                                                        <td>
                                                             <?php 
                                                               echo $lst->result;
                                                            ?>                                                                      
                                                     </td>

                                                    </tr>
                                                    <?php $i++; } ?>
					</table>