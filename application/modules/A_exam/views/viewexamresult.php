<div class="row">
    <div class="col-xl-12">
       <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Total Question</th>
                                                                    <th>Total Marks</th>
                                                                    <th>Pass Marks</th>
                                                                    <th>Questions Attempted</th>
                                                                    <th>Correct Answer</th>
                                                                    <th>Wrong Answer</th>
                                                                    <th>Marks Obtained</th>
                                                                    <th>Attempt</th>
                                                                    <th>Status</th>                                
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $examinfo->no_of_question;?></td>
                                                                    <td><?php echo $examinfo->total_mark;?></td>
                                                                    <td><?php echo $examinfo->pass_mark;?></td>
                                                                    
                                                                    
                                                                    <td><?php echo $examinfo->question_ans;?></td>
                                                                    <td><?php echo $examinfo->correct_ans;?></td>
                                                                    <td><?php echo $examinfo->wrong_ans;?></td>
                                                                    <td><?php echo $examinfo->geting_marks;?></td>

                                                                    <td>
                                                                        <?php echo $this->querylib->attemp_no($examinfo->student_id,$examinfo->exam_id,$examinfo->id);
                                                                        ?>

                                                                    </td>
                                                                    <td>

                                                                      
                                                                      <?php 
                                                                      echo $examinfo->result;
                                                                      ?>
                                                                      
                                                                    </td>
                                                                </tr>
                                                              
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>                         
        
            </div>
       </div>
    </div> <!-- end col -->
        
</div>

                        