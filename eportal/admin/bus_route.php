<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> ::  BUS &amp; ROUTE</title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">DRIVER & BUS
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-bus fa-2x"></span> SCHOOL BUS MANAGEMENT</h3>
  </div>
</div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
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
                  <div class="text-white line-ellipsis"><h3 class="text-white">Drivers</h3></div>
                  <h2 class="text-white mb-0"><?php echo 10; ?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-bus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Buses</h3></div>
                  <h2 class="text-white mb-0"> <?php echo 20;?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-graduation-cap fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Female Assigned</h3></div>
                  <h2 class="text-white mb-0"><?php echo 30;?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-graduation-cap fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Male Assigned</h3></div>
                  <h2 class="text-white mb-0"><?php echo 50; ?></h2>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-round" data-toggle="modal" data-target="#busModal"><span class="fa fa-bus fa-1x"></span> Register Bus</button>
        </div>
        <div class="card-body card-dashboard">
       
        <div class="table-responsive">
            <table class="table table-striped table-bordered osotechDatatable">
              <thead class="text-center">
                <tr>
                 
                  <th>Driver Name</th>
                  <th>Phone</th>
                  <th>Bus desc</th>
                  <th>Plate No</th>
                  <th>Student Convey</th>
                  <th>Route Desc</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                 
                  <td><!-- <img src="assets/loaders/osotech.png" width="50" class="rounded-circle" alt="photo"><br>  -->Mr Ojo Segun</td>
                  <td>09087***765</td>
                  <td>BMW 2018 Model</td>
                  <td>KJA-123-XA</td>
                  <td>24</td>
                  <td>Ijaye Route</td>
                  <td><span class="badge badge-pill badge-success badge-md">Active</span></td>
                  <td><button type="button" class="badge badge-pill badge-danger badge-md"><i class="fa fa-trash"></i> Delete</button></td>
                </tr>
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
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-bus fa-2x"></i> Add New Bus,Route & Driver</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <form action="">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">ROUTE DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" placeholder="Route Desc">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="price">ROUTE CHARGES</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="price" placeholder="&#8358;55,000.00">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">BUS DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="BMW 2018 Model">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_plate_no">PLATE NUMBER</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_plate_no" placeholder="KJA-002-XA">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_plate_no">BUS COLOR</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_plate_no" placeholder="Lemon green">
                    </div>
                  </div>
                   <div class="col-md-6">
                   <div class="form-group">
                  <label for="bus_capacity">BUS CAPACITY</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_capacity" placeholder="45 Students per trip">
             
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="driver_name">DRIVER'S NAME </label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="driver_name" placeholder="Adekola Oni Samuel">
                    </div>
                  </div>
                     <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">DRIVER'S PHONE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="phone" placeholder="081***43452">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="email">DRIVER'S EMAIL ADDRESS</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="email" placeholder="expert_driver@visap.edu.ng">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="license_id">DRIVER'S LICENSE ID </label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="license_id" placeholder="ADK090986420220321">
                </div>
              </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="route_name">RESIDENTIAL ADDRESS</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" placeholder="xyz street, Sango Ota Ogun State">
           
                    </div>
                  </div>
                    
               <div class="col-md-6">
                 <div class="form-group">
                  <label for="photo">DRIVER'S PASSPORT (<span class="text-danger"><small>500KB Max</small></span>)</label>
                <input type="file" autocomplete="off" class="form-control form-control-lg" name="passport">
           
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="g_name">GUARANTOR'S NAME</label>
              <input type="text" autocomplete="off" class="form-control form-control-lg" name="g_name" placeholder="Mr Ogunsuyi Omotosho">
                </div>
              </div>
               <div class="col-md-12">
                     <div class="form-group">
                  <label for="route_name">GUARANTOR'S  ADDRESS </label>
              <input type="text" autocomplete="off" class="form-control form-control-lg" name="g_address" placeholder="Sango Ota Ogun State">
                </div>
              </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">GUARANTOR'S  PHONE </label>
               <input type="text" autocomplete="off" class="form-control form-control-lg" name="g_phone" placeholder="0901209797">
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                  <label for="g_passport">GUARANTOR'S PASSPORT (<span class="text-danger"><small>500KB Max</small></span>)</label>
                <input type="file" autocomplete="off" class="form-control form-control-lg" name="g_passport">
           
                    </div>
                  </div>
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="fa fa-paper-plane"></span> Submit</button>
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
  </body>
  <!-- END: Body-->

</html>