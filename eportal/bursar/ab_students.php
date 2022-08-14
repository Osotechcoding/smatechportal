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
    <title>Fee Component - VISAP</title>
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
                  <li class="breadcrumb-item active">Student Management
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-graduation-cap fa-2x"></span> STUDENTS </h3>
  </div>
    </div>
     <!-- Statistics Cards Starts -->
        <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                  <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">New</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Student->count_recent_applicants(); ?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Male</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $Student->count_students_by_gender("Male");?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Female</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Student->count_students_by_gender("Female");?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Students</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Student->count_total_visap_students(); ?></h2>
                  
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->
    <div class="card">
      <div class="card-header">
        <p><?php //$time = date("h:i:s"); 
        //echo $time;?></p>
       <button class="btn btn-dark btn-md btn-round" type="button" data-toggle="modal" data-target="#addNewStudentModal"><span class="fa fa-user-plus mr-0"> </span>  Register Student Manually</button> <a href="upload_single_result"><button class="btn btn-outline-warning btn-md btn-round" type="button">Upload Single Result</button></a>
      </div>
      <div class="card-body">
         <div class="table-responsive">
      <table class="table osotechDatatable table-bordered">
        <thead class="text-center">
          <tr>
          <th>PASSPORT</th>
          <th>FULLNAME</th>
          <th>ADMISSION NO</th>
          <th>CLASS</th>
          <th>VERIFICATION</th>
          <th>STATUS</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
          $all_active_students = $Student->get_all_students_by_status("Active");
          if ($all_active_students) {
           foreach ($all_active_students as $students) {?>
            <tr>
             <td><img src="result-asset/author.jpg" width="60" alt="photo"></td>
          <td><?php echo ucwords($students->stdSurName." ".$students->stdFirstName." ".$students->stdMiddleName) ?></td>
          <td><?php echo strtoupper($students->stdRegNo)?></td>
          <td><?php echo strtoupper($students->studentClass)?></td>
           <td><?php if ($students->stdConfToken !=NULL || $students->stdConfToken!=""): ?>
           <span class="badge badge-dark badge-pill mb-1"><?php echo $students->stdConfToken ?></span>
            <span class="badge badge-warning badge-pill">Not Verified</span>
             <?php else: ?>
              <span class="badge badge-success badge-pill">Verified</span>
           <?php endif ?></td>
           <td><span class="badge badge-success badge-pill">Admitted</span></td>
         <td>
          <div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-warning">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-info" href="javascript:void(0);"><span class="fa fa-bar-chart"></span>Edit Student</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-info" href="student_payment_info?std_regNo=<?php echo base64_encode(urlencode(($students->stdRegNo)));?>&stuId=<?php echo base64_encode(urlencode(($students->stdId)));?>&stuClass=<?php echo base64_encode(urlencode(($students->studentClass))) ?>"><span class="fa fa-line-chart"></span> Payment Info</a>
            </div>
          </div>
          <!--  -->
        </td>
        </tr>
          <?php }
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

   <!-- BEGIN: Customizer-->
   <?php //include ("template/Customizer.php");?>
    <!-- End: Customizer-->
   
    </div>
    <!-- demo chat-->
    <?php //include ("template/ChatDemo.php");?>
   <!--  <div class="sidenav-overlay"></div>
    <div class="drag-target"></div> -->
    <!-- BEGIN: Footer-->
   <!--  -->
    <!-- BUS MODAL Start -->
   <div class="modal fade" id="addNewStudentModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-graduation-cap fa-2x"></i> Register Student Manually</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                     <div class="col-md-12">
              <h4 class="text-info">STUDENT BIO DATA</h4>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">SURNAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" placeholder="VISAP HOSTEL" readonly>
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="price">FIRST NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="price" placeholder="Male Hostel" readonly>
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">MIDDLE NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Room One">
                    </div>
                  </div>
                 
                   <div class="col-md-6">
                   <div class="form-group">
                  <label for="bus_capacity">DATE OF BIRTH(D.O.B)</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg pickadate" name="bus_capacity" placeholder="45">
                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">GENDER </label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">MALE</option>
                 <option value="not_act">FEMALE</option>
               </select>
                </div>
              </div>
              <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">BIRTH CERTIFICATION </label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">CERTIFICATE</option>
                 <option value="not_act">AFFIDAVIT</option>
                 <option value="none">NONE</option>
               </select>
                </div>
              </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">NATIONALITY </label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">Active</option>
                 <option value="not_act">Not Active</option>
               </select>
                </div>
              </div>
              <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">STATE OF ORIGIN </label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">Active</option>
                 <option value="not_act">Not Active</option>
               </select>
                </div>
              </div>
              <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">LGA OF ORIGIN </label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">Active</option>
                 <option value="not_act">Not Active</option>
               </select>
                </div>
              </div>
              <div class="col-md-6">
                   <div class="form-group">
                  <label for="std_phone">STUDENT PHONE NO</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="std_phone" placeholder="123450987">
                    </div>
                  </div>
                  <div class="col-md-6">
                   <div class="form-group">
                  <label for="std_email">STUDENT EMAIL </label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="std_email" placeholder="student@gmail.com">
                    </div>
                  </div>

              <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">CHALLENGES THAT IMPACT ABILITY </label>
               <select name="challenges" id="challenges" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">Visually Challenged</option>
                 <option value="not_act">Albinism</option>
                 <option value="">Learning Disabilities</option>
                 <option value="">Intellectually Challenged</option>
                 <option value="">Hearing/Auditory Challenged</option>
                 <option value="">Behavioural Disorder</option>
                 <option value="">Speech Challenged</option>
                 <option value="">Other</option>
               </select>
                </div>
              </div>
              <div class="col-md-12">
              <p class="text-info">FATHER/MALE GUARDIAN DETAILS</p>
               </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">TITLE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Room One">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">SURNAME NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">SURNAME NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">SURNAME NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">RELATIONSHIP</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">PHONE NUMBER</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">EMAIL ADDRESS</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">OCCUPATION</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                  <label for="bus_name">HOME ADDRESS</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>

                  <!-- Mother inputs -->

                   <div class="col-md-12">
              <p class="text-info">MOTHER/FEMALE GUARDIAN DETAILS</p>
               </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">TITLE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Room One">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">SURNAME NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">SURNAME NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">SURNAME NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">RELATIONSHIP</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">PHONE NUMBER</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">EMAIL ADDRESS</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">OCCUPATION</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                  <label for="bus_name">HOME ADDRESS</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                  <!-- Mother Inputs -->
                  <!-- PREVIOUS SCHOOL INFO -->
                   <div class="col-md-12">
              <p class="text-info">PREVIOUS SCHOOL INFO</p>
            </div>
              <div class="col-md-12">
                     <div class="form-group">
                  <label for="bus_name">SCHOOL NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                     </div>
                    <div class="col-md-12">
                     <div class="form-group">
                  <label for="bus_name">SCHOOL ADDRESS</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">SCHOOL LOCATION</label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">RURAL</option>
                 <option value="not_act">URBAN</option>
               </select>
                </div>
              </div>

                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">LEVEL OF EDUCATION OFFERED </label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">PRIMARY ONLY</option>
                 <option value="not_act">SENIOR SECONDARY ONLY</option>
                 <option value="">PRIMARY & SECONDARY</option>
               </select>
                </div>
              </div>

              <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">SCHOOL CATEGORY </label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">PUBLIC</option>
                 <option value="not_act">PRIVATE</option>
               </select>
                </div>
              </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">LEARNER'S PRESENT CLASS </label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">JSS1</option>
                 <option value="not_act">JSS2</option>
               </select>
                </div>
              </div>

               <div class="col-md-12">
                     <div class="form-group">
                  <label for="bus_name">REASON FOR BEING IN PRESENT CLASS</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Father's Name">
                    </div>
                  </div>

                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">YEAR OF ADMISSION</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Admission Year">
                    </div>
                  </div>

                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">ADMISSION NUMBER</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="VISAP00901">
                    </div>
                  </div>

                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="d-none d-sm-block">Submit</span>
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
      //$(".osotechDatatable").DataTable();
      //when add room btn is clicked
      $(document).on("click",".add_hostel_room_btn", function(){
        let hostel_id = $(this).data("id");
        let action = $(this).data("action");
      //  alert(hostel_id+" "+ action);
        //show modal form
        $("#hostelRoomModal").modal("show");
        //when submit create room is clicked redirect to view_hostel_rooms.php
        //here...
      })
      $("#ComponentFormFee").on("submit", function(event){
        event.preventDefault();
        const ComponentFormFee = $(this).serialize();
        alert("Yes Component Fee Saved");
        self.location.reload();
      })
     })
   </script>
  </body>
  <!-- END: Body-->

</html>