<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <!-- metaTag -->
  <?php include("../template/MetaTag.php"); ?>
  <title><?php echo $SmappDetails->school_name ?> :: BUS &amp; MAINTENANCE</title>
  <?php include("../template/dataTableHeaderLink.php"); ?>
  <!-- include dataTableHeaderLink.php -->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

  <!-- BEGIN: Header-->
  <?php include("template/HeaderNav.php"); ?>
  <!-- headerNav.php -->
  <!-- END: Header-->


  <!-- BEGIN: Main Menu-->
  <!--  -->
  <?php include("template/Sidebar.php"); ?>
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
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li>
                <li class="breadcrumb-item active">BUS MAINTENANCE
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-bus fa-1x"></span> BUS MAINTENANCE MODULE</h3>
          </div>
        </div>

        <!-- Column selectors with Export Options and print table -->
        <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <button type="button" class="btn btn-dark btn-md btn-round" data-toggle="modal"
                    data-target="#busModal"><span class="fa fa-plus fa-1x"></span> Add</button>
                </div>
                <div class="card-body card-dashboard">

                  <div class="table-responsive">
                    <table class="table table-striped table-bordered osotechDatatable">
                      <thead class="text-center">
                        <tr>

                          <th>Driver's Name</th>
                          <th>Bus desc</th>
                          <th>Plate No</th>
                          <th>Maintainnace Type</th>
                          <th>Cost</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <?php
                        $allBusMaintainanceDetails = $Bus->getAllBusMaintainanceInfo();

                        if ($allBusMaintainanceDetails) : ?>
                        <?php foreach ($allBusMaintainanceDetails as $maintainance) :  ?>
                        <?php
                            $driver_details = $Bus->getSingleValue("visap_driver_tbl", "dId", $maintainance->driverId);
                            $bus_details = $Bus->getSingleValue("visap_bus_tbl", "busId", $maintainance->busId);
                            ?>
                        <tr>

                          <td>
                            <img src="../vehicles/<?php echo $driver_details->driver_image; ?>" width="60"
                              class="rounded-circle" alt="photo"><br /> Mr
                            <?php echo $driver_details->driver_name; ?>
                          </td>
                          <td><?php echo $bus_details->vehicle_desc; ?></td>
                          <td><?php echo $bus_details->vehicle_plate_no; ?></td>
                          <td><?php echo $maintainance->repair_type; ?></td>
                          <td>&#8358;<?php echo number_format($maintainance->cost_price, 2); ?></td>
                          <td><span
                              class="badge badge-pill badge-success badge-md"><?php echo date("F jS Y", strtotime($maintainance->created_on)) ?></span>
                          </td>
                          <td>
                            <!-- <button type="button" class="badge badge-pill badge-dark badge-sm"><i
                                class="fa fa-edit"></i></button> -->
                            <button type="button"
                              class="badge badge-pill badge-danger badge-sm delete_btn_<?php echo $maintainance->id ?> loadingBtn__"
                              data-action="remove_bus_maintainance_details" data-id="<?php echo $maintainance->id; ?>"
                              title="Click to delete record"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>

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
  <div class="modal fade" id="busModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i
              class="fa fa-bus fa-1x"></i> Add Maintainance</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="bx bx-x"></i>
          </button>
        </div>
        <form id="addBusMaintainanceForm">
          <input type="hidden" name="action" value="_addBusMaintainance_">
          <div class="modal-body">
            <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="driver_id">DRIVER</label>
                    <select name="driver_id" id="driver_id" class="custom-select form-control form-control-lg">
                      <option value="" selected>Choose...</option>
                      <?php echo $Bus->getAllVehiclesDriversInDropDown(); ?>
                    </select>
                  </div>
                </div>
                <!-- BUS WILL AUTO DISPLAY WHEN DRIVER IS SELECTED -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="vehicle_id">BUS DESCRIPTION</label>
                    <select name="vehicle_id" id="vehicle_id" class="custom-select form-control form-control-lg">
                      <option value="" selected>Choose...</option>
                      <?php echo $Bus->getAllVehiclesInDropDown(); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="cost_type">MAINTAINANCE TYPE </label>
                    <input type="text" class="form-control form-control-lg" placeholder="Enter Maintainance Type"
                      name="cost_type">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cost">Cost of Maintainance</label>
                    <input type="number" autocomplete="off" class="form-control form-control-lg" name="cost"
                      placeholder="e.g 20,000">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="date">DATE </label>
                    <input type="date" autocomplete="off" class="form-control form-control-lg" name="date" id="date">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="auth_code">Authentication Code </label>
                    <input type="password" autocomplete="off" class="form-control" name="auth_code">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
              <span class="fa fa-paper-plane"></span> Submit</button>
            <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
              <span class="fa fa-power-off"></span> Back
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- BUS MODAL  END -->
  <?php include("../template/footer.php"); ?>
  <!-- END: Footer-->
  <!-- BEGIN: Vendor JS-->
  <?php include("../template/DataTableFooterScript.php"); ?>
  <script src="smappjs/running_cost.js"></script>
</body>
<!-- END: Body-->

</html>