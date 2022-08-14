<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo ucwords($SmappDetails->school_name) ?> :: Manage Holidays </title>
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
                 <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
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
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Upcoming</h3></div>
                  <h2 class="text-white mb-0"> <?php echo 20;?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Observed</h3></div>
                  <h2 class="text-white mb-0"><?php echo 30;?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-calendar fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Holidays</h3></div>
                  <h2 class="text-white mb-0"><?php echo 50; ?></h2>
                  
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->
    <div class="card">
      <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-round" data-toggle="modal" data-target="#addHolidayModal"><span class="fa fa-calendar fa-1x"></span> Add Holiday</button>
        </div>
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-hover table-bordered">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>DESC</th>
          <th>BY</th>
          <th>FROM</th>
          <th>TO</th>
          <th>STATUS</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <tr>
          <td>1</td>
          <td>Public Holiday</td>
          <td>Federal Govt</td>
          <td><?php echo date("Y-m-d");?></td>
          <td><?php echo date("Y-m-d",strtotime('+ 5days'));?></td>
          <td><span class="badge badge-pill badge-success">Observed</span></td>
         <td> <!-- Dropdown Buttons options -->
    <div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-warning">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-cogs"></span>Read Info</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash"></span> Delete</a>
            </div>
          </div>
          <!-- Dropdown Buttons options -->
        </td>
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
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-calendar fa-1x"></span> Add Holiday</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">HOLIDAY DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" placeholder="Public Holiday">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="class_division"> DECLARED BY </label>
               <select name="class_division" id="class_division" class="select2 form-control form-control-lg">
                 <option value="">--select--</option>
                 <option value="A">Federal Government</option>
                 <option value="B">School Authority</option>
               </select>
                </div>
              </div>
               
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="class_teacher">DATE FROM </label>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control form-control-lg pickadate" placeholder="Select a Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
                </div>
              </div>
              <div class="col-md-6">
                     <div class="form-group">
                  <label for="class_teacher">DATE TO </label>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control form-control-lg pickadate" placeholder="Select a Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
                </div>
              </div>
               <div class="col-12 mt-1">
                      <fieldset class="form-label-group mb-0">
                          <textarea data-length=150 class="form-control char-textarea" id="textarea-counter" rows="3" placeholder="More Information (Max Character (150))"></textarea>
                          <label for="textarea-counter">More Information (Max Character (150))</label>
                      </fieldset>
                      <small class="counter-value float-right"><span class="char-count">0</span> / 150 </small>
                  </div>
           
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                   <span class="fa fa-calendar fa-1x"></span> Save</button>
                  <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Back
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