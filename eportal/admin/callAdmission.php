<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Admission Portal</title>
     <?php include ("../template/HeaderLink.php"); ?>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__;?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Call Admission
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><div class="row">
  <div class="col-12">
  <h2><span class="fa fa-bullhorn"></span> CALL FOR ACADEMIC ADMISSION</h2>
  </div>

</div>
<div class="text-center ml-2"> <?php include("template/admBtnLink.php");?></div>

<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="mt-2 ml-3">
            <?php if ($Administration->checkAdmissionPortalStatus() == true): ?>
              <span class="badge badge-success badge-pill" >Admission Portal is Opened</span>
              <?php else: ?>
                 <button type="button" class="btn btn-dark btn-md btn-round" data-toggle="modal" data-target="#new_admission">Declare New Admission</button>
            <?php endif ?>
           
          </div>
        <div class="mt-2" style="text-align: center;">
          <h4 class="text-center text-info"> ADMISSION PORTAL FOR <?php echo $activeSess->session_desc_name; ?> APPLICATION </h4>
        </div>
        <div class="card-body card-dashboard">

          <div class="table-responsive">
            <table class="table zero-configuration">
              <thead class="text-center">
                <tr>
                  <th> Interview</th>
                  <th>Desc/Batch</th>
                  <th> Portal Open</th>
                  <th> Portal Close</th>
                  <th> Status</th>
                  <th>Note</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $admissionPortal = $Administration->getAdmissionPortalDetails(); 
                if ($admissionPortal) {
                  foreach ($admissionPortal as $kPortal):?>

                     <tr>
                  <td><?php echo date("D jS M, Y",strtotime($kPortal->interview_date)) ?></td>
                  <td><?php echo $kPortal->admission_desc;?>- <?php echo $kPortal->batch;?></td>
                  <td><?php echo date("D jS M, Y",strtotime($kPortal->adm_start));?></td>
                  <td><?php echo date("D jS M, Y",strtotime($kPortal->adm_end));?></td>
                  <td><?php if ($kPortal->status ==1): ?>
                  <span class="badge badge-pill badge-success badge-icon">Open</span>
                    <?php else: ?>
                      <span class="badge badge-pill badge-danger badge-icon">Closed</span>
                  <?php endif ?></td>
                   <td> <button type="button" class="btn btn-primary btn-md view_note_btn" data-info="<?php echo $kPortal->note;?>"> Read</button></td>
                  <td><?php if ($kPortal->status == 1): ?>
                  <button class="btn btn-danger btn-sm round declear_open_close_btn" data-action="close_admission" data-id="<?php echo $kPortal->id; ?>"><i class="fas fa-lock"></i> Close Admission</button>
                    <?php else: ?>
                     <button class="badge badge-dark badge-pill round declear_open_close_btn" data-action="open_admission"data-id="<?php echo $kPortal->id; ?>">Re-Open Portal</button>
                     <button class="badge badge-danger badge-pill round mt-2 mr-1 ml-1 delete_adm_portal_btn" data-id="<?php echo $kPortal->id; ?>">Delete</button>
                  <?php endif ?></td>
                </tr>
                  <?php 
                    // code...
                  endforeach;
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
    <!-- demo chat-->

<!-- widget chat demo ends -->
    </div>
 <!--Basic Modal -->
          <div class="modal fade text-left" id="new_admission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Declare New Admission</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="declareAdmissionForm">
                <div class="modal-body">
              <div class="row">
                 <div class="col-md-6 col-12 mt-1">
                  <label for="admission_desc">Admission Desc</label>
                  <input type="text" class="form-control form-control-lg" name="desc" placeholder="September Admission">
                </div>

                 <div class="col-md-6 col-12 mt-1">
                  <label for="batch">Admission Batch</label>
                  <input type="text" class="form-control form-control-lg" name="batch" placeholder="Batch Description e.g Batch A">
                </div>
               
                <div class="col-md-6 col-12">
                   <p>Application Duration.</p>
                  <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control form-control-lg dateranges" placeholder="Select Date" name="adm_duration">
                 
              </fieldset>
                </div>
                <div class="col-md-6 col-12 mt-1">
                   <p>Interview Date.</p>
                  <fieldset class="form-group position-relative has-icon-left">
                  <input type="date" class="form-control form-control-lg form-control-lg" name="intDate" placeholder="Select Date" id="interview_duration">
              </fieldset>
                </div>
                 <div class="col-md-6 col-12 mt-2">
                  <label for="int_venue">Interview Venue</label>
                  <input type="text" id="int_venue" class="form-control form-control-lg" name="int_venue"
                      placeholder="School Main Hall">
                   
                
                </div>
                 <div class="col-md-6 col-12 mt-2">
                  <label for="exam_time">Interview Time</label>
                  <input type="time" class="form-control form-control-lg" name="exam_time" placeholder="12:00 Noon">
                </div>
               <div class="col-12 mt-2">
                     <label for="textarea-counter">Instruction to an Applicant <small class="counter-value float-right mb-2"><span class="char-count">0</span> / 150 </small></label>
                          <textarea data-length=150 class="form-control char-textarea" name="instruction" id="textarea-counter" rows="5" placeholder="Instruction to an Applicant (Max Character (150))"></textarea>
                      
                  </div>
                  <div class="col-md-12 col-12 mt-1">
                  <label for="authcode">Authentication Code</label>
                  <input type="password" class="form-control form-control-lg" name="authcode" placeholder="***********">
                </div>
  <!-- daterange end -->
                </div>
                <!--   -->
            </div>

                <div class="modal-footer">
                   <input type="hidden" name="aca_session" value="<?php echo $activeSess->session_desc_name;?>">
                <input type="hidden" name="action" value="declareNew_admission_open">
                  <button type="submit" class="btn btn-dark btn-lg mr-1 __loadingBtn__"> Submit</button>
                  <button type="button" class="btn btn-danger btn-lg ml-1" data-dismiss="modal">
                    Close
                  </button>
                </div>
                 </form>
              </div>
               
            </div>
          </div>
    <!-- Modal Ends -->
  
          <!--Basic Modal -->
          <div class="modal fade text-left" id="admissionDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Instruction To Student</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0" id="view_aNote">
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">Back</button>
                </div>
              </div>
            </div>
          </div>
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/FooterScript.php"); ?>
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
     <?php include_once ("Links/adm_button_links.js.php") ?>
     <script>
       $(document).ready(function ()
       {
        //when a Read Note btn is clicked
         const view_btn = $(".view_note_btn");
  view_btn.on("click", function(){
     let admdetails = $(this).data("info");
      $("#view_aNote").html(admdetails);
    $("#admissionDetailsModal").modal("show");
  })


     const NEWADMISSION_FORM = $('#declareAdmissionForm');
     NEWADMISSION_FORM.on("submit", function (event) 
     {
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const NEWADMISSION_FORM = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",NEWADMISSION_FORM,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Submit').attr("disabled",false);
        $("#server-response").html(data);
          },500);
        })
     })
     //portal close action 
     const close_portal = $(".declear_open_close_btn");
     close_portal.on("click", function (){
      let is_true = confirm("Are you sure?");
      if (is_true) {
        //send a request to server
        let portal_action = $(this).data('action');
        let mid = $(this).data('id');
        let action = "update_portal";
        $.post("../actions/update_actions",{action:action,id:mid,portal_action:portal_action}, function(data_res){
          setTimeout(()=>{
            $("#server-response").html(data_res);
          },500);
        })
      }
     })
//when delete bt is clicked
const delete_btn = $(".delete_adm_portal_btn");
delete_btn.on("click", function(){
  confirmDelete = f=confirm("Are you sure you want ot delete this Announcement?");
  if (confirmDelete) {
    let action ='delete_call_for_admission';
    let admId = $(this).data('id');
    //send request 
    $.post("../actions/delete_actions",{action:action,admid:admId}, function(res){
      setTimeout(()=>{
        $("#server-response").html(res);
      },200);
    })
  }
})
       })
     </script>
  </body>
  <!-- END: Body-->

</html>