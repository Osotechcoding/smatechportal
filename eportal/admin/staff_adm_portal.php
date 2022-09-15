<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Staff Admission Portal</title>
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
  <!--  -->
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Staff Admission Portal
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
      <div class="row">
 <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-user-plus fa-2x"></span> STAFF ADMISSION PORTAL</h3>
  </div>

</div>
<div class="text-center ml-2"> <?php include("template/admBtnLink.php");?></div>
<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Email| Phone</th>
                  <th>Job Desc</th>
                  <th>Cover Letter</th>
                  <th>Date</th>
                  <th>Resume</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $allResume = $Administration->getAllStaffResumeApplicationForm();
                if ($allResume) {
                  foreach ($allResume as $resume) {
                    ?>
               <tr>
                  <td><?php echo strtoupper($resume->applicant_name);?></td>
                  <td><?php echo $resume->applicant_email;?> <br> <?php echo $resume->phone_number;?></td>
                  <td><?php echo ucwords($resume->jobType);?></td>
                  <td><span class="badge badge-pill badge-dark view_cover_letter_btn" data-detail="<?php echo $resume->cover_letter; ?>" style="cursor: pointer;">Read</span></td>
                  <td><?php echo date("l jS M, Y",strtotime($resume->application_date));?></td>
                  <td> <a href="../resume/<?php echo $resume->uploaded_cv;?>" target="_blank"><button class="badge badge-pill badge-info badge-md" >Download CV</button></a> 
                 </td>
                 <td><button type="button" class="btn btn-danger btn-sm delete_resume_btn __loadingBtn2__<?php echo $resume->job_portal_id;?>" data-id="<?php echo $resume->job_portal_id;?>">Delete</button></td>
                </tr>

                    <?php
                  }
                 } ?>
               
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
    <!--Basic Modal -->
          <div class="modal fade text-left" id="readCoverLetterModalCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Applicant Cover Letter</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0" id="readCoverLetter">
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
  <?php include_once ("Links/adm_button_links.js.php") ?>
  <script>
    $(document).ready(function() {
       const delete_resume = $(".delete_resume_btn");
      delete_resume.on("click", function(){
        let tId = $(this).data("id");
        let action = 'delete_applicant_resume_cv';
         let is_true = confirm("Are you Sure you want to delete this Resume Permanently?");
      if (is_true) {
        $(".__loadingBtn2__"+tId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
        //send request
        $.post("../actions/delete_actions",{action:action,resumeId:tId},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+tId).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
      //when a Read Note btn is clicked
         const view_coverLetterBtn = $(".view_cover_letter_btn");
  view_coverLetterBtn.on("click", function(){
     let coverLetter = $(this).data("detail");
      $("#readCoverLetter").html(coverLetter);
    $("#readCoverLetterModalCard").modal("show");
  })
    })
  </script>
  </body>
  <!-- END: Body-->

</html>