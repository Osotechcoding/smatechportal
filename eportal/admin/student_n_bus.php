<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Student & Bus</title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Student & School Bus
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><div class="row">
 
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
                  <div class="text-white line-ellipsis"><h3 class="text-white">Total Buses</h3></div>
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
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Total Female Assigned</h3></div>
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
                  <div class="text-white line-ellipsis"><h3 class="text-white">Total Male Assigned</h3></div>
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
        </div>
        <div class="card-body card-dashboard">
       
          <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead>
                <tr>
                  <th>Photo</th>
                  <th>Student Name</th>
                  <th>Admission No</th>
                  <th>Class</th>
                  <th>Address</th>
                  <th>Assign To Bus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <!-- class="rounded-circle" -->
                  <td><img src="result-asset/author.jpg" width="80" alt="photo"></td>
                  <td>Osotech Sam</td>
                  <td>VISAP/2012/005</td>
                  <td>JSS1</td>
                  <td>Sango Ota Ogun State</td>
                 <td><div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-warning">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-danger astb_btn" href="javascript:void(0);"  id="<?php echo urlencode(1);?>"><span class="fa fa-bus"></span>Assign to Bus</a>
              <a class="dropdown-item text-warning vsbp_btn" id="<?php echo urlencode(123);?>" href="javascript:void(0);"><span class="fa fa-bar-chart"></span> Bus Fee History</a>

              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash"></span> Delete</a>
            </div>
          </div></td>
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
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
    <script>
      $(document).ready(function(){
        //when assign btn is clicked
        $(document).on("click",".astb_btn", function(){
          let stu_id = $(this).attr("id");
          href ="assign_Student_Bus?student_id=";
         //redirect to assign_student_Bus
         setTimeout(()=>{
          self.location.href=href+stu_id;
         },500);
        });
        //ends

         //when view payment history btn is clicked
        $(document).on("click",".vsbp_btn", function(){
          let st_id = $(this).attr("id");
          href2 ="student_bus_payment_history?his_or_her_id=";
         //redirect to assign_student_Bus
         setTimeout(()=>{
          self.location.href=href2+st_id;
         },500);
        });
        //ends
      })
    </script>
   <!-- DataTableFooterScript.php -->
  </body>
  <!-- END: Body-->

</html>