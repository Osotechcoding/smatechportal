<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Assignment Module</title>
   <!-- include template/HeaderLink.php -->
   <?php //include "template/HeaderLink.php";?>
   <?php include ("../template/dataTableHeaderLink.php"); ?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> Portal</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"><?php echo strtoupper($_SESSION['STAFF_ROLE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Assignment Module
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="bx bx-edit-alt fa-1x"> </span> Online Assignment Module</h3>
  </div>
    </div>
     
         <section id="form-repeater-wrapper">
  <!-- form default repeater -->
  <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="card-body">
        <div class="table-responsive">
      <table class="table table-striped table-bordered osotechDatatable">
        <thead class="text-center">
          <tr>
          <th width="10%">S/N</th>
          <th width="20%">Student </th>
          <th width="20%">Class</th>
          <th width="20%">Subject</th>
          <th width="10%">Assignment</th>
          <th width="10%">Score</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
      $all_submitted_ass = $Student->get_all_student_submitted_assignments_by_staffId($_SESSION['STAFF_SES_ID']);
      if ($all_submitted_ass) {
            $counter =0;
            foreach ($all_submitted_ass as $values) {
              $student_data = $Student->get_student_data_ByRegNo($values->stdRegno);
              $counter++;
              ?>
        <tr>
          <td><?php echo $counter;?></td>
          <td><span><?php echo $student_data->full_name;?></span></td>
          <td><?php echo $values->stdGrade;?></td>
           <td><span><?php echo $values->subject;?></span></td>
          <td><a class="dropdown-item text-warning" href="adownloader?fileId=<?php echo $values->aId;?>&assignment_file=<?php echo $values->answer;?>" style="text-decoration: none;"> <button type="button" class="btn btn-danger btn-md">Download</button></a></td>
          <td> <?php if ($values->score > 0): ?>
         <span class="badge badge-primary badge-md"><?php echo $values->score;?></span>
            <?php else: ?>
               <span class="badge badge-danger badge-md">Not Seen</span>
          <?php endif ?>
            
          </td>
          <td> <?php if ($values->status ==1): ?>
          <span class="badge badge-success badge-md">Seen</span></span>
            <?php else: ?>
              <button type="button" class="badge badge-dark badge-md award_mark_btn" data-teacher="<?php echo $values->tId;?>" data-id="<?php echo $values->aId;?>" data-subject="<?php echo $values->subject;?>" data-studentclass="<?php echo $values->stdGrade;?>" data-student="<?php echo $values->stdRegno;?>" title="Click to Award Mark"><span class="fa fa-edit"></span>Mark</button>
          <?php endif ?>
            
          </td>
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
  <!--/ form default repeater -->
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->
    <!-- END: Content-->
    </div>

    <!-- BUS MODAL Start -->
   <div class="modal fade" id="awardmarkForm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-edit fa-1x"></span>Mark Student Assignment</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="awardAssMarkForm">
                <div class="modal-body">
                 <div class="row">
                   <div class="col-md-6">
                    <input type="hidden" id="assIdd" name="assIdd">
                    <input type="hidden" id="Ssubject" name="subject">
                    <input type="hidden" id="Tteacher" name="teacher">
                     <div class="form-group">
                       <label for="">Student Admission No</label>
                       <input type="text" autocomplete="off" readonly id="student-reg-No" class="form-control" name="admNo">
                     </div>
                   </div>
                   <div class="col-md-6">
                    <input type="hidden" id="student_Class" name="studclass">
                     <div class="form-group">
                       <label for="">Mark Obtain</label>
                       <input type="number" autocomplete="off" class="form-control" name="mark_obtained" placeholder="Score">
                     </div>
                   </div>
                    <div class="col-md-12">
                     <div class="form-group">
                       <label for="remark">Remark</label>
                      <textarea name="rnote" class="form-control" placeholder="Write assignment Remark here..."></textarea>
                     </div>
                   </div>
                 </div>
                </div>
                <input type="hidden" name="action" value="submit_marked_student_ass">
              <input type="hidden" name="bypass" value="<?php echo md5('oiza1');?>">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                     Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Close
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php");?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->
<script>
  $(document).ready(function(){
//when update btn is clicked
$(".award_mark_btn").on("click",function(){
  let assId = $(this).data("id");
  let stdRegNo = $(this).data("student");
  let subject = $(this).data("subject");
  let teacher = $(this).data("teacher");
  let student_Class = $(this).data("studentclass");
  //let show update modal now
  $("#assIdd").val(assId);
  $("#Tteacher").val(teacher);
  $("#student_Class").val(student_Class);
  $("#Ssubject").val(subject);
  $("#student-reg-No").val(stdRegNo);
  $("#awardmarkForm").modal("show");
});
    //when the form is submtted
  const awardAssMarkForm = $("#awardAssMarkForm");
  awardAssMarkForm.on("submit",(event)=>{
  event.preventDefault();
   $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
   //send request
   $.post("../actions/update_actions",awardAssMarkForm.serialize(),function(data){
    setTimeout(()=>{
      $("#server-response").html(data);
      $(".__loadingBtn__").html('Submit').attr("disabled",false);
    },1000);
   })
  })

  })
</script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>