<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Publish Student Result</title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"> <?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">PUBLISHED RESULTS
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
 
</div>
<!--start--> 
<div class="col-md-12">
                    
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
         <div class="card-header">
           <h4 class='text-warning mb-1'>
              <b>NOTE: Please Select the Term ,Session and the Status of the result you want to view.</b></h4>
         </div>
        <div class="card-body">
          <form class="form form-vertical" action="" method="post">
            <div class="form-body">
              <div class="row">

                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="result_term"> Term</label>
                    <select name="result_term" class="custom-select form-control">
                      <option value="">Choose...</option>
                      <option value="1st Term">1st Term</option>
                      <option value="2nd Term">2nd Term</option>
                      <option value="3rd Term">3rd Term</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="result_session"> Session</label>
                    <select name="result_session" id="result_session" class="form-control">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_all_session_lists();?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="result_class"> Class</label>
                   <select id="result_action" name="result_action" class="form-control">
                    <option value="" selected>--select--</option>
                    <option value="1">Pending</option>
                    <option value="2">Released</option>
                    <option value="3">Held</option>
                    <option value="4">Cancelled</option>
                            </select>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end mt-1">
                  <button type="submit" name="view_published_btn" class="btn btn-dark btn-lg mr-1"><span class="fa fa-eye"></span> View Result Status</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
<?php 
if (isset($_POST['view_published_btn'])) {?>
<?php if ($Configuration->isEmptyStr($_POST['result_action']) || $Configuration->isEmptyStr($_POST['result_term']) || $Configuration->isEmptyStr($_POST['result_session'])): ?>
  <?php echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Invalid Submission: Unable to Process your Request!","danger").'
          </div>
         ' ;?>
<?php else: ?>
  <?php 
$status = $Configuration->Clean($_POST['result_action']);
$term = $Configuration->Clean($_POST['result_term']);
$session = $Configuration->Clean($_POST['result_session']);
 $viewdAll = $Result->filterStudentResultByAction($status,$term,$session);
if ($viewdAll) {?>
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead class="text-center">
                <tr>
             <th>Class</th>
            <th>Number Of Students</th>
           <th> Session</th>
            <th> Term</th>
            <th>Status</th>
            
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
              foreach ($viewdAll as $value) {
                  $count_student = $Result->getNumberOfStudentSitForExamByClass($value->studentGrade,$value->term,$value->aca_session); ?>
                  <tr>
                  <td><?php echo $value->studentGrade;?></td>
                  <td><span class="badge badge-pill badge-info"><?php echo $count_student; ?></span></td>
                  <td><?php echo $value->aca_session?></td>
                  <td><?php echo $value->term?></td>
                 
                  <td>
                    <?php switch ($value->rStatus) {
                      case 1:
                       echo '<span class="badge badge-pill badge-warning">Not Yet Released</span>';
                        break;
                        case 2:
                       echo '<span class="badge badge-pill badge-success"> Released</span>';
                        break;
                        case 3:
                       echo '<span class="badge badge-pill badge-dark">Held</span>';
                        break;
                      
                      default:
                      echo '<span class="badge badge-pill badge-danger">Cancelled</span>';
                        break;
                    } ?>    
                  
                </tr>
                  <?php
                   
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
  <?php
 
}else{
  echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Sorry:) No Record found!","danger").'
          </div>
         ' ;
}
   ?>
<?php endif ?>
  
<?php
  // code...
}


 ?>

                <!-- show ends -->
                    </div>
                        </div>  
                      </div>
<!--     ends-->
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
  </body>
  <!-- END: Body-->
</html>