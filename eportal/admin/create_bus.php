<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: School Vehicles</title>
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
                  <li class="breadcrumb-item active">SCHOOL VEHICLES
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
          <button type="button" class="btn btn-dark btn-md btn-round" data-toggle="modal" data-target="#busModal"><span class="fa fa-bus fa-1x"></span> Add Vehicle</button>
        </div>
        <div class="card-body card-dashboard">
       
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead class="text-center">
                <tr>
                  <th>S/N</th>
                  <th>Image</th>
                   <th>Vehicle Desc</th>
                  <th>Plate No</th>
                  <th>Capacity</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $allVehicles = $Bus->getAllVehicles();
                if ($allVehicles) {
                  $cnt=0;
                  foreach ($allVehicles as $vehicle) {
                    $cnt++;
                    ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><img src="../vehicles/<?php echo $vehicle->vehicle_image;?>" alt="" class="img-fluid" width="100" style="border-radius: 10px;border: 2px solid #f12d60;"></td>
                  <td><?php echo $vehicle->vehicle_desc ?></td>
                  <td><?php echo strtoupper($vehicle->vehicle_plate_no) ?></td>
                  <td><?php echo $vehicle->vehicle_capacity;?></td>
                  <td> <?php echo date("D jS M, Y",strtotime($vehicle->created_at)) ?> </td>
                  <td><button type="button" data-name="<?php echo $vehicle->vehicle_desc;?>" data-plate="<?php echo $vehicle->vehicle_plate_no;?>" data-capacity="<?php echo $vehicle->vehicle_capacity;?>" data-id="<?php echo $vehicle->busId;?>" class="badge badge-pill badge-dark badge-md edit_btn m-1"><i class="fa fa-edit"></i> Edit</button> <button type="button" data-action="delete_school_bus" data-id="<?php echo $vehicle->busId;?>" class="badge badge-pill badge-danger badge-md delete_bu_btn myLoadingBtn_<?php echo $vehicle->busId;?>"><i class="fa fa-trash"></i> Delete</button></td>
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
   <div class="modal fade" id="busModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-bus fa-1x"></i> Add New Vehicle</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <form id="addNewBusModalForm" enctype="multipart/form-data" method="post">
                  <input type="hidden" name="action" value="submit_new_school_bus">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="vehicle_name">Vehicle Desc</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="vehicle_name" placeholder="BMW 2018 Model">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="plate_no">Number Plate</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="plate_no" placeholder="KJA-123-XA" id="plate_no">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="capacity">Vehicle Capacity</label>
                <input type="number" autocomplete="off" class="form-control form-control-lg" name="capacity" placeholder="e.g 30">
                    </div>
                  </div>
        
               <div class="col-md-6">
                 <div class="form-group">
                  <label for="vehicleImage">Vehicle Image (<span class="text-danger"><small>200KB Max</small></span>)</label>
                <input type="file" id="vehicleImage" onchange="previewFile(this);" autocomplete="off" class="form-control form-control-lg" name="vehicleImage">
                    </div>

                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="auth_code">Authentication Code</label>
                <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="*******">
                    </div>
                  </div>
              
                 </div>
                  </div>
                  <div class="col-md-6 offset-md-3" id="uploaded_passport">
  <img id="previewImg" width="200" src="../assets/loaders/placeholder.png" alt="Placeholder" style="border: 2px solid darkblue;border-radius:10px;">
  <p>Your File Size: <span id="ImageSize"></span></p>
</div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark btn-lg ml-1 __loadingBtn__">Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Back
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->

    <?php include_once ("../Modals/editSchoolBusModal.php");?>
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
    <script src="smappjs/create_bus.js"></script>
  </body>
  <!-- END: Body-->
</html>