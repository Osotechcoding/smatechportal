<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Manage Bus Routes</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- headerNav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">ROUTES LIST
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-bus fa-1x"></span> SCHOOL BUS MANAGEMENT</h3>
  </div>
</div>
<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <!-- Statistics Cards Starts -->
          <?php include_once ("Links/schoolBusLinks.php"); ?>
       <!-- Revenue Growth Chart Starts -->
  <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-round" data-toggle="modal" data-target="#routeModal"><span class="fa fa-plus fa-1x"></span> Add</button>
        </div>
        <div class="card-body card-dashboard">
        <div class="table-responsive">
            <table class="table table-striped table-bordered osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>S/N</th>
                  <th>Driver</th>
                  <th>Vehicle</th>
                  <th>Route Desc</th>
                  <th width="30%">(B/Stops)</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody class="text-center">
                <?php $allRoutes = $Bus->getAllBusRoutes();
                if ($allRoutes) {
                  $cnt=0;
                  foreach ($allRoutes as $route) {
                    $driver = $Bus->getSingleValue("visap_driver_tbl","dId",$route->driverId);
                    $motor = $Bus->getSingleValue("visap_bus_tbl","busId",$route->vehicleId);
                    $busstops_arr = explode(",",$route->bus_stops);
                    $cnt++;
                    ?>
                 <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php if (!$driver) {
                   echo 'No Driver Assigned';
                  }else{
                    echo $driver->driver_name;
                  }

                ?></td>
                  <td><?php if (!$motor) {
                   echo 'No Vehicle Assigned';
                  }else{
                    echo $motor->vehicle_desc;
                  }

                ?></td>
                  <td><?php echo ucwords($route->route_desc);?></td>
                  <td><?php echo ucwords($route->bus_stops);?> <!-- <?php //foreach ($busstops_arr as $value): ?>
                    <span class="badge badge-pill badge-dark badge-md mb-1"><?php //echo $value;?></span>
                  <?php //endforeach ?> -->
                   </td>
                  <td>&#8358;<?php echo number_format($route->route_price,2);?></td>
                  <td><button type="button"  title="Edit" class="badge badge-pill badge-dark badge-md m-1 edit_route_btn"><span class="fa fa-edit"></span> Edit</button> <button type="button" class="badge badge-pill badge-danger badge-md delete_route_btn" data-id="<?php echo $route->id;?>" data-action="delete"><i class="fa fa-trash"></i> Delete</button></td>
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
<!-- Column selectors with Export Options and print table -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

    </div>
   
    <!-- BEGIN: Footer-->

    <!-- BUS MODAL Start -->
    <!-- modal-dialog-scrollable -->
   <div class="modal fade" id="routeModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-center modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-bus fa-1x"></i> Add Routes</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <form id="newRouteForm">
                  <input type="hidden" name="action" value="create_student_bus_route_now">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                    <div class="col-md-12">
                  <div class="form-group">
                  <label for="vehicle_id">Vehicle &amp; Capacity</label>
              <select name="vehicle_id" id="vehicle_id" class="custom-select form-control form-control-lg">
                <option value="" selected>Choose...</option>
                <?php echo $Bus->getAllVehiclesInDropDown();?>
              </select>
                    </div>
               </div>
               <div class="col-md-12">
                     <div class="form-group">
                  <label for="driver_id">Driver</label>
                <select name="driver_id" id="driver_id" class="custom-select form-control form-control-lg">
                <option value="" selected>Choose...</option>
                <?php echo $Bus->getAllVehiclesDriversInDropDown();?>
              </select>
                    </div>
                  </div>
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="route_name">ROUTE DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="route_name" placeholder="Route Desc">
                    </div>
               </div>

               <div class="col-md-12">
                  <div class="form-group">
                  <label for="busstops">Bus Stops <span class="text-danger">(B/Stops should be separarted by commas</span>) </label>
                <textarea class="form-control form-control-lg" name="busstops" placeholder="e.g gasline,Poultry,NNPC, Four Junction etc"></textarea>
                    </div>
               </div>

                <div class="col-md-6">
                     <div class="form-group">
                  <label for="price">Price Per Term (&#8358;)</label>
                <input type="number" autocomplete="off" class="form-control form-control-lg" name="price" placeholder="e.g 20,000.00">
                    </div>
                  </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="auth_code">Authentication Code</label>
                <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="***********">
                    </div>
                  </div>
              
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark btn-lg ml-1 __loadingBtn__">Create</button>
                  <button type="button" class="btn btn-danger btn-lg ml-1" data-dismiss="modal">
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
    <script src="smappjs/bus_route.js"></script>
  </body>
  <!-- END: Body-->
</html>