<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: BUS &amp; MAINTENANCE</title>
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
             <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
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
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-bus fa-2x"></span> BUS MAINTENANCE MODULE</h3>
  </div>
</div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-round" data-toggle="modal" data-target="#busModal"><span class="fa fa-cogs fa-1x"></span>  Add Maintenance</button>
        </div>
        <div class="card-body card-dashboard">
       
        <div class="table-responsive">
            <table class="table table-striped table-bordered osotechDatatable">
              <thead class="text-center">
                <tr>
                 
                  <th>Driver Name</th>
                  <th>Bus desc</th>
                  <th>Plate No</th>
                  <th>Maintainnace Type</th>
                  <th>Cost</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                 
                  <td><!-- <img src="assets/loaders/osotech.png" width="50" class="rounded-circle" alt="photo"><br>  -->Mr Ojo Segun</td>
                  <td>BMW 2018 Model</td>
                  <td>KJA-123-XA</td>
                  <td>Flat Tyre</td>
                  <td>&#8358;2,000.00</td>
                  <td><span class="badge badge-pill badge-success badge-md">15-03-2022</span></td>
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
   <div class="modal fade" id="busModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-bus fa-2x"></i> Add Maintainance</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">DRIVER'S NAME </label>
               <select name="health" id="health" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="adekola">Adekola Oluwasegun</option>
                 <option value="Mubarak">Mubarak Toheeb</option>
                 <option value="Adeola">Adeola Isiaka</option>
               </select>
                </div>
              </div>
              <!-- BUS WILL AUTO DISPLAY WHEN DRIVER IS SELECTED -->
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">BUS DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="BMW 2018 Model" readonly>
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_plate_no">PLATE NUMBER</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_plate_no" placeholder="KJA-002-XA" readonly>
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">MAINTAINANCE TYPE </label>
               <select name="health" id="health" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="fuel">Purchase of Fuel</option>
                 <option value="flattyre">Flat Typre</option>
                 <option value="engineoil">Purchase of Engine Oil</option>
                 <option value="Service">Engine Service</option>
               </select>
                </div>
              </div>

                   <div class="col-md-6">
                   <div class="form-group">
                  <label for="cost">COST OF MAINTAINANCE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="cost" placeholder="Cost of Repair or Maintainance">
             
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="driver_name">DATE </label>
                <input type="date" autocomplete="off" class="form-control form-control-lg" name="date" placeholder="Adekola Oni Samuel">
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