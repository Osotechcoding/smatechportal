<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name;?> :: Uploaded Result Classes</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
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
             <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Remove Result
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-danger text-bold"><span class="fa fa-trash fa-1x"></span> REMOVE RESULTS MODULE</h3>
  </div>
          </div>
          <section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-body">
          <form class="form form-vertical" action="" method="post">
            <div class="form-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="show_result_subject">SUBJECT</label>
                    <select name="show_result_subject" id="show_result_subject" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_all_subjects_InDropDown_list(); ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="result_class">STUDENT CLASS</label>
                    <select name="show_result_class" id="result_class" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                    </select>
                  </div>
                </div>

                
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="result_session"> Session</label>
                    <select name="show_result_session" id="result_session" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_all_session_lists();?>
                    </select>
                  </div>
                </div>

                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="result_term">Term</label>
                    <select name="show_result_term" class="custom-select form-control" id="">
                      <option value="">Choose...</option>
                      <option value="1st Term">1st Term</option>
                      <option value="2nd Term">2nd Term</option>
                      <option value="3rd Term">3rd Term</option>
                    </select>
                  </div>
                </div>
               
                <div class="col-12 d-flex justify-content-end mt-1">
                  <button type="submit" name="show_uploaded_result_btn" class="btn btn-danger btn-lg mr-1"><span class="fa fa-address-card"></span> View Uploaded Exam</button>
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
if (isset($_POST['show_uploaded_result_btn'])) {?>
 <?php if ($Configuration->isEmptyStr($_POST['show_result_class']) || $Configuration->isEmptyStr($_POST['show_result_session']) || $Configuration->isEmptyStr($_POST['show_result_term'])): ?>
          <?php echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Please Select Class, Term and Session to Continue","danger").'
          </div>
         ' ;?>
        <?php else: ?>
           <?php 
            $result_subject = $_POST['show_result_subject'];
          $result_class = $_POST['show_result_class'];
          $result_term = $_POST['show_result_term'];
          $result_session = $_POST['show_result_session'];
           $get_all_uploaded_results = $Result->getUploadedResultByClass($result_class,$result_subject,$result_term,$result_session); ?>
            <?php if ($get_all_uploaded_results): ?>
              <section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>ADMISSION NO</th>
                  <th>CLASS</th>
                  <th>SUBJECT</th>
                  <th>TERM</th>
                  <th>SESSION</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $cnt=0;
               foreach ($get_all_uploaded_results as $value) {
                $student_data = $Student->get_student_data_ByRegNo($value->stdRegCode);
               $cnt++; ?>
                <tr>
                  <td><?php echo $cnt; ?> </td>
                  <td><?php echo $student_data->full_name;?></td>
                  <td><?php echo $value->studentGrade;?></td>
                  <td><?php echo $value->subjectName;?></td>
                  <td><?php echo $value->term;?></td>
                  <td><?php echo $value->aca_session;?></td>
                  <td><button class="btn btn-danger btn-md btn-rounded __loadingBtn__<?php echo $value->reportId;?> delete_exam_btn" data-id="<?php echo $value->reportId;?>" data-action="remove_subject_from_result_tbl">Delete</button> </td>
                </tr>
                <?php }
                           ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>ADMISSION NO</th>
                  <th>CLASS</th>
                  <th>SUBJECT</th>
                  <th>TERM</th>
                  <th>SESSION</th>
                  <th>ACTION</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
              <?php else: ?>
         <?php echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("No Result found!","danger").'
          </div>
         ' ;?>
            <?php endif; ?>
          <?php endif; ?>  

  <?php
  // code...
}


 ?>

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
   <!-- DataTableFooterScript.php -->
   <script>
     $(document).ready(function(){
      //when the delete gallery btn is clicked
      const delete_exam_btn = $(".delete_exam_btn");
      delete_exam_btn.on("click", function(){
        let Id = $(this).data("id");
        let action = $(this).data("action");
         let is_true = confirm("Are you Sure you want to Remove this Result, this Action cannot be undo?");
      if (is_true) {
        $(".__loadingBtn__"+Id).html('<img src="../assets/loaders/rolling_loader.svg" width="20">').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,rId:Id},function(response){
          setTimeout(()=>{
            $(".__loadingBtn__"+Id).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
     })
   </script>
  </body>
  <!-- END: Body-->

</html>