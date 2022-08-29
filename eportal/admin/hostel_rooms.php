<?php 
require_once "helpers/helper.php";
 ?>

  <?php 

if (isset($_GET['hostel']) && $_GET['hostel'] !=="" && isset($_GET['action']) && $_GET['action'] ==="view") {
  $hostelId = $Configuration->Clean($_GET['hostel']);
  $hostel_details = $Hostel->getHostelById($hostelId);
  // $roomDetails = $Hostel->getHostelRoomById($roomId);
}else{
  header("Location: ./create_hostel");
  exit();
 
}
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: View <?php echo $hostel_details->hostel_desc; ?> Rooms</title>
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
                  <li class="breadcrumb-item active">Hostel Rooms
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
 <div class="col-12">
    <h3 class="bd-lead text-primary text-bold text-uppercase"><span class="fa fa-hotel fa-1x"></span> <?php echo $hostel_details->hostel_desc; ?> Rooms Info (<?php echo $hostel_details->hostel_type;?> Hostel)</h3>
  </div>
</div>

<!-- Statistics Cards Starts -->
        <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-hotel fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Bed Space</h3></div>
                  <h2 class="text-white mb-0"><?php echo number_format($Hostel->countSumOfTotalBeds($hostelId)); ?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-hotel fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Occupied</h3></div>
                  <h2 class="text-white mb-0"> <?php echo number_format($Hostel->countBedSpaceByStatus($hostelId,2)); ?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-hotel fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Available</h3></div>
                  <h2 class="text-white mb-0"><?php echo number_format($Hostel->countBedSpaceByStatus($hostelId,1)); ?></h2>
                  
                </div>
              </div>
            </div>
           
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <button class="btn btn-dark btn-md btn-round add_hostel_room_btn" type="button"><span class="fa fa-plus"></span> Add Room</button>
             <button onclick="window.location.href='create_hostel'" class="btn btn-primary btn-md btn-round" type="button">Go To Hostel</button>
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped osotechDatatable text-center">
              <thead>
                 <tr>
                  <th>Hostel</th>
                 <th>Type</th>
                 <th>Room Desc</th>
                 <th>Bed Space</th>
                 <th>Price</th>
                 <th>Action</th>
               </tr>
              </thead>
              <tbody>
                <?php $get_all_rooms = $Hostel->getAllHostelRoomsByHostelId($hostelId);
                if ($get_all_rooms) {
                  $cnt = 0;
                  foreach ($get_all_rooms as $getRoom) {
                    // $hostels = $Hostel->getHostelById($getRoom->hostel_id);
                    $cnt++;
                    ?>
                     <tr>
                 <td><?php echo strtoupper($hostel_details->hostel_desc);?></td>
                <td><?php echo strtoupper($hostel_details->hostel_type);?></td>
                <td><?php echo ucwords($getRoom->room_desc);?></td>
                <td><?php echo ($getRoom->beds);?></td>
                <td><?php echo number_format($getRoom->amount,2);?></td>
                 <td>
                  <button onclick="window.location.href='view_hostel_rooms?hostel=<?php echo $getRoom->hostel_id;?>&room=<?php echo $getRoom->roomId;?>'"  type="button" title="View Bed Space" class="btn btn-dark btn-rounded-0"><span  class="fa fa-eye"></span> Beds</button></td>
                </tr>
                    <?php
                    // code...
                  }
                   // code...
                 } ?>
               
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
  <?php include ("../Modals/newHosteRoomModal.php");?>
  
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
    <script src="smappjs/hostel_rooms.js"></script>
  </body>
  <!-- END: Body-->

</html>