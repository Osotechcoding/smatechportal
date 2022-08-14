<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: EVENT MANAGEMENT</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']) ?> </a>
                  </li>
                  <li class="breadcrumb-item active"> School Events
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-calendar-o fa-1x"></span> SCHOOL EVENTS</h3>
  </div>
          </div>
           
    <div class="card">
     
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-hover table-bordered">
        <thead class="text-center">


          <tr>
            <th>Image</th>
          <th>TITLE</th>
          <th>ORGANIZER</th>
          <th> DATE/TIME</th>
          <th>VENUE</th>
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
    </div>
   
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