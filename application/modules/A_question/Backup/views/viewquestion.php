<div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php $attributes = array('id' => 'form_post', 'name'=>'form_post', 'class' => 'custom-validation', 'style'=>'position:relative;', 'enctype'=>'multipart/form-data');echo form_open('javascript:void(0)',$attributes);?>
                                            <div class="errormessage"></div>
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Question</label>
                                                        <div>
                                                            <textarea required class="form-control" rows="5" name="question" id="question"><?php echo $qsn_data->title; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>TMA</label>
                                                        <div>
                                                            <select class="form-control" name="tma" id="tma" required>
                                                                <option value="">Select</option>
                                                                <?php foreach ($tmalist as $tmal) {?>
                                                                    <option value="<?php echo $tmal->tma_id;?>" <?php if($qsn_data->tma == $tmal->tma_id){ echo 'selected'; } ?>><?php echo $tmal->tma_name;?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <div>
                                                        <select class="form-control" name="publish" id="publish" required>
                                                                <option value="1" <?php if($qsn_data->status == 1){ echo 'selected'; } ?>>Active</option>
                                                                <option value="0" <?php if($qsn_data->status == 0){ echo 'selected'; } ?>>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="border-left:1px solid #ced4da;">
<?php $i=0; foreach ($qsn_ans as $qa) {?>
	
                                                    <div class="form-group">
                                                        <label>Answer <?php echo $i+1;?></label>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <input type="text" name="anstext[]" class="form-control" required placeholder="Answer 1" value="<?php echo $qa->qa_title; ?>" />
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="custom-control custom-checkbox mt-1">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck<?php echo $i+1;?>" name="ans<?php echo $i;?>" value="1" <?php if ($qa->qa_ans == 1){ echo 'checked'; } ?>>
                                                                <label class="custom-control-label" for="customCheck<?php echo $i+1;?>">True</label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
<?php $i++; } ?>
                                                    
                                                </div>
                                            </div>
                                            


                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                        </div>

                        <?php $this->forminput->formpost('form_post',"loadingdiv",base_url('user/images/loading2.gif'),"submitbtn1","form_acction", 'a_question/question_edit/'.$qid ,'Update Successfully'  ); ?>
			        <script type="text/javascript">
			        function form_acction(msg){ 
			            if(msg=='Update Successfully'){                                  
			                var jmpurl='<?php echo base_url('a_question');?>';
			                window.location=jmpurl; 
			                $("#form_post")[0].reset();
			            }
			        }           
			        </script>