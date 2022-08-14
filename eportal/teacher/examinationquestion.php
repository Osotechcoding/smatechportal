<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Upload Exam Question</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']) ?> </a>
                  </li>
                  <li class="breadcrumb-item active"> Submit Examination Question
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-image fa-1x"></span> SCHOOL EXAMINATION MODULE</h3>
  </div>
          </div>
          
           <!-- Revenue Growth Chart Starts -->
    <div class="card">
      <div class="card-header">
          <button type="button" class="btn btn-dark btn-lg btn-rounded" data-toggle="modal" data-target="#uploadExamModal"><span class="fa fa-camera fa-1x"></span> Upload Exam Question</button>
        </div>
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-bordered">
        <thead class="text-center">
          <tr>
          <th>TEACHER</th>
          <th>SUBJECT</th>
          <th>CLASS</th>
          <th>Submitted At</th>
         
        </tr>
      </thead>
        <tbody class="text-center">
            <?php 
              $all_exam_questions = $Administration->getAllUploadedExamQuestionsStaffId($_SESSION['STAFF_SES_ID']);
                if ($all_exam_questions) {
                  foreach ($all_exam_questions as $question) {
                    $staff_data = $Staff->get_staff_ById($question->teacherId);
                    ?>
          <tr>
            <td><?php echo ucwords($staff_data->full_name);?></td>
          <td><?php echo ucwords($question->subject);?></td>
          <td><?php echo ucfirst($question->exam_class);?></td>
          <td><?php echo date("l jS F, Y",strtotime($question->created_at));?></td>
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
    </div>
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="uploadExamModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-camera fa-1x"></span> SUBMIT EXAM QUESTION</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="examQuestionModalForm" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                    <div class="col-md-12">
                     <div class="form-group">
                  <label for="examClass"> Exam Class </label>
                <select name="examClass" id="examClass" class="form-control form-control-lg select2">
                  <option value="" selected>Choose...</option>
               <?php echo $Administration->get_classroom_InDropDown_list();?>
               </select>
                </div>
              </div>
              <div class="col-md-12">
                     <div class="form-group">
                  <label for="subject"> Exam Subject </label>
                <select name="subject" id="subject" class="form-control form-control-lg select2">
                  <option value="" selected>Choose...</option>
               <?php echo $Administration->get_all_subjects_InDropDown_list();?>
               </select>
                </div>
              </div>
                    <div class="col-md-12">
                     <div class="form-group">
                  <label for="examfile">Exam Question <span class="text-danger">(docx(msword)format Only; Max Size 200KB)</span></label>
                <input type="file" class="form-control form-control-lg" id="examfile" name="examfile">
                <input type="hidden" class="form-control form-control-lg" name="teacher_id" value="<?php echo $staff_data->staffId;?>" readonly>
                    </div>
                    
                  </div>
             
               
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="action" value="upload_examQuestion_now">
                 <input type="hidden" name="term" value="<?php echo $activeSess->term_desc ?>">
                  <input type="hidden" name="school_session" value="<?php echo $activeSess->session_desc_name;?>">
                   <button type="submit" class="btn btn-dark ml-1 btn-lg __loadingBtn__">
                    Submit</button>
                 <button type="button" class="btn btn-danger ml-1 btn-lg" data-dismiss="modal">
                    <span class="fa fa-power-off"> Close</span>
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->

    
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php"); ?>
  
   <script>
     $(document).ready(function(){
      //when the delete gallery btn is clicked
      const delete_gallery = $(".delete_gallery_btn");
      delete_gallery.on("click", function(){
        let tId = $(this).data("id");
        let action = 'delete_gallery';
         let is_true = confirm("Are you Sure you want to Remove this Image?");
      if (is_true) {
        $(".__loadingBtn2__"+tId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,tId:tId},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+tId).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
//when view btn is clicked
     $("#examQuestionModalForm").on("submit",function(event){
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
         $(".__loadingBtn__").html('Submit').attr("disabled",false);
        //$("#addNewGalleryModalForm")[0].reset();
        $("#server-response").html(data);
       // alert(data);
      },500);
    }

  });
})
     })
   </script>
  </body>
  <!-- END: Body-->

</html>