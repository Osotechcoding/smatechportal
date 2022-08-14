<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Virtual Classroom</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->
<style>
  iframe:focus {
  outline: none;
}

iframe[seamless] {
  display: block;
}
</style>
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- headerNav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
  <?php include ("template/Sidebar.php"); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
             <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"><?php echo strtoupper($_SESSION['STAFF_ROLE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Upload Lecture
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
 <div class="col-12 mb-2">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-video-camera fa-2x"></span> VIRTUAL LECTURE MODULE</h3>
  </div>
</div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
   <!-- Statistics Cards Starts -->
        <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            
           <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-file fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> PDF</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $Administration->count_all_available_lessons_by_type("application/pdf");?></h2>
                </div>
              </div>
            </div>
             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-secondary">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Video</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $Administration->count_all_available_lessons_by_type("video/mp4");?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-microphone fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Audio</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_available_lessons_by_type("audio/mp3");?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-video-camera fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Lessons</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_available_lessons();?></h2>
                  
                </div>
              </div>
            </div>
           
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-danger btn-lg btn-round" data-toggle="modal" data-target="#uploadLectureModal"><span class="fa fa-video-camera fa-1x"></span> Upload Lecture</button>  
        </div>
        <div class="card-body card-dashboard">
       <div class="text-center" id="response"></div>
        <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>Subject</th>
                  <th>Class</th>
                  <!-- <th>Posted By</th> -->
                  <th>Expire</th>
                  <th>Topic</th>
                  <th>Instruction</th>
                  <th>Downloads</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
                $get_all_Virtual_lessons = $Administration->get_all_virtual_lectures();
                if ($get_all_Virtual_lessons) {
                  // code...
                  foreach ($get_all_Virtual_lessons as $values) {
                    ?>
                    <tr>
                  <td><?php echo ucwords($values->subject);?></td>
                  <td><?php echo ucwords($values->lesson_grade);?></td>
                  <!-- <td>Master Idowu J</td> -->
                  <td> <?php echo date("l j F Y",strtotime($values->date_to));?></td>
                  <td><?php echo $values->lesson_topic;?></td>
                  <td><button type="button" class="badge badge-pill badge-dark badge-md view_btn" data-instruction="<?php echo $values->message;?>" data-title="<?php echo $values->subject;?>">Read</button></td>
                  <td><span class="badge badge-pill badge-warning badge-md"><?php echo $values->counter;?> Downloads</span></td>
                  <td>  <div class="btn-group dropdown mr-1 mb-1">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,20">
              Options
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">

             <a class="dropdown-item text-info" href="watch?type=<?php echo $values->file_type;?>&lessonId=<?php echo $values->lectureId;?>">
                <?php if ($values->file_type==="video/mp4"){
                  echo '<span class="fa fa-eye"></span>&nbsp;Watch';
                }elseif ($values->file_type==="audio/mp3") {
                 echo ' <span class="fa fa-signal"></span>&nbsp; Listen';
                }else{
                  echo '<span class="fa fa-eye"></span>&nbsp;View';
                } ?>
               </a>
              <a class="dropdown-item text-warning" href="student_file_downloader?fileId=<?php echo $values->lectureId;?>&lesson_file=<?php echo $values->lesson_file;?>"><span class="fa fa-download"></span>&nbsp; Download</a>
               <a class="dropdown-item text-danger delete_btn" data-action="delete_files" data-value="<?php echo $values->lectureId;?>" href="javascript:void(0);"><span class="fa fa-trash"></span>&nbsp; Delete</a></div></div>
             </td>
                </tr>
                    <?php
                    // code...
                  }
                }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Column selectors with Export Options and print table -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->

    <!-- BUS MODAL Start -->
   <div class="modal fade" id="uploadLectureModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg modal-dialog-center">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-video-camera fa-2x"></i> Upload Virtual Lecture</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center" id="server-response-text"></div>
                <form id="video_form" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="subject">LESSON SUBJECT</label>
                <select name="subject" id="subject" class="select2 form-control">
                 <option value="">Choose...</option>
                <?php echo $Administration->get_all_subjects_InDropDown_list();?>
               </select>
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="std_grade">UPLOAD FOR CLASS</label>
               <select name="std_grade" id="std_grade" class="select2 form-control">
                  <option value="">Choose...</option>
                <?php echo $Administration->get_classroom_InDropDown_list();?>
               </select>
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="posted_by">UPLOADED BY </label>
                <select name="posted_by" id="posted_by" class="select2 form-control">
                 <option value="">--select--</option>
                <?php echo $Staff->show_staff_indropdown_list() ?>
               </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="expiry_date">EXPIRES ON</label>
               <input type="date" class="form-control" name="expiry_date">
                    </div>
                  </div>
                   <div class="col-md-12">
                  <div class="form-group">
                  <label for="topic">LECTURE TOPIC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="topic" placeholder="Common Errors in English Language">
                    </div>
               </div>
                   
                   <div class="col-12 mt-1">
                    <label for="textarea-counter">Instruction to student (Max Character (150))</label>
                    <textarea data-length=150 class="form-control char-textarea" id="textarea-counter" name="message" rows="3" placeholder="Instruction to student (Max Character (150))"></textarea>
                    
                      <small class="counter-value float-right mb-2"><span class="char-count">0</span> / 150 </small>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="lecture_mp4">LECTURE FILE <span class="text-danger">(Audio Files Only)</span></label>
                <input type="file" accept=".mp4,.mp3,.pdf" class="form-control form-control-lg" name="myFile">
                    </div>
                  </div>
                 </div>
                  </div>
                </div>
                <input type="hidden" name="action" value="upload_lesson_file">
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                     Submit Lecture
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    Back
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->
    
    <!--Modal Read Instruction Starts -->
          <div class="modal fade text-left" id="ReadInstructModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Instruction</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0" id="lesson_details"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Close
                  </button>
                </div>
              </div>
            </div>
          </div>
    <!-- Modal Read Instruction ends -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
    <script type="text/javascript">

$(document).ready(function(){
//when a delete btn is clicked
const delete_btn = $(".delete_btn");
delete_btn.on("click", function(){
  let lectureId = $(this).data("value");
  let action = $(this).data("action");
  let is_true = confirm("Are you sure you wanto permanently remove this file?");
  if (is_true) {
$.post("../actions/delete_actions",{action:action,lectureId:lectureId}, function(res){
    setTimeout(()=>{
      $("#response").html(res);
    },500);
  })
  }else{
    return false;
  }
})
  //when view btn is clicked
  const view_btn = $(".view_btn");
  view_btn.on("click", function(){
     let instruction = $(this).data("instruction");
     //let title = $(this).data("title");
      $("#lesson_details").html(instruction);
      //$("#subTitle").html(title);
    $("#ReadInstructModal").modal("show");
  })

$("#video_form").on("submit",function(event){
  event.preventDefault();
  $.ajax({
    url:"../actions/actions",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Uploading...').attr("disabled",true);
    },
    success:function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Submit Lecture').attr("disabled",false);
        $("#video_form")[0].reset();
        $("#server-response-text").html(data);
        //alert(data);
      },2500);
    }

  });
})
})
    </script>

  </body>
  <!-- END: Body-->

</html>