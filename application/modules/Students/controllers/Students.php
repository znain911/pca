<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		
		$this->load->model('students_m');
		$this->load->library('forminput');	
		$this->load->library('form_validation');
		$this->load->library('form_engine');
		$this->load->library('Querylib');
		$this->load->library('datatables');
		/*$this->load->library('encrypt');*/
		$this->load->library('email');
		
	}
	
	
	
	function index(){
		if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			$cdate = date("Y-m-d");
			$data["exam_list"] = $this->students_m->get_exam_schedule($cdate);
			$data["std_info"] = $this->students_m->get_studentinfo($session_data['id']);
			$this->load->view('dashboard',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
		
	}

	function examschedule(){
		if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			$cdate = date("Y-m-d h:i:s");
			$data["exam_list"] = $this->students_m->get_exam_schedule($cdate);
			$this->load->view('exam_schedule',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
		
	}
	
	function examnotice($id){
		if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["eid"] = $id;
			$cdate = date("Y-m-d");
			$data["exam_list"] = $this->students_m->get_exam_schedule($cdate);
			$data["examinfo"] = $this->students_m->getExamDtl($id);
			$tmaid = $data["examinfo"]->tma;
			$noqsn = $data["examinfo"]->no_of_question;
			$data["examquestion"] = $this->students_m->getExamQuestions($tmaid,$noqsn);

			$data["eceexamstatus"] = $this->students_m->getExamInfoEce($session_data['id'],$id);


			$passedst = $this->students_m->getPassedExam($session_data['id'],$id);
			if (empty($passedst)) {
				$this->load->view('exam_notice',$data);
			}elseif($tmaid == 3){
				$this->load->view('exam_notice',$data);
			}else{
				redirect('students');
			}
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
		
	}
	
	public function savedata_cam()
	   {
	      
		$data = array(
		'student_id' => $this->input->post('stid'),
		'schedule_id'=>$this->input->post('sdlid'),
		'camera_status'=>$this->input->post('camevalue')
			);

		$result = $this->students_m->insert_camerainfo($data);
	    }

	function cameraoption($id){
		if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["eid"] = $id;
			$cdate = date("Y-m-d");
			$data["exam_list"] = $this->students_m->get_exam_schedule($cdate);
			$data["examinfo"] = $this->students_m->getExamDtl($id);
			$tmaid = $data["examinfo"]->tma;
			$noqsn = $data["examinfo"]->no_of_question;
			$data["examquestion"] = $this->students_m->getExamQuestions($tmaid,$noqsn);

			$data["eceexamstatus"] = $this->students_m->getExamInfoEce($session_data['id'],$id);


			$passedst = $this->students_m->getPassedExam($session_data['id'],$id);
			if (empty($passedst)) {
				$this->load->view('exam_camera',$data);
			}elseif($tmaid == 3){
				$this->load->view('exam_camera',$data);
			}else{
				redirect('students');
			}
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
		
	}

	function makeexam($id){
		if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["eid"] = $id;
			$cdate = date("Y-m-d");
			$data["exam_list"] = $this->students_m->get_exam_schedule($cdate);
			$data["examinfo"] = $this->students_m->getExamDtl($id);
			$tmaid = $data["examinfo"]->tma;
			$noqsn = $data["examinfo"]->no_of_question;
			$data["examquestion"] = $this->students_m->getExamQuestions($tmaid,$noqsn);
			
			
			$passedst = $this->students_m->getPassedExam($session_data['id'],$id);
			if (empty($passedst)) {
				$this->load->view('make_exam',$data);
			}else{
				redirect('students', 'refresh');
			}
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
		
	}

	public function examSubmit()
    {
    	$session_data = $this->session->userdata('sht_stdnt');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('exam_id', 'Exam', 'trim|required');

        if ($this->form_validation->run() == false) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        }
        else {

            $contactData = array(
                'exam_id' => $this->input->post('exam_id'),
                'student_id' => $session_data['id'],
            );

            $id = $this->students_m->insert_exam($contactData);

            $number1 = count($_POST["qsnid"]);
		        if($number1 > 0){
		        	
		        	for($i=0; $i<$number1; $i++){
		        		if(!empty($_POST['qsnid'][$i])){
                           
		        			/*$anscount = count(isset($_POST['qans'.$i]));
		        			$anscount = count(is_array(isset($_POST['qans'.$i])));*/
		        			if (!empty($_POST['qans'.$i])) {
						    	
						   $anscount = count($_POST['qans'.$i]);

		        			for($j=0; $j<$anscount; $j++){

		        				if(!empty($_POST['qans'.$i][$j])){
		        				$ansid = $_POST['qans'.$i][$j];
		        				/*if(empty($this->input->post('qans_sts'.$ansid)) || $this->input->post('qans_sts'.$ansid) != 0){
			        				$qavalue = 5;
			        			}else{
			        				$qavalue = $this->input->post('qans_sts'.$ansid);
			        			}*/
			        			$qavalue = $this->input->post('qans_sts'.$ansid);
			        			$ansdata = array(								
									'exam_schedule_id'=>$this->input->post('exam_id'),
									'exam_id' => $id,
									'student_id' => $session_data['id'],
									'question_id'=>$_POST['qsnid'][$i],
									'ans_id'=>$_POST['qans'.$i][$j],
									'ans_mark'=>$_POST['mark'.$i][$j],
									'ans_status'=>$qavalue,
									/*'ans_id'=>$this->input->post('qans'.$i),*/
								);
								$this->students_m->ans_sheet_insert($ansdata);
								}
							}
		        			}
		        		}
		        	}
		        }

		    /*$examanswer = $this->students_m->getExamGivenAns($id);*/
			$correctans = $this->students_m->getExamGivenCorrectAnsTf($id);
			$attendans = $this->students_m->getExamAttendAns($id);
			$wrongans = $this->students_m->getExamGivenWrongAnsTf($id);
			$correctmark = $this->students_m->getExamGivenCorrectAnsMarksTf($id);

			$getmark = count($correctans)*$this->input->post('marks_per_question');
			$negativemark = count($wrongans)*$this->input->post('negative_mark');

			$gotmarks = $correctmark->getmarks - $negativemark;

			if($gotmarks < $this->input->post('pass_mark')){
                  $result = 'Fail';
              }else{
                $result = 'Passed';
            }

			/*$updateData = array(
                'question_ans' => count($attendans),
                'correct_ans' => count($correctans),
                'geting_marks' => $getmark,
                'result' => $result,
            );*/
            $updateData = array(
                'question_ans' => count($attendans),
                'correct_ans' => count($correctans),
                'wrong_ans' => count($wrongans),
                'total_marks' => $correctmark->getmarks,
                'geting_marks' => $correctmark->getmarks - $negativemark,
                'negative_marks' => $negativemark,
                'result' => $result,
            );
			$this->students_m->update_exam($id,$updateData);


            $response = array(
                'status' => 'success',
                'message' => "<h3>Answers have been submitted.</h3>",
                'exmid' => $id
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }



function saveExamRecordedVideo() {
    $st_id = $_SESSION['sht_stdnt']['id'];

    $this->load->model('Students_m');

    $studentId = $this->Students_m->getStudentIdByStId($st_id);

    //$destinationFolder = dirname(__FILE__) . '/video_chunks/';
    $destinationFolder = FCPATH . 'assets/videos';

    /* needed for saving file */
    $currentTime = new DateTime();
    $timestamp = $currentTime->format('Y-m-d_H-i-s');


    /* create dedicated directory for this user */
    $studentFolder = $destinationFolder . '/' . $studentId;
    if (!is_dir($studentFolder)) {
        // Create the directory with permission 0777
        mkdir($studentFolder, 0777, true);
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['video'])) {
        $videoData = $_FILES['video'];

        if ($videoData['error'] === UPLOAD_ERR_OK) {
            $tmpName = $videoData['tmp_name'];
            $chunkNumber = isset($_POST['chunkNumber']) ? (int)$_POST['chunkNumber'] : 1;
            $totalChunks = isset($_POST['totalChunks']) ? (int)$_POST['totalChunks'] : 1;

            $scheduleId = isset($_POST['scheduleId']) ? $_POST['scheduleId'] : 'scheduleId';
            $userLeftWindow = isset($_POST['userLeftWindow']) ? $_POST['userLeftWindow'] : 0;



            // Validate file type (you may need to adjust the allowed types)
            $allowedTypes = ['video/mp4', 'video/webm'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $fileType = finfo_file($finfo, $tmpName);
            finfo_close($finfo);

            if (!in_array($fileType, $allowedTypes)) {
                echo 'Invalid file type. Allowed types: ' . implode(', ', $allowedTypes);
                return;
            }

            $uniqueNum = $studentId . '_' . $scheduleId . '_' . uniqid();

            // Generate a unique filename for each chunk
            $chunkFilename = $destinationFolder . '/chunk_' . $uniqueNum . '.mp4';

            // Move the uploaded chunk to the destination folder
            if (move_uploaded_file($tmpName, $chunkFilename)) {
                //echo 'Chunk uploaded successfully (' . $chunkNumber . '/' . $totalChunks . ')';

                // Check if all chunks are uploaded
                if ($chunkNumber == $totalChunks) {
                    // All chunks are uploaded, now concatenate them into the final video file
                    $videoName = $scheduleId . '_'. $timestamp . '.mp4';
                    $finalFilename = $destinationFolder . '/'. $studentId . '/'. $videoName;
                    $finalFile = fopen($finalFilename, 'ab'); // 'ab' mode for binary append

                    for ($i = 1; $i <= $totalChunks; $i++) {
                        $currentChunkFilename = $destinationFolder . 'chunk_' . $uniqueNum . '.mp4';
                        if (file_exists($currentChunkFilename)) {
                            $currentChunk = file_get_contents($currentChunkFilename);
                            fwrite($finalFile, $currentChunk);
                        } else {
                            //echo 'Chunk file not found: ' . $currentChunkFilename;
                        }
                    }


                    fclose($finalFile);

                    // Clean up: delete the individual chunks
                    for ($i = 1; $i <= $totalChunks; $i++) {
                        unlink($destinationFolder . 'chunk_' . $uniqueNum . '.mp4');
                    }


                    /* now insert video info */
                    $currentTime = new DateTime();
                    try{
                        $data = array(
                            'student_id'    => $studentId,
                            'exam_id'       => $scheduleId,
                            'video_path'    => $videoName,
                            'left_window'   => $userLeftWindow,
                            'meta'          => '',
                            'created_at'    => $currentTime->format('Y-m-d H-i-s')
                        );

                        $insertedId = $this->Students_m->insertExamVideoInfo($data);
                    }catch (Exception $e){
                        echo  $e->getMessage();
                    }


                    //echo 'Video saved successfully in ' . $finalFilename;
                    echo 'success';
                }
            } else {
                echo 'Error moving file.';
            }
        } else {
            echo 'Error uploading file.';
        }
    } else {
        echo 'Invalid request.';
    }
}







function makeexamece($id,$qt){
		if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["eid"] = $id;
			$data["eqt"] = $qt;
			$cdate = date("Y-m-d");
			$data["exam_list"] = $this->students_m->get_exam_schedule($cdate);
			$data["examinfo"] = $this->students_m->getExamDtl($id);
			$tmaid = $data["examinfo"]->tma;
			if($qt == 1) {
				$noqsn = $data["examinfo"]->no_of_question_theory;
			}elseif($qt == 2){
				$noqsn = $data["examinfo"]->no_of_question_osce;
			}elseif($qt == 3){
				$noqsn = $data["examinfo"]->no_of_question_ospe;
			}
			/*$noqsn = $data["examinfo"]->no_of_question;*/
			$data["examquestion"] = $this->students_m->getEceExamQuestions($tmaid,$noqsn,$qt);
			$data["eceexamstatus"] = $this->students_m->getExamInfoEce($session_data['id'],$id);
			
			/*if($data["eceexamstatus"]->qtype == $qt){
				redirect('students/examnotice/'.$id, 'refresh');
			}else*/
			$esls = isset($data["eceexamstatus"]->qtype);
			
			/*if($esls >= $qt){
				redirect('students/examnotice/'.$id, 'refresh');
			}else{*/

				$passedst = $this->students_m->getPassedExamEce($session_data['id'],$id,$qt);
				if (empty($passedst)) {
					if($qt == 2){
						$this->load->view('ece_examosce',$data);
					}elseif($qt == 3){
						$this->load->view('ece_examospe',$data);
					}else{
						$this->load->view('make_eceexam',$data);
					}
					
				}else{
					redirect('students/examnotice/'.$id, 'refresh');
				}
			/*}*/			
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
		
	}

	function makeexampca($id){
		if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["eid"] = $id;
			$data["eqt"] = 2;
			$cdate = date("Y-m-d");
			$data["exam_list"] = $this->students_m->get_exam_schedule($cdate);
			$data["examinfo"] = $this->students_m->getExamDtl($id);
			$data["stinfo"] = $this->students_m->get_studentinfo($session_data['id']);
			$tmaid = $data["examinfo"]->tma;
			$noqsn = $data["examinfo"]->no_of_question_osce;
			/*$noqsn = $data["examinfo"]->no_of_question;*/
			$data["examquestion"] = $this->students_m->querytest($tmaid,$noqsn);
			$data["eceexamstatus"] = $this->students_m->getExamInfoEce($session_data['id'],$id);
			
			$qt = 2;

			$examcount = count($this->students_m->getExamStd($metadata['id'],$id));
			if ($examcount >= 3) {
				$this->load->view('notallow',$data);
			}else{

				$passedst = $this->students_m->getPassedExamEce($session_data['id'],$id,$qt);
				if (empty($passedst)) {
					
					$this->load->view('make_exampca',$data);
					
				}else{
					redirect('students/examnotice/'.$id, 'refresh');
				}
			}
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
		
	}

	public function examSubmitEce()
    {
    	$session_data = $this->session->userdata('sht_stdnt');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('exam_id', 'Exam', 'trim|required');

        if ($this->form_validation->run() == false) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        }
        else {

            $contactData = array(
                'exam_id' => $this->input->post('exam_id'),
                'qtype' => $this->input->post('qtype'),
                'student_id' => $session_data['id'],
            );

            $id = $this->students_m->insert_exam($contactData);

            $number1 = count($_POST["qsnid"]);
		        if($number1 > 0){
		        	
		        	for($i=0; $i<$number1; $i++){
		        		if(!empty($_POST['qsnid'][$i])){
                           
		        			/*$anscount = count(isset($_POST['qans'.$i]));
		        			$anscount = count(is_array(isset($_POST['qans'.$i])));*/
		        			if (!empty($_POST['qans'.$i])) {
						    	
						   $anscount = count($_POST['qans'.$i]);

		        			for($j=0; $j<$anscount; $j++){

		        				if(!empty($_POST['qans'.$i][$j])){
		        				$ansid = $_POST['qans'.$i][$j];
		        				/*if(empty($this->input->post('qans_sts'.$ansid)) || $this->input->post('qans_sts'.$ansid) != 0){
			        				$qavalue = 5;
			        			}else{
			        				$qavalue = $this->input->post('qans_sts'.$ansid);
			        			}*/
			        			$qavalue = $this->input->post('qans_sts'.$ansid);
			        			$ansdata = array(								
									'exam_schedule_id'=>$this->input->post('exam_id'),
									'exam_id' => $id,
									'student_id' => $session_data['id'],
									'question_id'=>$_POST['qsnid'][$i],
									'ans_id'=>$_POST['qans'.$i][$j],
									'ans_mark'=>$_POST['mark'.$i][$j],
									'ans_status'=>$qavalue,
									/*'ans_id'=>$this->input->post('qans'.$i),*/
								);
								$this->students_m->ans_sheet_insert($ansdata);
								}
							}
		        			}
		        		}
		        	}
		        }

		    /*$examanswer = $this->students_m->getExamGivenAns($id);*/
			$correctans = $this->students_m->getExamGivenCorrectAnsTf($id);
			$attendans = $this->students_m->getExamAttendAns($id);
			$totalwrongans = $this->students_m->getExamGivenWrongAnsTf($id);
			$wrongans = $this->students_m->getExamGivenNegetiveMark($id);
			$correctmark = $this->students_m->getExamGivenCorrectAnsMarksTf($id);

			$getmark = count($correctans)*$this->input->post('marks_per_question');
			$negativemark = count($wrongans)*$this->input->post('negative_mark');

			$gotmarks = $correctmark->getmarks - $negativemark;

			if($gotmarks < $this->input->post('pass_mark')){
                  $result = 'Fail';
              }else{
                $result = 'Passed';
            }

			/*$updateData = array(
                'question_ans' => count($attendans),
                'correct_ans' => count($correctans),
                'geting_marks' => $getmark,
                'result' => $result,
            );*/
            $updateData = array(
                'question_ans' => count($attendans),
                'correct_ans' => count($correctans),
                'wrong_ans' => count($totalwrongans),
                'total_marks' => $correctmark->getmarks,
                'geting_marks' => $correctmark->getmarks - $negativemark,
                'negative_marks' => $negativemark,
                'result' => $result,
            );
			$this->students_m->update_exam($id,$updateData);
			
			
            /* save the path/name of webcam video recorded during exam */
            $currentTime = new DateTime();
            try{
                $data = array(
                    'student_id'    => @$_POST['studentId'],
                    'exam_id'       => @$_POST['scheduleId'],
                    'video_path'    => @$_POST['exam-video-name'],
                    'left_window'   => @$_POST['userLeftWindow'],
                    'meta'          => '',
                    'created_at'    => $currentTime->format('Y-m-d H:i:s')
                );

                $this->load->model('Students_m');
                $insertedId = $this->Students_m->insertExamVideoInfo($data);
            }catch (Exception $e){
                echo  $e->getMessage();
            }


            $response = array(
                'status' => 'success',
                'message' => "<div style='text-align: center'><h3>Answers have been submitted.</h3> <h4 style='color: #d40428'>Do NOT close the browser</h4> </div>",
                'exmid' => $id
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function examSubmitEceOsce()
    {
    	$session_data = $this->session->userdata('sht_stdnt');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('exam_id', 'Exam', 'trim|required');

        if ($this->form_validation->run() == false) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        }
        else {

            /*$contactData = array(
                'exam_id' => $this->input->post('exam_id'),
                'qtype' => $this->input->post('qtype'),
                'student_id' => $session_data['id'],
            );*/

            /*$id = $this->students_m->insert_exam($contactData);*/
            $id = $this->input->post('stexamid');

            $number1 = count($_POST["qsnid"]);
		        if($number1 > 0){
		        	
		        	for($i=0; $i<$number1; $i++){
		        		if(!empty($_POST['qsnid'][$i])){
                           
		        			/*$anscount = count(isset($_POST['qans'.$i]));
		        			$anscount = count(is_array(isset($_POST['qans'.$i])));*/
		        			if (!empty($_POST['qans'.$i])) {
						    	
						   $anscount = count($_POST['qans'.$i]);

		        			for($j=0; $j<$anscount; $j++){

		        				if(!empty($_POST['qans'.$i][$j])){
		        				$ansid = $_POST['qans'.$i][$j];
		        				/*if(empty($this->input->post('qans_sts'.$ansid)) || $this->input->post('qans_sts'.$ansid) != 0){
			        				$qavalue = 5;
			        			}else{
			        				$qavalue = $this->input->post('qans_sts'.$ansid);
			        			}*/
			        			$qavalue = $this->input->post('qans_sts'.$ansid);
			        			$ansdata = array(								
									'exam_schedule_id'=>$this->input->post('exam_id'),
									'exam_id' => $id,
									'student_id' => $session_data['id'],
									'question_id'=>$_POST['qsnid'][$i],
									'ans_id'=>$_POST['qans'.$i][$j],
									'ans_mark'=>$_POST['mark'.$i][$j],
									'ans_status'=>$qavalue,
									/*'ans_id'=>$this->input->post('qans'.$i),*/
								);
								$this->students_m->ans_sheet_insert($ansdata);
								}
							}
		        			}
		        		}
		        	}
		        }

		    /*$examanswer = $this->students_m->getExamGivenAns($id);*/
			$correctans = $this->students_m->getExamGivenCorrectAnsTf($id);
			$attendans = $this->students_m->getExamAttendAns($id);
			$totalwrongans = $this->students_m->getExamGivenWrongAnsTf($id);
			$wrongans = $this->students_m->getExamGivenNegetiveMark($id);
			$correctmark = $this->students_m->getExamGivenCorrectAnsMarksTf($id);

			$getmark = count($correctans)*$this->input->post('marks_per_question');
			$negativemark = count($wrongans)*$this->input->post('negative_mark');

			$gotmarks = $correctmark->getmarks - $negativemark;

			if($gotmarks < $this->input->post('pass_mark')){
                  $result = 'Fail';
              }else{
                $result = 'Passed';
            }

			/*$updateData = array(
                'question_ans' => count($attendans),
                'correct_ans' => count($correctans),
                'geting_marks' => $getmark,
                'result' => $result,
            );*/

            if($this->input->post('qtype') == 2) {
            	$updateData = array(
	            	'qtype' => $this->input->post('qtype'),
	                'question_ans' => count($attendans),
	                'correct_ans' => count($correctans),
	                'wrong_ans' => count($totalwrongans),
	                'total_marks' => $correctmark->getmarks,
	                'geting_marks' => $correctmark->getmarks - $negativemark,
	                'negative_marks' => $negativemark,
	            );
            }elseif($this->input->post('qtype') == 3){
            	$updateData = array(
	            	'qtype' => $this->input->post('qtype'),
	                'question_ans' => count($attendans),
	                'correct_ans' => count($correctans),
	                'wrong_ans' => count($totalwrongans),
	                'total_marks' => $correctmark->getmarks,
	                'geting_marks' => $correctmark->getmarks - $negativemark,
	                'negative_marks' => $negativemark,
	                'result' => $result,
	            );
            }
            
			$this->students_m->update_exam($id,$updateData);


            $response = array(
                'status' => 'success',
                'message' => "<h3>Answers have been submitted.</h3>",
                'exmid' => $id
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function examSubmitPca()
    {
    	$session_data = $this->session->userdata('sht_stdnt');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('exam_id', 'Exam', 'trim|required');

        if ($this->form_validation->run() == false) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        }
        else {

            $contactData = array(
                'exam_id' => $this->input->post('exam_id'),
                'qtype' => $this->input->post('qtype'),
                'student_id' => $session_data['id'],
            );

            $id = $this->students_m->insert_exam($contactData);

            $number1 = count($_POST["qsnid"]);
		        if($number1 > 0){
		        	
		        	for($i=0; $i<$number1; $i++){
		        		if(!empty($_POST['qsnid'][$i])){
                           
		        			if (!empty($_POST['qans'.$i])) {
						    	
						   $anscount = count($_POST['qans'.$i]);

		        			for($j=0; $j<$anscount; $j++){

		        				if(!empty($_POST['qans'.$i][$j])){
		        				$ansid = $_POST['qans'.$i][$j];
			        			$qavalue = $this->input->post('qans_sts'.$ansid);
			        			$ansdata = array(								
									'exam_schedule_id'=>$this->input->post('exam_id'),
									'exam_id' => $id,
									'student_id' => $session_data['id'],
									'question_id'=>$_POST['qsnid'][$i],
									'ans_id'=>$_POST['qans'.$i][$j],
									'ans_mark'=>$_POST['mark'.$i][$j],
									'ans_status'=>$qavalue,
									/*'ans_id'=>$this->input->post('qans'.$i),*/
								);
								$this->students_m->ans_sheet_insert($ansdata);
								}
							}
		        			}
		        		}
		        	}
		        }

		    /*$examanswer = $this->students_m->getExamGivenAns($id);*/
			$correctans = $this->students_m->getExamGivenCorrectAnsTf($id);
			$attendans = $this->students_m->getExamAttendAns($id);
			$totalwrongans = $this->students_m->getExamGivenWrongAnsTf($id);
			$wrongans = $this->students_m->getExamGivenNegetiveMark($id);
			$correctmark = $this->students_m->getExamGivenCorrectAnsMarksTf($id);

			$getmark = count($correctans)*$this->input->post('marks_per_question');
			$negativemark = count($wrongans)*$this->input->post('negative_mark');

			$gotmarks = $correctmark->getmarks - $negativemark;

			if($gotmarks < $this->input->post('pass_mark')){
                  $result = 'Fail';
              }else{
                $result = 'Passed';
            }

			
            $updateData = array(
                'question_ans' => count($attendans),
                'correct_ans' => count($correctans),
                'wrong_ans' => count($totalwrongans),
                'total_marks' => $correctmark->getmarks,
                'geting_marks' => $correctmark->getmarks - $negativemark,
                'negative_marks' => $negativemark,
                'result' => $result,
            );
			$this->students_m->update_exam($id,$updateData);


            $response = array(
                'status' => 'success',
                'message' => "<h3>Answers have been submitted.</h3>",
                'exmid' => $id
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }




    public function examreport($id){
    	if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["eid"] = $id;
			
			$data["examinfo"] = $this->students_m->getExamReport($id);
			$data["examanswer"] = $this->students_m->getExamGivenAns($id);
			$data["correctans"] = $this->students_m->getExamGivenCorrectAns($id);
			$data["attendans"] = $this->students_m->getExamAttendAns($id);
			$this->load->view('exam_report',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
    }

    public function examreportece($id){
    	if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["eid"] = $id;
			
			$data["examinfo"] = $this->students_m->getExamReport($id);
			$data["examanswer"] = $this->students_m->getExamGivenAns($id);
			$data["correctans"] = $this->students_m->getExamGivenCorrectAns($id);
			$data["attendans"] = $this->students_m->getExamAttendAns($id);
			$this->load->view('exam_report_ece',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
    }

    public function examreportpca($id){
    	if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["eid"] = $id;
			
			$data["examinfo"] = $this->students_m->getExamReport($id);
			$data["examanswer"] = $this->students_m->getExamGivenAns($id);
			$data["correctans"] = $this->students_m->getExamGivenCorrectAns($id);
			$data["attendans"] = $this->students_m->getExamAttendAns($id);
			$this->load->view('exam_feadback',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
    }

    public function examresult($sdlid){
    	if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			$cdate = date("Y-m-d");
			$stid = $session_data['id'];
			$data["exam_list"] = $this->students_m->getExamHistoryEce($stid, $sdlid);
			$data["sdlinfo"] = $this->students_m->getExamDtl($sdlid);

			$data["exam_thry"] = $this->students_m->getExamResultThry($stid, $sdlid);
			$data["exam_osce"] = $this->students_m->getExamResultOsce($stid, $sdlid);
			$data["exam_ospe"] = $this->students_m->getExamResultOspe($stid, $sdlid);
			$data["exam_osce_ospe"] = $this->students_m->getExamResultTotal($stid, $sdlid);
			$this->load->view('exam_result',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
    }

    public function examhistory(){
    	if($this->session->userdata('sht_stdnt')){
    	
			$session_data = $this->session->userdata('sht_stdnt');			
			$metadata = array(
				'title' => 'Dashboard',
				'description' => 'Admin Home',
				'keywords' => 'Admin Home',
				'imageurl' => base_url('user/images/logo.png'),
				'siteurl' => base_url(''),
				'imageuploadurl' => base_url('a_imageupload'),				
				'id' => $session_data['id'],
				//'user_login' => $session_data['user_login'],
				'display_name' => $session_data['display_name'],
				//'user_type' => $session_data['user_type'],
				'page' => 'index',				
				);
			$data["metadata"] = $metadata;			
			$data["page"] = 1;
			$cdate = date("Y-m-d");
			$stid = $session_data['id'];
			/*$data["exam_list"] = $this->students_m->getExamHistory($stid);*/
			$data["exam_list"] = $this->students_m->getExamHistoryNew($stid);
			$this->load->view('exam_histry',$data);
						
    	}else{
      		//If no session, redirect to login page
      		redirect('students/login', 'refresh');
		}
    }






	
	function login(){
		if(isset($_GET['id'])){
			
			$encodedid = $_GET['id'];
			$id = base64_decode($encodedid);
			
			$student = $this->students_m->get_student($id);
			
			if($student){
					
				$data["sdl_data"] = $this->students_m->get_registration_control(1); 
				$data["id"] = $id; 
				$data["encodedid"] = $encodedid; 
				$this->load->view('login_nid', $data);
			}else{
				
				redirect('students/login', 'refresh');
			}
				
			
			//echo $_GET['id'];
		}else{
	    $data["sdl_data"] = $this->students_m->get_registration_control(1); 
     	//$this->load->view('auth-login', $data);	
		$data["encodedid"] = null; 
     	$this->load->view('login_nid', $data);	
		}
	}//end function
	
	
	function nid_validation()  
      { 
		$this->load->library('form_validation');  
           $this->form_validation->set_rules('nid', 'Username', 'required');  
           if($this->form_validation->run())  
           {
			   $nid = $this->input->post('nid');
			   $encoded = $this->input->post('encoded');
			   $id = base64_decode($encoded);
			   //$student =  $this->students_m->nid($nid,$id); 
			   $student =  $this->students_m->nid($nid); 
			   
			   if($student){
				   
							$sess_array = array(
								'id' => $student->st_id,
								'st_email' => $student->st_email,
								'display_name' => $student->st_name,
								);
								$otpdata = rand(1000,90000);
								date_default_timezone_set("Asia/Dhaka");
								$login_time = $this->config->item('CUR_D_T');
								 $user_log_data = array(
									'User_Login' => $student->st_id,
									'Login_Date' => $login_time,
									'Logout_Date' => $login_time,
									'Login_Note' => null
								);
							$this->session->set_userdata('sht_stdnt', $sess_array);
							//$this->students_m->insert_otp($user_log_data);
							$this->students_m->user_log($user_log_data);
							redirect(base_url() . 'students');
				   //echo 'dfbdfb';
				   //print_r($student);
				   
			   }else{
				   $this->session->set_flashdata('error', 'Invalid NID');
				   
					redirect(base_url() . 'students/login?id='.$encoded);
			   }
		   }else  
           {  
                //false  
                $this->login();  
           }
	  
	  }
	
	public function verifylogin(){  
    	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
				
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'username', 		'label'   => 'User Name',				'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'password', 		'label'   => 'Password',				'rules'   => 'trim|xss_clean|required'),
								  
        );
				
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{			
			
			$password= md5($password);
			$result = $this->students_m->login($username, $password);
			
			if($result){		
				$sess_array = array();
				foreach($result as $row){
					$sess_array = array(
						'id' => $row->st_id,
						'st_email' => $row->st_email,
						'display_name' => $row->st_name,
						);
					$this->session->set_userdata('sht_stdnt', $sess_array);
				}
				echo $errors_array.'Login Successfully';
				//for user login log
				$user_note_date = $this->config->item('CUR_D_T');
				$user_note = 'In '.$user_note_date;
				$user_log_data = array(
					'User_Login' => $username,
					'Login_Note' => $user_note
				);
				$this->students_m->user_log($user_log_data);
				//end user login log
			}else{
				echo $errors_array.'Invalid username or password';
			}
												
		}
			
	}//end function

	// function for sms
	/*function sendsms($number, $message)
	{
		$user = "cthealth"; 
		$pass = "CT@ihUHCC11"; 
		$sid = "DLP"; 
		$url="http://sms.sslwireless.com/pushapi/dynamic/server.php";
		$param="user=$user&pass=$pass&sms[0][0]=$number&sms[0][1]=".urlencode($message)."&sid=$sid";
		$crl = curl_init();
		curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
		curl_setopt($crl,CURLOPT_URL,$url); 
		curl_setopt($crl,CURLOPT_HEADER,0);
		curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($crl,CURLOPT_POST,1);
		curl_setopt($crl,CURLOPT_POSTFIELDS,$param); 
		$response = curl_exec($crl);
		curl_close($crl);
	}*/

	/* function login_validation()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = '88'.$this->input->post('username');  
                $password = sha1($this->input->post('password'));
                
                //model function
                $logresult = $this->students_m->login($username, $password);

                if($logresult)  
                {  

                	foreach ($logresult as $ld) {
                		$atmpcount = array(
							'login_attempt' => 0,
							);
							$this->students_m->regi_update($ld->st_id, $atmpcount);

                		$otpdata = rand(1000,90000);
                		$sms = 'Your OTP is '.$otpdata;
                		$phoeno = $ld->phone;
                		$user_log_data = array(
							'user_id' => $ld->st_id,
							'login_otp' => $otpdata,
							'otp_datetime' => date("Y-m-d H:i:s"),
						);
						$this->students_m->insert_otp($user_log_data);
						sendsms($phoeno,$sms);

						$config = array (
		                  'mailtype' => 'html',
		                  'charset'  => 'utf-8',
		                  'priority' => '1'
		                );
		                $message='';
		                // confirm mail
		                $bodyMsg = '<p style="font-size:14px;font-weight:normal;margin-bottom:10px;margin-top:0;">Your OTP is '.$otpdata.'</p>';                 
		                $dataMail = array('topMsg'=>'Dear Student', 'bodyMsg'=>$bodyMsg, 'thanksMsg'=>'Warmest Regards,', 'delimeter'=> 'TMA');

		                $this->email->initialize($config);
		                $this->email->from('cthealthltd@gmail.com', 'TMA');
		                $this->email->to($ld->st_email);
		                $this->email->subject('Login OTP');
		                $message = $this->load->view('email', $dataMail, TRUE);
		                $this->email->message($message);
		                $this->email->send(); 

						redirect(base_url() . 'students/stdotp/'.$ld->st_id); 
                	}   
                     
                }  
                else  
                {  
                	$onlyid = $this->students_m->login_id($username, $password);
                	$inactive = $this->students_m->login_inactive($username, $password);
                	if($onlyid){
                		if($onlyid->login_attempt >= 3){
                			$atmpcount = array(
							'st_status' => 0,
							);
							$this->students_m->regi_update($onlyid->st_id, $atmpcount);
                			$this->session->set_flashdata('error', 'Your account has been blocked please contact with DLP Authority');  
                     		redirect(base_url() . 'students/login'); 
                		}else{
                			$amp = $onlyid->login_attempt + 1;
                			
							if($amp == 3){
								$atmpcount2 = array(
								'login_attempt' => $amp,
								'st_status' => 0,
								);
								$this->students_m->regi_update($onlyid->st_id, $atmpcount2);
								$this->session->set_flashdata('error', 'Your account has been blocked please contact with DLP Authority');  
	                     	redirect(base_url() . 'students/login');
							}else{
								$atmpcount2 = array(
								'login_attempt' => $amp,
								);
								$this->students_m->regi_update($onlyid->st_id, $atmpcount2);
								$this->session->set_flashdata('error', 'Invalid Username and Password');  
	                     	redirect(base_url() . 'students/login');
							}
	                		 
                		}
                			
                	}elseif($inactive){
                		$this->session->set_flashdata('error', 'Your account has been blocked please contact with DLP Authority');  
                     	redirect(base_url() . 'students/login');
                     }else{
                		$this->session->set_flashdata('error', 'Invalid Username and Password');  
                     	redirect(base_url() . 'students/login');
                	}
                       
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      } */
	  
	  function login_validation()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {

             $getuser = $this->input->post('username'); 
             if (is_numeric($getuser)) {
	             	//true  
	                $username = '88'.$this->input->post('username');  
	                $password = sha1($this->input->post('password'));
	                
	                //model function
	                $logresult = $this->students_m->login($username, $password);
             	}else{
               		//true  
	                $username = $this->input->post('username');  
	                $password = sha1($this->input->post('password'));
	                
	                //model function
	                $logresult = $this->students_m->login_email($username, $password);
               }
             
                

                if($logresult)  
                {  

                	foreach ($logresult as $ld) {
                		$atmpcount = array(
							'login_attempt' => 0,
							);
							$this->students_m->regi_update($ld->st_id, $atmpcount);

                		$otpdata = rand(1000,90000);
                		$sms = 'Your OTP is '.$otpdata;
                		$phoeno = $ld->phone;
                		$user_log_data = array(
							'user_id' => $ld->st_id,
							'login_otp' => $otpdata,
							'otp_datetime' => date("Y-m-d H:i:s"),
						);
						$this->students_m->insert_otp($user_log_data);
						sendsms($phoeno,$sms);

						$config = array (
		                  'mailtype' => 'html',
		                  'charset'  => 'utf-8',
		                  'priority' => '1'
		                );
		                $message='';
		                // confirm mail
		                $bodyMsg = '<p style="font-size:14px;font-weight:normal;margin-bottom:10px;margin-top:0;">Your OTP is '.$otpdata.'</p>';                 
		                $dataMail = array('topMsg'=>'Dear Student', 'bodyMsg'=>$bodyMsg, 'thanksMsg'=>'Warmest Regards,', 'delimeter'=> 'PCA');

		                $this->email->initialize($config);
		                $this->email->from('cthealthltd@gmail.com', 'PCA');
		                $this->email->to($ld->st_email);
		                $this->email->subject('Login OTP');
		                $message = $this->load->view('email', $dataMail, TRUE);
		                $this->email->message($message);
		                $this->email->send(); 

						redirect(base_url() . 'students/stdotp/'.$ld->st_id); 
                	}
                     /*$session_data = array(  
                          'username'     =>     $username  
                     );  
                     $this->session->set_userdata($session_data);*/   
                     
                }  
                else  
                { 
                	if (is_numeric($username)) { 
                		$onlyid = $this->students_m->login_id($username, $password);
                		$inactive = $this->students_m->login_inactive($username, $password);
                	}else{
                		$onlyid = $this->students_m->login_id_email($username, $password);
                		$inactive = $this->students_m->login_inactive_email($username, $password);
                	}
                	
                	/*print_r($onlyid); exit();*/
                	if($onlyid){
                		if($onlyid->login_attempt >= 3){
                			$atmpcount = array(
							'st_status' => 0,
							);
							$this->students_m->regi_update($onlyid->st_id, $atmpcount);
                			$this->session->set_flashdata('error', 'Your account has been blocked please contact with DLP Authority');  
                     		redirect(base_url() . 'students/login'); 
                		}else{
                			$amp = $onlyid->login_attempt + 1;
                			
							if($amp == 3){
								$atmpcount2 = array(
								'login_attempt' => $amp,
								'st_status' => 0,
								);
								$this->students_m->regi_update($onlyid->st_id, $atmpcount2);
								$this->session->set_flashdata('error', 'Your account has been blocked please contact with DLP Authority');  
	                     	redirect(base_url() . 'students/login');
							}else{
								$atmpcount2 = array(
								'login_attempt' => $amp,
								);
								$this->students_m->regi_update($onlyid->st_id, $atmpcount2);
								$this->session->set_flashdata('error', 'Invalid Username and Password');  
	                     	redirect(base_url() . 'students/login');
							}
	                		 
                		}
                			
                	}elseif($inactive){
                		$this->session->set_flashdata('error', 'Your account has been blocked please contact with DLP Authority');  
                     	redirect(base_url() . 'students/login');
                     }else{
                		$this->session->set_flashdata('error', 'Invalid Username and Password');  
                     	redirect(base_url() . 'students/login');
                	}
                       
                }

           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      }

      public function stdotp($id){

      	$data['userid'] = $id;
      	$this->load->view('auth-otp', $data);
      }


      public function verifyotp(){  
    	
		$otp = $this->input->post('otp');
		$user_id = $this->input->post('user_id');
				
		//This method will have the credentials validation
		$validation_rules = array(
               	array('field'   => 'otp', 		'label'   => 'User Name',				'rules'   => 'trim|xss_clean|required'),
								  
        );
				
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{			
			
			
			$result = $this->students_m->otplogin($user_id,$otp);
			
			if($result){
					$otplmt = $this->students_m->otploginlimit($user_id,$otp);
					/*echo $otplmt->login_datetime;*/
					/*print_r($otplmt->login_datetime);exit;*/
					$cdt = date("Y-m-d H:i:s");
					$seconds = strtotime($cdt) - strtotime($otplmt->otp_datetime);
					$days    = floor($seconds / 86400);
					$hours   = floor(($seconds - ($days * 86400)) / 3600);
					$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
					$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));

					$ttlmnt = $days*24*60 + $hours*60 + $minutes;
					/*echo $otplmt->login_datetime.'<br>';
					echo $cdt.'<br>';
					echo $ttlmnt; exit;*/
					if ($ttlmnt < 5) {
						$sess_array = array();
						foreach($result as $row){
							$sess_array = array(
								'id' => $row->st_id,
								'st_email' => $row->st_email,
								'display_name' => $row->st_name,
								);
							$this->session->set_userdata('sht_stdnt', $sess_array);
						}
						echo $errors_array.'Login Successfully';
					}else{
						echo $errors_array.'Time over';
					}
				
				
				//end user login log
			}else{
				echo $errors_array.'Invalid OTP';
			}
												
		}
			
	}//end function
	
	
	function check_database($password){
  
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		$password= md5($password);
		
		// $type = $this->input->post('type');
		//query the database
		$result = $this->students_m->login($username, $password);
		
		if($result){		
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id' => $row->user_id,
					'user_login' => $row->user_login,
					'display_name' => $row->display_name,
					'user_image' => $row->User_Image,
					'user_type' => $row->user_type
					);
				$this->session->set_userdata('sht_stdnt', $sess_array);
			}
			return TRUE;
		}else{
			$this->form_validation->set_message('check_database', 'Invalid username, password or Type');
			return false;
		}
		
  	}//end function
		
	
	function logout(){
		$this->session->unset_userdata('logged_in');
		
		$session_data = $this->session->userdata('sht_stdnt');
		$username = $session_data['id'];
		$user_note_date = $this->config->item('CUR_D_T');
		$user_note = 'Out '.$user_note_date;
		$user_log_data = array(
			'User_Login' => $username,
			'Login_Note' => $user_note
		);
		$this->students_m->user_log_out($user_log_data);
		session_destroy();
		redirect( base_url('students/login') , 'refresh');
	}

	function clearcache(){    	
		$this->output->clear_all_cache();
		redirect('students', 'refresh');		
  	} //End of function


  	function forgotpassword(){  
     	$this->load->view('forgot');		
	}//end function

	public function forgotdata(){

		$frommail = 'cthealthltd@gmail.com';
		$email = $this->input->post('email');						
		$exists = $this->students_m->check_email($email);
		if( $exists==0 ){
			echo 'Email is not Exists';
          }else{
          	if(!empty($email)) {

          		$info = $this->students_m->forgot_studentinfo($email);

          		$stid = $info->st_id;
          		/*print_r($stid); exit;*/
                // send mail
                $config = array (
                  'mailtype' => 'html',
                  'charset'  => 'utf-8',
                  'priority' => '1'
                );
                $message='';                

                // confirm mail
                $bodyMsg = '<p style="font-size:14px;font-weight:normal;margin-bottom:10px;margin-top:0;">Please go to this link '.base_url('students/recoverpw/').$stid.'</p>';                 
                $dataMail = array('topMsg'=>'Dear Student', 'bodyMsg'=>$bodyMsg, 'thanksMsg'=>'Warmest Regards,', 'delimeter'=> 'TMA');

                $this->email->initialize($config);
                $this->email->from($frommail, 'TMA');
                $this->email->to($email);
                $this->email->subject('Reset Password');
                $message = $this->load->view('email', $dataMail, TRUE);
                $this->email->message($message);
                $this->email->send();  

                echo 'Please check your Email';              
            }
          }          	

	}

	function recoverpw($id){

		$data['stid'] = $id;
     	$this->load->view('recover', $data);		
	}//end function

	public function recover_data(){		
		//$this->is_ajax();
		$session_data = $this->session->userdata('sht_ssndata');	
		//This method will have the credentials validation
		$validation_rules = array(               	
				array('field'   => 'password', 'label'   => 'Password', 'rules'   => 'trim|xss_clean|required'),
				array('field'   => 'passconf', 'label'   => 'Password Confirmation', 'rules'   => 'required|matches[password]'));
		$errors_array = $this->form_validation->validation($validation_rules);
		if($errors_array)
            echo $errors_array;
        else{
				//Setting values for tabel columns
				$data = array(
					'password'=>md5($this->input->post('password')),
				);

				$id = $this->input->post('stid');
				

				$this->students_m->regi_update($id,$data);

				echo $errors_array.'Successfully';
			
		}
	}





		
}

?>