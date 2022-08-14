<?php 
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Mass Student promotion </title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Student Promotion
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-graduation-cap fa-2x"></span> STUDENTS PROMOTIOM MODULE</h3>
  </div>
    </div>
    
      <div class="card">
        <div class="card-body">
          <div class="text-center mb-3">
            <h5><?php echo $Alert->alert_msg("Please Note that Promotion should be done from Upper class to lower class : e.g SSS 3 down to JSS 1!","warning");?></h5>
          </div>
          <div class="users-list-filter px-1">
        <form action="" method="post">
           <div class="row border rounded py-2 mb-2">
                 <div class="col-12 col-md-4 col-sm-6 col-lg-4">
                  <label for="users-list-verified">Student Current Class</label>
                  <fieldset class="form-group">
                    <select name="student_class" class="form-control select2" id="users-list-verified">
                           <option value="">Choose...</option>
                           <?php echo $Administration->get_classroom_InDropDown_list();?>
                           <option value="Graduated">Graduated</option>
                        </select>
                   </fieldset>
               </div>
           <div class="col-12 col-md-4 col-sm-6 col-lg-4">
                  <label for="users-list-role"> Status</label>
                    <fieldset class="form-group">
                        <select name="student_status" class="form-control" id="users-list-role">
                            <option value="">Choose...</option>
                            <option value="Pending">Pending</option>
                            <option value="Active" selected>Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Expelled">Expelled</option>
                            <option value="Transfered">Transfered</option>
                            <option value="Graduated">Graduated</option>
                            <option value="Left">Left</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-md-4 col-sm-6 col-lg-4 d-flex align-items-center">
                    <button type="submit" name="filter-btn" value="show_list_of_students" class="btn btn-dark btn-block btn-lg glow mb-1">Show Students List</button>
                </div>
            </div>
        </form>
    </div>
        </div>
      </div>
       <!-- Revenue Growth Chart Starts -->
       <?php if (isset($_POST['filter-btn']) && $_POST['filter-btn']!=""): ?>
         <?php if (empty($_POST['student_class'])) {
          echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Fliter Class is required!","danger").'
          </div>';
         }elseif (empty($_POST['student_status'])) {
           echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Students Status is Required!","danger").'
          </div>';
         }else{
          $student_class = $Configuration->Clean($_POST['student_class']);
          $student_status = $Configuration->Clean($_POST['student_status']);
          $promotion_lists =$Student->get_filtered_students_list($student_class,$student_status);
          if ($promotion_lists) {
            $count=0;
            ?>
            <div class="card">
      <div class="card-body">
        <form id="student_promotion_form">
         <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="text-center bg-default">
          <tr>
            
            <th>S/N</th>
          <th>PASSPORT</th>
          <th>FULLNAME</th>
          <th>PRESENT CLASS</th>
          <th>STATUS</th>
          <th><input type="checkbox" id="checkAll" class="form-check-input"> </th>
        </tr>
      </thead>
        <tbody class="text-center">
         <?php foreach ($promotion_lists as $promotion): ?>
          <?php $count++; ?>
           <tr>
            <td><?php echo $count;?> </td>
             <td><?php if ($promotion->stdPassport==NULL || $promotion->stdPassport==""): ?>
    <?php if ($promotion->stdGender == "Male"): ?>
      <img src="../schoolImages/students/male.png" width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
      <?php else: ?>
        <img src="../schoolImages/students/female.png" width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
    <?php endif ?>
      <?php else: ?>
        <img src="../schoolImages/students/<?php echo $promotion->stdPassport;?>" width="80" alt="photo" style="border-radius: 10px;border: 3px solid darkblue;">
    <?php endif ?></td>
    <td><?php echo strtoupper($promotion->full_name);?></td>
    <td><?php echo strtoupper($promotion->studentClass);?></td>
    <td><span class="badge badge-success badge-md badge-pill"><?php echo strtoupper($promotion->stdAdmStatus);?></span></td>
    <td><input type="checkbox" name="marked[]" class="form-check-input checkItem" value="<?php echo $promotion->stdId;?>"></td>
           </tr>
         <?php endforeach ?>
      </tbody>
      </table>
      <div class="row">
        <div class="col-md-6">
        <div class="form-group">
          <label for="promoted_to">PROMOTED TO</label>
          <select name="promoted_to" id="promoted_to" class="form-control select2">
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_classroom_InDropDown_list();?>
            <option value="Graduated">Graduated</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="Auth">PROMOTION CODE</label>
         <input type="password" autocomplete="off" class="form-control" name="Auth" placeholder="*********">
        </div>
      </div>
      </div>
      <input type="hidden" name="action" value="promote_bulk_students">
      <button type="submit" class="btn btn-dark btn-lg btn-round float-right mb-3 __loadingBtn__">Submit</button>
    </div>
    </form>
      </div>
    </div>
            <?php
          }else{
             echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("No Result Found!, Please try again","danger").'
          </div>';
          }
         } ?>
       <?php endif ?>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <script>
     $(document).ready(function(){
      $("#checkAll").on("click", function(){
        if ($(this).is(":checked")) {
          $(".checkItem").prop('checked', true);
        }else{
          $(".checkItem").prop('checked', false);
        }
      });

const STD_PROMOTION_FORM = $("#student_promotion_form");
     STD_PROMOTION_FORM.on("submit", function(event){
      event.preventDefault();
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);

      $.post("../actions/update_actions",STD_PROMOTION_FORM.serialize(),function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
         $("#server-response").html(data);
      },500);
     })
     })

     });
   </script>
  </body>
  <!-- END: Body-->
</html>