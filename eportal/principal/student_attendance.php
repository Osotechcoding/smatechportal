<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Student Attendance</title>
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
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
                  <li class="breadcrumb-item active">STUDENT ATTENDANCE
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-1x"></span> STUDENT ATTENDANCE </h3>
  </div>
    </div>
    <!-- content goes here -->
        <div class="card">
          <div class="card-header">
            <!--<h3>Upload Cognitive Domain</h3>-->
             <?php //include_once 'Links/results_btn.php'; ?>
          </div>
          <div class="card-body">
             <!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <!--<div class="card-header">-->
        <!-- <button type="button" class="btn btn-danger btn-md badge-pill" data-toggle="modal" data-target="#csv_Modal"><span class="fa fa-file fa-1x"></span> UPLOAD BY CSV</button>-->
        <!--</div>-->
        <div class="card-body">
          <form class="form form-vertical" action="" method="POST">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="class_name"> Class</label>
                    <select name="class_name" id="class_name" class="select2 form-control">
                      <option value="">Choose...</option>
                     <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                    </select>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="session"> Session</label>
                    <input type="text" name="session" id="session" class="form-control" value="<?php echo $activeSess->session_desc_name;?>" readonly>
                  </div>
                </div>
               
              </div>
               <button type="submit" name="show_broad_sheet_btn" class="btn btn-dark btn-md badge-pill float-right">Mark Attendance</button>
               <div class="clearfix"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
   
  </div>
</section>
<!-- Basic Vertical form layout section end -->
        </div>
      </div>
       <!--starts -->
       <?php if (isset($_POST['show_broad_sheet_btn'])): ?>
        <?php $show_class = $_POST['class_name'];
        $show_session = $_POST['session'];
        if (empty($show_class) || empty($show_session)) {
          echo '<div class="text-center col-md-12">'.$Alert->alert_msg("Please Select Class and Session to mark Attendance!").'</div>';
        }else{
          $show_all_ClassStudents = $Student->get_students_byClassDesc($show_class);
          if ($show_all_ClassStudents) {?>
              <!-- ############################# -->
 <div class="card">
  <div class="card-body">
  <h2 class="text-info text-center"><?php echo strtoupper(__SCHOOL_NAME__); ?></h2>
  <h5 class="text-center text-warning"></h5>
<h4 class="text-center text-warning"><strong>STUDENTS ATTENDANCE SHEET</strong></h4>
      <h2 class="card-title text-danger text-center">Enter Roll Call For (<b class="text-info"><?php echo strtoupper($show_class);?></b>)</h2>
      <form id="submit_attendant_form">
          <div class="row">
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-3">
              <div class="form-group">
          <label for="">Attendance Date</label>
          <div class="cal-icon">
    <input type="date" name="attDate" class="form-control">
              </div>
              </div>
              </div>
              <!-- col ends here  -->
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-3">
              <div class="form-group">
              <label for="">Current Term</label>
              <input type="text" name="term" class="form-control" value="<?php echo $activeSess->term_desc ?>" readonly>
                      </div>
                    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-3">
        <div class="form-group">
            <label for="">Current Session</label>
            <input type="text" name="session" class="form-control" value="<?php echo $activeSess->session_desc_name ?>" readonly>
        </div>
    </div>
</div>
<div class="text-center col-md-12" id="myresponse"></div>
<div class="table-responsive">
  <table class="table-bordered table table-stripped mb-5">
      <thead class="text-center">
          <tr>
            <th width="10%">S/N</th>
              <th width="40%">STUDENT NAME</th>
              <th width="25%">REG NO</th>
              <th width="25%">ROLL CALL</th>
          </tr>
      </thead>
      <tbody>

        <?php 
         $total_count =0;
         $cnt=0;
         foreach ($show_all_ClassStudents as $valuemi){ 
           $total_count++;
           $cnt++;
          ?>
          <tr>
            <td><?php echo $cnt;?> </td>
        <td>
           <input type="hidden" name="student_classroom[]" value="<?php echo strtoupper($valuemi->studentClass);?>">
        <input type="text" name="student_name[]" readonly value="<?php echo strtoupper($valuemi->full_name);?>" class="form-control"></td>
        <td><input type="text" name="reg_number[]" readonly value="<?php echo strtoupper($valuemi->stdRegNo);?>" class="form-control"></td>
        <td width="11%">
          <select name="attendant_status[]" class="form-control" style="width:100%">
        <option value="">Choose...</option>
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
        </select></td>
        <input type="hidden" name="total_count" value="<?php echo $total_count;?>">
        </tr>
        <?php } ?>
      
        </tbody>
        </table>
         <input type="hidden" name="action" value="upload_student_attendance_now">
        <button type="submit" class="btn btn-success btn-lg float-right __loadingBtn__"> SUBMIT ATTENDANCE</button>
        <div class="clearfix"></div>
        </div>
  </form>
  </div>
  </div>
  <!-- ############################# -->
            <?php 
            // code...
          }else{
echo '<div class="text-center col-md-12">'.$Alert->alert_msg("No result found Please try again!").'</div>';
          }
        }

         ?>
       <?php endif ?>
       <!-- ends -->
    <!-- content goes end -->
      </div>
    </div>
    <!-- END: Content-->
   
    </div>
    <!-- demo chat-->
   
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="csv_Modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-file fa-2x"></i> Upload Cognitive In CSV</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="csv_session">Session</label>
                    <select name="csv_session" id="csv_session" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="2021-2022">2021-2022</option>
                    </select>
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="csv_term"> Term</label>
                    <select name="csv_term" id="csv_term" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="1">1st Term</option>
                    </select>
                    </div>
                  </div>

                      <div class="col-md-6">
                     <div class="form-group">
                  <label for="csv_class"> Class</label>
                    <select name="csv_class" id="csv_class" class="select2 form-control">
                      <option value="">--Select--</option>
                      <option value="jss1">JSS1</option>
                    </select>
                    </div>
                  </div>
                  <input type="hidden" name="action" value="upload_beh_csv">
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">Choose CSV File </label>
               <input type="file" name="csv_file" id="csv_file" accept=".csv" class="file-input form-control form-control-file">
                </div>
              </div>
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="fa fa-cloud-upload"></span> Upload Now</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <i class="bx bx-power-off"></i>
                    Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->
    <script>
      $(document).ready(function(){
        const submit_attendant_form = $("#submit_attendant_form");
        submit_attendant_form.on("submit", function(event){
      event.preventDefault();
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
     //send to server
     $.post("../actions/actions",submit_attendant_form.serialize(),function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('SUBMIT ATTENDANCE').attr("disabled",false);
         $("#myresponse").html(data);
        
      },2000);
     })
    })
      })
    </script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>