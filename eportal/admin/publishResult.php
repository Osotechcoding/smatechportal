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
                  <li class="breadcrumb-item active">PUBLISH RESULT
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
           <p class='text-info mb-3'>
              <b>NOTE: Before Publishing The Result of any Class, Make Sure that All the
                    results for each subject for that particular Class have been Uploaded Properly. Click On Result Upload Tab to view Uploaded Results 
                  ...</b></p>
         </div>
        <div class="card-body">
          <form class="form form-vertical" id="publishResultForm">
            <div class="form-body">
              <div class="row">

                 
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="result_class">Result Class</label>
                    <select name="result_class" id="result_class" class="custom-select form-control">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                    </select>
                  </div>
                </div>

                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="result_term">Result Term</label>
                    <select name="result_term" class="custom-select form-control">
                      <option value="">Choose...</option>
                      <option value="1st Term">1st Term</option>
                      <option value="2nd Term">2nd Term</option>
                      <option value="3rd Term">3rd Term</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="result_session"> Session</label>
                    <select name="result_session" id="result_session" class="form-control">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_all_session_lists();?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                   <label for="result_action">Declare Result</label>
                   <select id="result_action" name="result_action" class="form-control">
                    <option value="" selected>--select--</option>
                    <option value="Pending">Pending</option>
                    <option value="Released">Released</option>
                    <option value="Held">Held</option>
                    <option value="Cancelled">Cancelled</option>
                            </select>
                    </div>
               </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_session"> PUBLISH RESULT CODE</label>
                    <input type="password" autocomplete="off" class="form-control" name="auth_code" placeholder="**********">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_session"> Published Date</label>
                    <input type="date" autocomplete="off" class="form-control" name="publish_result_date"  value="<?php echo date("Y-m-d");?>" readonly>
                  </div>
                </div>
               
               <input type="hidden" name="action" value="submit_published_action">
                <div class="col-12 d-flex justify-content-end mt-1">
                  <button type="submit" class="btn btn-dark btn-lg mr-1 __loadingBtn__"><span class="fa fa-check-circle"></span> Publish Result Now</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
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
                $viewdAll = $Result->view_published_result();
                if ($viewdAll) {
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
                       echo '<span class="badge badge-pill badge-warning">Not Released</span>';
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

    <script>
      
      $(document).ready(function(){
       const PUBLISHED_RESULT_FORM = $("#publishResultForm");
                PUBLISHED_RESULT_FORM.on("submit", function(event){
                event.preventDefault();
           if (confirm("Are you sure you want to execute this action?")) {
             $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
            //send request 
            $.post("../actions/actions",PUBLISHED_RESULT_FORM.serialize(),function(data){
                setTimeout(()=>{
                    $(".__loadingBtn__").html('<span class="fa fa-check-circle"></span> Publish Result Now').attr("disabled",false);
                    $("#server-response").html(data);
                },100);
            })
           }else return false;
        });
      })
    </script>
  </body>
  <!-- END: Body-->
</html>