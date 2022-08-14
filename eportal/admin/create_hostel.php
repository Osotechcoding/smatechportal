<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Manage Hostel</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
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
                <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Manage Hostel
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-hotel fa-2x"></span> HOSTEL MANAGEMENT MODULE</h3>
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
                    <i class="fa fa-home fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Total Hostels</h3></div>
                  <h2 class="text-white mb-0"><?php echo 2; ?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-hotel fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Total Rooms</h3></div>
                  <h2 class="text-white mb-0"> <?php echo 20;?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-hotel fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Total Bed Space</h3></div>
                  <h2 class="text-white mb-0"><?php echo 80;?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-hotel fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Available Bed Space</h3></div>
                  <h2 class="text-white mb-0"><?php echo 10; ?></h2>
                  
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->
    <div class="card">
      <div class="card-header">
        <button class="btn btn-outline-primary btn-md btn-round" type="button" data-toggle="modal" data-target="#addHostelModal"><span class="fa fa-hotel fa-1x"></span> Add Hostel</button>
       <a href="view_hostel_rooms"> <button class="btn btn-outline-primary btn-md btn-round" type="button">View Rooms</button></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechExp table-hover table-bordered">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>HOSTEL DESC</th>
          <th>TYPE</th>
          <th>HOSTEL ADMIN</th>
          <th>TOTAL ROOMS</th>
          <th>STATUS</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <tr>
          <td>1</td>
          <td>VISAP HOSTEL</td>
          <td>Boys Hostel</td>
          <td>Mr Ajayi Sam</td>
          <td>5</td>
           <td><span class="badge badge-success badge-pill"> <i class="fa fa-check"></i> active</span></td>
         <td>
           <div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-dark">Options</button>
            <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item add_hostel_room_btn" data-id="1" data-action="add_room" href="javascript:void(0);">Add Room</a>
                <a class="dropdown-item view_hostel_room_btn" data-id="1" data-action="view_room" href="javascript:void(0);">View Room</a>
              <a class="dropdown-item" href="javascript:void(0);">Active</a>
              <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash m-0"></span> Delete</a>
            </div>
          </div>
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
   <!--  -->
   <?php include ("../Modals/newHosteRoomModal.php");?>
    <?php include ("../Modals/NewHostelModal.php"); ?>

    
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <script>
     $(document).ready(function(){
      //when add room btn is clicked
      $(document).on("click",".add_hostel_room_btn", function(){
        let hostel_id = $(this).data("id");
        let action = $(this).data("action");
      //  alert(hostel_id+" "+ action);
        //show modal form
        $("#hostelRoomModal").modal("show");
        //when submit create room is clicked redirect to view_hostel_rooms.php
        //here...
      })
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