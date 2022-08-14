<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Uploading Affective Domain</title>
   <!-- include template/HeaderLink.php -->
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
                  <li class="breadcrumb-item active">Student Affective Domain
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-1x"></span>Upload Student Affective Domain </h3>
  </div>
    </div>
    <!-- content goes here -->
        <div class="card">
          <div class="card-header">
            <!-- <h3>Upload Cognitive Domain</h3> -->
             <?php include_once 'Links/results_btn.php'; ?>
          </div>

          <div class="card-body">
             <!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
         <button type="button" class="btn btn-danger btn-md badge-pill" data-toggle="modal" data-target="#csv_Modal"><span class="fa fa-file fa-1x"></span> UPLOAD BY CSV</button>
        </div>
        <div class="card-body">
          <form class="form form-vertical" action="" method="POST">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="student_class"> Class</label>
                    <select name="student_class" id="student_class" class="select2 form-control">
                      <option value="" selected>Choose...</option>
                      <?php echo $Administration->get_classroom_InDropDown_list();?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="term"> Term</label>
                    <select name="term" id="term" class="custom-select form-control">
                      <option value="" selected>Choose...</option>
                      <option value="1st Term">1st Term</option>
                      <option value="2nd Term">2nd Term</option>
                      <option value="3rd Term">3rd Term</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="school_session">Academic Session</label>
                    <input type="text" id="school_session" class="form-control" name="school_session"
                      value="<?php echo $activeSess->session_desc_name;?>" readonly>
                  </div>
                </div>
               
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" name="submit_show_affective_domain" class="btn btn-dark mr-1">Show Broad Sheet</button>
                </div>
              </div>
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
       <!--starts  -->
       <?php 
       if (isset($_POST['submit_show_affective_domain'])) {
        $student_class = $Configuration->Clean($_POST['student_class']);
        $term = $Configuration->Clean($_POST['term']);
        $session = $Configuration->Clean($_POST['school_session']);

        if ($Configuration->isEmptyStr($student_class) || $Configuration->isEmptyStr($term)) {
           echo "<div class='card text-center'>
           <div class='card-body'>
          ".$Alert->alert_msg(" Please Select Student Class and Term to Continue!","danger")."
         </div> </div>";
        }else{
          $student_details = $Student->getStudentsByClassName($student_class);
          if ($student_details) {?>
            <div class="card">
 <div class="card-body">
  <div class="mb-3">
    <h2 class="text-info text-center">GLORY SUPREME SCHOOLS</h2>
                  <h5 class="text-center text-warning">1 -5,Glory Supreme Avanue,Ijagba, Onigbin, Ota,<br /> Ogun State, Nigeria</h5>
        <h4 class="text-center text-danger"><strong>STUDENTS BEHAVIORAL ANALYSIS SHEET</strong></h4>
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center offset-1">
            <span class="btn btn-info btn-round text-center"><?php echo strtoupper($student_class) ?> </span>
                <span class="btn btn-dark btn-round text-center"><?php echo strtoupper($term) ?></span>
                <span class="btn btn-danger btn-round text-center"><?php echo ($session) ?></span>
            </div>
  </div>
  <form id="submit_affectiveDomain_form">

<div class="table-responsive">
        <table class=" table-bordered table table-stripped table-hover datatable">
                <thead class="text-center">
                    <tr>
                    <th width="250">Student</th>
                    <th> Writing</th>
                    <th> Musical</th>
                    <th>Sports</th>
                    <th>Attentiveness</th>
                    <th>Attitude To Work</th>
                    <th>Punctuality</th>
                    <th>Health</th>
                    <th>Politeness</th>
                </tr>
            </thead>
            <tbody class="text-center">
                    <?php 
                    $cnt =0;
                    foreach ($student_details as $value) { 
                      $cnt++;?>
                    <tr>
                      <td width="250"><?php echo ucwords($value->full_name);?>
                        <input class="form-control" type="hidden" name="student_id[]" value="<?php echo $value->stdId?>">
                         <input type="hidden" value="<?php echo $value->stdRegNo;?>" name="std_reg_number[]">
                        <input type="hidden" value="<?php echo strtoupper($value->studentClass);?>" name="student_class[]">
                      </td>
                       <td>
                        <select class="select form-control" name="hand_writing[]">
                         <option value="1" selected>1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option>
                       </select>
                </td>
                        <td><select name="musical_skill[]" class="select form-control">
                         <option value="1" selected>1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option>              
            </select></td>
                        <td><select name="sport[]" class="select form-control">
                         <option value="1" selected>1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option>
                       </select></td>
                        <td><select name="attentiveness[]" class="select form-control">
                         <option value="1" selected>1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option>
                       </select></td>
                        <td><select name="attitude_to_work[]" class="select form-control">
                         <option value="1" selected>1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option>
                       </select></td>
                        <td><select name="punctuality[]" class="select form-control">
                         <option value="1" selected>1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option>
                          </select></td>
                        <td><select name="health[]" class="select form-control">
                         <option value="1" selected>1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option></select></td>
                        <td><select name="politeness[]" class="select form-control">
                         <option value="1" selected>1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option></select>
           <input type="hidden" name="total_count" value="<?php echo $cnt; ?>"></td>
                    </tr>  
                    <?php }
                     ?>         
                    </tbody>
                    </table>
                        </div>
                         <input type="hidden" name="term" value="<?php echo $term;?>">
                    <input type="hidden" name="school_session" value="<?php echo $session;?>">
                    <input type="hidden" name="action" value="submit_affective_domain">
                     <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="">Uploaded By</label>
                         <input type="text" name="class_teacher" class="form-control" placeholder="Class Teacher's Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Authentication</label>
                         <input type="password" name="auth_pass" class="form-control" placeholder="*********">
                      </div>
                    </div>
                      </div>
                    </div>
                        <button class="btn btn-dark submit-btn btn-lg mr-2 float-right mt-1 __loadingBtn__" type="submit">UPLOAD NOW</button>
                        <div class="clearfix"></div>
                      </form>
                                        </div>
                                        </div>
                                        <!-- ends -->
            <?php
           } else{
      echo "<div class='card text-center'>
           <div class='card-body'><h4>
          ".$Alert->alert_msg("No Student found in ".strtoupper($student_class)."!","warning")."
          </h4></div></div>";
           }
        }
       }
        ?>
             <!-- ############################# -->
</div>
    <!-- content goes end -->
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
    <!-- BEGIN: Footer-->
   <!--  -->
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
     <script>
       $(document).ready(function(){
        const AFFECTIVE_DOMAIN_FORM = $("#submit_affectiveDomain_form");
        AFFECTIVE_DOMAIN_FORM.on("submit", function(event){
          event.preventDefault();
          $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
     //send to server
     $.post("../actions/actions",AFFECTIVE_DOMAIN_FORM.serialize(),function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('UPLOAD NOW').attr("disabled",false);
         console.log(data);
         $("#server-response").html(data);
      },2000);
     })
        });
       })
     </script>

  </body>
  <!-- END: Body-->
</html>