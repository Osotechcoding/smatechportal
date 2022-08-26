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
    <h3 class="bd-lead text-primary text-bold mb-2"><span class="fa fa-user-plus fa-1x"></span>MANAGE SCHOOL BUS DRIVER</h3>
  </div>
</div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">

  <!-- Statistics Cards Starts -->
         <?php include_once ("Links/schoolBusLinks.php"); ?>
       <!-- Revenue Growth Chart Starts -->
  
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-round" data-toggle="modal" data-target="#busDriverModal"><span class="fa fa-user-plus fa-1x"></span> Add Driver</button>
        </div>
        <div class="card-body card-dashboard">
       
        <div class="table-responsive">
            <table class="table table-striped table-bordered osotechDatatable">
              <thead class="text-center">
                <tr>
                   <th>S/N</th>
                  <th>Passport</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <!-- <th>License No</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                 <?php $allDrivers = $Bus->getAllVehiclesDrivers();
                if ($allDrivers) {
                  $cnt=0;
                  foreach ($allDrivers as $driver) {
                    $cnt++;
                    ?>
                <tr>
                  <td><?php echo $cnt; ?></td> 
                  <td><img src="../vehicles/<?php echo $driver->driver_image; ?>" width="60" class="rounded-circle" alt="photo"></td>
                  <td><?php echo strtoupper($driver->driver_name); ?></td>
                  <td><?php echo $driver->driver_phone; ?> <br><?php echo $driver->driver_email; ?></td>
                  <td><?php echo $driver->driver_address; ?></td>
                  <!-- <td><?php //echo $driver->driver_license_no; ?></td> -->
                  <td><button title="Edit" class="btn btn-secondary btn-sm m-1"><span class="fa fa-edit"></span> Edit</button> <button title="remove" data-id="<?php echo $driver->dId;?>" data-action="delete_driver" type="button" class="btn btn-danger btn-sm  delete_btn"><span class="fa fa-trash"></span> Delete</button></td>
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
   <div class="modal fade" id="busDriverModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-bus fa-1x"></i> Add New Driver</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <form id="addNewDriverModalForm">
                  <input type="hidden" name="action" value="resgister_new_vehicle_driver">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="driver_name">DRIVER'S NAME </label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="name" placeholder="Adekola Oni Samuel">
                    </div>
                  </div>
                     <div class="col-md-6">
                     <div class="form-group">
                  <label for="phone">DRIVER'S PHONE</label>
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
                  <label for="license_no">DRIVER'S LICENSE ID </label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="license_no" placeholder="ADK090986420220321">
                </div>
              </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="address">RESIDENTIAL ADDRESS</label>
                  <textarea placeholder="e.g xyz street, Sango Ota Ogun State" name="address" id="address" class="form-control form-control-lg"></textarea>
                    </div>
                  </div>
                    
               <div class="col-md-6">
                 <div class="form-group">
                  <label for="driverImage">DRIVER'S PASSPORT (<span class="text-danger"><small>50KB Max</small></span>)</label>
                <input type="file" onchange="previewFile(this)" autocomplete="off" class="form-control form-control-lg" name="driverImage" id="driverImage">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="auth_code">Authentication Code </label>
                <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="***********">
                </div>
              </div>

                  <div class="col-md-12">
                     <div class="form-group">
                  <img id="previewImg" width="100" height="100" src="../author.jpg" alt="Placeholder" style="border: 2px solid darkblue;border-radius:10px;">
                <p>Your File Size: <span id="ImageSize"></span></p>
                    </div>
                  </div>
                 </div>

                  </div>
                
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark btn-lg ml-1 __loadingBtn__">
                     Submit</button>
                  <button type="button" class="btn btn-danger btn-lg ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Back </button>
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

    <script>

   function previewFile(input){
        var file = $("#driverImage").get(0).files[0];

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

  $(document).ready(function (){
    //when view btn is clicked
     $("#addNewDriverModalForm").on("submit",function(event){
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
        //$("#addNewGalleryModalForm")[0].reset();
        $("#server-response").html(data);
       // alert(data);
      },500);
    }

  });
})
  })
</script>
  </body>
  <!-- END: Body-->

</html>