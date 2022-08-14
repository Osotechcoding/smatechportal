<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Mamage School Prefects</title>
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
                  <li class="breadcrumb-item active">School Prefects Titles
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-graduation-cap"></span> SCHOOL PREFECTS TITLES</h3>
  </div>
</div>

<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
      
        <div class="card-body card-dashboard">
          <button type="button" class="btn btn-dark block" data-toggle="modal" data-target="#prefectModal">
          <span class="fa fa-plus fa-1x"></span>
          </button>
          <div class="table-responsive">
            <table class="table osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>S/N</th>
                  <th>Office Title</th>
                  <th> Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
                $get_all_office_title = $Administration->get_office_all_students_office_title();
                if ($get_all_office_title) {
                  // show all title
                  $cnt =0;
                  foreach ($get_all_office_title as $value) {
                    $cnt++;
                    ?>
                    <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo strtoupper($value->title);?></td>
                  <td> <?php if ($value->status =="Active"): ?>
                    <span class="badge badge-success badge-md">Active</span>
                  <?php else: ?>
                    <span class="badge badge-warning badge-md">Inactive</span>
                  <?php endif ?> </td>
                <td><div class="btn-group dropdown mr-1 mb-1">
            <button type="button" data-action="show_office_title_update_modal" data-id="<?php echo $value->id;?>" class="btn btn-secondary edit_office_btn">
              <span class="fa fa-edit"></span>&nbsp;Edit
            </button>
          </div></td>
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
<!-- widget chat demo ends -->
    </div>
          <!--Basic Modal -->
          <div class="modal fade text-left" id="prefectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                   <h3 class="text-center"><span class="fa fa-briefcase fa-1x"></span> Add Prefect Office</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
               
               <form id="add_student_office_form">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
              
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="office">Office Desc</label>
                    <input type="text" name="office_title" id="office" class="form-control form-control-lg" placeholder="Head Boy">
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="status">Status</label>
                    <select name="office_status" id="status" class="form-control">
                      <option value="">Choose...</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                    </div>
                  </div>
                  <input type="hidden" name="action" value="add_student_office">
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1 __loadingBtn__">
                     Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="bx bx-power-off"></span>
                    Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
          <!-- End Modal -->

          <!-- Start Update Staff office Modal -->
          <!--Basic Modal -->
          <div class="modal fade text-left" id="updateStudentOfficeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                   <h3 class="text-center"><span class="fa fa-briefcase fa-1x"></span> Update Office</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
               
               <form id="updatefofficeform">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row" id="office_title_details">
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="action" value="update_student_office_title">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn4__">
                    <span class="fa fa-paper-plane"></span> Save Changes</button>
                <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="bx bx-power-off"></span>
                    Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
          <!-- End Update Staff office Modal -->
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
  <script>
    $(document).ready(function(){

      //when update office title is clicked
      const edit_office_btn = $(".edit_office_btn");
      edit_office_btn.on("click", function(){
        let office_id = $(this).data("id");
        let office_action = $(this).data("action");
        $.post("../actions/update_actions",{action:office_action,office_id:office_id}, function(data){
          setTimeout(()=>{
            $("#office_title_details").html(data);
            $("#updateStudentOfficeModal").modal("show");
          },200);
        });
      })

      //when the update form is submitted
      const UPDATE_OFFICE_TITLE_FORM = $("#updatefofficeform");
UPDATE_OFFICE_TITLE_FORM.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn4__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../actions/update_actions",UPDATE_OFFICE_TITLE_FORM.serialize(),function(res){
        setTimeout(()=>{
          $(".__loadingBtn4__").html('Save Changes').attr("disabled",false);
          $("#server-response").html(res);
        },500);
      })
      });

      const ADD_STUDENT_OFFICE_FORM =$("#add_student_office_form");
      ADD_STUDENT_OFFICE_FORM.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../actions/actions",ADD_STUDENT_OFFICE_FORM.serialize(),function(res){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Submit').attr("disabled",false);
          $("#server-response").html(res);
        },500);
      })
      });
    })
  </script>
  </body>
  <!-- END: Body-->

</html>