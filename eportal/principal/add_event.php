<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo ucwords($SmappDetails->school_name) ?> EVENT MANAGEMENT</title>
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
                  <li class="breadcrumb-item active">Manage School Events
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-calendar fa-1x"></span> SCHOOL EVENTS</h3>
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
                  <h2 class="text-white mb-0"><?php echo $Blog->count_today_events();?></h2>
                 
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
                  <h2 class="text-white mb-0"><?php echo $Blog->count_Upcoming_events();?></h2>
                  
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
                  <h2 class="text-white mb-0"><?php echo $Blog->count_all_events_by_status(2);?></h2>
                  
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
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
                $all_events = $Blog->get_all_active_events();
                if ($all_events) {
                  foreach ($all_events as $values) {
                   
                    ?>
          <tr>
            <td><img src="../events-images/<?php echo $values->event_image;?>" alt="EventImage" width="100"></td>
          <td><?php echo $values->event_title;?></td>
          <td><?php echo $values->eorganizer;?></td>
          <td><?php echo date("M j, Y",strtotime($values->edate));?> &nbsp; <?php echo date("h:i:s A",strtotime($values->etime));?></td>
          <td><?php echo $values->evenue;?></td>
          <td><?php if (str_word_count($values->event_detail) > '20') {
                  echo substr($values->event_detail,0,20)."...";
                  echo '<span class="badge badge-warning badge-md badge-pill view_event_details_btn" style="cursor:pointer;" data-info="'.$values->event_detail.'">Read Full Content</span>';
                  }else{
                    echo $values->event_detail;
                  }
                  ?></td>
          <td> 
<?php $eventDate = date("Y-m-d",strtotime($values->edate)); 
$cudate = date("Y-m-d");
?>
<?php if ($eventDate > $cudate) {
 echo '<span class="badge badge-pill badge-warning">upcoming</span>';
}elseif ($eventDate == $cudate) {
 echo '<span class="badge badge-pill badge-success">Today\'s Event</span>';
}else{
  echo ' <span class="badge badge-pill badge-dark">Past Event</span>';
}
 ?> </td>
         
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
    </div>
    <!-- END: Content-->
   <!-- BEGIN: Customizer-->
   <?php //include ("template/Customizer.php");?>
    <!-- End: Customizer-->
    </div>
    <!-- demo chat-->
    <?php include ("template/ChatDemo.php");?>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->

  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php"); ?>

   <script>
     $(document).ready(function(){
     
     })
   </script>
  </body>
  <!-- END: Body-->

</html>