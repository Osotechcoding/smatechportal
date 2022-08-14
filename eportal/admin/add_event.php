<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: School Events</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?> </a>
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
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-calendar fa-2x"></span> SCHOOL EVENTS</h3>
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
      <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-rounded" data-toggle="modal" data-target="#addHolidayModal"><span class="fa fa-calendar fa-1x"></span> Add Event</button>
        </div>
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
          <th>CONTENT</th>
          <th>STATUS</th>
          <th>ACTION</th>
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
         <td> <!-- Dropdown Buttons options -->
    <div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-info"><i class="bx bx-edit-alt"></i></button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-danger" href="javascript:void(0);"> Event Info</a>
             
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash"></span> Delete</a>
            </div>
          </div>
          <!-- Dropdown Buttons options --></td>
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
    <?php //include ("template/ChatDemo.php");?>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="addHolidayModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-calendar fa-1x"></span> Add Upcoming Event</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="schoolUpComingEventForm" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="event_desc">EVENT DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="event_desc" placeholder="A Day Sweing Workshop">
                    </div>
               </div>
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="event_organizer"> ORGANIZER </label>
                <input type="text" class="form-control form-control-lg" name="event_organizer" placeholder="Student Union">
                </div>
              </div>
               
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="class_teacher">DATE </label>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="date" class="form-control form-control-lg" name="event_date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
                </div>
              </div>
              <div class="col-md-6">
                     <div class="form-group">
                  <label for="class_teacher">EVENT TIME </label>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="time" class="form-control form-control-lg" name="event_time">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
                </div>
              </div>
               <div class="col-md-12">
                     <div class="form-group">
                  <label for="event_venue"> EVENT VENUE </label>
                <input type="text" class="form-control form-control-lg" name="event_venue" placeholder="School Main Hall">
                </div>
              </div>
               <div class="col-12 mt-1">
                      <fieldset class="form-label-group mb-0">
                          <textarea data-length=63000 class="form-control char-textarea" id="textarea-counter" rows="5" placeholder="Event Details (Max Character (63000))" name="event_detail"></textarea>
                          <label for="textarea-counter">Event Details (Max Character (1000))</label>
                      </fieldset>
                      <small class="counter-value float-right"><span class="char-count">0</span> / 63000 </small>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                  <label for="lecture_mp4">Event Image <span class="text-danger">(png,jpg or jpeg format Only)</span></label>
                <input type="file" class="form-control form-control-lg" id="EventImage" name="EventImage" onchange="previewFile(this);">
                    </div>
                    <div class="col-md-6 offset-md-3" id="uploaded_passport">
  <img id="previewImg" width="200" src="../assets/loaders/placeholder.png" alt="Placeholder" style="border: 2px solid darkblue;border-radius:10px;">
  <p>Your File Size: <span id="ImageSize"></span></p> 
</div>
                  </div>
                   <div class="col-md-6">
                  <div class="form-group">
                  <label for="estatus">Event status</label>
               <select name="estatus" id="estatus" class="form-control form-control-lg">
                  <option value="" selected>Choose...</option>
                <option value="2">Publish Now</option>
                <option value="1">Pending</option>
               </select>
                    </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="auth_code"> Authentication Code</label>
              <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="*********">
                    </div>
               </div>
            
                 </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <input type="hidden" name="postedBy" value="<?php echo $_SESSION['ADMIN_TOKEN_ID'];?>">
                <input type="hidden" name="action" value="upload_upcomingEvent_">
                   <button type="submit" class="btn btn-dark ml-1 btn-lg __loadingBtn__">
                    Submit</button>
                 <button type="button" class="btn btn-danger ml-1 btn-md" data-dismiss="modal">
                    <span class="fa fa-power-off">Back</span>
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->

    <!--Modal Read Event Detail Starts -->
          <div class="modal fade text-left" id="ReadEventDetailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Event Full Content</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0" id="event_details_details"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Close
                  </button>
                </div>
              </div>
            </div>
          </div>
    <!-- Modal Read Event Detail ends -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php"); ?>
  
   <script>
     $(document).ready(function(){
//when view btn is clicked
  const view_btn = $(".view_event_details_btn");
  view_btn.on("click", function(){
     let event_details = $(this).data("info");
      $("#event_details_details").html(event_details);
    $("#ReadEventDetailModal").modal("show");
  })


     $("#schoolUpComingEventForm").on("submit",function(event){
  event.preventDefault();
  $.ajax({
    url:"../actions/actions",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Uploading...').attr("disabled",true);
    },
    success:function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Submit').attr("disabled",false);
        $("#schoolUpComingEventForm")[0].reset();
        $("#server-response").html(data);
       // alert(data);
      },500);
    }

  });
})
     })
   </script>

   <script>
    function previewFile(input){
        var file = $("#EventImage").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
                //$("#imagename").html(file.name);
                $("#ImageSize").html((file.size/1024).toFixed(2) +"KB");
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
  </body>
  <!-- END: Body-->

</html>