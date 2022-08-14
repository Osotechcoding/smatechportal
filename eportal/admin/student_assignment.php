<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Online Student Assignments</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>

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
             <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__;?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  
                  <li class="breadcrumb-item active">Upload Assignment
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
 <div class="col-12 mb-2">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-edit fa-1x"></span> ASSIGNMENT MODULE</h3>
  </div>
</div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-dark btn-lg btn-round" data-toggle="modal" data-target="#uploadLectureModal"><span class="fa fa-edit fa-1x"></span> Upload Assignment</button>  
        </div>
        <div class="card-body card-dashboard">
       <div class="text-center" id="response"></div>
        <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>Subject</th>
                  <th>Class</th>
                 <th>Teacher</th>
                  <th>Submission Date</th>
                  <th>Topic</th>
                  <th>Instruction</th>
                  <th>Download</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
                $get_all_assignments = $Student->get_all_students_assignments();
                if ($get_all_assignments) {
                  // code...

                  foreach ($get_all_assignments as $values) {
                    $staff_data = $Staff->get_staff_ById($values->teacherId);
                    ?>
                    <tr>
                  <td><?php echo ucwords($values->subject);?></td>
                  <td><?php echo ucwords($values->stdGrade);?></td>
                   <td><?php echo ucwords($staff_data->full_name);?></td> 
                  <td> <?php echo date("l j F Y",strtotime($values->submission_date));?></td>
                  <td><?php echo $values->topic;?></td>
                  <td><button type="button" class="badge badge-pill badge-dark badge-md view_btn" data-instruction="<?php echo $values->note;?>" data-title="<?php echo $values->subject;?>">Read</button></td>
                  <td><a class="dropdown-item text-warning" href="assignment_downloader?fileId=<?php echo $values->assId;?>&assignment_file=<?php echo $values->ass_content;?>"><span class="fa fa-download"></span>&nbsp; Download</a></td>
                  <td><button class="btn btn-danger btn-sm delete_btn" type="button" data-id="<?php echo $values->assId;?>" data-action="delete_assignment_now">Delete</button></td>
                </tr>
                    <?php
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
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-edit fa-1x"></i> Assignment</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="assignment_form" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                <!-- <?php //echo $_SESSION['STAFF_SES_ID'];?> -->
                <input type="hidden" name="uploadedBy" value="1">
                  <div class="form-group">
                  <label for="subject"> SUBJECT</label>
                <select name="subject" id="subject" class="select2 form-control">
                 <option value="">Choose...</option>
                <?php echo $Administration->get_all_subjects_InDropDown_list();?>
               </select>
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="std_grade">FOR CLASS</label>
               <select name="std_grade" id="std_grade" class="select2 form-control">
                  <option value="" selected>Choose...</option>
                <?php echo $Administration->get_classroom_InDropDown_list();?>
               </select>
                    </div>
               </div>
                
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="sdate">Submission Date & Time</label>
               <input type="date" class="form-control" name="sdate">
                    </div>
                  </div>
                   <div class="col-md-12 col-12 col-sm-12 col-lg-12">
                  <div class="form-group">
                  <label for="topic">Assignment Title</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="topic" placeholder="Common Errors in English Language">
                    </div>
               </div>
                   
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="assignmentFile">ASSIGNMENT CONTENT <span class="text-danger">(.PDF,.DOCX,.xlxs Files Only)</span></label>
                <input type="file" class="form-control form-control-lg" name="assignmentFile">
                    </div>
                  </div>
                  <div class="col-12 mt-1">
                    <label for="textarea-counter">Instruction to student (Max Character (150))</label>
                    <textarea data-length=150 class="form-control char-textarea" id="textarea-counter" name="note" rows="3" placeholder="Instruction to student (Max Character (150))"></textarea>
                      <small class="counter-value float-right mb-2"><span class="char-count">0</span> / 150 </small>
                  </div>
                 </div>
                  </div>
                </div>
                <input type="hidden" name="action" value="upload_assignment_file">
                <input type="hidden" name="term" value="<?php echo $activeSess->term_desc;?>">
                <input type="hidden" name="school_session" value="<?php echo $activeSess->session_desc_name;?>">
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                     Upload Assignment
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
  let assId = $(this).data("id");
  let action = $(this).data("action");
  let is_true = confirm("Are you sure you want to delete this Assignment permanently?");
  if (is_true) {
$.post("../actions/delete_actions",{action:action,assId:assId}, function(res){
    setTimeout(()=>{
      $("#server-response").html(res);
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
      $("#lesson_details").html(instruction);
    $("#ReadInstructModal").modal("show");
  })

$("#assignment_form").on("submit",function(event){
  event.preventDefault();
  $.ajax({
    url:"../actions/actions",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Submitting...').attr("disabled",true);
    },
    success:function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Upload Assignment').attr("disabled",false);
        $("#assignment_form")[0].reset();
        $("#server-response").html(data);
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