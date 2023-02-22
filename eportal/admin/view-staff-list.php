<?php 
require_once "helpers/helper.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> - Staff List </title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['ADMIN_SES_TYPE'];?></a>
                  </li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0);" onclick="window.location.href='./';" class="text-danger text-bold-700">Go to Dashboard</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold mb-5"><span class="fa fa-laptop fa-1x"></span> List of Staff</h3>
  </div>
    </div>
   <div class="card">
     <div class="card-body">
     
        <!-- Statistics Cards Starts -->
        <div class="row">

          <div class="col-xl-12 col-md-12">
            <div class="row">

              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-info">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Male Staff</h3>
                    </div>
                    <h2 class="text-white mb-0"> <?php echo $Staff->count_staff_by_gender("Male"); ?></h2>

                  </div>
                </div>
              </div>

              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-danger">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Female Staff</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Staff->count_staff_by_gender("Female"); ?></h2>

                  </div>
                </div>
              </div>
              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-dark">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white">Total Staff</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Staff->count_all_staff(); ?></h2>

                  </div>
                </div>
              </div>


            </div>
          </div>

        </div>
        <div class="row">
          <?php 
          $getTeachers = $Staff->get_all_staff();
          if ($getTeachers) {
            $cnt = 0;
             foreach ($getTeachers as $teacher) {
              $cnt++;
$Passport = $Staff->displayStaffPassport($teacher->staffPassport,$teacher->staffGender);
              ?>
               <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark" style="border-radius:20px;">
                
                <div class="card-body py-1">
                 <div class="mb-1">
                   <?php   

                   if ($teacher->staffType == "Teaching") {
                    echo '<span class="badge badge-success badge-pill">'.$teacher->staffType.' Staff</span>';
                   }else{
                    echo '<span class="badge badge-warning badge-pill">'.$teacher->staffType.' Staff</span>';
                   } ?>
                 </div>
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                <h3 class="bd-lead text-primary text-bold">
                  <img class="img-fluid" style="border-radius:50%;" src="<?php echo $Passport; ?>" width="250"></h3>
                  </div>
                <div class="text-white line-ellipsis"><?php echo ucwords($teacher->full_name);?></div>
                <h5><?php 
                if ($teacher->staffRole == NULL || $teacher->staffRole == "") {
                   echo '<span class="badge badge-danger badge-pill"> NOT ASSIGNED</span>';
                }else{
                   echo '<span class="badge badge-primary badge-pill">'.$teacher->staffRole.'</span>';
                }
                
                 ?> </h5>
                 
                  <h6 class="mb-0 text-white"><?php echo $teacher->staffEmail; ?></h6>
                  <h6 class="mb-1 text-white"> <span class="badge badge-primary badge-pill"><?php echo $teacher->staffRegNo; ?></span></h6>

                </div>
                 <div class="card-footer">
      <div class="btn-group dropdown mb-0">
            <button type="button" class="btn btn-warning">Actions</button>
            <button type="button" class="btn btn-outline-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-primary" href="editstaffinfo?record-id=<?php echo $Configuration->convert_String('code', $teacher->staffId); ?>&action=view-staff-record&viewer=<?php echo $Configuration->convert_String('code', 'admin'); ?>"><button type="button" class="badge badge-info">
                  <span class="fa fa-edit"></span> Edit Information</button>  </a>
              <?php if ($teacher->staffPassport == NULL || $teacher->staffPassport ==""): ?>
                <a class="dropdown-item text-info" href="./uploadstaffpassport?staffRegId=<?php echo $teacher->staffRegNo; ?>&actionId=<?php echo $teacher->staffId; ?>">
                  <button type="button" class="badge badge-dark">
                  <span class="fa fa-camera"></span> Upload Passport</button>
                </a>

              <?php endif ?>
            </div>
          </div>

    </div>
     
    
              </div>
            </div>
              <?php
             }
           } ?>
    </div>
     </div>
   </div>
   
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
       <script>
  $(document).ready(function() {
    $("#users-list-datatable").DataTable();
    //remove action
    $(".remove_staff_btn").on("click", function() {
      const staffId = $(this).data("staff");
      const action = $(this).data("action");

      isTrue = confirm(
        "Are you sure, you want to remove this staff from your database? there is no undo after this action!");
      if (isTrue) {
        $(".__loadingBtn__" + staffId).html(
            '<img src="../assets/loaders/rolling_loader.svg" width="20">')
          .attr("disabled", true);
        //send delete request
        // console.log(staffId, action)
        $.post("../actions/delete_actions", {
          staff_Id: staffId,
          action: action
        }, function(res) {
          setTimeout(() => {
            $(".remove_staff_btn").html(
                'Remove')
              .attr("disabled", false);
            $("#server-response").html(res);
          }, 1000);
        })
      } else {
        return;
      }
    })
  })
  </script>
  </body>
  <!-- END: Body-->
</html>