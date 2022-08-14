<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>SUBJECTS MANAGEMENT - VISAP</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->../
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
              <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">School Subjects
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-book fa-2x"></span> SCHOOL SUBJECT</h3>
  </div>
          </div>
          <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">All Subjects</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_subjects(); ?></h2>
                </div>
              </div>
            </div>
           
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Active Subjects</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_subjects_status("active"); ?></h2>
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Inactive Subjects </h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_subjects_status("inactive"); ?></h2>
                  
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
      
    <div class="card">
      <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-rounded" data-toggle="modal" data-target="#addSubjectModal"><i class="fa fa-book fa-2x"></i> Add New Subject</button>
        </div>
      <div class="card-body">
        <div class="col-md-12 text-center" id="delete_response"></div>
        <div class="table-responsive">
      <table class="table osotechDatatable table-hover table-bordered table-striped">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th> CODE</th>
          <th>SUBJECT NAME</th>
          <th>TEACHER</th>
          <th>STATUS</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
          $all_subjects =$Administration->get_all_subjects();
          if ($all_subjects) {
            // code...
            $cnt =0;
            foreach ($all_subjects as $subjects) {
              // code...
              $cnt++;
              ?>
              <tr>
          <td><?php echo $cnt; ?></td>
          <td><?php echo $subjects->subject_code; ?></td>
          <td><?php echo strtoupper($subjects->subject_desc); ?></td>
          <td><?php if ($subjects->subject_teacher ==NULL): ?>
          <span class="badge badge-warning badge-md">Not Assigned</span>
            <?php else: ?>
          <?php endif ?></td>
           <td><?php if ($subjects->status ==NULL || $subjects->status =='inactive'): ?>
          <span class="badge badge-danger badge-md">Not Active</span>
            <?php else: ?>
               <span class="badge badge-success badge-md"> Active</span>
          <?php endif ?></td>
         <td>   <div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-secondary">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-info update_btn" data-id="<?php echo $subjects->subject_id;?>" href="javascript:void(0);"><span class="fa fa-edit"></span> Update </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger delete_btn" data-action="delete_subject_now" data-id="<?php echo $subjects->subject_id;?>" href="javascript:void(0);"> Delete</a>
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
    </div>
    <!-- END: Content-->
    </div>
   
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-book fa-2x"></i> Add New Subject</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="col-md-12 text-center mt-2" id="result-response"></div>
                 <form id="createSubjectForm">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="route_name">SUBJECT NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="subjectName" placeholder="ENGLISH LANGUAGE">
                    </div>
               </div>
              
                <div class="col-md-3">
                     <div class="form-group">
                  <label for="code"> SUBJECT CODE </label>
               <input type="text" autocomplete="off" id="code" class="form-control" name="subjectCode" placeholder="ENG0932">
                </div>
              </div>
               
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="subject_teacher">SUBJECT TEACHER(S) </label>
               <select name="subjectTeacher" id="subject_teacher" class="select2 form-control">
                 <option value="">Choose...</option>
                 <option value="1">Mr Samson Idowu</option>
               </select>
                </div>
              </div>
               <div class="col-md-3">
                     <div class="form-group">
                  <label for="status"> STATUS </label>
               <select name="subjectStatus" id="status" class="form-control custom-select">
                <option value="">Choose...</option>
                 <option value="inactive">Inactive</option>
                 <option value="active">Active</option>
               </select>
                </div>
              </div>
          
                 </div>
                  </div>
                </div>
                <input type="hidden" name="action" value="submit_new_subject">
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark btn-md ml-1 __loadingBtn__">
                    <i class="fa fa-book"></i> Submit</button>
                  <button type="submit" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"> Back</span>
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- ADD SUBJECT MODAL  END -->


    <!-- UPDATE SUBJECT MODAL Start -->
   <div class="modal fade" id="UpdateSubjectModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-pen fa-2x"></i>Update Subject</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center" id="result-response2"></div>
                <form id="update_subject_form_modal">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12" id="show_subject_details_div">
                 
                  </div>
                </div>
                <input type="hidden" name="action" value="update_subject_now">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success btn-md ml-1 __loadingBtn2__">
                    <i class="fa fa-book"></i> Save Changes</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"> Back</span>
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
   <!-- DataTableFooterScript.php -->
   <script>
     $(document).ready(function(){
      //when delete btn is clicked
      const deleteBtn = $(".delete_btn");
      deleteBtn.on("click", function(){
        let delete_id = $(this).data("id");
        let delete_action = $(this).data("action");
        //send delete request
       var is_true = confirm("Do you really want to delete this Subject? You cannot undo this action!");
       if (is_true) {
         $.post("../actions/delete_actions",{action:delete_action,subjectId:delete_id},function(response){
          setTimeout(()=>{
            $("#delete_response").html(response);
          },1000);
        })
       }else{
        return false;
       }
      })

      $(".osotechDatatable").DataTable();
      //when an update btn is clicked
      $(document).on("click",".update_btn", function(){
        let subjectId = $(this).data("id");
        //send show update form request
        let action ='show_subject_update_modal';
        $.post("../actions/update_actions",{action:action,subjectId:subjectId}, function(result){
          $("#show_subject_details_div").html(result);
          $("#UpdateSubjectModal").modal("show");
        });

      });
      //when update form is submitted
       $("#update_subject_form_modal").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const update_subject_form_modal = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/update_actions",update_subject_form_modal,function(data){
          setTimeout(()=>{
        $(".__loadingBtn2__").html('Save Changes').attr("disabled",false);
        $("#result-response2").html(data);
          },2000);
        })
        // self.location.reload();
      });


      $("#createSubjectForm").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const createSubjectForm = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",createSubjectForm,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Submit').attr("disabled",false);
        $("#result-response").html(data);
          },2000);
        })
    
      });
     })
   </script>
  </body>
  <!-- END: Body-->

</html>