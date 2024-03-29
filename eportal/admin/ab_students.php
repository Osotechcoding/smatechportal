<?php
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <!-- metaTag -->
  <?php include("../template/MetaTag.php"); ?>
  <title><?php echo ($SmappDetails->school_name); ?> :: Manage Students </title>
  <?php include("../template/dataTableHeaderLink.php"); ?>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
  <!-- BEGIN: Header-->
  <?php include("template/HeaderNav.php"); ?>
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php include("template/Sidebar.php"); ?>
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
                <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['ADMIN_SES_TYPE'] ?></a>
                </li>
                <li class="breadcrumb-item active">Student Management
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-graduation-cap fa-2x"></span> STUDENTS </h3>
          </div>
        </div>
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
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white">New Admission</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Student->count_recent_applicants(); ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-3 dashboard-users-success">
                <div class="card text-center bg-info">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Male</h3>
                    </div>
                    <h2 class="text-white mb-0"> <?php echo $Student->count_students_by_gender("Male"); ?></h2>
                  </div>
                </div>
              </div>

              <div class="col-md-3 dashboard-users-success">
                <div class="card text-center bg-danger">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Female</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Student->count_students_by_gender("Female"); ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-3 dashboard-users-success">
                <div class="card text-center bg-dark">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Students</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Student->count_total_visap_students(); ?></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="card">
          <div class="card-body">
            <div class="users-list-filter px-1">
              <form action="" method="post">
                <div class="row border rounded py-2 mb-2">
                  <div class="col-12 col-md-4 col-sm-6 col-lg-4">
                    <label for="users-list-verified">Student Class</label>
                    <fieldset class="form-group">
                      <select name="student_class" class="form-control custom-select" id="users-list-verified">
                        <option value="">Choose...</option>
                        <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-12 col-md-4 col-sm-6 col-lg-4">
                    <label for="users-list-role"> Status</label>
                    <fieldset class="form-group">
                      <select name="student_status" class="form-control" id="users-list-role">
                        <option value="">Choose...</option>
                        <option value="Pending">Pending</option>
                        <option value="Active" selected>Active</option>
                        <option value="Suspended">Suspended</option>
                        <option value="Expelled">Expelled</option>
                        <option value="Transfered">Transfered</option>
                        <option value="Graduated">Graduated</option>
                        <option value="Left">Left</option>
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-12 col-md-4 col-sm-6 col-lg-4 d-flex align-items-center">
                    <button type="submit" name="filter-btn" value="show_list_of_students"
                      class="btn btn-primary glow users-list-clear mb-0"><span class="fa fa-search fa-1x"></span> Show
                      Students</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
        <?php if (isset($_POST['filter-btn']) && $_POST['filter-btn'] != "") : ?>
        <?php if (empty($_POST['student_class'])) {
            echo '<div class="text-center col-12 col-md-12">
          ' . $Alert->alert_msg("Fliter Class is required!", "danger") . '
          </div>';
          } elseif (empty($_POST['student_status'])) {
            echo '<div class="text-center col-12 col-md-12">
          ' . $Alert->alert_msg("Students Status is Required!", "danger") . '
          </div>';
          } else {
            $student_class = $Configuration->Clean($_POST['student_class']);
            $student_status = $Configuration->Clean($_POST['student_status']);
            $filtered_students = $Student->get_filtered_students_list($student_class, $student_status);
            if ($filtered_students) {
              $count = 0;
          ?>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="text-center">
                  <tr>
                    <th>S/N</th>
                    <th>PASSPORT</th>
                    <th>FULL NAME</th>
                    <th> TYPE</th>
                    <th>CLASS</th>
                    <th>Gender</th>
                    <!-- <th>VERIFICATION</th> -->
                    <th>Status</th>
                    <th>Edit</th>
                   
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php
                       
                        foreach ($filtered_students as $filtered) {
                          $count++;
                        ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td>
                      <?php if ($filtered->stdPassport == "" || $filtered->stdPassport == NULL) : ?>

                      <img class="mt-1"
                        src="../schoolImages/students/<?php echo $filtered->stdGender == 'Male' ? 'male.png' : 'female.png'; ?>"
                        width="50" style="border-radius: 10px;border: 3px solid deepskyblue;" alt="student-passport">
                      <a
                        href="./uploadstudentpassport?stdRegistrationId=<?php echo $filtered->stdRegNo; ?>&actionId=<?php echo $filtered->stdId; ?>"><button
                          type="button" class="badge badge-dark">
                          <span class="fa fa-camera"></span> Upload</button></a>
                      <?php else : ?>
                      <img src="../schoolImages/students/<?php echo $filtered->stdPassport; ?>" width="80"
                        style="border-radius: 10px;border: 3px solid darkblue;" alt="student-passport">
                      <br>
                      <b style="margin-top: 3px;"><?php echo strtoupper($filtered->stdRegNo) ?></b>
                      
                      <?php endif ?>

                    </td>
                    <td>
                      <?php echo ucwords($filtered->stdSurName . " " . $filtered->stdFirstName . " " . $filtered->stdMiddleName) ?>
                    </td>
                    <td> <?php if ($filtered->stdApplyType == 'Day') : ?>
                      <span class="badge badge-pill badge-dark m-1"><?php echo $filtered->stdApplyType ?></span>
                      <?php else : ?>
                      <span class="badge badge-pill badge-success mt-1"><?php echo $filtered->stdApplyType ?></span>
                      <?php endif ?>
                    </td>
                    <td><?php echo strtoupper($filtered->studentClass) ?></td>
                    <td><?php echo ucfirst($filtered->stdGender); ?></td>

                    <td> <?php switch ($filtered->stdAdmStatus) {
                                    case 'Active':
                                      echo '<span class="badge badge-success badge-pill">Active</span>';
                                      break;

                                    case 'Left':
                                      echo '<span class="badge badge-dark badge-pill">Left</span>';
                                      break;

                                    case 'Expelled':
                                      echo '<span class="badge badge-danger badge-pill">Expelled</span>';
                                      break;

                                    case 'Graduated':
                                      echo '<span class="badge badge-success badge-pill">Graduated</span>';
                                      break;

                                    case 'Suspended':
                                      echo '<span class="badge badge-warning badge-pill">Suspended</span>';
                                      break;

                                    default:
                                      echo '<span class="badge badge-primary badge-pill">Pending</span>';
                                      break;
                                  } ?> </td>
                    <td>
                      <div class="btn-group mb-1">
                        <a class="text-info mr-1" href="./editstudentinfo?student-data=<?php echo ($filtered->stdId); ?>">
                          <button type="button" class="btn btn-dark btn-sm"><span
                              class="fa fa-edit"></span></button></a> 
                              
                      </div>
                      <!--  -->

          <a href="javascript:void(0);" class="btn btn-danger delete_student_btn loading_<?php echo $filtered->stdId;?>" data-id="<?php echo $filtered->stdId;?>" data-action="remove_student_permanently" class="card-link text-warning"><span class="fa fa-trash-o"></span> Delete</a>

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
            } else {
              echo '<div class="text-center col-12 col-md-12">
          ' . $Alert->alert_msg("No Result Found!, Please try again", "danger") . '
          </div>';
            }
          } ?>
        <?php endif ?>
      </div>
    </div>
  </div>
  <!-- END: Content-->
  </div>
  <!-- demo chat-->
  <?php include("../template/footer.php"); ?>
  <!-- END: Footer-->
  <!-- BEGIN: Vendor JS-->
  <?php include("../template/DataTableFooterScript.php"); ?>

  <script type="text/javascript">
      $(document).ready(function(){
        $(".delete_student_btn").on("click", function(){
          let studentId = $(this).data("id"),action = $(this).data("action");
          $(".loading_"+studentId).html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
          if (confirm("Are you sure you want to permanently remove all data associated with this student from your database?")) {
            $.post("../actions/delete_actions",{studentId:studentId,action:action}, function(response){
              setTimeout(()=>{
                $(".loading_"+studentId).html('<span class="fa fa-trash-o"></span>Delete').attr("disabled",false);
                $("#server-response").html(response);
              },500);
            })

          }else{
            return false;
          }
        })
      })
    </script>

</body>
<!-- END: Body-->

</html>