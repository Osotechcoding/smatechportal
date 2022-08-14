<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>Duty Assignment -VISAP</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0">VISAP</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                   <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Assign Duty
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold">ASSIGN WEEKLY DUTY ROSTER</h3>
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
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Assigned</h3></div>
                  <h2 class="text-white mb-0"><?php echo 10; ?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Weeks</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $session_data->Weeks_open;?> Wks</h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Term</h3></div>
                  <h2 class="text-white mb-0"><?php echo $activeSess->term_desc;?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Session</h3></div>
                  <h2 class="text-white mb-0"><?php echo $activeSess->session_desc_name;?></h2>
                  
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->
<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header">
          <h4 class="text-center">STAFF ON DUTY FOR THE 2021/2022 ACADEMIC SESSION </h4>
        </div>
        <div class="card-body card-dashboard">
          <button type="button" class="btn btn-dark btn-md btn-rounded" data-toggle="modal" data-target="#dutyModalForm"><i class="fa fa-user-plus fa-2x"></i> Assign Duty</button>
          <div class="text-center col-md-12 mt-1" id="response2"></div>
          <div class="table-responsive">
            <table class="table osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>Staff</th>
                  <th>Duty Desc</th>
                  <th>Week</th>
                  <th>Term</th>
                  <th>Instruction</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody class="text-center">
            <?php 
            $get_all_duties = $Administration->get_all_assigned_staff_weekly_duty();
            if ($get_all_duties) {
              foreach ($get_all_duties as $duties) {?>
                <tr>
                  <td><?php echo ucwords($duties->staff_name);?></td>
                  <td><?php echo ucwords($duties->duty);?></td>
                  <td><?php echo ($duties->duty_week);?></td>
                  <td><?php echo ($duties->term) ?></td>
                   <td> <button type="button" class="btn btn-warning block view_btn" data-value="<?php echo $duties->message;?>">Read</button></td>
                  <td><button class="btn btn-danger btn-sm delete_btn" data-id="<?php echo $duties->duty_id;?>" data-action="delete_duty" title="Delete this duty"><i class="bx bxs-trash-alt"></i></button></td>
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

    <!-- demo chat-->
   <!-- ChatDemo.php -->
<!-- widget chat demo ends -->
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


          <!--Basic Modal -->
          <div class="modal fade text-left" id="ReadInstructModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Instruction to Staff</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0" id="duty_details"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                  Close
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--Basic Modal -->
          <div class="modal fade text-left" id="dutyModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-center">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Assign Staff Weekly Roster</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center col-md-12" id="response"></div>
                <div class="modal-body">
                 <form class="form" id="RosterForm">
            <div class="form-body">
              <div class="row">
                 <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="text" id="city-column" class="form-control" placeholder="Session" name="csession" value="<?php echo $activeSess->session_desc_name;?>" readonly>
                    <label for="csession">Academic Session</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                  <input type="text" id="country-floating" class="form-control" name="cterm"
                      placeholder="Academic Term" value="<?php echo $activeSess->term_desc;?>" readonly>
                    <label for="country-floating"> Current Term</label>
                  </div>
                </div>
                 <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="staff">Staff Name</label>
                  <select name="staff" id="staff" class="select2 form-control">
                    <option value="">Choose...</option>
                    <option value="Mr Agberayi Samson">Mr Agberayi Samson</option>
                  </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="duty_duration">On Duty</label>
                 <input type="text" autocomplete="off" class="form-control" name="duty_duration" placeholder="e.g Week two">
                  </div>
                </div>
               
                <div class="col-xl-12 col-md-12 col-12">
                  <div class="form-group">
                     <label for="duty_post">Assign To</label>
                    <input type="text" class="form-control" name="duty_post"
                      placeholder="Cordinate Student during CBT Exam">
                  </div>
                </div>
               <div class="col-md-12 col-12">
                      <fieldset class="form-group mb-0">
                         <label for="textarea-counter">Max Character (150)</label>
                          <textarea data-length=150 class="form-control char-textarea" id="textarea-counter" name="message" rows="3" placeholder="Instruction to the staff (Max Character (150))"></textarea>
                      </fieldset>
                      <small class="counter-value float-right mb-2"><span class="char-count">0</span> / 150 </small>
                  </div>
                <!-- daterange end -->
                </div>
                <!--   -->
                <input type="hidden" name="action" value="submit_staff_duty_role_now">
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-dark btn-lg mr-1 __loadingBtn__"><i class="bx bx-paper-plane"></i> Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Back
                  </button>
                </div>
              </div>
            </div>
          </form>
                </div>
              </div>
            </div>
          </div>
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
  <script>
    $(document).ready(function(){
      const  RosterForm = $("#RosterForm");
     RosterForm.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send a request 
      $.post("../actions/actions",RosterForm.serialize(),function(data){
        setTimeout(()=>{
          $(".__loadingBtn__").html('<i class="bx bx-paper-plane"></i> Submit').attr("disabled",false);
          $("#response").html(data);
        },1500);
      })

      });

     // END of Submit
     // Start of Delete action
const delete_btn = $(".delete_btn");
delete_btn.on("click", function(){
  let dutyId = $(this).data("id");
  let action = $(this).data("action");
  let is_true = confirm("Are you sure you wanto permanently remove this Duty?");
  if (is_true) {
$.post("../actions/delete_actions",{action:action,dutyId:dutyId}, function(res){
    setTimeout(()=>{
      $("#response2").html(res);
    },500);
  })
  }else{
    return false;
  }
})
     // End of delete action 

     // Start of Read Info 
      const view_btn = $(".view_btn");
  view_btn.on("click", function(){
     let instruction = $(this).data("value");
     //let title = $(this).data("title");
      $("#duty_details").html(instruction);
      //$("#subTitle").html(title);
    $("#ReadInstructModal").modal("show");
  })
     // End of Read Info 
      
    })
  </script>
  </body>
  <!-- END: Body-->

</html>