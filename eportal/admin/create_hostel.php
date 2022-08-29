<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Hostel Management</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
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
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-hotel fa-1x"></span> HOSTEL MANAGEMENT MODULE</h3>
  </div>
</div>
 <!-- Statistics Cards Starts -->
        <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-home fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Hostels</h3></div>
                  <h2 class="text-white mb-0"><?php echo number_format($Hostel->countDataByTableColumn("visap_hostel_tbl","hostel_id")); ?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-hotel fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Rooms</h3></div>
                  <h2 class="text-white mb-0"> <?php echo number_format($Hostel->countDataByTableColumn("visap_hostel_rooms_tbl","roomId")); ?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-hotel fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Bed Space</h3></div>
                  <h2 class="text-white mb-0"><?php echo number_format($Hostel->countDataByTableColumn("visap_bed_space_tbl","bedId")); ?></h2>
                  
                </div>
              </div>
            </div>
           
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->
    <div class="card">
      <div class="card-header">
        <button class="btn btn-dark btn-lg btn-round" type="button" data-toggle="modal" data-target="#addHostelModal"><span class="fa fa-hotel fa-1x"></span> Add Hostel</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>Hostel</th>
          <th>Type</th>
          <th>Master</th>
          <th>Status</th>
          <th>Rooms</th>
          <th>Action</th>
        </tr>
      </thead>
        <tbody class="text-center">
            <?php $get_all_hostels = $Hostel->getHostels();

            if ($get_all_hostels) {
              $cnt = 0;
              foreach ($get_all_hostels as $hostel) {
                $hostel_status = (bool)$hostel->status;
                $cnt++;?>
                <tr>
                <td><?php echo $cnt; ?> </td>
                <td><?php echo ucwords($hostel->hostel_desc);?></td>
                <td><?php echo ucwords($hostel->hostel_type);?> Hostel</td>
                <td><?php echo ucwords($hostel->hostel_master);?></td>
           <td> <?php 
           switch($hostel_status){
                case true:
                echo '<span class="badge badge-success badge-pill"> <i class="fa fa-check-circle"></i> Opened</span>';
                break;
                 case false:
                echo '<span class="badge badge-danger badge-pill"> <i class="fa fa-lock"></i> Closed</span>';
                break;
                default :
                echo '<span class="badge badge-danger badge-pill"> <i class="fa fa-lock"></i> Closed</span>';
                break;
           }
            ?> </td>
            <td>
              <?php if ($hostel_status == true): ?>
                 <button onclick="window.location.href='hostel_rooms?hostel=<?php echo $hostel->hostel_id;?>&action=view'" type="button" title="View Rooms" class="btn btn-dark btn-rounded-0"><span class="fa fa-eye"></span> View</button></td>
                <?php else: ?>
                   <button type="button" disabled class="btn btn-danger btn-rounded-0 disabled"><span class="fa fa-eye-slash"></span>Closed</button></td>
              <?php endif ?>
                 
         <td>
           <div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-dark">Options</button>
            <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
              <?php if ($hostel_status == true): ?>
                  <a class="dropdown-item text-center hostel_enable_disable_btn" data-id="<?php echo $hostel->hostel_id;?>" data-action="disable" href="javascript:void(0);"><span class="fa fa-times-circle mr-1"></span> Close</a> 
                <?php else: ?>
                   <a class="dropdown-item text-info hostel_enable_disable_btn" data-id="<?php echo $hostel->hostel_id;?>" data-action="enable" href="javascript:void(0);"><span class="fa fa-check-circle mr-1"></span> Open</a>
              <?php endif ?>
             
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash mr-1"></span> Remove</a>
            </div>
          </div>
        </td>
        </tr>
                <?php
              }
             } ?>
          
        
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
   <?php //include ("../Modals/newHosteRoomModal.php");?>
    <?php include ("../Modals/NewHostelModal.php"); ?>

  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
    <script src="smappjs/create_hostel.js"></script>
   
  </body>
  <!-- END: Body-->

</html>