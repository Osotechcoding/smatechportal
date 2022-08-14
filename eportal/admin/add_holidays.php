<?php
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> ::  Manage Holidays</title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Manage Holiday
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-calendar fa-1x"></span> SCHOOL HOLIDAYS</h3>
  </div>
          </div>
         
    <div class="card">
      <div class="card-header">
          <button type="button" class="btn btn-dark btn-lg btn-round" data-toggle="modal" data-target="#addHolidayModal"><span class="fa fa-calendar fa-1x"></span> Declare Holiday</button>
        </div>
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-hover table-bordered">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>DESCRIPTION</th>
          <th>DECLARED BY</th>
          <th>DATE FROM</th>
          <th>DATE TO</th>
          <th>STATUS</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 

          $allHolidays = $Administration->getAllHolidays();
          if ($allHolidays) {
            $cnt =0;
           foreach ($allHolidays as $holiday) {
            $cnt++;
            ?>
          <tr>
          <td><?php echo $cnt; ?></td>
          <td><?php echo ucwords($holiday->holiday_desc);?></td>
          <td><?php echo ucwords($holiday->declared_by);?><br>
            <span class="badge badge-pill badge-dark read_info" data-info="<?php echo $holiday->note_msg; ?>" style="cursor: pointer;" >Read Details</span>
          </td>
          <td><?php echo date("D j M, Y",strtotime($holiday->date_from));?></td>
          <td><?php echo date("D j M, Y",strtotime($holiday->to_date));?></td>
          <td><?php if (date("Y-m-d",strtotime($holiday->to_date)) <= date("Y-m-d")): ?>
          <span class="badge badge-pill badge-dark">Observed</span>
            <?php else: ?>
            <span class="badge badge-pill badge-info">Up Coming</span>
          <?php endif ?> </td>
         <td><button class="btn btn-danger btn-md btn-round __loadingBtn__<?php echo $holiday->id;?> delete_btn" data-id="<?php echo $holiday->id;?>">Delete</button> </td>
        </tr>

            <?php
             // code...
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

    <!-- BEGIN: Footer-->
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="addHolidayModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-calendar fa-1x"></span> Holiday Declaration Form</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="holidayDeclarationForm">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="holiday_desc">HOLIDAY DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="holiday_desc" placeholder="Public Holiday">
                    </div>
               </div>
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="declaredBy"> DECLARED BY </label>
              <input type="text" name="declaredBy" id="declaredBy" class="form-control form-control-lg" placeholder="Federal Government">
                </div>
              </div>

                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="holiday_from">DATE FROM </label>
                  <input type="date" name="holiday_from" class="form-control form-control-lg" placeholder="Select a Date">
                </div>
              </div>
              <div class="col-md-6">
                     <div class="form-group">
                  <label for="holiday_to">DATE TO </label>
                  <input type="date" name="holiday_to" class="form-control form-control-lg" placeholder="Select a Date">
                </div>
              </div>
               <div class="col-12 mt-1">
                      <label for="textarea-counter">More Information (Max Character (500))</label>
                          <textarea data-length=500 class="form-control char-textarea" id="textarea-counter" rows="3" placeholder="Write additional Message here" name="message"></textarea>
                      <small class="counter-value float-right"><span class="char-count">0</span> / 500 </small>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                  <label for="auth_code"> Authentication Code</label>
              <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="*********">
                    </div>
               </div>

                 </div>
                  </div>
                </div>
                 <input type="hidden" name="action" value="add_new_holiday">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                   <span class="fa fa-calendar fa-1x"></span> Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Back
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->

     <!--Basic Modal -->
          <div class="modal fade text-left" id="holidayDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Instruction</h3>
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
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php"); ?>
   <script>
     $(document).ready(function(){

             const readmeBtn = $(".read_info");
  readmeBtn.on("click", function(){
     let holidaydetails = $(this).data("info");
      $("#view_aNote").html(holidaydetails);
    $("#holidayDetailsModal").modal("show");
  })


      const HOLIDAYFORM = $("#holidayDeclarationForm");
                HOLIDAYFORM.on("submit", function(event){
                event.preventDefault();
            $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
            //send request 
            $.post("../actions/actions",HOLIDAYFORM.serialize(),function(data){
                setTimeout(()=>{
                    $(".__loadingBtn__").html('Submit').attr("disabled",false);
                    $("#server-response").html(data);
                },500);
            })
        });


      const delete_btn = $(".delete_btn");
      delete_btn.on("click", function(){
        let holidayId = $(this).data("id");
        let action = 'delete_holiday';
         let is_true = confirm("Are you Sure you want to Remove this Holiday?");
      if (is_true) {
        $(".__loadingBtn__"+holidayId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,holidayId:holidayId},function(response){
          setTimeout(()=>{
            $(".__loadingBtn__"+holidayId).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })


     })
   </script>
  </body>
  <!-- END: Body-->

</html>
