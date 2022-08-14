<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo __SCHOOL_NAME__ ?> :: Manage Classroom</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Manage Classroom
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-list fa-1x"></span> SCHOOL CLASSROOMS</h3>
  </div>
          </div>

           <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Active Classes</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_classrooms_status("active"); ?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Inactive Classes </h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_classrooms_status("pending"); ?></h2>
                  
                </div>
              </div>
            </div>
           
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">All Classes</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_classrooms(); ?></h2>
                 
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
      
    <div class="card">
     
      <div class="card-body">
        <div class="text-center col-md-12" id="delete_response"></div>
        <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead class="text-center">
          <tr>
            <th>S/N</th>
          <th>CLASS DESC</th>
          <th> SUBDIVISION</th>
          <th>CLASS TEACHER</th>
          <th>STATUS</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
          $all_classrooms =$Administration->get_all_classrooms();
          if ($all_classrooms) {
            $cnt=0;
            foreach ($all_classrooms as $classrooms) {
              $cnt++;
              ?>
              <tr>
                <td><?php echo $cnt; ?></td>
          <td><?php echo strtoupper($classrooms->gradeDesc); ?> <?php echo strtoupper($classrooms->grade_division); ?></td>
          <td><?php echo strtoupper($classrooms->grade_dept); ?></td>
          <td><?php if ($classrooms->grade_teacher ==NULL): ?>
          <span class="badge badge-warning badge-md">Not Assigned</span>
            <?php else: ?>
              <?php $staff_data = $Staff->get_staff_ById($classrooms->grade_teacher);
              echo strtoupper($staff_data->full_name);?>
          <?php endif ?></td>
           <td> 
            <?php switch ($classrooms->grade_status) {
              case 'pending':
              echo ' <span class="badge badge-warning badge-md">Pending</span>';
                break;
               case 'closed':
              echo ' <span class="badge badge-danger badge-md">Not Active</span>';
                break;
              case 'active':
              echo ' <span class="badge badge-success badge-md">Active</span>';
                break;
            } ?></td>
         
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
    <!-- demo chat-->
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-plus fa-1x"></span> Add Classroom</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="bx bx-x"></i></button>
                </div>
                <div class="col-md-12 text-center mt-2" id="result-response"></div>
                <form id="add_ClassModal_form">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="grade_name">CLASS DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="grade_name" placeholder="JSS3">
                    </div>
               </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="class_division"> DIVISION </label>
               <select name="class_division" id="class_division" class="form-control form-control-lg">
                 <option value="">Choose...</option>
                 <option value="A">A</option>
                 <option value="B">B</option>
               </select>
                </div>
              </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="class_sub_division"> SUB-DIVISION </label>
               <select name="sub_division" id="class_sub_division" class="form-control form-control-lg">
                 <option value="">Choose...</option>
                 <option value="science">SCIENCE</option>
                 <option value="art">ART</option>
                 <option value="commerial">COMMERCIAL</option>
                 <option value="none">None</option>
               </select>
                </div>
              </div>
               
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="teacher"> CLASS TEACHER </label>
               <select name="teacher" id="teacher" class="select2 form-control form-control-lg">
                 <option value="">Choose...</option>
                <?php echo $Staff->show_staff_indropdown_list();?>
               </select>
                </div>
              </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="status"> STATUS </label>
               <select name="status" id="status" class="form-control form-control-lg">
                 <option value="">Choose...</option>
                 <option value="active">Active</option>
                 <option value="pending">Pending</option>
                 <option value="closed">Locked</option>
               </select>
                </div>
              </div>
                 </div>
                  </div>
                </div>
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                <input type="hidden" name="action" value="submit_new_classroom">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1 __loadingBtn__">
                    <span class="fa fa-paper-plane"> Submit</span></button>
                  <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Back</span>
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->



    <!-- BUS MODAL Start -->
   <div class="modal fade" id="classUpdateModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-edit fa-2x"></i> Update Classroom</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center col-md-12 mt-1" id="result-response2"></div>
                 <form id="update_classroom_form_modal">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12" id="show_classroom_details_div">
                  </div>
                </div>
                <input type="hidden" name="action" value="update_classroom_now">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1 __loadingBtn2__">
                    <span class="fa fa-paper-plane"> Save Changes</span></button>
                  <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Back</span>
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
       var is_true = confirm("Do you really want to delete this Classroom?, You cannot undo this action!");
       if (is_true) {
         $.post("../actions/delete_actions",{action:delete_action,grade:delete_id},function(response){
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
        let grade_id = $(this).data("id");
        //send show update form request
        let action ='show_classroom_update_modal';
        $.post("../actions/update_actions",{action:action,grade_id:grade_id}, function(result){
          $("#show_classroom_details_div").html(result);
          $("#classUpdateModal").modal("show");
        });

      });
      //when update form is submitted
       $("#update_classroom_form_modal").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const update_classroom_form_modal = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/update_actions",update_classroom_form_modal,function(data){
          setTimeout(()=>{
        $(".__loadingBtn2__").html('Save Changes').attr("disabled",false);
        $("#result-response2").html(data);
          },2000);
        })
        // self.location.reload();
      });


      $("#add_ClassModal_form").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const add_ClassModal_form = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",add_ClassModal_form,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Submit').attr("disabled",false);
        $("#result-response").html(data);
          },2000);
        })
        // self.location.reload();
      });
     })
   </script>
  </body>
  <!-- END: Body-->

</html>