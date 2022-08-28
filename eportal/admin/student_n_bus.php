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
       <?php include_once ("Links/schoolBusLinks.php"); ?>
       <!-- Revenue Growth Chart Starts -->
       <div class="card">
        <div class="card-body">
          <div class="users-list-filter px-1">
        <form action="" method="post">
           <div class="row border rounded py-2 mb-2">
                 <div class="col-12 col-md-4 col-sm-6 col-lg-4">
                  <label for="users-list-verified">Student Class</label>
                  <fieldset class="form-group">
                    <select name="student_class" class="custom-select form-control form-control-lg">
                           <option value="">Choose...</option>
                           <?php echo $Administration->get_classroom_InDropDown_list();?>
                        </select>
                   </fieldset>
               </div>
           <div class="col-12 col-md-4 col-sm-6 col-lg-4">
                  <label for="users-list-role"> Student Type</label>
                    <fieldset class="form-group">
                        <select name="student_type" class="form-control">
                            <option value="Day" selected>Day Students</option>
                            <!-- <option value="Boaring">Boarding</option> -->
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-md-4 col-sm-6 col-lg-4 d-flex align-items-center">
                    <button type="submit" name="filter-btnn" value="show_list_of_students" class="btn btn-dark btn-block glow mb-0">Show students</button>
                </div>
            </div>
        </form>
    </div>
        </div>
      </div>
  <div class="row">
    <div class="col-12">
      <?php if (isset($_POST['filter-btnn']) && $_POST['filter-btnn']!=""): ?>
         <?php if (empty($_POST['student_class'])) {
          echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Fliter Class is required!","danger").'
          </div>';
         }elseif (empty($_POST['student_type'])) {
           echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Students Status is Required!","danger").'
          </div>';
         }else{
          $student_class = $Configuration->Clean($_POST['student_class']);
          $student_type = $Configuration->Clean($_POST['student_type']);
          $filtered_students =$Student->getStudentListByType($student_class,$student_type);
          if ($filtered_students) {
            $count=0;
            ?>
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
                  <th>Assign Bus</th>
                  <th>Payment</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                 foreach ($filtered_students as $filtered) { 
            $count++;
            ?>

                <tr>
                  <!-- class="rounded-circle" -->
                  <td><?php if ($filtered->stdPassport ==""||$filtered->stdPassport ==NULL): ?>
                <a href="./uploadstudentpassport?stdRegistrationId=<?php echo $filtered->stdRegNo;?>&actionId=<?php echo $filtered->stdId;?>"><button type="button" class="badge badge-dark">
                  <span class="fa fa-camera"></span> Upload</button></a>
                <?php else: ?>
                  <img src="../schoolImages/students/<?php echo $filtered->stdPassport;?>" width="80" style="border-radius: 10px;border: 3px solid deepskyblue;" alt="student-passport">
              <?php endif ?></td>
                 <td><?php echo ucwords($filtered->stdSurName." ".$filtered->stdFirstName." ".$filtered->stdMiddleName) ?></td>
          <td><?php echo strtoupper($filtered->stdRegNo)?></td>
          <td><?php echo strtoupper($filtered->studentClass)?></td>
                  
                 <td><button class="btn btn-dark btn-sm astb_btn" id="<?php echo $Configuration->saltifyString($filtered->stdId);?>"><span class="fa fa-bus"></span>Assign</button></td>
                 <td><button class="btn btn-danger btn-sm vsbp_btn" id="<?php echo $Configuration->saltifyString($filtered->stdId);?>"><span class="fa fa-bar-chart"></span>Payments</button>

                  </td>
                </tr>
                 <?php }
           ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>

            <?php
          }else{
             echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("No Result Found!, Please try again","danger").'
          </div>';
          }
         } ?>
       <?php endif ?>
      
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
          href2 ="student_bus_payment_history?student_id=";
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