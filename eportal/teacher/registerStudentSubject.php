<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Student Subject Registration</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active"> Subjects Offered
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-book fa-1x"></span> STUDENT EXAM SUBJECTS</h3>
  </div>
          </div>
          <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Subjects</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_subjects();?></h2>
                </div>
              </div>
            </div>
           
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Active </h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_subjects_status("active"); ?></h2>
                </div>
              </div>
            </div>
            <?php if ($staff_data->staffGrade!="" || $staff_data->staffGrade !=NULL): ?>
              <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Registered </h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_registered_subjects_class($staff_assigned_class); ?></h2>
                </div>
              </div>
            </div>
            <?php endif ?>
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
      
    <div class="card">
     
      <div class="card-body">
        <!-- filter student -->
       
      <!-- filter student ends -->
        <div class="col-md-12 text-center" id="delete_response"></div>
        <div class="table-responsive">
      <table class="table table-hover table-bordered table-striped">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>Subject Class</th>
          <th>Subject Name</th>
          <th>Registered At</th>
          
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
$regiestered_subejcts = $Administration->get_all_registered_subejcts($staff_data->staffGrade);
if ($regiestered_subejcts) {
  // code...
  $cnt =0;
  foreach ($regiestered_subejcts as $allSubject) { 
    $cnt++;
    ?>
    <tr>
<td><?php echo $cnt;?></td>
<td><?php echo strtoupper($staff_data->staffGrade);?></td>
<td><?php echo ucwords($allSubject->subject_name);?></td>
<td><?php echo date("l jS F Y",strtotime($allSubject->created_at));?></td>
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
    </div>
    <!-- END: Content-->
    </div>


  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
   <script>
     $(document).ready(function(){
    //when unregister btn is clicked
    const remove_sub_btn = $(".remove_sub_btn");
    remove_sub_btn.on("click", function(){
      let theId = $(this).data("id");
      let subject = $(this).data("value");
      let action = 'unregistered_exam_subject_now';
      var is_true = confirm("Are you Sure you really want to unregister this Subject?");
      if (is_true) {
        $(".__loadingBtn__"+theId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/actions",{action:action,theId:theId,subId:subject},function(data){
          setTimeout(()=>{
            $(".__loadingBtn__"+theId).html("<i class='far fa-trash-alt'></i> Unregister").attr("disabled",false);
            $(".server-response").html(data);
          },1000);
        });
      }else{
        return false;
      }
    })

      $(".osotechDatatable").DataTable();
      //when an update btn is clicked
      $("#subject_register_form").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn__2").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const subject_register_form = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",subject_register_form,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__2").html('Register Subject').attr("disabled",false);
        $("#result-responseText").html(data);
          },1000);
        })
      });
     })
   </script>
  </body>
  <!-- END: Body-->
</html>