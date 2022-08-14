<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Result Grading Module </title>
   <!-- include template/HeaderLink.php -->
   <?php //include "template/HeaderLink.php";?>
   <?php include ("../template/dataTableHeaderLink.php"); ?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
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
                  <li class="breadcrumb-item active">RESULT GRADING MODULE
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-1x"> </span>  JUNIOR CLASSES GRADING SYSTEM</h3>
  </div>
    </div>
      <button type="button" class="btn btn-info btn-md mb-2 pry_grading_btn"> <i class="fa fa-line-chart"></i>BASIC CLASSES GRADING</button>  <button type="button" class="btn btn-warning btn-md mb-2 junior_grading_btn"> <i class="fa fa-line-chart"></i>JUNIOR CLASSES GRADING</button> <button type="button" class="btn btn-success btn-md mb-2 senior_grading_btn"> <i class="fa fa-line-chart"></i>SENIOR CLASSES GRADING</button>
         <section id="form-repeater-wrapper">
  <!-- form default repeater -->
  <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable">
        <thead class="text-center">
          <tr>
          <th>SCORE FROM</th>
          <th>SCORE TO</th>
          <th>GRADE</th>
          <th>REMARK</th>
          <th>UPDATE</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
          $rGrade = "Junior";
      $get_gradings = $Result->get_school_result_grading($rGrade);
      if ($get_gradings) {
            $counter =0;
            foreach ($get_gradings as $grading) {
              ?>
        <tr>
          <td><input type="number" class="form-control" readonly value="<?php echo $grading->score_from;?>"></td>
          <td><input type="number" class="form-control" readonly value="<?php echo $grading->score_to;?>"></td>
           <td><input type="text" class="form-control" readonly value="<?php echo $grading->mark_grade;?>"></td>
          <td><input type="text" class="form-control" readonly value="<?php echo $grading->score_remark;?>"></td>
          <td>
            <button type="button" class="btn btn-dark update_grade_btn" data-id="<?php echo $grading->grading_id;?>" title="Click to Update Grading" data-score="<?php echo $grading->score_from;?>" data-mark="<?php echo $grading->score_to;?>" data-grade="<?php echo $grading->mark_grade;?>" data-remark="<?php echo $grading->score_remark;?>"><span class="fa fa-edit"></span> Update</button>
          </td>
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
  <!--/ form default repeater -->
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->
    <!-- END: Content-->
    </div>

    <!-- BUS MODAL Start -->
   <div class="modal fade" id="GradingUpdateForm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-edit fa-1x"></span> Update Grading System</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center col-md-12 mb-2" id="server-result"></div>
                <form id="update_grading_form">
                <div class="modal-body">
                 <div class="row">
                   <div class="col-md-3">
                    <input type="hidden" id="grading_id" name="grading_id">
                     <div class="form-group">
                       <label for="">Score From</label>
                       <input type="number" autocomplete="off" id="score_from" class="form-control" name="score_from" placeholder="Score From">
                     </div>
                   </div>
                    <div class="col-md-3">
                     <div class="form-group">
                       <label for="">Score To</label>
                       <input type="number" autocomplete="off" id="score_to" class="form-control" name="score_to" placeholder="Score To">
                     </div>
                   </div>
                    <div class="col-md-3">
                     <div class="form-group">
                       <label for="mark_grade">Grade</label>
                       <input type="text" autocomplete="off" id="mark_grade" class="form-control" name="mark_grade" placeholder="Grade" readonly>
                     </div>
                   </div>
                    <div class="col-md-3">
                     <div class="form-group">
                       <label for="remark">Remark</label>
                       <input type="text" autocomplete="off" id="remark" class="form-control" name="score_remark" placeholder="Remark">
                     </div>
                   </div>
                 </div>
                </div>
                <input type="hidden" name="action" value="update_grading_now">
              <input type="hidden" name="result_class" value="<?php echo $rGrade;?>">
              <input type="hidden" name="bypass" value="<?php echo md5('oiza1');?>">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                     Save Changes</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Close
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->


    <!-- demo chat-->
  
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php");?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->
<script>
  $(document).ready(function(){
//when a link btn is click
const pry_grading_btn = $(".pry_grading_btn");

const junior_grading_btn = $(".junior_grading_btn");
const senior_grading_btn = $(".senior_grading_btn");
//primary school grading link action
pry_grading_btn.on("click", ()=>{
  pry_grading_btn.html("Please wait...");
  setTimeout(()=>{
window.location.assign("./pryGrading");
  },500);
});

//Junior school grading link action
junior_grading_btn.on("click",()=>{
  junior_grading_btn.html("Please wait...");
  setTimeout(()=>{
window.location.assign("./juniorGrading");
  },500);
});
//Junior school grading link action
senior_grading_btn.on("click", ()=>{
  senior_grading_btn.html("Please wait...");
  setTimeout(()=>{
window.location.assign("./rgrading");
  },500);
});

//when update btn is clicked

$(".update_grade_btn").on("click",function(){
  let grade_id = $(this).data("id"),score_from = $(this).data("score"), score_to =$ (this).data("mark"),grade =$(this).data("grade"), remark = $(this).data("remark");
  //let show update modal now
  $("#grading_id").val(grade_id);
  $("#score_from").val(score_from);
  $("#score_to").val(score_to);
  $("#mark_grade").val(grade);
  $("#remark").val(remark);
  $("#GradingUpdateForm").modal("show");
});
    //when the form is submtted
  const update_grading_form = $("#update_grading_form");
  update_grading_form.on("submit",(event)=>{
  event.preventDefault();
   $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
   //send request
   $.post("../actions/update_actions",update_grading_form.serialize(),function(data){
    setTimeout(()=>{
      $("#server-result").html(data);
      $(".__loadingBtn__").html('Update Grading').attr("disabled",false);
    },2000);
   })
  })

  })
</script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>