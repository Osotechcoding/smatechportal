<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Mamage School Prefects</title>
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
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">School Prefects
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-graduation-cap"></span> SCHOOL PREFECTS</h3>
  </div>
</div>
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">ASSIGN SCHOOL PREFECTS</h4>
        </div>
        <div class="card-body">
          <form class="form" id="student_office_form">
            <div class="form-body">
              <div class="row">
                 <div class="col-md-5 col-12">
                   <label for="prefect_id">Student Name</label>
                  <select name="student_uniq_id" id="prefect_id" class="select2 form-control">
                    <option value="" selected>Choose...</option>
                    <?php echo $Student->get_students_InDropDown();?>
                  </select>
                </div>
                <div class="col-md-4 col-12">
                     <label for="student_office_name">Assign Office</label>
                  <select name="student_office_name" class="select2 form-control">
                    <option value="" selected>Choose...</option>
                   <?php echo $Administration->get_student_office_title_inDropDown(); ?>
                  </select>
                </div>
                <div class="col-md-3 col-12">
                     <label for="auth_pass">Authentication Code</label>
                  <input type="password" class="form-control" placeholder="Authentication Code" name="auth_pass">
                </div>
  <!-- daterange end -->
                </div>
                <!--   -->
                <input type="hidden" name="action" value="assign_school_prefects">
                <input type="hidden" name="school_session" value="<?php echo $activeSess->session_desc_name;?>">
                <div class="col-12 d-flex justify-content-end mt-2">
                  <button type="submit" class="btn btn-dark btn-lg mr-1 __loadingBtn2__"> Submit</button>
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
          <h4 class="text-center">STUDENT OFFICE FOR THE <?php echo $activeSess->session_desc_name;?> ACADEMIC SESSION </h4>
        </div>
        <div class="card-body card-dashboard">
         
          <div class="table-responsive">
            <table class="table osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>Student</th>
                  <th>Class</th>
                  <th>Office Title</th>
                  <th>Regime</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
                $get_all_active_prefect_list = $Student->get_all_prefect_list();
                if ($get_all_active_prefect_list) {
                  //$cnt =0;
                  foreach ($get_all_active_prefect_list as $value) {
                   // $cnt++;
                    $student_data = $Student->get_student_data_byId($value->student_id);
                    ?>
                    <tr>
                  <td><?php echo strtoupper($student_data->full_name);?></td>
                  <td><?php echo $value->studentGrade;?></td>
                  <td><?php echo ucwords($value->officeName);?></td>
                  <td><?php echo $value->school_session;?></td>
                <td><div class="btn-group dropdown mr-1 mb-1">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,20">
              Options
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
             <a class="dropdown-item text-warning show_update_form_btn" href="javascript:void(0);" data-prefect="<?php echo $value->prefectId;?>" data-action="show_update_student_office_modal"><span class="fa fa-edit"></span>&nbsp;Edit Office</a>
              <!--  -->
               <a class="dropdown-item text-danger remove_student_from_office_btn" data-id="<?php echo $value->prefectId;?>" data-action="remove_student_from_office" href="javascript:void(0);"><span class="fa fa-trash"></span>&nbsp; Remove From Office</a>
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
    </div>
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
               
               <form id="_update_student_offi_">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row" id="prefect_details_form">
                 </div>
                 <div class="col-md-12">
                     <div class="form-group">
                  <label for="updated_office">Change Office To</label>
                    <select name="updated_office" id="updated_office" class="select2 form-control form-control-lg">
                      <option value="" selected>Choose...</option>
                       <?php echo $Administration->get_student_office_title_inDropDown(); ?>
                    </select>
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="passcode">Authentication Code</label>
                    <input type="password" name="passcode" id="passcode" class="form-control" placeholder="********">
                    </div>
                  </div>
                  <input type="hidden" name="action" value="update_student_office">

                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn5__">
                     Save Change</button>
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
      const ADD_STUDENT_OFFICE_FORM =$("#student_office_form");
      ADD_STUDENT_OFFICE_FORM.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../actions/actions",ADD_STUDENT_OFFICE_FORM.serialize(),function(res){
        setTimeout(()=>{
          $(".__loadingBtn2__").html('Submit').attr("disabled",false);
          $("#server-response").html(res);
        },500);
      })
      });

      //when remove from office btn is clicked
      const remove_office_btn = $(".remove_student_from_office_btn");
      remove_office_btn.on("click", function(){
        let prefect_id = $(this).data("id");
        let action = $(this).data("action");
        let is_true = confirm("Are sure you want to Remove this Student from office?");
        if (is_true) {
          // send request
          $.post("../actions/delete_actions",{
            action:action,prefect_id:prefect_id},function(data){
            setTimeout(()=>{
              console.log(data);
              $("#server-response").html(data);
            },200);
          })
        }else{
          return false;
        } 
        
      });

      //update prefect
      //when remove from office btn is clicked
      const update_prefect_btn = $(".show_update_form_btn");
      update_prefect_btn.on("click", function(){
        let prefect = $(this).data("prefect");
        let action = $(this).data("action");
      $.post("../actions/update_actions",{
            action:action,prefect_id:prefect},function(result){
            setTimeout(()=>{
              $("#prefect_details_form").html(result);
              $("#updateStudentOfficeModal").modal("show");
            },200);
          })
      });

      //_update_student_offi_
       const _update_student_offi_ = $("#_update_student_offi_");
      _update_student_offi_.on("submit", function(e){
      e.preventDefault();
       $(".__loadingBtn5__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../actions/update_actions",_update_student_offi_.serialize(),function(res){
            setTimeout(()=>{
               $(".__loadingBtn5__").html('Save Changes').attr("disabled",false);
              $("#server-response").html(res);
            },1500);
          })
      });
    })
  </script>
  </body>
  <!-- END: Body-->

</html>