<?php 
require_once "helpers/helper.php";
 ?>

 <?php 

if (isset($_GET['hostel']) && isset($_GET['room']) && $_GET['room'] !=="") {
  $roomId = $Configuration->Clean($_GET['room']);
  $hostelId = $Configuration->Clean($_GET['hostel']);
  $hostel_details = $Hostel->getHostelById($hostelId);
  $bonk_details = $Hostel->getAllBedSpaceByRoomId($roomId);
  $roomDetails = $Hostel->getHostelRoomById($roomId);
}else{
  header("Location: ./hostel_rooms");
  exit();
 
}
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Viewing <?php echo ucwords($roomDetails->room_desc) ?>  Bed Space</title>
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
                  <li class="breadcrumb-item active"><?php echo strtoupper($hostel_details->hostel_desc) ?> &raquo; <?php echo strtoupper($roomDetails->room_desc) ?>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
 <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-hotel fa-1x"></span> <?php echo strtoupper($hostel_details->hostel_desc) ?> &raquo; (<?php echo strtoupper($hostel_details->hostel_type) ?> HOSTEL) &raquo; <?php echo strtoupper($roomDetails->room_desc) ?> </h3>
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
                  <h2 class="text-white mb-0"><?php echo number_format($roomDetails->beds); ?></h2>
                  
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
                  <h2 class="text-white mb-0"> <?php echo number_format($Hostel->countBedSpaceByHostelIdRoomIdByStatus($hostelId,$roomId,2)); ?></h2>
                 
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
                  <h2 class="text-white mb-0"><?php echo number_format($Hostel->countBedSpaceByHostelIdRoomIdByStatus($hostelId,$roomId,1)); ?></h2>
                  
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
            <button onclick="window.history.back();" class="btn btn-dark btn-md btn-rounded" type="button"><span class="fa fa-arrow-left"></span> Go Back</button>
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped text-center">
              <thead>
                 <tr>
                  <th>Hostel Desc</th>
                  <th>Duration</th>
                 <th>Space</th>
                 <th>Amount</th>
                 <th>Paid</th>
                 <th>Status</th>
                 <th>Action/ Payment</th>
               </tr>
              </thead>
              <tbody>

                <?php if ($bonk_details) {
                 foreach ($bonk_details as $bonk) {
                   $hostels = $Hostel->getHostelById($bonk->hostel_id);
                   $student_data = $Student->get_student_data_byId($bonk->occupant);

                   ?>
                    <tr>
                  <td> <?php if ($student_data) {
                    //check for the gender
                    if ($student_data->stdPassport == NULL || $student_data->stdPassport =="") {
                     if ($student_data->stdGender == "Male") {
                      echo '<img src="../schoolImages/students/male.png" width="60" style="border-radius: 10px;border: 3px solid deepskyblue;" alt="student-passport">';
                     }else{
                      echo '<img src="../schoolImages/students/female.png" width="60" style="border-radius: 10px;border: 3px solid deepskyblue;" alt="student-passport">';
                     }
                    }else{
                  echo ' <img src="../schoolImages/students/'.$student_data->stdPassport.'" width="60" style="border-radius: 10px;border: 3px solid deepskyblue;" alt="student-passport">';
                    }
                  }else{
                      echo '<span class="badge badge-dark badge-pill">No occupant</span>';
                  } ?> </td>
                <td><?php echo $bonk->book_duration ?? '<span class="badge badge-warning badge-pill">Not Booked</span>' ;?></td>
                <td><?php echo ucwords($bonk->bed_space);?></td>
                <td>&#8358;<?php echo number_format($bonk->amount,2);?></td>
                <td><?php if ($bonk->amount_paid == NULL OR $bonk->amount_paid == ""): ?>
                  <span class="badge badge-dark badge-pill">No User</span>
                <?php else: ?>
                  &#8358;<?php echo number_format($bonk->amount_paid,2);?>
                <?php endif ?> </td>
                <td><?php if ($bonk->is_available == 1) {
                 echo '<span class="badge badge-success badge-pill"> Available</span>';
                }else{?>
                   <span class="badge badge-danger badge-pill"> Occupied</span>
                   <?php if ($bonk->amount === $bonk->amount_paid): ?>
                     <button type="button" class="badge badge-dark badge-pill m-1 checkOutBtn_" data-id="<?php echo $bonk->bedId;?>" data-action="checkout_bedspace" data-occupant="<?php echo $bonk->occupant;?>"> Checkout</button>
                   <?php endif ?>
                    
                      <?php
                }

                 ?> </td>
                 <td>
                  <?php if ($bonk->is_available == 1): ?>
                     <button type="button" title="Assign Bed Space to student" class="btn btn-dark btn-md btn-rounded-0 assign_bedspace_btn" data-id="<?php echo $bonk->bedId;?>" data-amount="<?php echo ($bonk->amount);?>" data-bed="<?php echo $bonk->bed_space;?>"><span class="fa fa-check-circle"></span> Assign</button>
                    <?php else: ?>
                      <?php if ($bonk->amount_paid == NULL || $bonk->amount_paid < $bonk->amount): ?>
                        <button type="button" onclick="window.location.href='updateBedPayments?bed_occupant=<?php echo $Configuration->saltifyString($bonk->occupant);?>&bedspace=<?php echo $Configuration->saltifyString($bonk->bedId);?>&hoId=<?php echo $Configuration->saltifyString($hostelId);?>&action=topuppayment'" title="Update Payment" class="badge badge-warning badge-pill m-1">Pay More</button>
                      <?php endif ?>
                       <button onclick="window.location.href='bedspace_payments?occupant=<?php echo $bonk->occupant;?>&bed=<?php echo $bonk->bedId;?>&hoId=<?php echo $hostelId;?> &action=view-payments'" type="button" title="View Payment History" class="badge badge-info badge-pill">Reciept</button>
                  <?php endif ?>
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
</section>
<!-- Column selectors with Export Options and print table -->


        </div>
      </div>
    </div>
    <!-- END: Content-->

    </div>
  <?php include ("../Modals/bookBedSpaceModal.php");?>
  
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <script>
     $(document).ready(function(){
      //when checkout ben is clicked
      const checkOutBtn = $(".checkOutBtn_");
      checkOutBtn.on("click", function(){
        let studentId = $(this).data("occupant"),bedSpaceId = $(this).data("id"), action = $(this).data("action");
          if (confirm("The information on the selected bed space will be removed, Are you sure you want to checkout this student?")) {
         //send request to route
         $.post("../actions/delete_actions",{action:action,stId:studentId,beId:bedSpaceId}, function(data){
          setTimeout(()=>{
            $("#server-response").html(data);
          },500);
         })
          }else{
            return false;
          }
      });

     $(".assign_bedspace_btn").on("click", function(){
      var bedId = $(this).data("id"),bed_desc = $(this).data("bed");
      const space_amount = $(this).data("amount");
      //alert(bedId+" "+ space_amount+" "+bed_desc);
      $("#show_bonk_info").val(bed_desc);
      $("#hide_bonk_id").val(bedId);
      $("#total_price").val(space_amount);
       $("#asignBedSpaceNodal").modal("show");
     });

     //when submit assign form is clicked
      $("#hostelAssignForm").on("submit", function(event){
      event.preventDefault();
    const ASSIGN_BED_SPACE_FORM = $(this);
         $(".__loadingBtn__bed_assigned").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
          //send request
          $.post("../actions/actions",ASSIGN_BED_SPACE_FORM.serialize(),function(data){
            setTimeout(()=>{
             $(".__loadingBtn__bed_assigned").html('Submit').attr("disabled",false);
              $("#server-response").html(data);
            },500);
          })
     })
     })
     //new Intl.NumberFormat().format()
   </script>
  </body>
  <!-- END: Body-->
</html>