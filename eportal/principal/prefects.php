<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> || School Prefects</title>
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
                  <li class="breadcrumb-item active">School Prefects
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-graduation-cap"></span> SCHOOL PREFECTS</h3>
  </div>
</div>
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">ASSIGN SCHOOL PREFECTS</h4>
        </div>
        <div class="card-body">
         <div class="mb-2">
          <button type="button" class="btn btn-primary block" data-toggle="modal" data-target="#prefectModal">
           Add New Title
          </button>
         </div>
          <form class="form" id="RosterForm">
            <div class="form-body">
              <div class="row">
                 <div class="col-md-6 col-12">
                   <label for="csession">Student Name</label>
                  <select name="" class="select2 form-control">
                    <option value="">--select--</option>
                    <option value="">Ademola Adeola M &raquo; SSS2 </option>
                  </select>
                </div>
                <div class="col-md-6 col-12">
                     <label for="csession">Assign Office</label>
                  <select name="" class="select2 form-control">
                    <option value="">--Select Office-- </option>
                    <option value="pr">Head Boy </option>
                    <option value="vpr">Head Girl </option>
                  </select>
                </div>
                
  <!-- daterange end -->
                </div>
                <!--   -->
                <div class="col-12 d-flex justify-content-end mt-2">
                  <button type="submit" class="btn btn-primary btn-lg mr-1"><i class="bx bx-paper-plane"></i> Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">STUDENT OFFICE FOR THE 2021/2022 ACADEMIC SESSION </h4>
        </div>
        <div class="card-body card-dashboard">
         
          <div class="table-responsive">
            <table class="table osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>Student</th>
                  <th>Class</th>
                  <th>Office Title</th>
                  <th>Regime</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>Samson Ojo</td>
                  <td>SSS3</td>
                  <td>HEAD BOY</td>
                  <td>2021/2022</td>
                <td><div class="btn-group dropdown mr-1 mb-1">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,20">
              Options
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
             <a class="dropdown-item text-warning" href="javascript:void(0);" data-toggle="modal" data-target="#updateStudentOfficeModal"><span class="fa fa-edit"></span>&nbsp;Edit Office</a>
              <!--  -->
               <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash"></span>&nbsp; Remove From Office</a>
          
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
<!--/ Zero configuration table -->


        </div>
      </div>
    </div>
    <!-- END: Content-->
<!-- widget chat demo ends -->
    </div>
          <!--Basic Modal -->
          <div class="modal fade text-left" id="prefectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                   <h3 class="text-center"><span class="fa fa-briefcase fa-1x"></span> Add New Office</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
               
               <form action="">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
              
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="office">Office Desc</label>
                    <input type="text" name="office" id="office" class="form-control" placeholder="Head Boy">
                    </div>
                  </div>
                    <div class="col-12 col-md-12 col-sm-12 mt-1">
                      <fieldset class="form-label-group mb-0">
                          <textarea data-length=150 class="form-control char-textarea" id="textarea-counter" rows="3" placeholder="About this Office"></textarea>
                          <label for="textarea-counter">About this Office</label>
                      </fieldset>
                      <small class="counter-value float-right mb-1"><span class="char-count">0</span> / 150 </small>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="status">Status</label>
                    <select name="status" id="status" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>
                    </select>
                    </div>
                  </div>
                  <input type="hidden" name="action" value="set_student_office">
                  
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="fa fa-paper-plane"></span> Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="bx bx-power-off"></span>
                    Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
          <!-- End Modal -->

          <!-- Start Update Staff office Modal -->
          <!--Basic Modal -->
          <div class="modal fade text-left" id="updateStudentOfficeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                   <h3 class="text-center"><span class="fa fa-briefcase fa-1x"></span> Update Office</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
               
               <form action="">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
              
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="student_name">Student Name</label>
                    <input type="text" name="student_name" id="student_name" class="form-control" value="Mr Samson Ojo" readonly>
                    </div>
                  </div>
                      <div class="col-md-12">
                     <div class="form-group">
                  <label for="old_office">Current Office</label>
                    <input type="text" name="old_office" id="old_office" class="form-control" value="Head Boy" readonly>
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="c_office">Change Office To</label>
                    <select name="c_office" id="c_office" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="1">Head Boy</option>
                      <option value="2">Head Girl</option>
                    </select>
                    </div>
                  </div>
                  <input type="hidden" name="action" value="update_student_office">
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="fa fa-paper-plane"></span> Save Change</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <i class="bx bx-power-off"></i>
                    Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
          <!-- End Update Staff office Modal -->
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
  <script>
    $(document).ready(function(){
      $("#RosterForm").on("submit", function(event){
      event.preventDefault()
      if (confirm("Are you Sure?")) {
         window.location.assign("./");
      }else{
        window.location.replace("./page-not-authorized");
      }
      })
    })
  </script>
  </body>
  <!-- END: Body-->

</html>