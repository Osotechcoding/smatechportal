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

                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-book fa-1x"></span> MASS SUBJECT REGISTRATION</h3>
  </div>
    </div>

      <div class="card">

        <div class="card-body">
          <div class="text-center mb-3">
            <h5><?php echo $Alert->alert_msg("Please note that Only an active subjects can be registered!","info");?></h5>
          </div>
          <div class="users-list-filter px-1">
        <form action="" method="post">
           <div class="row border rounded py-2 mb-2">
           <div class="col-12 col-md-6 col-sm-12 col-lg-6">
                  <label for="users-list-role">SUBJECT STATUS </label>
                    <fieldset class="form-group">
                        <select name="subject_status" class="form-control" id="users-list-role">
                            <option value="active" selected>Active</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-md-6 col-sm-12 col-lg-6 d-flex align-items-center">
                  <label for="">Click to show Subjects</label>
                    <button type="submit" name="filter-btnx" value="show_list_of_subject" class="btn btn-dark btn-block btn-lg glow mb-1">Show Subjects</button>
                </div>
            </div>
        </form>
    </div>
        </div>
      </div>
       <!-- Revenue Growth Chart Starts -->
       <?php if (isset($_POST['filter-btnx']) && $_POST['filter-btnx']!=""): ?>
         <?php if (empty($_POST['subject_status'])) {
           echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Subject Status is Required!","danger").'
          </div>';
         }else{
          $status = $Configuration->Clean($_POST['subject_status']);
          $subject_lists =$Administration->get_all_subjects_by_status($status);
          if ($subject_lists) {
            $count=0;
            ?>
            <div class="card">
      <div class="card-body">
        <form id="bulk_subject_form">
         <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="text-center bg-default">
          <tr>

            <th>S/N</th>
          <th>SUBJECT CODE</th>
          <th>STATUS</th>
          <th>SUBJECT NAME</th>
           <th>Add Subject<!-- <input type="checkbox" id="checkAll" class="form-check-input"> --> </th>
        </tr>
      </thead>
        <tbody class="text-center">
         <?php foreach ($subject_lists as $subject): ?>
          <?php $count++; ?>
           <tr>
            <td><?php echo $count;?> </td>
    <td><?php echo strtoupper($subject->subject_code);?></td>
    <td><span class="badge badge-success badge-md badge-pill"><?php echo strtoupper($subject->status);?></span></td>
    <td><?php echo strtoupper($subject->subject_desc);?></td>
    <td><input type="checkbox" name="subject_arr[]" class="form-control-check form-check-input checkItem" value="<?php echo $subject->subject_desc;?>"></td>
           </tr>
         <?php endforeach;?>
      </tbody>
      </table>
      <div class="row">
        <div class="col-md-6">
        <div class="form-group">
          <label for="student_class">REGISTER SELECTED SUBJECTS FOR </label>
          <select name="student_class" id="student_class" class="form-control select2">
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_classroom_InDropDown_list();?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="Auth">AUTHENTICATION CODE</label>
         <input type="password" autocomplete="off" class="form-control" name="authcode" placeholder="*********">
        </div>
      </div>
      </div>
      <input type="hidden" name="action" value="submit_bulk_subject_reg">
      <button type="submit" class="btn btn-dark btn-lg btn-round float-right mb-3 __loadingBtn__">REGISTER</button>
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
      // $("#checkAll").on("click", function(){
      //   if ($(this).is(":checked")) {
      //     $(".checkItem").prop('checked', true);
      //   }else{
      //     $(".checkItem").prop('checked', false);
      //   }
      // });

const BULK_SUBJECT_FORM = $("#bulk_subject_form");
     BULK_SUBJECT_FORM.on("submit", function(event){
      event.preventDefault();
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);

      $.post("../actions/actions",BULK_SUBJECT_FORM.serialize(),function(data){
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
