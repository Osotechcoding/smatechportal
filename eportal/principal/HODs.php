<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> ::  School Administratives</title>
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
                  <li class="breadcrumb-item active">H.O.Ds
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold">SCHOOL ADMINISTRATIVE MEMBERS</h3>
  </div>
</div>
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">ASSIGN SCHOOL ADMINISTRTORS</h4>
        </div>
        <div class="card-body">
         <div class="mb-2">
            <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#default">
           Add New Office
          </button>
         </div>
          <form class="form" id="assign_office_Form">
            <div class="form-body">
              <div class="row">
                <input type="hidden" name="action" value="assign_staff_office_now">
                 <div class="col-md-4 col-12">
                   <label for="csession">Staff Name</label>
                  <select name="staff_id" class="select2 form-control">
                    <option value="">Choose...</option>
                    <?php echo $Staff->show_staff_indropdown_list();?>
                  </select>
                </div>
                <div class="col-md-4 col-12">
                     <label for="Office">Assign Office</label>
                  <select name="Office" class="select2 form-control">
                    <option value="">Choose...</option>
                    <?php echo $Administration->get_office_InDropDown_list();?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="auth_pass">Authenication Passcode</label>
                  <input type="password" autocomplete="off" class="form-control" placeholder="Passcode" name="auth_pass">
                </div>
  <!-- daterange end -->
                </div>
                <div class="col-12 d-flex justify-content-end mt-2">
                <button type="submit" class="btn btn-primary btn-lg mr-1 __loadingBtn2__"><i class="bx bx-paper-plane"></i> Assign Now</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">STAFF OFFICE FOR THE <?php echo $activeSess->session_desc_name; ?> ACADEMIC SESSION </h4>
        </div>
        <div class="card-body card-dashboard">
         
          <div class="table-responsive">
            <table class="table osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>Staff</th>
                  <th>Qualification</th>
                  <th>Class</th>
                  <th>Position</th>
                  <th>Join Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $get_offices = $Administration->get_all_staff_office(); 
                if ($get_offices) {
                  foreach ($get_offices as $office) { 

                  $staff_data = $Staff->get_staff_ById($office->staff_id);
                    ?>
                    <tr>
                  <td><?php echo ucwords($staff_data->full_name);?></td>
                  <td><?php echo ucwords($staff_data->staffEducation);?></td>
                  <td><?php  if($staff_data->staffGrade !=NULL || $staff_data->staffGrade !=""){
                    echo strtoupper($staff_data->staffGrade);
                  }else{
                    echo '<span class="badge badge-warning badge-md">Not Assigned</span>';
                  }
                ?></td>
                  <td><?php echo ucfirst($office->office);?></td>
                  <td><?php echo date("l jS F, Y",strtotime($staff_data->appliedDate)) ?></td>
                  <td><div class="btn-group dropdown mr-1 mb-1">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,20">
              Options
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
             <a class="dropdown-item text-warning update_my_post" href="javascript:void(0);" data-id="<?php echo $office->id;?>" data-action="show_office_update_form"><span class="fa fa-edit"></span>&nbsp;Edit Office</a>
              <!--  -->
               <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash"></span>&nbsp; Remove From Office</a>
          
            </div>
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
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
          <!--Basic Modal -->
          <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                   <h3 class="text-center"><span class="fa fa-briefcase fa-1x"></span> Add New Office</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
               
               <form id="office_form">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
              
                <div class="col-md-12">
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                     <div class="form-group">
                  <label for="office">Office Desc</label>
                    <input type="text" name="office" id="office" class="form-control form-control-lg" placeholder="Principal">
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="office_status">Status</label>
                    <select name="office_status" id="office_status" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                    </div>
                  </div>
                  <input type="hidden" name="action" value="set_office">
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                    <span class="fa fa-paper-plane"></span> Submit</button>
                <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <i class="bx bx-power-off"></i>
                    Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
          <!-- End Modal -->

          <!-- Start Update Staff office Modal -->
          <div class="modal fade text-left" id="updateStaffOfficeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                   <h3 class="text-center"><span class="fa fa-briefcase fa-1x"></span> Update Office</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
               <form id="submit_update_staff_office_form">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12" id="shodw_office_details_modal">
                  </div>
                   <div class="col-md-12">
                  <label for="auth_pass2">Authenication Passcode</label>
                  <input type="password" class="form-control" placeholder="Passcode" name="auth_pass2">
                </div>
                  <input type="hidden" name="action" value="update_staff_office">
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1 __loadingBtn5__">
                    <span class="fa fa-paper-plane"></span> Save Change</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <i class="bx bx-power-off"></i>
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
      const OFFICE_FORM = $("#office_form");
      OFFICE_FORM.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
         $.post("../actions/actions",OFFICE_FORM.serialize(), function(data){
          setTimeout(()=>{
            $("#server-response").html(data);
             $(".__loadingBtn__").html('<span class="fa fa-paper-plane"></span> Submit').attr("disabled",false);
          },500);
         })
      
      });
      //
      const ASSIGN_OFFICE_FORM = $("#assign_office_Form");
      ASSIGN_OFFICE_FORM.on("submit", function(ev){
      ev.preventDefault();
      $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
         $.post("../actions/actions",ASSIGN_OFFICE_FORM.serialize(), function(data){
          setTimeout(()=>{
            $("#server-response").html(data);
             $(".__loadingBtn2__").html('<span class="fa fa-paper-plane"></span>Assign Now').attr("disabled",false);
          },500);
         })
      
      });
      //when an edit btn is clicked
      const update_my_post = $(".update_my_post");
      update_my_post.on("click", function(){
        let office_id = $(this).data('id');
        let action = $(this).data("action");
        $.post("../actions/update_actions",{action:action,office_id:office_id},function(result){
          $("#shodw_office_details_modal").html(result);
           $("#updateStaffOfficeModal").modal("show");
        });
       
      });

      //whenupdate form is submitted
       const UPDATE_OFFICE_FORM = $("#submit_update_staff_office_form");
      UPDATE_OFFICE_FORM.on("submit", function(ev){
      ev.preventDefault();
      $(".__loadingBtn5__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
         $.post("../actions/update_actions",UPDATE_OFFICE_FORM.serialize(), function(data){
          setTimeout(()=>{
            $("#server-response").html(data);
             $(".__loadingBtn5__").html('<span class="fa fa-paper-plane"></span>Save Change').attr("disabled",false);
          },500);
         })
      
      });
      
    })
  </script>
  </body>
  <!-- END: Body-->
</html>