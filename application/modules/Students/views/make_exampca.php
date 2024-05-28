<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>PCA Exam | Distance Learning Programme (DLP)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Distance Learning Programme" name="description" />
        <meta content="CTHealth" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

       <!-- jquery.vectormap css -->
        <link href="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url();?>assets/css/app.css" id="app-style" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>

        <style>


/* Slideshow container */
.slideshow-container {
  position: relative;
  background: #f1f1f1f1;
}

/* Slides */
.mySlides {
  display: none;
  padding: 8px;
  text-align: left;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 25px;
  width: 25px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.dot-container .active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
/*q {font-style: italic;}*/

/* Add a blue color to the author */
/*.author {color: cornflowerblue;}*/
.animated2 {
  -webkit-animation: 1600ms fadeIn alternate ease-in-out;
  -moz-animation: 1600ms fadeIn alternate ease-in-out;
  -ms-animation: 1600ms fadeIn alternate ease-in-out;
  -o-animation: 1600ms fadeIn alternate ease-in-out;
  animation: 1600ms fadeIn alternate ease-in-out;
}

@-webkit-keyframes fadeIn {
    0% {opacity: 0;}
    100% {opacity: 1;}
}

@-moz-keyframes fadeIn {
    0% {opacity: 0;}
    100% {opacity: 1;}
}
@-ms-keyframes fadeIn {
    0% {opacity: 0;}
    100% {opacity: 1;}
}
@-o-keyframes fadeIn {
    0% {opacity: 0;}
    100% {opacity: 1;}
}        
@keyframes fadeIn {
    0% {opacity: 0;}
    100% {opacity: 1;}
}
</style>

    </head>

    <body data-topbar="light" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?php /*$this->load->view('includes/topbarstudent');*/ //print_r($examinfo);?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content" style="margin-top: 0px !important;">
                    <div class="container-fluid">
                        
                          <?php 
                          if($eqt == 2){
                          	$exmtm = $examinfo->exam_time_osce;
                          	$exmttl = 'OSCE';
                          	$quesn = $examinfo->no_of_question_osce;
                          	$mpq = $examinfo->marks_per_question_osce;
                          }elseif($eqt == 3){
                          	$exmtm = $examinfo->exam_time_ospe;
                          	$exmttl = 'OSPE';
                          	$quesn = $examinfo->no_of_question_ospe;
                          	$mpq = $examinfo->marks_per_question_ospe;
                          }
                          ?>
                        <!-- start page title -->
                        <div class="row">

                            <div class="uploading-video col-md-12 text-center" style="display: none; background: #fff;padding: 0.5em 0; color: #000;font-size: 1.3em">
                                <div>Exam video is being uploaded. Please wait...</div>
                                <div>
                                    <!--<img src="/pca/assets/images/loader1.gif" alt="Uploading..." style="max-width: 90%">-->
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo $examinfo->schedule_name;?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Total Question: <?php echo $examinfo->no_of_question_osce;?></li>
                                            <!-- <li class="breadcrumb-item">No of <?php echo $exmttl;?> Question: <?php echo $quesn;?></li> -->
                                            <li class="breadcrumb-item">Total Mark: <?php echo $examinfo->total_mark_osce;?></li>
                                            <li class="breadcrumb-item active">Exam Time: <?php echo $exmtm; ?> Min</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" id="question-sheet" style="display: none">
                                    
                                    <div class="col-md-12">
                                      <?php 
                                      date_default_timezone_set('Asia/Dhaka');
                                      $currentDate = strtotime(date("Y-m-d H:i:s"));
                                    
                                    $examBegin = strtotime($examinfo->start_date);
                                    $examEnd = strtotime($examinfo->end_date);
                                    if ($currentDate > $examEnd) {?>
                                               <h2>Exam Time has been finished</h2>
                                                        

<div style="clear: both; height: 30px;"></div>
<a href="<?php echo base_url('students');?>" class="btn btn-primary" >
    Back to Dashboard
  </a>

                                          <?php }else{?>
<?php /*echo $currentDate.' sdsd '.$examEnd.' date '.date("Y-m-d H:i:s");*/?>
                                        <div class="card border border-primary">
                                            <div class="card-body border-bottom py-3">
                                                <h6 class="my-0 text-info float-left">Total Marks: <?php echo $examinfo->total_mark_osce;?></h6>
                                                
                                                <!-- <h6 class="my-0 text-info float-right">Total Marks: <?php echo $examinfo->total_mark;?></h6> -->
                                                <h6 class="my-0 text-info float-right"><div id="countdown" style="display: none;"> </div><div><span id="time"><?php echo $exmtm;?></span> minutes remaining</div></h6>
                                            </div>
                                            <div class="card-body">
                                                <div id="message"></div>
                    <?php echo form_open('students/examSubmitEce', array('id' => 'contactForm','name'=>'form_post')) ?>
<input type="hidden" name="exam_id" value="<?php echo $examinfo->schedule_id;?>">
<input type="hidden" name="marks_per_question" value="<?php echo $mpq;?>">
<input type="hidden" name="negative_mark" value="<?php echo $examinfo->negative_mark;?>">
<input type="hidden" name="pass_mark" value="<?php echo $examinfo->pass_mark_osce;?>">
<input type="hidden" name="qtype" value="<?php echo $eqt;?>">
<!-- <input type="hidden" name="stexamid" value="<?php /*echo $eceexamstatus->id;*/?>"> -->
                                                <div class="media">
                                                    <div class="media-body overflow-hidden">
                                                        
                                                       <div class="slideshow-container">
                                                    <?php $i=0; foreach ($examquestion as $eqsn) { $sl=$i+1;?>  

                                                        <div class="mySlides animated2">
                                                           <h5 class="my-0 mb-4"><?php echo $sl.'. '.$eqsn->title;?></h5>
                                                           <input type="hidden" name="qsnid[]" value="<?php echo $eqsn->id;?>">


<!--                                                        needed to save webcam video info in database-->
                                                            <input type="hidden" name="exam-video-name" id="exam-video-name" value="<?php echo $examinfo->schedule_id . '_' . $stinfo->student_id . '_' . date('Y-m-d_H-i') . '.mp4' ; ?>">
                                                            <input type="hidden" name="studentId" value="<?php echo $stinfo->student_id ?>">
                                                            <input type="hidden" name="scheduleId" value="<?php echo $examinfo->schedule_id ?>">
                                                            <input type="hidden" name="userLeftWindow" id="userLeftWindow" value="">


                                                           <?php $questionans = $this->students_m->getExamQuestionsAns($eqsn->id); ?>
                                                           <?php $qc=1; foreach ($questionans as $anslist) {?>
                                                           
                                                           <div class="mb-3">
                                                              <h5><?php echo $anslist->qa_title;?></h5>
                                                              <input type="hidden" name="qans<?php echo $i;?>[]" value="<?php echo $anslist->qa_id;?>">
                                                              <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="qans_sts<?php echo $anslist->qa_id;?>" id="exampleRadios1<?php echo $anslist->qa_id;?>" value="1">
                                                                  <label class="form-check-label" for="exampleRadios1<?php echo $anslist->qa_id;?>">
                                                                      True
                                                                  </label>
                                                              </div>
                                                              <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="qans_sts<?php echo $anslist->qa_id;?>" id="exampleRadios2<?php echo $anslist->qa_id;?>" value="0">
                                                                  <label class="form-check-label" for="exampleRadios2<?php echo $anslist->qa_id;?>">
                                                                      False
                                                                  </label>
                                                              </div>
                                                          </div>
                                                         
<input type="hidden" value="<?php echo $mpq/count($questionans);?>" name="mark<?php echo $i;?>[]">
                                                          <?php $qc++; }?>
                                                        
                                                        </div>
                                                    <?php $i++; }?>
                                                        

<!-- <a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a> -->
                                            <div class="form-group mb-0">
                                                <div>
                                                    <a class="btn btn-primary waves-effect waves-light ml-1 float-right" onclick="plusSlides(1)" id="nextbtn" style="color: #fff">
                                                        Next
                                                    </a>                                             
                                                    <a class="btn btn-warning waves-effect float-right" onclick="plusSlides(-1)" id="prebtn" style="color: #fff; display: none;">
                                                        Previous
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div><button type="submit" class="btn btn-success waves-effect waves-light mt-1 float-right">
                                                        Finish
                                                    </button></div>
                                            </div>
</div>

                                            <?php echo form_close() ?>

                                                    </div>
                                                    
                                                </div>




                                            </div>

                                            <div class="card-body border-top py-3">
                                                <!-- <a href="#" class="btn btn-primary waves-effect waves-light">Start Exam</a> -->
                                                <div class="dot-container">
                                                <?php $i=1; foreach ($examquestion as $eqsn) {?>
                                                  <span class="dot" onclick="currentSlide(<?php echo $i;?>)"><?php echo $i;?></span> 
                                                <?php $i++; }?>
                                                  <!-- <span class="dot" onclick="currentSlide(2)"></span> 
                                                  <span class="dot" onclick="currentSlide(3)"></span> --> 
                                                </div>
                                            </div>
                                        </div>

<?php }?>

                                    </div>


                                    
                                </div>
                      

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



                <?php

                ?>
                <div id="scheduleId" style="display: none;"><?php echo $examinfo->schedule_id; ?></div>
                <div id="studentId" style="display: none;"><?php echo $stinfo->student_id; ?></div>



                <?php $this->load->view('includes/footer');?>
            </div>
            <!-- end main content-->


        </div>
        <!-- END layout-wrapper -->





       <script>


    $(function() {
        $("#contactForm").on('submit', function(e) {
            e.preventDefault();

            var contactForm = $(this);
            if (confirm('Are you sure you want to submit?')) {

                $('#question-sheet').hide();
                $('.uploading-video').slideDown();

                mediaRecorder.stop();

                $.ajax({
                url: contactForm.attr('action'),
                type: 'post',
                data: contactForm.serialize(),
                success: function(response){
                    console.log("answer submission response:\n");
                    console.log(response);
                    if(response.status == 'success') {
                        $("#contactForm").hide();
                        var jmpurl='<?php echo base_url('students/examreportpca/');?>'+response.exmid;
                        /*var jmpurl='<?php echo base_url('students/examnotice/').$eid;?>';*/

                        /* repeatedly check whether videoUploadSuccess or not */
                        var intervalId = setInterval(() => {
                            //console.log("videoUploadSuccess="+videoUploadSuccess);
                            if(videoUploadSuccess){
                                window.location=jmpurl;
                            }
                        }, 1000);
                    }else{
                        console.log("answer submission failed");
                    }

                    $("#message").html(response.message);

                }
            });
            }
        });
    });


function SubmitAlert() {
    /*alert('Congratulations');*/
     $.ajax({
                url: $("#contactForm").attr('action'),
                type: 'post',
                data: $("#contactForm").serialize(),
                success: function(response){
                    console.log(response);
                    if(response.status == 'success') {
                        $("#contactForm").hide();
                        alert('Your time is up and answers have been submitted');
                        var jmpurl='<?php echo base_url('students/examreportpca/');?>'+response.exmid;
                        /*var jmpurl='<?php echo base_url('students/examnotice/').$examinfo->schedule_id;;?>';*/
                        //window.location=jmpurl;

                        var intervalId = setInterval(() => {
                            //console.log("videoUploadSuccess="+videoUploadSuccess);
                            if(videoUploadSuccess){
                                window.location=jmpurl;
                            }
                        }, 1000);
                    }

                    $("#message").html(response.message);

                }
            });
}

/*time=5*60,r=document.getElementById('r'),tmp=time;
setInterval(function(){
var c=tmp--,m=(c/60)>>0,s=(c-m*60)+'';
r.textContent='Registration closes in '+m+':'+(s.length>1?'':'0')+s
tmp!=0||(tmp=time);
},1000);*/


    /* if you want to test the exam for a shorter duration of time, change this value */
    const oneHourMinutes = 60;
    var timeleft = oneHourMinutes*<?php echo $exmtm;?>;
    var downloadTimer = setInterval(function(){
      if(timeleft <= 0){

        mediaRecorder.stop();

        SubmitAlert();
        clearInterval(downloadTimer);
        //document.form_post.submit();
        document.getElementById("countdown").innerHTML = "Finished";
        
      } else {
        document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
      }
      timeleft -= 1;
    }, 1000);
</script>

<script>
var slideIndex = 1;
showSlides(slideIndex);

var nextBtn = document.getElementById("nextbtn");
var prevBtn = document.getElementById("prebtn");

function plusSlides(n) {
  /*showSlides(slideIndex += n);*/
  var newIndex = slideIndex += n;
  handleDisabled(newIndex);
  showSlides(newIndex);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

function handleDisabled(newIndex) {
prevBtn.style.display = "block";
  nextBtn.style.display = "block";

  var slides = document.getElementsByClassName("mySlides");
  if (newIndex === slides.length) {
    nextBtn.style.display = "none";
  } else if (newIndex === 1) {
    prevBtn.style.display = "none";
  }
}
</script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/dropbox.js/5.2.1/Dropbox-sdk.min.js"></script>
<script src="/assets/js/exam-video/capture.js"></script>
<script src="//cdn.jsdelivr.net/npm/@ffmpeg/ffmpeg@0.8.3/dist/ffmpeg.min.js"></script>


<script type="text/javascript">
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}





let mediaRecorder;
let recordedChunks = [];
let isRecording = false;

let examDuration = oneHourMinutes * <?php echo $exmtm;?>;

let videoUploadSuccess = false;

/* monitor if user left/minimized active browser/window while exam running */
let userLeftWindow = 0;
let videoChunkNo = 0;

window.onload = function () {
    display = document.querySelector('#time');


    let startWebcamRecord = async function () {
        try {
            let camera_stream = await navigator.mediaDevices.getUserMedia({video: true, audio: true});

            const videoConstraints = {
                width: { max: 360 },
                height: { max: 360 },
                frameRate: { max: 8 }, // Adjust the frame rate to reduce size
                facingMode: 'user', // Use the user-facing camera if available
            };

            const options = {
                mimeType: 'video/webm;codecs=vp9',
                video: videoConstraints,
                audioBitsPerSecond: 64000, // Limit audio bitrate to reduce size
                videoBitsPerSecond: 128000, // Limit video bitrate to reduce size
            };

            mediaRecorder = new MediaRecorder(camera_stream, options);

            mediaRecorder.addEventListener('dataavailable', async function (e) {
                recordedChunks.push(e.data);
                //console.log("chunk no="+recordedChunks.length);
            });


            mediaRecorder.addEventListener('stop', async function () {
                mediaRecorder.stop();

                try {
                    uploadToDropbox(recordedChunks);
                } catch (e) {
                }
            });

            mediaRecorder.start(1000);

            /* exam starts here */
            $('#question-sheet').show();
            startTimer(examDuration, display);

        } catch (error) {
            try {
					let camera_stream = await navigator.mediaDevices.getUserMedia({video: true, audio: true});

					const videoConstraints = {
						width: { max: 360 },
						height: { max: 360 },
						frameRate: { max: 8 }, // Adjust the frame rate to reduce size
						facingMode: 'user', // Use the user-facing camera if available
					};
					
					
					
					 const options = {
						mimeType: 'video/mp4',
						video: videoConstraints,
						audioBitsPerSecond: 64000, // Limit audio bitrate to reduce size
						videoBitsPerSecond: 128000, // Limit video bitrate to reduce size
						};
						
					
					
					mediaRecorder = new MediaRecorder(camera_stream, options);

					mediaRecorder.addEventListener('dataavailable', async function (e) {
						recordedChunks.push(e.data);
						//console.log("chunk no="+recordedChunks.length);
					});
					
					
					mediaRecorder.addEventListener('stop', async function () {
						mediaRecorder.stop();

						try {
							uploadToDropbox(recordedChunks);
						} catch (e) {
						}
					});

					mediaRecorder.start(1000);

					/* exam starts here */
					$('.page-content').show();
					startTimer(fiveMinutes, display);
					
					
				}catch (error) {
					//alert(error.message);
					alert('To Proceed to exam you need to connect a webcam to your device and reload');
					return;
				}
        }
    }

    startWebcamRecord();


    /**
     * handle iPhone webcam access
     * */
    function isiPhone() {
        return /iPhone|iPod/i.test(navigator.userAgent);
        return /iPhone|iPod/i.test(navigator.userAgent);
    }

    /* skip webcam for iphone users (tentatively) */
    if (isiPhone()) {
        /* exam starts here */
        $('#question-sheet').show();
        startTimer(examDuration, display);
    }


    /***********************************************
     *  monitor if user leaves/minimizes/open new window
     ************************************************/
    function onVisibilityChange() {
        if (document.visibilityState === 'visible') {
        } else {
            userLeftWindow = 1;
            $('#userLeftWindow').val(userLeftWindow);
            //console.log("user left the page");
        }
    }

    document.addEventListener('visibilitychange', onVisibilityChange);


}





</script>
       

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>

        

        <!-- Required datatable js -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- <script src="<?php echo base_url();?>assets/js/pages/dashboard.init.js"></script> -->

        <!-- <script src="<?php echo base_url();?>assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/pages/form-validation.init.js"></script> -->

        <script src="<?php echo base_url();?>assets/js/app.js"></script>

    </body>
</html>
