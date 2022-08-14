<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Duty </title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->

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
                  <li class="breadcrumb-item active">My Assigned Duty
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold">MY ASSIGNED WEEKLY DUTIES</h3>
  </div>
</div>

<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header">
          <h4 class="text-center">MY DUTIES FOR THE <?php echo $activeSess->session_desc_name;?> ACADEMIC SESSION </h4>
        </div>
        <div class="card-body card-dashboard">
          
          <div class="text-center col-md-12 mt-1" id="response2"></div>
          <div class="table-responsive">
            <table class="table osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>Duty Desc</th>
                  <th>Week</th>
                  <th>Term</th>
                  <th>Instruction</th>
                </tr>
              </thead>
              <tbody class="text-center">
            <?php 
            $get_all_duties = $Administration->get_all_assigned_staff_weekly_duty();
            if ($get_all_duties) {
              foreach ($get_all_duties as $duties) {?>
                <tr>
                  <td><?php echo ucwords($duties->duty);?></td>
                  <td><?php echo ($duties->duty_week);?></td>
                  <td><?php echo ($duties->term) ?></td>
                   <td> <button type="button" class="btn btn-warning block view_btn" data-value="<?php echo $duties->message;?>">Read</button></td>
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
<!--/ Zero configuration table -->

        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
          <!--Basic Modal -->
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
                  <p class="mb-0" id="duty_details"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                  Close
                  </button>
                </div>
              </div>
            </div>
          </div>

    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
  <script>
    $(document).ready(function(){
     // Start of Read Info 
      const view_btn = $(".view_btn");
  view_btn.on("click", function(){
     let instruction = $(this).data("value");
     //let title = $(this).data("title");
      $("#duty_details").html(instruction);
      //$("#subTitle").html(title);
    $("#ReadInstructModal").modal("show");
  })
     // End of Read Info 
      
    })
  </script>
  </body>
  <!-- END: Body-->

</html>