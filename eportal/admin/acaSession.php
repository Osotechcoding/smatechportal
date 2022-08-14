<?php
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo ($SmappDetails->school_name);?> :: School Academic</title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Manage Session & Term
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Current</h3></div>
                  <h2 class="text-white mb-0"><?php echo $activeSess->term_desc;?></h2>

                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-bullhorn fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Weeks</h3></div>
                  <h2 class="text-white mb-0"><?php echo $session_data->Weeks_open;?>Wks</h2>

                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-bullhorn fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Vacation</h3></div>
                  <h2 class="text-white mb-0"><?php echo date("j M, Y",strtotime($session_data->term_ended)) ?></h2>

                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Session </h3></div>
                  <h2 class="text-white mb-0"><?php echo $activeSess->session_desc_name; ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
<section id="basic-horizontal-layouts">
  <div class="row match-height">

    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center"> Academic Term & Session Management <button type="button" class="btn btn-secondary block" data-toggle="modal" data-target="#active_session_form">
            Declare New Session
          </button> </h4>
        </div>
        <div class="card-body">
          <form class="form form-horizontal" id="update_academic_session_form">
            <div class="form-body">
              <div class="text-center col-md-12 mb-1 mt-1" id="server_result3"></div>
              <div class="row">
                <div class="col-md-4">
                  <label>Current Session</label>
                </div>
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                <div class="col-md-8 form-group ">
                  <div class="position-relative has-icon-left">
                    <input type="text" class="form-control" name="csession"
                      value="<?php echo $activeSess->session_desc_name;?>" readonly>
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Active Term</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                   <select name="cterm" id="cterm" class="custom-select form-control">
                     <option value="<?php echo $activeSess->term_desc;?>" selected><?php echo $activeSess->term_desc;?></option>
                     <option value="1st Term">1st Term</option>
                     <option value="2nd Term">2nd Term</option>
                     <option value="3rd Term">3rd Term</option>
                   </select>

                  </div>
                </div>
                <div class="col-md-4">
                  <label>No of Days</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="number" id="days" class="form-control" name="days" placeholder="Days School Open">
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </div>
                </div>
                 <div class="col-md-4">
                  <label>No of Weeks</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="number" id="noweeks" class="form-control" name="noweeks" placeholder="Weeks School Open">
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Term Ended</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="date" id="vdate" class="form-control" name="vdate"
                      placeholder="Vacation date">
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Next Term Begins</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="date" id="next_term_start" class="form-control" name="next_term_start" placeholder="Resumption Date">
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </div>
                </div>
                 <input type="hidden" name="action" value="update_academic_session_now">
                 <input type="hidden" name="bypass_auth3" value="<?php echo md5("oiza1");?>">
                <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-dark mr-1 __loadingBtn__">Submit</button>
                  <a href="./"><button type="button" class="btn btn-danger">Go Back</button></a>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
     <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Session Information   <button type="button" class="btn btn-danger block" data-toggle="modal" data-target="#simulation_Modal_Form">
            Simulate Session
          </button></h2>
        </div>
        <div class="card-body">
         <form class="form form-horizontal">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <label>Academic Session</label>
                </div>
                <div class="col-md-8 form-group ">
                  <div class="position-relative has-icon-left">
                    <input type="text" class="form-control"
                      value="<?php echo $session_data->active_session;?>" readonly>
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Current Term</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="text" class="form-control" value="<?php echo $session_data->active_term;?>" readonly>
                    <div class="form-control-position">
                      <i class="bx bx-cog"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Vacation Date</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="text" class="form-control"
                      value="<?php echo date("l jS F Y",strtotime($session_data->term_ended));?>" readonly>
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </div>
                </div>
                 <div class="col-md-4">
                  <label>Resumption Date</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="text" class="form-control"
                      value="<?php echo date("l jS F Y",strtotime($session_data->new_term_begins));?>" readonly>
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </div>
                </div>

                 <div class="col-md-4">
                  <label>No of Weeks</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="text" class="form-control"
                      value="<?php echo $session_data->Weeks_open;?> Weeks" readonly>
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </div>
                </div>

                 <div class="col-md-4">
                  <label>No of Days</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="text" class="form-control"
                      value="<?php echo $session_data->Days_open;?> Days" readonly>
                    <div class="form-control-position">
                      <i class="bx bx-calendar"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    </div>
    <!-- demo chat-->

    <!-- BEGIN: Footer-->
          <!--Basic Modal -->
          <div class="modal fade text-left" id="active_session_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
              <div class="text-center mt-1"><?php echo $Alert->alert_msg("Notice: Session Declared here will Override the Current academic Session!","warning");?> </div>
                 <form id="submit_New_Session_Form">
                <div class="modal-body">
                   <div class="form-group">
                     <label for="new_session_dec">Active Session</label>
                     <input type="text" id="new_session_dec" class="form-control form-control-lg" name="new_session_dec" placeholder="eg 2021/2022" required>
                   </div>
                <input type="hidden" name="action" value="set_new_session">
                <input type="hidden" name="bypass_auth" value="<?php echo md5("oiza1");?>">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                  </button>
                  <button type="submit" class="btn btn-primary ml-1">
                    <span class="fa fa-calendar"></span> Set New Session</button>
                </div>
                 </form>
                 <div class="text-center col-md-12" id="server_result"></div>
              </div>
            </div>
          </div>

          <!-- SESSION NAVIGATION OR SIMULATION -->
          <!--Basic Modal -->
          <div class="modal fade text-left" id="simulation_Modal_Form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
              <div class="text-center mt-1" id="res"></div>
                 <form id="simulation_Form">
                <div class="modal-body">
                   <div class="form-group">
                     <label for="navigate_to">Simulate Session</label>
                     <select name="simulate_to_session" id="navigate_to" class="select2 form-control">
                       <option value="">Choose...</option>
                       <?php echo $Administration->get_all_session_history_lists();?>
                     </select>
                   </div>

                    <div class="form-group">
                     <label for="simulate_to_term">Simulate Term</label>
                     <select name="simulate_to_term" id="simulate_to_term" class="form-control custom-select">
                       <option value="">Choose...</option>
                       <?php echo $Administration->get_all_session_term_history_lists(); ?>
                     </select>
                   </div>
                <input type="hidden" name="action" value="simulate_session_now">
                <input type="hidden" name="bypass_auth2" value="<?php echo md5("oiza12345");?>">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                  </button>
                  <button type="submit" class="btn btn-danger ml-1">
                    <span class="fa fa-calendar"></span> Simulate</button>
                </div>
                 </form>
                 <div class="text-center col-md-12" id="server_result2"></div>
              </div>
            </div>
          </div>
          <!--  -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <script>
      $(document).ready(function(){
       //when new session modal is submitted
       const submit_New_Session_Form = $("#submit_New_Session_Form");
       submit_New_Session_Form.on("submit", function(evt){
        evt.preventDefault();
        var is_true = confirm ("Are you sure, You want to Navigate to New Academic Session "+ $("#new_session_dec").val()+ " You cannot undo this action!");
        if (is_true) {
          //alert("New Session Set Successfully");
          //send request
          $.post("../actions/actions",submit_New_Session_Form.serialize(),function(data){
            setTimeout(()=>{
              $("#server_result").html(data);
            },1000);
          })
        }else{
          return false;
        }
       });
    //update_academic_session_form
     //when update  session form is submitted
       const update_academic_session_form = $("#update_academic_session_form");
       update_academic_session_form.on("submit", function(event){
        event.preventDefault();
        var is_true_ = confirm ("Are you sure, You want to Update the Session Details? You cannot undo this action!");
        if (is_true_) {
           $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
          //send request
          $.post("../actions/update_actions",update_academic_session_form.serialize(),function(result){
            setTimeout(()=>{
             $(".__loadingBtn__").html('Update Session').attr("disabled",false);
              $("#server_result3").html(result);
            },1500);
          })
        }else{
          return false;
        }
       });

//simulation_Form
//when simulation form is submitted
const simulation_Form = $("#simulation_Form");
       simulation_Form.on("submit", function(evt){
        evt.preventDefault();
        var is_true = confirm ("Are you sure, You want to Navigate to "+ $("#navigate_to").val() + " Academic Session?");
        if (is_true) {
          //alert("New Session Set Successfully");
          //send request
          $.post("../actions/update_actions",simulation_Form.serialize(),function(data){
            setTimeout(()=>{
              $("#server_result2").html(data);
            },1000);
          })
        }else{
          return false;
        }
       });

      });
    </script>
    <!-- END: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>
