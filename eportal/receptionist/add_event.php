<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>EVENT - <?php echo $SmappDetails->school_name ?></title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Admin </a>
                  </li>
                  <li class="breadcrumb-item active"> School Events
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-calendar fa-2x"></span> SCHOOL EVENTS</h3>
  </div>
          </div>
           <!-- Statistics Cards Starts -->
    <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Today's Events</h3></div>
                  <h2 class="text-white mb-0">3</h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Upcoming </h3></div>
                  <h2 class="text-white mb-0">4</h2>
                  
                </div>
              </div>
            </div>

              <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">All Events </h3></div>
                  <h2 class="text-white mb-0">40</h2>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
           <!-- Revenue Growth Chart Starts -->
    <div class="card">
     
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-hover table-bordered">
        <thead class="text-center">
          <tr>
         
          <th>EVENT DESC</th>
          <th>ORGANIZER</th>
          <th> DATE</th>
          <th>VENUE</th>
          <th>TIME</th>
          <th>STATUS</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <tr>
          <td>A Day Workshop</td>
          <td>School Prefects</td>
          <td><?php echo date("Y-m-d");?></td>
          <td>School Main Hall</td>
          <td><?php echo date("h:i:s A");?></td>
          <td><span class="badge badge-pill badge-warning">upcoming</span></td>
         <td> <!-- Dropdown Buttons options -->
    <div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-info">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-danger" href="javascript:void(0);"> Event Info</a>
             
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash"></span> Delete</a>
            </div>
          </div>
          <!-- Dropdown Buttons options --></td>
        </tr>
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
   
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="addHolidayModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-calendar fa-2x"></span> Add Upcoming Event</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="route_name">EVENT DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" placeholder="A Day Sweing Workshop">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="organizer"> ORGANIZER </label>
                <input type="text" class="form-control form-control-lg" name="organizer" placeholder="Student Union">
                </div>
              </div>
               
                   <div class="col-md-3">
                     <div class="form-group">
                  <label for="class_teacher">DATE </label>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control form-control-lg pickadate">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
                </div>
              </div>
              <div class="col-md-3">
                     <div class="form-group">
                  <label for="class_teacher">EVENT TIME </label>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="date" class="form-control form-control-lg pickatime-format">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
                </div>
              </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="venue"> EVENT VENUE </label>
                <input type="text" class="form-control form-control-lg" name="venue" placeholder="School Main Hall">
                </div>
              </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="image"> EVENT IMAGE </label>
                <input type="file" class="form-control form-control-lg" name="image" placeholder="Student Union">
                </div>
              </div>
              
               <div class="col-12 mt-1">
                      <fieldset class="form-label-group mb-0">
                          <textarea data-length=1000 class="form-control char-textarea" id="textarea-counter" rows="5" placeholder="Instruction (Max Character (1000))"></textarea>
                          <label for="textarea-counter">Event Details (Max Character (1000))</label>
                      </fieldset>
                      <small class="counter-value float-right"><span class="char-count">0</span> / 1000 </small>
                  </div>
             <div class="col-md-6">
               <div class="form-group">
                   <fieldset>
                    <div class="checkbox">
                      <input type="checkbox" class="checkbox__input" id="checkbox1">
                      <label for="checkbox1">Signed by Director </label>
                    </div>
                  </fieldset>
               </div>
             </div>
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="d-none d-sm-block"><span class="fa fa-calendar fa-1x"></span> Save Class</span>
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
  
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
   <script>
     $(document).ready(function(){
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