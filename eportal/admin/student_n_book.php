<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Student and Book</title>
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
                  <li class="breadcrumb-item"><a href="#"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Student & Books
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
  <div class="users-list-filter px-1">
        <form>
            <div class="row border rounded py-2 mb-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-verified">Verified</label>
                    <fieldset class="form-group">
                        <select class="form-control" id="users-list-verified">
                            <option value="">Any</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-role">Role</label>
                    <fieldset class="form-group">
                        <select class="form-control" id="users-list-role">
                            <option value="">Any</option>
                            <option value="User">User</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-status">Status</label>
                    <fieldset class="form-group">
                        <select class="form-control" id="users-list-status">
                            <option value="">Any</option>
                            <option value="Active">Active</option>
                            <option value="Close">Close</option>
                            <option value="Banned">Banned</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                    <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Search</button>
                </div>
            </div>
        </form>
    </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body card-dashboard">
       
          <div class="table-responsive">
            <table class="table table-striped osotechExp">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Image</th>
                  <th>Student Name</th>
                  <th>Class</th>
                  <th>Total Borrowed</th>
                  <th>Books not Returned</th>
                  <th>Give Book</th>
                  <th>Book History</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                <td><img src="../assets/loaders/osotech.png" width="40" class="rounded-circle" alt="photo"></td>
                  <td>Osotech Sam</td>
                  <td>JSS1</td>
                  <td>34</td>
                 <td>None</td>
                 <td><button type="button" class="badge badge-pill badge-warning givebook_btn" id="12345"><i class="fa fa-reply-all"></i> Give Book</button></td>
                 <td><button type="button" class="badge badge-pill badge-dark"><i class="fa fa-line-chart"></i> View History</button></td>
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
        $(document).on("click",".givebook_btn", function(){
          let stu_id = $(this).attr("id");
          href ="lend_out_book?student_id=";
         //redirect to assign_student_Bus
         setTimeout(()=>{
          self.location.href=href+stu_id;
         },500);
        });
        //ends

         //when view payment history btn is clicked
        $(document).on("click",".vsbh_btn", function(){
          let st_id = $(this).attr("id");
          href2 ="student_book_history?bid=";
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