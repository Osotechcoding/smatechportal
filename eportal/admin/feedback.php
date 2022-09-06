<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Client Feedback</title>
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
                  <li class="breadcrumb-item active"> Client Feedback
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12 mb-2">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-envelope fa-1x"></span> CLIENTS FEEDBACK</h3>
  </div>
          </div>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-striped table-bordered">
        <thead class="text-center">
          <tr>
          <th width="10%">S/N</th>
          <th width="20%">Name</th>
          <th width="15%">Email</th>
          <th width="15%">Phone</th>
          <th width="30%">Feedback</th>
          <th width="10%">IP Address | Date</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
           <?php $getFeedbacks = $Blog->getAllFeedBack();
           if ($getFeedbacks) {
           $cnt =0;
           foreach ($getFeedbacks as $fback) {
            $cnt++;
            ?>
             <tr>
            <td><?php echo $cnt; ?></td>
            <td><?php echo ucwords($fback->client_name);?></td>
          <td><?php echo ($fback->client_email);?></td>
          <td><?php echo ($fback->client_phone)?? "Not Included";?></td>
          <td><?php echo htmlentities($fback->message);?></td>
          <td><?php echo htmlentities($fback->client_ip_address);?><br><?php echo date("j M, Y",strtotime($fback->created_at));?></td>
         <td> <!-- <button type="button" class="btn btn-info btn-sm btn-round my-1">Reply</button> --> <button type="button" class="btn btn-danger text-center btn-sm btn-block delete_feedback_btn __loadingBtn2__<?php echo $fback->id;?>" data-id="<?php echo $fback->id; ?>"><i class="fa fa-trash"></i>Delete</button> </td>
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
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="addTestimonialModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-comments-o fa-1x"></span> Reply</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="addNewTestimonialModalForm" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                   
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="testimonial_name">Full Name</label>
                <input type="text" autocomplete="off" class="form-control" name="testimonial_name" placeholder="Smatech Software">
                    </div>
               </div>
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="occupation">Occupation</label>
               <input type="text" placeholder="Teacher" autocomplete="off" class="form-control" name="occupation">
                </div>
              </div>

               <div class="col-md-12">
                     <div class="form-group">
                  <label for="content">Content Message</label>
              <textarea name="content" class="form-control" placeholder="Write Testimonial here..."></textarea>
                </div>
              </div>
               
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="auth_code"> Authentication Code</label>
              <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="*********">
                    </div>
               </div>
            
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="action" value="upload_what_people_say">
                   <button type="submit" class="btn btn-dark ml-1 btn-lg __loadingBtn__">
                    Submit</button>
                 <button type="button" class="btn btn-danger ml-1 btn-lg" data-dismiss="modal">
                    <span class="fa fa-power-off"> Close</span>
                  </button>
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
   <script src="smappjs/feedback.js"></script>
  </body>
  <!-- END: Body-->

</html>